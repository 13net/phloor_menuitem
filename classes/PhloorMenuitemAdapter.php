<?php
/*****************************************************************************
 * Phloor Menuitem                                                           *
 *                                                                           *
 * Copyright (C) 2011 Alois Leitner                                          *
 *                                                                           *
 * This program is free software: you can redistribute it and/or modify      *
 * it under the terms of the GNU General Public License as published by      *
 * the Free Software Foundation, either version 2 of the License, or         *
 * (at your option) any later version.                                       *
 *                                                                           *
 * This program is distributed in the hope that it will be useful,           *
 * but WITHOUT ANY WARRANTY; without even the implied warranty of            *
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the             *
 * GNU General Public License for more details.                              *
 *                                                                           *
 * You should have received a copy of the GNU General Public License         *
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.     *
 *                                                                           *
 * "When code and comments disagree both are probably wrong." (Norm Schryer) *
 *****************************************************************************/
?>
<?php

/**
 *
 */
class PhloorMenuitemAdapter extends ElggMenuItem {

    protected $entity;

    public function __construct($entity) {
        parent::__construct("phloor-menuitem-{$entity->guid}", $entity->getTitle(true), $entity->getHref(true));

        if (!\phloor_menuitem\instance_of($entity)) {
            throw new InvalidClassException($entity);
        }

        $this->entity = $entity;

        // apply "selected" class when menu item is active

        $selected = false;
        $current_page_url = current_page_url();
        if (!$selected && elgg_http_url_is_identical($current_page_url, $entity->getHref(true))) {
            $this->setSelected(true);
            $selected = true;
        }

        $children = \phloor_menuitem\get_children($entity);
        
        $pl = new ElggPriorityList();
        if (is_array($children) && !empty($children)) {
            // insert unique priority -> menuitem array
            foreach ($children as $child) {
                $item = new PhloorMenuitemAdapter($child);
        
                // dont add the menu item if it is for guests only!
                if (phloor_str_is_true($item->isGuestsOnly()) && elgg_is_logged_in()) {
                    continue;
                }
                
                // if not in context => contine
                if(!$item->inContext(elgg_get_context())) {
                    continue;
                }

                if(!$selected && elgg_http_url_is_identical($current_page_url, $child->getHref(true))) {
                    $this->setSelected(true);
                    $selected = true;
                }

                $item->setParentName($this->getName());
                $item->setParent($this);
        
                $priority = (int) $item->getPriority();
        
                if (!is_numeric($priority)) {
                    $priority = 500;
                }
        
                $pl->add($item, $priority);
            }
        }
        
        $this->setChildren($pl->getElements());
        
    }

    public function getEntity() {
        return $this->entity;
    }

    // the text is actually the title
    public function getText() {
        return $this->entity->getTitle(true);
    }
    public function setText($text) {
        $this->entity->setTitle($text);
    }

    public function getHref() {
        return $this->entity->getHref(true);
    }
    public function setHref($href) {
        $this->entity->setHref($href);
    }

    // the title is actually the tooltip
    public function getTooltip() {
        return $this->entity->getTooltip(true);
    }
    public function setTooltip($title) {
        $this->entity->setTooltip($title);
    }

    public function getPriority() {
        return $this->entity->getPriority();
    }
    public function setPriority($priority) {
        $this->entity->setPriority($priority);
    }
    
    public function isGuestsOnly() {
        return $this->entity->guests_only;
    }
    public function setGuestsOnly($guests_only) {
        $this->entity->guests_only = $guests_only;
    }
    

	/**
	 * Should this menu item be used given the current context
	 *
	 * @param string $context A context string (default is empty string for
	 *                        current context stack).
	 * @return bool
	 */
	public function inContext($context = '') {
	    $valid_contexts = $this->entity->getContext();
		if (count($valid_contexts) <= 0) {
			return true;
		}

		if (in_array('all', $valid_contexts)) {
			return true;
		}

		if ($context) {
			return in_array($context, $valid_contexts);
		}

		foreach ($valid_contexts as $context) {
			if (elgg_in_context($context)) {
				return true;
			}
		}
		return false;
	}

}