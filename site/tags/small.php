<?php

kirbytext::$tags['small'] = array(
  'html' => function($tag) {
    return '<span class="small">' . $tag->attr('small') . '</span>';
  }
);

?>