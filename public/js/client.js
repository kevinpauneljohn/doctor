function clear_errors()
{
    let i;
    for (i = 0; i < arguments.length; i++) {

        if($('#'+arguments[i]).val().length > 0){
            $('.'+arguments[i]).closest('div.'+arguments[i]).removeClass('has-error').find('.text-danger').remove();
        }
    }
}

$(document).on('submit','#client-form',function(form){
    form.preventDefault();

    let value = $('#client-form').serialize();

    $.ajax({
        'url' : '/clients',
        'type' : 'POST',
        'data' : value,
        success: function(result)
        {
            console.log(result);
            if(result.success === true)
            {
                setTimeout(function(){
                    toastr.success('New Client Successfully Added!')

                    setTimeout(function(){
                        location.reload();
                    },1500);
                });
            }

            $.each(result, function (key, value) {
                var element = $('#'+key);

                element.closest('div.'+key)
                    .addClass(value.length > 0 ? 'has-error' : 'has-success')
                    .find('.text-danger')
                    .remove();
                element.after('<p class="text-danger">'+value+'</p>');
            });
        },error: function(xhr, status, error){
            console.log("error: "+error+" status: "+status+" xhr: "+xhr);
        }
    });
    clear_errors(
        'firstname',
        'lastname',
        'birthday',
        'landline',
        'mobileNo',
        'address',
        'region',
        'state',
        'city',
        'postalcode',
        'email',
        'username',
        'password',

    );
});