<!DOCTYPE html>
		<!-- <?php  
			  
			// Requires php5  
			define('UPLOAD_DIR', 'images/');  
			$img = $_POST['imgBase64'];  
			$img = str_replace('data:image/png;base64,', '', $img);  
			$img = str_replace(' ', '+', $img);  
			$data = base64_decode($img);  
			$file = UPLOAD_DIR . uniqid() . '.png';  
			$success = file_put_contents($file, $data);  
			print $success ? 
			$file : 'Unable to save the file.';  
			  
			?> -->
<html>
<head>
	<title></title>
	<link rel="stylesheet" href=
"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src=
"https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
	</script>
	<script src=
"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
	</script>
	<script src=
"https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js">
	</script>
	<style>
		.top {
			margin-top: 20px;
		}
		
		h1 {
			color: green;
		}
		
		input {
			background-color: transparent;
			border: 0px solid;
			width: 300;
		}
		
		body {
			text-align: center;
		}
	</style>
</head>
<body>
	<div class="col-md-offset-4 col-md-4 col--md-offset-4 top">
		<div id="createImg" style="border:1px solid;">
			<h1>GeeksforGeeks</h1>
			<h4>How to save an HTML5 Canvas as an
						image on a server?</h4>
			<input type="text" value=""
	placeholder="Enter wahtaever you want" class="form-control" />
			<br/>
		</div>
		<button id="geeks" type="button"
									class="btn btn-primary top">
			Create Image</button>
		<div id="img" style="display:none;">
			<img src="" id="newimg" class="top" />
		</div>
	</div>
	<script>
		$(function() {
			$("#geeks").click(function() {
				html2canvas($("#createImg"), {
					onrendered: function(canvas) {
						var imgsrc = canvas.toDataURL("image/png");
						console.log(imgsrc);
						$("#newimg").attr('src', imgsrc);
						$("#img").show();
						var dataURL = canvas.toDataURL();
						$.ajax({
							type: "POST",
							url: "script.php",
							data: {
								imgBase64: dataURL
							}
						}).done(function(o) {
							console.log('saved');
						});
					}
				});
			});
		});
		var dataURL = canvas.toDataURL();

			$.ajax({
			    type: "POST",
			    url: "script.php",
			    data: { 
			        imgBase64: dataURL
			    }
			}).done(function(o) {
			    console.log('saved'); 
			});

	</script>

</body>
			
</html>

		 