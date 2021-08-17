<?php 
 include 'conexao.php';
 include 'functions.php';
date_default_timezone_set('America/Sao_Paulo');
?>
<head><meta charset="utf-8">
	<title>	Painel VBLOG</title>
  <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="principal" align="center">
<?php
$pedido = $_POST['pedidos'];
$loja = $_POST['loja'];
$now = date('Y/m/d H:i:s');
$arrayPedido = preg_split('/\s+/', trim($pedido));
$erros = [];

foreach ($arrayPedido as $key => $value) {
	$validacao = validadarPedido ($conexao, $value, $loja);
	if (!is_null($validacao)) {
		$sucesso = inserirDados($conexao, $value, $loja, $now);
	} else {
	array_push($erros, $value);
	}
}
if (empty($erros)) {
    ?> 

	<span class="iconify mt-5" data-icon="clarity:success-standard-solid" data-inline="false" style="color: #28A745;" data-width="100px" data-height="100px"></span>
	<h3 class="text-success">Pedidos inseridos com sucesso.</h1>
	<br>
    <a href="painel/click/romaneio" class="btn btn-success">Voltar</a>

<?php
} else {
    ?> 
<span class="iconify mt-5" data-icon="akar-icons:chat-error" data-inline="false" style="color: #DC3545;" data-width="100px" data-height="100px"></span>
<h3 class="text-danger">OPS! Alguns pedidos não são da loja selecionada:</h1>
<p class="lead text-danger mt-0">Esses pedidos não foram incluidos na requisição, os demais foram inseridos com sucesso.</p>
<?php 
foreach ($erros as $pedidos) { ?>
<p class="text-danger"><?php echo($pedidos)?> </p>
<?php }
?>
<br>
<a href="painel/click/romaneio" class="btn btn-danger">Voltar</a>
</div> <!-- fim div principal -->

</div> <!-- fim div container -->
<?php
}