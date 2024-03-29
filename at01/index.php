<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Currículo</title>
    <link rel="stylesheet" href="estilo.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Red+Hat+Display:wght@300&display=swap" rel="stylesheet">
    <script src="script.js"></script>  
</head>
<body>
    <?php 
        include "menu.php";
    ?>
    <section>
        <div class="row">
            <div class="col-6">
                <h1 style="color:red">Currículo: Marcela Leite</h1>
                <p>Sou professora de informática. Adoro lecionar programação web. Tenho experiência com banco de dados, etc...</p>
                <h2>Meus Conhecimentos</h2>
                <ul>
                    <li>HTML</li>
                    <li>JavaScript</li>
                    <li>PHP</li>
                    <li>Python</li>
                    <li>SQL</li>
                    <li>Cozinhar</li>
                    <li>Contar histórias infantis</li>
                </ul>
                <h2>Experiências Profissionais</h2>
                <ol>
                    <li><a href="http://ifc.edu.br">Professora efetiva IFC 2014 - atual</a></li>
                    <li> Analista de Sistemas Senior 2011 - 2014</li>
                    <li> Analista de Sistemas Pleno 2009 - 2011</li>
                    <li> Analista de Sistemas Junior 2006 - 2009</li>
                </ol>
                <table class="dados">
                    <tr>
                        <th>Nome</th>
                        <th>Relação</th>
                        <th>Contato</th>
                    </tr>
                    <tr>
                        <td>Maria</td>
                        <td>Chefe</td>
                        <td>maria@mail.com</td>
                    </tr>
                    <tr>
                        <td>João</td>
                        <td>Colega</td>
                        <td>joão@mail.com</td>
                    </tr>
                    <tr>
                        <td>Pedro</td>
                        <td>Colega</td>
                        <td>joão@mail.com</td>
                    </tr>
                </table>
            </div>
            <div class="col-2" id="colfoto">
                <img class='foto' src="imagem.jpg" alt="Foto">
            </div>
            <div class="col-4" id="formcontato">
                <h2>Entre em contato...</h2>
                <form action="">
                    <div class="row">
                        <div class="col-4">
                            <label for="nome">Nome:</label>
                        </div>
                        <div class="col-8">
                            <input type="text" name="nome" id="nome">
                        </div>
                    </div>
                    <div class="row erro" id="erronome"><div class="col-12">O nome deve possuir pelo menos três letras</div></div>
                    <div class="row">
                        <div class="col-4">
                            <label for="email">E-Mail</label>
                        </div>
                        <div class="col-8">
                            <input type="email" name="email" id="email">
                        </div>
                    </div>
                    <div class="row erro" id="erroemail"><div class="col-12">E-mail informado incorreto</div></div>
                    <div class="row">
                        <div class="col-4">
                            <label for="salario">Proposta de Salário:</label>
                        </div>
                        <div class="col-8">
                            <input type="number" name="salario">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="obs">Observações:</label>
                        </div>
                        <div class="col-8">
                            <textarea name="obs" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" name="enviar">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
   
    <footer>
        <div class="row">
            <div class="col-12">
                <p>Feito por webdesign Marcela@Milk</p>
            </div>
        </div>
    </footer>
</body>

</html>