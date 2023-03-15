window.onload = (function (){
    popularCidades();
});


function popularCidades(){
    let ajax = new XMLHttpRequest();
    ajax.onload = (function(){
        let cidades = JSON.parse(this.responseText);
        let opt = "";
        cidades.forEach(cidade => {
            opt += "<option value='"+cidade.id+"'>"+cidade.nome+"</option>";
        });
        document.getElementById('cidade').innerHTML = opt;
    });
    
    ajax.open('GET','lista_cidades.php');
    ajax.send();    
}