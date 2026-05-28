<?php

if (!function_exists('demoVersion')) {
    function demoVersion() {
        return 'v1.0.0 - Enhanced Package';
    }
}

if (!function_exists('demoDate')) {
    function demoDate() {
        return now()->format('F j, Y g:i A');
    }
}