$(document).ready(function(){

    $('#avaliar').on('click', function(){
        let setor = $('#setor').val();

        if(setor){
            window.location.href = `avaliacao?setor=${setor}`
        }
    })
});