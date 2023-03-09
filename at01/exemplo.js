// a variável pode ser declarada com var, let, const ou nada, depende do contexto da variável e versão do javascript
var inteiro = 10;
var decimal = 1444.87;
console.log('inteiro '+inteiro);
console.log('decimal '+inteiro);

// uma função com nome
function soma(a,b){
    soma = a + b;
    return soma;
}

// uma função anônima - sem nome - executa automaticamente quando o navegador chega nessa linha
// são usadas como argumentos para outras funções
(function (){
    if (confirm("Entendeu?"))
        alert("Boa");
    else
        alert("Estude mais...");
})();

// pode-se implementar qualquer algoritmo com javascript
// exemplo de recursão
function calculaN(n){
    if (n < 2)
        return n;
    else
        return calculaN(n-1)+calculaN(n-2);
}
console.log(calculaN(10));

// vetores e como percorrê-los
let lista = ['amarelo','branco','azul','laranja'];
// percorrendo o vetor com um FOR
for (i = 0; i < lista.length; i++) {
    // console.log(lista[i]);
}
// percorre vetor com foreach
lista.forEach(item => {
   // console.log(item);
});

// eventos da página usando o jquery
$(document).ready(function (){
    $("#aqui").on("click",function(){
        $("#modal").fadeIn();
    });
    $('#fechar').on('click',function(){
        $('#modal').fadeOut();
    });
});

 
/***
 * eventos da página usando somente javascript
window.load = (function (){ // propriedade load da página garante que o script irá executar somente a página terminar de carregar no navegador
    document.getElementById("aqui").addEventListner("click",function(){ // adicionando o tratador de eventos
        document.getElementById("modal").style.display = block;
    });
    document.getElementById("fechar").addEventListner('click',function(){
        document.getElementById("modal").style.display = none;
    });
});
*/