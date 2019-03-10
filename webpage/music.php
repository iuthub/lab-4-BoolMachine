<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Music Viewer</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="viewer.css" type="text/css" rel="stylesheet" />
	</head>
	<body>

		<div id="header">

			<h1>190M Music Playlist Viewer</h1>
			<h2>Search Through Your Playlists and Music</h2>
		</div>

		<div id="listarea">
			<ul id="musiclist">

                 <?php
                    if(isset($_GET['playlist']) && $_GET['playlist']=='mypicks.txt'){
                    	$playlist = file("songs/mypicks.txt");
                   		foreach ($playlist as $filename) { ?>
                    		<li class="mp3item">
                        	<a href="<?= 'songs/'.$filename ?>"><?= $filename ?></a>
                    		</li>
                    		<?php }		}
                    else{ 
       					$filepath="songs/";
                		foreach (glob($filepath."*.mp3") as $filename) {
                			if(filesize($filename)>=1024){$size=round(filesize($filename)/1024,2)." KB";}
                			if(filesize($filename)>=1048576){ $size=round(filesize($filename)/1048576,2)." MB";}
                			else{$size=filesize($filename)." B";}
                			?>
                			<li class="mp3item"> <a href="<?php echo $filename;?>">
                    		<?php echo basename($filename);?></a> <?=$size ?> </li>
                			<?php        }
                   		foreach (glob($filepath."*.txt") as $filename) {         ?>
                			<li class="playlistitem"> <a href="<?php echo $filename."?playlist=".basename($filename);?>">
                    		<?php echo basename($filename);?></a><?=$size ?></li>
                			<?php } 	}	?>
            		
          </ul>
		</div>
	</body>
</html>