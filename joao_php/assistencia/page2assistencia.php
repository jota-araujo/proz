
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EletroService - Confirmação de Agendamento</title>
  <style>
    :root {
      --azul: #1F5C99;
      --cinza: #555555;
      --cinza-claro: #f2f2f2;
      --branco: #ffffff;
    }

    body {
      font-family: "Segoe UI", Arial, sans-serif;
      background-color: var(--cinza-claro);
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      background-color: var(--branco);
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      width: 450px;
      text-align: center;
    }

    .logo { display: block; margin: 0 auto 15px auto; width: 160px; }
    h2 { color: var(--azul); margin-bottom: 10px; }
    p { color: var(--cinza); font-size: 16px; line-height: 1.5; margin-bottom: 20px; }

    .info {
      background-color: #eef3f9;
      border-left: 4px solid var(--azul);
      padding: 15px;
      border-radius: 6px;
      text-align: left;
      margin-bottom: 25px;
    }

    .info label { font-weight: 600; color: var(--azul); }

    .button {
      background-color: var(--azul);
      color: var(--branco);
      padding: 10px 25px;
      font-size: 16px;
      font-weight: bold;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.2s ease;
      text-decoration: none;
      display: inline-block;
    }

    .button:hover { background-color: #174a7a; transform: scale(1.03); }

    footer { text-align: center; font-size: 13px; color: var(--cinza); margin-top: 15px; }
    footer span { color: var(--azul); font-weight: bold; }
  </style>
</head>
<body>
    <?php
// Declaração das variáveis e preenchimento com valores do POST, se existirem
$Cliente   = $_POST["cliente"];
$Contato   = $_POST["contato"];
$Produto   = $_POST["produto"];
$Data      = $_POST["data"];
$Descricao = $_POST["descricao"];

$conn = new mysqli("127.0.0.1", "root", "alunos", "assistencia", 3307);
if ($conn->connect_error) {
  die("<p style-'color:red;'>Erro na conexão com o banco de dados:". $conn->connect_error."</p>");
}

$sql = "INSERT INTO agendamentos (nome, telefone, aparelho, data, descricao)
        VALUES ('$Cliente', '$Contato', '$Produto', '$Data', '$Descricao')";

 if ($conn->query($sql) === TRUE) {
} else {
    echo "<p style='color:red;'>❌ Erro ao salvar: " . $conn->error . "</p>";
}

$conn->close();
 

?>


  <div class="container">
    <img src="logo_eletroservice.png" alt="Logo EletroService" class="logo">
    <h2>Agendamento Confirmado!</h2>
    <p>Obrigado por entrar em contato com a <strong>EletroService</strong>.<br>
    Recebemos seu pedido de assistência e entraremos em contato em breve.</p>

  <div class="info">
      <label>Nome:</label> <?php echo $Cliente; ?><br>
      <label>Contato:</label> <?php echo $Contato; ?><br>
      <label>Produto:</label> <?php echo $Produto; ?><br>
      <label>Data:</label> <?php echo date("d/m/Y", strtotime($Data)); ?><br>
      <label>Descrição:</label> <?php echo $Descricao; ?>
    </div>

    <a href="assistencia.php" class="button">Voltar ao Início</a>

    <footer>
      © <span>EletroService</span> – Soluções técnicas para o seu dia a dia
    </footer>
  </div>
</body>
</html>
