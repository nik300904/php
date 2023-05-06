<form action="index.php?p=add" name="form_add" method="post">
    <div class="column">
        <div class="add">
            <label>Фамилия</label> <input type="text" name="surname" placeholder="Фамилия">
        </div>
        <div class="add">
            <label>Имя</label> <input type="text" name="name" placeholder="Имя">
        </div>
        <div class="add">
            <label>Отчество</label> <input type="text" name="lastname" placeholder="Отчество">
        </div>
        <div class="add">
            <label>Пол</label>
            <select name="gender">
                <option value="мужской">мужской</option>
                <option value="женский">женский</option>
            </select>
        </div>
        <div class="add">
            <label>Дата рождения</label> <input type="date" name="date">
        </div>
        <div class="add">
            <label>Телефон</label> <input type="text" name="phone" placeholder="Телефон">
        </div>
        <div class="add">
            <label>Адрес</label> <input type="text" name="location" placeholder="Адрес">
        </div>
        <div class="add">
            <label>Email</label> <input type="email" name="email" placeholder="Email">
        </div>
        <div class="add">
            <label>Комментарий</label> <textarea name="comment" placeholder="Краткий комментарий"></textarea>
        </div>

        <button type="submit" name="button" class="form-btn">Добавить</button>
    </div>
</form>
<?php

require_once "User.php";

if (isset($_POST['surname']))
{
    $newtTable = new User(trim($_POST['surname']), trim($_POST['name']), trim($_POST['lastname']), trim($_POST['gender']), trim($_POST['date']), trim($_POST['phone']), trim($_POST['location']), trim($_POST['email']), trim($_POST['comment']));
    $newtTable->addUser();

    header("Location: index.php");
}
