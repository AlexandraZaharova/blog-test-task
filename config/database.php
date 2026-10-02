<?php
return [
    'host' => getenv('DB_HOST') ?: '127.0.0.1',
    'dbname' => 'blog_test',
    'user' => 'root',
    'password' => getenv('DB_HOST') ? 'root' : '',
];