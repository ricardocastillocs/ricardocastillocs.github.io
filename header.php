<?php if (!defined('FLUX_ROOT')) exit; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- META -->
		<meta charset="utf-8">
		<?php if (isset($metaRefresh)): ?>
		<meta http-equiv="refresh" content="<?php echo $metaRefresh['seconds'] ?>; URL=<?php echo $metaRefresh['location'] ?>" />
		<?php endif ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title><?php echo Flux::config('SiteTitle'); if (isset($title)) echo ": $title" ?></title>
		
		<!-- CORE CSS -->
		<link href="<?php echo $this->themePath('plugins/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
		<link href="<?php echo $this->themePath('css/style.css') ?>" rel="stylesheet">
		<link href="<?php echo $this->themePath('css/helpers.css') ?>" rel="stylesheet">
		
		<!-- PLUGINS -->
		<link href="<?php echo $this->themePath('plugins/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
		<link href="<?php echo $this->themePath('plugins/ionicons/css/ionicons.min.css') ?>" rel="stylesheet">
		<link href="<?php echo $this->themePath('plugins/animate/animate.min.css') ?>" rel="stylesheet">
		<link href="<?php echo $this->themePath('plugins/animate/animate.delay.css') ?>" rel="stylesheet">
		<link href="<?php echo $this->themePath('plugins/owl-carousel/owl.carousel.css') ?>" rel="stylesheet">
		
		<link rel="stylesheet" href="<?php echo $this->themePath('css/flux.css') ?>" type="text/css" media="screen" title="" charset="utf-8" />
		<link href="<?php echo $this->themePath('css/flux/unitip.css') ?>" rel="stylesheet" type="text/css" media="screen" title="" charset="utf-8" />
		<?php if (Flux::config('EnableReCaptcha')): ?>
		<link href="<?php echo $this->themePath('css/flux/recaptcha.css') ?>" rel="stylesheet" type="text/css" media="screen" title="" charset="utf-8" />
		<?php endif ?>
		<!--[if IE]>
		<link rel="stylesheet" href="<?php echo $this->themePath('css/flux/ie.css') ?>" type="text/css" media="screen" title="" charset="utf-8" />
		<![endif]-->	
		<!--[if lt IE 9]>
		<script src="<?php echo $this->themePath('js/ie9.js') ?>" type="text/javascript"></script>
		<script type="text/javascript" src="<?php echo $this->themePath('js/flux.unitpngfix.js') ?>"></script>
		<![endif]-->
		<script type="text/javascript" src="<?php echo $this->themePath('js/jquery-1.8.3.min.js') ?>"></script>
		<script type="text/javascript" src="<?php echo $this->themePath('js/flux.datefields.js') ?>"></script>
		<script type="text/javascript" src="<?php echo $this->themePath('js/flux.unitip.js') ?>"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				var inputs = 'input[type=text],input[type=password],input[type=file]';
				$(inputs).focus(function(){
					$(this).css({
						'background-color': '#f9f5e7',
						'border-color': '#dcd7c7',
						'color': '#726c58'
					});
				});
				$(inputs).blur(function(){
					$(this).css({
						'backgroundColor': '#ffffff',
						'borderColor': '#dddddd',
						'color': '#444444'
					}, 500);
				});
				$('.menuitem a').hover(
					function(){
						$(this).fadeTo(200, 0.85);
						$(this).css('cursor', 'pointer');
					},
					function(){
						$(this).fadeTo(150, 1.00);
						$(this).css('cursor', 'normal');
					}
				);
				$('.money-input').keyup(function() {
					var creditValue = parseInt($(this).val() / <?php echo Flux::config('CreditExchangeRate') ?>, 10);
					if (isNaN(creditValue))
						$('.credit-input').val('?');
					else
						$('.credit-input').val(creditValue);
				}).keyup();
				$('.credit-input').keyup(function() {
					var moneyValue = parseFloat($(this).val() * <?php echo Flux::config('CreditExchangeRate') ?>);
					if (isNaN(moneyValue))
						$('.money-input').val('?');
					else
						$('.money-input').val(moneyValue.toFixed(2));
				}).keyup();
				
				// In: js/flux.datefields.js
				processDateFields();
			});
			
			function reload(){
				window.location.href = '<?php echo $this->url ?>';
			}
		</script>
		
		<script type="text/javascript">
			function updatePreferredServer(sel){
				var preferred = sel.options[sel.selectedIndex].value;
				document.preferred_server_form.preferred_server.value = preferred;
				document.preferred_server_form.submit();
			}
			
			function updatePreferredTheme(sel){
				var preferred = sel.options[sel.selectedIndex].value;
				document.preferred_theme_form.preferred_theme.value = preferred;
				document.preferred_theme_form.submit();
			}

            function updatePreferredLanguage(sel){
                var preferred = sel.options[sel.selectedIndex].value;
                setCookie('language', preferred);
                reload();
            }

			// Preload spinner image.
			var spinner = new Image();
			spinner.src = '<?php echo $this->themePath('img/spinner.gif') ?>';
			
			function refreshSecurityCode(imgSelector){
				$(imgSelector).attr('src', spinner.src);
				
				// Load image, spinner will be active until loading is complete.
				var clean = <?php echo Flux::config('UseCleanUrls') ? 'true' : 'false' ?>;
				var image = new Image();
				image.src = "<?php echo $this->url('captcha') ?>"+(clean ? '?nocache=' : '&nocache=')+Math.random();
				
				$(imgSelector).attr('src', image.src);
			}
			function toggleSearchForm()
			{
				//$('.search-form').toggle();
				$('.search-form').slideToggle('fast');
			}

            function setCookie(key, value) {
                var expires = new Date();
                expires.setTime(expires.getTime() + expires.getTime()); // never expires
                document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
            }
		</script>
		
		<?php if (Flux::config('EnableReCaptcha')): ?>
			<script src='https://www.google.com/recaptcha/api.js'></script>
		<?php endif ?>
	</head>

	<body class="header-fixed">
		<?php include_once('main/rbs_config.php') ?>
		<header>
			<div class="container">
			<span class="bar hide"></span>
			<a href="<?php echo $this->url('main') ?>" class="logo"><img src="<?php echo $this->themePath('img/logo.png') ?>" alt=""></a>
			<nav style="padding-left: 10px !important;">
				<div class="nav-control">
					<ul>
						<li><a href="<?php echo $this->url('main') ?>">Home</a></li>
						<li><a href="<?php echo $this->url('main','info') ?>">Info</a></li>
						<li class="dropdown mega-dropdown">
							<a href="#">Downloads <i class="fa fa-angle-down"></i></a>
							<ul class="dropdown-menu mega-dropdown-menu category row">
								<li class="col-lg-2 col-md-2 col-sm-3">
									<ul>
										<li class="dropdown-header">Downloads</li>
										<li class="active"><a href="#"><i class="glyphicon glyphicon-download-alt"></i> Patch</a></li>
										<li><a href="<?=$RBS['down-bro']?>"><i class="glyphicon glyphicon-download-alt"></i> Oficial RO (2.1 GB)</a></li>
									</ul>
								</li>
								<li class="col-lg-4 col-md-3">
									<a href="<?=$RBS['down-lite']?>">
										<img src="<?php echo $this->themePath('img/patch_lite.jpg')?>" alt="" />
										<div class="caption">
											<span class="label label-warning">150.5mb</span>
											<h3>Patch Lite</h3>
											<p>Download client lite....</p>
										</div>
									</a>
								</li>
								<li class="col-lg-4 col-md-3">
									<a href="<?=$RBS['down-full']?>">
										<img src="<?php echo $this->themePath('img/patch_full.jpg')?>" alt="" />
										<div class="caption">
											<span class="label label-primary">2.1gb</span>
											<h3>Patch Full</h3>
											<p>Download client full....</p>
										</div>
									</a>
								</li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle">Rankings <i class="fa fa-angle-down"></i></a>
							<ul class="dropdown-menu default">
								<li><a href="<?php echo $this->url('ranking','character') ?>"> Character</a></li>
								<li><a href="<?php echo $this->url('ranking','guild') ?>"> Guilds</a></li>
								<li><a href="<?php echo $this->url('ranking','zeny') ?>"> Zeny</a></li>
								<li><a href="<?php echo $this->url('ranking','death') ?>"> Deaths</a></li>
								<li><a href="<?php echo $this->url('ranking','alchemist') ?>"> Alchemist</a></li>
								<li><a href="<?php echo $this->url('ranking','blacksmith') ?>"> Blacksmith</a></li>
							</ul>
						</li>
						<li><a href="<?php echo $this->url('donate') ?>">Donate</a></li>
						<?php if (!$session->isLoggedIn()): ?>  
						<li><a href="<?php echo $this->url('account','create') ?>">Register</a></li>
						<?php endif; ?>
						<li><a href="<?=$RBS['forum']?>">Community</a></li>
						<li><a href="<?php echo $this->url('servicedesk') ?>">Support</a></li>
					</ul>
					</div>
				</nav>
				<div class="nav-right">
					<div class="nav-profile">
					    <?php if (!$session->isLoggedIn()): ?>
						<a href="#" id="nav-profile" class="profile dropdown-toggle" data-toggle="dropdown"><span><i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;&nbsp;Visitant</span></a>
						<?php else: ?>
						<a href="#" id="nav-profile" class="profile dropdown-toggle" data-toggle="dropdown"><span><i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo htmlspecialchars($session->account->userid) ?></span></a>
						<?php endif; ?>
						<ul class="dropdown-menu" aria-labelledby="nav-profile">
						    <?php if ($session->isLoggedIn()): ?>
							<li><a href="<?php echo $this->url('account','view') ?>"><i class="fa fa-gear"></i>My account</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo $this->url('account','logout') ?>"><i class="fa fa-sign-out"></i>Logout</a></li>
							<?php else: ?>
							<li><a href="<?php echo $this->url('account','create') ?>"><i class="fa fa-book"></i>Register</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo $this->url('account','login') ?>"><i class="fa fa-sign-in"></i>Login</a></li>
							<?php endif; ?>
						</ul>
					</div>
				</div>
			</div>
		</header>
		<!-- /header -->
		
		<!-- Content -->
		<div id="wrapper">	
			<div id="full-carousel" class="carousel slide full-carousel carousel-fade" data-ride="carousel">
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<img src="<?php echo $this->themePath('img/slide/01.jpg')?>" class="full-width" alt="">
						<div class="carousel-caption">
							<h1 data-animation="animated animate1 fadeInDown">WELCOME TO <?=$RBS['Server-Name']?></h1>
							<p data-animation="animated animate7 fadeIn">Lorem ipsum dolor sit amet, consectetur adipiscing elit maecenas elementum, lacus.</p>
							<?php if (!$session->isLoggedIn()): ?>
							<a href="<?php echo $this->url('account','create') ?>" class="btn btn-primary btn-lg btn-rounded text-uppercase" data-animation="animated animate10 fadeIn">Register Now</a>
							<?php else: ?>
							<a href="<?php echo $this->url('account','view') ?>" class="btn btn-primary btn-lg btn-rounded text-uppercase" data-animation="animated animate10 fadeIn">My account</a>
							<?php endif; ?>
						</div>
					</div>
					
					<div class="item">
						<img src="<?php echo $this->themePath('img/slide/02.jpg')?>" class="full-width" alt="">
						<div class="carousel-caption">
							<h1 data-animation="animated animate1 bounceIn">Vote and earn points</h1>
							<p data-animation="animated animate7 fadeInUp">Lorem ipsum dolor sit amet, consectetur adipiscing elit maecenas elementum, lacus.</p>
							<a href="<?php echo $this->url('voteforpoints') ?>" class="btn btn-primary btn-lg btn-rounded text-uppercase" data-animation="animated animate10 fadeInDown">Vote Now</a>
						</div>
					</div>
					
					<div class="item">
						<img src="<?php echo $this->themePath('img/slide/03.jpg')?>" class="full-width" alt="">
						<div class="carousel-caption">
							<h1 data-animation="animated animate1 flipInX">Donate and Help the Server</h1>
							<p data-animation="animated animate7 fadeInLeft">Lorem ipsum dolor sit amet, consectetur adipiscing elit maecenas elementum, lacus.</p>
							<a href="<?php echo $this->url('donate') ?>" class="btn btn-primary btn-lg btn-rounded text-uppercase" data-animation="animated animate10 fadeInRight">Donate Now</a>
						</div>
					</div>
					
					<div class="item">
						<img src="<?php echo $this->themePath('img/slide/04.jpg')?>" class="full-width" alt="">
						<div class="carousel-caption">
							<h1 data-animation="animated animate1 fadeInDown">Join Our Community</h1>
							<p data-animation="animated animate7 fadeIn">Lorem ipsum dolor sit amet, consectetur adipiscing elit maecenas elementum, lacus.</p>
							<a href="<?=$RBS['forum']?>" class="btn btn-primary btn-lg btn-rounded text-uppercase" data-animation="animated animate10 fadeIn">Forum</a>
						</div>
					</div>
								
					<a class="left carousel-control" href="#full-carousel" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#full-carousel" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>

			<section class="bg-primary" style="padding: 0px !important">
				<div class="container text-center" style="font-size: 25px; font-family: 'FIGARO'">
					<?php include_once('main/status.php') ?>
				</div>
			</section>
			
			<?php if($_thisModule == 'main' AND $_thisAction == 'index'): ?>
			<?php else: ?>
			<section class="padding-top-60 padding-bottom-40 border-top-1 border-grey-200">	
            	<div class="container">
            		<div class="row">
            		    <div class="col-12 padding-10">
                		    <?php if (Flux::config('DebugMode') && @gethostbyname(Flux::config('ServerAddress')) == '127.0.0.1'): ?>
    							<p class="notice">Please change your <strong>ServerAddress</strong> directive in your application config to your server's real address (e.g., myserver.com).</p>
    						<?php endif ?>
    						
    						<!-- Messages -->
    						<?php if ($message=$session->getMessage()): ?>
    							<p class="message"><?php echo htmlspecialchars($message) ?></p>
    						<?php endif ?>
    						
    						<!-- Sub menu -->
    						<?php include $this->themePath('main/submenu.php', true) ?>
    						
    						<!-- Page menu -->
    						<?php include $this->themePath('main/pagemenu.php', true) ?>
					    </div>
					</div>
					<div class="row">
					    <div class="col-12 padding-10">
			<?php endif; ?>
		
		