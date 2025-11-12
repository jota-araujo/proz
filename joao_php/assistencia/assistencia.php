<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EletroService - Agendamento de Assistência Técnica</title>
  <style>
    /* ======= ESTILO ELETROSERVICE ======= */
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
      width: 400px;
      align-self: start;
    }

    h2 {
      text-align: center;
      color: var(--azul);
      margin-bottom: 20px;
    }

    label {
      color: var(--cinza);
      font-weight: 600;
      display: block;
      margin-bottom: 6px;
    }

    .input-group {
      margin-bottom: 20px;
    }

    input[type="text"],
    input[type="number"],
    input[type="date"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 15px;
      box-sizing: border-box;
      transition: border-color 0.3s ease;
    }

    input[type="text"]:focus,
    input[type="number"]:focus,
    input[type="date"]:focus {
      border-color: var(--azul);
      outline: none;
    }

    .button-group {
      text-align: center;
    }

    input[type="submit"] {
      background-color: var(--azul);
      color: var(--branco);
      padding: 10px 25px;
      font-size: 16px;
      font-weight: bold;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    input[type="submit"]:hover {
      background-color: #174a7a;
      transform: scale(1.03);
    }

    /* Rodapé pequeno para marca */
    footer {
      text-align: center;
      font-size: 13px;
      color: var(--cinza);
      margin-top: 15px;
    }

    footer span {
      color: var(--azul);
      font-weight: bold;
    }
.logo {
  display: block;
  margin: 0 auto 5px auto;
  width: 380px;
}

.input-group-descricao {
  display: flex;
  flex-direction: column;
  margin: 1.2rem 0;
  font-family: "Poppins", sans-serif;
}

.input-group-descricao label {
  font-weight: 600;
  color: #333;
  margin-bottom: 0.5rem;
  font-size: 1rem;
}

.input-group-descricao textarea {
  padding: 0.8rem;
  border: 1.8px solid #ccc;
  border-radius: 8px;
  resize: vertical;
  font-size: 1rem;
  font-family: "Poppins", sans-serif;
  transition: all 0.3s ease;
}

/* Efeitos de foco */
.input-group-descricao textarea:focus {
 border-color: var(--azul); 
  box-shadow: 0 0 5px rgba(74, 144, 226, 0.3);
  outline: none;
}

/* Efeito de hover */
.input-group-descricao textarea:hover {
  border-color: #999;
}

  </style>
</head>
<body>
  <div class="container">
    <img src="logo_eletroservice.png" alt="Logo EletroService" class="logo">
    <h2>Agendamento de Assistência Técnica</h2>

    <form action="page2assistencia.php" method="post">
      <div class="input-group">
        <label>Nome:</label>
        <input type="text" name="cliente" required>
      </div>

      <div class="input-group">
        <label>Contato:</label>
        <input type="number" name="contato" required>
      </div>

      <div class="input-group">
        <label>Produto com Defeito:</label>
        <input type="text" name="produto" required>
      </div>

      <div class="input-group">
        <label>Data para Atendimento:</label>
        <input type="date" name="data" required>
      </div>

      <div class="input-group-descricao">
        <label for="descricao">Descrição do Problema:</label>
        <textarea id="comentario" name="descricao" rows="4" required></textarea>
      </div>

      <div class="button-group">
        <input type="submit" value="Enviar">
      </div>
    </form>
    <footer>
      © <span>EletroService</span> – Soluções técnicas para o seu dia a dia
    </footer>
  </div>
</body>
</html>
