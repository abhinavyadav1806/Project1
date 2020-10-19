<?php 
	include("../config.php");
	include("header.php");
	include("sidebar.php");

	if(isset($_POST['submit']))
	{
		$category_id = isset($_POST['dropdown']) ? ($_POST['dropdown']) : ''; 

		$filename = $_FILES['image']['name'];
        $filetmpname = $_FILES['image']['tmp_name'];
        $folder = 'resources/images/';
		move_uploaded_file($filetmpname, $folder.$filename);

        $name = isset($_POST['name']) ? $_POST['name'] : '';
		$price = isset($_POST['price']) ? $_POST['price'] : '';
		$tag = isset($_POST['tags']) ? $_POST['tags'] : '';
		$tags = json_encode($tag);

		$discription = isset($_POST['discription']) ? ($_POST['discription']) : '';

		$query="INSERT INTO products(`category_id`, `image`, `name`, `price`, `tag`, `discription`) VALUES('$category_id', '$filename', '$name', '$price', '$tags', '$discription')";
		
		$result = mysqli_query($connect,$query);
	}

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
						<li><a href="#tab1" class="default-tab">Manage</a></li> <!-- href must be unique and match the id of target div -->
						<li><a href="#tab2">Add</a></li>
					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
						
						<div class="notification attention png_bg">
							<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
							<div>
								This is a Content Box. You can put whatever you want in it. By the way, you can close this notification with the top-right cross.
							</div>
						</div>
						
						<table>
							
							<thead>
								<tr>
								   <th><input class="check-all" type="checkbox" /></th>
								   <th>Category ID</th>
								   <th>Image</th>
								   <th>Name</th>
								   <th>Price</th>
								   <th>Tag</th>
								   <th>Description</th>
								   <th>Action</th>
								</tr>
							</thead>
						 
							<tfoot>
								<tr>
									<td colspan="6">
										<div class="bulk-actions align-left">
											<select name="dropdown">
												<option value="option1">Choose an action...</option>
												<option value="option2">Edit</option>
												<option value="option3">Delete</option>
											</select>
											<a class="button" href="#">Apply to selected</a>
										</div>
										
										<div class="pagination">
											<a href="#" title="First Page">&laquo; First</a><a href="#" title="Previous Page">&laquo; Previous</a>
											<a href="#" class="number" title="1">1</a>
											<a href="#" class="number" title="2">2</a>
											<a href="#" class="number current" title="3">3</a>
											<a href="#" class="number" title="4">4</a>
											<a href="#" title="Next Page">Next &raquo;</a><a href="#" title="Last Page">Last &raquo;</a>
										</div> <!-- End .pagination -->
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
						 
							<tbody>

								<?php 
									$query = mysqli_query($connect, "SELECT * FROM products");
									while($row = mysqli_fetch_array($query))
									{
										echo "<tr>";
											echo'<td> <input type="checkbox" /></td>';
											echo "<td>" . $row['category_id'] . "</td>";
											echo '<td> <img src="resources/images/'.$row['image'].'"/> </td>';
											echo "<td>" . $row['name'] . "</td>";
											echo "<td>" . $row['price'] . "</td>";
											echo "<td>" . $row['tag'] . "</td>";
											echo "<td>" . $row['discription'] . "</td>";
											echo "<td>";
												echo "<a href='update_product.php?id=".$row['product_id']."' title='Edit'><img src='resources/images/icons/pencil.png' alt='Edit' /></a>";
												echo "<a href='delete_product.php?id=".$row['product_id']."'title='Delete'><img src='resources/images/icons/cross.png' alt='Delete'/></a>";
												echo "<a href='#' title='Edit Meta'><img src='resources/images/icons/hammer_screwdriver.png' alt='Edit Meta' /></a>";
											echo "</td>";
										echo "</tr>";
									}
								?> 
								
							</tbody>
							
						</table>
						
					</div> <!-- End #tab1 -->
					
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
			