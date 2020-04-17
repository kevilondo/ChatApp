/*function displayMessages()
{
    var url = window.location.pathname;
    var id = url.substring(url.lastIndexOf('/') + 1); 

    $.ajax({
        type:'get',
        url: `/chat/${id}`,
        datatype: 'html',
        success:function(response){
            $('#chat').html(response);
        }
    });
}

setInterval(displayMessages, 10000);*/