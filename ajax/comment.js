var formObj = $('form#form-comment');
var formURL = $("#form-comment").attr("action");
var submit = $('#submit');
$(document).ready(function() { 
    $("#form-comment").submit(function(e){
        $.ajax({
            url: formURL,
            type: 'post',
            dataType: 'json',
            resetForm: true,
            data: formObj.serialize(),
            beforeSend: function() {
                submit.val("Loading...").attr('disabled', 'disabled');
            },
            success: function(data) {
                setTimeout(function() { 
                  if(data.status){
                      $(data.get_comment).hide().fadeIn(800);
                      $('.comment-block').append(data.get_comment);
                      $('.msg').html('');
                  } else{
                      $('.msg').html('<span style="color:red">' + data.msg + '</span>');
                  }
                  formObj.trigger('reset');
                  submit.val('Submit').removeAttr('disabled');
                }, 500);
            }
        });
        return false;
    });
 });