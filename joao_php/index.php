<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
        background-color: #ffe6f0;
        text-align: center;
    }
    </style>
<body>
    <h2>Formulário Outubro Rosa 🩷</h2>
    <form action="index.php" method="post">
    <label>Nome:</label><br>
    <input type="text" name="nome" required><br><br>
    <label>Idade:</label><br>
    <input type="number" name="idade" required><br><br>
    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>
    <label>Já realizou o exame de mamografia este ano?</label><br>
    <input type="radio" name="mamografia" value="Sim" required>Sim<br>
    <input type="radio" name="mamografia" value="Não" required>Não<br><br>

    <input type="submit" value="enviar">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $nome = $_POST["nome"];
    $mamografia = $_POST["mamografia"];
    $idade = $_POST["idade"];
    $email = $_POST["email"];
    echo "<h3> 🩷 Dados recebidos (POST)</h3>";
    echo "NOME: $nome <br>";
    echo "Fez mamografia: $mamografia <br>";
    echo "Idade: $idade <br>";
    echo "Email: $email <br>";

}
?>
</body>
</html>