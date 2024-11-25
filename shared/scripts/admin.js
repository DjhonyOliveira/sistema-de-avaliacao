let campoAtual = '';

$('.home, .setores, .usuarios, .perguntas').on('click', function(){
    let opcao = this.attributes['data-name'].value;

    if(opcao == 'home'){
        $('#logo').css("display", "flex")
        $('#' + campoAtual).css("display", "none")
    } else {
        showContent(opcao);
    }
});

$('.logout-btn').on('click', function(){
    let parametro = 'logout';
    let url       = window.location.origin + '/app/admin';

    requestAjax(url, {parametro}, function(response){
        window.location.href = response;
    });
})

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

$('.excluir').on('click', function(e) {
    if (confirm('Tem certeza que deseja excluir este item?')) {
        let id        = this.attributes['data-id'].value
        let parametro = this.attributes['data-param'].value
        let url       = window.location.origin + '/app/admin';
        let data      = {parametro, id};

        requestAjax(url, data);
    }
});

$('#criarUsuario').on('click', function(){
    let nome      = $('#username').val();
    let email     = $('#useremail').val();
    let senha     = $('#userpassword').val();
    let setor     = $('#usersetor').val();
    let parametro = 'userInsert'
    let url       = window.location.origin + '/app/admin';
    let data      = {parametro, nome, email, senha, setor};

    requestAjax(url, data);
});

$('#criarSetor').on('click', function(){
    let nomeSetor = $('#setor').val();
    let parametro = 'setInsert';
    let url       = window.location.origin + '/app/admin';
    let data      = {parametro, nomeSetor};

    requestAjax(url, data);
});

$('#criarPergunta').on('click', function(){
    let pergunta  = $('#pergunta').val();
    let setor     = $('#setorPergunta').val();
    let parametro = 'perInsert';
    let url       = window.location.origin + '/app/admin';
    let data      = {parametro, pergunta, setor};

    requestAjax(url, data);
});

function requestAjax(url, data, success = null, error = null, method = 'POST'){
    let mensagem  = $('.ajax_response');

    let sucesso = (success != null) ? success : function(response){mensagem.html(response.message).fadeIn(100);};
    let erro    = (error   != null) ? error   : function(error){};

    $.ajax({
        url: url,
        type: method,
        data: data,
        dataType: 'json',
        success: sucesso,
        error: erro
    });
}