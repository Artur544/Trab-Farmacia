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
    </style>
    
    <div id="content">
        <h1>Editar Remédios</h1>
        <form method="post" action="/update">
            <input type="hidden" name="id_up" value="<?=$dados['codigo']?>">    
            <label for="nome_input">Nome:</label>
            <input class="input" name="nome_input" type="text" value="<?=$dados['nome']?>"><br>

            <label for="">Laboratório:</label>
            <input class="input" name="laboratorio_input" type="text" value="<?=$dados['laboratorio']?>"><br>

            <label for="quantidade_input">Quantidade:</label>
            <input class="input" name="quantidade_input" type="number" value="<?=$dados['quantidade']?>"><br>

            <label for="preco_input">Preço:</label>
            <input class="input" name="preco_input" type="decimal" value="<?=$dados['preco']?>"><br><br>
            
            <button type="submit">Enviar</button>
        </form>
        <button onclick='window.location="http://localhost:8080/"'>Voltar</button>
    </div>
</body>
</html>