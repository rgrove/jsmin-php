<?php
error_reporting(E_STRICT);

require '../jsmin.php';
echo JSMin::minify(file_get_contents('prototype.js'));
?>