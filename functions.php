<?php
/*
This file is part of Mediajalostamo Default Sandbox theme.

    Mediajalostamo Default Sandbox theme is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    Mediajalostamo Default Sandbox theme is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Mediajalostamo Default Sandbox theme.  If not, see <http://www.gnu.org/licenses/>.

*/
?>
<?php
/* SAMPLE SIDEBAR */
/*
if ( function_exists('register_sidebar') ) {
    register_sidebar(array( 'name'=>'Sample Sidebar',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
}
*/
?>
<?php
if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'Header',
'before_widget' => '<div class="headwidget">',
'after_widget' => '</div><div class="Headwidgetfooter"></div>',
'before_title' => '<h3>',
'after_title' => '</h3>',
));
?>
<?php
if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'Upper Content',
'before_widget' => '<div class="uppercontentblock">',
'after_widget' => '</div><div class="upperblockfooter"></div>',
'before_title' => '<h3>',
'after_title' => '</h3>',
));
?>
<?php
if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'Left first content',
'before_widget' => '<div class="midcontentblock">',
'after_widget' => '</div><div class="midblockfooter"></div>',
'before_title' => '<h3>',
'after_title' => '</h3>',
));
?>
<?php
if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'Right first content',
'before_widget' => '<div class="midcontentblock">',
'after_widget' => '</div><div class="midblockfooter"></div>',
'before_title' => '<h3>',
'after_title' => '</h3>',
));
?>
<?php
if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'Sidebar',
'before_widget' => '<div class="block">',
'after_widget' => '</div><div class="blockfooter"></div>',
'before_title' => '<h3>',
'after_title' => '</h3>',
));
?>
<?php
if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'Home Ad',
'before_widget' => '<div class="contentads">',
'after_widget' => '</div><div class="blockfooter"></div>',
'before_title' => '<h3>',
'after_title' => '</h3>',
));
?>
<?php
if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'Post Ad',
'before_widget' => '<div class="postads">',
'after_widget' => '</div><div class="blockfooter"></div>',
'before_title' => '<h3>',
'after_title' => '</h3>',
));
?>
<?php
add_editor_style();
?>
<?php
/* Arkisto template stuff*/

function arkistoFlushRules() {
	global $wp_rewrite;
   	$wp_rewrite->flush_rules();

}
add_action('init', 'arkistoFlushRules');

function addArkistoQueryVars($vars){
    $vars[] = 'arkistoyear';
    $vars[] = 'arkistoissue';
    return $vars;
}

function addArkistoRewriteRules($wp_rewrite){
		$new_rules = array('regions/(.*)/(.*)/(.*)' => 'index.php?pagename=arkisto&arkistoyear='.
		$wp_rewrite->preg_index(1).'&arkistoissue='.
		$wp_rewrite->preg_index(2));
		
		$wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}

	//$wp_rewrite->flush_rules();
	add_filter('query_vars', 'addArkistoQueryVars');
//add_filter('init', 'addArkistoRewriteRules');
	add_action('generate_rewrite_rules', 'addArkistoRewriteRules');
/* end of arkisto template stuff*/
?>
<?php
add_action( 'after_setup_theme', 'sandbox_setup' );
if ( ! function_exists('sandbox_setup') ):
function sandbox_setup() {
add_theme_support( 'post-thumbnails' );
add_theme_support( 'nav-menus' );
}
endif;
?>
<?php
add_filter('the_author', 'check_noname_author');
    function check_noname_author($author){
       $writer = get_post_custom_values('Kirjoittaja');
       if(isset($writer[0]))
            return $writer[0];
    
       return $author;
    }

?>
<?php
/* fix key input in creating account */
function suomenlehdisto_activate_header(){
    define('ACTIVATE_HEADER','1');
}

add_action('activate_header', 'suomenlehdisto_activate_header');
?>
<?php
    include_once(dirname(__FILE__).'/lib/nonameaddon.php');
?>