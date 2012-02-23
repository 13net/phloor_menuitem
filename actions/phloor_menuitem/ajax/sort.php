<?php
/*****************************************************************************
 * Phloor Menuitem                                                           *
 *                                                                           *
 * Copyright (C) 2012, 2011 Alois Leitner                                    *
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
admin_gatekeeper();

$user = elgg_get_logged_in_user_entity();
$menuitem_list = get_input('elgg-object', array(), true);

$priority = 10;
$step     = 10;
foreach ($menuitem_list as $_ => $menuitem_guid) {
    $menuitem = get_entity($menuitem_guid);
    if (\phloor_menuitem\instance_of($menuitem) && 
        $menuitem->canEdit($user->guid) &&
        $menuitem->getPriority() != $priority) {
        
        $menuitem->setPriority($priority);
        $menuitem->save();
    }
    
    $priority += $step;
}
