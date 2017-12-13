<div id="new-reservation">
	<h1 class="row">New Reservation</h1>
		<div class="col-md-6">
			
			
			<form method="post" action="index.php">
				Destination: <input type="text" name = "destination"><br>
				Number of passengers:	<select name="num">
											<option value="1"> 1 </option>
											<option value="2"> 2 </option>
											<option value="3"> 3 </option>
											<option value="4"> 4 </option>
											<option value="5"> 5 </option>
											<option value="6"> 6 </option>
											<option value="7"> 7 </option>
											<option value="8"> 8 </option>
											<option value="9"> 9 </option>
											<option value="10"> 10 </option>
										</select><br>
				<input type="checkbox" name="insurance" id="insurance" /> 
				<label for="insurance">Cancellation insurance</label>
				
				<button name = "page" value = "destination" type="submit" class="btn btn-primary big">
				Submit
				</button>
				
			</form>
		</div>
		
</div>