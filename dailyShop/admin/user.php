<?php 
	include("header.php");
	include("sidebar.php");
	include("../config.php");


	if(isset($_POST['submit']))
	{
		$username = isset($_POST['username']) ? ($_POST['username']) : '';
		$password = isset($_POST['password']) ? ($_POST['password']) : '';
		$address = isset($_POST['address']) ? ($_POST['address']) : '';
		$email = isset($_POST['email']) ? ($_POST['email']) : '';
		$dob = isset($_POST['dob']) ? ($_POST['dob']) : '';

		// $sql = "SELECT * FROM users";
        
        // $result= mysqli_query($connect,$sql);
        // if($result->num_rows > 0)
		// {
		// 	while($row=$result->fetch_assoc())
		// 	{
        //         $_SESSION['user']=array('username'=>$row['username'],'email'=>$row['email']);
                
		// 		if($_SESSION['user']['username'] == $username)
		// 		{
		// 			//(".input-notification error png_bg").show();
		// 			die("Enter UNIQUE USER Name");
		// 		}
		// 		if($_SESSION['user']['email'] == $email)
		// 		{
		// 			die("Enter UNIQUE EMAIL");
		// 		}
		// 	}
		// }

		$insert = "INSERT INTO users(`username`, `password`, `address`, `dob`, `email`) VALUES('$username', '$password', '$address', '$dob', '$email')";
		mysqli_query($connect, $insert);
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
								   <th>User Name</th>	 
								   <th>Address</th>
								   <th>Email</th>
								   <th>Date of Birth</th>
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
									$query = mysqli_query($connect, "SELECT * FROM users");

									while($row = mysqli_fetch_array($query))
									{
										echo"<tr>";
											echo'<td> <input type="checkbox" /></td>';
											echo "<td>" . $row['username'] ."</td>";
											echo "<td>" . $row['address'] ."</td>";
											echo "<td>" . $row['email'] ."</td>";
											echo "<td>" . $row['dob'] ."</td>";
											echo "<td>";
												echo "<a href='#' title='Edit'><img src='resources/images/icons/pencil.png' alt='Edit' /></a>";
												echo "<a href='#' title='Delete'><img src='resources/images/icons/cross.png' alt='Delete'/></a>";
												echo "<a href='#' title='Edit Meta'><img src='resources/images/icons/hammer_screwdriver.png' alt='Edit Meta' /></a>";
											echo "</td>";
										echo"</tr>";
									}
								?> 	
							</tbody>
							
						</table>
						
					</div> <!-- End #tab1 -->
					
					<div class="tab-content" id="tab2">
					
						<form action="user.php" method="post">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label>User Name</label>
										<input class="text-input small-input" type="text" id="username" name="username" /> <span style='display:none' class="input-notification error png_bg">User Name Alredy Exist.</span><!-- Classes for input-notification: success, error, information, attention -->
										<br /><small>User Name has to be Unique</small>
								</p>
								
								<p>
									<label>Password</label>
									<input class="text-input medium-input datepicker" type="password" id="password" name="password" />
								</p>
								
								<p>
									<label>Address</label>
									<input class="text-input large-input" type="text" id="address" name="address" />
								</p>

								<p>
									<label>Email Id</label>
									<input class="text-input large-input" type="email" id="email" name="email" />
								</p>

								<p>
									<label>Date of Birth</label>
									<input class="text-input large-input" type="date" id="dob" name="dob" />
								</p>
								
								<!-- IF NEEDED FOR A ROLE -->
								<!-- <p>
									<label>This is a drop down list</label>              
									<select name="dropdown" class="small-input">
										<option value="option1">Option 1</option>
										<option value="option2">Option 2</option>
										<option value="option3">Option 3</option>
										<option value="option4">Option 4</option>
									</select> 
								</p> -->
		
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
			