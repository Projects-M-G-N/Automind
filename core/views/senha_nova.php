<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar senha</title>
</head>
<body>
<style>
    body {
      background-color: #FFA500;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .Login {
      background-color: #FFFFFF;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
      text-align: center;
    }

    .Login h1 {
      color: #FFA500;
      margin-bottom: 20px;
    }

    .GEANZINHODOGRAU190 {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .GabrielVankleber {
      margin-bottom: 10px;
    }

    .GabrielVankleber label {
      display: block;
      font-weight: bold;
    }

    .GabrielVankleber input {
      width: 250px;
      padding: 5px;
      border: 1px solid #FFA500;
      border-radius: 5px;
      background-color: #f2f2f2; 
    }

    .Teubotao {
      margin-top: 20px;
    }

    .Teubotao button {
      padding: 10px 20px;
      background-color: #808080;
      border: none;
      border-radius: 5px;
      color: #FFFFFF;
      font-weight: bold;
      cursor: not-allowed;
    }

    .Teubotao button.enabled {
      background-color: #FFA500;
      cursor: pointer;
    }

    .Teubotao button.enabled:hover {
      background-color: #FFC04D; 
    }

    .Teubotao button.enabled:active {
      background-color: #FF8C00; 
    }

    .GabrielVankleber input.blocked {
      background-color: #C0C0C0;
      cursor: not-allowed;
    }

    .GabrielVankleber input.enabled {
      background-color: #FFFFFF;
      cursor: auto;
    }
  </style>
</head>

<body>
  <div class="Login">
    <h1>CRIAÇÃO DA SENHA</h1>
    <form class="GEANZINHODOGRAU190">
      <div class="GabrielVankleber">
        <label for="email">Email:</label>
        <input type="email" name="emailS" id="email" required>
      </div>
      <div class="GabrielVankleber">
        <label for="codigo">Código:</label>
        <input type="text" id="codigo" required disabled class="blocked">
      </div>
      <div class="Teubotao">
        <button type="submit" disabled class="blocked">ENVIAR</button>
      </div>
    </form>
  </div>
  <script>
    window.onload = function() {
      const emailInput = document.getElementById('email');
      const codigoInput = document.getElementById('codigo');
      const enviarButton = document.querySelector('.Teubotao button');

      emailInput.addEventListener('input', function() {
        const email = emailInput.value.trim();
        enviarButton.disabled = email === '';
        codigoInput.disabled = true;
        codigoInput.classList.add('blocked');
        codigoInput.classList.remove('enabled');
        enviarButton.classList.toggle('enabled', email !== '');
      });

      enviarButton.addEventListener('click', function(event) {
        event.preventDefault();
        codigoInput.disabled = false;
        codigoInput.classList.remove('blocked');
        codigoInput.classList.add('enabled');
        enviarButton.disabled = true;
      });
    };
  </script> 
</body>
</html>