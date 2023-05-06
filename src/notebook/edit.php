<div class="container">
    <h2 class="title">Записи</h2>
    <div class="notebook">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Фамилия</th>
            </tr>
            </thead>
            <tbody>
            <?php
                require_once 'User.php';
                $object->editUser();
                $object->edit(trim($_POST['surname']), trim($_POST['name']), trim($_POST['lastname']), trim($_POST['gender']), trim($_POST['date']), trim($_POST['phone']), trim($_POST['location']), trim($_POST['email']), trim($_POST['comment']), $_POST['id']);
            ?>
            </tbody>
        </table>
    </div>
</div>