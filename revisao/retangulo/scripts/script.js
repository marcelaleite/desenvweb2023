$(document).ready(function (){
    $('#fcadastro').on('submit',function (ev){
        ev.preventDefault();
        $.post('index.php',$("#fcadastro").serialize()).done(function (data){
            if (data == 1){
                $('#msg').addClass('msgSucesso');
                $('#msg').html('Cadastro Efetuado com sucesso!!!');
                $("#fcadastro").each(function (){ this.reset()}); //limpa o formulário
                atualizaTabela(); // atualizar com os novos dados
            }else{
                $('#msg').removeClass('msgSucesso');
                $('#msg').addClass('msgErro');
                $('#msg').html(data);
            }
        });
       
    });

});

function atualizaTabela(){
    //apagar tabela atual
    $('#listagem').remove();
    //buscar nova tabela com ajax
    $.get('listagem.php',function (data){
        $('#conteudo').html(data);
    });
        

};
