<?php

if (! function_exists('flash')) {
    function flash($message, $level) {
        Session::flash('flash_message', $message);
        Session::flash('flash_message_level', $level);
    }
}