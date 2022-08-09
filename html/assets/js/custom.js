jQuery(document).ready(function($){
    //ScrollTop
    let scrollTop = $('#scrollTop');

    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            scrollTop.show().fadeIn();
        } else {
            scrollTop.fadeOut().hide();
        }
    });

    scrollTop.click(function(){
        $('html, body').animate({scrollTop : 0}, "slow");
        return false;
    });

    //Top pages after 5s hidden
    setTimeout(() => {
        $('#hide-alert').alert('close')
    }, 5000);
    var is_mobile = false;

    if( $('.header-news').css('flex-direction')=='colunm') {
        is_mobile = true;       
    }

    // now I can use is_mobile to run javascript conditionally

    if (is_mobile == true) {
        //Conditional script here
        $('.search-featured-list').slick({
            slidesToShow: 2,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });
    }
  
});
