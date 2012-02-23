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
 * View for phloor_menuitem objects
 *
 */
$menuitem = elgg_extract('entity', $vars, FALSE);
if (!$menuitem) {
    return TRUE;
}

$full = elgg_extract('full_view', $vars, FALSE);
if ($full) {
    elgg_load_js('jquery-ui');
    elgg_load_js('phloor-menuitem-sortable-js'); // load sortable js!
}

$container = $menuitem->getContainerEntity();
$owner = $menuitem->getOwnerEntity();
$owner_link = elgg_view('output/url', array(
	'href'       => "phloor/object/phloor_menuitem/owner/$owner->username",
	'text'       => $owner->name,
	'is_trusted' => true,
));
$author_text = elgg_echo('byline', array($owner_link));

$categories = elgg_view('output/categories', $vars);
$tags = elgg_view('output/tags', array('tags' => $menuitem->tags));
$date = elgg_view_friendly_time($menuitem->time_created);

$metadata = elgg_view_menu('entity', array(
	'entity'  => $menuitem,
	'handler' => 'phloor_menuitem',
	'sort_by' => 'priority',
	'class'   => 'elgg-menu-hz',
));

$subtitle = "$author_text $date $categories";

//get all submenu item entities
$submenuitems = \phloor_menuitem\get_children($menuitem);
$submenuitems = \phloor_menuitem\sort_by_priority($submenuitems);
$submenuitem_list = elgg_view_entity_list($submenuitems, array(
	'limit' => 0,
	'full_view' => false,
	'list_class' => 'elgg-list-entity phloor-list-menuitem',
));

// do not show the metadata and controls in widget view
if (elgg_in_context('widgets')) {
    $metadata = '';
}

$content = '';
if ($full) {
    $options = array(
		'metadata'         => $metadata,
		'subtitle'         => $subtitle,
		'submenuitem_list' => $submenuitem_list,
    );

    $params = array_merge($options, $vars);
    $content = elgg_view('phloor_menuitem/object/full', $params);

} else {
    $title = $menuitem->getTitle(true);

    $params = array(
		'entity'    => $menuitem,
		'metadata'  => $metadata,
		'title'     => elgg_view('output/url', array(
    		'text' => $title,
            // do not choose the $menuitem->href but rather the real link to the object
    		'href' => $menuitem->getURL(),
        )),
		'subtitle'  => $menuitem->getHref(true),
		'tags'      => $tags,
		'content'   => $submenuitem_list,
    );

    $params = $params + $vars;
    $summary = elgg_view('object/elements/summary', $params);

    $menuitem_icon = elgg_view_entity_icon($menuitem, 'tiny');

    // display image if it exists
    if ($menuitem->hasImage()) {
        $size = 'tiny';
        $menuitem_image_url = elgg_format_url($menuitem->getImageURL($size));

        $image_alt = elgg_view('phloor/output/avatar', array(
			'src'   => $menuitem_image_url,
			'size'  => $size,
        	'alt'   => $title,
        	'title' => $title,
        ));

        $params['image_alt'] = $image_alt;
    }

    $content = elgg_view_image_block($menuitem_icon, $summary, $params);
}

// output content
echo $content;



