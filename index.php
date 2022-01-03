<?php
	$language = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == "fr";

	$url = 'http://' . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'REQUEST_URI' ];
	$url_components = parse_url( $url );

	$params = [];
	if ( isset( $url_components[ 'query' ] ) )
		parse_str( $url_components[ 'query' ], $params );
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="Bavardages ?" />
		<meta name="author" content="Clement Lucien @clucien Web Services" />

		<link rel="stylesheet" href="style.css" type="text/css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css"
			integrity="sha512-8bHTC73gkZ7rZ7vpqUQThUDhqcNFyYi2xgDgPDHc+GXVGHXq+xPjynxIopALmOPqzo9JZj0k6OqqewdGO3EsrQ=="
			crossorigin="anonymous" referrerpolicy="no-referrer"
		/>

		<title><?php echo ( $language == "fr" ) ? "Bavardages ?" : "Chatters ?" ?></title>

	</head>
	<body>
		<div class="ui container" >

			<?php
				$text = "";
				if ( isset( $params[ 'text' ] ) )
					$text = $params[ 'text' ];
				else
					$text = ( $language == "fr" ) ? "Compteur de bavardage" : "Nattering timer";
			?>
			<h1 class="ui center aligned header" id="title"><?php echo $text ?></h1>

			<br/>
			
			<div class="ui placeholder segment" id="screen">

				<div class="ui huge center aligned header" id="stopwatch">
					00:00:00
				</div>

				<div class="inline" id="controls">
						<button class="ui primary button"
							onclick="playButton()"
						>
							<i class="play icon"></i> Start
						</button>
						<button class="ui button"
							onclick="pauseButton()"
						>
							<i class="pause icon"></i> Pause
						</button>
						<button class="ui button"
							onclick="resetButton()"
						>
							<i class="stop icon"></i> Reset
						</button>
				</div>
				
			</div>

			<br>

			<?php 
				if ( !isset( $url_components[ 'query' ] ) )
				{
					echo "<i class='volume up icon'></i>";
					echo ( $language == "fr" ) ? " Montez le son ;)" : "Sound on ;)";
				}
			?>
			<br><br><br>

			<div class="footer cursorDefault ui container left aligned">
				<i class="heart icon"></i><?php echo ( $language == "fr" ) ? "Fait avec amour, utilisé avec partimonie. " : "Made with love, used with caution. " ?>
			</div>
			<div class="footer cursorDefault ui container right aligned">
				v1.0<?php echo ( $language == "fr" ) ? " - une création " : " - by " ?><a href="https://clucien.com" target="_blank">clucien WebServices</a>
			</div>

		</div>
		<script src="script.js"></script>
	</body>
</html>