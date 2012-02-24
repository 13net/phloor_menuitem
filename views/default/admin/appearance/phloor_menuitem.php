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
// check for admin
admin_gatekeeper();

elgg_load_js('jquery-ui');
elgg_load_js('phloor-menuitem-sortable-js'); // load sortable js!

// get page content list (just like in normal view)
$menu_name = get_input('menu_name', 'site', true);

// register 'add' button
\phloor\entity\object\page_handler\defaults\register_title_button('phloor_menuitem', "add");

$count = \phloor_menuitem\get_entities(array(
	'metadata_name_value_pairs' => array(
		'menu_name'   => $menu_name,
	),
    'count' => true
));
$entity_count = elgg_echo('phloor_menuitem:admin:appearance:entity_count', array($count));


$filter = elgg_view('phloor_menuitem/menufilter', array(
	'filter_context' => $menu_name,
));

$menuitem_list = '';
if ($count > 0) {    
    $content_list = \phloor_menuitem\get_page_content_list(null, array(
    	'menu_name' => $menu_name,
    ));
    $menuitem_list = elgg_extract('content', $content_list, '');    
}


$body .=  $filter . $menuitem_list . "<p>{$entity_count}</p>";

$title       = elgg_view_title(elgg_echo('phloor_menuitem:admin:appearance:title'));
$description = elgg_echo('phloor_menuitem:admin:appearance:description');

$content = <<<___HTML
    {$title}
	<p>{$description}</p>
	<div>
		$body
	</div>
___HTML;

echo $content;
    
    
    
    
    