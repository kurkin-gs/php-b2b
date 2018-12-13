<?php

namespace DB\Configs;

abstract class Config {

    /**
     * Хост БД
     * @var string $host
     */
    protected $host;

    /**
     * Пользователь БД
     * @var string $user
     */
    protected $user;

    /**
     * Пароль для подключения
     * @var string $password
     */
    protected $password;

    /**
     * Имя базы данных
     * @var string $db_name
     */
    protected $db_name;

    /**
     * Получить хост
     * @return string
     */
    public function getHost() {
        return $this->host;
    }

    /**
     * Получить пользователя
     * @return string
     */
    public function getUser() {
        return $this->user;
    }

    /**
     * Получить пароль
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * Получить название базы
     * @return string
     */
    public function getDBname() {
        return $this->db_name;
    }

}
