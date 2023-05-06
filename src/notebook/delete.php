<div class="container">
    <h2 class="title">Записи</h2>
    <div class="notebook">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Фамилия</th>
                <th scope="col">Отчество</th>
            </tr>
            </thead>
            <tbody>
            <?php
            require_once 'User.php';
            $object->deleteUser();
            ?>
            </tbody>
        </table>
    </div>
</div>