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
        <div class="title">
            <h3>Tulokset haulle: "<?php the_search_query(); ?>"</h3>
        </div>
            <?php include_once('lib/postloop.php'); ?>
        <div id="pagenav">
            <?php next_posts_link('<span class="forward">Vanhemmat &raquo;</span>') ?>
            <?php previous_posts_link('<span class="backward">&laquo; Uudemmat</span>') ?>
        </div>
    </div>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
