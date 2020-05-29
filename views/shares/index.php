<div class="shares">
	
	<h2 class="text-center">Welcome to shares</h2>
	<a class="btn btn-success btn-shares" href="<?php echo ROOT_URL; ?>shares/add">Share Something</a>
	<?php foreach($viewmodel as $share): ?>

		<div class='jumbotron'>
			<h3><?php echo $share->title; ?></h3>
			<small><?php echo $share->created_at; ?></small>
			<hr>
			<p><?php echo $share->body; ?></p>
			<br>
			<a class="btn btn-default" href="<?php echo $share->link; ?>" target='_blank'>Regerence</a>
		</div>

	<?php endforeach; ?>
</div>