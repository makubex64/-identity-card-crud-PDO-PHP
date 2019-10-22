<?php

$link = 'mysql:host=localhost;dbname=id_cedula';
$usuario = 'root';
$contraseña = '';


	try {
	    $pdo = new PDO($link, $usuario , $contraseña);

	     if (isset($pdo)) {
	    	echo '<p class="text text-info">conectado...</p>';
	    }

	    // foreach($pdo->query('SELECT * from `users`') as $fila) {
	    //     print_r($fila);
	    // }

	   

	    $conn = null;
	} catch (PDOException $e) {
	    print "¡Error!: " . $e->getMessage() . "<br/>";
	    die();
	}