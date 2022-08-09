$(document).ready(function($){
    //Validate form
    $("#email").keyup(function(){
        $(this).removeClass('is-invalid');
    });

    $("#password").keyup(function(){
        $(this).removeClass('is-invalid');
    });

    $("#confirm-password").keyup(function(){
        $(this).removeClass('is-invalid');
    });

    //Form register
    const progress = $('#progress');
    const prev = $("#btn-prev-js");
    const next = $("#btn-next-js");
    const submit = $("#btn-submit-js");
    const circles = $(".circle");
    const tabs = $(".register-tab");

    let currentActive = 1;

    next.click(() => {
        currentActive++;

        if (currentActive > circles.length) {
            currentActive = circles.length;
        }
        update();
    });

    prev.click(() => {
        currentActive--;

        if (currentActive < 1) {
            currentActive = 1;
        }

        update();
    });

    function update() {
        circles.each((idx, circle) => {
            if (idx < currentActive) {
                $(circle).addClass('active-progress');
            } else {
                $(circle).removeClass('active-progress');
            }
        });

        tabs.each((idx, tab) => {
            $(tab).addClass("d-none");
            if (idx == currentActive - 1) {
                $(tab).removeClass("d-none");
            }
        });

        const actives = $(".active-progress");

        progress.css('width', ((actives.length - 1) / (circles.length - 1)) * 100 + "%");

        if (currentActive === 1) {
            prev.addClass('d-none');
            submit.addClass('d-none');
        } else if (currentActive === circles.length) {
            next.addClass('d-none');
            submit.removeClass('d-none');
        } else {
            prev.removeClass('d-none');
            next.removeClass('d-none');
            submit.addClass('d-none');
        }
    }
});
