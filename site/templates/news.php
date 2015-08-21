<?php snippet('header') ?>

    <div class="root">

		<?php foreach(page('news')->children()->visible()->sortBy('date') as $news_item): ?>
		<div class="news-post">
			<p>
				<div class="date">
					<?php echo $news_item->date("F j, Y"); ?>
				</div>
				<span class="next-prev-dates">
					<span class="prev">←</span>
					<span href="#" class="next">→</span>
				</span>
			</p>
			<div class="clearer"></div>
			<p>
				<?php echo $news_item->text()->kirbytext() ?>
			</p>
		</div>
		<?php endforeach ?>

	</div>

<?php snippet('footer') ?>