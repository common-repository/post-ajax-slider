<?php
function count_category_post($category)
{
	query_posts("category_name=".$category);
	$i = 0;
	while (have_posts()) : the_post();
		$i++;
	endwhile;
	return $i;
}

?>
<script type="text/javascript" src="../lib/jquery/jquery-1.3.2.js">
</script>
<script type="text/javascript" src="../lib/jquery/jquery-1.3.2.min.js">
</script>
<script type="text/javascript">

$(document).ready(function(){
	$("#formUpdate").submit(function(){
		var input = document.getElementsByTagName('input'); var i = 0;
		var selected = 0;
		while(i < input.length)
		{
			if(input.item(i).getAttribute('type') == 'checkbox' && input.item(i).checked)
			{
				selected++;
			}
			i++;
		}
		if(selected > 8)
		{
			alert('Error, there are too many categories that you select.\n Please select only 8 categories.');
			return false;
		}
		else
		{
			
			return true;
		}
	});
})

</script>
<div class="wrap">
	<h2>Post Slider Ajax Configuration</h2>
	<p>You can edit this plugin configuration below.</p>
	
    <div style="margin-left:0px;">
    <form id="formUpdate" method="post" action="options.php">
		<fieldset name="general_options" class="options">
		<?php settings_fields( 'post-ajax-slider-settings-group' ); ?>
		
        <h3>Post Slider</h3>
		<h4>Category selection : </h4>
		<div>
			Please select at most 8 categories that need to published in slider.
			<br/><br/>
		</div>
		<?php 	
			$all_category_ids = get_all_category_ids();
			$count_category = count($all_category_ids);
			$i = 0; 
			while($i < $count_category )
			{
		?>
		
		<label style="display:block;<?php if(count_category_post(get_cat_name($all_category_ids[$count_category-1])) < 1){echo "color:red;";}?>">
		<input type="checkbox" name="<?php echo get_cat_name($all_category_ids[--$count_category]); ?>" <?php if(get_option(get_cat_name($all_category_ids[$count_category])) != "on"){echo "";}else{echo "checked=\"checked\"";} if(count_category_post(get_cat_name($all_category_ids[$count_category])) > 0){echo "";} else {echo "disabled='true'";} ?> />
		<?php echo get_cat_name($all_category_ids[$count_category]); 
			if(count_category_post(get_cat_name($all_category_ids[$count_category])) > 0){echo "";} else {echo " (this category have no post)";}
		?>
		</label>
		<div>Url for the image that represent the category (<?php echo get_cat_name($all_category_ids[$count_category]); ?>) : </div>
		<input type="text"  name="<?php echo get_cat_name($all_category_ids[$count_category]); ?>-image" value="<?php echo get_option(get_cat_name($all_category_ids[$count_category])."-image") ?>" <?php if(count_category_post(get_cat_name($all_category_ids[$count_category])) > 0){echo "style='width:500px'";} else {echo "disabled='true' style='width:500px;background-color:#e8e8e8;'";} ?> >
		<?php 
			
			}
		
		?>
		
		<p>
		Set default size for the category icon (now : <?php if(get_option('category_icon_size') == ""){echo "64"."x"."64";}else{ echo get_option('category_icon_size')."x".get_option('category_icon_size');} ?>)
		<input type="text" name="category_icon_size" value="<?php if(get_option('category_icon_size') == ""){echo 64;}else {echo get_option('category_icon_size');} ?>" /> pixels
		</p>
		<!--
		// coming soon 
		<h4>Color Theme:</h4>
		<select >
			<option>Red</option>
			<option>Black</option>
		</select>
		 -->
		</fieldset>
		<p class="submit"><input type="submit" name="Submit" value="<?php _e('Update Options') ?>" /></p>
	</form>      
</div>