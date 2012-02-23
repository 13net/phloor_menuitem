/**
 * Phloor Menuitem
 * 
 * @package phloor_menuitem
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author void <void@13net.at>
 * @copyright 2011, 2012 by 13net
 * @link http://www.13net.at/
 */

/**
 * Description
 */
Menuitems for your Elgg site. 
Enables creating and managing 'Menuitem' entities by administrators.

This plugin is in beta stage at the moment - therefore  it is not recommended 
to use it on productive sites.

I will keep updating this description with more detailed information regularly.

Hooking into the menu is enabled as soon as the first menuitem has been 
created. Creating menu items is limited to the administrators. You can create 
and manage menu items either in the admin view or even (and i dont know but i 
prefer that one) in the 'normal' one.

Attributes of an menuitem entity are:

    title: the title displayed
    href: the target url
    tooltip: (optional) a tooltip viewed when hovering the item
    target: (optional) the target window (not supported yet)
    image: (optional) an icon
    priority: the priority when ordering the menu

You can upload an icon for nearly every kind of menu item.. please report any 
issues with the displaying or handling of icons. In the plugin settings one 
can define whether the 'more' section of the sitemenu is shown.

Reording can just be done via the 'priority' attribute at the moment (will be 
working on an ajax interface to sort drag and drop them.. when i have got time) 
from 1 (high priority) to 999 (low priority).. default is 500

At the moment it is limited to 2-level hierarchies. That means no 
"sub-sub-menues". But more accurate: the displaying is limited to 2-level 
hierarchies.. "creating" the hierarchy-tree is already possible and you are 
encouraged to do so.. because the code and style sheets for n-level menu will 
come in the near future.

Admin section. the plugin removes the "Menu items" from the code plugin and 
replaces it, with its own. -> that means you should give this plugin total 
control of the menu. the plugin hook for arranging the menu like in the default 
installation is disabled _as soon as an element as been created_. you can create 
entries of "News", "Members" , "Blogs".. and even recreate the "More" menu by 
yourself.

Special Patterns. There are special patterns that get replaced when you use them 
in the title, the 'href' orthe tooltip.. the standard ones are:

    - %wwwroot%: gets replaced with the sites urls
    - %username%: the username of the current logged in user

(please keep in mind, that for example the '%username%' pattern can only be 
applied, if theread access for this menu item is set to 'ACCESS_LOGGEDIN' 
a.k.a 'logged in only')

You can easily extern these special patterns with hooking into the

Plugin hooks

    - 'plugin hook 'phloor_menuitem_replace_special_patterns', 'all'
    - 'plugin hook 'phloor_menuitem_replace_special_patterns', 'title'
    - 'plugin hook 'phloor_menuitem_replace_special_patterns', 'href'
    - 'plugin hook 'phloor_menuitem_replace_special_patterns', 'tooltip' 

Works fine with the standard menu theme - contains slighly modified css rules for 
sub-menus. (see 'more' section in Screenshot 'Phloor Menuitem In Action [2]') Also 
adds the css for a basic dropdown menu for the topbar (if a topbar item has child 
items) - please.. feel free to adapt this as this is only quick and dirty at the 
moment (maybe send me your improvements?)


/**
 * Todo
 */
- currently the site menu is loaded at boot time.. 
  and every item is selected from the database..
  maybe load just useful information from config
  at boot up?

/**
 * Overwrite view
 */
- navigation/menu/site

/**
 * Languages
 */
English
German
French

/**
 * Icons
 */
This plugin uses icons from the amazing famfamfam silk icon set:
Please visit: http://www.famfamfam.com/lab/icons/silk/
Thank you Mr Mark James for this great work.
