<?php require_once('wp-load.php'); ?>
<?php 
echo "<link rel=\"stylesheet\" href=\"styles/default.css\" type=\"text/css\" media=\"screen\" />";
?>
<?php
	
	global $left_button;
	global $right_button; 
	global $height_post; 
	$all_category_ids = get_all_category_ids();
	$all_category_selected;
	$all_category_selected_image;
	$i = 0;
	foreach($all_category_ids as $key => $value)
	{
		if(get_option(get_cat_name($value)) == "on")
		{
		$all_category_selected[$i] = get_cat_name($value);
		
		$all_category_selected_image[$i] = get_option(get_cat_name($value)."-image");
		
		$i++;
		}
	}
	//print_r($all_category_selected_image);
	$count_category = count($all_category_selected);
	
	if($count_category % 2 == 0)
	{
		$left_button = $right_button = count($all_category_selected)/2;
	}
	else
	{
		$left_button =  ceil(count($all_category_selected)/2);
		$right_button = floor(count($all_category_selected)/2);
	}
	$max;
	if($left_button >= $right_button )
	{
		$max = $left_button;
	}
	else
	{
		$max = $right_button;
	}
	//echo "MAX=".$max;
	$height_post = ((int)($max)) * 75;
	//echo get_option('category_icon_size');
 ?>

<div style="position:relative;width:850px;height:300px;margin-left:auto;margin-right:auto;margin-top:auto" >
	<div style="margin-top:40px;width:850px;height:250px;">
	<div style="left:90px;position:absolute;background-color:black;width:660px;height:250px;border:5px solid white;" >
		<div id="thumbnail-post"></div>
		<?php
		if($count_category != 0)
		{
		?> 
		<div id="post-Ajax" >
			<div id="text-post-ajax">
				
			</div>
		</div>
		<?php
		}
		else
		{
		?>
		<div id="none-post" >
			<h1>There is no category added to this plugins, please configure it first!.</h1>
		</div>
		<?php
		}
		?>
		
		
	</div>
	<div id="buttonContainerLeft" >
		<?php 
		
		for($i = 0; $i < $left_button; $i++)	
		{
		?>
		<div id="<?php echo $all_category_selected[--$count_category]; ?>" class="buttonLeft" >
			
			<img <?php if(get_option('post-image-width') != ""){echo "width=".get_option('post-image-width'); }  ?> class="category-image-left" id="<?php echo $all_category_selected[$count_category]."-image"; ?>" title="<?php echo $all_category_selected[$count_category]; ?>" alt="<?php echo $all_category_selected[$count_category]; ?>" width="<?php echo get_option('category_icon_size'); ?>" src="<?php 
				if(get_option($all_category_selected[$count_category]."-image") == "")
				{
					echo get_option('default-image-cat');
				}else{
					echo get_option($all_category_selected[$count_category].'-image');
				}
			?>"  />
			
			<?php
				//echo $all_category_selected[$count_category];
			?>
			
		</div>
		
		<?php
		}
		 ?>
	</div>
	<div id="buttonContainerRight" >
		<?php
		
		for($i = 0; $i < $right_button; $i++)	
		{
		?>
		<div id="<?php echo $all_category_selected[--$count_category]; ?>" class="buttonRight" >
			
			<img  class="category-image-right" id="<?php echo $all_category_selected[$count_category]."-image"; ?>" title="<?php echo $all_category_selected[$count_category]; ?>" alt="<?php echo $all_category_selected[$count_category]; ?>" width="<?php if(get_option('category_icon_size') == ""){echo 64;}else {echo get_option('category_icon_size');} ?>" src="<?php 
				if(get_option($all_category_selected[$count_category]."-image") == "")
				{
					echo get_option('default-image-cat');
				}else{
					echo get_option($all_category_selected[$count_category].'-image');
				}
			?>"  />
			<?php
				//echo $all_category_selected[$count_category];
			?>
		</div>
		<?php
		}
		?>
	</div>
	</div>
</div>
