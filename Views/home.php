<div id="index-page">
	<h1 class="row">Welcome</h1>
	
	<div class="row">
		<div class="col-md-8">
			<form method="post" action="index.php" class="container">
				<button type="submit" class="btn btn-primary big" name="page" value = 'new'>
					<label for="new">New reservation</label>
				</button>
			</form>
			
			<?php
			for($i = 0; $i < sizeof($result);$i++)
			{
				echo"$result[$i] <br>";
			}
			?>
			
		</div>
	</div>
</div>
// get: variable publique, post : variable privée