<html>
<head>
	<title>403 Forbidden</title>
</head>
<body>
<div>
	<header>
	<h1><?php echo $titulo; ?></h1><br>		
	</header>
	<nav>
	<ul>
		<?php foreach($menu as $item): ?>
			<li> <?php echo $item; ?> </li>
		<?php endforeach; ?>
	</ul>
	</nav>
</div>
<p>Exemplo 3</p>

<h2><?php echo $texto; ?></h2>
</body>
</html>