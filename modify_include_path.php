<?php

// You can check the PHP include path settings by using the get_include_path() function. 
// Ensures the src directory is included in the PHP include path
$includePath = __DIR__ . '/src' . PATH_SEPARATOR . get_include_path();

set_include_path($includePath);

?>

