Добавление ключей:
ALTER TABLE `users` ADD INDEX `gender_birthdate` (`gender`, `birth_date`);
ALTER TABLE `phone_numbers` ADD CONSTRAINT `FK_phone_numbers_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

Запрос:
SELECT u.name, 
       Count(pn.id) 
FROM   users u 
       left join phone_numbers pn ON u.id = pn.user_id 
WHERE  u.birth_date BETWEEN Unix_timestamp(Date_sub(Curdate(), interval 22 year) ) AND 
                            Unix_timestamp(Date_sub(Curdate(), interval 18 year)) 
       AND u.gender = 2 
GROUP  BY u.id; 