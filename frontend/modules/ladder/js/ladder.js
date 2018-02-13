$('#ladder-form').submit(function() {
   window.location = $(this).attr("action") + '/' + $('#server').val() + '/' + $('#type').val();
   return false;
});