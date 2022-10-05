$(document).ready(function(){

    $('#send_form').on('submit',sendForm);

    function sendForm(event)
    {
        event.preventDefault();
        let tokenCSRF = $('meta[name="csrf-token"]').attr('content');
        let url = $(this).attr('action');
        $('#name').removeClass('border-danger');
        $('#name_error').remove();
        $('#last_name').removeClass('border-danger');
        $('#last_name_error').remove();
        $('#email').removeClass('border-danger');
        $('#email_error').remove();
        $('#password').removeClass('border-danger');
        $('#password_error').remove();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': tokenCSRF
            },
            url: url,
            method: 'POST',
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(response)
            {
                if(response.logStatus){
                    $('#content').html(response.resultInHtml);
                } else {
                    $('#exampleModal').modal('show');
                }
            },
            error: function (response) {
                if(response.status === 422) {
                    const {errors} = response.responseJSON;
                    for (let error in errors) {
                        $('#'+ error).after('<div id="' + error + '_error" ><span class="text-danger"><strong>' + errors[error][0] + '</strong></span>');
                        $('#'+ error).addClass('border-danger');
                    }

                }  else {
                    $('#other_error').text("Error send!").addClass('text-danger');
                }
            }
        });
    }
});
