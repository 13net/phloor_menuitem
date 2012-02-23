<?php
/*****************************************************************************
 * Phloor Menuitem                                                           *
 *                                                                           *
 * Copyright (C) 2011, 2012 Alois Leitner                                    *
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

namespace phloor_menuitem;

/**
 * default attributes
 */
function default_vars($hook, $type, $return, $params) {
    $return = array(
		'title'          => '',
	    'href'           => '%wwwroot%',
	    'tooltip'        => '',
	    'priority'       => 500,
	    'target'         => '_self',
	    'contexts'       => 'all',
	    'guests_only'    => 'false',
	    'menu_name'      => 'site',
		'parent_guid'    => 0,
		'access_id'      => ACCESS_DEFAULT,
    );

    return $return;
}

/**
 * form attributes
 */
function form_vars($hook, $type, $return, $params) {
    $return = array(
		'menu_name'    => 'phloor_menuitem/input/menupicker',
		'title'        => 'input/text',
	    'href'         => 'input/url',
	    'target'       => 'phloor_menuitem/input/linktargetpicker',
	    'tooltip'      => 'input/text',
	    'priority'     => 'input/text',
	    'contexts'     => 'input/tags',
		'access_id'    => 'input/access',
		'guests_only'  => 'phloor/input/enable',
        // hidden
		'parent_guid'  => 'input/hidden',
		'context'      => 'input/hidden', // will not be safed! (no attribute of menuitem)
    );

    return $return;
}


/**
 * prepare form vars
 */
function prepare_form_vars($hook, $type, $return, $params) {
    $entity       = elgg_extract("entity", $params, NULL);
    $default_vars = elgg_extract("default_vars", $params, array());

    // parent_guid can be overwritten
    $parent_guid = get_input('parent_guid', $entity->parent_guid, true);
    if (empty($parent_guid)) {
        $parent_guid = 0;
    }

    $new_return = array(
		'parent_guid'  => array(
			'view'  => 'input/hidden',
			'value' => $parent_guid,
        ),
		'context'      => array(
			'view' => 'input/hidden', // will not be safed! (no attribute of menuitem)
			'value' => elgg_get_context(),
        ),
    );

    // merge with given $return array
    $new_return = $new_return + $return;

    // unset 'menu_name' input when parent_guid is given
    if ($parent_guid != 0) {
        unset($new_return['menu_name']);
    }

    return $new_return;
}


/**
 * Example check attributes function
 *
 */
function check_vars($hook, $type, $return, $params) {

    $entity = elgg_extract("entity", $params, NULL);
    // check for valid class instance
    if (!namespace\instance_of($entity)) {
        return false;
    }

    // fail if a required entity isn't set
    $required = array('title', 'href');

    // load from menuitem and do sanity and access checking
    foreach ($required as $name) {
        if (!isset($return[$name]) || empty($return[$name])) {
            register_error(elgg_echo("phloor_menuitem:error:check_vars:$name:missing"));
            return false;
        }
    }

    $priority = intval($return['priority']);
    if ($priority <= 0) {
        system_message(elgg_echo('phloor_menuitem:message:prioritywassetto500'));
        $return['priority'] = 500;
    }

    $parent_guid = intval($return['parent_guid']);

    // check if parent exists
    if (!elgg_entity_exists($parent_guid)) {
        $return['parent_guid'] = 0;
    } else {
        $return['menu_name'] = ''; // no menu name for non top-entities
    }

    // safety-first => No comments on menu items
    $return['comments_on'] = 'Off';

    return $return;
}

function page_handler_owner($hook, $type, $return, $params) {
    admin_gatekeeper();

    $params['page_type'] = 'owner';

    return namespace\page_handler($params);
}

function page_handler_menu($hook, $type, $return, $params) {
    admin_gatekeeper();

    $params['page_type'] = 'menu';

    return namespace\page_handler($params);
}

function page_handler_all($hook, $type, $return, $params) {
    admin_gatekeeper();

    $params['page_type'] = 'all';

    return namespace\page_handler($params);
}

/**
 * registers title buttons on page 'view'
 * but does not take over the viewing..
 * return $return without manipulating it.
 *
 * @param unknown_type $hook 'phloor_object:page_handler'
 * @param unknown_type $type "phloor_menuitem:view"
 * @param unknown_type $return
 * @param unknown_type $params
 */
function page_handler_view($hook, $type, $return, $params) {
    $menuitem = elgg_extract('entity', $params, NULL);

    // register title button to go to parent
    if ($menuitem->parent_guid != 0) {
        elgg_register_menu_item('title', array(
    			'name' => "phloor-menuitem-{$menuitem->guid}-back-to-parent",
    			'href' => "phloor/object/phloor_menuitem/view/{$menuitem->parent_guid}",
    			'text' => elgg_echo('phloor_menuitem:backtoparent'),
    			'link_class' => 'elgg-button elgg-button-action',
    		    'priority' => 100,
        ));
    }
    else {
        // register title button to view the menu
        elgg_register_menu_item('title', array(
        		'name' => "phloor-menuitem-{$menuitem->guid}-view-menu",
        		'href' => "phloor/object/phloor_menuitem/menu/{$menuitem->menu_name}",
        		'text' => elgg_echo('phloor_menuitem:view_menu'),
        		'link_class' => 'elgg-button elgg-button-action',
        	    'priority' => 100,
        ));
    }

    // register title button to create child entity
    if ($menuitem->canEdit() && elgg_is_logged_in()) {
        $user = elgg_get_logged_in_user_entity();
        elgg_register_menu_item('title', array(
    			'name' => "phloor-menuitem-{$menuitem->guid}-addchild",
    			'href' => "phloor/object/phloor_menuitem/add/{$user->guid}?parent_guid={$menuitem->guid}",
    			'text' => elgg_echo('phloor_menuitem:newchild'),
    			'link_class' => 'elgg-button elgg-button-action',
    		    'priority' => 200,
        ));
    }

    return $return;
}

/**
 * Page handler for 'owner', 'all' and 'menu' prefix.
 * everything else is handled by phloor
 *
 * @param string     $hook
 * @param string     $type
 * @param array|bool $return
 * @param array      $params
 */
function page_handler($params) {
    admin_gatekeeper();

    $page_type = elgg_extract('page_type', $params, 'all');
    $page      = elgg_extract('page',      $params, array());
    $subtype   = elgg_extract('subtype',   $params, NULL);

    elgg_load_js('jquery-ui');
    elgg_load_js('phloor-menuitem-sortable-js'); // load sortable js!

    // push 'all' menuitems breadcrumb
    elgg_push_breadcrumb(elgg_echo('phloor_menuitem:menuitems'), "phloor/object/phloor_menuitem/all");

    $return = array();
    switch ($page_type) {
        case 'all':
            $menu_name = 'site';
            $return = namespace\get_page_content_list(NULL, array(
                'menu_name' => $menu_name,
            ));

            // override filter
            $return['filter_override'] = elgg_view('phloor_menuitem/menufilter', array(
            	'filter_context' => $menu_name,
            ));

            break;
        case 'owner':
            $username = elgg_extract(3, $page, NULL);
            $user = get_user_by_username($username);

            $return = namespace\get_page_content_list($user->guid);
            break;
        case 'menu':
            $menu_name = elgg_extract(3, $page, 'site');
            $menu_name = get_input('menu_name', $menu_name, true);

            // dont handle if the menu does not exists
            global $CONFIG;
            if(!array_key_exists($menu_name, $CONFIG->menus)) {
                return false;
            }

            $return = \phloor_menuitem\get_page_content_list(NULL, array(
                'menu_name' => $menu_name,
            ));

            // override filter
            $return['filter_override'] = elgg_view('phloor_menuitem/menufilter', array(
                'filter_context' => $menu_name,
            ));

            break;
        default:
            return false;
    }

    // override any "add" button added
    if (!elgg_in_context('admin')) {
        \phloor\entity\object\page_handler\defaults\register_title_button($subtype, "add");
    }

    if (!isset($return['sidebar'])) {
        $return['sidebar'] = '';
    }

    $return['sidebar'] .= elgg_view('phloor_menuitem/sidebar', array('page' => $page_type));

    $return['layout'] = 'content';

    return $return;
}

/*
 *
 *
 *
 *
 **/

function instance_of($menuitem) {
    return elgg_instanceof($menuitem, 'object', 'phloor_menuitem', 'PhloorMenuitem');
}

/**
 *
 * Enter description here ...
 * @param unknown_type $params
 */
function get_menuitem_entities($params = array()) {
    $options = array(
		'type'    => 'object',
		'subtype' => 'phloor_menuitem',
		'offset'  => 0,
		'limit'   => 0,
    );

    $options = array_merge($params, $options);

    return elgg_get_entities($options);
}

/**
 * Get page components to list a user's or all menuitems.
 *
 * @param int $owner_guid The GUID of the page owner or NULL for all menuitems
 * @return array
 */
function get_page_content_list($container_guid = NULL, $params = array()) {
    $return = array();
    $loggedin_userid = elgg_get_logged_in_user_guid();

    $menu_name = elgg_extract('menu_name', $params, '');

    $return['filter_context'] = ($container_guid == $loggedin_userid) ? 'mine' : $menu_name;

    $options = array(
		'full_view'        => FALSE,
		//'offset'           => (int) max(get_input('offset', 0), 0),
		//'limit'            => (int) max(get_input('limit', 10), 0),
		'list_type_toggle' => TRUE,
		'pagination'       => TRUE,
		'list_class'       => 'elgg-list-entity phloor-list-menuitem',
    );

    if ($container_guid) {
        group_gatekeeper();

        $options['container_guid'] = $container_guid;
        $container = get_entity($container_guid);
        if (!$container) {

        }
        $return['title'] = elgg_echo('phloor_menuitem:title:user_phloor_menuitems', array($container->name));

        $crumbs_title = $container->name;
        elgg_push_breadcrumb($crumbs_title);

        if (elgg_instanceof($container, 'group')) {
            $return['filter'] = false;
        }
    } else {
        $return['title'] = elgg_echo('phloor_menuitem:title:all_phloor_menuitems');
        elgg_pop_breadcrumb();
        elgg_push_breadcrumb(elgg_echo('phloor_menuitem:phloor_menuitems'));
    }

    // dont show button if were in admin mode.. looks stupid
    // and there is a form anyway
    if (!elgg_in_context('admin')) {
        elgg_register_title_button();
    }

    if (!empty($menu_name)) {
        $options['menu_name'] = $menu_name;
    }

    $menuitems_top = namespace\get_menuitems_top($options);
    $menuitems_top = namespace\sort_by_priority($menuitems_top);

    $list = elgg_view_entity_list($menuitems_top, $options);

    if (!$list) {
        $return['content'] = elgg_echo('phloor_menuitem:none');
    } else {
        $return['content'] = $list;
    }

    return $return;
}

/**
* Get the root entities of a menu
*
* if no menu is given (array('menu_name')..)
* then it defaults to the 'site' menu
*
* @param unknown_type $params
*/
function get_entities($params = array()) {
    $return = array();

    $options = array(
		'type'    => 'object',
		'subtype' => 'phloor_menuitem',
    );

    $options = $options + $params;

    $menuitems = elgg_get_entities_from_metadata($options);

    return $menuitems;
}

/**
 * Get the root entities of a menu
 *
 * if no menu is given (array('menu_name')..)
 * then it defaults to the 'site' menu
 *
 * @param unknown_type $params
 */
function get_menuitems_top($params = array()) {    
    $menu_name = elgg_extract('menu_name', $params, 'all');
    unset($params['menu_name']);

    $options = array(
		'offset'  => 0,
		'limit'   => 0,
		'metadata_name_value_pairs' => array(
			'menu_name'   => $menu_name,
			'parent_guid' => '0',
		),
    );
    
    $options = $options + $params;

    return namespace\get_entities($options);
}


function get_children($menuitem) {
    if (!namespace\instance_of($menuitem)) {
        return array();
    }

    $options = array(
		'metadata_names'  => array('parent_guid'),
		'metadata_values' => array($menuitem->getGUID()),
		'offset'  => 0,
		'limit'   => 0,
    );

    return namespace\get_entities($options);
}

/**
* Appends all menuitems in the given menu to
* an array
*
* @param array  $menu
* @param string $menu_name
*/
function get_items_for_menu($menu_name) {
    // get root elements
    $menuitems_top = namespace\get_menuitems_top(array(
		'menu_name' => $menu_name,
    ));

    return namespace\prepare_items_for_menu($menuitems_top);
}

/**
* Appends all menuitems in the given menu to
* an array
*
* @param array  $menu
* @param string $menu_name
*/
function prepare_items_for_menu($menuitems) {
    if (empty($menuitems)) {
        return array();
    }
    
    $pl = new \ElggPriorityList();
    // insert unique priority -> menuitem array
    foreach ($menuitems as $menuitem) {
        $item = new \PhloorMenuitemAdapter($menuitem);

        if (!$item->inContext(elgg_get_context())) {
            continue;
        }

        // dont add the menu item if it is for guests only!
        if (phloor_str_is_true($menuitem->isGuestsOnly()) &&
        elgg_is_logged_in()) {
            continue;
        }

        $priority = (int) $item->getPriority();

        if (!is_numeric($priority)) {
            $priority = 500;
        }

        $pl->add($item, $priority);
    }

    return $pl->getElements();
}

/**
*
* Sorts menu items by priority
*
* @param $menuitems  array of PhloorMenuitems
*/
function sort_by_priority($menuitems) {
    $pl = new \ElggPriorityList();

    foreach ($menuitems as $menuitem) {
        $priority = 500;

        if (isset($menuitem->priority)) {
            $priority = (int) $menuitem->priority;
        }

        $pl->add($menuitem, $priority);
    }

    return $pl->getElements();
}


/**
 *
 * @param unknown_type $string
 * @param unknown_type $site_guid
 */
function replace_sepcial_pattern($string, $type = 'all', $site_guid = 0) {
    if (!empty($string)) {
        $params = array(
			'site_guid' => $site_guid,
			'original_string' => $string,
        );
        $string = elgg_trigger_plugin_hook('phloor_menuitem_replace_special_pattern', $type, $params, $string);
    }

    return $string;
}



