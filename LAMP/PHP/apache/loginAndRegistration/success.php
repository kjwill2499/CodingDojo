<?php
session_start();
echo "<p>" . $_SESSION['message'] . "</p>";
echo "<P>Welcome user {$_SESSION['user_id']}</p>";
?>