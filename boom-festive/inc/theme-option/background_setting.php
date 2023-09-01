<div>
		<span>
			<?php 
			settings_errors(); 
			?>
		</span>
		<form action="options.php" method="post">
			<?php
			settings_fields("background_section");
			do_settings_sections("boom_festive3");
			submit_button();
			?>
		</form>
	</div>