$(document).ready(function(){

    $('#avaliar').on('click', function(){
        let setor = $('#setor').val();

        if(setor){
            window.location.href = `avaliacao?setor=${setor}`
        } else {
            let message = $('.mensagem');

            message.html("<div class=\"message warning icon-warning\">Selecione um setor para continuar</div>").fadeIn(100)
        }
    })
});