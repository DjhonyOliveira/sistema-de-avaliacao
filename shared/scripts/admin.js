let campoAtual = '';

$('.setores').on('click', function(){
    showContent('setores');
});

$('.usuarios').on('click', function(){
    showContent('usuarios');
});

$('.perguntas').on('click', function(){
    showContent('perguntas');
});

$('.metricas').on('click', function(){
    showContent('metricas');
});

$('.home').on('click', function(){
    $('#logo').css("display", "flex")
    $('#' + campoAtual).css("display", "none")
});

function showContent(section) {
    if(campoAtual != '' && campoAtual != section){
        $('#' + campoAtual).css("display", "none");
    }

    $('#' + section).css("display", "block");
    $('#logo').css("display", "none");
    
    campoAtual = section;
}

window.onload = function(){
    let sections = document.querySelectorAll('.content-section');

    sections.forEach(function(sec) {
        sec.style.display = 'none';
    });
}

function requestAjax(url, data, success = null, error = null ,method = 'POST'){
    let sucesso = success != null ? success : function(){};
    let erro    = error   != null ? error   : function(){};

    $.ajax({
        url: url,
        type: method,
        data: data,
        dataType: 'json',
        success: sucesso,
        error: erro
    });
}