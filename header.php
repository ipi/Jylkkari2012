<?php ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
/*  
    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.

*/
?>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<?php $DEBUG = false ; ?><!-- TURN OFF (false) if NOT needed -->
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>


<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<!--[if IE 6]>
<link rel="stylesheet" type="text/css" media="screen, projection" href="<?php bloginfo('template_url') ?>/lib/styles/ie6.css" />
<![endif]-->

<!--
/* @license
 * MyFonts Webfont Build ID 2376937, 2012-10-03T04:38:12-0400
 * 
 * The fonts listed in this notice are subject to the End User License
 * Agreement(s) entered into by the website owner. All other parties are 
 * explicitly restricted from using the Licensed Webfonts(s).
 * 
 * You may obtain a valid license at the URLs below.
 * 
 * Webfont: Acto Book by DSType
 * URL: http://www.myfonts.com/fonts/dstype/acto/book/
 * 
 * Webfont: Acto Black by DSType
 * URL: http://www.myfonts.com/fonts/dstype/acto/black/
 * 
 * 
 * License: http://www.myfonts.com/viewlicense?type=web&buildid=2376937
 * Licensed pageviews: 10,000
 * Webfonts copyright: Copyright (c) 2010 by Dino dos Santos _DSType. All rights
 * reserved.
 * 
 * © 2012 Bitstream Inc
*/

-->

<link href='http://fonts.googleapis.com/css?family=Candal|Archivo+Black' rel='stylesheet' type='text/css'>

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" type="image/x-icon" />

<script src="http://code.jquery.com/jquery-latest.min.js"></script>

<?php if(!preg_match('/MSIE/',$_SERVER['HTTP_USER_AGENT'])):?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/lib/javascript/jquery/jquery.blend.js"></script>
<?php endif; ?>

<?php if($DEBUG): ?>
<script type="text/javascript"> //Overrides 960.gridder.js defaults

window.gOverride = {
		gColor: 'red',
		gColumns: 24,
		pColor: 'lime',
		gOpacity: 0.30,
		pOpacity: 0.40,
		pHeight: 15,
		pOffset: 1
	}

	
createGridder = function() {
		document.body.appendChild(
			document.createElement('script'))
				.src='<?php bloginfo('template_directory'); ?>/lib/javascript/jquery/grid/960.gridder.js';
	}

</script>

<?php endif; ?>
<?php 
/* fix the account registration braindead css */
remove_action('wp_head', 'wpmu_activate_stylesheet');
 ?>
<?php wp_head(); ?>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#socialwrap a").blend();
            $("#font_sizewrap a").blend({pulse:true, speed:500});
        });
    </script>
    
</head>

<body <?php if($DEBUG) printf('onload="createGridder()"'); ?> >
<!-- Facebook-like-box here-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fi_FI/all.js#xfbml=1&appId=121579801212357";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- <div id="wrap01"> -->
<div id="bg">
    <div id="contentBg">
    </div>
</div>
<div id="bgWrap">
        <div id="headerwrap02">
        <div id="header_left">
            <div id="logo_mask">
                <a href="<?php echo get_option('home'); ?>/" title="<?php bloginfo('name'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/jyllogo9.jpg" alt="<?php bloginfo('name'); ?>" /></a>
            </div>
        </div> 
        <div id="header_right">
        <div>
        	<object style="width:390px;height:235px" >
        		<param name="movie" value="http://static.issuu.com/webembed/viewers/style1/v2/IssuuReader.swf?mode=mini&amp;embedBackground=%23ffffff&amp;backgroundColor=%23222222&amp;documentId=121011120557-f75eb1a01f2441ef935290784f9cd327" />
        		<param name="allowfullscreen" value="true"/><param name="menu" value="false"/>
        		<param name="wmode" value="transparent"/>
        		<embed src="http://static.issuu.com/webembed/viewers/style1/v2/IssuuReader.swf" type="application/x-shockwave-flash" allowfullscreen="true" menu="false" wmode="transparent" style="width:390px;height:200px" flashvars="mode=mini&amp;embedBackground=%23ffffff&amp;backgroundColor=%23222222&amp;documentId=121011120557-f75eb1a01f2441ef935290784f9cd327" />
        	</object>
        </div>
      			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Header') ) : ?><?php endif; ?> 
        </div>
            
        <div id="navigation">
            <div id="top_menu">
            <ul id="top_menu_list">
                <?php wp_nav_menu( array('menu' => 'vaalea' )); ?>
            </ul>
        </div>
        <div id="below_menu">
            <ul id="below_nav">
                <?php wp_nav_menu( array( 'menu' => 'musta' ) ); ?>
            </ul> 
        </div>
        </div>
        </div>
<?php
/* fix the account registration braindead wp-activate.php */
if(defined('ACTIVATE_HEADER')){
    printf('<div id="contentwrap">');
}
?>