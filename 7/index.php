<?php

function PathFilter($str) {
    
    $str = preg_replace("/(:\/\/)|\\\\/", "", $str);
    while ( str_contains($str, "../") ) {
        $str = str_replace("../", "", $str);
    }

    return $str;
}


if ( isset($_GET['file']) && $_GET['file'] != "" ) { 
    $file =  htmlspecialchars( PathFilter($_GET['file']) );

} else {
    $file = "index.html";
}


$content = file_get_contents( $file );

if ( strlen($content) <= 0 ) {
    echo  "Could not find file: $file";
    die;
}

echo $content;

?> 