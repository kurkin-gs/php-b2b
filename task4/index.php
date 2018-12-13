<?php

require_once($_SERVER["DOCUMENT_ROOT"] . "/include/init.php");

//  1. Соединение с БД находится в цикле, и сам запрос тоже, вместо цикла для запроса нужно использовать функцию IN.
//  2. Данные для соединения с БД указываются в конкретной функции, функционал соединения с БД должен быть отделен от какой-то конкретной функции. Соединение с БД можно определить в глобальной переменной в файле init.php, с которого будет идти загрузка проекта.
//  3. Входные параметры не фильтруются, открывая возможность sql-инъекций.
//  4. В запросе исходной функции load_users_data выходной массив состоит только из двух полей: id и name, в этом случан нет смысла выбирать все поля через *, но судя по назначению функции в выходной массив должны попадать все поля из таблицы.


/**
 * Получение информации о пользователях
 * 
 * $param array $user_ids
 * $return array
 */
function load_users_data(array $user_ids) {
    global $db;
    $result = false;
    $user_ids = array_unique(array_map('intval', array_filter($user_ids))); //фильтрация параметров, исключающая инъекции
    $stmt = $db->conn->query("SELECT * FROM users WHERE id IN (" . implode(",", $user_ids) . ")");
    if ($stmt) {
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $result;
}

$users = load_users_data(explode(',', @$_GET['user_ids'])); //передача в функции массива вместо строки 
if ($users) {
    foreach ($users as $user) {
        echo "<a href=\"/show_user.php?id={$user["id"]}\">{$user["name"]}</a>" . "<br />";
    }
}
