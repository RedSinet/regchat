<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        html,
        body,
        .form {
            height: 100%;
        }

        .form {
            display: flex;
            align-items: center;
            justify-content: center;
           
        }

        form {
            display: flex;
            flex-direction: column;
            text-align: center;
            justify-content: center;
            align-items: center;
          
        }

        #inside {
            width: 300px;
            margin-bottom: 10px;
        }
        #b1 {
            width: 300px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="form">

        <form action="aut.php" method="post">
            <img src="375.jpg" width="700" height="300" alt="">
            <input type="email" name="email" id="">
            <input type="password" name="password" id="">
            <input type="submit" value="Регистрация" name="reg">
            <input type="submit" value="Войти" name="inside">
        </form>
    </div>
</body>

</html>