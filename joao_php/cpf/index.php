<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Sistema de Login com CPF</h2>
    
    <form method="POST">
        <label>Digite o seu CPF (apenas números):</label><br>
        <input type="text" name="cpf" minlength="11" maxlength="11" placeholder="com 11 dígitos" required>
        <br><br>
        <input type="submit" name="cadastrar" value="Cadasrtar CPF">
    </form>
    <hr>

    <?php 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $cpf = $_POST["cpf"];

        if (!ctype_digit($cpf) || strlen($cpf) !=11) {
            echo "<p>⚠️ O CPF deve conter exatamente 11 números.</p>";
            exit;
        }
    $conn = new mysqli("localhost", "root", "alunos", "sistemas", "3307");

    if ($conn->connect_error){
        die("<p>Erro ao conectar:" .$conn->connect_error."</p>");
    }
    if (isset($_POST["cadastrar"])) {
        $sql = "INSERT INTO cliente (cpf) VALUES ('$cpf')";
        
        if ($conn->query($sql)=== TRUE){
            echo "<p>CPF cadastrado com sucesso!</p>";
        } else{
            echo "<p>CPF já cadastrado.</p>";
        }
    }
    $conn->close();
    }
    ?>
</body>
</html>