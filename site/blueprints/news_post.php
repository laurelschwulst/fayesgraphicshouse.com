<?php if(!defined('KIRBY')) exit ?>

title: News Post
pages: false
files:
  sortable: true
fields:
  title:
    label: Title
    type:  text
    help: This text actually doesn't appear, but it may help you reference it later
  date:
    label: Date
    type: date
    default: today
  text:
    label: Text
    type:  textarea