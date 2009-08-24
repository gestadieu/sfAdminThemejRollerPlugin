jQuery().ready(function(){	

	//all hover and click logic for UI buttons
	$(".sf_button:not(.ui-state-disabled)")
	.hover( 
		function(){ $(this).removeClass('ui-state-default').addClass("ui-state-hover"); },
		function(){ $(this).removeClass("ui-state-hover").addClass('ui-state-default'); }
	);

	/*
		Javascript for list view only
	*/
	if ($('.sf_admin_list').length)
	{
		// actions menu on list view
		$('#sf_admin_actions_button').menu({ 
			content: $('#sf_admin_actions_menu').html(),
			showSpeed: 300
		});
		
		// filter button to show the modal window of available filters
		$('#sf_admin_filter_button a')
			.addClass('sf_button-toggleable')
			.click(function() {
				$('.sf_admin_filter').dialog('isOpen') ? $('.sf_admin_filter').dialog('close') : $('.sf_admin_filter').dialog('open');
				return false;
			});

		// modal window for filters
		$('.sf_admin_filter').dialog({
			autoOpen: false,
			width: 600,
			close: function(evt, ui){
				$('#sf_admin_filter_button').removeClass('ui-state-active');
			},
			open: function(evt,ui){
				$('#sf_admin_filter_reset, #sf_admin_filter_submit').hide();
				$('#sf_admin_filter_button').addClass('ui-state-active');
			},
			buttons: {
				"Filter": function() { 
					$(this).dialog("close"); 
					$('#sf_admin_filter_submit').parents('form').submit();
				}, 
				"Reset": function() { 
					$(this).dialog("close");
					location.href = $('#sf_admin_filter_reset').attr('href');
				} 
			}
		});

		// toggle table visibility on caption title
		$('.sf_admin_list caption h1').click(function(){ $('.sf_admin_list table tbody,.sf_admin_list table thead,.sf_admin_list table tfoot').toggle()});
		
		// mouseover and click on table row
		$('.sf_admin_list table tbody tr')
			.hover(
				function(){	$(this).addClass('ui-state-hover') },
				function() { $(this).removeClass('ui-state-hover') }
			)
		.click(function(e) {
			// change row color
			$(this).toggleClass('ui-state-highlight');
			// change checkbox status
			var chx = $(this).find('input:checkbox');
			if ($(this).hasClass('ui-state-highlight')) $(chx).attr('checked','checked');
			else $(chx).removeAttr('checked');
		});
	}
	
	/*
		Javascript for form view only
	*/
	if ($('.sf_admin_form').length)
	{
		// tabs for form edition
		$('#sf_admin_form_tab_menu').tabs();
	}

});
