<?php
/*
Plugin Name: OnLoad'er
Plugin URI: http://www.mfd-consult.dk/onloader/
Description: A WordPress plugin providing a shortcode for loading content via AJAX on page load with a spinning load indicator.
Author: Morten Høybye Frederiksen
Version: 1.0
Tested up to: 2.8
Author URI: http://www.wasab.dk/morten/
*/

function onloader_location() {
  $path = substr(__FILE__, 1);
  while (strpos($path, '/') && !file_exists(ABSPATH . PLUGINDIR . '/' . $path))
    $path = preg_replace('|^[^/]+/|', '', $path);
  return get_option('siteurl') . '/' . PLUGINDIR . '/' . dirname($path);
}

function onloader_action_wp_head() {
  echo '<script type="text/javascript" src="' . onloader_location() . '/onloader.js"></script>';
}

function onloader_shortcode($atts, $content=null) {
  extract(shortcode_atts(array('href' => '', 'id' => '', 'width' => '', 'height' => '', 'style' => ''), $atts));
  if (empty($href))
    return;
  if (preg_match('|^demo|', $href)) {
    $href = onloader_location() . '/demo.php?demo=' . md5($href);
    $style = "padding: 50px; background: #b0d0f0; border: 1px solid #8ab; text-align: center";
  }
  if (empty($id))
    $id = md5($href);
  if (!empty($width) && !empty($height))
    $size = 'width: ' . $width . '; height: ' . $height;
  else
    $size = 'width: 100%; height: 200px';
  return '
<div id="onloader-container-' . $id . '" class="onloader-container" style="position: relative; overflow: hidden; margin: auto; ' . $size . '">
<div id="onloader-load-' . $id . '" class="onloader-load" style="width: 100%; height: 100%; position: absolute; background: white url(\'' . onloader_location() . '/onloader.gif\') no-repeat 50% 50%;"></div>
<div id="onloader-display-' . $id . '" class="onloader-display" style="display: none; position: absolute; ' . $style . '"></div>
<script type="text/javascript">new OnLoader("onloader-load-' . $id . '", "onloader-display-' . $id . '", "' . $href . '");</script>
</div>';
}

add_action( 'wp_head', 'onloader_action_wp_head' );
add_shortcode('onloader', 'onloader_shortcode');

// EOF
