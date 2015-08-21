<?php if(!defined('KIRBY')) exit ?>

title: Work
pages: true
files:
  sortable: true
fields:
  background:
    label: Background
    type: radio
    options:
      white: White
      black: Black
  title:
    label: Title
    type:  text
  year:
    label: Year
    type:  text
  text:
    label: Any extra information?
    type:  textarea
  slideshow:
    label: Slideshow
    type: checkbox
    text: Are there multiple images in this work?
  percentage_top:
    label: Percentage (from top)
    type:  number
    width: 1/2
  percentage_left:
    label: Percentage (from left)
    type:  number
    width: 1/2