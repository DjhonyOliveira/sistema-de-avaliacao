$(document).ready(function(){

    $('form').submit(function(ev){
        ev.preventDefault();

        let url      = window.location;
        let email    = $('#email').val();
        let pass     = $('#password').val();
        let data     = {email, pass};
        let mensagem = $('.ajax_response')

        $.ajax({
            url: url.origin + '/app/login', 
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function(response){

                if(response.redirect){
                    window.location.href = response.redirect;
                }

                if (response.message) {
                    mensagem.html(response.message).fadeIn(100);
                }

            }
        });
    })
});