<?php

$french = array(
	'admin:appearance:phloor_menuitem' => "Elément des Menus",

	'phloor_menuitem' => "Elément Menu",
	'phloor_menuitem:menuitem' => "Menu",
	'phloor_menuitem:menuitems' => "Eléments Menu",
	'phloor_menuitem:phloor_menuitem' => "Menu",
	'phloor_menuitem:phloor_menuitems' => "Eléments Menu",

	'item:object:phloor_menuitem' => "Menu",

	'phloor_menuitem:target:_self'  => "Ouvrir dans le même tableau",
	'phloor_menuitem:target:_blank' => "Ouvrir dans un nouveau tableau",

	'phloor_menuitem:admin:appearance:title' => "Menu de votre site",
	'phloor_menuitem:admin:appearance:description' => "Ici vous pouvez gérer les menus de votre site. ",
	'phloor_menuitem:admin:appearance:entity_count' => "Comptage des menus : %s ",
	'phloor_menuitem:admin:appearance:new_menuitem:title' => "Créer un nouveau menu",

	'phloor_menuitem:menu_name' => "Menu* : ",
	'phloor_menuitem:title'     => "Titre* : ",
	'phloor_menuitem:href'      => "Url* : ",
	'phloor_menuitem:tooltip'   => "Info-bulle : ",
	'phloor_menuitem:image'     => "Image : ",
	'phloor_menuitem:priority'  => "Priorité : ",
	'phloor_menuitem:access_id' => "Accès Lecture : ",
	'phloor_menuitem:target'    => "Cible : ",

	'phloor_menuitem:menu_name:description' => "",
	'phloor_menuitem:title:description'     => "Les motifs spéciaux : %username%, %wwwroot% (interceptés dans des motifs ne sont pas actuellement montrés) ",
	'phloor_menuitem:href:description'      => "Insérez l'URL de l'élément de menu devrait être la référence. Les motifs spéciaux : %username%, %wwwroot% (interceptés dans des motifs ne sont actuellement pas montrés) ",
	'phloor_menuitem:tooltip:description'   => "L'infobulle s'affichera, quand un utilisateur survolera un élément de menu. Les motifs spéciaux : %username%, %wwwroot% (interceptés dans des motifs ne sont ne sont pas actuellement montrés) ",
	'phloor_menuitem:image:description'     => "Chargez une image. L'image sera redimensionnée aux résolutions suivantes : 16x16 , 60x60, 153x153 et 600x600. ",
	'phloor_menuitem:priority:description'  => "",
	'phloor_menuitem:access_id:description' => "Qui est autorisé à voir ce menu ? ",
	'phloor_menuitem:target:description'    => "(Ce n'est pas actuellement pris en charge) ",

	'phloor_menuitem:message:prioritywassetto500' => "La Priorité a été mise à 500. ",
	'phloor_menuitem:message:saved' => "Le menu a été créé avec succès. ",
	'phloor_menuitem:message:deleted_menuitem' => "Le menu a été effacé avec succès. ",
	'phloor_menuitem:error:cannot_save' => "Le menu ne peut pas être sauvegardé. ",
	'phloor_menuitem:error:cannot_edit_menuitem' => "Le menu ne peut pas être édité. ",
	'phloor_menuitem:error:cannot_delete_menuitem' => "Le menu ne peut pas être effacé. ",

	'phloor_menuitem:error:menuitem_not_found' => "Menu non trouvé. ",
	'phloor_menuitem:error:wrong_mimetype' => "L'image que vous avez chargé n'est pas valide. Erreur 483 :Type MIME % s invalide. ",
	'phloor_menuitem:error:missing:title' => "S'il vous plait insérer un titre. ",
	'phloor_menuitem:error:missing:description' => "S'il vous plait insérer une description. ",
	'phloor_menuitem:error:missing:image' => "S'il vous plait charger une image. ",

	'phloor_menuitem:title:all_phloor_menuitems' => "Tous les menus",
	'phloor_menuitem:title:all_phloor_menuitem'  => "Tous les menus",
	'phloor_menuitem:title:friends' => "Menu des Amis",
	'phloor_menuitem:title:user_phloor_menuitem'  => "Vos menus",
	'phloor_menuitem:title:user_phloor_menuitems' => "Vos menus",

	'phloor_menuitem:edit' => "Editer",
	'phloor_menuitem:add' => "Ajouter des éléments de menus",
	'phloor_menuitem:none' => "Aucune élément de menu trouvé. ",

	'menuitem:edit' => "Editer",
	'menuitem:add' => "Ajouter des éléments de menus",
	'menuitem:none' => "Aucune élément de menu trouvé. ",

	'phloor_menuitem:newchild' => "Ajouter une sous rubrique",	
	'phloor_menuitem:submenuitems' => "Sous élément de ce menu: ",
	'phloor_menuitem:submenuitems:none' => "Ce menu n'a pas encore de sous éléments. ",

	'phloor_menuitem:moveditemsonlevelup' => "Les éléments suivants ont été déplacés d'une place vers le haut dans l'arbre de menu : %s",	

	'phloor_menuitem:hide_menu_site_more:title' => "Section menu 'plus' du site",	
	'phloor_menuitem:hide_menu_site_more_public' => "Cacher la section 'plus' pour les invités ? ",	
	'phloor_menuitem:hide_menu_site_more_loggedin' => "Cacher la section 'plus' pour les utilisateurs connectés ? ",	

	'phloor_menuitem:specialpatternusage' => "A l'utilisation le motif %wwwroot% sera remplacé par l'URL du site, le motif %username% sera remplacé par le nom d'utilisateur des utilisateurs actuellement connectée. Si vous utilisez le %username% vous devez restreindre l'accès en lecture aux utilisateurs connectés. ",

);

add_translation("fr", $french);
