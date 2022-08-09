$(".chosen-select").chosen({
    allow_single_deselect: true,
    width: '50%',
    no_results_text: "Không tìm thấy kết quả :"
});

$(document).ready(function () {
    $(".imageModal").click(function () {
        $('#onpenImage img').attr('src', $(this).data('url'))
        $('#onpenImage').modal('show')
    });
    $('#alert-response-ajax button').click(() => {
        $("#alert-response-ajax")
            .removeClass('show')
            .addClass('p-0')
            .addClass('m-0')
    });
    setTimeout(function(){
        $('.select2-hidden-accessible.is-invalid')
        .parent()
        .find('.select2-selection')
        .addClass('is-invalid')
    },200);
});

class MyUploadAdapter {
    constructor (loader, url, token) {
        // The file loader instance to use during the upload.
        this.loader = loader;
        this.url = url;
        this.token = token;
    }
    // Initializes the XMLHttpRequest object using the URL passed to the constructor.
    _initRequest () {
        const xhr = this.xhr = new XMLHttpRequest();

        xhr.open('POST', this.url, true);
        xhr.setRequestHeader('x-csrf-token', this.token)
        xhr.responseType = 'json';
    }
    // Starts the upload process.
    upload () {
        return this.loader.file
            .then(file => new Promise((resolve, reject) => {
                this._initRequest();
                this._initListeners(resolve, reject, file);
                this._sendRequest(file);
            }));
    }

    // Aborts the upload process.
    abort () {
        if (this.xhr) {
            this.xhr.abort();
        }
    }
    // Initializes XMLHttpRequest listeners.
    _initListeners (resolve, reject, file) {
        const xhr = this.xhr;
        const loader = this.loader;
        const genericErrorText = `Couldn't upload file: ${file.name}.`;

        xhr.addEventListener('error', () => reject(genericErrorText));
        xhr.addEventListener('abort', () => reject());
        xhr.addEventListener('load', () => {
            const response = xhr.response;
            if (!response || !response.success) {
                return reject(response ? response.message : genericErrorText);
            }

            resolve({
                default: response.url
            });
        });


        if (xhr.upload) {
            xhr.upload.addEventListener('progress', evt => {
                if (evt.lengthComputable) {
                    loader.uploadTotal = evt.total;
                    loader.uploaded = evt.loaded;
                }
            });
        }
    }
    // Prepares the data and sends the request.
    _sendRequest (file) {
        const data = new FormData();

        data.append('file', file);

        this.xhr.send(data);
    }
    // ...
}

