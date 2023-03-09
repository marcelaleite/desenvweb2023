window.onload = (function (){
    console.log(document.getElementById('item').innerHTML);

    document.getElementById('nome').addEventListener('change',function(ev){
        // console.log(ev);
        if (this.value.length < 3){
            document.getElementById('erronome').className = 'erroativo';
        }else{
            // desativa o erro
            document.getElementById('erronome').className = 'erro';
            // buscar dados via ajax
            atualizaEmailviaAjax(this.value);
        }
    });

    document.getElementById('email').addEventListener('change',function(){
        let email = this.value;
        let resultado = email.match(/\w@\w*\.\w/); // usando uma expressão regular
        // console.log(resultado);
        if (!resultado){
            document.getElementById('erroemail').className = 'erroativo';
        }else{
            document.getElementById('erroemail').className = 'erro';
        }
    });
});

function atualizaEmailviaAjax(nome){
    let ajax = new XMLHttpRequest();
    ajax.onload = (function(){
        // console.log(JSON.parse(this.responseText));
        let contato = JSON.parse(this.responseText);
        contato.forEach(pessoa => {
            if (pessoa.nome == nome){
                document.getElementById('email').value = pessoa.email;
            }
        });
    });
    ajax.open('GET','contatos.json');
    ajax.send();
}