$(document).ready(function() { 
   $('#filter').change(function(){
    $('images').hide();
    $('.'+$(this).val()).show();
});
 });