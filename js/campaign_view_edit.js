$( document ).ready(function() {
	$('.btn-toggle').click(function() {
		$(this).find('.btn').toggleClass('active');  
		if ($(this).find('.btn-primary').size()>0) {
			$(this).find('.btn').toggleClass('btn-primary');
			$(this).find('.btn').toggleClass('btn-default');
		}
	});
	$('.editable').editable({
		disabled: true,
		mode: 'inline',
		success: function() {
			$(this).editable('toggleDisabled')
		}
	});
	$('a.edit_button').click(function(e){
		var target = $(this).data('for');
		e.stopPropagation();
    	$('#'+target).editable('toggleDisabled');
    	$('#'+target).editable('toggle');
    	return false;
	});
	//$('#enable').click(function() {
	//$('.editable').editable('toggleDisabled');
	//}); 

});