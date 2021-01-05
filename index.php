<?php
/*-----------------------[ SETTINGS ]------------------------------*/
$settings['ip'] = '0.0.0.0'; // your ip
$settings['port'] = '30120'; // basically 30120
/*----------------------------------------------------------------*/
$content = json_decode(file_get_contents('http://'.$settings['ip'].':'.$settings['port'].'/info.json'), true);
if($content):
    $gta5_players = file_get_contents('http://'.$settings['ip'].':'.$settings['port'].'/players.json');
    $content = json_decode($gta5_players, true);
    $pl_count = count($content);
    $json = file_get_contents('http://'.$settings['ip'].':'.$settings['port'].'/info.json');
    $data = json_decode($json);
    $uptime = $data->vars->Uptime;
    $max_client = $data->vars->sv_maxClients;
    // $queue = $data->vars->Queue; // UNCOMMENT IF YOU WANT TO USE THIS (MAKE SURE YOU INSTALL THE REQUIREMENTS)


    // YOU CAN USE HTML OR CSS STYLE TO WRITE THIS 
    // THIS IS JUST AN EXAMPLE
    print "$pl_count";
    print "$uptime";
    // print "$queue";
endif;
?>