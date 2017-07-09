<?php
/*
 * PHPimage slideshow - auto version - PHP5
 */
// set the absolute path to the directory containing the images
define ( 'IMGDIR', $_SERVER ['DOCUMENT_ROOT'] . '/WebsiteJohannes/public_html/img/content/slideshow/' );
// same but for www
define ( 'WEBIMGDIR', '/WebsiteJohannes/public_html/img/content/slideshow/' );
// set session name for slideshow "cookie"
define ( 'SS_SESSNAME', 'slideshow_sess' );
// global error variable
$err = '';
// start img session
session_name ( SS_SESSNAME );
session_start ();
// init slideshow class
$ss = new slideshow ( $err );
if (($err = $ss->init ()) != '') {
	header ( 'HTTP/1.1 500 Internal Server Error' );
	echo $err;
	exit ();
}
// get image files from directory
$ss->get_images ();
/*
 * slideshow class, can be used stand-alone
 */
class slideshow {
	private $err = NULL;
	public function __construct(&$err) {
		$this->files_arr = array ();
		$this->err = $err;
	}
	public function init() {
		// run actions only if img array session var is empty
		// check if image directory exists
		if (! $this->dir_exists ()) {
			return 'Error retrieving images, missing directory';
		}
		return '';
	}
	public static function get_images() {
		
		// run actions only if img array session var is empty
		if (isset ( $_SESSION ['imgarr'] )) {
		} else {
			if ($dh = opendir ( IMGDIR )) {
				$files_arr = array ();
				while ( false !== ($file = readdir ( $dh )) ) {
					if (preg_match ( '/^.*\.(jpg|jpeg|gif|png)$/i', $file )) {
						$files_arr [] = $file;
					}
				}
				closedir ( $dh );
			}
			$_SESSION ['imgarr'] = $files_arr;
		}
	}
	private function dir_exists() {
		return file_exists ( IMGDIR );
	}
}
?>
<div class="row">
	<div class="col-12 col-m-12">
		<div id="slideshow">
			<?php
			slideshow::get_images ();
			for($i = 0; $i < 4; ++ $i) {
				echo "<div>\n";
				echo "<img src=\"" . WEBIMGDIR . $_SESSION ['imgarr'] [$i] . "\" alt>\n";
				echo "</div>\n";
			}
			echo "<div>\n";
			echo "<img src=\"" . WEBIMGDIR . $_SESSION ['imgarr'] [0] . "\" alt>\n";
			echo "</div>\n";
			?>
		</div>
		
		<script>
				$( document ).ready(function() {
					
					$("#slideshow > div:gt(0)").hide();
					setInterval(function() { 
					  $('#slideshow > div:first')
					    .fadeOut(1000)
					    .next()
					    .fadeIn(1000)
					    .end()
					    .appendTo('#slideshow');
					},  3000);
					
				});
			</script>
	</div>
</div>

