<?php

# detect if code is running on localhost or a live server

if($_SERVER['SERVER_NAME'] == 'localhost') {
        #project directive.
    define("PROJECT_DIR", "/my-new-site/");
    define("IMAGES_DIR", PROJECT_DIR . "images/");
} else {
        #live site
    define("PROJECT_DIR", "/");
    define("IMAGES_DIR", PROJECT_DIR . "images/");
}