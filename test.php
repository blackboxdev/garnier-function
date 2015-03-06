<?php
include('core/core.php');

$user = User::find(1);
echo $user->email;
?>