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
        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
        <div class="singletitle">
            <h3><?php the_title() ?></h3>
        </div>
        <div id="postcontent">
            <?php the_content(''); ?>
        </div>
        <?php endwhile; else: ?>
        <?php endif; ?>
    </div>
    <?php get_sidebar(); ?> 
</div>
<?php get_footer(); ?>
