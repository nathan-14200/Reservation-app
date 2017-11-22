<div id="index-page">
	<h1 class="row">Recapitulation</h1>
	
	<div class="row">
		<div class="col-md-8">
			<label>Destination:</label><br>
			<?php echo $res->get_destination(); ?>
			<br>
			<label>ID:</label><br>
			<?php echo $res->get_ID(); ?>
			<br>
			<label>Passengers:</label><br>
			<?php 
			$p = $res->get_passengers();
			for($i=0;$i<count($p);$i++)
			{
				$n = (string) $p[$i]->get_name();
				$a = (string) $p[$i]->get_age();
				echo "$n : $a";
			}
			?>
			<br>
			<label>Insurance</label><br>
			<?php
				echo $res->get_insurance();
			?>
		</div>
	</div>
</div>