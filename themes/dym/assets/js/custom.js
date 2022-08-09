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
});
