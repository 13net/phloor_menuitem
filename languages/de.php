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

$german = array(
    'admin:plugins:category:menu' => 'Menü',
	'admin:appearance:phloor_menuitem' => 'Menüeintrag',

/* lately added keys */
    'phloor_menuitem:guests_only' => 'Nur für Gäste',

    'phloor_menuitem:form:guests_only' => 'Für eingeloggte User ausblenden? ',
    'phloor_menuitem:guests_only:description' => 'Diese Option bewirkt, dass der Menüeintrag für eingeloggte User ausgeblendet wird und dadurch nur für nicht registrierte/ausgeloggte User sichtbar ist. ',

    'phloor_menuitem:view_menu' => 'Menü anzeigen',
    'phloor_menuitem:sort:success' => 'Reihenfolge gespeichert.',

    'phloor_menuitem:form:contexts' => 'Kontext',
    'phloor_menuitem:contexts:description' => 'Eine mit Beistrichen getrennte Liste von Kontexten in denen der Menüeintrag angezeigt werden soll. Standwert ist "all" (immer anzeigen).',
/* lately added keys - END*/

	'phloor_menuitem' => 'Menüeinträge',
	'phloor_menuitem:menuitem' => 'Menuitem',
	'phloor_menuitem:menuitems' => 'Menüeinträge',
	'phloor_menuitem:phloor_menuitem' => 'Menüeintrag',
	'phloor_menuitem:phloor_menuitems' => 'Menüeinträge',

	'item:object:phloor_menuitem' => 'Menüeintrag',

	'phloor_menuitem:target:_self'  => 'Im selben Tab öffnen',
	'phloor_menuitem:target:_blank' => 'In neuem Tab öffnen',

	'phloor_menuitem:admin:appearance:title' => "Menü-Übersichtseite",
	'phloor_menuitem:admin:appearance:description' => "Hier können Sie die Menüs und Menüeinträge Ihrer Seite verwalten. ",
	'phloor_menuitem:admin:appearance:entity_count' => "Menüeinträge insgesamt: %s ",
	'phloor_menuitem:admin:appearance:new_menuitem:title' => 'Neuen Menüeintrag erstellen ',

	'phloor_menuitem:form:menu_name' => 'Menü*: ',
	'phloor_menuitem:form:title'     => 'Titel*: ',
	'phloor_menuitem:form:href'      => 'URL*: ',
	'phloor_menuitem:form:tooltip'   => 'Tooltip: ',
	'phloor_menuitem:form:image'     => 'Icon: ',
	'phloor_menuitem:form:priority'  => 'Prioriät: ',
	'phloor_menuitem:form:access_id' => 'Leserechte: ',
	'phloor_menuitem:form:target'    => 'Zielfenster: ',
	'phloor_menuitem:form:delete_image' => 'Momentanes Icon löschen? ',

	'phloor_menuitem:menu_name' => 'Menü: ',
	'phloor_menuitem:title'     => 'Titel: ',
	'phloor_menuitem:href'      => 'URL: ',
	'phloor_menuitem:tooltip'   => 'Tooltip: ',
	'phloor_menuitem:image'     => 'Icon: ',
	'phloor_menuitem:priority'  => 'Prioriät: ',
	'phloor_menuitem:access_id' => 'Leserechte: ',
	'phloor_menuitem:target'    => 'Zielfenster: ',
	'phloor_menuitem:delete_image' => 'Momentanes Icon löschen? ',

	'phloor_menuitem:menu_name:description' => '',
	'phloor_menuitem:title:description'     => 'Besondere Ausdrücke: %username%, %wwwroot% (Mögliche zusätzliche Ausdrücke werden momentan nicht angezeigt) ',
	'phloor_menuitem:href:description'      => 'Geben Sie die URL, auf die dieser Menüeintrag verlinken soll, an. Besondere Ausdrücke: %username%, %wwwroot%',
	'phloor_menuitem:tooltip:description'   => 'Optional. Der Tooltip wird angezeigt, sobald ein User mit der Maus länger über diesen Eintrag verweilt. Besondere Ausdrücke: %username%, %wwwroot%',
	'phloor_menuitem:image:description'     => 'Definieren Sie ein Icon für den Menüeintrag. Bitte beachten Sie, dass dies nicht bei jedem Menü möglich ist. Das Icon wird intern auf die Auflösungen 16x16, 60x60 und 153x153 zugeschnitten. ',
	'phloor_menuitem:priority:description'  => '',
	'phloor_menuitem:access_id:description' => 'Mit dieser Einstellung können Sie die Sichtbarkeit des Eintrags einschränken (zum Beispiel: nur für eingeloggte User). ',
	'phloor_menuitem:target:description'    => '(Diese Einstellung wird momentan nicht unterstützt.) ',
	'phloor_menuitem:delete_image:description' => 'Das Aktivieren dieser Checkbox resultiert in der Löschung des momentan eingestellten Icons. ',

	'phloor_menuitem:message:menuitemimagedircreated' => "Das Icon-Verzeichnis für Menüeinträge 'phloor_menuitem/' wurde erfolgreich angelegt. ",
	'phloor_menuitem:message:prioritywassetto500' => 'Die Priorität wurde auf den Standardwert 500 gestellt. ',
	'phloor_menuitem:message:saved' => 'Menüeintrag erfolgreich gespeichert. ',
	'phloor_menuitem:message:deleted_menuitem' => 'Der Menüeintrag erfolgreich gelöscht. ',
	'phloor_menuitem:error:cannot_save' => 'Der Menüeintrag konnte nicht gespeichert werden. ',
	'phloor_menuitem:error:cannot_edit_menuitem' => 'Der Menüeintrag konnte nicht editiert werden. ',
	'phloor_menuitem:error:cannot_delete_menuitem' => 'Der Menüeintrag konnte nicht gelöscht werden. ',

	'phloor_menuitem:error:menuitem_not_found' => 'Kein Menüeintrag gefunden. ',
	'phloor_menuitem:error:wrong_mimetype' => 'Das angebene Icon ist invalid. Error 483: Invalid mimetype %s ',
	'phloor_menuitem:error:missing:title' => 'Bitte geben Sie einen Titel an. ',
	'phloor_menuitem:error:missing:description' => 'Bitte geben Sie eine Beschreibung an. ',

	'phloor_menuitem:title:all_phloor_menuitems' => 'Alle Menüeinträge',
	'phloor_menuitem:title:all_phloor_menuitem'  => 'Alle Menüeinträge',
	'phloor_menuitem:title:friends' => 'Menüeinträge von Freunden',
	'phloor_menuitem:title:user_phloor_menuitem'  => 'Meine Menüeinträge',
	'phloor_menuitem:title:user_phloor_menuitems' => 'Meine Menüeinträge',

	'phloor_menuitem:edit' => 'Editieren',
	'phloor_menuitem:add' => 'Menüeintrag erstellen',
	'phloor_menuitem:none' => 'Keine Menüeinträge gefunden. ',

	'menuitem:edit' => 'Editieren',
	'menuitem:add' => 'Menüeintrag erstellen',
	'menuitem:none' => 'Keine Menüeinträge gefunden. ',

	'phloor_menuitem:newchild' => 'Sub-Eintrag erstellen',
	'phloor_menuitem:submenuitems' => 'Sub-Einträge dieses Menüeintrags: ',
	'phloor_menuitem:submenuitems:none' => 'Dieser Menüeintrag hat noch keine Sub-Einträge. ',

	'phloor_menuitem:moveditemsonlevelup' => "Folgende Einträge wurden eine Hierarchiestufe höher gesetzt: %s",

	'phloor_menuitem:settings:menu:more:title' => "Hauptmenü Sektion 'Mehr' ",
	'phloor_menuitem:settings:menu:more:hide:public:label' => "Die Sektion 'Mehr' für NICHT eingeloggte User (Gäste) ausblenden? ",
	'phloor_menuitem:settings:menu:more:hide:loggedin:label' => "Die Sektion 'Mehr' für EINGELOGGTE User ausblenden? ",

	'phloor_menuitem:specialpatternusage' => 'Der Ausdruck %wwwroot% wird mit der URL Ihrer Seite ersetzt. Der Ausdruck %username% wird mit dem Usernamen des momentan eingeloggten User ersetzt (wenn Sie diesen Ausdruck verwenden, muss die Sichtbarkeit auf eingeloggte User beschränkt werden). ',

	'phloor_menuitem:backtoparent' => "Übergeordneter Eintrag",

	'phloor_menuitem:settings:general:title'                            => "Allgemein",
	'phloor_menuitem:settings:general:disable_modified_css:label'       => "Deaktivieren der CSS-Fixes für das Elgg Standard Theme? ",
	'phloor_menuitem:settings:general:disable_modified_css:description' => "Es wird empfohlen die CSS-Styles zu deaktivieren, wenn Sie NICHT das Elgg Standard Theme benützen (dazu gehören zum Beispiel 'Purity' oder das 'Facebook Theme'). Die Deaktivierung kann die korrekte Darstellung von Submenüs beeinflussen. ",
);

add_translation("de", $german);
