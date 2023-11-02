<?php
session_start(); 
  if(isset($_COOKIE['userID'])){
  	setcookie("role", '', time() +1 , "/");
    setcookie("userID", '', time() +1 , "/");
    header('location: ./?pages=user&action=home');
  }
?>