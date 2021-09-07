<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}
?>

<main class="container">
		<?php
			if ( !is_product() || is_checkout() ) {
				echo '<div class="row"><div class="col-12">';
			} else {
				echo '<div class="row"><div class="col-md-12 col-lg-12">';
			}
		?>
