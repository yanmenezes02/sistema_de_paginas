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
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Paginação</title>
	<link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
	<div class="jumbotron">
		asdasd
	</div>
	<?php if($num > 0){ ?>
		<table>
			<thead>
				<tr>
					<td>Nome</td>
				</tr>
			</thead>
			<tbody>
				<?php do { ?>
				<tr>
					<td><?php echo $linha['titulo'];?></td>
				</tr>
			<?php } while($linha=$busca->fetch(PDO::FETCH_ASSOC)); ?>
			</tbody>
		</table>
	<?php } ?>
	<h5> inicia o paginador </h5>
	<ul>
		<li><a href="index.php?pagina=0">inicio</a></li>
		<?php for($i=0;$i<$num_paginas;$i++){ ?>
			<li><a href="index.php?pagina=<?php echo $i; ?>"><?php echo $i+1; ?></a></li>
		<?php } ?>
		<li><a href="index.php?pagina=<?php echo $num_paginas-1; ?>">fim</a></li>
	</ul>
</body>
<script src="bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
<script src="bootstrap-4.0.0/assets/js/vendor/jquery-1.9.1.min.js"></script>
<script src="bootstrap-4.0.0/assets/js/vendor/popper.min.js"></script>
<!-- Anotações -->
<!-- 
	
	$linha['NOME_O_CAMPO_DA_TABELA'] pode ser padronizado em uma variavel.
	
	Não é aconcelhavel,porém, padroniza td na hora de fazer o sistema.
 -->
</html>