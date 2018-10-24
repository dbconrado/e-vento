<?php
require_once 'funcoes.php';
require_once 'banco.class.php';
require_once 'login.class.php';

session_start();

$banco = new Banco();
$login = new Login($banco);

if (!$login->usuarioEstaLogado()) {
	redirecionarPara('login.php');
}

$usuario = $login->getUsuario();

$atividades = $banco->selectSql('SELECT * FROM Atividade ORDER BY nome_atividade');

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro de Atividades</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css.css">
</head>
<body>
	<div id="conteiner">
		<h1>Selecione uma Atividade</h1>
		<?php
		foreach ($atividades as $atividade) {
			?>
			<div class="linkatividade"><a href="qrcode.php?id=<?= $atividade['id_atividade'] ?>"> <?= $atividade['nome_atividade'] ?> </a></div>
			<?php
		}

		?>
	</div>
</body>
</html>
