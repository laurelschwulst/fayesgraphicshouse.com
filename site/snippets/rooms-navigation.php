<?php 
function seoUrl($string) {
    //Lower case everything
    $string = strtolower($string);
    //Make alphanumeric (removes all other characters)
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    //Clean up multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);
    //Convert whitespaces and underscore to dash
    $string = preg_replace("/[\s_]/", "-", $string);
    return $string;
}
?>

<div id="rooms-nav">
	<ul>
	  <?php foreach($page->siblings()->visible() as $room): ?>
	  <?php if($room == $page): ?>
	  <?php else : ?>
	  <li>
	    <a href="<?php echo $room->url() ?>" class="<?php echo seoUrl($room->title()) ?>" style="color: <?php echo $room->color() ?>;">
	      <?php echo html($room->title()) ?>
	    </a>
	  </li>
	  <?php endif ?>
	  <?php endforeach ?>
	</ul>
</div>