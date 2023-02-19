<?php 
    spl_autoload_register('autoLoader');

    function autoLoader($className) {
        $path = "classes/";
        $extension = ".php";
        $filename = $path . $className . $extension;

        if (!file_exists($filename)
        ) {
            return false;
        }

        include($path . $className . $extension);
    }
?>