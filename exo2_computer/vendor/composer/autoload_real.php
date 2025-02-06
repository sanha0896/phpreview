<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitb1d58e37abebaa243d54a4e3f74ebf1e
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitb1d58e37abebaa243d54a4e3f74ebf1e', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitb1d58e37abebaa243d54a4e3f74ebf1e', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitb1d58e37abebaa243d54a4e3f74ebf1e::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
