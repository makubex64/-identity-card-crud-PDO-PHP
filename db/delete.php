<?php


if (isset($_GET['id'])) {
	include_once 'conexion.php';
	session_start();
	$id = $_GET['id'];
	$query = "DELETE from users where id = $id ";
	$sentencia = $pdo->prepare($query);
	$sentencia->execute(array($id));
	$_SESSION['error'] = 'Eliminado satisfactoriamente';
	$_SESSION['color-error'] = 'success';
	header('location:../index.php');
	exit();

	if (!$pdo) {
		echo "<script>alert(Se ha perdido la conexión :( ));window.location='../index.php';</script>";
		exit();
	}
}