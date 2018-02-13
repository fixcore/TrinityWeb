$('#ladder-form').submit(function() {
    if($('#server').val() && $('#type').val()) {
        window.location = $(this).attr("action") + '/' + $('#server').val() + '/' + $('#type').val();
    }
    return false;
});