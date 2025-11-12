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
    
    </style>
<body>
    <h2>Cadastro de Produto</h2>
    <form action="formulario.php?campanha=promo&versao=1.0" method="post">
        <div class="container">
    <label>Nome:</label><br>
    <div class="input-group">
    <input type="text" name="produto" required><br><br>
    </div>
    <label>Preço:</label><br>
    <div class="input-group">
    <input type="number" name="preco" required><br><br>
    </div>
    <label>Categoria:</label><br>
    <div class="input-group">
    <input type="text" name="categoria" required><br><br>
    </div>
    <label>Estoque:</label><br>
    <div class="input-group">
    <input type="number" name="estoque" required><br><br>
    </div>
    <div class="button-group">
    <input type="submit" value="enviar">
    </div>
</form>
</body>
</html>