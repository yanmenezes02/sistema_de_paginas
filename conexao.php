<?php
	function conectar(){
		try{
			$pdo = new PDO("mysql:host=localhost;dbname=livro","root", "");
		}catch(PDOException $e){
			echo "Conexão n foi feita corretamente: " . $e->getMessage(); 
		}
		return $pdo;
	}

?>