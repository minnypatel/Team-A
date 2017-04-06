<?php

namespace Model\Userdetails;

function read_user($users, $username){
    return $users[$username] ?? false;
    
}

