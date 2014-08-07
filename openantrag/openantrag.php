<?php
wp_enqueue_style( "pt-openantrag", plugin_dir_url(__FILE__)."style.css" );


class PT_openantrag {


	
	static public function shortcode_table($atts) {
		
		if (isset($atts['errmsg'])) $errmsg = $atts['errmsg']; else $errmsg = "Die Liste der OpenAnträge konnte nicht geladen werden.";
		
		if (isset($atts['key']) && (trim($atts['key']) != "")) $key = $atts['key']; else return "";
		if (isset($atts['count']) && is_numeric($atts['count']) && ($atts['count'] > 0)) {
			$count = $atts['count'];
		} else {
			$count = 93;
		}
		
		
		
		$data = @file_get_contents("http://openantrag.de/api/proposal/".$key."/GetTop/".$count."?format=json");
		if (!$data) {
			return "<p>".$errmsg."</p>";
		}
		$data = JSON_decode($data);
		if ($data) {
			ob_start();
			include("shortcode/table.php");
			$content = ob_get_contents();
			ob_end_clean();
			
			return $content;
		} else {
			return "<p>".$errmsg."</p>";
		}
			
	}
	


	static public function adminmenu() {
		include(plugin_dir_path(__FILE__).'admin.php');
	}

	
}

add_shortcode( "pt-openantrag-table", array("PT_openantrag", "shortcode_table"));
?>