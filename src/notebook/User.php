<?php

class User // Создание объекта с данными из формы
{
    public $conn, $surname, $firstName, $lastName, $gender, $date, $phone, $location, $email, $comment;

    public function __construct($surname, $firstName, $lastName, $gender, $date, $phone, $location, $email, $comment)
    {
        $this->surname = $surname;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->gender = $gender;
        $this->date = $date;
        $this->phone = $phone;
        $this->location = $location;
        $this->email = $email ;
        $this->comment = $comment;
        $this->conn = new mysqli('localhost', 'root', '', "php");
        if  ($this->conn->connect_error) {
            die("connection failed " . $this->conn->connect_error);
        }
    }

    public function userList()
    {
        $connect = new mysqli('localhost', 'root', '', "php");

        if (isset($_GET['pag'])) {
            $pag = $_GET['pag'];
        } else {
            $pag = 0;
        }

        $pages = 3;
        $offset = $pag * $pages;
        $pages_sql = "SELECT COUNT(*) FROM notebook";
        $res = $connect->query($pages_sql);
        $total_rows = mysqli_fetch_array($res)[0];
        $total_pages = ceil($total_rows / $pages);

        switch ($_GET['sort'])
        {
            case 'surname':
                $sql = "SELECT * FROM `notebook` ORDER BY `surname` ASC LIMIT $offset, $pages";
                $res = $connect->query($sql);

                if ($res->num_rows > 0) {
                    while ($row = $res->fetch_assoc()) {
                        echo "<tr>
                                <th scope='row'>{$row['id']}</th>
                                <td>{$row['firstName']}</td>
                                <td>{$row['surname']}</td>
                                <td>{$row['lastName']}</td>
                                <td>{$row['gender']}</td>
                                <td>{$row['date']}</td>
                                <td>{$row['phone']}</td>
                                <td>{$row['location']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['comment']}</td>
                            </tr>";
                    }
                }
                echo "</br>";
                for ($p = 0; $p <= $total_pages; $p++) {
                    echo "<div class='page'>
                            <a href='index.php?p=view&sort=surname&pag=$p'>$p</a>
                          </div>";
                }
                break;
            case 'id':
                $sql = "SELECT * FROM `notebook` ORDER BY `id` DESC LIMIT $offset, $pages";
                $res = $connect->query($sql);

                if ($res->num_rows > 0) {
                    while ($row = $res->fetch_assoc()) {
                        echo "<tr>
                                <th scope='row'>{$row['id']}</th>
                                <td>{$row['firstName']}</td>
                                <td>{$row['surname']}</td>
                                <td>{$row['lastName']}</td>
                                <td>{$row['gender']}</td>
                                <td>{$row['date']}</td>
                                <td>{$row['phone']}</td>
                                <td>{$row['location']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['comment']}</td>
                            </tr>";
                    }
                }
                echo "</br>";
                for ($p = 0; $p <= $total_pages; $p++) {
                    echo "<div class='page'>
                            <a href='index.php?p=view&sort=surname&pag=$p'>$p</a>
                          </div>";
                }
                break;
            case 'date':
                $sql = "SELECT * FROM `notebook` ORDER BY `date` ASC LIMIT $offset, $pages";
                $res = $connect->query($sql);

                if ($res->num_rows > 0) {
                    while ($row = $res->fetch_assoc()) {
                        echo "<tr>
                                <th scope='row'>{$row['id']}</th>
                                <td>{$row['firstName']}</td>
                                <td>{$row['surname']}</td>
                                <td>{$row['lastName']}</td>
                                <td>{$row['gender']}</td>
                                <td>{$row['date']}</td>
                                <td>{$row['phone']}</td>
                                <td>{$row['location']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['comment']}</td>
                            </tr>";
                    }
                }
                echo "</br>";
                for ($p = 0; $p <= $total_pages; $p++) {
                    echo "<div class='page'>
                            <a href='index.php?p=view&sort=surname&pag=$p'>".($p+1)."</a>
                          </div>";
                }
                break;
            default:
                $sql = "SELECT * FROM notebook";
                $res = $connect->query($sql);

                if ($res->num_rows > 0) {
                    while ($row = $res->fetch_assoc()) {
                        echo "<tr>
                            <th scope='row'>{$row['id']}</th>
                            <td>{$row['firstName']}</td>
                            <td>{$row['surname']}</td>
                            <td>{$row['lastName']}</td>
                            <td>{$row['gender']}</td>
                            <td>{$row['date']}</td>
                            <td>{$row['phone']}</td>
                            <td>{$row['location']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['comment']}</td>
                        </tr>";
                    }
                }

        }
    }

    public function addUser()
    {
        $sql = "INSERT INTO notebook (surname, firstName, lastName, gender, date, phone, location, email, comment)
                VALUES ('$this->surname', '$this->firstName', '$this->lastName', '$this->gender', '$this->date', '$this->phone', '$this->location', '$this->email', '$this->comment')";
        $this->conn->query($sql);
    }

    public function deleteUser()
    {
        $connect = new mysqli('localhost', 'root', '', "php");

        $sql = "SELECT * FROM notebook";
        $res = $connect->query($sql);

        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                echo "<tr>
                        <th scope='row'><a href='index.php?p=delete&delete={$row['id']}' class='delete-link'>{$row['id']}</a></th>
                        <td><a href='index.php?p=delete&delete={$row['id']}' class='delete-link'>{$row['firstName']}</a></td>
                        <td><a href='index.php?p=delete&delete={$row['id']}' class='delete-link'>{$row['surname']}</a></td>
                        <td><a href='index.php?p=delete&delete={$row['id']}' class='delete-link'>{$row['lastName']}</a></td>
                    </tr>";

                if (isset($_GET['delete'])) {
                    $sql = "DELETE FROM notebook WHERE id={$_GET['delete']}";
                    $this->conn->query($sql);

                    header("Location: index.php?p=delete");
                }
            }
        }
        echo $_GET['delete'];
    }

    public function editUser()
    {
        $connect = new mysqli('localhost', 'root', '', "php");

        $sql = "SELECT * FROM `notebook` ORDER BY `surname` ASC";
        $res = $connect->query($sql);

        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                echo "<tr>
                        <th scope='row'><a href='index.php?p=edit&edit={$row['id']}' class='delete-link'>{$row['id']}</a></th>
                        <td><a href='index.php?p=edit&edit={$row['id']}' class='delete-link'>{$row['firstName']}</a></td>
                        <td><a href='index.php?p=edit&edit={$row['id']}' class='delete-link'>{$row['surname']}</a></td>
                    </tr>";
                }
        }

        if (empty($_GET['edit'])) {
            echo '<div class="php-code">
                        <form action="index.php?p=edit" name="form_add" method="post">
                            <div class="column">
                                <div class="add">
                                    <label>Фамилия</label> <input type="text" name="surname" placeholder="Фамилия" value="">
                                </div>
                                <div class="add">
                                    <label>Имя</label> <input type="text" name="name" placeholder="Имя" value="">
                                </div>
                                <div class="add">
                                    <label>Отчество</label> <input type="text" name="lastname" placeholder="Отчество" value="">
                                </div>
                                <div class="add">
                                    <label>Пол</label>
                                    <select name="gender">
                                        <option value="мужской">мужской</option>
                                        <option value="женский">женский</option>
                                    </select>
                                </div>
                                <div class="add">
                                    <label>Дата рождения</label> <input type="date" name="date" value="">
                                </div>
                                <div class="add">
                                    <label>Телефон</label> <input type="text" name="phone" placeholder="Телефон" value="">
                                </div>
                                <div class="add">
                                    <label>Адрес</label> <input type="text" name="location" placeholder="Адрес" value="">
                                </div>
                                <div class="add">
                                    <label>Email</label> <input type="email" name="email" placeholder="Email" value="">
                                </div>
                                <div class="add">
                                    <label>Комментарий</label> <textarea name="comment" placeholder="Краткий комментарий"></textarea>
                                </div>

                                <button type="submit" value="" name="button" class="form-btn">Добавить</button>
                            </div>
                        </form>
             </div>';
        } else {
            $request = 'SELECT * FROM notebook WHERE id=' . $_GET["edit"];
            $res = $connect->query($request);
            $data = $res->fetch_assoc();
            $gender = '';
            if ($data['gender'] == 'мужской') {
                $gender = 'женский';
            } else {
                $gender = 'мужской';
            }
            echo "<div class='php-code'>
                        <form action='index.php?p=edit' name='form_add' method='post'>
                            <div class='column'>
                                <div class='add'>
                                    <label>Фамилия</label> <input type='text' name='surname' placeholder='Фамилия' value='{$data['surname']}'>
                                </div>
                                <div class='add'>
                                    <label>Имя</label> <input type='text' name='name' placeholder='Имя' value='{$data['firstName']}'>
                                </div>
                                <div class='add'>
                                    <label>Отчество</label> <input type='text' name='lastname' placeholder='Отчество' value='{$data["lastName"]}'>
                                </div>
                                <div class='add'>
                                    <label>Пол</label>
                                    <select name='gender'>
                                        <option value='{$data['gender']}'>{$data['gender']}</option>
                                        <option value='$gender'>$gender</option>
                                    </select>
                                </div>
                                <div class='add'>
                                    <label>Дата рождения</label> <input type='date' name='date' value='{$data["date"]}'>
                                </div>
                                <div class='add'>
                                    <label>Телефон</label> <input type='text' name='phone' placeholder='Телефон' value='{$data["phone"]}'>
                                </div>
                                <div class='add'>
                                    <label>Адрес</label> <input type='text' name='location' placeholder='Адрес' value='{$data["location"]}'>
                                </div>
                                <div class='add'>
                                    <label>Email</label> <input type='email' name='email' placeholder='Email' value='{$data["email"]}'>
                                </div>
                                <div class='add'>
                                    <label>Комментарий</label> <textarea name='comment' placeholder='Краткий комментарий'>{$data["comment"]}</textarea>
                                </div>
                                <div class='hide'>
                                    <label>Email</label> <input type='text' name='id' placeholder='Email' value='{$_GET["edit"]}'>
                                </div>

                                <button type='submit' name='button' class='form-btn'>Добавить</button>
                            </div>
                        </form>

             </div>";
        }

    }

    public function edit($surname, $firstName, $lastName, $gender, $date, $phone, $location, $email, $comment, $id)
    {
        $connect = new mysqli('localhost', 'root', '', "php");

        $sql = "UPDATE notebook SET surname='$surname',firstName='$firstName',lastName='$lastName',gender='$gender',date='$date',phone='$phone',location='$location',email='$email',comment='$comment' WHERE id='$id'";

        $connect->query($sql);
    }

    public function pagination()
    {
        if (isset($_GET['pag'])) {
            $pag = $_GET['pag'];
        } else {
            $pag = 0;
        }

        $pages = 10;
        $offset = $pag * $pages;
        $pages_sql = "SELECT COUNT(*) FROM notebook";
        $res = $this->conn->query($pages_sql);
        $total_rows = mysqli_fetch_array($res)[0];
        $total_pages = ceil($total_rows / $pages);
        $sql = "SELECT * FROM notebook LIMIT $offset, $pages";
        $res_data = $this->conn->query($sql);
        while($row = mysqli_fetch_array($res_data)){
            echo $row['surname'] . '</br>';
        }
    }
}

$object = new User('Ильич', 'Петр', 'Курагин', 'Мужской', '24-24-2022', 'awdwadawd', 'asd', 'asd', 'Круто!');