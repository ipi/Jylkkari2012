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
<?php get_header(); ?>
<div id="contentwrap">
    <div id="content">
        <?php the_post(); ?>

				<h3 class="page-title"><?php
					printf( __( 'Avainsana: %s', '' ), '<span>' . single_tag_title( '', false ) . '</span>' );
				?></h3>

        <?php rewind_posts(); ?>
        <?php include_once('lib/postloop.php'); ?>
        <?php get_template_part( 'loop', 'tag' ); ?>
    </div>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>