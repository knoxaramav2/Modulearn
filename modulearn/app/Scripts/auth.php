<?php

function getAuthUser($requireAdmin){
    $user = Session::get('user');
    Log::info($user);

    if (!isset($user))
        return;
    
    if ($requireAdmin && !$user->isAdmin)
        return;

    return $user;
}