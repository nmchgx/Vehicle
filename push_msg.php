<?php
//timeout in seconds
$timeout = 60;

// log start time
$start_time = time();

// get messge from local file
function get_msg(){
    return file_get_contents('msg.txt');
}

// get message
$last_msg = get_msg();

// start the loop
while (true){
    // get current time
    $current_time = time();
    
    // check if we are timed out
    if ($current_time - $start_time > $timeout){
        echo 'timeout! no new message!';
        sleep(10);
    }
    
    // get latest message
    $current_msg = get_msg();
    
    // check if the message has been changed
    if ($last_msg != $current_msg){
        echo "<script>alert('1');</script>";
        break;
    }
    // sleep 1 sec
    sleep(1);
}