<?php if (!defined('FLUX_ROOT')) exit; 
$title = Flux::message('ServerStatusTitle');
$cache = FLUX_DATA_DIR.'/tmp/ServerStatus.cache';

if (file_exists($cache) && (time() - filemtime($cache)) < (Flux::config('ServerStatusCache') * 600)) {
    $serverStatus = unserialize(file_get_contents($cache));
}
else {
    $serverStatus = array();
    foreach (Flux::$loginAthenaGroupRegistry as $groupName => $loginAthenaGroup) {
        if (!array_key_exists($groupName, $serverStatus)) {
            $serverStatus[$groupName] = array();
        }

        $loginServerUp = $loginAthenaGroup->loginServer->isUp();

        foreach ($loginAthenaGroup->athenaServers as $athenaServer) {
            $serverName = $athenaServer->serverName;

            $sql = "SELECT COUNT(char_id) AS players_online FROM {$athenaServer->charMapDatabase}.char WHERE online > 0";
            $sth = $loginAthenaGroup->connection->getStatement($sql);
            $sth->execute();
            $res = $sth->fetch();

            $serverStatus[$groupName][$serverName] = array(
                'loginServerUp'     => $loginServerUp,
                'charServerUp'      => $athenaServer->charServer->isUp(),
                'mapServerUp'       => $athenaServer->mapServer->isUp(),
                'playersOnline'     => intval($res ? $res->players_online : 0),

            );
        }
    }
    
    $fp = fopen($cache, 'w');
    if (is_resource($fp)) {
        fwrite($fp, serialize($serverStatus));
        fclose($fp);
    }
}
?> 

<?php 
    $online = '<span style="color: #A3D900">ONLINE</span>';
    $offline = '<span style="color: red">OFFLINE</span>';
    foreach ($serverStatus as $privServerName => $gameServers):
        foreach ($gameServers as $serverName => $gameServer):
        if ($gameServer['loginServerUp']) { $loginserver = 1; } else { $loginserver = 0; } 
        if ($gameServer['charServerUp']) { $charserver = 1; } else { $charserver = 0; } 
        if ($gameServer['mapServerUp']) { $mapserver = 1; } else { $mapserver = 0; } 
        $online_player = $gameServer['playersOnline'];
        endforeach; 
    endforeach; 
?>
<div class="row">
	<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12"></div>
	<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
		<img style="float: left; padding-top: 10px" src="<?php echo $this->themePath('img/statusbar/01.png')?>">
		<div style="float: left">
			<span style="font-size: 12px; padding-left: 7px;">LOGIN SERVER</span>
			<br>
			<?php if ( $loginserver ) { echo $online; } else { echo $offline; } ?>
		</div>
	</div>
	<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
		<img style="float: left; padding-top: 10px" src="<?php echo $this->themePath('img/statusbar/02.png')?>">
		<div style="float: left; padding-left: 10px">
			<span style="font-size: 12px; padding-left: 6px">CHAR SERVER</span>
			<br>
			<?php if ( $charserver ) { echo $online; } else { echo $offline; } ?>
		</div>
	</div>
	<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
		<img style="float: left; padding-top: 10px" src="<?php echo $this->themePath('img/statusbar/03.png')?>">
		<div style="float: left; padding-left: 10px">
			<span style="font-size: 12px; padding-left: 5px">MAP SERVER</span>
			<br>
			<?php if ( $mapserver ) { echo $online; } else { echo $offline; } ?>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" style="border-left: 2px solid #154380">
		<img style="float: left; padding-top: 10px; padding-left: 30px" src="<?php echo $this->themePath('img/statusbar/04.png')?>">
		<div style="float: left; padding-left: 10px">
			<span style="font-size: 12px; padding-left: 10px">ONLINE PLAYERS</span>
			<br>
			<span style="text-align: center;"><?=$online_player?></span>
		</div>
	</div>
	<div class="col-lg-1 col-md-6 col-sm-6 col-xs-12"></div>	
</div>