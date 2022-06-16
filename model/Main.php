<?php

use App\model\user\User;

$user = new User();
echo $user->findById(1);
