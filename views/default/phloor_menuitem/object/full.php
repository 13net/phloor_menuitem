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
if (!\phloor_menuitem\instance_of($menuitem)) {
    return TRUE;
}

$metadata         = elgg_extract('metadata', $vars, '');
$subtitle         =	elgg_extract('subtitle', $vars, '');
$submenuitem_list = elgg_extract('submenuitem_list', $vars, array());


$variable_output = '';

// title
$title_label          = elgg_echo("phloor_menuitem:title");
$title_value          = $menuitem->getTitle(false);
$modified_title_value = $menuitem->getTitle(true);

// add modified title value if it differs from the value
if (strcmp($modified_title_value, $title_value) != 0) {
    $modified_title_value .= <<<HTML
		<span class="phloor-menuitem-unmodified" name="phloor-menuitem-{$menuitem->guid}-title">
			($title_value)
		</span>
HTML;
}

// href
$href_label = elgg_echo("phloor_menuitem:href");
$href_value = $menuitem->getHref(false);
$target_url = $menuitem->getHref(true);

$modified_href_value = elgg_view('output/url', array(
	'text'  => $target_url,
	'href'  => $target_url,
	'title' => $target_url,
));

// add modified title value if it differs from the value
if (strcmp($modified_href_value, $href_value) != 0) {
    $modified_href_value .= <<<HTML
		<span class="phloor-menuitem-unmodified" name="phloor-menuitem-{$menuitem->guid}-href">
			($href_value)
		</span>
HTML;
}

// tooltip
$tooltip_label          = elgg_echo("phloor_menuitem:tooltip");
$tooltip_value          = $menuitem->getTooltip(false);
$modified_tooltip_value = $menuitem->getTooltip(true);

// add modified title value if it differs from the value
if (strcmp($modified_tooltip_value, $tooltip_value) != 0) {
    $modified_tooltip_value .= <<<HTML
		<span class="phloor-menuitem-unmodified" name="phloor-menuitem-{$menuitem->guid}-tooltip">
			($tooltip_value)
		</span>
HTML;
}

$variable_output .= <<<HTML
	<div name="phloor-menuitem-{$menuitem->guid}-content" class="phloor-menuitem-content">
		<div><label for="phloor-menuitem-{$menuitem->guid}-title">$title_label</label>
		<span name="phloor-menuitem-{$menuitem->guid}-title">$modified_title_value</span></div>
		
		<div><label for="phloor-menuitem-{$menuitem->guid}-href">$href_label</label>
		<span name="phloor-menuitem-{$menuitem->guid}-href">$modified_href_value</span></div>
		
		<div><label for="phloor-menuitem-{$menuitem->guid}-tooltip">$tooltip_label</label>
		<span name="phloor-menuitem-{$menuitem->guid}-tooltip">$modified_tooltip_value</span></div>
	</div>
HTML;


//$body = $image . $variables_output;
$body = $variable_output;

$body .= elgg_view_title(elgg_echo('phloor_menuitem:submenuitems'));
if (!empty($submenuitem_list)) {
    $body .= $submenuitem_list;
} else {
    $body .= elgg_echo('phloor_menuitem:submenuitems:none');
}

$params = array(
	'entity'    => $menuitem,
	'metadata'  => $metadata,
	'title'     => false,
	'subtitle'  => $subtitle,
	'tags'      => $tags,
);

$params = $params + $vars;


// display image if it exists
if ($menuitem->hasImage()) {
    $size = 'tiny';
    $image_url = elgg_format_url($menuitem->getImageURL($size));
    
    $image_alt = elgg_view('phloor/output/avatar', array(
		'src'   => $image_url,
		'size'  => $size,
    	'alt'   => $modified_title_value,
    	'title' => $modified_title_value,
    ));

    $params['image_alt'] = $image_alt;
}

$summary = elgg_view('object/elements/summary', $params);

$menuitem_icon = elgg_view_entity_icon($menuitem, 'tiny');
$image_block = elgg_view_image_block($menuitem_icon, $summary, $params);


$content = $image_block . $body;

echo $content;



