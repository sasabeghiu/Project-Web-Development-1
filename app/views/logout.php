<?php
// Unset all of the session variables.
session_start();
session_unset();
session_destroy();
// Redirecting To Home Page
header("Location: /user/login");
