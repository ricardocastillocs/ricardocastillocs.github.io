<?php if (!defined('FLUX_ROOT')) exit; ?>
<section class="padding-top-60 padding-bottom-40 border-top-1 border-grey-200">	
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
				<h4 class="page-header no-margin-top">WELCOME TO <?=$RBS['Server-Name']?></h4>
				<p style="text-align: justify">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eu leo lobortis, aliquam dui in, gravida dui. Fusce a blandit dolor.
					<br>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eu leo lobortis, aliquam dui in, gravida dui. Fusce a blandit dolor.
					<br>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eu leo lobortis, aliquam dui in, gravida dui. Fusce a blandit dolor.
					<br>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eu leo lobortis, aliquam dui in, gravida dui. Fusce a blandit dolor.
				</p>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
				<img src="<?php echo $this->themePath('img/render_welcome.png')?>">
			</div>
			<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
				<?php include_once('painel_login.php') ?>
			</div>
		</div>
	</div>
</section>
		
<section class="bg-grey-100 padding-top-60 padding-bottom-60 relative">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<div class="title text-center no-padding-top">
					<h4><i class="fa fa-heart-o"></i>News</h4>
					<p class="text-center margin-top-30">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eu leo lobortis, aliquam dui in, gravida dui. Fusce a blandit dolor. Cras ultricies pretium vulputate.</p>
				</div>
			</div>
		</div>
		<div class="row">
			<?php include_once('novidades.php')?>
		</div>
	</div>
</section>
		
		
<section class="padding-top-60 padding-bottom-40 border-top-1 border-grey-200">	
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<div class="title text-center no-padding-top">
					<h4><i class="fa fa-star"></i> CashShop</h4>
					<p class="text-center margin-top-30">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eu leo lobortis, aliquam dui in, gravida dui. Fusce a blandit dolor. Cras ultricies pretium vulputate.</p>
				</div>
			</div>
		</div>
		<div class="row slider">
			<div class="owl-carousel">
				<?php include_once('cashshop.php')?>
			</div>
			<a href="#" class="prev"><i class="fa fa-angle-left"></i></a>
			<a href="#" class="next"><i class="fa fa-angle-right"></i></a>
		</div>
	</div>
</section>
	
	
<div class="video-section background-image relative overflow-hidden margin-top-40 padding-40 no-padding-xs">
	<span class="background-overlay"></span>
	<div class="container">
		<div class="embed-responsive embed-responsive-16by9">
			<iframe class="embed-responsive-item" src="<?=$RBS['youtube']?>" allowfullscreen></iframe>
		</div>
	</div>
</div>