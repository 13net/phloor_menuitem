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
?>
<?php
/**
 * Phloor Menuitem
 */
elgg_register_event_handler('init', 'system', 'phloor_menuitem_init');
elgg_register_event_handler('init', 'system', 'phloor_menuitem_menu_setup', 999);

function phloor_menuitem_init() {
    /**
     * LIBRARY
     * register a library of helper functions
     */
    $lib_path = elgg_get_plugins_path() . 'phloor_menuitem/lib/';
    elgg_register_library('phloor-menuitem-lib', $lib_path . 'phloor_menuitem.lib.php');
    elgg_load_library('phloor-menuitem-lib'); // load it immediately

    /**
     * Site Menu Item (just for admins)
     */
    if (elgg_is_admin_logged_in()) {   
        $item = new ElggMenuItem('phloor_menuitem', elgg_echo('phloor_menuitem:menuitem'), 'phloor/object/phloor_menuitem/all');
        elgg_register_menu_item('site', $item);
    }
    
    /**
     * CSS
     * for the background icons mostly
     */
    elgg_extend_view('css/admin', 'phloor_menuitem/css/admin');
    elgg_extend_view('css/elgg',  'phloor_menuitem/css/elgg',       501);
    elgg_extend_view('css/elgg',  'phloor_menuitem/css/menu_icons', 502);

    // append standard theme additions (submenus in site and topbar,..) if user uses the elgg standard theme
    $disable_modified_css =  elgg_get_plugin_setting('disable_modified_css', 'phloor_menuitem');
    if(!phloor_str_is_true($disable_modified_css)) {
        elgg_extend_view('css/elgg',  'phloor_menuitem/css/elgg_standard_theme_additions/site_menu',   501);
        elgg_extend_view('css/elgg',  'phloor_menuitem/css/elgg_standard_theme_additions/footer_menu', 501);
    }
    
    /**
     * JS
     */
    // sortable js
    elgg_register_simplecache_view('js/phloor_menuitem/sortable-js');
    $url = elgg_get_simplecache_url('js', 'phloor_menuitem/sortable-js');
    elgg_register_js('phloor-menuitem-sortable-js', $url, 'footer');

    /**
     * Admin menu
     */
    // unregister the default elgg menu-item page
    elgg_unregister_menu_item('page', 'appearance:menu_items');
    elgg_register_admin_menu_item('configure', 'phloor_menuitem', 'appearance');

    /**
     * Plugin hooks
     */
    // replace default patterns like %wwwroot% and %username%
    elgg_register_plugin_hook_handler('phloor_menuitem_replace_special_pattern', 'all', 'phloor_menuitem_replace_default_sepcial_pattern_hook', 999);

    /**
     * Entity menu
     */
    elgg_register_plugin_hook_handler('register', 'menu:entity', 'phloor_menuitem_register_entity_menu_setup');
    elgg_register_plugin_hook_handler('prepare',  'menu:entity', 'phloor_menuitem_prepare_entity_menu_setup');

    /**
     * Actions
     */
    $action_path = elgg_get_plugins_path() . 'phloor_menuitem/actions/phloor_menuitem';
    elgg_register_action('phloor_menuitem/sort', "$action_path/ajax/sort.php", 'admin');
   
    /**
     * PHLOOR entity handler functions
     */
    // let phloor know about your entity subtype
    if (\phloor\entity\object\phloor_my_subtype('phloor_menuitem')) {
    
        // populate your function for the DEFAULT VALUES of your entity
        elgg_register_plugin_hook_handler('phloor_object:default_vars', 'phloor_menuitem', '\phloor_menuitem\default_vars');
        
        // populate your function for the FROM ATTRIBUTES of your entity
        elgg_register_plugin_hook_handler('phloor_object:form_vars', 'phloor_menuitem', '\phloor_menuitem\form_vars');
             
        // prepare the FROM ATTRIBUTES and add/change/delete stuff
        elgg_register_plugin_hook_handler('phloor_object:prepare_form_vars', 'phloor_menuitem', '\phloor_menuitem\prepare_form_vars');
    
        // populate your function for VALIDATING the attributes of your entity
        elgg_register_plugin_hook_handler('phloor_object:check_vars',   'phloor_menuitem', '\phloor_menuitem\check_vars');
        
        elgg_register_plugin_hook_handler('phloor_object:page_handler', "phloor_menuitem:menu",  "\phloor_menuitem\page_handler_menu",  550);
        elgg_register_plugin_hook_handler('phloor_object:page_handler', "phloor_menuitem:all",   "\phloor_menuitem\page_handler_all",   550);
        elgg_register_plugin_hook_handler('phloor_object:page_handler', "phloor_menuitem:owner", "\phloor_menuitem\page_handler_owner", 550);
        elgg_register_plugin_hook_handler('phloor_object:page_handler', "phloor_menuitem:view",  "\phloor_menuitem\page_handler_view",    1); 
    }
    /*
     * PHLOOR entity handler functions - END
     **/
}


/**
 * Menu Settings Setup
 */
function phloor_menuitem_menu_setup() {
    global $CONFIG;

    // initialise all major menues
    $major_menues = array(
    	'site', 
    	'footer', 
    	'topbar', 
    	'page', 
    	'extras',
        'owner_block',
        'user_hover',
    );
    
    foreach ($major_menues as $menu_name) {
        // assign empty array if not set
        if (!isset($CONFIG->menus[$menu_name])) {
            $CONFIG->menus[$menu_name] = array();
        }
    }

    //foreach ($major_menues as $menu_name) {
    foreach ($CONFIG->menus as $menu_name => $_) {
        // get menuitems of the menu
        $count = \phloor_menuitem\get_menuitems_top(array(
			'menu_name' => $menu_name,
            'count'     => true,
        	'limit'     => 1,
        ));
        // if at least one menu item exists,
        if ($count >= 1) {
            switch ($menu_name) {
                // special treatment for site menu (because of standard core plugin hook)
                case 'site':
                    // unregister the elgg plugin hook for preparing the menu
                    elgg_unregister_plugin_hook_handler('prepare', 'menu:site', 'elgg_site_menu_setup');
                    // register own plugin for site (its the same as for the others any.. just pointing it out.
                    elgg_register_plugin_hook_handler  ('prepare', 'menu:site', 'phloor_menuitem_menu_setup_hook', 999);
                    
                    break;
                default:
                    // register plugin hook for every menu in $CONFIG->menus
                    elgg_register_plugin_hook_handler('prepare', 'menu:'.$menu_name, 'phloor_menuitem_menu_setup_hook', 999);         
            }
        }
    }
}


/**
 *
 * @param string $hook
 * @param string $type
 * @param array $return Menu array
 * @param array $params
 * @return array
 */
function phloor_menuitem_menu_setup_hook($hook, $type, $return, $params) {
    if ($hook == 'prepare' && substr($type, 0, 5) == 'menu:') {
        $menu_name = substr($type, 5, strlen($type));

        // do not add page items when in admin mode
        // this would screw up the admin menu section
        if (elgg_in_context('admin') && strcmp('page', $menu_name) == 0) {
            return $return;
        }

        // get MenuItems for the menu
        $featured = \phloor_menuitem\get_items_for_menu($menu_name);
        
        if (count($featured) > 0) {
            // shift the former menu on the 'more' section
            $return['more'] = $return['default'];
            $return['default'] = $featured;

            return $return;
        }
    }

    return $return;
}

/**
 * Add/remove particular phloor_menuitem links/info to entity menu
 */
function phloor_menuitem_register_entity_menu_setup($hook, $type, $return, $params) {
    $menuitem = elgg_extract('entity', $params, false);
    $handler  = elgg_extract('handler', $params, false);
    // break up if wrong handler or entity is not of class PhloorMenuitem
    if (!\phloor_menuitem\instance_of($menuitem) || $handler != 'phloor_menuitem') {
        return $return;
    }

    /**
     * Register items
     */
    if (!empty($menuitem->menu_name)) {
        $item = ElggMenuItem::factory(array(
			'name' => 'menu_name',
			'href' => false,
			'text' => elgg_echo($menuitem->menu_name),
		    'priority' => 1,
        ));
        $return[] = $item;
    }
    
    // display menu name an top entries
    if (phloor_str_is_true($menuitem->guests_only)) {
        $item = ElggMenuItem::factory(array(
			'name' => 'guests_only',
			'href' => false,
			'text' => elgg_echo('phloor_menuitem:guests_only'),
		    'priority' => 2,
        ));
        $return[] = $item;
    }

    
    // view 'add submenu' button if write access
    if ($menuitem->canEdit()) {
        $user_guid = elgg_get_logged_in_user_guid();
        // display 'add submenuitem' if not in full view
        $add_submenuitem_item = ElggMenuItem::factory(array(
			'name' => 'add_submenuitem',
			'href' => "phloor/object/phloor_menuitem/add/{$user_guid}?parent_guid=$menuitem->guid",
			'text' => elgg_echo('phloor_menuitem:newchild'),
        ));

        $return[] = $add_submenuitem_item;

        // 'edit' button
        $options = array(
    		'name' => 'edit',
    		'text' => elgg_echo('edit'),
    		'href' => "phloor/object/phloor_menuitem/edit/{$menuitem->guid}",
        );
        $return[] = ElggMenuItem::factory($options);
    }

    return $return;
}

/**
 * prepare Menuitem object entity menu
 *
 * remove likes and likes_count
 *
 * @param unknown_type $hook
 * @param unknown_type $type
 * @param unknown_type $return
 * @param unknown_type $params
 */
function phloor_menuitem_prepare_entity_menu_setup($hook, $type, $return, $params) {
    $menuitem = elgg_extract('entity',  $params, false);
    $handler  = elgg_extract('handler', $params, false);
    
    // break up if wrong handler or entity is not of class PhloorMenuitem
    if (!\phloor_menuitem\instance_of($menuitem) ||
        $handler != 'phloor_menuitem') {
        return $return;
    }
    /**
     * UNregister items
     * unregister like and likes_count
     */
    $unregister_items = array(
		'likes', 'likes_count',
    );

    foreach ($return as $index => $section) {
        if (is_array($section)) {
            foreach ($section as $key => $item) {
                if (in_array($item->getName(), $unregister_items)) {
                    unset($return[$index][$key]);
                }
            }
        }
    }

    return $return;
}

/**
*
*
* @param unknown_type $string
* @param unknown_type $site_guid
*/
function phloor_menuitem_replace_default_sepcial_pattern_hook($hook, $type, $return, $params) {
    if (strcmp('phloor_menuitem_replace_special_pattern', $hook) != 0) {
         return $return;   
    }
    
    $site_guid = elgg_extract('site_guid', $params, 0);
    $wwwroot = elgg_get_site_url($site_guid);
    
    $return = str_replace('%wwwroot%', $wwwroot, $return);

    // only if user is logged in replace the username pattern
    if (elgg_is_logged_in()) {
        $username = elgg_get_logged_in_user_entity()->username;
        $return = str_replace('%username%', $username, $return);
    }

    return $return;
}

