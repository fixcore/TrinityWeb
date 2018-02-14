$(document).ready(function() {
    $(function () {$('.tltp').tooltip({animation: false})});
});
$(document).ready(function(){
    var percent = 0, bar = $('.transition-timer-carousel-progress-bar'), crsl = $('.carousel-with-indicator');
    function progressBarCarousel() {
        bar.css({width:percent+'%'});
        percent = percent + 0.1;
        if (percent>100) {
            percent=0;
            if(crsl) {
                crsl.carousel('next');
            }
        }      
    }
    crsl.carousel({
        interval: false,
        pause: true
    }).on('slid.bs.carousel', function () {});var barInterval = setInterval(progressBarCarousel, 5);
    crsl.hover(
        function(){
            clearInterval(barInterval);
        },
        function(){
            barInterval = setInterval(progressBarCarousel, 5);
    });
});