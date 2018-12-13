<?php

class Autoloader {

    /**
     * Сущность автозагрузчика
     * @var \Autoloader $loader
     */
    public static $loader;

    /**
     * Инициализация автозагрузчика классов
     * @return \Autoloader
     */
    public static function init() {
        if (self::$loader == NULL)
            self::$loader = new self();

        return self::$loader;
    }

    /**
     * Конструктор
     * @return void
     */
    public function __construct() {
        spl_autoload_register(array($this, 'controller'));
    }

    /**
     * Загрузка классов
     * @param string $className
     * @return void
     */
    public function controller($className) {
        $className = preg_replace('#_#', '\\', $className);

        set_include_path("include/classes/");
        spl_autoload_extensions('.php');
        spl_autoload($className);
    }

}
