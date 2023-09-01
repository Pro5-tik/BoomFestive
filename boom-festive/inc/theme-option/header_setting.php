<div>
		<span>
			<?php 
			settings_errors(); 
			?>
		</span>
		<form action="options.php" method="post">
			<?php
			settings_fields("header_section");
			do_settings_sections("boom_festive1");
			submit_button();
			?>
		</form>
	</div>