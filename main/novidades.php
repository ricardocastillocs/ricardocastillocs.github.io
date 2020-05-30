<?php 
    if (!defined('FLUX_ROOT')) exit;

    $all = $news = $updates = $events = array();
    if( $RBS['AtivarRSS'] ) {
    	include $this->themePath('main/rsslib.php', true);
    	$all  = RSS_Display( array( 'news' => $RBS['news'], 'updates' => $RBS['updates'], 'events' => $RBS['events']), 3 );
    }

    foreach ($all as $key => $item):
	$title = (strlen($item['title'])>30)? substr($item['title'], 0, 30)."..":$item['title'];
	$description = (strlen(strip_tags($item['description']))>143)? substr(strip_tags($item['description']), 0, 200)."..":$item['description'];
?>
<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
	<div class="entry-post">
		<div class="thumb">
			<img src="<?php echo $this->themePath('img/news/' . $item['image'] .'.jpg'); ?>" alt="">
			<div class="thumb-info"><span class="label label-primary"><?php echo $item['image'] ?></span></div>
		</div>
		<div class="caption">
			<h3 class="main-title"><a href=""><?php echo $title; ?></a></h3>
			<p class="margin-bottom-20"><?php echo $description; ?>...</p>
			<a href="<?php echo $item['link']; ?>" class="btn btn-block btn-primary">Read More...</a>
		</div>
	</div>
</div>
<?php endforeach; ?>
