<!------------------------------------------------------menu option stsrt******************--->
		<section class="section_2">
			<div class="container">	
				<div class="col-md-12">
					<div class="row" id="nav">
						<nav class="navbar navbar-default" role="navigation">
								<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			
	           <?php /* Primary navigation */
		        wp_nav_menu( array(
		           'theme_location' => 'main-menu',
				   'menu_class'    => 'nav navbar-nav',
				   'fallback_cb' => 'default_main_menu',
		           'walker' => new wp_bootstrap_navwalker())
		              );
	               	?>		
			
			</div>
						</nav>
					</div>
				</div>	
			</div>	
		</section>