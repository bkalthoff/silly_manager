$('#btn-showform').click(function() {
    console.log('Clicked showform button.');
    $('#groups').hide();
    $('#form-group').trigger('reset');
    $('.forms').slideDown(200);
    return false;
});

$('#btn-hideform').click(function() {
    console.log('Clicked hideform button.');
    $('.forms').hide();
    $('#groups').slideDown(200);
    return false;
});

$('#btn-creategroup').click(function() {
    console.log('Clicked creategroup button.');
    $.ajax({
        type: 'POST',
        url: '../php/group.php',
        data: $('#form-group').serialize(),
        dataType: 'json',
        success: function(data) {
            console.log(data);
            // Lots of repetition, fix later
            if (data.error == false) {
                $('.alert-success').html(data.msg);
                $('.alert-success').fadeIn(500);
                $('.alert-success').delay(1500);
                $('.alert-success').fadeOut(500);
                window.location.href = '../groups.php';
            } else {
                $('.alert-danger').html(data.msg);
                $('.alert-danger').fadeIn(500);
                $('.alert-danger').delay(1500);
                $('.alert-danger').fadeOut(500);
            }
        },
        beforeSend: function() {
            console.log('Loading.');
            $('#btn-creategroup').html('Loading...');
        },
        complete: function() {
            console.log('Ajax login call completed.');
            $('#btn-creategroup').html('Create');
        },
        error: function(exception) {
            console.log('Error: ' + exception);
        }
    });
    return false;
});
