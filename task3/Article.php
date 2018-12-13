<?php

class Article {

    /**
     * Автор статьи
     * 
     * @var User
     */
    private $user;


    /**
     * Название статьи
     * 
     * @var string
     */
    private $title;

    /**
     * Содержание статьи
     * 
     * @var string
     */
    private $text;
    
    /**
     * Установка названия статьи
     * 
     * @param string $title
     * @return void
     */
    public function setTitle(string $title) {
        
    }

    /**
     * Получение названия статьи
     * 
     * @return string
     */
    public function getTitle() {
        
    }

    /**
     * Установка пользователя
     * 
     * @param \User $user
     * @return void
     */
    public function setUser(User $user) {
        
    }

    /**
     * Получение пользователя
     *      
     * @return \User
     */
    public function getUser() {
        
    }

}
