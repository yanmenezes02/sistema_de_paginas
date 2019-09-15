<?php

	include('config/sistema.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Paginação</title>
	<link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row mt-5">
			<div class="col-md-4 ml-5">
				<?php if($num > 0){ ?>
					<table class="table table-condensed table-bordered">
						<thead>
							<tr>
								<th>Nome</th>
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
				<div class="btn-group center">
						
					<button type="button" class="btn btn-primary">
						<a href="index.php?pagina=0">inicio</a>
					</button>

					<?php for($i=0;$i<$num_paginas;$i++){ ?>
						
					<button type="button" class="btn btn-primary">
						<a href="index.php?pagina=<?php echo $i; ?>"><?php echo $i+1; ?></a>
					</button>

					<?php } ?>
					
					<button type="button" class="btn btn-primary">
						<a href="index.php?pagina=<?php echo $num_paginas-1; ?>">fim</a>
					</button>							
				</div>	
			</div>
		</div>	
	</div>
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