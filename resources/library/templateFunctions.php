<?php
require_once (realpath ( dirname ( __FILE__ ) . "/../config.php" ));
function renderLayoutWithContentFile($contentFile, $variables = array()) {
	$contentFileFullPath = TEMPLATES_PATH . "/" . $contentFile;
	
	// making sure passed in variables are in scope of the template
	// each key in the $variables array will become a variable
	if (count ( $variables ) > 0) {
		foreach ( $variables as $key => $value ) {
			if (strlen ( $key ) > 0) {
				${$key} = $value;
			}
		}
	}
	
	require_once (TEMPLATES_PATH . "/startup.php");
	
	require_once (TEMPLATES_PATH . "/header.php");
	
	require_once (TEMPLATES_PATH . "/gallery.php");
	
	echo "<div class=\"row\">\n";
	
	echo "\t<div class=\"col-12 col-12-m\">\n";
	
	echo "\t\t<div id=\"content\">\n";
	
	if (file_exists ( $contentFileFullPath )) {
		require_once ($contentFileFullPath);
	} else {
		/*
		 * If the file isn't found the error can be handled in lots of ways.
		 * In this case we will just include an error template.
		 */
		require_once (TEMPLATES_PATH . "/error.php");
	}
	
	// close content div
	echo "\t\t</div>\n";
	
	// close col content div
	echo "\t</div>\n";
	
	// For use of sidebar
	// echo "\t<div class=\"col-3 col-3-m\">\n";
	
	// echo "\t\t<div id=\"sidebar\">\n";
	
	// require_once (TEMPLATES_PATH . "/sidebar.php");
	
	// // close sidebar div
	// echo "\t\t</div>\n";
	
	// // close col sidebar div
	// echo "\t</div>\n";
	
	require_once (TEMPLATES_PATH . "/footer.php");
}
?>