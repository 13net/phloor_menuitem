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

$english = array(
    'admin:plugins:category:menu' => 'Menu ',
	'admin:appearance:phloor_menuitem' => 'Menu Items',


    'owner_block' => 'Owner block',
    'user_hover'  => 'User hover',
    'page'        => 'Page',
    'footer'      => 'Footer',
    'extras'      => 'Extras',
    'topbar'      => 'Topbar',
/**
 * PHLOOR specific language strings
 */
	'phloor/object/phloor_menuitem:breadcrumb:all'                    => 'All menuitem',
	'phloor/object/phloor_menuitem:page:content:list:all:title'       => 'All menuitem',
	'phloor/object/phloor_menuitem:page:content:list:none'            => 'No menuitem found.',
	'phloor/object/phloor_menuitem:page:content:list:container:title' => '%s\'s menuitem',
	'phloor/object/phloor_menuitem:page:content:friends:title'        => 'Friends\' menuitem',
	'phloor/object/phloor_menuitem:page:content:add:title'            => 'Add a menuitem',
	'phloor/object/phloor_menuitem:page:content:edit:title'           => 'Edit menuitem %s',

	'phloor/object/phloor_menuitem:add' => 'Add menuitem',

/** ATTRIBUTES */
    
	'phloor/object/phloor_menuitem:form:menu_name' => 'Menu*: ',
	'phloor/object/phloor_menuitem:form:title'     => 'Title*: ',
	'phloor/object/phloor_menuitem:form:href'      => 'Url*: ',
	'phloor/object/phloor_menuitem:form:tooltip'   => 'Tooltip: ',
	'phloor/object/phloor_menuitem:form:image'     => 'Image: ',
	'phloor/object/phloor_menuitem:form:priority'  => 'Priority: ',
	'phloor/object/phloor_menuitem:form:access_id' => 'Read access: ',
	'phloor/object/phloor_menuitem:form:target'    => 'Target: ',
	'phloor/object/phloor_menuitem:form:delete_image' => 'Delete current icon? ',
    'phloor/object/phloor_menuitem:form:guests_only' => 'Visible to guests only? ',
    'phloor/object/phloor_menuitem:form:contexts' => 'Contexts ',

	'phloor/object/phloor_menuitem:form:menu_name:description' => '',
	'phloor/object/phloor_menuitem:form:title:description'     => 'Special patterns: %username%, %wwwroot% (Hooked in patterns currently not shown) ',
	'phloor/object/phloor_menuitem:form:href:description'      => 'Insert the url the menu item should reference. Special patterns: %username%, %wwwroot% (Hooked in patterns currently not shown) ',
	'phloor/object/phloor_menuitem:form:tooltip:description'   => 'The tooltip will be shown, when a user hovers over the menu item. Special patterns: %username%, %wwwroot% (Hooked in patterns currently not shown) ',
	'phloor/object/phloor_menuitem:form:image:description'     => 'Upload an image. The image will be resized into the resolutions 16x16, 60x60, 153x153 and 600x600. ',
	'phloor/object/phloor_menuitem:form:priority:description'  => '',
	'phloor/object/phloor_menuitem:form:access_id:description' => 'Who is allowed to see this menu item? ',
	'phloor/object/phloor_menuitem:form:target:description'    => '(This is currently not supported) ',
	'phloor/object/phloor_menuitem:form:delete_image:description' => 'Checking this box will result in the current icon being deleted. ',
	'phloor/object/phloor_menuitem:form:guests_only:description' => 'If this option is activated the menuitem will not be shown to logged in users and will therefore be visible to logged out/not registered users only! ',
    'phloor/object/phloor_menuitem:form:contexts:description' => 'A comma-seperated list of contexts this menuitem should be displayed. Default is "all" (always visible).',

	'phloor/object/phloor_menuitem:menu_name' => 'Menu',
	'phloor/object/phloor_menuitem:title'     => 'Title',
	'phloor/object/phloor_menuitem:href'      => 'Url',
	'phloor/object/phloor_menuitem:tooltip'   => 'Tooltip',
	'phloor/object/phloor_menuitem:image'     => 'Image',
	'phloor/object/phloor_menuitem:priority'  => 'Priority',
	'phloor/object/phloor_menuitem:access_id' => 'Read access',
	'phloor/object/phloor_menuitem:target'    => 'Target',
	'phloor/object/phloor_menuitem:delete_image' => 'Delete current icon? ',
    'phloor/object/phloor_menuitem:guests_only' => 'Guests only',
    'phloor/object/phloor_menuitem:contexts' => 'Contexts',
/* ATTRIBUTES - END **/
/*
 * PHLOOR specific language strings - END
 **/

/* lately added keys */
	'phloor_menuitem:error:check_vars:title:missing' => 'Please insert a title. ',
	'phloor_menuitem:error:check_vars:href:missing' => 'Please insert a destination (href). ',
	
    'phloor_menuitem:guests_only' => 'Guests only',

    'phloor_menuitem:form:guests_only' => 'Visible to guests only? ',
    'phloor_menuitem:guests_only:description' => 'If this option is activated the menuitem will not be shown to logged in users and will therefore be visible to logged out/not registered users only! ',

    'phloor_menuitem:view_menu' => 'View menu',
    'phloor_menuitem:sort:success' => 'Menu order saved',

    'phloor_menuitem:form:contexts' => 'Contexts',
    'phloor_menuitem:contexts:description' => 'A comma-seperated list of contexts this menuitem should be displayed. Default is "all" (always visible).',
/* lately added keys - END*/

	'phloor_menuitem' => 'Menu Items',
	'phloor_menuitem:menuitem' => 'Menu Item',
	'phloor_menuitem:menuitems' => 'Menu Items',
	'phloor_menuitem:phloor_menuitem' => 'Menu Item',
	'phloor_menuitem:phloor_menuitems' => 'Menu Items',

	'item:object:phloor_menuitem' => 'Menu Item',

	'phloor_menuitem:target:_self'  => 'Open in same tab',
	'phloor_menuitem:target:_blank' => 'Open in new tab',

	'phloor_menuitem:admin:appearance:title' => "Menuitem overview page",
	'phloor_menuitem:admin:appearance:description' => "Here you can manage the menus and menuitems of your site. ",
	'phloor_menuitem:admin:appearance:entity_count' => "Menuitem count: %s ",
	'phloor_menuitem:admin:appearance:new_menuitem:title' => 'Create new menuitem',

	'phloor_menuitem:form:menu_name' => 'Menu*: ',
	'phloor_menuitem:form:title'     => 'Title*: ',
	'phloor_menuitem:form:href'      => 'Url*: ',
	'phloor_menuitem:form:tooltip'   => 'Tooltip: ',
	'phloor_menuitem:form:image'     => 'Image: ',
	'phloor_menuitem:form:priority'  => 'Priority: ',
	'phloor_menuitem:form:access_id' => 'Read access: ',
	'phloor_menuitem:form:target'    => 'Target: ',
	'phloor_menuitem:form:delete_image' => 'Delete current icon? ',

	'phloor_menuitem:menu_name' => 'Menu: ',
	'phloor_menuitem:title'     => 'Title: ',
	'phloor_menuitem:href'      => 'Url: ',
	'phloor_menuitem:tooltip'   => 'Tooltip: ',
	'phloor_menuitem:image'     => 'Image: ',
	'phloor_menuitem:priority'  => 'Priority: ',
	'phloor_menuitem:access_id' => 'Read access: ',
	'phloor_menuitem:target'    => 'Target: ',
	'phloor_menuitem:delete_image' => 'Delete current icon? ',

	'phloor_menuitem:menu_name:description' => '',
	'phloor_menuitem:title:description'     => 'Special patterns: %username%, %wwwroot% (Hooked in patterns currently not shown) ',
	'phloor_menuitem:href:description'      => 'Insert the url the menu item should reference. Special patterns: %username%, %wwwroot% (Hooked in patterns currently not shown) ',
	'phloor_menuitem:tooltip:description'   => 'The tooltip will be shown, when a user hovers over the menu item. Special patterns: %username%, %wwwroot% (Hooked in patterns currently not shown) ',
	'phloor_menuitem:image:description'     => 'Upload an image. The image will be resized into the resolutions 16x16, 60x60, 153x153 and 600x600. ',
	'phloor_menuitem:priority:description'  => '',
	'phloor_menuitem:access_id:description' => 'Who is allowed to see this menu item? ',
	'phloor_menuitem:target:description'    => '(This is currently not supported) ',
	'phloor_menuitem:delete_image:description' => 'Checking this box will result in the current icon being deleted. ',

	'phloor_menuitem:message:menuitemimagedircreated' => "The menuitem image directory 'phloor_menuitem/' has been successfully created. ",
	'phloor_menuitem:message:prioritywassetto500' => 'Priority was set to 500. ',
	'phloor_menuitem:message:saved' => 'Menuitem as been successfully saved. ',
	'phloor_menuitem:message:deleted_menuitem' => 'Menuitem has been successfully deleted. ',
	'phloor_menuitem:error:cannot_save' => 'Menuitem can not be saved. ',
	'phloor_menuitem:error:cannot_edit_menuitem' => 'Menuitem can not be edited. ',
	'phloor_menuitem:error:cannot_delete_menuitem' => 'Menuitem can not be deleted. ',

	'phloor_menuitem:error:menuitem_not_found' => 'Menuitem not found. ',
	'phloor_menuitem:error:wrong_mimetype' => 'The picture you\'ve uploaded is invalid. Error 483: Invalid mimetype %s ',
	'phloor_menuitem:error:missing:title' => 'Please insert a title. ',
	'phloor_menuitem:error:missing:description' => 'Please insert a description. ',

	'phloor_menuitem:title:all_phloor_menuitems' => 'All menuitems',
	'phloor_menuitem:title:all_phloor_menuitem'  => 'All menuitems',
	'phloor_menuitem:title:friends' => 'Friends menuitems',
	'phloor_menuitem:title:user_phloor_menuitem'  => 'Your menuitems',
	'phloor_menuitem:title:user_phloor_menuitems' => 'Your menuitems',

	'phloor_menuitem:edit' => 'Edit',
	'phloor_menuitem:add'  => 'Add menuitem',
	'phloor_menuitem:none' => 'No menuitems found. ',

	'menuitem:edit' => 'Edit',
	'menuitem:add'  => 'Add menuitem',
	'menuitem:none' => 'No menuitems found. ',

	'phloor_menuitem:newchild' => 'Add sub-item',
	'phloor_menuitem:submenuitems' => 'Subitems of this menuitem: ',
	'phloor_menuitem:submenuitems:none' => 'This menuitem does not have any subitems yet. ',

	'phloor_menuitem:moveditemsonlevelup' => "The following items has been moved one menuitem tree level up: %s",

	'phloor_menuitem:settings:menu:more:title' => "Site menu section 'more' ",
	'phloor_menuitem:settings:menu:more:hide:public:label' => "Hide section 'More' from guests? ",
	'phloor_menuitem:settings:menu:more:hide:loggedin:label' => "Hide section 'More' from logged in users? ",

	'phloor_menuitem:specialpatternusage' => 'The pattern %wwwroot% will be replaced with the site url, the pattern %username% will be replaced with the current logged in users username. If you use the pattern %username% you have to restrict the read access to logged in users. ',

	'phloor_menuitem:backtoparent' => "View parent item",

	'phloor_menuitem:settings:general:title'                            => "General settings",
	'phloor_menuitem:settings:general:disable_modified_css:label'       => "Disable appending CSS for the default theme? ",
	'phloor_menuitem:settings:general:disable_modified_css:description' => "It is recommended to disable the css if you are NOT USING THE STANDARD THEME (such themes are for example 'Purity' or 'Facebook Theme'). Disabling the CSS may lead to corrupt displaying of submenu items. ",
);

add_translation("en", $english);
