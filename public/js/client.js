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
        }
    });
});