<?php 
	include("../config.php");
	include("header.php");
	include("sidebar.php");

	// if(isset($_POST['submit']))
	// {
	// 	$category_id = isset($_POST['dropdown']) ? ($_POST['dropdown']) : ''; 

	// 	$filename = $_FILES['image']['name'];
    //     $filetmpname = $_FILES['image']['tmp_name'];
    //     $folder = 'resources/images/';
	// 	move_uploaded_file($filetmpname, $folder.$filename);

    //     $name = isset($_POST['name']) ? $_POST['name'] : '';
	// 	$price = isset($_POST['price']) ? $_POST['price'] : '';
	// 	$tag = isset($_POST['tags']) ? $_POST['tags'] : '';
	// 	$tags = json_encode($tag);

	// 	$discription = isset($_POST['discription']) ? ($_POST['discription']) : '';

	// 	$query="INSERT INTO products(`category_id`, `image`, `name`, `price`, `tag`, `discription`) VALUES('$category_id', '$filename', '$name', '$price', '$tags', '$discription')";
		
	// 	$result = mysqli_query($connect,$query);
	// }

?>

<html>
		<div id="main-content"> <!-- Main Content Section with everything -->
			
			<noscript> <!-- Show a notification if the user has disabled javascript -->
				<div class="notification error png_bg">
					<div>
						Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
					</div>
				</div>
			</noscript>
			
			<!-- Page Head -->
			<h2>Welcome John</h2>
			<p id="page-intro">What would you like to do?</p>
			
			<div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Content box</h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab2" class="default-tab">Update</a></li>
					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content" id="tab2">
					
						<form action="products.php" method="post" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								<p>
									<label>Insert Product Image</label>
										<input class="text-input small-input" type="file" id="small-input" name="image" required/> <span class="input-notification success png_bg">Image Added Successfully</span> <!-- Classes for input-notification: success, error, information, attention -->
										<br /><small>Add any new products image. </small>
								</p>
								
								<p>
									<label>Insert Product Name</label>
									<input class="text-input medium-input datepicker" type="text" id="medium-input" name="name" required/> <span class="input-notification error png_bg">Product Name already Exist</span>
								</p>

								<p>
									<label>Insert Product Price</label>
									<input class="text-input medium-input datepicker" type="number" id="medium-input" name="price" required/>
								</p>
								
								<p>
									<label>Category</label>              
									<select name="dropdown" class="small-input">
										<option value="1">Men</option>
										<option value="2">Women</option>
										<option value="3">Kids</option>
										<option value="4">Electronics</option>
										<option value="5">Sports</option>
									</select> 
								</p>

								<p>
									<label>Tags</label>
									<input type="checkbox" name="tags[]" value="fashion" /> Fashion 
									<input type="checkbox" name="tags[]" value="ecommerce" /> Ecommerce
									<input type="checkbox" name="tags[]" value="shop" /> Shop
									<input type="checkbox" name="tags[]" value="handbag" /> Hand Bag
									<input type="checkbox" name="tags[]" value="laptop" /> Laptop
									<input type="checkbox" name="tags[]" value="headphone" /> Headphone
								</p>
								
								<p>
									<label>Discription</label>
									<textarea class="text-input textarea wysiwyg" id="textarea" name="discription" cols="79" rows="15"></textarea>
								</p>
								
								<p>
									<input class="button" type="submit" name="submit" value="Submit" />
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab2 -->        
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
					
			<div class="clear"></div>
			
			<!-- Start Notifications -->
			<!--
			<div class="notification attention png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Attention notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero. 
				</div>
			</div>
			
			<div class="notification information png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Information notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
				</div>
			</div>
			
			<div class="notification success png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Success notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
				</div>
			</div>
			
			<div class="notification error png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Error notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
				</div>
			</div>
			-->
			<!-- End Notifications -->
			<?php include("footer.php"); ?>
			