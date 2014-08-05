<?php

define('COOKPADURL', 'http://cookpad.com/recipe/');

// get command line input
$cid    = $argv[1];

// file open and make cookpad url

$fp = fopen("../data/".$cid.".html", "w");
$log_fp =fopen("../log/exec_cookpad_crawl.log","a");

$url    = COOKPADURL.$cid;

// get cookpad data
if (!$html_law_data   = @file_get_contents($url)) {
    fwrite($log_fp,"CID $cid error\n");
    exit;
}
$remove_newline_html    = str_replace(array("\r\n","\r","\n"), '', $html_law_data);

// make aut file
fwrite($fp, $remove_newline_html);
fwrite($log_fp,"CID $cid done\n");
fclose($fp);
fclose($log_fp);
