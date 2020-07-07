<?php	
	error_reporting(E_ERROR | E_PARSE);
	$weather = '';
	$error = '';
	if(isset($_GET['city'])) {
		$urlContent = file_get_contents('https://api.openweathermap.org/data/2.5/weather?q='.$_GET['city'].'&units=metric&appid=c99aa3d7cc8dd87a7d180ed93318d8a8');
		$forcastArray = json_decode($urlContent, true);
		
		if($forcastArray['cod'] == 200) {

			$weather = "The weather in ".$_GET['city']."</h4><h7> is ".$forcastArray['weather'][0]['description'];
			$weather = $weather.'.<br> The temperature is '.$forcastArray['main']['temp'].' &#8451, the speed of wind is '.$forcastArray['wind']['speed'].' m/s.';
		} else {
			$error = "The city name is incorrect. Please try another name.";
		}
	}
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="styles/style.css">

    <title>Weather App</title>
  </head>
  <body>

  	<div class="container" id="mainDIV">
  		<h1>Weather in the city</h1>
  		<form>
		  <div class="form-group">
		    <label id="inputLabel" for="city">Input a city name:</label>
		    <input type="text" name="city" class="form-control" id="city" aria-describedby="Forcast city" placeholder="Enter city name">
		  </div>
		  <button type="submit" class="btn btn-primary">Get the forcast</button>
		</form>
  	</div>

  	<div id="weatherDIV">
  		
		  <p>
		  	<?php 
		  		if($weather) {
		  	  		echo '<div class="alert alert-info" role="alert">
		  	  				  <h4 class="alert-heading">'.$weather.'</h7></p><hr><p class="mb-0">Data presented from openweathermap.org</p></div>'; 
		  		} else if($error) {
		  			echo '<div class="alert alert-danger" role="alert">
		  	  				  <h4 class="alert-heading">'.$error.'</h7></p><hr><p class="mb-0">Data presented from openweathermap.org</p></div>'; 
		  		}
		  	?>
		 
  	</div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>