<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Novembro Azul</title>
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

    h1 {
      font-size: 26px;
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 10px;
      font-size: 16px;
    }

    input[type="text"] {
      width: 90%;
      padding: 10px;
      border: none;
      border-radius: 8px;
      outline: none;
      text-align: center;
      font-size: 16px;
      margin-bottom: 20px;
    }

    button {
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

    button:hover {
      background-color: #62B28D;
      color: #fff;
      transform: scale(1.05);
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

    .erro {
      color: #ffcccc;
      background-color: rgba(255,0,0,0.2);
      padding: 10px;
      border-radius: 8px;
      margin-bottom: 15px;
    }

    .sucesso {
      color: #d4ffd4;
      background-color: rgba(0,128,0,0.2);
      padding: 10px;
      border-radius: 8px;
      margin-bottom: 15px;
    }
  </style>
</head>
<body>
  <div class="container">
    <img src="logo_novembro_azul.png" alt="Logo Novembro Azul" class="logo">
    <h1>Login - Novembro Azul</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cpf = trim($_POST["cpf"]);

        // Conecta ao banco
        $conn = new mysqli("localhost", "root", "alunos", "novazul", "3307");
        if ($conn->connect_error) {
            die("<p>Erro ao conectar: " . $conn->connect_error . "</p>");
        }

        $sql = "SELECT * FROM agendamentos WHERE cpf='$cpf'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // CPF encontrado → redireciona via POST automático
            echo "<div class='sucesso'>✅ CPF encontrado! Redirecionando...</div>";
            echo "<form id='redirect' method='POST' action='page2_novembro_azul.php'>
                    <input type='hidden' name='cpf' value='$cpf'>
                  </form>
                  <script>
                    setTimeout(function() {
                        document.getElementById('redirect').submit();
                    }, 1500);
                  </script>";
            exit;
        } else {
            // CPF não encontrado → mostra aviso e redireciona de volta após 2s
            echo "<div class='erro'>❌ CPF não encontrado. Redirecionando ao cadastro...</div>";
            echo "<script>
                    setTimeout(function() {
                        window.location.href = 'cadastro.php';
                    }, 2000);
                  </script>";
        }

        $conn->close();
    }
    ?>

    <form method="POST">
      <label>Digite o seu CPF (apenas números):</label>
      <input type="text" name="cpf" maxlength="11" required>
      <br>
      <button type="submit">Entrar</button>
    </form>

    <footer>
      © <span>Novembro Azul 2025</span> - Todos os direitos reservados.
    </footer>
  </div>
</body>
</html>
