<div id="index-page">
	<h1 class="row">Recapitulation</h1>
	
	<div class="row">
		<div class="col-md-8">
			<label>Destination:</label><br>
			<?php echo $res->get_destination(); ?>
			<br>
			<label>Passengers:</label><br>
			<?php 
			$p = $res->get_passengers();
			for($i=0;$i<count($p);$i++)
			{
				$fn = (string) $p[$i]->get_firstname();
				$ln = (string) $p[$i]->get_lastname();
				$a = (string) $p[$i]->get_age();
				echo nl2br("Name: $fn $ln, age: $a \n");
			}
			?>
			
			<label>Insurance:</label><br>
			<?php
				echo $res->get_insurance();
			?>
			<br>
			<form method="post" action="index.php">
				<button id = "validate" name = "validate" type="submit" class="btn btn-primary big">
				Validate
				</button>
				<button id = "destroy" name = "destroy" type="submit" class="btn btn-primary big">
				Cancel
				</button>
			</form>
		</div>
	</div>
</div>