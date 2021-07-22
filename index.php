<?php
function Dapetin_Dia($url)
{
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
	$result = curl_exec($curl);
	curl_close($curl);

	return json_decode($result, true);
} 
// SERVER SETTINGS
$server_settings['ip'] = "";
$server_settings['port'] = "";

// MAIN CODE
$urldynamic = Dapetin_Dia("http://".$server_settings['ip'].":".$server_settings['port']."/dynamic.json");

if($urldynamic):
	$info = Dapetin_Dia("http://".$server_settings['ip'].":".$server_settings['port']."/info.json");

	$playeron = $urldynamic['clients'];
	$playermax = $urldynamic['sv_maxclients'];
	$playeronpercentage = ($playeron * 100) / $playermax;
	$queue = $info['vars']['Queue'];
	$uptime = $info['vars']['Uptime'];
else:
	$playeron = "0";
	$playermax = "128";
	$playeronpercentage = "0";
	$queue = "0";
  $uptime = "00h 00m";
endif;

// USAGE
// <?= $playeron; =>

?>
