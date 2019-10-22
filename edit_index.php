<?php 
include_once 'db/conexion.php';
session_start();

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * from users where id=$id";
  $result = $pdo->prepare($sql);
  $result->execute(array($id));
  $result_sentencia = $result->fetch();
  // var_dump($result_sentencia);
  // echo "puedes editar<br>";
  $cedula = $result_sentencia['cedula'];
  // echo $cedula;
  $nombres = $result_sentencia['nombres'];
  // echo $nombres;
  $apellidos = $result_sentencia['apellidos'];
  // echo $apellidos;
  $correo = $result_sentencia['correo'];
  // echo $correo;
  $telefono = $result_sentencia['telefono'];
  // echo $telefono;

  if (isset($_POST['update'])) {
    echo '<br><p class="text text-success">actualizando...</p>';
    $id = $_GET['id'];
    $cedula = $_POST['cedula'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    
    $sql_update = "UPDATE users set cedula='$cedula', nombres='$nombres', apellidos='$apellidos', correo='$correo', telefono='$telefono' where id='$id' ";
    $sentencia = $pdo->prepare($sql_update);
    $sentencia->execute();
    if ($sentencia) {
      $_SESSION['error'] = 'Se ha actualizado satisfactoriamente';
      $_SESSION['color-error'] = 'success';
      header('location:./index.php?update=success');
      exit();
    }
  }
}

?>

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
    <h1 class="text-info">Hello, world! EDITANDO XD</h1>
    <div class="container">

    <form action="edit_index.php?id=<?php echo $id; ?>" method="post">

  
      <div class="form-group">

        <label for="cedula"><strong>Cédula n°</strong></label>
        <input type="text" name="cedula" class="form-control" placeholder="edita la cédula" value="<?php echo $cedula; ?>">
      </div>
      <div class="form-group">
        <label for="nombres"><strong>Nombres</strong></label>
        <input type="text" name="nombres" class="form-control" placeholder="edita los nombres" value="<?php echo $nombres; ?>">
      </div>
      <div class="form-group">
        <label for="apellidos"><strong>Apellidos</strong></label>
        <input type="text" name="apellidos" class="form-control" placeholder="edita los apellidos" value="<?php echo $apellidos; ?>">
      </div>
      <div class="form-group">
        <label for="correo"><strong>Correo</strong></label>
        <input type="text" name="correo" class="form-control" placeholder="edita el correo" value="<?php echo $correo; ?>">
      </div>
      <div class="form-group">
        <label for="telefono"><strong>Teléfono</strong></label>
        <input type="text" name="telefono" class="form-control" placeholder="edita el teléfono" value="<?php echo $telefono; ?>">

      <button type="submit" name="update" class="btn btn-info form-control mt-3">enviar</button>
      </div>
      </form>
      </div>

















    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>







