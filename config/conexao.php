<?php
	function conectar(){
		try{
			$pdo = new PDO("mysql:host=localhost;dbname=livro","root", "123");
		}catch(PDOException $e){
			echo "Conexão não foi feita corretamente: " . $e->getMessage(); 
		}
		return $pdo;
	}

?>