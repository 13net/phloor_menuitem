<?php

?>
elgg.provide('phloor_menuitem.sortable');

phloor_menuitem.sortable.init = function() {

	// make the phloor-list-menuitem list sortable
	$(".phloor-list-phloor_menuitem").sortable({ 
		opacity: 0.7, 
		cursor: 'move', 
		update: function(event, ui) {
    		var order = $(this).sortable("serialize");
    
    		//elgg.action('phloor_menuitem/sort', {
    		//	data: order,
    		//	success: function(json) {
    		//		elgg.system_message(elgg.echo("phloor_menuitem:sort:success"));
    		//	}
    		//});
    		var action = elgg.security.addToken(elgg.get_site_url() + "action/phloor_menuitem/sort");
    		$.post(action, order, function(response){
    			elgg.system_message(elgg.echo("phloor_menuitem:sort:success"));
    		});
    	}
	});
}
 
elgg.register_hook_handler('init', 'system', phloor_menuitem.sortable.init);

<?php
