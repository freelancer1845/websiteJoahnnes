<?php
require_once (realpath ( dirname ( __FILE__ ) . "/../resources/config.php" ));

require_once (LIBRARY_PATH . "/templateFunctions.php");

/*
 * Now you can handle all your php logic outside of the template
 * file which makes for very clean code!
 */

$setInIndexDotPhp = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus efficitur, augue sed ullamcorper tincidunt, elit elit placerat justo, ut porttitor augue ex ac ante. Sed sit amet pulvinar felis. Phasellus eget elementum magna. Mauris hendrerit sem ut rutrum sodales. Fusce ornare sem non neque viverra vestibulum. Aliquam imperdiet sit amet odio eu sagittis. Vivamus id velit fermentum, sollicitudin nulla vitae, tincidunt mauris. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus et ornare lorem. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis porttitor tellus at lorem semper, in pellentesque lectus egestas. Sed ultricies vehicula tristique.";

// Must pass in variables (as an array) to use in template
$variables = array (
		'setInIndexDotPhp' => $setInIndexDotPhp 
);

renderLayoutWithContentFile ( "home.php", $variables );

?>