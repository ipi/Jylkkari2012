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
/*
Template Name: SL home
*/
?>
<?php get_header(); ?>
<div id="contentwrap">
    <div id="content">
        <div id="featured">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Upper Content') ) : ?>      
            <?php endif; ?> 
        </div>
        <hr />
        <div class="breakspace01"></div>
        
        <div class="featured_left" id="featured_left_first">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Left first content') ) : ?>      
            <?php endif; ?>

        </div>
        <div class="featured_right" id="featured_right_first">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Right first content') ) : ?>      
            <?php endif; ?>
        </div>

        <div class="breakspace02"></div>

        <div id="homeadblock">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Ad') ) : ?>
        <?php endif; ?>
        </div>
    </div>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>