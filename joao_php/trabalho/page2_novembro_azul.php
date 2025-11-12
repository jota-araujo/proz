<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Novembro Azul - Informações Personalizadas</title>
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
      width: 800px;
      max-height: 90vh;
      overflow-y: auto;
    }

    .logo {
      width: 100px;
      margin-bottom: 15px;
    }

    h1, h2 {
      color: #fff;
    }

    p {
      color: #f0f0f0;
      font-size: 16px;
      line-height: 1.6;
      text-align: justify;
    }

    .info {
      background: rgba(255,255,255,0.2);
      border-radius: 10px;
      padding: 15px 25px;
      margin: 20px 0;
      text-align: left;
    }

    a.button {
      display: inline-block;
      background-color: #fff;
      color: #1F5C99;
      padding: 12px 30px;
      border-radius: 8px;
      font-weight: bold;
      text-decoration: none;
      transition: all 0.3s ease;
    }

    a.button:hover {
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
  </style>
</head>
<body>
  <div class="container">
    <img src="logo_novembro_azul.png" alt="Logo Novembro Azul" class="logo">

    <?php
    if (isset($_POST["cpf"])) {
        $cpf = $_POST["cpf"];

        $conn = new mysqli("localhost", "root", "alunos", "novazul", "3307");
        if ($conn->connect_error) {
            die("<p>Erro ao conectar: " . $conn->connect_error . "</p>");
        }

        $sql = "SELECT * FROM agendamentos WHERE cpf='$cpf'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $idade = (int)$row["idade"];

            echo "<h1>Bem-vindo, " . htmlspecialchars($row["nome"]) . "!</h1>";
            echo "<div class='info'>";
            echo "<p><strong>CPF:</strong> " . htmlspecialchars($row["cpf"]) . "</p>";
            echo "<p><strong>Idade:</strong> " . htmlspecialchars($row["idade"]) . " anos</p>";
            echo "<p><strong>Contato:</strong> " . htmlspecialchars($row["telefone"]) . "</p>";
            echo "<p><strong>Data da Consulta:</strong> " . htmlspecialchars($row["data_consulta"]) . "</p>";
            echo "</div>";

            echo "<h2>💙 Informações sobre o Novembro Azul</h2>";
            echo "<p>O Novembro Azul é uma campanha mundial criada para conscientizar os homens sobre a importância da prevenção e do diagnóstico precoce do câncer de próstata. 
            Cuidar da saúde é um ato de coragem e amor próprio!</p>";

            // Mensagens personalizadas conforme a idade
            echo "<div class='info'>";
            if ($idade < 40) {
                echo "<h3>🧍 Jovens até 40 anos</h3>";
                echo "<p>Nessa fase, o câncer de próstata é raro, mas o cuidado deve começar desde cedo. 
                Mantenha uma alimentação saudável, evite cigarro e álcool em excesso, e pratique atividades físicas regularmente. 
                Esses hábitos ajudam na prevenção de diversas doenças e garantem qualidade de vida no futuro.</p>";
            } elseif ($idade >= 40 && $idade < 50) {
                echo "<h3>👨 De 40 a 49 anos</h3>";
                echo "<p>Se você tem histórico familiar de câncer de próstata ou é negro, já deve procurar o urologista para iniciar o acompanhamento anual. 
                O diagnóstico precoce aumenta muito as chances de cura. Cuide-se e incentive outros homens a fazer o mesmo.</p>";
            } elseif ($idade >= 50 && $idade < 70) {
                echo "<h3>🧓 De 50 a 69 anos</h3>";
                echo "<p>Essa é a faixa de maior risco. É fundamental realizar os exames preventivos todos os anos, como o PSA (exame de sangue) e o toque retal. 
                Não espere sintomas — o câncer de próstata pode se desenvolver silenciosamente. A detecção precoce salva vidas!</p>";
            } else {
                echo "<h3>🎩 Acima de 70 anos</h3>";
                echo "<p>Continue cuidando da sua saúde com consultas regulares. Seu médico poderá ajustar a frequência dos exames conforme sua condição clínica. 
                Uma vida saudável, com boa alimentação e exercícios leves, ajuda a manter o bem-estar e a disposição.</p>";
            }
            echo "</div>";

            echo "<h2>💡 Dicas Gerais de Saúde</h2>";
            echo "<ul style='text-align:left; line-height:1.8;'>
                    <li>🍎 Tenha uma alimentação rica em frutas, verduras e legumes.</li>
                    <li>🚶 Pratique ao menos 30 minutos de atividade física por dia.</li>
                    <li>🚭 Evite fumar e reduza o consumo de álcool.</li>
                    <li>💤 Durma bem e reduza o estresse diário.</li>
                    <li>🩺 Consulte o médico regularmente, mesmo sem sintomas.</li>
                  </ul>";

        } else {
            echo "<p>❌ CPF não encontrado. Retorne à página de login.</p>";
        }

        $conn->close();
    } else {
        echo "<p>⚠️ Nenhum CPF foi recebido. Volte para o login.</p>";
    }
    ?>

    <br>
    <a href="login.php" class="button">Sair</a>

    <footer>
      © <span>Novembro Azul 2025</span> - Todos os direitos reservados.
    </footer>
  </div>
</body>
</html>
