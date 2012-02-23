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
 * Create the css for the icons in the menus
 *
 * have to use #elgg-menu-site here too
 * because the sooperfish menu disables
 * the elgg-menu.. maybe it should not do that?
 */
$menuitems = \phloor_menuitem\get_entities(array(
	'offset'  => 0,
	'limit'   => 0,
));

$css = '';
foreach($menuitems as $menuitem) {
    if(\phloor_menuitem\instance_of($menuitem) && $menuitem->hasImage()) {
        $background_image_url = $menuitem->getImageURL('topbar');

        if(!empty($background_image_url)) {
            // append to css
            $css .= <<<CSS
.elgg-menu li.elgg-menu-item-phloor-menuitem-{$menuitem->guid} > a,
.elgg-menu li.elgg-menu-item-phloor-menuitem-{$menuitem->guid}:hover > a,
.elgg-menu li.elgg-menu-item-phloor-menuitem-{$menuitem->guid} > a:hover {
	background-image:url('{$background_image_url}');
	background-repeat:no-repeat;
	background-position:3px center;
	padding-left:24px;
}
CSS;
        }
    }

}

echo $css;

