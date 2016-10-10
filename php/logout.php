<?php
session_start();
?>
<?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();
echo "";
echo "All session variables are now removed, and the session is destroyed.";
 header("Location: https://localhost/home.html");
?>
