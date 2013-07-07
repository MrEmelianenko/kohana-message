<ul class="messages">
	<?php foreach ($messages as $message): ?>
		<li class="<?php echo $classes[$message->type]; ?>" <?php echo HTML::attributes($message->attributes); ?>>
			<?php echo $message->text; ?>
		</li>
	<?php endforeach; ?>
</ul>