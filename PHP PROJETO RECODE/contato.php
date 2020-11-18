<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "fseletro";

//criando a conexão

$conn = mysqli_connect ($servername,$username,$password,$database);

// verfificando a conexão
if (!$conn){
    die ("A conexão ao BD falhou: ". mysqli_connect_error());
}

if (isset($_POST['nome']) && isset($_POST['msg'])){
    $nome = $_POST['nome'];
    $msg = $_POST['msg'];

    // echo $nome . $msg; //Testando meu BD do formulário

    // $sql = "insert into comentarios(nome,msg) values ("beto","Olá como vai?")"; //exemplo de inserção explicita de values

    $sql = "insert into comentarios(nome,msg) values ('$nome','$msg')";
    $result = $conn->query($sql);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato</title>
    <link rel="stylesheet" href="./CSS/estilo.css">
    <script src="./JS/funcoes.js"></script>
</head>
<body>

     <!-- Menu -->
     <?php
    include('menu.php');
    ?>
 <!-- Fim Menu -->

        <header>
        <h2>Contato</h2>
        <hr>
        </header>
        
     
                <div class="contato">
                    <p><img width="70px" src="./Image/email.jpg" alt="webmaster" width="40px"><br>
                    contato@Fullstackeletro.com</p>
            
                    <p><img src="./Image/whatsapp_logo_png_transparente.png" width="120px"><br>
                    (11) 99999-9999</p>
                </div>
        <div class="formusuario">
            <form method="post" action="">
             <h3>Dúvidas,Elogios ou Sugestões:</h3>   
            Nome:<br>
            <input type="text" name="nome" style="width:500px"><br>
            Mensagem:<br>
            <input type="text" name="msg" style="width:500px"><br>

            <input type="submit" name="submit" value="Enviar"><br><br><br>
            </form>
        </div>
            <?php
            
// consultando tabela banco de dados
$sql = "select * from comentarios";
$result = $conn->query($sql);

if ($result->num_rows > 0){
    while ($rows = $result->fetch_assoc()){
    echo "Data: ", $rows['data'],"<br>";
    echo "Nome: ", $rows['nome'],"<br>";
    echo "Mensagem: ", $rows['msg'],"<br>";
    echo "<hr>";
    }
}else {
    echo "Nenhum comentário ainda!";
}

    ?>


            <br><br><br><br><br>
            <br><br><br><br><br>

            <footer id = "rodape">
                <p id="formas_pagamento">Formas de pagamento</p>
                <img src="./Image/formasdepagamento.jpeg" alt="formas de pagamento" width="300px">
                <p>&copy;Recode Pro</p>
            </footer>
</body>
</html>