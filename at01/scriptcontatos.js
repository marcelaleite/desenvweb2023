window.onload = (function (){
    document.getElementById('cidade').addEventListener('keyup',function(){

        popularCidades(this.value); // enviando o valor do campo como argumento
    });
    let excluir = document.getElementById('excluir');
    excluir.addEventListener('click',function(ev){
        if (confirm('Deseja realmente excluir esse contato?'))
            document.getElementById('fcadastro').submit();
        else{
            ev.preventDefault();
            window.location.href = 'listar_contatos.php';
        }
        
    });
});


function popularCidades(c){ // receber cidade digitada como parâmetro
    let ajax = new XMLHttpRequest();
    ajax.onload = (function(){
        let cidades = JSON.parse(this.responseText);
        let opt = "";
        cidades.forEach(cidade => {
            opt += "<option value='"+cidade.id+"'>"+cidade.nome+"</option>";
        });
        document.getElementById('cidades').innerHTML = opt;
    });
    
    ajax.open('GET','lista_cidades.php?cidade='+c);
    ajax.send();    
}