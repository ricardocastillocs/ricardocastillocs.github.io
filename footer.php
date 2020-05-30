<?php if (!defined('FLUX_ROOT')) exit; ?>
		<?php if($_thisModule=='main' AND $_thisAction=='index'): ?>
		<?php else: ?>
		            </div>
		        </div>	
        	</div>
    	</section>
		<?php endif; ?>
		<section class="bg-success padding-40">
			<div class="container text-center">
				<h2 class="font-size-26 color-white font-weight-300 font-open-sans">VOTE AND EARN POINTS!.</h2>
				<a href="<?php echo $this->url('voteforpoints') ?>" target="_blank" class="btn btn-white btn-lg btn-outline margin-top-30">Vote now!<i class="glyphicon glyphicon-check margin-left-10"></i></a>
			</div>
		</section>
	</div>
	
	<!-- footer -->
	<footer>
		<div class="container">
			<div class="widget row">
				<div class="col-lg-4 col-xs-12">
					<h4 class="title">ABOUT  <?=$RBS['Server-Name']?></h4>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec pharetra mattis arcu, a congue leo malesuada eu. Nam nec mauris ut odio tristique varius et eu metus. Quisque massa purus, aliquet quis blandit et, mollis sed lorem.
						<br /> <br />
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec pharetra mattis arcu, a congue leo malesuada eu. Nam nec mauris ut odio tristique varius et eu metus.
						<br /> <br />
						Sed vel tincidunt elit. Phasellus at varius odio, sit amet fermentum mauris.
					</p>
				</div>
					
				<div class="col-lg-4 col-xs-12">
					<h4 class="title">ChangeLog's</h4>
					<div class="row">
						<div class="col-lg-12 padding-10">	
							<?php include_once('main/changelog.php') ?>
						</div>
					</div>
				</div>
		
				<div class="col-lg-4 col-xs-12">
					<h4 class="title">Facebook</h4>
					<iframe src="https://www.facebook.com/plugins/page.php?href=<?=$RBS['facebook']?>%2F&tabs&width=340&height=214&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="214" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">	
				<ul class="list-inline">
					<li><a href="<?=$RBS['twitter']?>" class="btn btn-circle btn-social-icon btn-twitter" data-toggle="tooltip" title="Follow us on Twitter"><i class="fa fa-twitter"></i></a></li>
					<li><a href="<?=$RBS['facebook']?>" class="btn btn-circle btn-social-icon btn-facebook" data-toggle="tooltip" title="Follow us on Facebook"><i class="fa fa-facebook"></i></a></li>
					<li><a href="<?=$RBS['instagram']?>" class="btn btn-circle btn-social-icon btn-instagram" data-toggle="tooltip" title="Follow us on Instagram"><i class="fa fa-instagram"></i></a></li>
				</ul>
				<?=date('Y')?> &copy; All rights reserved.<br/>Designed and coded by: <a href="https://facebook.com/ragnarokbrasilservice" target="_blank">Ragnarok Brasil Service</a>
			</div>
		</div>
	</footer>	
	<!-- /.footer -->
	
	<!-- Javascript -->
	<script src="<?php echo $this->themePath('plugins/jquery/jquery-1.11.1.min.js')?>"></script>
	<script src="<?php echo $this->themePath('plugins/bootstrap/js/bootstrap.min.js')?>"></script>
	<script src="<?php echo $this->themePath('plugins/core.js')?>"></script>
	<script src="<?php echo $this->themePath('plugins/owl-carousel/owl.carousel.min.js')?>"></script>
	<script>
	(function($) {
	"use strict";
		var owl = $(".owl-carousel");
			 
		owl.owlCarousel({
			items : 4, //4 items above 1000px browser width
			itemsDesktop : [1000,3], //3 items between 1000px and 0
			itemsTablet: [600,1], //1 items between 600 and 0
			itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
		});
			 
		$(".next").click(function(){
			owl.trigger('owl.next');
			return false;
		})
		$(".prev").click(function(){
			owl.trigger('owl.prev');
			return false;
		})
	})(jQuery);
	</script>
</body>
</html>