jQuery().ready(function(){	

	// theme switcher
	if ($('#switcher').length)
	{
	  $('#switcher').themeswitcher();
	}

  // all hover and click logic for buttons
  $(".fg-button:not(.ui-state-disabled)")
  .hover(
      function(){
          $(this).addClass("ui-state-hover");
      },
      function(){
          $(this).removeClass("ui-state-hover");
      }
  )
  .mousedown(function(){
          $(this).parents('.fg-buttonset-single:first').find(".fg-button.ui-state-active").removeClass("ui-state-active");
          if( $(this).is('.ui-state-active.fg-button-toggleable, .fg-buttonset-multi .ui-state-active') ){$(this).removeClass("ui-state-active");}
          else {$(this).addClass("ui-state-active");}
  })
  .mouseup(function(){
      if(! $(this).is('.fg-button-toggleable, .fg-buttonset-single .fg-button,  .fg-buttonset-multi .fg-button') ){
          $(this).removeClass("ui-state-active");
      }
  });

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
		$('#sf_admin_filter_button')
			.addClass('sf_button-toggleable')
			.click(function(e) {
			  e.preventDefault();
				$('.sf_admin_filter').dialog('isOpen') ? $('.sf_admin_filter').dialog('close') : $('.sf_admin_filter').dialog('open');
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
		$('.sf_admin_list caption h1').click(function(){
		  $('.sf_admin_list table tbody, .sf_admin_list table thead, .sf_admin_list table tfoot').toggle();
		});

		// mouseover and click on table row
		$('.sf_admin_list table tbody tr')
		.hover(
			function() {
			  $(this).addClass('ui-state-hover');
			},
			function() {
			  $(this).removeClass('ui-state-hover');
			}
		)
		.click(function(e) {
			// change row color
			$(this).toggleClass('ui-state-highlight');
			// change checkbox status
			var chx = $(this).find('input:checkbox');
			if ($(this).hasClass('ui-state-highlight')) $(chx).attr('checked','checked');
			else $(chx).removeAttr('checked');
		});

    // batch actions
    $('.sf_admin_batch_actions_choice select').selectmenu({
      style: 'dropdown',
      width: 200
    });
	}

	/*
		Javascript for form view only
	*/
	if ($('.sf_admin_form').length)
	{
    // tabs for form edition
    $('#sf_admin_form_tab_menu').tabs().addClass('ui-tabs-vertical ui-helper-clearfix');
    $('#sf_admin_form_tab_menu li').removeClass('ui-corner-top').addClass('ui-corner-all');

    // default size for input
    $('input[type="text"], input[type="password"]').each(function(){
      if ($(this).attr('size') == 0 || $(this).attr('size') == 20) {
        $(this).attr({ size: 60 });
      }
    });

    // default size for textarea
    $('textarea').each(function(){
      if ($(this).attr('rows') == 4 && $(this).attr('cols') == 30) {
        $(this).attr({ cols: 58, rows: 5 });
      }
    });

    // added focused state to inputs
    $(':input')
    .focus(function() {
			//$(this).closest('.sf_admin_form_row').addClass('focused ui-state-active ui-corner-all');
			//$(this).closest('.sf_admin_form_row').addClass('focused ui-state-default ui-corner-all');
			$(this).closest('.sf_admin_form_row:not(.ui-state-error)').addClass('focused ui-state-highlight ui-corner-all');
		})
		.blur(function() {
			//$(this).closest('.sf_admin_form_row').removeClass('focused ui-state-active ui-corner-all');
			//$(this).closest('.sf_admin_form_row').removeClass('focused ui-state-default ui-corner-all');
			$(this).closest('.sf_admin_form_row:not(.ui-state-error)').removeClass('focused ui-state-highlight ui-corner-all');
		});

		// check error messages in all tabs
		$('.ui-tabs-panel:has(span.ui-icon-alert)').each(function(i) {
		  $('.ui-tabs-nav a[href=#' + this.id + ']').prepend('<span class="ui-state-error-text"><span class="ui-icon ui-icon-alert floatright"></span></span>');
		});
	}

});
