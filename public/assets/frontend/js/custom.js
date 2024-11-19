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

function blockUI_page(selector, is_show) {
    var selector = selector || '.m-body';
    var is_show = is_show || false;

    if (is_show) {
        $(selector).block({
            message: '<h4>Processing...</h4>',
            css: {
                backgroundColor: 'rgba(29, 110, 101, 0.7)',
                color: '#fff',
                border: 'none',
                borderRadius: '20px',
                padding: '30px',
                fontSize: '20px',
                width: '100%',
                height: '100%',
                textAlign: 'center',
            },
            overlayCSS: {
                borderRadius: '20px',
            }
        });
    } else {
        $(selector).unblock();
    }
}

function toastr_show(p_message, p_type, p_title) {
    if (!p_message || (p_message && p_message.trim() === '')) {
        return;
    }

    var type = (p_type && p_type.trim() !== '') ? p_type : 'success';
    var title = (p_title && p_title.trim() !== '') ? p_title : '';

    $.toast({
        heading: title,
        text: p_message,
        icon: type,
        showHideTransition: 'slide', // fade, slide, or plain
        allowToastClose: true,
        hideAfter: 5000, // milliseconds
        loader: true,
        loaderBg: '#9EC600', 
        position: 'top-right',
        stack: false // prevent duplicate toasts
    });
}

function makeDotToArrayStr(str) {
	if (!str.includes('.')) return str;
	let regex = /(\w+)/g;
	let matches = str.match(regex);

	let arr = [];

	matches.forEach((match, index) => {
		if (index === 0) {
			arr.push(match);
		} else {
			if (parseInt(match) > -1) match = '';
			arr.push(`[${match}]`);
		}
	});

	return arr.join('');
}

function formValidation(errors) {
	if (!typeof errors === 'object') return;
	$('.error-msg').remove();
	$.each(errors, (el, el_errors) => {
		var like_name = makeDotToArrayStr(el);

		var _elem = $('[name="' + like_name + '"]');
		if (!_elem.length) _elem = $('[name*="' + like_name + '"]');
		var i = 0;
		var f_elem = _elem[Object.keys(_elem)[i++]];

		var _parent = $(f_elem).parent();
		console.log('_parent=',_parent);
		while (_parent.children('.error-msg').length > 0 || (!['radio'].includes($(f_elem).attr('type')) && $(f_elem).val() != '')) {
			f_elem = _elem[Object.keys(_elem)[i++]];
			_parent = $(f_elem).parent();
		}
		if (_parent.hasClass('form-input')) {
			_parent = _parent.parent();
		}

		var msg = (el_errors.constructor === Array) ? el_errors[0] : el_errors;
		var label = _parent.find('label').html();
		// msg = msg.replaceAll(el, label);
		// msg = msg.replaceAll(':', '');

		_parent.append('<span class="text-danger error-msg d-block">' + msg + '</span>');
	});
}