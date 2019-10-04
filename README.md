Интструкция:
-----------------

фронтенд: test-sportsoft.loc

бекэнд: test-sportsoft.loc/admin

тестовые пользователи: 

admin/111111 - роль администратора, доступен просмотр всех сообщений обратной связи

user/111111 - доступен просмотр только сообщений отправленых пользователем



Задание:
---------------

1 Развернуть проект с помощью [VirtualBox] (https://www.virtualbox.org/wiki/Downloads) и [Vagrant]
(https://www.vagrantup.com/downloads.html)

2 Проект должен включать PHP 5.6, MySQL, Nginx, Composer, Yii2 и содержать два приложения
(frontend и backend)

3 Frontend

3.1 Регистрация и авторизация пользователей (всё на свое усмотрение, можно использовать
сторонние решения для Yii2 с github)

3.2 На главной странице должна располагаться форма обратной связи, содержащая след. поля ввода:

3.2.1 Имя (минимум 3 символа, никаких знаков, кроме букв, первая буква должна попадать заглавной
в базу)

3.2.2 Фамилия (минимум 3 символа, никаких знаков, кроме букв, первая буква должна попадать
заглавной в базу)

3.2.3 E-mail (Проверка на корректность)

3.2.4 Телефон (маска: "+7 (999) 999-99-99")

3.2.5 Текстовая форма (минимум 100 символов)

3.2.6 Гуглкапча (можно использовать сторонние решения для Yii2 с github)

4 Backend

4.1 Доступ к backend только у авторизованного пользователя

4.2 Страница списка отправленных форм с возможностью фильтрации (и сортировкой [не
обязательно, но будет +]) по полям формы. Привязка отправленной обратной связи по email.

4.3 Страница списка отправленных форм пользователя, который в данный момент авторизован с
возможностью фильтрации (и сортировкой [не обязательно, но будет +]) по полям формы
Все, что не определено – на ваше усмотрение, с готовностью защитить свой выбор в решении
опущенных в описании вопросов.


