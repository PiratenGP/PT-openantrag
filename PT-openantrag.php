<?php
/*
Plugin Name: Piraten-Tools / OpenAntrag
Plugin URI: https://github.com/PiratenGP/PT-openantrag
Description: Zeigt Daten der Seite openantrag.de an.
Version: 0.1.1
Author: @stoppegp
Author URI: http://stoppe-gp.de
License: CC-BY-SA 3.0
*/

global $PT_infos;
$PT_infos[] = array(
	'name'		=>		'OpenAntrag',
	'desc'		=>		'Infos tbd',
);

require('mainmenu.php');

if (!function_exists("piratentools_main_menu")) {
	add_action( 'admin_menu', 'piratentools_main_menu');
	function piratentools_main_menu() {
		add_menu_page( "Piraten-Tools", "Piraten-Tools", 0, "piratentools" , "PT_main_menu");
	}
}

add_action( 'admin_menu', 'PT_openantrag_main_menu' );
function PT_openantrag_main_menu() {
	add_submenu_page( "piratentools", "OpenAntrag", "OpenAntrag", "manage_options", "pt_openantrag", array("PT_openantrag", "adminmenu") );
}

require('openantrag/openantrag.php');
?>