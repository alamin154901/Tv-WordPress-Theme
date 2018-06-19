<?php global $themesbazar; ?>   
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
             <title><?php wp_title('');  ?></title>  
             
             
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-thumbnail' ); ?>
<meta property="og:title" content="<?php the_title(); ?>" /> 
<meta property="og:description" content="" />  
<meta property="og:image" content="<?php echo $image[0]; ?>" /> 
<meta property="og:video" content="" /> 
<meta property="og:video:width" content="560" />  
<meta property="og:video:height" content="340" />  
<meta property="og:video:type" content="application/x-shockwave-flash" />

        
        <?php wp_head();?>		
		
		
		
<style>

body{
   background-color: <?php echo $themesbazar['body-color']?>;
   font-size: <?php echo $themesbazar['body-font']['font-size']?>;
}
.section_4{
	background-color: <?php echo $themesbazar['body-color']?>;
	padding-top:10px;
}
.catagory_title{
    padding: 8px;
	overflow:hidden;
	width:100%;
	background-color: <?php echo $themesbazar['category-background']?>;
	margin-top:20px !important;
	margin-bottom:10px !important;
	
}
.catagory_title span{
    background-color:  #831C14;
    padding: 10px;
	margin-left:-10px !important;
	overflow:hidden;
	width:100%;
}
.catagory_title a{
	color:<?php echo $themesbazar['category-font']['color']?>;
	font-size:<?php echo $themesbazar['category-font']['font-size']?>;
	text-align:<?php echo $themesbazar['category-font']['text-align']?>
}

.hadding_1 {
	font-size: <?php echo $themesbazar['heading-one']['font-size']?>;
    line-height: <?php echo $themesbazar['heading-one']['line-height']?>;
	text-align:<?php echo $themesbazar['heading-one']['text-align']?>;
	padding:15px 0px 0px 5px;
	font-weight:400;
}
.hadding_1 a{
	color: <?php echo $themesbazar['heading-one']['color']?>;
	text-decoration:none;	
}
.hadding_1 a:hover{
	color:#185276;		
}

.hadding_2 {
	font-weight:400;
	font-size: <?php echo $themesbazar['heading-two']['font-size']?>;
    line-height: <?php echo $themesbazar['heading-two']['line-height']?>;
	text-align:<?php echo $themesbazar['heading-two']['text-align']?>;
	padding:10px;
}
.hadding_2 a{
	color: <?php echo $themesbazar['heading-two']['color']?>;
	text-decoration:none;
		
}
.hadding_2 a:hover{
	color:#FA5123;		
}

.hadding_3 {
	font-weight:400;
	font-size: <?php echo $themesbazar['heading-three']['font-size']?>;
    line-height: <?php echo $themesbazar['heading-three']['line-height']?>;
	text-align:<?php echo $themesbazar['heading-three']['text-align']?>;
	
}
.hadding_3 a{
	color: <?php echo $themesbazar['heading-three']['color']?>;
	text-decoration:none;		
}
.hadding_3 a:hover{
	color:#3765A7;		
}
.more_news {
	padding:5px;
	font-size: <?php echo $themesbazar['more-news']['font-size']?>;
    line-height: <?php echo $themesbazar['more-news']['line-height']?>;
	text-align:<?php echo $themesbazar['more-news']['text-align']?>;
	float:right;
	overflow:hidden;
}
.more_news a {
	color: <?php echo $themesbazar['more-news']['color']?>;
}
.more_news a:hover {
	color:#F7040A;
}
.section_5{
	background:<?php echo $themesbazar['footer-color']?>;
}
.footer p{
	font-size: <?php echo $themesbazar['footer-font']['font-size']?>;
    line-height: <?php echo $themesbazar['footer-font']['line-height']?>;
	color: <?php echo $themesbazar['footer-font']['color']?>;
}
.section_6{ 
    background:<?php echo $themesbazar['bottom-footer-color']?>;
}
.copy{  
	color: <?php echo $themesbazar['bottom-footer-font']['color']?>;
	font-size: <?php echo $themesbazar['bottom-footer-font']['font-size']?>;
	text-align:right;
}
.Design{
	text-align:left;
	color: <?php echo $themesbazar['bottom-footer-font']['color']?>;	
	font-size: <?php echo $themesbazar['bottom-footer-font']['font-size']?>;
}
.scrool{
	margin-bottom:5px;
	font-size:<?php echo $themesbazar['sctitle-font']['font-size']?>;
}
.scrool_01{
    background-color: <?php echo $themesbazar['sctitle-background']?>;
    padding: 10px;
    color: <?php echo $themesbazar['sctitle-font']['color']?>;

}

.scrool_02{
    padding: 9px;
	background:<?php echo $themesbazar['scrool-background']?>;
}

.scrool_02 a{
	color: <?php echo $themesbazar['scrool-font']['color']?>;
}

.live_full{
	background:<?php echo $themesbazar['monitor-background']?>;
}

/*Widget Title=========*/
.widget_area{ margin:5px 0px 5px 0px;}
.widget_area li{margin:2px 0px 5px 0px;}
.widget_area a{color: #000000;}
.widget_area a:hover{color: #FF0505;}
.widget_area h3{
    background-color: <?php echo $themesbazar['category-background']?>; 
	padding:11px;
    border-radius: 3px 3px 0px 0px;
    margin-top: 5px;
	text-align:<?php echo $themesbazar['category-font']['text-align']?>;
	font-size:<?php echo $themesbazar['category-font']['font-size']?>;
	color:<?php echo $themesbazar['category-font']['color']?>;
}
    
	
	.section_2{
background-color: <?php echo $themesbazar['menu-background']?>;
}

#bs-example-navbar-collapse-1 {
    background-color: <?php echo $themesbazar['menu-background']?>;
    font-size: <?php echo $themesbazar['menu-font']['font-size']?>;
	border:none;
    }
 #nav .navbar-default .navbar-nav > li > a{color: <?php echo $themesbazar['menu-font']['color']?>;
        padding: 7px 20px 7px 20px;}
.navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus {
    color: #fff !important; 
       margin: 0px;
       background-color: #73337D;}
    
   /* Goto Top============================ */
#myBtn {
    display: none; /* Hidden by default */
    position: fixed; /* Fixed/sticky position */
    bottom: 20px; /* Place the button at the bottom of the page */
    right: 30px; /* Place the button 30px from the right */
    z-index: 99; /* Make sure it does not overlap */
    border: none; /* Remove borders */
    outline: none; /* Remove outline */
    background-color: <?php echo $themesbazar['category-background']?>;  /* Set a background color */
    color: <?php echo $themesbazar['category-font']['color']?>; /* Text color */
    cursor: pointer; /* Add a mouse pointer on hover */
    padding: 15px; /* Some padding */
    border-radius: 10px; /* Rounded corners */
}

            
    #myBtn:hover {
    background-color: <?php echo $themesbazar['category-background']?>; /* Add a dark-grey background on hover */
        opacity: 0.5;
}
    




</style>

		
    </head>
	
	<body> 
