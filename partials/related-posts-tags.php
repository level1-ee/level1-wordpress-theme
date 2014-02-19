	<div class="related-posts-tags-wrap">
		<?php
		$posttags = get_the_tags();
		if ($posttags) { ?>

		<div class="single-tags">
			<h3>Märksõnad</h3>
			<?php the_tags('<ul><li>','</li><li>','</li></ul>'); ?>
		</div>

		<?php } ?>
		<div class="single-related-posts">
			<h3>Samal teemal</h3>
			<?php do_action('erp-show-related-posts', array('title'=>'', 'num_to_display'=>3, 'no_rp_text'=>'<span class="no-related-posts">Kahjuks sarnaseid postitusi ei leitud</span>')); ?>
		</div>
	</div>