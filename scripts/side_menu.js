var side_menu={
	init:function() {
	  //$('#side_menu ul').hide();
	  //$('#side_menu ul:first').show();
	  $('#side_menu li a').click(
		function() {
		  var checkElement = $(this).next();
		  if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
			return false;
			}
		  if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
			$('#side_menu ul:visible').slideUp('normal');
			checkElement.slideDown('normal');
			return false;
			}
               

		  }
		);
	     }
        }