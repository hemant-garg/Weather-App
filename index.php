<?php
$alert="";
if(array_key_exists('city', $_GET))
{
	if($_GET['city'] == ""){
		$alert = '<div class="alert alert-danger " role="alert">
  			<strong>Oops!</strong> Please enter the city name
			</div>';
		}
  	
  	else{
     
      $cityName = $_GET['city'];
      $city = str_replace(" ","-",$cityName);
      $file_headers = @get_headers("http://www.weather-forecast.com/locations/".$city."/forecasts/latest");
      if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
    
            $alert = '<div class="alert alert-danger " role="alert">
  			That city could not be found.
			</div>';
				
        }
      else{
        
      $wholemap = file_get_contents("http://www.weather-forecast.com/locations/".$city."/forecasts/latest");
  	  $firstArray = explode('</div><a class="forecast-magellan-target" name="forecast-part-0"><div data-magellan-destination="forecast-part-0"></div></a><p class="summary">',$wholemap); 
      $finalArray =  explode('</span></span></span></p><div class="forecast-cont"><div class="units-cont"><a class="units metric active">&deg;C</a><a class="units imperial">&deg;F</a></div>',$firstArray[1]);
     $alert = '<div class="alert alert-success" role="alert">'.$finalArray[0].'</div>';
  
      }
    
    
    
    }
  
}

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
	<title>  Weather App	</title>   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="weather.css">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Julee" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    
	<div id="panel">
	    <h1 class="display-3">Weather App</h1>
		<h3> Enter the name of a City</h3>
		<form action="">
			<label class="sr-only" for="city">Username</label>
		  	<div class="input-group mb-2 mr-sm-2 mb-sm-0">
		    <div class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
		    <input type="text" name="city" class="form-control" id="city" placeholder="E.g.  New Delhi, Tokyo">
		  	</div>
		  	<button type="submit" id="submit" class="btn btn-secondary">Check</button>
	  	</form>
	  	<div id="alert"> <?php  echo $alert  ?></div>
	
	</div> <!--panel div-->
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  

	<script>
		

	</script>
  </body>
</html>