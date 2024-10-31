<?php
	require_once('../../../wp-blog-header.php');
	
	$all_category_ids = get_all_category_ids();
	$all_category_selected;
	$i = 0;
	foreach($all_category_ids as $key => $value)
	{
		if(get_option(get_cat_name($value)) == "on")
		{
		$all_category_selected[$i] = get_cat_name($value);
				
		$i++;
		}
	}
	foreach($all_category_selected as  $value)
	{
		echo $value."[n]";
		//echo "hello";
		//$i++;
	}
	//print_r($all_category);
?>