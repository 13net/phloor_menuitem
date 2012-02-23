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

$class = elgg_extract('class', $vars, '');

$vars['class'] = "elgg-input-dropdown";
if (!empty($class)) {
    $vars['class'] .= " $class";
}

$defaults = array(
	'disabled' => false,
	'value' => 'site',
);

$vars = array_merge($defaults, $vars);

$options_values = array();

// dont show these menues
$skip_menues = array('title', 'embed', 'admin_footer');

global $CONFIG;
$menus = $CONFIG->menus;

asort($menus);
foreach ($menus as $menu_name => $menu_object) {
    if(in_array($menu_name, $skip_menues)) { 
        continue; 
    }

    $options_values[$menu_name] = elgg_echo($menu_name);
}

$vars['options_values'] = $options_values;

echo elgg_view('input/dropdown', $vars);
