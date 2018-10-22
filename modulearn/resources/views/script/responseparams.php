<?php

/* 
    Check potential arguments supplied by route
    Creates template variables for those specified
*/

/* ReDirects */

$passthrough = 'redirect=';
$has_passthrough = false;

if(isset($redirect)){
    $passthrough = $passthrough.$redirect;
    $has_passthrough = true;
}

if(!$has_passthrough){
    $passthrough = '';
}

?>