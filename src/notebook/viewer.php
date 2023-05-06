 <div class="container">
            <h2 class="title">Записи</h2>
            <div class="notebook">
                <a href="index.php?p=view&sort=id">Сортировка по айди</a>
                <a href="index.php?p=view&sort=surname">Сортировка по фамилию</a>
                <a href="index.php?p=view&sort=date">Сортировка по дате рождения</a>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Имя</th>
                        <th scope="col">Фамилия</th>
                        <th scope="col">Отчество</th>
                        <th scope="col">Пол</th>
                        <th scope="col">Дата</th>
                        <th scope="col">Телефон</th>
                        <th scope="col">Место проживания</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Комментарий</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        require_once 'User.php';
                        $object->userList();
                    ?>
            </div>
 </div>