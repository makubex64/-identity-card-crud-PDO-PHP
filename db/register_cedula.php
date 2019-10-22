<?php 

if (isset($_POST['registro_cedula']) || isset($_POST['registro_cedula']) == true) {
	session_start();
	include_once 'conexion.php';

	$cedula = $_POST['cedula'];
	$nombres = $_POST['nombres'];
	$apellidos = $_POST['apellidos'];
	$correo = $_POST['correo'];
	$telefono = $_POST['telefono'];

	if (empty($cedula) || empty($nombres) || empty($apellidos) || empty($correo) || empty($telefono)) {
		$_SESSION['error'] = 'Llena los campos vacíos';
		$_SESSION['color-error'] = 'danger';
		header('location:../index.php?error=invalid-empty-fields');
		exit();
	}elseif (!preg_match("/^[0-9]+$/", $cedula)) {
		$_SESSION['error'] = '<strong>Cedula</strong> solo admite números';
		$_SESSION['color-error'] = 'danger';
		header('location:../index.php?error=invalid-cedula');
		exit();
	}elseif (strlen($cedula) > 8 || strlen($cedula) < 7) {
		$_SESSION['error'] = 'Escriba correctamente la <strong>Cédula</strong><br>Ejemplo: 20907509';
		$_SESSION['color-error'] = 'danger';
		header('location:../index.php?error=invalid-cedula');
		exit();
	}elseif (!preg_match("/^[a-z A-Z]+$/", $nombres) || empty($nombres)) {
		$_SESSION['error'] = 'Escriba su <strong>Nombre</strong>';
		$_SESSION['color-error'] = 'danger';
		header('location:../index.php?error=invalid-nombre');
		exit();
	}elseif (!preg_match("/^[a-z A-Z]+$/", $apellidos) || empty($apellidos)) {
		$_SESSION['error'] = 'Escriba su <strong>Apellido</strong>';
		$_SESSION['color-error'] = 'danger';
		header('location:../index.php?error=invalid-apellido');
		exit();
	}elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL) || empty($correo)) {
		$_SESSION['error'] = 'Escriba un <strong>Correo</strong> válido';
		$_SESSION['color-error'] = 'danger';
		header('location:../index.php?error=invalid-correo');
		exit();
	}elseif (!preg_match("/^[0-9]+$/", $telefono) || empty($telefono)) {
		$_SESSION['error'] = 'Escriba un número<strong>Telefónico</strong> válido';
		$_SESSION['color-error'] = 'danger';
		header('location:../index.php?error=invalid-telefono');
		exit();
	}else{
		$sql = "SELECT * from users where cedula = ? ";
		$sentencia = $pdo->prepare($sql);
		$sentencia->execute(array($cedula));
		$resultado = $sentencia->fetch();
		// var_dump($resultado);
		if ($resultado) {
			$_SESSION['error'] = 'Esta <strong>Cedula</strong> existe';
			$_SESSION['color-error'] = 'danger';
			header('location:../index.php?error=invalid-cedula');
			exit();		
		}else{
			$sql = "SELECT * from users where correo = ? ";
			$sentencia = $pdo->prepare($sql);
			$sentencia->execute(array($correo));
			$resultado = $sentencia->fetch();
			if ($resultado) {
			$_SESSION['error'] = 'Este <strong>Correo</strong> existe';
			$_SESSION['color-error'] = 'danger';
			header('location:../index.php?error=invalid-correo');
			exit();
			}else{

				$sql_agregar = "INSERT into users (cedula,nombres,apellidos,correo,telefono) values ('$cedula','$nombres','$apellidos','$correo','$telefono') ";
				$sentencia = $pdo->prepare($sql_agregar);
				$sentencia->execute();
				if ($sentencia) {
					$_SESSION['error'] = 'Se ha registrado satisfactoriamente';
					$_SESSION['color-error'] = 'success';
					header('location:../index.php?success=register');
					exit();
				}
			}
		}
	}
}



		