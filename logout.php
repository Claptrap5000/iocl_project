<?php
// Logout page in PHP
session_start();
session_destroy();
header("Location: index.html");
?>