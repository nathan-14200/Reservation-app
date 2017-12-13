<div id="index-page">
	<h1 class="row">Passenger</h1>
	
	<div class="row">
		<div class="col-md-8">
		<?php
		if(isset($_SESSION['error']['passenger']))
		{
			$message = $_SESSION['error']['passenger'];
			echo "$message";
		}
		
		?>
			<form method="post" action="index.php">
				<label for= "firstname">Firstname:</label>
				<input type="text" name = "firstname"><br>
				<label for="lastname"> Lastname</label>
				<input type="text" name = "lastname"><br>
				<label for="age">Age:</label> 
				<input type="text" name = "age"><br>
				
				<button id = "passenger" name = "passenger" type="submit" class="btn btn-primary big">
				Submit
				</button>
			</form>
		</div>
	</div>
</div>
	
