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
$entity = elgg_extract('entity', $vars, NULL);
/**
 * Phloor Menuitem plugin settings
 *
 */

$disable_modified_css          = $entity->disable_modified_css;
$hide_menu_site_more_public    = $entity->hide_menu_site_more_public;
$hide_menu_site_more_loggedin  = $entity->hide_menu_site_more_loggedin;


if (!phloor_str_is_true($disable_modified_css)) {
    $disable_modified_css = 'false';
}

// if $hide_menu_site_more no value (empty)
// then hide the more menu default to true
if (!phloor_str_is_true($hide_menu_site_more_public)) {
    $hide_menu_site_more_public = 'false';
}
if (!phloor_str_is_true($hide_menu_site_more_loggedin)) {
    $hide_menu_site_more_loggedin = 'false';
}

?>

<?php
echo elgg_view_title(elgg_echo('phloor_menuitem:settings:general:title'));
?>

<div>
<?php
echo elgg_view('phloor/input/vendors/prettycheckboxes/checklist', array(
	'options' => array(
    	'disable_modified_css'  => array(
        	'name'  => 'params[disable_modified_css]',
        	'value' => $disable_modified_css,
            'label' => elgg_echo('phloor_menuitem:settings:general:disable_modified_css:label'),
        ),
    ),
));
?>
<?php echo elgg_echo('phloor_menuitem:settings:general:disable_modified_css:description'); ?>
</div>

<?php
echo elgg_view_title(elgg_echo('phloor_menuitem:settings:menu:more:title'));

// hide site menu section "more" settings
echo elgg_view('phloor/input/vendors/prettycheckboxes/checklist', array(
	'options' => array(
    	'hide_menu_site_more_public'  => array(
        	'name'  => 'params[hide_menu_site_more_public]',
        	'value' => $hide_menu_site_more_public,
            'label' => elgg_echo('phloor_menuitem:settings:menu:more:hide:public:label'),
        ),
    	'hide_menu_site_more_loggedin' => array(
        	'name'  => 'params[hide_menu_site_more_loggedin]',
        	'value' => $hide_menu_site_more_loggedin,
            'label' => elgg_echo('phloor_menuitem:settings:menu:more:hide:loggedin:label'),
        ),
    ),
));

