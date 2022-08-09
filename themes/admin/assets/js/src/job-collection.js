import $ from 'jquery'

const NAME = 'job-collection'
const DATA_KEY = 'dym.job-collection'
const EVENT_KEY = `.${DATA_KEY}`
const JQUERY_NO_CONFLICT = $.fn[NAME]
const EVENT_LOAD_DATA_API = `load${EVENT_KEY}`

const SELECTOR_ICON_PREVIEW = '[name="image"]'
const SELECTOR_ICON_THUMB_PREVIEW = '[name="icon"]'
const Default = {}

class JobCollection {

    constructor(_element, _options) {
        this.element = _element
        this.options = $.extend({}, Default, _options)
    }

    init() {
        //...
    }

    preview(e) {
        if (e.target.files.length === 0)
        {
            return;
        }
        let reader = new FileReader();
        reader.onload = function(){
            const nameInput = e.target.name;

            let output = document.getElementById('imp-preview-'+nameInput);
            output.src = reader.result;
        };
        reader.readAsDataURL(e.target.files[0]);
    }

    static _jQueryInterface(config, e) {
        let data = $(this).data(DATA_KEY)
        const _options = $.extend({}, Default, $(this).data())

        if (!data) {
            data = new JobCollection($(this), _options)
            $(this).data(DATA_KEY, typeof config === 'string' ? data : config)
        }

        if (config !== undefined || typeof config === 'string') {
            data[config](e)
        } else {
            data.init($(this))
        }
    }
}

$(document)
    .on(EVENT_LOAD_DATA_API, () => {
        $(SELECTOR_ICON_PREVIEW).each(function () {
            JobCollection._jQueryInterface.call($(this), 'init')
        })
    })
    .on('change', `${SELECTOR_ICON_PREVIEW},${SELECTOR_ICON_THUMB_PREVIEW}`, function (event) {
        JobCollection._jQueryInterface.call($(this), 'preview',event)
    });

$.fn[NAME] = JobCollection._jQueryInterface
$.fn[NAME].Constructor = JobCollection
$.fn[NAME].noConflict = function () {
    $.fn[NAME] = JQUERY_NO_CONFLICT
    return JobCollection._jQueryInterface
}

export default JobCollection
