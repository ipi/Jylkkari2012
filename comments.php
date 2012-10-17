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
<?php // Do not delete these lines
    if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        die ('Please do not load this page directly. Thanks!');

    if (!empty($post->post_password)) { // if there's a password
        if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
?>
    <p class="nocomments">Tämä juttu on suojattu salasanalla.</p>

<?php
    return;
        }
    }

    /* This variable is for alternating comment background */
    $oddcomment = 'class="alt" ';
?>

<!-- You can start editing here. -->

<?php if ($comments) : ?>
    <ol class="commentlist">
        <?php foreach ($comments as $comment) : ?>
        <li <?php echo $oddcomment; ?>id="comment-<?php comment_ID() ?>">
            <?php echo get_avatar( $comment, 32 ); ?>
            <cite><?php comment_author_link() ?></cite>
            <?php if ($comment->comment_approved == '0') : ?>
            <em>Kommenttisi odottaa tarkistusta.</em>
            <?php endif; ?>
            <br />
            <small class="commentmetadata"><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('d.m.Y') ?> klo. <?php comment_time() ?></a> <?php edit_comment_link('edit','&nbsp;&nbsp;',''); ?></small>
            <?php comment_text() ?>
        </li>
        <?php
            /* Changes every other comment to a different class */
            $oddcomment = ( empty( $oddcomment ) ) ? 'class="alt" ' : '';
        ?>
        <?php endforeach; /* end for each comment */ ?>
    </ol>

 <?php else : // this is displayed if there are no comments so far ?>
 
    <?php if ('open' == $post->comment_status) : ?>
        <!-- If comments are open, but there are no comments. -->

    <?php else : // comments are closed ?>
        <!-- If comments are closed. -->

    <?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>
    <div class="commentstitle">
        <h3 id="respond">Kommentoi</h3>
    </div>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>Sinun pitää <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">kirjautua sisään</a> voidaksesi kommentoida.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Olet kirjautunut sisään käyttäjänä <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Kirjaudu ulos. &raquo;</a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="author"><small>Nimi <?php if ($req) echo "(vaaditaan)"; ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="email"><small>Sähköposti (vaaditaan ei näytetä) <?php if ($req) echo "(vaaditaan)"; ?></small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small>Kotisivu</small></label></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="Lähetä" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
