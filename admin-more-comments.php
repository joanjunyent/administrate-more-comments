<?php
/*
Plugin Name: Administrate more comments
Plugin Script: admin-more-comments.php
Plugin URI: http://projectes.junyent.org/administrate-more-comments/
Description: A WordPress plugin designed to set-up the number of comments per page shown in the admin area. 
Version: 0.2.1
License: GPLv2 or later
Author: Joan Junyent
Author URI: http://junyent.org/
Contributors: jjunyent
Donate link: http://projectes.junyent.org/


=== RELEASE NOTES ===
2013-06-06 - v.0.2.1 - Plugin metadata update. This plugin will be no longer updated.
2009-01-11 - v0.1.1 -	Typo fixing	
2009-01-04 - v0.1 - first version. Code taken from anieto2k and Ayuda Wordpress
			http://www.anieto2k.com/2008/12/22/cambia-la-cantidad-de-comentarios-del-panel-de-administracion/
			http://ayudawordpress.com/como-cambiar-la-cantidad-de-comentarios-mostrados-en-admin/
	

*/

/*
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
Online: http://www.gnu.org/licenses/gpl.txt
*/



// admin more comments parameters will be saved in the database
function amc_set_options() {
	// Change 100 to the desired vaule of comments shown per page
	add_option('amc_number_comments', '100');
}
function amc_unset_options() {
	$numComments = get_option('amc_number_comments');
	delete_option('amc_number_comments', $numComments);
}
register_activation_hook(__FILE__,'amc_set_options');
register_deactivation_hook(__FILE__,'amc_unset_options');



function amc_comments_per_page(){ 
	$numComments = get_option('amc_number_comments');
	return $numComments;
}

add_filter("comments_per_page", "amc_comments_per_page");



?>
