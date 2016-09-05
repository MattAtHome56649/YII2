$( document ).ready(function() {
	function change_quantity(obj, oper){
    	$(obj).parents('tr').find('input.quantity_field').val(function(i, o) {
    		o = parseInt(o, 10);
    		return oper == 'plus' ? ++o : o > 0 ? --o : o;
		});
	}
    $('.glyphicon-plus').bind('click',function(){
    	change_quantity(this, 'plus');
    });
    $('.glyphicon-minus').bind('click',function(){
		change_quantity(this, 'minus');
    });
    $('input.quantity_field').bind('change', function(){
    	$(this).val(parseInt($(this).val()));
    	$(this).attr('value', parseInt($(this).val(), 10));
    });
});