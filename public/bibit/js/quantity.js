$(document).ready(function(){
    $('.qtyplus').click(function(e){
        e.preventDefault();
        var container = $(this).parents('.xQty');
        fieldName = $(this).attr('field');
        var currentVal = parseInt( container.children(".qtyValue").val() );
        var val2 = currentVal + 1;
        if (!isNaN(val2)) {
            container.children(".qtyValue").val(val2);
        } else {
            container.children(".qtyValue").val(0);
        }
    });
  
    $(".qtyminus").click(function(e) {
        e.preventDefault();
        var container = $(this).parents('.xQty');
        fieldName = $(this).attr('field');
        var currentVal = parseInt( container.children(".qtyValue").val() );
        if (!isNaN(currentVal) && currentVal > 1) {
            container.children(".qtyValue").val(currentVal - 1);
        } else {
            container.children(".qtyValue").val(1);
        }
    });
});