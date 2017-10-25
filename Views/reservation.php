<div id="new-reservation">
	<h1 class="row">New Reservation</h1>
		<div class="col-md-6
			<?php
			if(isset($_SESSION['destinationError']))
				echo $_POST['destinationError'];
			?>
			<form method="post" action="router.php">
				Destination: <input type="text" name = "destination"><br>
				Number of passengers: <input type="text" name = "num"><br>
				<input type="checkbox" name="insurance" id="insurance" /> <label for="insurance">Cancellation insurance</label>
				<input type="hidden" name ="page" value = "destination">
				
				<button id = "destination" type="submit" class="btn btn-primary big" name="destination">
				Submit
				</button>
			</form>
		</div>
		<?php
		
		
		
		
		
		?>
</div>