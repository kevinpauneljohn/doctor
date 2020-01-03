function clear_errors()
{
    let i;
    for (i = 0; i < arguments.length; i++) {

        if($('#'+arguments[i]).val().length > 0){
            $('.'+arguments[i]).closest('div.'+arguments[i]).removeClass('has-error').find('.text-danger').remove();
        }
    }
}


function submitForm( url , type , value , notif , elementKey)
{
    $.ajax({
        'url' : url,
        'type' : type,
        'data' : value,
        'cache' : false,
        success: function(result, status, xhr){
            if(result.success === true)
            {
                setTimeout(function(){
                    /*$('#role_form').trigger('reset');
                    $('#roles').modal('toggle');*/
                    toastr.success(notif);

                    setTimeout(function(){
                        location.reload();
                    },1500);
                });
            }
            $.each(result, function (key, value) {
                var element = $(elementKey+'#'+key);

                element.closest(elementKey+'div.'+key)
                    .addClass(value.length > 0 ? 'has-error' : 'has-success')
                    .find('.text-danger')
                    .remove();
                element.after('<p class="text-danger">'+value+'</p>');
            });

        },error: function(xhr, status, error){

        }
    });
}


$(function(){
    let addForm = $('#terminal-form');
    let editForm = $('#edit-terminal-form');

    addForm.submit(function(form){
        form.preventDefault();

        submitForm('/terminals' , 'POST' , addForm.serialize(), 'New Terminal Successfully Added!' , '');
        clear_errors('user','device');
    });

    editForm.submit(function(form){
        form.preventDefault();
        let id = $('#edit-terminal-form #updateTerminalId').val();
        submitForm('/terminals/'+id , 'PUT' , editForm.serialize(), 'Terminal Successfully Updated!' , '#edit-terminal-form ');
        clear_errors('edit_user','edit_device');
    });
});

$(document).on('click','.edit-terminal', function(){
    let id = this.id;
    $('#edit-terminal-form #updateTerminalId').val(id);

    $.ajax({
        'url' : '/terminals/'+id,
        'type' : 'GET',
        'cache' : false,
        success: function (result) {
            $('#edit_user').val(result.user_id);
            $('#edit_device').val(result.device);
            $('#edit_description').val(result.description);
        },error: function(xhr, status, error){
            console.log(xhr+" "+status+" "+error);
        }
    });

});