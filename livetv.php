<?php global $themesbazar; ?>   

<div class="live_full">
<section class="container">
<div class="row">
						<div class="col-md-12 live">
						<div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
						<?php if($themesbazar['logo-show'] ==1 ): ?>
				<div class="home_logo"><a href="<?php bloginfo(home); ?>"><img src="<?php echo $themesbazar['logo_monitor']['url']?>"></a></div>
				<?php endif; ?>
				   
				   <?php if($themesbazar['logo-show'] == 2 ): ?>
				   <?php endif; ?>
						
						 <?php if($themesbazar['live'] ==1 ): ?>
                   <p>
				   
				   <?php 
				$live = new WP_Query(array(
					'post_type' => 'livetv',
					'posts_per_page' => 1,
					'offset'     =>0
				));
                        while($live->have_posts()) : $live->the_post(); ?>
   <?php the_content();?>

	<?php endwhile; ?>
				   
				   </p>
				   <?php endif; ?>
				   
				   <?php if($themesbazar['live'] == 2 ): ?>
                   <p>
	


<iframe src="https://www.youtube.com/embed/<?php echo $themesbazar['playlist']['first_code']; ?>?autoplay=1&amp;loop=1&amp;controls=0&amp;amp&amp;rel=0;&amp;showinfo=0;list=<?php echo $themesbazar['playlist']['secend_code']; ?>" width="640" height="360" frameborder="0" allowfullscreen="allowfullscreen"></iframe>

				   
				   </p>
				   <?php endif; ?>
				   
				   
				   
				   <?php if($themesbazar['live'] == 3 ): ?>
                   <p>
	


 <!-- Load Facebook SDK for JavaScript -->
  <div id="fb-root"></div>
  <script>
    window.fbAsyncInit = function() {
      FB.init({
        appId      : '{your-app-id}',
        xfbml      : true,
        version    : 'v2.5'
      });

      // Get Embedded Video Player API Instance
      var my_video_player;
      FB.Event.subscribe('xfbml.ready', function(msg) {
        if (msg.type === 'video') {
          my_video_player = msg.instance;
          my_video_player.unmute();
        }
      });
    };

    (function(d, s, id){
       var js, fjs = d.getElementsByTagName(s)[0];
       if (d.getElementById(id)) {return;}
       js = d.createElement(s); js.id = id;
       js.src = "//connect.facebook.net/en_US/sdk.js";
       fjs.parentNode.insertBefore(js, fjs);
     }(document, 'script', 'facebook-jssdk'));
  </script>

  <!-- Your embedded video player code -->
  <div  
    class="fb-video" 
    data-href="<?php echo $themesbazar['facebook_live']?>" 
    data-width="auto" 
    data-autoplay="true"
    data-allowfullscreen="false"
	data-controls="false"></div>


				   
				   </p>
				   <?php endif; ?>
				   
				    <?php if($themesbazar['live'] == 4 ): ?>
                   <p>
	

<video width="100%" height="auto" controls loop autoplay>
  <source src="<?php echo $themesbazar['own-pc']?>" type="video/mp4">
</video>

			   
				   </p>
				   <?php endif; ?>
						


</div>



					</div>
				</div>
				
				
				<!-- Section 02(scrolling...) #################################-->	
			

					<div class="row">
					<div class="col-md-12 scrool">
						<div class="col-md-2 scrool_01"><?php echo $themesbazar['scrool'] ?></div>
						<div class="col-md-10 scrool_02">
						<marquee behavior="" direction="">
<?php 
    $scrool = new WP_Query(array(
        'post_type' => 'post',
        'posts_per_page' => $themesbazar['howscrool'],
    ));
    while($scrool->have_posts()) : $scrool->the_post(); ?>
				<i class="fa fa-square" aria-hidden="true"></i>
<a href="<?php the_permalink()?>"><?php the_title();?></a>
				<?php endwhile;?>
				
				</marquee>
				</div>
						
						</div>
					</div> 
					
					
					
					
					<div class="row">
					<div class="col-md-12 scrool">
						<div class="col-md-2 scrool_01"><?php echo $themesbazar['scrool_two'] ?></div>
						<div class="col-md-7 scrool_02">
						<marquee behavior="" direction="">
<?php 
    $scrool = new WP_Query(array(
        'post_type' => 'notice',
        'posts_per_page' => $themesbazar['howscrool_two'],
    ));
    while($scrool->have_posts()) : $scrool->the_post(); ?>
				<i class="fa fa-square" aria-hidden="true"></i>
<a href="<?php the_permalink()?>"><?php the_title();?></a>
				<?php endwhile;?>
				
				</marquee>
				</div>
						<div class="col-md-3 scrool_01"> 
					<?php if($themesbazar['site-content'] ==1 ): ?>	
					
					<?php 
date_default_timezone_set('Asia/Dhaka');

//__________________________________________
echo bn1_date(date('d M Y, h:i a'));
//__________________________________________
?>

						<?php endif; ?>
				   <?php if($themesbazar['site-content'] == 2 ): ?>
				   
				   <?php 
date_default_timezone_set('Asia/Dhaka');
function en_date($str)
 {
    $en = array(1,2,3,4,5,6,7,8,9,0);
    $en = array( 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' );
    $en = array('Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday');
     $en = array( 'am', 'pm' );
     return $str;
 }
//Change below codes according to your requirement .
//__________________________________________
echo en_date(date('d M Y, h:i a'));
//__________________________________________
?>

				   <?php endif; ?>
						
						</div>
						</div>
					</div> 
					
					
					
					</section>
					</div>
					
					
					
					