<?php snippet('header') ?>

	<body style="background: <?php echo $page-> color() ?>">

	<?php snippet('rooms-navigation') ?>

	<div id="room-message">
		Welcome to the <?php echo $page->title()->html() ?>
	</div>

	<div id="play-pause">
		▶
	</div>

	<div class="works-area">

		<?php foreach($page->children()->visible() as $work): ?>
		    <a class="thumb" style="left:<?php echo $work->percentage_left() ?>%; top:<?php echo $work->percentage_top() ?>%" href="<?php echo $work->url() ?>">
		 		<?php if ($work->slideshow() == '1'): ?>
		 			<img src="<?php echo $work->images()->first()->url() ?>">
		 		<?php elseif ($work->images()->count() > 1): ?>
			 		<img src="<?php echo $work->images()->first()->url() ?>" class="moving">
			 		<img src="<?php echo $work->images()->nth(1)->url() ?>" class="still">
			 	<?php else : ?>
			 		<img src="<?php echo $work->images()->first()->url() ?>">
			 	<?php endif ?>
		    </a>
		<?php endforeach ?>

	</div>

<?php snippet('footer') ?>