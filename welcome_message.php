<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmacia</title>
    <nav>
        Início
        <a href="http://localhost:8080/registrarForm">Registrar produtos</a>
    </nav>
</head>
<body>
    <h1>Bem vindo a Farmácia</h1>
    <div>
        <?php

            foreach ($data as $remed) {
                echo 'codigo:'.$remed['codigo'].'<br>';
                echo 'laboratorio:'.$remed['laboratorio'].'<br>';
                echo 'preco'.$remed['preco'].'<br>';
                echo 'quantidade'.$remed['quantidade'].'<br>';
            }
        
        ?>
    </div>
</body>
</html>
