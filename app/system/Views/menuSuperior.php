<!DOCTYPE html>
<html>
<head>
	<title>SGRS - Painel</title>
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body style="margin: 0; padding: 0;">

	<header>
		<div class="top" style="width: 100%; height: 6vh; background-color: #252525; position: fixed;">
			
		</div>
		<div class="nav">
			<ul>
				<?php 
				$method = 'GET';
				foreach ($teste as $key => $value) {
					
					$param = "'$method','$value'";
					

					echo ('<li onclick="request('.$param.');">');
					echo "$value <br>";
					echo '</li>';
				}

				?>
			</ul>
			<div id="logo">
				SGRS
			</div>
		</div>
	</header>
