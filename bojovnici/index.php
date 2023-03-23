<!DOCTYPE html>

<html lang="cs-cz">
<head>
	<meta charset="utf-8" />
	<title>ARÉNA SMRTI</title>
</head>
<body>

	<?php

		// samotny autoloder
		function nactiTridu($trida) : void
		{
			require("tridy/$trida.php");
		}
		spl_autoload_register("nactiTridu");


		$zalgoren = new Bojovnik("Pejzák", 100, 20, 10);
		$gandalf = new Mag("Urozenec", 60, 15, 12, 30, 45);


		$arena = new Arena($zalgoren, $gandalf);

		$arena->zapas();
	?>

<body>
</html>