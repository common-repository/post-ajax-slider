
/**
 * @deprecated
function initPostSlider()
{
	
	$.ajax({
		type: "POST",
		url:"wp-content/plugins/post-slider/post-viewer.php",
		data:"",
		success:function(msg){
			$("#post-ajax").html(msg);
		}
		
	});
	
}
**/

$(document).ready (function(){
	rotate(0);

	$(".buttonLeft").click(function(){
		$.ajax({
			type: "POST",
			url: "wp-content/plugins/post-ajax-slider/post-query.php",
			data: "cat=" + $(this).attr("id"),
			beforeSend: function() {
				$("#post-Ajax").hide();
				$("#thumbnail-post").hide();
			},
			success: function(msg){

				var message = msg.split("[SEPARATOR]");
				$("#text-post-ajax").html("<h5>"+message[0]+"</h5>" + message[1] + "<a class='button-click' href='"+message[2]+"'>lanjut</a>"  );

				$("#thumbnail-post").html(message[3]);
				$("#post-Ajax").fadeIn(2500);
				$("#thumbnail-post").fadeIn();
			}

		});

	});

	$(".buttonRight").click(function(){
		$.ajax({

			type: "POST",
			url: "wp-content/plugins/post-ajax-slider/post-query.php",
			data: "cat=" + $(this).attr("id"),
			beforeSend: function() {
				$("#post-Ajax").hide();
				$("#thumbnail-post").hide();
			},
			success: function(msg){

				var message = msg.split("[SEPARATOR]");
				
				$("#text-post-ajax").html("<h5>"+message[0]+"</h5>" + message[1] + "<a class='button-click' href='"+message[2]+"'>lanjut</a>" );

				$("#thumbnail-post").html(message[3]);
				$("#post-Ajax").fadeIn(2500);
				$("#thumbnail-post").fadeIn();
			}

		});

	});
	
});


function rotate(num)
{
	var categories;
	$.ajax({
		type:"POST",
		url:"wp-content/plugins/post-ajax-slider/list-category.php",
		data:"",
		success: function(msg){


			categories = msg.split("[n]");
			if(num >= categories.length)
			{
				num = 0;
			}

			$.ajax({
				type: "POST",
				url: "wp-content/plugins/post-ajax-slider/post-query.php",
				data: "cat="+categories[num],
				beforeSend: function() {
					$("#post-Ajax").hide();
					$("#thumbnail-post").hide();
				},
				success: function(msg){
					var message = msg.split("[SEPARATOR]");
					$("#text-post-ajax").html("<h5>"+message[0]+"</h5>" + message[1] + "<a class='button-click' href='"+message[2]+"'>lanjut</a>" );
					//$("#myGallery").html(msg);
					
					$("#thumbnail-post").html(message[3]);
					
					$("#post-Ajax").fadeIn(2500);
					$("#thumbnail-post").fadeIn();
				}
		
			});
			setTimeout("rotate("+(++num)+")",10000);
		}
	});
	
	
}