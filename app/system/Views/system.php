<!DOCTYPE html>
<html>
<head>
	<title>SGRS - Painel</title>
</head>
<body style="margin: 0; padding: 0;">

	<header>
		<div class="top" style="width: 100vw; height: 6vh; background-color: #252525;">

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
		</div>
	</header>


	<div id="content">

	</div>
