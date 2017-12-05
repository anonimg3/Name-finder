<!-- analizuj, nie kopiuj ;) -->
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Wyszukiwarka imion</title>
	<meta name="description" content="Wyszukiwarka z wyświetlaniem daty imienin, pochodzeniem oraz znaczeniem imion męskich i damskich." />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="stylesheet" href="style.css" type="text/css" />	
</head>

<body>
	<?php 
		include('imiona.php'); 
	?>
	<div id="container">
		<h1>Wyszukiwarka imion</h1>
		<hr>
		<div id="search">		
		<?php
			for($i=65;$i<91;$i++)
			{
				echo '<a href="index.php?name='.chr($i).'">'.chr($i).'</a>'."\t\n";
			}
		?>
		</div>
		<hr>
	<div class="two-column">
			<?php 
				if(isset($_GET['name']))
				{
					$nameChar = $_GET['name'];
					array_multisort($namesArray['name'], $namesArray['origin'], $namesArray['nameDay'], $namesArray['characteristic'], $namesArray['gender']);

					echo '<div class="single-col">'."\n";
					for($i=1;$i<count($namesArray['name']);$i++)
					{
						$firstLetter = $namesArray['name'][$i][0];
						$gender = $namesArray['gender'][$i];						
						if(strcasecmp($firstLetter,$nameChar) == 0 && strcasecmp($gender,'m') == 0)
						{
							echo '<div class="tooltip">'."\n";
							echo $namesArray['name'][$i]."\n";	
							echo '<span class="tooltiptext">'."\n";
							echo '<p>'.$namesArray['characteristic'][$i].'.</p>'."\n";
							echo '<p>'.$namesArray['name'][$i].' to imię pochodzenia '.$namesArray['origin'][$i].'.</p>'."\n";	
							echo '<p>Imieniny: '.$namesArray['nameDay'][$i].'.</p>'."\n";		
							echo '</span>'."\n";
							echo '</div>'."\n\n";
						}
					}
					echo '</div>'."\n";

					echo '<div class="single-col">'."\n";
					for($i=1;$i<count($namesArray['name']);$i++)
					{
						$firstLetter = $namesArray['name'][$i][0];
						$gender = $namesArray['gender'][$i];						
						if(strcasecmp($firstLetter,$nameChar) == 0 && strcasecmp($gender,'k') == 0)
						{
							echo '<div class="tooltip">'."\n";
							echo $namesArray['name'][$i]."\n";	
							echo '<span class="tooltiptext">'."\n";
							echo '<p>'.$namesArray['characteristic'][$i].'.</p>'."\n";
							echo '<p>'.$namesArray['name'][$i].' to imię pochodzenia '.$namesArray['origin'][$i].'.</p>'."\n";	
							echo '<p>Imieniny: '.$namesArray['nameDay'][$i].'.</p>'."\n";		
							echo '</span>'."\n";
							echo '</div>'."\n\n";
						}
					}
					echo '</div>'."\n";					
				} 
			?>			
		</div>
	</div>
</body>
</html>


