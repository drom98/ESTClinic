<?php 
require_once '../utils.php';
session_start();
if(session_destroy()) {
  header('Location: '.PAGES.'login.php');
}
?>