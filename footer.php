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
/* fix the account registration braindead wp-activate.php */
if(defined('ACTIVATE_HEADER')){
    get_sidebar();
    printf('</div>');
}
?>
<div id="footerwrap">
    <div id="bar"></div>
    <div id="footer">
        <div id="linkage">
            <div id="linkage_pwrap">
            <span> &copy; 2008–2012 &middot; Jyväskylän ylioppilaslehti &middot; Wordpress-teema: Jylkkärin toimitus
            </div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
<!-- </div> --><!-- END WRAP01 -->
</body>
</html>
