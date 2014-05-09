<!doctype html>
<html lang="pt-br">
<head>
	<?php include_once 'includes/head.php'; ?>
</head>
<body>
	<div class="top-bar">
		<?php include_once 'includes/header.php'; ?>
	</div> <!-- end top-bar -->

	<div class="wrapper">
		<div class="sidebar pull-left">
			<?php include_once 'includes/sidebar.php'; ?>
		</div> <!-- end sidebar -->

		<div class="main pull-left clearfix">
			<?php
				if(isset($pageContent))
					print $pageContent;
				else{
					print '<strong>Conteudo da página não encontrado!<br>Redireciondando para página inicial.</strong>'; //<script>setTimeout(function(){window.location.href = "http://localhost/festivaldochopp.com.br/gerenciador/home";}, 5000);</script>';
				}
			?>
		</div> <!-- end main -->
	</div> <!-- end wrapper -->
	<?php include_once 'includes/footer.php'; ?>
</body>
</html>