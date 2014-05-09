<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Gerenciador</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width">
	<link rel="shortcut icon" href="favicon.png">
	<link rel="stylesheet" href="styles/vendor/normalize.min.css"/>

	<link rel="stylesheet" href="styles/vendor/bootstrap.min.css"/>

	<link rel="stylesheet" href="styles/vendor/font-awesome.min.css"/>

	<link rel="stylesheet" href="styles/vendor/flat-ui.min.css"/>

	<link rel="stylesheet" href="styles/main.min.css"/>
</head>
<body id="login">
	<div>
		<h1>Gerenciador</h1>
		<form action="includes/validaLogin.php" method="post">
			<div class="form-group">
				<span class="input-icon"><i class="fa fa-lg fa-user"></i></span>
				<input name="login" type="text" id="login-username" placeholder="Usuario" required class="form-control">
			</div>
			<div class="form-group">
				<span class="input-icon"><i class="fa fa-lg fa-lock"></i></span>
				<input name="pass" type="password" id="login-password" placeholder="Senha" required class="form-control">
			</div>
			<button onclick="submitForm()" class="btn btn-wide btn-info"><span><i class="fa fa-sign-in"></i></span> Entrar</button>
		</form>
	</div>

	<script src="scripts/vendor/jquery.min.js"></script>

  <script src="scripts/vendor/bootstrap.min.js"></script>

  <script src="scripts/plugins.min.js"></script>

  <script src="scripts/main.min.js"></script>
</body>
</html>