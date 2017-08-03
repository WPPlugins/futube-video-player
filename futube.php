<?php

/*
	Plugin Name: FuTube Video
	Plugin URI: http://www.fubra.com/video/
	Version: 0.1.1
	Description: Insert YouTube videos using either the FuTube UI or standard YouTube Chrome.
	Author: Fubra Limited
	Author URI: http://www.fubra.com/
*/

#
#  futube.php
#
#  Created by Steve Whiteley on 14-08-2009.
#  Copyright 2009, Fubra Limited. All rights reserved.
#
#  This program is free software: you can redistribute it and/or modify
#  it under the terms of the GNU General Public License as published by
#  the Free Software Foundation, either version 3 of the License, or
#  (at your option) any later version.
#
#  You may obtain a copy of the License at:
#  http://www.gnu.org/licenses/gpl-3.0.txt
#
#  This program is distributed in the hope that it will be useful,
#  but WITHOUT ANY WARRANTY; without even the implied warranty of
#  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#  GNU General Public License for more details.

	// Custom FuTube inclusion...
function fubra_video_handler($attrs) {
	$a = shortcode_atts(array(
		'align' => 'left',
		'author' => 'by Fubra Limited',
		'bgcolor' => 'false',
		'color' => 'false',
		'hd' => 'true',
		'height' => 320,
		'id' => 'fubravideo_'.rand(),
		'image' => 'false',
		'skin' => 'http://video.fubra.com/skins/default.swf?nocache='.time(),
		'title' => 'FuTube Video',
		'width' => 425,
		'video' => false
	), $attrs);
	return 	'<object id="'.$a['id'].'" name="'.$a['id'].'" data="'.$a['skin'].'" width="'.$a['width'].'" height="'.$a['height'].'" type="application/x-shockwave-flash">'.
	   		'	<param name="allowFullScreen" value="true" /></param>'.
			'	<param name="allowScriptAccess" value="always" /></param>'.
	    	'	<param name="menu" value="false"></param>'.
	    	'	<param name="scale" value="noscale"></param>'.
			'	<param name="wmode" value="window"></param>'.
			'	<param name="bgcolor" value="'.$a['bgcolor'].'"></param>'.
			'	<param name="flashvars" value="'.http_build_query($a).'"></param>'.
			'	<param name="movie" value="'.$a['skin'].'"></param>'.
			'</object>';
}

	// Standard YouTube inclusion...
function fubra_youtube_handler($attrs) {
	$a = shortcode_atts(array(
		'height' => 320,
		'skin' => 'http://www.youtube.com/v/',
		'width' => 425,
		'video' => false
	), $attrs);
	return 	'<object data="'.$a['skin'].$a['video'].'" width="'.$a['width'].'" height="'.$a['height'].'" type="application/x-shockwave-flash">'.
			'	<param name="wmode" value="transparent"></param>'.
			'	<param name="movie" value="'.$a['skin'].$a['video'].'"></param>'.
			'</object>';
}

wp_enqueue_script('futube', 'http://video.fubra.com/js/controls.futube.js');
add_shortcode('futube', 'fubra_video_handler');
add_shortcode('youtube', 'fubra_youtube_handler');

