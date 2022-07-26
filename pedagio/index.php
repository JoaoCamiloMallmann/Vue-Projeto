<?php

use Pedagio\Conexao;
use Pedagio\TesteDAO;

require_once "vendor/autoload.php";

$testeDAO = new TesteDAO();
$lista = $testeDAO->listar();

if (!empty($_POST['sim'])) {
   $ida = $_POST['sim'];

   $testeDAO->remover($ida);
   header('Location: index.php?alert=3');
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
   <script src="https://kit.fontawesome.com/e58a676b39.js" crossorigin="anonymous"></script>
</head>

<body style="background-color:whitesmoke;">
   <?php
   if (!empty($_GET["alert"])) {
   ?>
      <div class="alert">
         <span class="closebtn" onclick="this.parentElement.style.display='none';"> <i style="font-size:16px" class="fa">&#xf00d;</i>
         </span>
         <bold class="texto"> Adicionado Com Sucesso. </bold>
      </div>
   <?php
   }
   ?>
   <header class="d-flex m-2 p-3 justify-content-evenly" style="background-color:gray; border-radius: 4rem;">

      <button type="button" class="btn btn-secondary botaoInfo">Teste</button>

      <img class="img-fluid prim logoUni" src="https://www.liquidworks.com.br/wp-content/themes/liquid/imagens/logo.png" style="height: 70px;">

      <button type="button" class="btn btn-success" onclick="window.location.href='cadastro.php'" style="color: white;">CADASTRO
      </button>

   </header>

   <div class="m-4">
      <table class="table">
         <form action="" method="POST">

            <h1 style="text-align: center;">LISTA DE DADOS</h1>

            <thead class="m-2">
               <tr>
                  <th scope="col">#</th>
                  <th scope="col">NOME</th>
                  <th scope="col">DATA</th>
                  <th scope="col">VALOR</th>
                  <th scope="col">ALTERAR</th>
                  <th scope="col">DELETAR</th>
               </tr>
            </thead>
            <tbody>

               <?php foreach ($lista as $row) { ?>

                  <tr>
                     <th scope="row">
                        <?php
                        echo $row['id']
                        ?>
                        </td>
                     </th>

                     <td> <?php
                           echo $row['nome']
                           ?> </td>
                     <td> <?php
                           echo $row['data']
                           ?>
                     </td>

                     <td> <?php
                           echo $row['valor']
                           ?>
                     </td>
                     <td>
                        <button type="button" class="btn btn-info">
                           <a href="cadastro.php?dado=<?php echo $row['id'] ?>" style="text-decoration:none; color:white;">
                              <i class="fas fa-info-circle" style="color: white;"></i>
                           </a>
                        </button>

                     </td>

                     <td>
                        <button type="submit" name="sim" value="<?php echo $row['id'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                     </td>
                  </tr>
               <?php } ?>
            </tbody>
         </form>
      </table>

   </div>

   <br>

   <script>
      var alert = <?php echo $_GET["alert"] ?>;
      var element = document.querySelector('.alert');
      var texto = element.querySelector('.texto');

      if (alert == 1) {
         element.classList.add('alert-success');
      }
      if (alert == 2) {
         element.classList.add('alert-warning');
         texto.textContent = " Atualizado Com Sucesso"
      }
      if (alert == 3) {
         element.classList.add('alert-danger');
         texto.textContent = " Removido Com Sucesso"
      }
   </script>

</body>

</html>