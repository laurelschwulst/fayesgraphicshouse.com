<?php snippet('header') ?>

<div id="index"></div>

<div id="plugins"><?php echo $page->text() ?></div>

	<div class="image-container house">

		<div class="house-container">
			<div id="house"></div>
			<div id="plant-container">
				<a href="#news" id="plant"></a>
			</div>
		</div>

	</div>

	<div id="time-of-day">...</div>

<div id="news">

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

		<a href="#index" id="ellipsis"></a>
	</div>

</div>

<?php snippet('footer') ?>