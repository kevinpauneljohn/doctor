function clear_errors()
{
    let i;
    for (i = 0; i < arguments.length; i++) {

        if($('#'+arguments[i]).val().length > 0){
            $('.'+arguments[i]).closest('div.'+arguments[i]).removeClass('has-error').find('.text-danger').remove();
        }
    }
}

$(document).ready(function(){
    let addForm = $('#terminal-form');

    addForm.submit(function(form){
        form.preventDefault();

        $.ajax({
            'url' : '/terminals',
            'type' : 'POST',
            'data' : addForm.serialize(),
            'cache' : false,
            success: function(result, status, xhr){
                if(result.success === true)
                {
                    setTimeout(function(){
                        /*$('#role_form').trigger('reset');
                        $('#roles').modal('toggle');*/
                        toastr.success('New Terminal Successfully Added!')

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

            }
        });
        clear_errors('user','device');
    });
});