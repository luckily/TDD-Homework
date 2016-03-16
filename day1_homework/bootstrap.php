<?php


function autoload($className)
{
    $className = ltrim($className, '\\');
    $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $fileName .= '.php';

    if(is_file($fileName)) {
        include dirname(__FILE__) . DIRECTORY_SEPARATOR . $fileName;
    }

}

spl_autoload_register('autoload');