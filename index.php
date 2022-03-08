<!DOCTYPE html>
<html lang="en">
<head>
	<title>Rat</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="format-detection" content="telephone=no">
</head>
<body>
	<?php
		// Function to get the user IP address
		function getClientIP():string
		{
			$keys=array('HTTP_CLIENT_IP','HTTP_X_FORWARDED_FOR','HTTP_X_FORWARDED','HTTP_FORWARDED_FOR','HTTP_FORWARDED','REMOTE_ADDR');
			foreach($keys as $k)
			{
				if (!empty($_SERVER[$k]) && filter_var($_SERVER[$k], FILTER_VALIDATE_IP))
				{
						return $_SERVER[$k];
				}
			}
			return "UNKNOWN";
		}

		$ip = getClientIP();

		if ($ip != "UNKNOWN" && $ip != "127.0.0.1"){
			$xml = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=".$ip);
			echo $xml->geoplugin_countryName ;


			echo "<pre>";
			foreach ($xml as $key => $value){
				echo $key , "= " , $value ,  " \n" ;
			}
			echo "</pre>";
		};
	?>
</body>
</html>