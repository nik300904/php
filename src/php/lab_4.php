<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Домашняя работа</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/lab_4.css">
</head>
<body>
<header class="header">
    <div class="container container__header">
        <img class="logo" src="https://mospolytech.ru/upload/medialibrary/5fa/Logo_Polytech_rus_main.jpg" alt="logo">
        <p class="title title__header">Домашняя работа</p>
    </div>
</header>
<main class="main">
    <div class="container container__main">
        <h2 class="title title__main">Код PHP</h2>
        <div class="php-code">
            <form class="form" action="lab_4.php" method="post">
                <label class="form-item form-text" for="">Уравнение</label>
                <input class="form-item" type="text" name="equation" placeholder>
                <input class="form-item" type="submit" value="Решить">
                <?php
                function solve($number1, $number2)
                {
                    $answer = $number2 / $number1;
                    return $answer;
                }

                if (strstr($_POST["equation"], '*') and strstr($_POST["equation"], 'x')) {
                    $arr = str_split($_POST["equation"]);
                    $newArr = [];

                    foreach ($arr as $key => $value) {
                        if (is_numeric($value)) {
                            array_push($newArr, $value);
                        } else {
                            array_push($newArr, ' ');
                        }
                    }

                    $string = "";

                    foreach ($newArr as $key => $value) {
                        $string .= $value;
                    }

                    if (is_numeric($newArr[0])) {
                        $num1 = substr($string, 0, strpos($string, ' ')) . PHP_EOL;

                        $num2 = substr($string, strrpos($string, ' ') + 1, strlen($string));

                        $answers = solve($num1, $num2);

                        echo "<div class='answer'>Ответ: x = $answers</div>";
                    } else {
                        $sort = trim($string);

                        $num1 = substr($sort, 0, strpos($sort, ' ')) . PHP_EOL;

                        $num2 = substr($sort, strrpos($sort, ' ') + 1, strlen($sort));

                        $answers = solve($num1, $num2);

                        echo "<div class='answer'>Ответ: x = $answers</div>";
                    }
                }
                ?>
            </form>
        </div>
    </div>
</main>
<footer class="footer">
    <div class="container container__footer">
        <p class="title title__footer">Косяченко Никита</p>
        <img class="picture" src="data:image/jpeg;base64,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" alt="thanks">
    </div>
</footer>
</body>
</html>