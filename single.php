<?php get_header();
 global $themesbazar; ?>
		


	<?php get_template_part('head'); ?>		
	<?php get_template_part('menu'); ?>		

	
	
<section class="container">
		
		<!-- Single Page element Start-->
		<div class="single_page">
		    <div class="add"><?php dynamic_sidebar('single_top')?></div>
		    <div class="row">
		        <div class="col-md-8">
		            
		            <?php if(have_posts()) : ?>
					<?php while(have_posts()) : the_post(); ?>
		            
	<!-- Top Info Start-->				
					<div class="single_info">
					    <div class="single_home"><a href="<?php bloginfo(url);?>"><i class="fa fa-home" aria-hidden="true"></i>  <?php echo $themesbazar['home'];?>
							</a></div>
					    <div class="single_cate"><i class="fa fa-bars" aria-hidden="true"></i> <?php the_category(', '); ?></div>
					    <div class="single_titl"><i class="fa fa-refresh" aria-hidden="true"></i> <?php the_title();?></div>
					</div>
	<!-- ==========================-->		
					
		            
					
					<h3 class="heading-01"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>

	<!-- Bottom Info Start-->
					<ol class="breadcrumb">
						<li><?php echo $themesbazar['update'];?> 
<?php if($themesbazar['site-content'] ==1 ): ?>
<?php 
$currentDate = get_the_time("l, j F, Y");
$engDATE = array(1,2,3,4,5,6,7,8,9,0,January,February,March,April,May,June,July,August,September,October,November,December,Saturday,Sunday,Monday,Tuesday,Wednesday,Thursday,Friday);
$bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
বুধবার','বৃহস্পতিবার','শুক্রবার' 
);
$convertedDATE = str_replace($engDATE, $bangDATE, $currentDate);
echo "$convertedDATE";
?>
<?php endif; ?>
        <?php if($themesbazar['site-content'] == 2 ): ?>
<?php echo get_the_time("l, F j, Y"); ?>
							<?php endif; ?>
</li>
			<!-- *(view-tab show or hide open)*-->	
			<?php if($themesbazar['view-tab'] ==1 ): ?>	
					<!-- *(view-tab show or hide open)*-->
						<li class="active">
						    <?php if($themesbazar['site-content'] ==1 ): ?>
						    <?php setPostViews(get_the_ID()); ?>
						<?php $view= getPostViews(get_the_ID()); 
						echo bn_number($view);
						?>
					<?php endif; ?>
				   
							<?php if($themesbazar['site-content'] == 2 ): ?>
							<?php setPostViews(get_the_ID()); ?> <?php echo getPostViews(get_the_ID()); ?>
								<?php endif; ?>
						<?php echo $themesbazar['count'];?></li>
					<!-- *(view-tab show or hide close)*-->	
					
					
					<?php endif; ?> 
			 <?php if($themesbazar['view-tab'] == 2 ): ?>
				   <?php endif; ?>
				<!-- *(view-tab show or hide close)*-->						
					</ol>
					<!-- ==========================-->
					
					<div class="single_images">	
					 <!-- Post Image Code Start--> 
								<?php if(has_post_thumbnail()){ 
										the_post_thumbnail();}
									else{?>
								
								<?php } ?>
								<!-- Post Image Code Close-->
                           <?php 
                           $caption = get_post(get_post_thumbnail_id())->post_excerpt;
                            if ($caption): ?>
                             <div class="caption"><?php echo $caption ?> </div>
                           <?php endif; ?> 
                       </div>
                       
					  <div class="clear"> <?php dynamic_sidebar('single_middle')?></div>
					   
					   
					   <div class="single-ditails"> <p><?php the_content();?></p></div>

<!-- Social Media Start-->	
<?php if($themesbazar['social_share'] ==1 ): ?>
<h5 style="font-size:18px; padding-left:10px"><?php echo $themesbazar['social_title'] ?></h5>

<a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" class="simple-share ss-facebook" title="Share on Facebook" rel="nofollow"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>

<a target="_blank" href="https://twitter.com/share?text=<?php echo urlencode( get_the_title() ); ?>" class="simple-share ss-twitter" title="Tweet" rel="nofollow"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>

  <a target="_blank" href="https://plus.google.com/share?url=<?php echo urlencode(get_permalink()); ?>" class="simple-share ss-gplus" title="Share on G+" rel="nofollow"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>
  
  <a href="http://www.linkedin.com/shareArticle?mini=true&amp;title=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>" title="Share on LinkedIn" class="simple-share ss-facebook"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
  
  <a href="http://www.reddit.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" title="Vote on Reddit" class="simple-share ss-facebook"><i class="fa fa-reddit-square" aria-hidden="true"></i></a>
  
  
  <a href="http://digg.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" title="Digg this!" class="simple-share ss-facebook"><i class="fa fa-digg" aria-hidden="true"></i></a>

<a href="http://www.pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink()); ?>&media=<?php if(has_post_thumbnail()) echo wp_get_attachment_url(get_post_thumbnail_id()); ?>&description=<?php echo urlencode( get_the_title() . ' - ' . get_permalink() ); ?>" class="simple-share ss-pinterest" target="_blank" rel="nofollow"><i class="fa fa-pinterest-square" aria-hidden="true"></i></a>


<?php endif; ?> 
			 <?php if($themesbazar['social_share'] == 2 ): ?>
				   <?php endif; ?>					
	<!-- ==========================-->						   
				
				<?php endwhile;?>
                <?php endif;?>
                
					<div class="clear"></div>   
					    <div class="add"><?php dynamic_sidebar('single_buttom')?>  </div>
					   	<div class="clear"></div> 
					   	</br>



<!-- Releted Post Start-->	
<div class="facebook_title"><a href=""><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $themesbazar['more-news-category']?></b></a></div>	
					   	
		<div class="row">		   
					   	<?php $orig_post = $post;
    global $post;
    $categories = get_the_category($post->ID);
    if ($categories) {
    $category_ids = array();
    foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

    $args=array(
    'category__in' => $category_ids,
    'post__not_in' => array($post->ID),
    'posts_per_page'=> 3, // Number of related posts that will be shown.
    'caller_get_posts'=>1
    );

    $my_query = new wp_query( $args );
    if( $my_query->have_posts() ) {

    while( $my_query->have_posts() ) {
    $my_query->the_post(); ?>
    

        <div class="col-md-4">
            <a href="<?php the_permalink()?>"><?php if(has_post_thumbnail()){ 
					the_post_thumbnail();}
					else{?>
					<div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
					<?php the_content();?>
					</div>
					<?php } ?>
			<h4 class="hadding_2"><a href="<?php the_permalink()?>"><?php the_title() ?>	</a> </h4>	
								
        </div>

    
    <?php
    }    }    } 
    $post = $orig_post;
    wp_reset_query(); ?>
    	
    </div>	
    
    <div class="row">		   
					   	<?php $orig_post = $post;
    global $post;
    $categories = get_the_category($post->ID);
    if ($categories) {
    $category_ids = array();
    foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

    $args=array(
    'category__in' => $category_ids,
    'post__not_in' => array($post->ID),
    'posts_per_page'=> 3, // Number of related posts that will be shown.
    'offset'=> 3,
    'caller_get_posts'=>1
    );

    $my_query = new wp_query( $args );
    if( $my_query->have_posts() ) {

    while( $my_query->have_posts() ) {
    $my_query->the_post(); ?>
    

       <div class="col-md-4">
            <a href="<?php the_permalink()?>"><?php if(has_post_thumbnail()){ 
					the_post_thumbnail();}
					else{?>
					<div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
					<?php the_content();?>
					</div>
					<?php } ?>
			<h4 class="hadding_2"><a href="<?php the_permalink()?>"><?php the_title() ?>	</a> </h4>	
								
        </div>

    
    <?php
    }    }    } 
    $post = $orig_post;
    wp_reset_query(); ?>
    </div>
	<!-- ==========================-->				   	
					   	
					   <!-- *(view-tab show or hide open)*-->	
			<?php if($themesbazar['coment'] ==1 ): ?>	
					   <?php comments_template(); ?>
					<?php endif; ?> 
			 <?php if($themesbazar['coment'] == 2 ): ?>
				   <?php endif; ?>
				<!-- *(view-tab show or hide close)*-->

				
		
				
				
				
       
		        </div> 
		        <div class="col-md-4">

	<div class="add"><?php dynamic_sidebar('single_sidebar_top')?></div>
	
	
     
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
		            	
		            <!-- Facebook Start -->
					<?php if($themesbazar['facebook'] ==1 ): ?>
					<div class="facebook_title"><a href="#"><?php echo $themesbazar['facebook-title']?></a></div>
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
				   	<!-- ==========================-->
				   
				   	
				   	<div class="add"><?php dynamic_sidebar('single_sidebar_bottom')?></div>
				   	
	
		            
		        </div>
		    </div>
		</div>
		<!-- Single Page element Close-->
		
		
		</section>
	
	<?php get_footer();
			get_template_part('include/root');
			wp_footer();
			?>
		