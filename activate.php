<?php

if (get_subtype_id('object', 'phloor_menuitem')) {
    update_subtype('object', 'phloor_menuitem', 'PhloorMenuitem');
} else {
    add_subtype('object', 'phloor_menuitem', 'PhloorMenuitem');
}