<div class="activation-status">
	<?php if ( $data !== 'success' ) : ?>
		<h5>Failed to active your account!</h5>
		<p>Some error has been occured. Please try agan later.</p>
	<?php else: ?>
		<h5>Actvation successful!</h5>
		<p><a href="signin.php">Clic here</a> to sginin</p>
	<?php endif; ?>
</div>