<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Farmácia</title>
</head>
<style>
  body {
    font-family: 'Open Sans', sans-serif;
    background-color: #f8f8f8;
    color: #333;
    margin: 0px;
    padding: 0px 0px 10px 0px;
  }

  h1 {
    color: #2c3e50;
    text-align: center;
    margin: 20px 0;
    font-size: 2.5em;
  }

  #content {
    width: 100%;
    height: 90%;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px;
  }

  #tabela {
    border: 2px solid rgb(140 140 140);
    font-family: sans-serif;
    font-size: 0.8rem;
    letter-spacing: 1px;
  }

  table {
    border-collapse: collapse;
  }

  th {
    color: white;
    background-color: rgb(150,200,255);
    border: 1px solid rgb(160 160 160);
    padding: 8px 10px;
  }

  td {
    background-color: white;
    border: 1px solid rgb(160 160 160);
    padding: 8px 10px;
  }

  .input {
    border: none;
    box-shadow: rgb(120, 120, 120) 0px 0px 20px;
    border-radius: 15px;
    height: 45px;
    min-width: 70%;
    max-width: 700px;
    font-weight: bold;
    font-size: large;
    padding-left: 15px;
  }

  button {
    background-color: rgb(100,200,255);
    border: none;
    border-radius: 15px;
    height: 45px;
    min-width: fit-content;
    max-width: 200px;
    font-weight: bold;
    font-size: large;
    padding: 10px;
    cursor: pointer;
  }

  #janela {
    display: none;
    box-shadow: rgb(120, 120, 120) 0px 0px 20px;
    border-radius: 15px;
    padding: 20px;

  }

  form {
    display: flex;
    gap: 10px;
  }

  .container {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  /* Hide the browser's default checkbox */
  .container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0;
  }

  /* Create a custom checkbox */
  .checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
  }

  /* On mouse-over, add a grey background color */
  .container:hover input ~ .checkmark {
    background-color: #ccc;
  }

  /* When the checkbox is checked, add a blue background */
  .container input:checked ~ .checkmark {
    background-color: rgb(40,230,250);
  }

  .checkmark:after {
    content: "";
    position: absolute;
    display: none;
  }

  .container input:checked ~ .checkmark:after {
    display: block;
  }

  .container .checkmark:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
  }

  #remove {
    display: block;
    position: absolute;
    top: 20px;
    left: 20px;
    font-family: 'Arial';
    color: white;
    background: #e65f5f;
    width: max-content;
    height: max-content;
    line-height: 30px;
    text-align: center;
    padding: 15px 20px;
    border-radius: 10px;
  }

  #edit {
    display: block;
    position: absolute;
    top: 20px;
    left: 20px;
    font-family: 'Arial';
    color: white;
    background-color: #5f92e6;
    width: max-content;
    height: max-content;
    line-height: 30px;
    text-align: center;
    padding: 15px 20px;
    border-radius: 10px;
  }
</style>
<body>

  <?php
    
    if (session()->get('remove')){
      echo "<div id='remove'><strong>". session()->getFlashdata('remove')."</strong></div>";
    }
    if (session()->get('edit')){
      echo "<div id='edit'><strong>". session()->getFlashdata('edit')."</strong></div>";
    }

    ?>

  <h1>Bem vindo a Farmácia</h1>

  <div id="content">
    <form method="post" action="/pesquisar">
      <input class="input" type="text" name="pesquisa" placeholder="Pesquisar">
      <button onclick="pesquisa()">Pesquisar</button> 
    </form>
    <button onclick="abrirFiltro(true)">Filtrar</button>

    <div id="janela">
      <h3>Filtrar por:</h3>
      <form method="post" action="/filtrar">
        <label class="container" for="preco_filtro">Maior preço
          <input type="checkbox" name="preco_filtro" id="preco_filtro">
          <span class="checkmark"></span>
        </label>
        
        <label class="container" for="quantidade_filtro">Maior quantidade
          <input type="checkbox" name="quantidade_filtro" id="quantidade_filtro">
          <span class="checkmark"></span>
        </label>
        
        <button onclick="abrirFiltro(false)">Ok</button>
      </form>
    </div>

    <div id="tabela">
      <table>
      <tr>
        <th>Codigo</th>
        <th>Nome</th>
        <th>Laboratório</th>
        <th>Quantidade</th>
        <th>Preco</th>
      </tr>
    <?php

    
    foreach ($dados as $remedio){
    echo "<tr>  <td> ".$remedio['codigo']."</td> <td> ".$remedio['nome']."</td> <td>".$remedio['laboratorio']."</td> <td>".$remedio['quantidade']."</td> <td>".$remedio['preco']." </td>
    <td>";
    
  ?>

  <form method="post" action="/remover">
  <input type="hidden" name="id_removed" value="<?=$remedio['codigo']?>">   
  <button type="submit"> Remover </button>
  </form>

  </td><td>

  <form method="get" action="/formupdate/<?=$remedio['codigo']?>">
  <button type="submit"> Editar </button>
  </form>


  <?php
  echo "</td> </tr>";
  }
  ?>
      </table>
    </div>
  <button onclick='window.location = "http://localhost:8080/registraForm";' >Inserção de produtos</button>
  </div>
</body>
<script>
  function abrirFiltro(valida) {
    if (valida) {
      document.getElementById("janela").style = "display: block";
    }
    else {
      document.getElementById("janela").style = "display: none";
    }
  }
</script>
</html>



