$(document).ready(function() {
    $(function () {$('.tltp').tooltip({animation: false})});
});
$(document).ready(function(){
    var percent = 0, bar = $('.transition-timer-carousel-progress-bar'), crsl = $('.carousel-with-indicator');
    function progressBarCarousel() {
        bar.css({width:percent+'%'});
        percent = percent +0.5;
        if (percent>100) {
            percent=0;
            crsl.carousel('next');
        }      
    }
    crsl.carousel({
        interval: false,
        pause: true
    }).on('slid.bs.carousel', function () {});var barInterval = setInterval(progressBarCarousel, 30);
    crsl.hover(
        function(){
            clearInterval(barInterval);
        },
        function(){
            barInterval = setInterval(progressBarCarousel, 30);
    });
});