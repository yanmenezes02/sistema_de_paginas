<?php
	include("conexao.php");
	$pdo = conectar();
	
	//Declara o limite por pagina
	$limite = 10;
	//Pega a pagina atual
	if(!isset($_GET['pagina'])){
		$pagina = 0;
	}else{
		$pagina = intval($_GET['pagina']);
	}
	

	//Calcula o inicio dos objetos a mostrar
	$inicio = $limite*$pagina;
	
	//Busca no banco de dados ja com os limites Pré-setados
	$busca = $pdo->prepare("SELECT * FROM capitulos LIMIT $inicio,$limite");
	$busca->execute();
	
	//Joga os objetos na variavel $linha
	$linha=$busca->fetch(PDO::FETCH_ASSOC);
	
	$buscaTot = $pdo->prepare("SELECT * FROM capitulos");
	$buscaTot->execute();
	//Conta o total de objetos do banco de dados
	$num = $buscaTot->rowCount();
	//calcula o tanto de paginas vão ser usadas
	$num_paginas = ceil($num/$limite);
	

?>
