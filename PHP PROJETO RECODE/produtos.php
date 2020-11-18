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

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="./CSS/estilo.css">
    <script src ="./JS/funcoes.js"></script>
</head>
<body>

     <!-- Menu -->
     <?php
    include('menu.php');
    ?>
 <!-- Fim Menu -->

        <header>
        <h2>Produtos</h2>
        <hr>
        </header>

    <section class="categorias">
                  <ul>
                    <li onclick = "exibir_todos()">Todos(12)</li>
                      <li onclick = "exibir_categoria('geladeira')">Geladeiras(3)</li>
                      <li onclick = "exibir_categoria('fogao')">Fogões(2)</li>
                      <li onclick = "exibir_categoria('microondas')">Microondas(3)</li>
                      <li onclick = "exibir_categoria('lavadoura')">Lavadoura de roupas(2)</li>
                      <li onclick = "exibir_categoria('lavalouca')">Lava louças(3)</li>
                  </ul>
    </section>
               
                <section class="produtos">

    <?php
// consultando tabela banco de dados
$sql = "select * from produtos";
$result = $conn->query($sql);

if ($result->num_rows > 0){
    while ($rows = $result->fetch_assoc()){
        
   ?> 

    <div class = "box_produto" style="display:inline-block"; id="<?php echo $rows["categoria"]?>" >
                    <img src="<?php echo $rows["imagem"]?>" alt="Geladeira" width="120px"  onclick="destaque(this)">
                    <br>
                    <p class="descricao"><?php echo $rows["descricao"]?></p>
                    <hr>
                    <p class="descricao"><strike>R$<?php echo $rows["preco"]?></strike></p>
                    <p class="preco">R$ <?php echo $rows["preco_venda"]?></p>
    </div>    
        
    <?php

    }
}else {
    echo "Nenhum produto cadastrado!";
}

    ?>
                   
                    
                </div>
                </section>

        <br><br><br><br><br>
        <br><br><br><br><br>

        <footer id = "rodape">
            <p id="formas_pagamento">Formas de pagamento</p>
            <img src="./Image/formasdepagamento.jpeg" alt="formas de pagamento" width="300px">
            <p>&copy;Recode Pro</p>
        </footer>
</body>
</html>