<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
</head>
<body>
    <form method="post" action="/recebaDados">
        Nome:<input name="nome_input" type="text"><br>
        Laboratório:<input name="laboratorio_input" type="text"><br>
        Quantidade:<input name="quantidade_input" type="number"><br>
        Preço:<input name="preco_input" type="number"><br><br>
        <button type="submit">Enviar</button>
    </form>
    <button><a href="http://localhost:8080/">Voltar</a></button>
</body>
</html>