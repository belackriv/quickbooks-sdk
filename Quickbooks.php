<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . 'config.php');

/**
 * This class is required to setup prerequisites for Quickbooks SDK.
 */

class Quickbooks
{
    /**
     * This method actually doesn't do anything, but forces the load of
     * configuration which setups up some nessesary stuff.
     */
    public static function begin()
    {
    	spl_autoload_register(function ($name) {
            $loadableClasses = [
                'OAuthRequestValidator' => 'Core/ServiceContext.php',
            ];
            if (array_key_exists($name, $loadableClasses)) {
                include_once(PATH_SDK_ROOT . $loadableClasses[$name]);
            } else if (file_exists(PATH_SDK_ROOT . 'Core/' . $name . '.php')) {
                include_once(PATH_SDK_ROOT . 'Core/' . $name . '.php');
            } else if (file_exists(PATH_SDK_ROOT . 'Core/RestCalls/' . $name . '.php')) {
                include_once(PATH_SDK_ROOT . 'Core/RestCalls/' . $name . '.php');
            } else if (file_exists(PATH_SDK_ROOT . 'DataService/' . $name . '.php')) {
                include_once(PATH_SDK_ROOT . 'DataService/' . $name . '.php');
            }
        });
    }
}