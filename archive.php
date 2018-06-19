<?php get_header() ?>
        <?php global $themesbazar ?>
		<?php get_template_part('head'); ?>		
	<?php get_template_part('menu'); ?>		
	<!-- Section 06 (top two div) #################################--> 	
	
		<!--gellary open--->	
	
	<section>
		<div class="container">
		
		
			
		<div class="row">
			<div class="col-md-8">
				<?php if(have_posts()) : ?>
                     <?php
                     while(have_posts()) : the_post();?>
                      <?php $word = $themesbazar['word-archive']; ?>
				<div class="archive_details">
				   <a href="<?php the_permalink()?>"><?php if(has_post_thumbnail()){ 
				the_post_thumbnail();}
				else{?>
				<div class="archive-video">
				<div class="embed-responsive embed-responsive-16by9 embed-responsive-item">										
				<?php the_content();?>
				</div>
				</div>
				<?php } ?>
				    <h3 class="heading_02"><a href="<?php the_permalink(); ?>"><?php the_title();?> </a></h3>
                       <p><?php echo excerpt($word); ?> <span style="text-align:right"><a href="<?php the_permalink();?>"><?php echo $themesbazar['read-more-archive']?></a></span></p> 
				</div>
                <?php endwhile; ?>
                    <?php endif; ?>      
      
                <div class="row"><div class="col-md-12"><?php wp_bootstrap_pagination(); ?></div></div>
 
			</div>	
		

			<div class="col-md-4">
				<div class="tab-header">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs nav-justified" role="tablist">
					<li role="presentation" class="active"><a href="#tab21" aria-controls="tab21" role="tab" data-toggle="tab" aria-expanded="false"><?php echo $themesbazar['last'] ?></a></li>
					<li role="presentation" ><a href="#tab22" aria-controls="tab22" role="tab" data-toggle="tab" aria-expanded="true"><?php echo $themesbazar['popular'] ?></a></li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane in active" id="tab21">	
						<div class="news-title">
							<?php
																 
							$lastnews = new WP_Query(array(
								'post_type' => 'post',
								'posts_per_page' => $themesbazar['lastpost'],
								'offset' =>0,
								));
								while($lastnews->have_posts()) : $lastnews->the_post();?>								
								<div class="images_title border">
									<a href="<?php the_permalink()?>"><?php if(has_post_thumbnail()){ 
									the_post_thumbnail();}
									else{?>
									<div class="small-video">
									<div class="embed-responsive embed-responsive-16by9 embed-responsive-item">										
									<?php the_content();?>
									</div>
									</div>
									<?php } ?>
									<h4 class="hadding_3"><?php the_title() ?></a></h4> 
								</div>
							<?php endwhile ?>		
						</div>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="tab22">	
						<div class="news-title">
							<?php
										
							query_posts('meta_key=post_views_count&orderby=meta_value_num&order=DESC');
							if (have_posts()) : while (have_posts()) : the_post();
							?>	
																	
							<div class="images_title border">
									<a href="<?php the_permalink()?>"><?php if(has_post_thumbnail()){ 
									the_post_thumbnail();}
									else{?>
									<div class="small-video">
									<div class="embed-responsive embed-responsive-16by9 embed-responsive-item">										
									<?php the_content();?>
									</div>
									</div>
									<?php } ?>
									<h4 class="hadding_3"><?php the_title() ?></a></h4> 
								</div>	
							<?php
							endwhile; endif;
							wp_reset_query();
							?>										
							</div>											
						</div>
					</div>
				</div>
															
									
			
			<!--********add here*******-->
		    <div class="row"><?php dynamic_sidebar('single_right-sidebar-widget')?></div>
			
             <div class="row">
				<!-- Facebook Start -->
				<div class="col-md-12">
					<?php if($themesbazar['facebook'] ==1 ): ?>
					<div class="catagory_title"><a href="#"><?php echo $themesbazar['facebook-title']?></a></div>
					<div class="fb-root">
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
				<div class="fb-page" data-href="<?php echo $themesbazar['facebook-link']['face-url']; ?>" data-tabs="timeline" data-width="<?php echo $themesbazar['facebook-width']?>" data-height="<?php echo $themesbazar['facebook-height']?>" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>
								   <?php endif; ?>
				   
				   <?php if($themesbazar['facebook'] == 2 ): ?>
				   <?php endif; ?>
				   </div>
				   	<!-- Facebook Close -->
				</div>	
			 </div>   
			</div>
			</div>
				
	
		
</div>
	</section>	
	
			
	<?php get_footer();
			get_template_part('include/root');
			wp_footer();
			?>
			