#!/usr/bin/env php
<?php
error_reporting(E_STRICT);
require '../jsmin.php';

$libs = array(
  'dojo',
  'ext',
  'jquery',
  'mootools',
  'yui',
  'utf8-with-bom'
);

foreach ($libs as $lib) {
  echo "Testing $lib ";

  $jsmin_c   = shell_exec(__DIR__ . "/jsmin < libs/$lib.js");
  $jsmin_php = JSMin::minify(file_get_contents(__DIR__ . "/libs/$lib.js"));

  if ($jsmin_c === $jsmin_php) {
    echo "[PASS]\n";
  } else {
    echo "[FAIL]\n";
    echo "==> Output differs between jsmin.c and jsmin.php.\n";
  }
}

echo "Done.\n";
