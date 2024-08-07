<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmácia</title>
</head>
<body>
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f8f8f8;
            color: #333;
            margin: 0;
            padding: 0px;
        }

        h1 {
            color: #2c3e50;
            text-align: center;
            margin: 20px 0;
            font-size: 2.5em;
        }

        #content {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .input {
            border: none;
            box-shadow: rgb(120, 120, 120) 0px 0px 15px;
            border-radius: 15px;
            height: 45px;
            min-width: 20%;
            max-width: 300px;
            font-weight: bold;
            font-size: large;
            padding-left: 15px;
        }

        label {
            font-weight: bold;
            font-size: large;
        }

        button {
            background-color: rgb(100,200,255);
            border: none;
            border-radius: 15px;
            height: 45px;
            min-width: fit-content;
            max-width: 300px;
            font-weight: bold;
            font-size: large;
            padding: 10px;
            cursor: pointer;
        }

        form {
            display: flex;
            flex-direction: column;
            width: fit-content;
            gap: 10px;
        }

        #sucess {
            display: block;
            position: absolute;
            top: 20px;
            left: 20px;
            font-family: 'Arial';
            color: white;
            background: #5fe65f;
            width: max-content;
            height: max-content;
            line-height: 30px;
            text-align: center;
            padding: 15px 20px;
            border-radius: 10px;
        }
    </style>

    <?php
    
    if (session()->get('success')){
        echo "<div id='sucess'><strong> ". session()->getFlashdata('success')."</strong></div>";
    }

    ?>

    <div id="content">
        <h1>Inserir Remédios</h1>
        <form method="post" action="/recebaDados">
            <label for="nome_imput">Nome:</label>
            <input class="input" name="nome_input" type="text"><br>
            <label for="laboratorio_input">Laboratório:</label>
            <input class="input" name="laboratorio_input" type="text"><br>
            <label for="quantidade_input">Quantidade:</label>
            <input class="input" name="quantidade_input" type="number"><br>
            <label for="preco_input">Preço:</label>
            <input class="input" name="preco_input" type="decimal"><br><br>
            <button type="submit">Enviar</button>
        </form>
        <button onclick='window.location="http://localhost:8080/"'>Voltar</button>
    </div>
</body>
</html>