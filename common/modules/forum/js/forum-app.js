function collapseCategory(element) {
    var element_to_change = $(element).find('span.glyphicon');
    if($(element).attr('aria-expanded') == 'true') {
        $(element_to_change).removeClass('glyphicon-chevron-up');
        $(element_to_change).addClass('glyphicon-chevron-down');
    } else {
        $(element_to_change).removeClass('glyphicon-chevron-down');
        $(element_to_change).addClass('glyphicon-chevron-up');
    }
}