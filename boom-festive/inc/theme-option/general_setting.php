<div>
		<span>
			<?php 
			settings_errors(); 
			?>
		</span>
		<form action="options.php" method="post">
			<?php
			settings_fields("section");
			do_settings_sections("boom_festive");
			submit_button();
			?>
		</form>
	</div>