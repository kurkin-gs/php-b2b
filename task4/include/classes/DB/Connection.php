<?php

namespace DB;

class Connection {

    /**
     * Объект PDO для соединения с БД
     * @var \PDO $conn
     */
    public $conn;

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
     * Логи
     * @var array $logs
     */
    public $logs = array();

    /**
     * Конструктор
     * 
     * Устанавливает соединение с БД
     * 
     * @param \DB\Configs\Config $config
     * @return void
     */
    public function __construct(Configs\Config $config) {
        $this->logs[] = "Попытка установки соединения.";

        $this->host = $config->getHost();
        $this->user = $config->getUser();
        $this->password = $config->getPassword();
        $this->db_name = $config->getDBname();

        try {
            $this->conn = new \PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name . ';charset=utf8', $this->user, $this->password);
            $this->logs[] = "Соединение с базой данных установлено.";
        } catch (PDOException $e) {
            $this->logs[] = "Произошла ошибка при соединении с базой данных.";
        }
    }

}
