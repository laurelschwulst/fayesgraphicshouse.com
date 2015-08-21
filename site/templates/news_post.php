<?php snippet('header') ?>

<div id="news-permalink">

    <div class="root">

		<div class="news-post">
			<p>
				<div class="date">
					<?php echo $page->date("F j, Y"); ?>
				</div>
			</p>
			<div class="clearer"></div>
			<p>
				<?php echo $page->text()->kirbytext() ?>
			</p>
		</div>

	</div>

</div>

<?php snippet('footer') ?>