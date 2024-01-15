<?php
session_start();
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FirstForm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>

</head>


<body>

<style>
    /* CSS стилі для форми */
    form {
        margin: 80px;
    }
</style>

<div class="conteiner">

    <?php
    //var_dump($_SESSION)
    ?>
    <br><br><br>
    <?php
    if (!isset($_SESSION['counter'])) {
        echo 'SESSION NUM = ' . $_SESSION['counter'] = 1;
    } else {
        $_SESSION['counter']++;
        echo 'SESSION NUM = ' . $_SESSION['counter'];
        }
    ?>

    <?php if (
        !empty($_POST['login'])
    ) : ?>
        <div class="alert alert-success" role="alert">
            Ви вказали логін <?= $_POST['login']; ?>
        </div>
    <?php endif; ?>

    <hr>

    <?php

    $login = 'test';
    $password = '123';
    $_SESSION['aut'] = false;
    if (!empty($_POST['login'])) {
            $_SESSION['aut'] = true;
            $_SESSION["user"][] = [
                    'login'    => $_POST['login'],
                    'password' => $_POST['password']
            ];


        if ($_POST['login'] == $login && $_POST['password'] == $password) { ?>

            <div class="alert alert-success" role="alert">
                Ви успішно автентифікувались з логіном <?= $_POST['login']; ?>
            </div>

        <?php } elseif ($_POST['login'] == $login) { ?>

            <div class="alert alert-success" role="alert">
                Невірно вказаний пароль
            </div>

        <?php } ?>

        <?php  } ?>

    <?php if (!empty(!$_SESSION['aut']) == true) {
    ?>



    <form method="post" action="index.php">

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Your login</label>
            <input type="text" class="form-control" name="login">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <hr>


       <hr>

<!--        <label for="submitBtn">Delete SESSION:</label>-->
<!--        <button type="submit" class="btn btn-danger" name="submitButton">Danger</button>-->

        <?php
//        if (isset($_POST['submitButton'])) {
//            unset($_SESSION['counter']);
//            echo "Текст, який виведеться після натискання кнопки";
//        }
//        ?>

        <br>
        <?php print_r($_SESSION);        ?>

    </form>
    <?php
    } else {
    ?>
    <h3>Welcome <span class="badge bg-secondary"> <?php  echo$_POST['login'] ?> </span></h3>

    <?php
    }
    ?>

</div>

</body>
</html>