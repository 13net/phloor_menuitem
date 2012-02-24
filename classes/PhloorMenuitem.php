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
class PhloorMenuitem extends AbstractPhloorElggThumbnails {

    public function __construct($guid = null) {
        parent::__construct($guid);
    }

    /**
     * Set subtype to phloor_menuitem.
     */
    protected function initializeAttributes() {
        parent::initializeAttributes();

        $this->attributes['subtype'] = "phloor_menuitem";
        $this->attributes['comments_on'] = 'Off';
    }

    public function save() {
        $return = parent::save();

        return $return;
    }

    public function delete() {
        $message = '';

        //$this->deleteThumbnails();
        //$this->deleteImage();

        // move the children one level up!
        $children = $this->getChildren();
        foreach($children as $child) {
            $child->parent_guid = $this->parent_guid;
            $child->menu_name   = $this->menu_name;

            if($child->save()) {
                $message .= "{$child->getTitle(true)};";
            }
        }

        if(!empty($message)) {
            system_message(elgg_echo('phloor_menuitem:moveditemsonlevelup', array($message)));
        }

        return parent::delete();
    }

    public function getIconURL($size = 'topbar') {
        $sizes = array('topbar', 'thumb', 'tiny', 'small', 'medium');
        if(!in_array($size, $sizes)) {
            $size = 'topbar';
        }

        $image_url = "mod/phloor_menuitem/graphics/icons/default/$size.png";

        return elgg_normalize_url($image_url);
    }


    public function hasParent() {
        return $this->parent_guid != 0;
    }

    public function getParent() {
        if(!$this->hasParent()) {
            return false;
        }

        return get_entity($this->parent_guid);
    }

    public function getChildren() {
        return \phloor_menuitem\get_children($this);
    }

    /**
     * No one can comment on Menuitems
     */
    public function canComment($user_guid = 0) {
        return false;
    }

    /**
     * Getter/Setter
     */

    /**
     * Getter for menu_name
     */
    public function getMenuName() {
        if($this->hasParent()) {
            return $this->getParent()->getMenuName();
        }

        return $this->menu_name;
    }

    /**
     * Setter for menu_name
     */
    public function setMenuName($menu_name) {
        $this->menu_name = ($menu_name);
    }

    /**
     * Getter for title
     */
    public function getTitle($replace_special_pattern = false) {
        if($replace_special_pattern) {
            return $this->getModifiedTitle();
        }
        return $this->title;
    }

    /**
     * Setter for title
     */
    public function setTitle($title) {
        $this->title = $title;
    }

    public function getModifiedTitle() {
        return \phloor_menuitem\replace_sepcial_pattern($this->title, 'title', $this->site_guid);
    }

    /**
     * Getter for href
     */
    public function getHref($replace_special_pattern = false) {
        if($replace_special_pattern) {
            return $this->getModifiedHref();
        }
        return $this->href;
    }

    /**
     * Setter for href
     */
    public function setHref($href) {
        $this->href = $href;
    }

    public function getModifiedHref() {
        return \phloor_menuitem\replace_sepcial_pattern($this->href, 'href', $this->site_guid);
    }

    /**
     * Getter for tooltip
     */
    public function getTooltip($replace_special_pattern = false) {
        if($replace_special_pattern) {
            return $this->getModifiedTooltip();
        }
        return $this->tooltip;
    }

    /**
     * Setter for tooltip
     */
    public function setTooltip($tooltip) {
        $this->tooltip = $tooltip;
    }

    public function getModifiedTooltip() {
        return \phloor_menuitem\replace_sepcial_pattern($this->tooltip, 'tooltip', $this->site_guid);
    }

    /**
     * Getter for priority
     */
    public function getPriority() {
        return $this->priority;
    }

    /**
     * Setter for priority
     */
    public function setPriority($priority) {
        $this->priority = $priority;
    }


    /**
     * Getter for guest_only
     */
    public function isGuestsOnly() {
        return $this->guests_only;
    }

    /**
     * Setter for guest_only
     */
    public function setGuestsOnly($guests_only) {
        $this->guests_only = $guests_only;
    }


    public function getContext() {
        $tag_string = $this->contexts;
        $tag_array = string_to_tag_array($tag_string);

        if($tag_array === false || empty($tag_array)) {
            $tag_array = array('all');
        }

        return $tag_array;
    }
}


