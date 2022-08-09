import $ from 'jquery'
// import {Modal} from 'bootstrap';
import axios from 'axios';

const NAME = 'form'
const DATA_KEY = 'dym.form'
const EVENT_KEY = `.${DATA_KEY}`
const JQUERY_NO_CONFLICT = $.fn[NAME]
const EVENT_LOAD_DATA_API = `load${EVENT_KEY}`
const SELECTOR_SORTABLE = '[data-action="sortable"]'
const SELECTOR_FORM_MULTIPLE_IMAGE = '[id^="image-preview"]'
const SELECTOR_LIMIT_PAGE = '[id="pagination_select-limit"]'
const Default = {}
class Form {

    constructor(_element, _options) {
        this.element = _element
        this.options = $.extend({}, Default, _options)
    }

    init() {
        //...
    }

    preview_multiple(e) {
        let files = e.target.files.length;
        if (files > 10) {
            alert("Max files < 10.");
            e.preventDefault();
            return;
        }
        for (let i = 0; i < files; i++) {
            let reader = new FileReader();
            reader.onload = function (event) {
                $($.parseHTML('<img class="img-thumbnail" width="200">')).attr('src', event.target.result).appendTo('#preview-area');
            }
            reader.readAsDataURL(e.target.files[i]);
        }
    }

    sort(e) {
        let searchParams = new URLSearchParams(window.location.search)
        let name = $(this.element[0]).attr('data-sort-name')
        if (typeof name === "undefined") {
            return;
        }
        let typeSort = searchParams.get('sort') ?? "desc"

        if (typeof searchParams.get('column') != null && name !== searchParams.get('column')) {
            typeSort = "asc"
        }

        if (typeSort === "asc") {
            typeSort = "desc"
        } else {
            typeSort = "asc"
        }
        if (['desc', 'asc'].indexOf(typeSort) === -1) {
            typeSort = "desc"
        }

        searchParams.set('column', name)
        searchParams.set('sort', typeSort)
        return window.location.search = searchParams.toString()
    }

    limit_page(e) {
        let searchParams = new URLSearchParams(window.location.search)
        const url = $(this.element[0]).attr('data-url-set-limit');
        axios.post(url,{
            name:document.location.pathname+"_perPage",
            value:this.element[0].value
        }).then(function (res){
            searchParams.delete('page');
            return window.location.search = searchParams.toString()
        })
    }



    static _jQueryInterface(config, e) {
        let data = $(this).data(DATA_KEY)
        const _options = $.extend({}, Default, $(this).data())

        if (!data) {
            data = new Form($(this), _options)
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
    .on('change', SELECTOR_FORM_MULTIPLE_IMAGE, function (event) {
        Form._jQueryInterface.call($(this), 'preview_multiple', event)
    })
    .on('click',SELECTOR_SORTABLE,function (event){
        Form._jQueryInterface.call($(this), 'sort', event)
    })
    .on('change',SELECTOR_LIMIT_PAGE,function (){
        Form._jQueryInterface.call($(this), 'limit_page', event)
    })
;

$.fn[NAME] = Form._jQueryInterface
$.fn[NAME].Constructor = Form
$.fn[NAME].noConflict = function () {
    $.fn[NAME] = JQUERY_NO_CONFLICT
    return Form._jQueryInterface
}

export default Form
