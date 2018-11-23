jQuery(document).ready(function($) {
    // Perform AJAX login on form submit
    $('form#login').on('submit', function(e){
        $('form#login p.status').show().text(ajax_auth_object.loadingmessage);
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajax_auth_object.ajaxurl,
            data: { 
                'action': 'ajaxlogin', //calls wp_ajax_nopriv_ajaxlogin
                'username': $('form#login #username').val(), 
                'password': $('form#login #password').val(), 
                'security': $('form#login #security').val() },
            success: function(data){
                $('form#login p.status').text(data.message);
                if (data.loggedin == true){
                    document.location.href = ajax_auth_object.redirecturl;
                }
            }
        });
        e.preventDefault();
    });

    $('form#register').on('submit', function (e) {
        $('p.status', this).show().text(ajax_auth_object.loadingmessage);
		ctrl = $(this);
		$.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajax_auth_object.ajaxurl,
            data: {
                'action': 'ajaxregister',
                'username': $('#signonname').val(),
                'password': $('#signonpassword').val(),
				'email': $('#email').val(),
                'security': $('#signonsecurity').val()
            },
            success: function (data) {
				$('p.status', ctrl).text(data.message);
				if (data.loggedin == true) {
                    document.location.href = ajax_auth_object.redirecturl;
                }
            }
        });
        e.preventDefault();
    });

});