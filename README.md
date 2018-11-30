# Lotto
prototyme task

Рабочий прототип на хостинге:
http://swamp.ddns.net:4444/test/test/login.php

Git:
https://github.com/lb256/Lotto

things.list  - текстовый файл с вещественными призами
users.php - массив с пользователями (test:test)

Прототип  весь на одной странице.
работают рулетка и перевод денег в бонусы без перезагрузки страницы. 
Основной класс - Gift

Структура для Yii2 версии:
1. шаблон - Advanced. Frontend - то что в прототипе, Backend - админка. CRUD на типы призов, Предельные суммы, коэффициенты перевода и т.п.
2. база:
    2.1 Таблица Gift c полями   id, user_id, type_id, value, date, status, sourсe.  
      user_id - вн ключ user
      type_id - ключ  id типа приза - thing, money, bonus
      status - состояние приза, например получен, отвергнут, отправлен.
      value - количество для денег и бонусов
      source - источник, например перевод из денег в бонусы 
  
    2.2 Таблица User c данными пользователей и бонусами
    2.3 Таблица Meta c полями   id, var, value, date, status для хранения настроек и констант.
    2.4 Таблица Gift_type c полями   id, name, image  для хранения типов призов
  
