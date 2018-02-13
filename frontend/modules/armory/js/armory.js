$(document).ready(function(){
    $('.previous-tab').click(function(e){
        if($('#armory_character_menu > .active').index() == 0){
            $('#armory_character_menu > li:nth-last-child(3)').find('a').trigger('click');
        }else{
            $('#armory_character_menu > .active').prev('li').find('a').trigger('click');
        }
        e.preventDefault();
    });
    $('.next-tab').click(function(e){
        if($('#armory_character_menu > .active').next('li').hasClass('previous-tab')){
            $('#armory_character_menu > li').first('li').find('a').trigger('click');
        }else{
            $('#armory_character_menu > .active').next('li').find('a').trigger('click');
        }
        e.preventDefault();
    });
});
$('#armory-form').submit(function() {
   window.location = $(this).attr("action") + '/' + $('#server').val() + '/' + $('#query').val();
   return false;
});