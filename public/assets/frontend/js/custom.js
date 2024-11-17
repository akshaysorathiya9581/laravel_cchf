$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	},
	statusCode: {
        401: function() {
            // Session expired, redirect to login
            window.location.href = '/admin/login';
        }
    },
});

function send_ajax_request(ajaxUrl, sendData, method, fileUpload, type) {
	if (!ajaxUrl) { return; }
	sendData = sendData || {};
	method = method || 'POST';
	type = type || 'JSON';

	var ajaxOption = {
		type: method,
		url: ajaxUrl,
		dataType: type,
		data: sendData
	};

	(fileUpload) && ($.extend(ajaxOption, { processData: false, contentType: false }));
	return $.ajax(ajaxOption);
}