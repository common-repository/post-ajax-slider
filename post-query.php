<?php
if ( !isset($wp_did_header) ) {

	$wp_did_header = true;

	require_once( '../../../wp-load.php' );

	wp();

	require_once( '../../../' . WPINC . '/template-loader.php' );

}

//print_r(get_posts());
query_posts("category_name=".$_POST["cat"]."&posts_per_page=1");
global $more;
// set $more t$heighto 0 in order to only get the first part of the post
$more = 0;
//query_posts('in_category='.$_POST['cat']);
// the Loop

while (have_posts()) : the_post();
  // the content of the post
	  	the_title("","[SEPARATOR]");
	  //the_post_thumbnail();
	  //echo "[SEPARATOR]";
	//   if(has_post_thumbnail(the_ID()))
	//   {
	// 	//get_the_post_thumbnail(the_ID());
	//   }
	//   else
	//   {
	// 	echo "nggak ada";
	//   }

	  	the_excerpt("lanjut","..");
	  	echo "[SEPARATOR]";
	  	the_permalink()."#respond";
	  	echo "[SEPARATOR]";
		if(get_the_post_thumbnail(get_the_ID(),300) == "")
		{
			
			echo "<img class='attachment-300' src='".get_option('no-post-cat')."' />";
		}
		else
		{
			echo get_the_post_thumbnail(get_the_ID(),300);
		}
	 	echo "[SEPARATOR]";
	
endwhile;

?>