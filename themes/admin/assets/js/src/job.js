import $ from 'jquery'
import axios from "axios";
// import {Modal} from 'bootstrap';
// import axios from 'axios';

const NAME = 'job'
const DATA_KEY = 'dym.job'
const EVENT_KEY = `.${DATA_KEY}`
const JQUERY_NO_CONFLICT = $.fn[NAME]
const EVENT_LOAD_DATA_API = `load${EVENT_KEY}`

const SELECTOR_BTN_STATION_REMOVE = '[data-action^="job-btn-remove"]'
const SELECTOR_BTN_STATION_ADD = '[data-action^="job-btn-add"]'
const SELECTOR_POSTAL_CODE_INPUT = '[name^="postal_code"]'
const SELECTOR_PREFECTURE_INPUT = 'select[name^="prefecture_id"]'
const SELECTOR_STATION_INPUT = 'body'
const Default = {}

class Job {

    constructor(_element, _options) {
        this.element = _element
        this.options = $.extend({}, Default, _options)
    }

    template(template, data) {
        return new EJS({url: '/admin/tpl/' + template, cache: true, debug: true}).render(data);
    }

    init() {
        this.suggestLine();
    }

    suggestLine() {
        let t = this;
        require('select2');
        const ss = $('[data-action="suggest-line"]');
        let id = ss.data('key');
        ss.select2({
            minimumInputLength: 3, ajax: {
                delay: 250, url: ss.data('url'), dataType: 'json', data: function (params) {
                    return {q: params.term, id: id};
                }, results: function (data) {
                    return {results: data.results};
                },
            },
        });
        ss.on('select2:select', function (e) {
            let row = $(this).parents('[id*="item-"]');
            const id = this.value;
            let station = row.find('[data-action="suggest-stations"]');
            axios.get(station.data('url'), {
                responseType: 'json', params: {id: id}
            }).then(function (response) {
                let h = t.template('select', {values: response.data.values});
                console.info('h', h);
                station.html(h);
            }).catch(function (error) {
                console.info(error);
            });
        });
    }

    stationAdd() {
        let p = this.element.parents('.station-item');
        let c = this.element.parents('#area-station').find('.station-item').length;
        let ne = p.clone().appendTo('#area-station');
        let li = parseInt(this.element.parents('.station-item').find('span[class^="index"]').last().text()) + 1;
        // let i = (c + 1);
        ne.attr('id', "item-" + li);
        // Update line index
        ne.find('select[name*="[line_id]"]').attr('name', 'line_station[' + (li) + '][line_id]');

        // Update station index
        ne.find('select[name*="[station_id]"]').attr('name', 'line_station[' + (li) + '][station_id]');

        // Update distance index
        ne.find('input[name*="[distance]"]').attr('name', 'line_station[' + (li) + '][distance]');

        ne.find('span.selection,span.dropdown-wrapper').remove();

        //ne.find('span[class^="index"]').text(li);

        this.suggestLine();
    }

    stationRemove() {
        let c = this.element.parents('#area-station').find('.station-item').length;
        let p = this.element.parents('.station-item');
        if (c > 1) {
            p.remove();
        }
    }

    suggestPrefectures() {
        let t = this;
        axios.get(this.element.data('url'), {
            responseType: 'json', params: {q: this.element.val()}
        }).then(function (response) {
            let s = $('select[name="prefecture_id"]');
            s.html(t.template('select', {
                values: response.data.values
            }));

            s.find('option:eq(0)').prop('selected', true);
            s.trigger('change');
        }).catch(function (error) {
            console.info(error);
        });
    }

    suggestCities() {
        let t = this;
        axios.get(this.element.data('url'), {
            responseType: 'json', params: {q: this.element.find('option:eq(0)').prop('selected', true).val()}
        }).then(function (response) {
            let s = $('select[name="city_id"]');
            s.html(t.template('select', {
                values: response.data.values
            }));
        }).catch(function (error) {
            console.info(error);
        });
    }

    static _jQueryInterface(config, e) {
        let data = $(this).data(DATA_KEY)
        const _options = $.extend({}, Default, $(this).data())

        if (!data) {
            data = new Job($(this), _options)
            $(this).data(DATA_KEY, typeof config === 'string' ? data : config)
        }

        if (config !== undefined || typeof config === 'string') {
            console.info('1');
            data[config](e)
        } else {
            console.info('2');
            data.init($(this))
        }
    }
}

$(window).on(EVENT_LOAD_DATA_API, () => {
    $(SELECTOR_STATION_INPUT).each(function () {
        Job._jQueryInterface.call($(this), 'init');
    })
})

$(document)
    .on('click', SELECTOR_BTN_STATION_ADD, function (event) {
        Job._jQueryInterface.call($(this), 'stationAdd', event)
    })
    .on('click', SELECTOR_BTN_STATION_REMOVE, function (event) {
        Job._jQueryInterface.call($(this), 'stationRemove', event)
    })
    .on('keyup', SELECTOR_POSTAL_CODE_INPUT, function (event) {
        Job._jQueryInterface.call($(this), 'suggestPrefectures', event)
    })
    .on('change', SELECTOR_PREFECTURE_INPUT, function (event) {
        Job._jQueryInterface.call($(this), 'suggestCities', event)
    });

$.fn[NAME] = Job._jQueryInterface
$.fn[NAME].Constructor = Job
$.fn[NAME].noConflict = function () {
    $.fn[NAME] = JQUERY_NO_CONFLICT
    return Job._jQueryInterface
}

export default Job
