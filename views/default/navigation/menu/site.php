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
 * Site navigation menu
 *
 * Overwrites the site menu with the option to not show the more menu
 *
 * @uses $vars['default'] true or false
 * @uses $vars['more']    true or false
 * @uses $vars['menu']['default'] default menu section
 * @uses $vars['menu']['more']    more menu section
 */
/* make default menu visible by default */
$show_default_section = elgg_extract('default', $vars, true);
$show_more_section    = elgg_extract('more',    $vars, true);
$menu                 = elgg_extract('menu',    $vars, array());
// extract sections
$default_menu         = elgg_extract('default', $menu, array());
$more_menu            = elgg_extract('more',    $menu, array());

$hide_more_section = elgg_get_plugin_setting('hide_menu_site_more_public', 'phloor_menuitem');
if (elgg_is_logged_in()) {
    $hide_more_section =  elgg_get_plugin_setting('hide_menu_site_more_loggedin', 'phloor_menuitem');
}

// if empty or not false -> its true
if (phloor_str_is_true($hide_more_section)) {
    $show_more_section = false;
}

$content = "";

$content .= '<ul class="elgg-menu elgg-menu-site elgg-menu-site-default clearfix">';

if ($show_default_section == true) {
    foreach ($default_menu as $menu_item) {
        $content .= elgg_view('navigation/menu/elements/item', array('item' => $menu_item));
    }
}
if (!empty($more_menu) && $show_more_section == true) {      
    $more = elgg_echo('more');
     
    $more_section = elgg_view('navigation/menu/elements/section', array(
        'class' => 'elgg-menu elgg-menu-site elgg-menu-site-more',
        'items' => $more_menu,
    ));
    
    $content .= <<<HTML
        <li class="elgg-more">
        <a title="$more">$more</a>
        $more_section
        </li>
HTML;
}

$content .= '</ul>';

echo $content;
