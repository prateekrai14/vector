<?php
if(isset($_POST['submit'])) {
	$search_term = $_POST['search'];
	$dir = "images/"; // your local directory path
	$found = false; // initialize a variable to track if any image files were found

	// Open a directory, and read its contents
	if (is_dir($dir)){
	  if ($dh = opendir($dir)){
	    while (($file = readdir($dh)) !== false){
	    	// search for files that contain the search term
	    	if(strpos($file, $search_term) !== false && (strpos($file, '.jpg') !== false || strpos($file, '.png') !== false)) {
	    		echo "<img src='".$dir.$file."' height='200' width='200'>";
	    		$found = true; // set the found variable to true if an image file is found
	    	}
	    }
	    closedir($dh);
	  }
	}

	// set the found variable to true if no image files were found
	if (!$found) {
		$found = true;
	}
}

// display a message if no image files were found
if (!$found) {
	echo "No image files found.";
}
?>
