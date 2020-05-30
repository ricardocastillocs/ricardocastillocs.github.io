<?php if (!defined('FLUX_ROOT')) exit; ?>
<ul class="nav padding-10">
<?php
    $changelog = array();
    if( $RBS['AtivarRSS-M'] ) {
    	include_once $this->themePath('main/rsslib.php', true);
    	$changelog  = RSS_Display( array( 'maintence' => $RBS['maintence']), 6 );
    }
    foreach ($changelog as $key => $item):
	$title = (strlen($item['title'])>30)? substr($item['title'], 0, 30)."..":$item['title'];
?>
    <li><a href="<?=$item['link']?>" target="_blank"><?=$title?><span class="pull-right"><?php echo date('d/m/Y', strtotime( $item['date'] ) ) ?></span></a></li>
<?php endforeach; ?>
</ul>