<?php 

if(!defined('BASE')) define("JS", substr(dirname(__DIR__), strlen($_SERVER['DOCUMENT_ROOT'])));
if(!defined('JS')) define("JS", substr(dirname(__DIR__), strlen($_SERVER['DOCUMENT_ROOT'])) . '/lib/');
if(!defined('PHP')) define("PHP", substr(dirname(__DIR__), strlen($_SERVER['DOCUMENT_ROOT'])) . '/php/');
if(!defined('PAGES')) define("PAGES", substr(dirname(__DIR__), strlen($_SERVER['DOCUMENT_ROOT'])) . '/pages/');
if(!defined('CSS'))define("CSS", substr(dirname(__DIR__), strlen($_SERVER['DOCUMENT_ROOT'])) . '/css/');
if(!defined('ASSETS')) define("ASSETS", substr(dirname(__DIR__), strlen($_SERVER['DOCUMENT_ROOT'])) . '/assets/');

?>