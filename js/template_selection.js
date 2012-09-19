jQuery(document).ready(function($) {

	if($('#page_template').length) {
		$('#page_template').hide().after('<div id="page_template_visual"></div>');

		$('#page_template option').each(function(){
			var classname = $(this).val().replace('.php', '');
			if ($(this).is("[selected]")) {
				classname = classname+' selected';
			}
			$('#page_template_visual').append('<a href="'+$(this).val()+'" class="'+classname+'"><small></small>'+$(this).text()+'</a>');
		});

		if (!$('#page_template option[selected]').length) {
			$('#page_template_visual a:first-child').addClass('selected');
		}

		$('#page_template_visual a').live('click',function(){
			$('#page_template_visual a').removeClass('selected');
			theValue = $(this).addClass('selected').attr('href');
			$("#page_template").val( theValue ).attr('selected',true);
			return false;
		});

	}

});
