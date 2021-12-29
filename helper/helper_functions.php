<?php

function login($username, $password)
{
    $user = (new User())->getUserByKeyColumn('username', $username);

    if($user && md5($password) == $user->password) {
        return $user;
    }

    return false;
}

function from_snack_to_camel_case($name)
{
    $convertedName = '';

    foreach(explode('_', $name) as $index => $value) 
    {
        if(! $index)
        {
            $convertedName .= $value;
        } else {
            $convertedName .= ucwords($value);
        }
    }

    return $convertedName;
}