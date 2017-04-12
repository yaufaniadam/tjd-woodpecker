<?php
function be_excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
	array_pop($excerpt);
	$excerpt = implode(" ",$excerpt).'...';
	} else {
	$excerpt = implode(" ",$excerpt);
	}
	$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
	return $excerpt;
}
	 
function content($limit) {
	$content = explode(' ', get_the_content(), $limit);
	if (count($content)>=$limit) {
	array_pop($content);
	$content = implode(" ",$content).'...';
	} else {
	$content = implode(" ",$content);
	}
	$content = preg_replace('/[.+]/','', $content);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}

function short_title($limit) {
	$short_title = explode(' ', get_the_title(), $limit);
	if (count($short_title)>=$limit) {
	array_pop($short_title);
	$short_title = implode(" ",$short_title).'...';
	} else {
	$short_title = implode(" ",$short_title);
	}
	$short_title = preg_replace('`[[^]]*]`','',$short_title);
	return $short_title;
}	 

?>