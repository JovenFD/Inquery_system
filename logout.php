<?php
session_start();

unset($_SESSION['user_id']);
unset($_SESSION['loggedin']);

header('Location: index.php');