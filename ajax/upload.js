var formObj = $(this);
var formURL = $("#upload-image-form").attr("action");
var submit = $('#submit');
$(document).ready(function() { 
    $("#upload-image-form").submit(function(e){
        $.ajax({
            url: formURL,
            type: 'POST',
            dataType: 'JSON',
            resetForm: true,
            beforeSend: function() {
                //$('.msg').html("Loading...");
                submit.val("Loading...").attr('disabled', 'disabled');
            },
            success: function(data) {
                if(data.status){
                    $('.msg').html('<span style="color:blue">' + data.msg + '</span>')
                } else{
                    $('.msg').html('<span style="color:red">' + data.msg + '</span>')
                }
                submit.val('Upload').removeAttr('disabled');
            }
        });
        return false;
    });
 });