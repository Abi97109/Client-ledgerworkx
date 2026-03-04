<?php
session_start();

// Destroy session completely
$_SESSION = [];
session_unset();
session_destroy();

// Prevent page caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Start new session for flash message
session_start();
$_SESSION['success'] = "You have been logged out successfully!";

// Redirect safely
header("Location: ../frontend/openinghomepg.html");
exit;
