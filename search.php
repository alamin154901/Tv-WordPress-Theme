<?php get_header();
global $themesbazar ?>
			

	<?php get_template_part('head'); ?>		
	<?php get_template_part('menu'); ?>	
		
		
	<section>
		<div class="container">
				
	<!-- Section 06 (top two div) #################################--> 	
	
		<!--gellary open--->	
		<div class="row">
			<div class="col-md-8">
				
 		  <?php
    global $query_string;
    $query_args = explode("&", $query_string);
    $search_query = array();

    foreach($query_args as $key => $string) {
      $query_split = explode("=", $string);
      $search_query[$query_split[0]] = urldecode($query_split[1]);
    } // foreach

    $the_query = new WP_Query($search_query);
    if ( $the_query->have_posts() ) : 
    ?>
    <!-- the loop -->

   
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                      <?php $word = $themesbazar['word-archive']; ?>
				<div class="archive_details">
				    <div class="archive_img"><?php the_post_thumbnail(); ?></div>
				    <h3 class="heading_02"><a href="<?php the_permalink(); ?>"><?php the_title();?> </a></h3>
                       <p><?php echo excerpt($word); ?> <span style="text-align:right"><a href="<?php the_permalink();?>"><?php echo $themesbazar['read-more-archive']?></a></span></p>  
				    
				</div>
    <?php endwhile; ?>

    <!-- end of the loop -->

    <?php wp_reset_postdata(); ?>

<?php else : ?>
    <p><?php _e( 'Sorry, no posts Found, Please Try Again.' ); ?></p>
<?php endif; ?>   
                
                
         
                 
               
                
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
		    <div class="col-md-12"><?php dynamic_sidebar('single_widget')?></div>
			
                
			</div>
		</div>			
	</div>
	</section>
			
	<?php get_footer();
			get_template_part('include/root');
			wp_footer();
			?>