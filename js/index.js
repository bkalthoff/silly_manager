$('#btn-login').click(function() {
	console.log('Clicked btn-login');
	$.ajax({ 
		type: 'POST',
		url: '../php/login.php',
		data: $('#form-login').serialize(),
		dataType: 'json',
		success: function(data) {
			console.log(data);
			if (data.error == false) {
				window.location.href = '../groups.php';
			} else {
				$('#error-login').html(data.msg);
				$('#error-login').fadeIn(500);
				$('#error-login').delay(1500);
				$('#error-login').fadeOut(500);
			}
		},
		beforeSend: function() {
			$('#btn-login').html('Loading...');
		},
		complete: function() {
			console.log('Ajax login call completed.');
			$('#btn-login').html('Login');
		},
		error: function(exception) {
			console.log('Error: ' + exception);
		}
	});
	return false;
});

$('#btn-register').click(function() {
	console.log('Clicked btn-register');
	$.ajax({ 
		type: 'POST',
		url: '../php/register.php',
		data: $('#form-register').serialize(),
		dataType: 'json',
		success: function(data) {
			console.log("success: " + data.msg);
			if (data.error == false) {
				swapRegForm(false);
				$('#success-register').html(data.msg);
				$('#success-register').fadeIn(500);
				$('#success-register').delay(1500);
				$('#success-register').fadeOut(500);
			} else {
				$('#error-register').html(data.msg);
				$('#error-register').fadeIn(500);
				$('#error-register').delay(1500);
				$('#error-register').fadeOut(500);
			}
		},
		beforeSend: function() {
			$('#btn-register').html('Loading...');
		},
		complete: function() {
			console.log('Ajax login call completed.');
			$('#btn-register').html('Register');
		},
		error: function(exception) {
			console.log('Error: ' + exception);
		}
	});
	return false;
});

function swapRegForm(register) {
	if (register) {
		$('.form-login').hide();
		$('.form-register').show();
	} else {
		$('.form-register').hide();
		$('.form-login').show();
	}
	return false;
}

$('#btn-swapto-register').click(function() {
	swapRegForm(true);
	//$('.form-login').hide();
	//$('.form-register').show();
	return false;
});

$('#btn-swapto-login').click(function() {
	swapRegForm(false);
	//$('.form-register').hide();
	//$('.form-login').show();
	return false;
});
