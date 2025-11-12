<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro - Novembro Azul</title>
  <style>
    body {
      font-family: "Segoe UI", Arial, sans-serif;
      background: linear-gradient(135deg, #1F5C99, #62B28D);
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      color: #fff;
    }

    .container {
      background-color: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(8px);
      padding: 40px 50px;
      border-radius: 15px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
      text-align: center;
      width: 400px;
    }

    .logo {
      width: 100px;
      margin-bottom: 15px;
    }

    h2 {
      font-size: 26px;
      margin-bottom: 20px;
    }

    label {
      display: block;
      text-align: left;
      margin-bottom: 8px;
      font-size: 15px;
    }

    input[type="text"],
    input[type="number"],
    input[type="date"] {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 8px;
      outline: none;
      font-size: 16px;
      margin-bottom: 15px;
      text-align: center;
    }

    input[type="submit"] {
      background-color: #fff;
      color: #1F5C99;
      border: none;
      border-radius: 8px;
      padding: 12px 30px;
      font-weight: bold;
      font-size: 16px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    input[type="submit"]:hover {
      background-color: #62B28D;
      color: #fff;
      transform: scale(1.05);
    }

    p {
      margin-top: 15px;
    }

    .sucesso {
      background: rgba(0, 255, 0, 0.15);
      padding: 10px;
      border-radius: 8px;
      color: #d4ffd4;
    }

    .erro {
      background: rgba(255, 0, 0, 0.15);
      padding: 10px;
      border-radius: 8px;
      color: #ffd4d4;
    }

    footer {
      margin-top: 20px;
      font-size: 13px;
      color: #f0f0f0;
    }

    footer span {
      font-weight: bold;
      color: #fff;
    }
  </style>
</head>
<body>
  <div class="container">
    <img src="logo_novembro_azul.png" alt="Logo Novembro Azul" class="logo">
    <h2>Cadastro Novembro Azul</h2>

    <form method="POST">
      <label>Nome completo:</label>
      <input type="text" name="nome" required>

      <label>CPF (somente números):</label>
      <input type="text" name="cpf" minlength="11" maxlength="11" required>

      <label>Contato (telefone):</label>
      <input type="number" name="contato" required>

      <label>Idade:</label>
      <input type="number" name="idade" required>

      <label>Data da consulta:</label>
      <input type="date" name="data" required>

      <input type="submit" name="enviar" value="Cadastrar">
    </form>

    <?php
    if (isset($_POST["enviar"])) {
        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $contato = $_POST["contato"];
        $idade = $_POST["idade"];
        $data = $_POST["data"];

        $conn = new mysqli("localhost", "root", "alunos", "novazul", "3307");

        if ($conn->connect_error) {
            die("<p class='erro'>Erro ao conectar: " . $conn->connect_error . "</p>");
        }

        // Verifica se o CPF já existe
        $check = $conn->query("SELECT cpf FROM agendamentos WHERE cpf='$cpf'");
        if ($check->num_rows > 0) {
            echo "<p class='erro'>❌ Este CPF já possui um agendamento.</p>";
        } else {
            $sql = "INSERT INTO agendamentos (nome, telefone, idade, data_consulta, cpf)
                    VALUES ('$nome', '$contato', '$idade', '$data', '$cpf')";

            if ($conn->query($sql) === TRUE) {
                echo "<p class='sucesso'>✅ Cadastro realizado com sucesso! Redirecionando...</p>";

                // Redireciona automaticamente com POST para page2
                echo "
                <form id='redirect' method='POST' action='page2_novembro_azul.php'>
                    <input type='hidden' name='cpf' value='$cpf'>
                </form>
                <script>
                  setTimeout(function() {
                    document.getElementById('redirect').submit();
                  }, 1500);
                </script>
                ";
            } else {
                echo "<p class='erro'>❌ Erro ao cadastrar: " . $conn->error . "</p>";
            }
        }

        $conn->close();
    }
    ?>

    <footer>
      © <span>Novembro Azul 2025</span> - Todos os direitos reservados.
    </footer>
  </div>
</body>
</html>
