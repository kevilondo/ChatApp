$(document).ready(function(){

    $('#role').change(function(){
        if ($(this).val() !== 'Individual')
        {
            if ($(this).val() == 'Anti-Depression organization')
            {
                $('#label').html('Name of the company');
            }
            else
            {
                $('#label').html('Name');
            }
        }
        else
        {
            $('#label').html('Username');
        }
    })
})