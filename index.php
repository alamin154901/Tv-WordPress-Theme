<?php
show_category_list();
?>

<?php if($themesbazar['home_screen'] ==1 ): ?>
<?php get_template_part('livetv'); ?>
<?php endif; ?>
<?php if($themesbazar['home_screen'] == 2 ): ?>
<?php get_template_part('head'); ?>
<?php endif; ?>


<?php get_template_part('menu'); ?>

		
		
<!----------------------------------------------news_section start option******************--->
<section class="section_4">
	<div class="container">	
		
<!--***********--cat-one--************--->

		<div class="row">
			<div class="col-md-9">
			<?php if($themesbazar['one-cat-show'] ==1 ): ?>
				<div class="row">
					<div class="col-md-7">
					<?php
					$category_name = get_the_category_by_id($themesbazar['cat-one']);
					$themes_bazar = new WP_Query(array(
						'post_type' => 'post',
						'posts_per_page' => 1,
						'offset' => 0,
						'category_name' => $category_name,

					));
					while ($themes_bazar->have_posts()) : $themes_bazar->the_post(); ?>	
					<div class="card">
						<div class="big_news">
							<a href="<?php the_permalink()?>"><?php if(has_post_thumbnail()){ 
							the_post_thumbnail();}
							else{?>
							<div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
							<?php the_content();?>
							</div>
							<?php } ?>
							<h4 class="hadding_1"><?php the_title() ?></a></h4>
						</div>
					</div>	
					<?php endwhile?>	
					</div>
					<div class="col-md-5">
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
								<div class="images_title">
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
																	
							<div class="images_title">
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
					</div>
				</div>
				<?php endif; ?><?php if($themesbazar['one-cat-show'] == 2 ): ?><?php endif; ?>
				<div class="row">
					<div class="col-md-12">
						<div class="add">
							<?php dynamic_sidebar('widget_area_01')?>
						</div>
					</div>
				</div>
		<!--***********--cat-two--************--->
		
				<?php if($themesbazar['two-cat-show'] ==1 ): ?>	
				<div class="row">
					<div class="col-md-12">
					<?php
					$category_name = get_the_category_by_id($themesbazar['cat-two']);
					$category_name_link = get_category_link($themesbazar['cat-two']);?>
					<h4 class="catagory_title"><a href="<?php echo esc_url($category_name_link);?>"><span><i class="fa fa-newspaper-o"></i>   <?php echo $category_name;?></a></h4></span>
						<div class="row">
						<?php
						$themes_bazar = new WP_Query(array(
							'post_type' => 'post',
							'posts_per_page' => 3,
							'offset' => 0,
							'category_name' => $category_name,

						));
						while ($themes_bazar->have_posts()) : $themes_bazar->the_post(); ?>	
							<div class="col-md-4">
							<div class="card">
								<div class="middle_news">
									<a href="<?php the_permalink()?>"><?php if(has_post_thumbnail()){ 
									the_post_thumbnail();}
									else{?>
									<div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
									<?php the_content();?>
									</div>
									<?php } ?>
									<h4 class="hadding_2"><?php the_title() ?></a></h4>
								</div>
							</div>	
							</div>
						<?php endwhile?>	
						</div>
					</div>
				</div>
				<?php endif; ?><?php if($themesbazar['two-cat-show'] == 2 ): ?><?php endif; ?>
		<!--------------add option start******************--------------------------------->
				<div class="row">
					<div class="col-md-12">
						<div class="add">
							<?php dynamic_sidebar('widget_area_02')?>
						</div>
					</div>
				</div>
		<!--------------add option close******************------------------------------->
				
				
			<!--***********--cat-three--************--->	
				<?php if($themesbazar['three-cat-show'] ==1 ): ?>	
				<div class="row">
					<div class="col-md-12">
					
					<?php
					$category_name = get_the_category_by_id($themesbazar['cat-three']);
					$category_name_link = get_category_link($themesbazar['cat-three']);?>
					<h4 class="catagory_title"><a href="<?php echo esc_url($category_name_link);?>"><span><i class="fa fa-newspaper-o"></i>   <?php echo $category_name;?></a></h4></span>
						
						<div class="row">
							<div class="col-md-7">
							<?php
							$themes_bazar = new WP_Query(array(
								'post_type' => 'post',
								'posts_per_page' => 1,
								'offset' => 0,
								'category_name' => $category_name,

							));
							while ($themes_bazar->have_posts()) : $themes_bazar->the_post(); ?>
							<div class="card">
								<div class="big_news">
									<a href="<?php the_permalink()?>"><?php if(has_post_thumbnail()){ 
									the_post_thumbnail();}
									else{?>
									<div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
									<?php the_content();?>
									</div>
									<?php } ?>
									<h4 class="hadding_1"><?php the_title() ?></a></h4>
								</div>
							</div>	
							<?php endwhile?>	
							</div>
							<div class="col-md-5">
							<?php
							$category_name = get_the_category_by_id($themesbazar['cat-three']);
							$how_cat= $themesbazar['how-cat-three'];
							$total_how_cat=$how_cat-1;
							$themes_bazar = new WP_Query(array(
								'post_type' => 'post',
								'posts_per_page' => $total_how_cat,
								'offset' => 1,
								'category_name' => $category_name,

							));
							while ($themes_bazar->have_posts()) : $themes_bazar->the_post(); ?>
								<div class="images_title">
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
								<?php endwhile?>
								<h4 class="more_news"><a href="<?php echo esc_url($category_name_link);?>"> <?php echo $themesbazar['more_news']?> <i class="fa fa-angle-double-right" aria-hidden="true"></i>  </a></h4>
							</div>
						</div>
					</div>
				</div>
				
				<?php endif; ?><?php if($themesbazar['three-cat-show'] == 2 ): ?><?php endif; ?>
			<!--------------add option start******************--------------------------------->
			
				<div class="row">
					<div class="col-md-12">
						<div class="add">
							<?php dynamic_sidebar('widget_area_03')?>
						</div>
					</div>
				</div>
				
			<!--------------add option close******************------------------------------->
		
		
			
			<!--***********--cat-four--************--->
			
			<?php if($themesbazar['four-cat-show'] ==1 ): ?>
				<div class="row">
					<div class="col-md-12">
					<?php
					$category_name = get_the_category_by_id($themesbazar['cat-four']);
					$category_name_link = get_category_link($themesbazar['cat-four']);?>
					<h4 class="catagory_title"><a href="<?php echo esc_url($category_name_link);?>"><span><i class="fa fa-newspaper-o"></i>   <?php echo $category_name;?></a></h4></span>
						<div class="row">
						<?php
						$themes_bazar = new WP_Query(array(
							'post_type' => 'post',
							'posts_per_page' => 4,
							'offset' => 0,
							'category_name' => $category_name,

						));
						while ($themes_bazar->have_posts()) : $themes_bazar->the_post(); ?>
							<div class="col-md-3">
								<div class="card">
									<div class="middle_news">
										<a href="<?php the_permalink()?>"><?php if(has_post_thumbnail()){ 
										the_post_thumbnail();}
										else{?>
										
										<div class="embed-responsive embed-responsive-16by9 embed-responsive-item">										
										<?php the_content();?>
										</div>
										
										<?php } ?>
										<h4 class="hadding_2"><?php the_title() ?></a></h4>
									</div>
								</div>
							</div>
						<?php endwhile?>
						</div>
						<div class="row">
						<?php
						$themes_bazar = new WP_Query(array(
							'post_type' => 'post',
							'posts_per_page' => 4,
							'offset' => 4,
							'category_name' => $category_name,

						));
						while ($themes_bazar->have_posts()) : $themes_bazar->the_post(); ?>
							<div class="col-md-3">
							<div class="card">
								<div class="middle_news">
									<a href="<?php the_permalink()?>"><?php if(has_post_thumbnail()){ 
									the_post_thumbnail();}
									else{?>
									
									<div class="embed-responsive embed-responsive-16by9 embed-responsive-item">										
									<?php the_content();?>
									</div>
									
									<?php } ?>
									<h4 class="hadding_2"><?php the_title() ?></a></h4>
								</div>
							</div>	
							</div>
						<?php endwhile?>
						</div>
						
					</div>
				</div>
				<?php endif; ?><?php if($themesbazar['four-cat-show'] == 2 ): ?><?php endif; ?>
				
		<!--------------add option start******************--------------------------------------------->
		
				<div class="row">
					<div class="col-md-12">
						<div class="add">
							<?php dynamic_sidebar('widget_area_04')?>
						</div>
					</div>
				</div>
		<!--------------add option close******************--------------------------------------------->


			<!--***********--cat-five--************--->		
			<?php if($themesbazar['five-cat-show'] ==1 ): ?>
				
				<div class="row">
					<div class="col-md-12">
					
						<?php
					$category_name = get_the_category_by_id($themesbazar['cat-five']);
					$category_name_link = get_category_link($themesbazar['cat-five']);?>
					<h4 class="catagory_title"><a href="<?php echo esc_url($category_name_link);?>"><span><i class="fa fa-newspaper-o"></i>   <?php echo $category_name;?></a></h4></span>
						
						<div class="row">
						<?php
						$themes_bazar = new WP_Query(array(
							'post_type' => 'post',
							'posts_per_page' => 2,
							'offset' => 0,
							'category_name' => $category_name,

						));
						while ($themes_bazar->have_posts()) : $themes_bazar->the_post(); ?>	
							<div class="col-md-6">
								<div class="card">
									<div class="big_news">
										<a href="<?php the_permalink()?>"><?php if(has_post_thumbnail()){ 
										the_post_thumbnail();}
										else{?>
										
										<div class="embed-responsive embed-responsive-16by9 embed-responsive-item">										
										<?php the_content();?>
										</div>
										
										<?php } ?>
										<h4 class="hadding_1"><?php the_title() ?></a></h4>
									</div>
								</div>	
							</div>
							<?php endwhile?>
						</div>
						<div class="row">
						<?php
						$themes_bazar = new WP_Query(array(
							'post_type' => 'post',
							'posts_per_page' => 4,
							'offset' => 2,
							'category_name' => $category_name,

						));
						while ($themes_bazar->have_posts()) : $themes_bazar->the_post(); ?>
							<div class="col-md-3">
								<div class="card">
									<div class="middle_news">
										<a href="<?php the_permalink()?>"><?php if(has_post_thumbnail()){ 
										the_post_thumbnail();}
										else{?>
										
										<div class="embed-responsive embed-responsive-16by9 embed-responsive-item">										
										<?php the_content();?>
										</div>
										
										<?php } ?>
										<h4 class="hadding_2"><?php the_title() ?></a></h4> 
									</div>
								</div>
							</div>	
						<?php endwhile?>	
						</div>
					</div>
				</div>
				<?php endif; ?><?php if($themesbazar['five-cat-show'] == 2 ): ?><?php endif; ?>
		<!--------------add option start******************--------------------------------------------->
		
				<div class="row">
					<div class="col-md-12">
						<div class="add">
							<?php dynamic_sidebar('widget_area_05')?>
						</div>
					</div>
				</div>
		<!--------------add option close******************--------------------------------------------->
		
		
			<!--***********--cat-six--************--->		
			<?php if($themesbazar['six-seven-show'] ==1 ): ?>
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								<?php
								$category_name = get_the_category_by_id($themesbazar['cat-six']);
								$category_name_link = get_category_link($themesbazar['cat-six']);?>
								<h4 class="catagory_title"><a href="<?php echo esc_url($category_name_link);?>"><span><i class="fa fa-newspaper-o"></i>   <?php echo $category_name;?></a></h4></span>
								<?php
								$themes_bazar = new WP_Query(array(
									'post_type' => 'post',
									'posts_per_page' => 1,
									'offset' => 0,
									'category_name' => $category_name,

								));
								while ($themes_bazar->have_posts()) : $themes_bazar->the_post(); ?>
								<div class="card">
									<div class="big_news">
										<a href="<?php the_permalink()?>"><?php if(has_post_thumbnail()){ 
										the_post_thumbnail();}
										else{?>
										
										<div class="embed-responsive embed-responsive-16by9 embed-responsive-item">										
										<?php the_content();?>
										</div>
										
										<?php } ?>
										<h4 class="hadding_1"><?php the_title() ?></a></h4>
									</div>
								</div>
								<?php endwhile?>
								<?php
							$category_name = get_the_category_by_id($themesbazar['cat-six']);
							$how_cat= $themesbazar['how-cat-six'];
							$total_how_cat=$how_cat-1;
							$themes_bazar = new WP_Query(array(
								'post_type' => 'post',
								'posts_per_page' => $total_how_cat,
								'offset' => 1,
								'category_name' => $category_name,

							));
							while ($themes_bazar->have_posts()) : $themes_bazar->the_post(); ?>
								<div class="images_title">
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
								<?php endwhile?>
								<h4 class="more_news"><a href="<?php echo esc_url($category_name_link);?>"> <?php echo $themesbazar['more_news']?> <i class="fa fa-angle-double-right" aria-hidden="true"></i>  </a></h4>
							</div>
							
				<!--***********--cat-seven--************--->			
							
							<div class="col-md-6">
								<?php
								$category_name = get_the_category_by_id($themesbazar['cat-seven']);
								$category_name_link = get_category_link($themesbazar['cat-seven']);?>
								<h4 class="catagory_title"><a href="<?php echo esc_url($category_name_link);?>"><span><i class="fa fa-newspaper-o"></i>   <?php echo $category_name;?></a></h4></span>
								<?php
								$themes_bazar = new WP_Query(array(
									'post_type' => 'post',
									'posts_per_page' => 1,
									'offset' => 0,
									'category_name' => $category_name,

								));
								while ($themes_bazar->have_posts()) : $themes_bazar->the_post(); ?>
								<div class="card">
									<div class="big_news">
										<a href="<?php the_permalink()?>"><?php if(has_post_thumbnail()){ 
										the_post_thumbnail();}
										else{?>
										
										<div class="embed-responsive embed-responsive-16by9 embed-responsive-item">										
										<?php the_content();?>
										</div>
										
										<?php } ?>
										<h4 class="hadding_1"><?php the_title() ?></a></h4>
									</div>
								</div>
								<?php endwhile?>
								<?php
							$category_name = get_the_category_by_id($themesbazar['cat-seven']);
							$how_cat= $themesbazar['how-cat-seven'];
							$total_how_cat=$how_cat-1;
							$themes_bazar = new WP_Query(array(
								'post_type' => 'post',
								'posts_per_page' => $total_how_cat,
								'offset' => 1,
								'category_name' => $category_name,

							));
							while ($themes_bazar->have_posts()) : $themes_bazar->the_post(); ?>
								<div class="images_title">
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
								<?php endwhile?>
								<h4 class="more_news"><a href="<?php echo esc_url($category_name_link);?>"> <?php echo $themesbazar['more_news']?> <i class="fa fa-angle-double-right" aria-hidden="true"></i>  </a></h4>
							</div>
						</div>
					</div>
				</div>
				<?php endif; ?><?php if($themesbazar['six-seven-show'] == 2 ): ?><?php endif; ?>	
			<!--------------add option start******************--------------------------------------------->
				<div class="row">
					<div class="col-md-12">
						<div class="add">
							<?php dynamic_sidebar('widget_area_06')?>
						</div>
					</div>
				</div>
		<!--------------add option close******************--------------------------------------------->
		
		
		
		<!--***********--cat-eight--************--->
		
		<?php if($themesbazar['eight-cat-show'] ==1 ): ?>	
				<div class="row">
					<div class="col-md-12">
					<?php
					$category_name = get_the_category_by_id($themesbazar['cat-eight']);
					$category_name_link = get_category_link($themesbazar['cat-eight']);?>
					<h4 class="catagory_title"><a href="<?php echo esc_url($category_name_link);?>"><span><i class="fa fa-newspaper-o"></i>   <?php echo $category_name;?></a></h4></span>
						<div class="row">
						<?php
						$themes_bazar = new WP_Query(array(
							'post_type' => 'post',
							'posts_per_page' => 3,
							'offset' => 0,
							'category_name' => $category_name,

						));
						while ($themes_bazar->have_posts()) : $themes_bazar->the_post(); ?>	
							<div class="col-md-4">
							<div class="card">
								<div class="middle_news">
									<a href="<?php the_permalink()?>"><?php if(has_post_thumbnail()){ 
									the_post_thumbnail();}
									else{?>
									<div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
									<?php the_content();?>
									</div>
									<?php } ?>
									<h4 class="hadding_2"><?php the_title() ?></a></h4>
								</div>
							</div>	
							</div>
						<?php endwhile?>	
						</div>
					</div>
				</div>
				<?php endif; ?><?php if($themesbazar['eight-cat-show'] == 2 ): ?><?php endif; ?>
		<!--------------add option start******************--------------------------------------------->
		
				<div class="row">
					<div class="col-md-12">
						<div class="add">
							<?php dynamic_sidebar('widget_area_07')?>
						</div>
					</div>
				</div>
		<!--------------add option close******************--------------------------------------------->
		
		
			<!--***********--cat-nine--************--->		
			<?php if($themesbazar['nine-cat-show'] ==1 ): ?>
				
				<div class="row">
					<div class="col-md-12">
					
						<?php
					$category_name = get_the_category_by_id($themesbazar['cat-nine']);
					$category_name_link = get_category_link($themesbazar['cat-nine']);?>
					<h4 class="catagory_title"><a href="<?php echo esc_url($category_name_link);?>"><span><i class="fa fa-newspaper-o"></i>   <?php echo $category_name;?></a></h4></span>
						
						<div class="row">
						<?php
						$themes_bazar = new WP_Query(array(
							'post_type' => 'post',
							'posts_per_page' => 2,
							'offset' => 0,
							'category_name' => $category_name,

						));
						while ($themes_bazar->have_posts()) : $themes_bazar->the_post(); ?>	
							<div class="col-md-6">
								<div class="card">
									<div class="big_news">
										<a href="<?php the_permalink()?>"><?php if(has_post_thumbnail()){ 
										the_post_thumbnail();}
										else{?>
										
										<div class="embed-responsive embed-responsive-16by9 embed-responsive-item">										
										<?php the_content();?>
										</div>
										
										<?php } ?>
										<h4 class="hadding_1"><?php the_title() ?></a></h4>
									</div>
								</div>	
							</div>
							<?php endwhile?>
						</div>
						<div class="row">
						<?php
						$themes_bazar = new WP_Query(array(
							'post_type' => 'post',
							'posts_per_page' => 4,
							'offset' => 2,
							'category_name' => $category_name,

						));
						while ($themes_bazar->have_posts()) : $themes_bazar->the_post(); ?>
							<div class="col-md-3">
								<div class="card">
									<div class="middle_news">
										<a href="<?php the_permalink()?>"><?php if(has_post_thumbnail()){ 
										the_post_thumbnail();}
										else{?>
										
										<div class="embed-responsive embed-responsive-16by9 embed-responsive-item">										
										<?php the_content();?>
										</div>
										
										<?php } ?>
										<h4 class="hadding_2"><?php the_title() ?></a></h4> 
									</div>
								</div>
							</div>	
						<?php endwhile?>	
						</div>
					</div>
				</div>
				<?php endif; ?><?php if($themesbazar['nine-cat-show'] == 2 ): ?><?php endif; ?>
			</div>


			<div class="col-md-3">
			
			<!------------------------plugin start ----------------------------------------->
			
				<div class="row">
					<div class="col-md-12">
						<?php dynamic_sidebar('sidebar_area_top')?>
					</div>
				</div>
				
				<!------------------------plugin close ----------------------------------------->	
				
				
				<!--***********--cat-ten--************--->
				<?php if($themesbazar['ten-cat-show'] ==1 ): ?>
				<div class="row">				
					<div class="col-md-12">
						<?php
						$category_name = get_the_category_by_id($themesbazar['cat-ten']);
						$category_name_link = get_category_link($themesbazar['cat-ten']);?>
						<h4 class="catagory_title_1"><a href="<?php echo esc_url($category_name_link);?>"><span><i class="fa fa-newspaper-o"></i>   <?php echo $category_name;?></a></h4></span>
						<?php
						$themes_bazar = new WP_Query(array(
							'post_type' => 'post',
							'posts_per_page' => 1,
							'offset' => 0,
							'category_name' => $category_name,

						));
						while ($themes_bazar->have_posts()) : $themes_bazar->the_post(); ?>
						<div class="card">
							<div class="big_news">
								<a href="<?php the_permalink()?>"><?php if(has_post_thumbnail()){ 
								the_post_thumbnail();}
								else{?>
								
								<div class="embed-responsive embed-responsive-16by9 embed-responsive-item">										
								<?php the_content();?>
								</div>
								
								<?php } ?>
								<h4 class="hadding_1"><?php the_title() ?></a></h4>
							</div>
						</div>
						<?php endwhile?>
						<?php
					$category_name = get_the_category_by_id($themesbazar['cat-ten']);
					$how_cat= $themesbazar['how-cat-ten'];
					$total_how_cat=$how_cat-1;
					$themes_bazar = new WP_Query(array(
						'post_type' => 'post',
						'posts_per_page' => $total_how_cat,
						'offset' => 1,
						'category_name' => $category_name,

					));
					while ($themes_bazar->have_posts()) : $themes_bazar->the_post(); ?>
						<div class="images_title">
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
						<?php endwhile?>
						<h4 class="more_news"><a href="<?php echo esc_url($category_name_link);?>"> <?php echo $themesbazar['more_news']?> <i class="fa fa-angle-double-right" aria-hidden="true"></i>  </a></h4>
					</div>
				</div>
				<?php endif; ?><?php if($themesbazar['ten-cat-show'] == 2 ): ?><?php endif; ?>
				<!------------------------plugin start ----------------------------------------->
				
				<div class="row">
					<div class="col-md-12">
						<!-- Facebook Start -->

						<?php if($themesbazar['facebook'] ==1 ): ?>
						<div class="catagory_title_1"><a href="#"><?php echo $themesbazar['facebook-title']?></a></div>
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
				
				<!------------------------plugin close ----------------------------------------->
				
				
				
					
				<!--***********--cat-eleven--************--->
				<?php if($themesbazar['eleven-cat-show'] ==1 ): ?>
				<div class="row">				
					<div class="col-md-12">
						<?php
						$category_name = get_the_category_by_id($themesbazar['cat-eleven']);
						$category_name_link = get_category_link($themesbazar['cat-eleven']);?>
						<h4 class="catagory_title_1"><a href="<?php echo esc_url($category_name_link);?>"><span><i class="fa fa-newspaper-o"></i>   <?php echo $category_name;?></a></h4></span>
						<?php
						$themes_bazar = new WP_Query(array(
							'post_type' => 'post',
							'posts_per_page' => 1,
							'offset' => 0,
							'category_name' => $category_name,

						));
						while ($themes_bazar->have_posts()) : $themes_bazar->the_post(); ?>
						<div class="card">
							<div class="big_news">
								<a href="<?php the_permalink()?>"><?php if(has_post_thumbnail()){ 
								the_post_thumbnail();}
								else{?>
								
								<div class="embed-responsive embed-responsive-16by9 embed-responsive-item">										
								<?php the_content();?>
								</div>
								
								<?php } ?>
								<h4 class="hadding_1"><?php the_title() ?></a></h4>
							</div>
						</div>
						<?php endwhile?>
						<?php
					$category_name = get_the_category_by_id($themesbazar['cat-eleven']);
					$how_cat= $themesbazar['how-cat-eleven'];
					$total_how_cat=$how_cat-1;
					$themes_bazar = new WP_Query(array(
						'post_type' => 'post',
						'posts_per_page' => $total_how_cat,
						'offset' => 1,
						'category_name' => $category_name,

					));
					while ($themes_bazar->have_posts()) : $themes_bazar->the_post(); ?>
						<div class="images_title">
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
						<?php endwhile?>
						<h4 class="more_news"><a href="<?php echo esc_url($category_name_link);?>"> <?php echo $themesbazar['more_news']?> <i class="fa fa-angle-double-right" aria-hidden="true"></i>  </a></h4>
					</div>
				</div>
				<?php endif; ?><?php if($themesbazar['eleven-cat-show'] == 2 ): ?><?php endif; ?>	
					
				<!--***********--cat-twelve--************--->
				<?php if($themesbazar['twelve-cat-show'] ==1 ): ?>
				<div class="row">				
					<div class="col-md-12">
						<?php
						$category_name = get_the_category_by_id($themesbazar['cat-twelve']);
						$category_name_link = get_category_link($themesbazar['cat-twelve']);?>
						<h4 class="catagory_title_1"><a href="<?php echo esc_url($category_name_link);?>"><span><i class="fa fa-newspaper-o"></i>   <?php echo $category_name;?></a></h4></span>
						<?php
						$themes_bazar = new WP_Query(array(
							'post_type' => 'post',
							'posts_per_page' => 1,
							'offset' => 0,
							'category_name' => $category_name,

						));
						while ($themes_bazar->have_posts()) : $themes_bazar->the_post(); ?>
						<div class="card">
							<div class="big_news">
								<a href="<?php the_permalink()?>"><?php if(has_post_thumbnail()){ 
								the_post_thumbnail();}
								else{?>
								
								<div class="embed-responsive embed-responsive-16by9 embed-responsive-item">										
								<?php the_content();?>
								</div>
								
								<?php } ?>
								<h4 class="hadding_1"><?php the_title() ?></a></h4>
							</div>
						</div>
						<?php endwhile?>
						<?php
					$category_name = get_the_category_by_id($themesbazar['cat-twelve']);
					$how_cat= $themesbazar['how-cat-twelve'];
					$total_how_cat=$how_cat-1;
					$themes_bazar = new WP_Query(array(
						'post_type' => 'post',
						'posts_per_page' => $total_how_cat,
						'offset' => 1,
						'category_name' => $category_name,

					));
					while ($themes_bazar->have_posts()) : $themes_bazar->the_post(); ?>
						<div class="images_title">
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
						<?php endwhile?>
						<h4 class="more_news"><a href="<?php echo esc_url($category_name_link);?>"> <?php echo $themesbazar['more_news']?> <i class="fa fa-angle-double-right" aria-hidden="true"></i>  </a></h4>
					</div>
				</div>
				<?php endif; ?><?php if($themesbazar['twelve-cat-show'] == 2 ): ?><?php endif; ?>	
					
					
				<!--***********--cat-thirteen--************--->
				<?php if($themesbazar['thirteen-cat-show'] ==1 ): ?>
				<div class="row">				
					<div class="col-md-12">
						<?php
						$category_name = get_the_category_by_id($themesbazar['cat-thirteen']);
						$category_name_link = get_category_link($themesbazar['cat-thirteen']);?>
						<h4 class="catagory_title_1"><a href="<?php echo esc_url($category_name_link);?>"><span><i class="fa fa-newspaper-o"></i>   <?php echo $category_name;?></a></h4></span>
						<?php
						$themes_bazar = new WP_Query(array(
							'post_type' => 'post',
							'posts_per_page' => 1,
							'offset' => 0,
							'category_name' => $category_name,

						));
						while ($themes_bazar->have_posts()) : $themes_bazar->the_post(); ?>
						<div class="card">
							<div class="big_news">
								<a href="<?php the_permalink()?>"><?php if(has_post_thumbnail()){ 
								the_post_thumbnail();}
								else{?>
								
								<div class="embed-responsive embed-responsive-16by9 embed-responsive-item">										
								<?php the_content();?>
								</div>
								
								<?php } ?>
								<h4 class="hadding_1"><?php the_title() ?></a></h4>
							</div>
						</div>
						<?php endwhile?>
						<?php
					$category_name = get_the_category_by_id($themesbazar['cat-thirteen']);
					$how_cat= $themesbazar['how-cat-thirteen'];
					$total_how_cat=$how_cat-1;
					$themes_bazar = new WP_Query(array(
						'post_type' => 'post',
						'posts_per_page' => $total_how_cat,
						'offset' => 1,
						'category_name' => $category_name,

					));
					while ($themes_bazar->have_posts()) : $themes_bazar->the_post(); ?>
						<div class="images_title">
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
						<?php endwhile?>
						<h4 class="more_news"><a href="<?php echo esc_url($category_name_link);?>"> <?php echo $themesbazar['more_news']?> <i class="fa fa-angle-double-right" aria-hidden="true"></i>  </a></h4>
					</div>
				</div>
				<?php endif; ?><?php if($themesbazar['thirteen-cat-show'] == 2 ): ?><?php endif; ?>		
					
					
				<!------------------------plugin start ----------------------------------------->
				
				<div class="row">
					<div class="col-md-12">
						<?php dynamic_sidebar('sidebar_area_middle')?>
					</div>
				</div>
			
			<!------------------------plugin close ----------------------------------------->	
			
			
			<!--***********--cat-fourteen--************--->
				<?php if($themesbazar['fourteen-cat-show'] ==1 ): ?>
				<div class="row">				
					<div class="col-md-12">
						<?php
						$category_name = get_the_category_by_id($themesbazar['cat-fourteen']);
						$category_name_link = get_category_link($themesbazar['cat-fourteen']);?>
						<h4 class="catagory_title_1"><a href="<?php echo esc_url($category_name_link);?>"><span><i class="fa fa-newspaper-o"></i>   <?php echo $category_name;?></a></h4></span>
						<?php
						$themes_bazar = new WP_Query(array(
							'post_type' => 'post',
							'posts_per_page' => 1,
							'offset' => 0,
							'category_name' => $category_name,

						));
						while ($themes_bazar->have_posts()) : $themes_bazar->the_post(); ?>
						<div class="card">
							<div class="big_news">
								<a href="<?php the_permalink()?>"><?php if(has_post_thumbnail()){ 
								the_post_thumbnail();}
								else{?>
								
								<div class="embed-responsive embed-responsive-16by9 embed-responsive-item">										
								<?php the_content();?>
								</div>
								
								<?php } ?>
								<h4 class="hadding_1"><?php the_title() ?></a></h4>
							</div>
						</div>
						<?php endwhile?>
						<?php
					$category_name = get_the_category_by_id($themesbazar['cat-fourteen']);
					$how_cat= $themesbazar['how-cat-fourteen'];
					$total_how_cat=$how_cat-1;
					$themes_bazar = new WP_Query(array(
						'post_type' => 'post',
						'posts_per_page' => $total_how_cat,
						'offset' => 1,
						'category_name' => $category_name,

					));
					while ($themes_bazar->have_posts()) : $themes_bazar->the_post(); ?>
						<div class="images_title">
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
						<?php endwhile?>
						<h4 class="more_news"><a href="<?php echo esc_url($category_name_link);?>"> <?php echo $themesbazar['more_news']?> <i class="fa fa-angle-double-right" aria-hidden="true"></i>  </a></h4>
					</div>
				</div>
				<?php endif; ?><?php if($themesbazar['fourteen-cat-show'] == 2 ): ?><?php endif; ?>
				
				
				
				<!--***********--cat-fifteen--************--->
				<?php if($themesbazar['fifteen-cat-show'] ==1 ): ?>
				<div class="row">				
					<div class="col-md-12">
						<?php
						$category_name = get_the_category_by_id($themesbazar['cat-fifteen']);
						$category_name_link = get_category_link($themesbazar['cat-fifteen']);?>
						<h4 class="catagory_title_1"><a href="<?php echo esc_url($category_name_link);?>"><span><i class="fa fa-newspaper-o"></i>   <?php echo $category_name;?></a></h4></span>
						<?php
						$themes_bazar = new WP_Query(array(
							'post_type' => 'post',
							'posts_per_page' => 1,
							'offset' => 0,
							'category_name' => $category_name,

						));
						while ($themes_bazar->have_posts()) : $themes_bazar->the_post(); ?>
						<div class="card">
							<div class="big_news">
								<a href="<?php the_permalink()?>"><?php if(has_post_thumbnail()){ 
								the_post_thumbnail();}
								else{?>
								
								<div class="embed-responsive embed-responsive-16by9 embed-responsive-item">										
								<?php the_content();?>
								</div>
								
								<?php } ?>
								<h4 class="hadding_1"><?php the_title() ?></a></h4>
							</div>
						</div>
						<?php endwhile?>
						<?php
					$category_name = get_the_category_by_id($themesbazar['cat-fifteen']);
					$how_cat= $themesbazar['how-cat-fifteen'];
					$total_how_cat=$how_cat-1;
					$themes_bazar = new WP_Query(array(
						'post_type' => 'post',
						'posts_per_page' => $total_how_cat,
						'offset' => 1,
						'category_name' => $category_name,

					));
					while ($themes_bazar->have_posts()) : $themes_bazar->the_post(); ?>
						<div class="images_title">
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
						<?php endwhile?>
						<h4 class="more_news"><a href="<?php echo esc_url($category_name_link);?>"> <?php echo $themesbazar['more_news']?> <i class="fa fa-angle-double-right" aria-hidden="true"></i>  </a></h4>
					</div>
				</div>
				<?php endif; ?><?php if($themesbazar['fifteen-cat-show'] == 2 ): ?><?php endif; ?><!--***********--cat-sixteen--************--->
				<?php if($themesbazar['sixteen-cat-show'] ==1 ): ?>
				<div class="row">				
					<div class="col-md-12">
						<?php
						$category_name = get_the_category_by_id($themesbazar['cat-sixteen']);
						$category_name_link = get_category_link($themesbazar['cat-sixteen']);?>
						<h4 class="catagory_title_1"><a href="<?php echo esc_url($category_name_link);?>"><span><i class="fa fa-newspaper-o"></i>   <?php echo $category_name;?></a></h4></span>
						<?php
						$themes_bazar = new WP_Query(array(
							'post_type' => 'post',
							'posts_per_page' => 1,
							'offset' => 0,
							'category_name' => $category_name,

						));
						while ($themes_bazar->have_posts()) : $themes_bazar->the_post(); ?>
						<div class="card">
							<div class="big_news">
								<a href="<?php the_permalink()?>"><?php if(has_post_thumbnail()){ 
								the_post_thumbnail();}
								else{?>
								
								<div class="embed-responsive embed-responsive-16by9 embed-responsive-item">										
								<?php the_content();?>
								</div>
								
								<?php } ?>
								<h4 class="hadding_1"><?php the_title() ?></a></h4>
							</div>
						</div>
						<?php endwhile?>
						<?php
					$category_name = get_the_category_by_id($themesbazar['cat-sixteen']);
					$how_cat= $themesbazar['how-cat-sixteen'];
					$total_how_cat=$how_cat-1;
					$themes_bazar = new WP_Query(array(
						'post_type' => 'post',
						'posts_per_page' => $total_how_cat,
						'offset' => 1,
						'category_name' => $category_name,

					));
					while ($themes_bazar->have_posts()) : $themes_bazar->the_post(); ?>
						<div class="images_title">
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
						<?php endwhile?>
						<h4 class="more_news"><a href="<?php echo esc_url($category_name_link);?>"> <?php echo $themesbazar['more_news']?> <i class="fa fa-angle-double-right" aria-hidden="true"></i>  </a></h4>
					</div>
				</div>
				<?php endif; ?><?php if($themesbazar['sixteen-cat-show'] == 2 ): ?><?php endif; ?>
				<div class="row">
					<div class="col-md-12">
						<?php dynamic_sidebar('sidebar_area_bottom')?>
					</div>
				</div>
				
			</div>
			
		</div>
	</div>	
</section>
		<!----------------------------------------------news_section close ******************--->
		

<?php get_footer(); get_template_part('include/root'); ?>
		

		
<!-------------------------------------Goto Top Start----------------------------->					
<a href="#0" class="cd-top">Top</a>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/main.js"></script> <!-- Gem jQuery -->
<script src="<?php echo get_template_directory_uri() ?>/js/modernizr.js"></script> 
<!-------------------------------------Goto Top Close----------------------------->	
							
	</body>
</html>