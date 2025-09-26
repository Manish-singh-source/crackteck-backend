<?php

// Simple script to run migration
echo "Running migration...\n";
$output = shell_exec('php artisan migrate 2>&1');
echo $output;
