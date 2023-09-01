<div>
		<span>
			<?php 
			settings_errors(); 
			?>
		</span>
		<form action="options.php" method="post">
			<?php
			settings_fields("footer_section");
			do_settings_sections("boom_festive2");
			submit_button();
			?>
		</form>
	</div>