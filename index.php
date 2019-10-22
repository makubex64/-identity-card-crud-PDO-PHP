<?php include_once 'db/conexion.php'; ?>
<?php session_start(); ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body class="bg-light">
    

  <div class="container ml-0">
      <h1 class="text text-info">Datos requeridos</h1>
    <div class="row">
        <div class="col-md-3">


        <form action="db/register_cedula.php" method="post">
<?php if(isset($_SESSION['error'])) {?>
   <div class="alert alert-<?= $_SESSION['color-error']?> alert-dismissible fade show" role="alert">
     <?= $_SESSION['error'] ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
 <?php session_unset(); }?>
  
      <div class="form-group">

        <label for="cedula"><strong>Cédula n°</strong></label>
        <input type="text" name="cedula" class="form-control" placeholder="ingresa la cédula" value="">
      </div>
      <div class="form-group">
        <label for="cedula"><strong>Nombres</strong></label>
        <input type="text" name="nombres" class="form-control" placeholder="ingresa los nombres">
      </div>
      <div class="form-group">
        <label for="cedula"><strong>Apellidos</strong></label>
        <input type="text" name="apellidos" class="form-control" placeholder="ingresa los apellidos">
      </div>
      <div class="form-group">
        <label for="cedula"><strong>Correo</strong></label>
        <input type="text" name="correo" class="form-control" placeholder="ingresa el correo">
      </div>
      <div class="form-group">
        <label for="cedula"><strong>Teléfono</strong></label>
        <input type="text" name="telefono" class="form-control" placeholder="ingresa el teléfono">

      <button type="submit" name="registro_cedula" class="btn btn-info form-control mt-3">enviar</button>
      </div>
      </form>

      </div>

      <div class="col-md-8">
    <table class="table table-bordered">
      <thead class="bg-dark text-light text-center">
        <tr>
          <th scope="col">Cedula</th>
          <th scope="col">Nombres</th>
          <th scope="col">Apellidos</th>
          <th scope="col" >Correo</th>
          <th scope="col">Teléfono</th>
          <th scope="col" >Fecha</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody class="text-center">
        <?php 
          $sql= "SELECT * from users";
          $sentencia = $pdo->prepare($sql);
          $sentencia->execute();
          while ( $resultado = $sentencia->fetch()) {?>
         
       
        <tr>
          <td><?php echo $resultado['cedula']; ?></td>
          <td><?php echo $resultado['nombres']; ?></td>
          <td><?php echo $resultado['apellidos']; ?></td>
          <td><?php echo $resultado['correo']; ?></td>
          <td><?php echo $resultado['telefono']; ?></td>
          <td><?php echo $resultado['fecha']; ?></td>
          <td>
            <a href="edit_index.php?id=<?php echo $resultado['id']?>"><i class="btn btn-info form-control my-1">editar</i></a>

            <a href="db/delete.php?id=<?php echo $resultado['id']?>"><i class="btn btn-danger form-control my-1">eliminar</i></a>
          </td>
        </tr>

          <?php }?>
      </tbody>
    </div>
  </div>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>