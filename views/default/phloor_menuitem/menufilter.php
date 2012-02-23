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
 * Menu filter
 *
 * Select beetween the menues from $CONFIG->menues
 *
 * @uses $vars['filter_context']  Filter context: all, friends, mine
 * @uses $vars['skip_menues']     Prevent some menues from being displayed (override)
 */


global $CONFIG;
$menus = $CONFIG->menus;
asort($menus);

$filter_context = elgg_extract('filter_context', $vars, 'site');

// dont show these menues
$default_skip_menues = array(
	'title', 'embed', 'filter', 'admin_footer',
);
$skip_menues = elgg_extract('skip_menues', $vars, $default_skip_menues);

$tabs = array();

$href_prefix = "phloor/object/phloor_menuitem/menu/";
if (elgg_in_context('admin')) {
    $href_prefix = "admin/appearance/phloor_menuitem?menu_name=";
}

foreach ($menus as $menu_name => $menu_object) {
    if (in_array($menu_name, $skip_menues)) {
        continue;
    }
    $href = "{$href_prefix}{$menu_name}";
    $tabs[$menu_name] = array(
		'text' => elgg_echo($menu_name),
		'href' => $href,
		'selected' => ($filter_context == $menu_name),
    );
} 

foreach ($tabs as $name => $tab) {
    $tab['name'] = $name;

    elgg_register_menu_item('filter', $tab);
}

echo elgg_view_menu('filter', array('sort_by' => 'text', 'class' => 'elgg-menu-hz'));

