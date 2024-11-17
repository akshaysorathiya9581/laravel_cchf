// public/js/ajax.js

function ajaxCall(url, method, data, successCallback, errorCallback) {
    let formData = new FormData();

    if (data instanceof FormData) {
        formData = data;
    } else {
        for (let key in data) {
            formData.append(key, data[key]);
        }
    }

    $.ajax({
        url: url,
        type: method,
        data: formData,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function (response) {
            if (typeof successCallback === "function") {
                successCallback(response);
            }
        },
        error: function (xhr, status, error) {
            if (typeof errorCallback === "function") {
                errorCallback(xhr, status, error);
            }
        },
    });
}