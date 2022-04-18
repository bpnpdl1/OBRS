<?php
$user = where('users', 'email', '=', $email, false);

if ($user) {
    setError("Email has already been taken!");
    redirect('signup.php');
}