const setStorage = (key, value) => localStorage.setItem(key, JSON.stringify(value));
const getStorage = (key) => JSON.parse(localStorage.getItem(key));

//Validates
const validateStep = () => {
    let isInvalids = $('.is-invalid');
    isInvalids.each((idx, el) => {
        $(el).keyup(() => {
            $(el).removeClass('is-invalid');
        });
        $(el).change(() => {
            $(el).removeClass('is-invalid');
        });
    });
}

$(document).ready(function($){
    //Validate form
    $('.eye-js').click(function() {
        let act = $(this).attr('data-active');
        if (act === 'unactive') {
            $(this).attr('data-active', 'active');
            $(this).next().attr('type', 'text');
        } else {
            $(this).attr('data-active', 'unactive');
            $(this).next().attr('type', 'password');
        }
    });

    //Form register
    const progress = $('#progress');
    const btnPrev = $("#btn-prev-js");
    const btnNext = $("#btn-next-js");
    const btnSubmit = $("#btn-submit-js");
    const circles = $(".circle");
    const tabs = $(".register-tab");
    const prefecture = $('#prefecture');

    let currentActive = 1;

    //Button next js
    async function postRegisterStep1(storeData, url) {
        try {
            let res = await axios.post(url, storeData);
            let data = res.data;
            if (data.status == 200) {
                if (data.message == 'error') {
                    $('#email').addClass('is-invalid');
                    $('.email').removeClass('d-none').addClass('invalid-feedback').text(data.emailUnique);
                } else {
                    setStorage('storeDataStep1',data.storeDataStep1);
                    suggestPrefectures();
                    currentActive++;
                    if (currentActive > circles.length) {
                        currentActive = circles.length;
                    }

                    update();
                }
            } else if (data.status == 400) {
                console.info(data.message);
            }
        } catch (error) {
            if (error.response.status == 422) {
                let errors = error.response.data.errors;
                $.each(errors, (el, err) => {
                    $('#' + el).addClass('is-invalid');
                    $('.' + el).removeClass('d-none').addClass('invalid-feedback').text(err[0]);
                });
                validateStep();
            }
        }
    }
    async function postRegisterStep2(storeData, url) {
        try {
            let res = await axios.post(url, storeData);
            let data = res.data;
            if (data.status == 200) {
                if (data.message == 'error') {
                    $('#zipcode').addClass('is-invalid');
                    $('.zipcode').removeClass('d-none').addClass('invalid-feedback').text(data.zipcodeNotExit);
                } else {
                    setStorage('storeDataStep2',data.storeDataStep1);
                    suggestPrefectures();
                    currentActive++;
                    if (currentActive > circles.length) {
                        currentActive = circles.length;
                    }

                    update();
                }
            } else if (data.status == 400) {
                console.info(data.message);
            }
        } catch (error) {
            if (error.response.status == 422) {
                let errors = error.response.data.errors;
                $.each(errors, (el, err) => {
                    $('#' + el).addClass('is-invalid');
                    $('.' + el).removeClass('d-none').addClass('invalid-feedback').text(err[0]);
                });
                validateStep();
            }
        }
    }

    btnPrev.click(() => {
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
            btnPrev.addClass('d-none');
            btnSubmit.addClass('d-none');
        } else if (currentActive === circles.length) {
            btnNext.addClass('d-none');
            btnSubmit.removeClass('d-none');
        } else {
            btnPrev.removeClass('d-none');
            btnNext.removeClass('d-none');
            btnSubmit.addClass('d-none');
        }
    }
    suggestPrefectures();
    function suggestPrefectures() {
        let getUrl = $('#getUrlPrefecture').val();
        axios.get(getUrl).then(function (response) {
            let prefectures = response.data.values;
            let s = $('select[name="prefecture"]');
            let dataEmpty = $('#getOptionEmpty').val();
            let html = `<option value="">${dataEmpty}</option>`;
            $.each(prefectures, (el, pre) => {
                html += `<option value="${pre.value}">${pre.name}</option>`
            });
            s.html(html);
            s.find('option:eq(0)').prop('selected', true);
            s.trigger('change');
        }).catch(function (error) {
            console.info(error);
        });
    }
    prefecture.change(function () {
        let id = $(this).val();
        console.log(id);
        if (id != '') {
            suggestCities(id);
        }
    });
    function suggestCities(id) {
        let getUrl = $('#getUrlCity').val();
        axios.get(getUrl, {
            responseType: 'json', params: {q: id}
        }).then(function (response) {
            let cities = response.data.values;
            let s = $('select[name="city"]');
            let dataEmpty = $('#getOptionCityEmtpy').val();
            let html = `<option value="">${dataEmpty}</option>`;
            $.each(cities, (el, city) => {
                html += `<option value="${city.value}">${city.name}</option>`
            });
            s.html(html);
        }).catch(function (error) {
            console.info(error);
        });
    }

    btnNext.click(() => {
        const getDataAction = btnNext.attr('data-action');
        switch (getDataAction) {
            case 'Step1':
                const getUrlStep1 = $('#get-link-step1').val();
                const dataStep1 = {
                    email: $('#email').val(),
                    password: $('#password').val(),
                    password_confirmation: $('#password_confirmation').val(),
                };

                postRegisterStep1(dataStep1, getUrlStep1);
                break;
            case 'Step2':
                const getUrlStep2 = $('#get-link-step2').val();
                let dataStep2 = {
                    first_name: $('#first_name').val(),
                    last_name: $('#last_name').val(),
                    first_name_hira: $('#first_name_hira').val(),
                    last_name_hira: $('#last_name_hira').val(),
                    birthday_year: $('#birthday_year').val(),
                    birthday_month: $('#birthday_month').val(),
                    birthday_day: $('#birthday_day').val(),
                    gender: $('input[name="gender"]:checked').val(),
                    zipcode: $('#zipcode').val(),
                    prefecture: $('#prefecture').val(),
                    city: $('#city').val(),
                    address: $('#address').val(),
                    town: $('#town').val(),
                    number_phone: $('#number_phone').val(),
                    job_situation: $('input[name="job_situation"]:checked').val(),
                };
                postRegisterStep2(dataStep2, getUrlStep2);
                break;
            default:
                break;
        }
    });
});
