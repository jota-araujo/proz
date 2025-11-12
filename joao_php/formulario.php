<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
        background-color: #3d3d3bff;
        text-align: center;
        color: #ffe70eff;
        font-size: large;
    }
        .container {
            display: flex;
            flex-direction: column;
            gap: 1px;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
            color: #000000;
            align-items: center;
            justify-content: center;
            background-color: #ffffff;
        }
        .input-group {
            margin-bottom: 10px;
            width: 100%;
        }

  .button-group input[type="submit"] {
    background-color: #007BFF; /* cor de fundo */
    color: white;              /* cor do texto */
    border: none;              /* remove a borda */
    padding: 10px 20px;        /* espaçamento interno */
    border-radius: 5px;        /* bordas arredondadas */
    cursor: pointer;           /* cursor de mão */
  }

  .button-group input[type="submit"]:hover {
    background-color: #0056b3; /* cor ao passar o mouse */
  } 
    </style>
<body>
    <h2>Cadastro de Produto</h2>
<?php
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $Produto = $_POST["produto"];
    $Preco = $_POST["preco"];
    $Categoria = $_POST["categoria"];
    $Estoque = $_POST["estoque"];
    echo "<h3>  Dados recebidos (POST)</h3>";
    echo "Produto: $Produto <br>";
    echo "Preço: $Preco <br>";
    echo "Categoria: $Categoria <br>";
    echo "Estoque: $Estoque <br>";

}
else {
    echo "<p style='color:red;'>Nemhum dado enviado via POST.</p>";}

if (isset($_GET['campanha']) && isset($_GET['versao'])) {
    $campanha = $_GET['campanha'];
    $versao = $_GET['versao'];
    echo "<hr>";
    echo "<h3>Informações da Campanha (GET):</h3>";
    echo "Campanha: $campanha <br>";
    echo "Versão: $versao <br>";
}
else {
    echo "<p style='color:red;'>Nemhum dado enviado via GET.</p>";
}

?>
</body>
</html>