<?php
	function conectar(){
		try{
			$pdo = new PDO("mysql:host=localhost;dbname=NOME_DO_BANCO_DE_DADOS","NOME", "SENHA");
		}catch(PDOException $e){
			echo "Conexão não foi feita corretamente: " . $e->getMessage(); 
		}
		return $pdo;
	}

?>