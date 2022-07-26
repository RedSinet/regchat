

<?php
session_start();

$host = '127.0.0.1';
$db   = 'chat';
$user = 'root';
$pass = '';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

$_email = $_POST['email'];
$_password = $_POST['password'];

if (isset($_POST['reg'])) {

    $_checkEmail = $pdo->query("SELECT * FROM `aut` WHERE `email` = '$_email'")->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($_checkEmail) > 0){
        echo "Email уже задействуется";
        exit();
    }

    $query = "INSERT INTO `aut` ( `email`, `password`) VALUES (:email, :password)"; 
    $params = [
        ':email' => $_POST['email'],
        ':password' => $_POST['password']
    ];
    $stm = $pdo->prepare($query);
    $stm->execute($params);
echo "<p>Регистрация пользователя ". $_POST['email']. "</p>";
}



if (isset($_POST['inside'])) {
    $_checkEmail = $pdo->query("SELECT * FROM `aut` WHERE `email` = '$_email'")->fetchAll(PDO::FETCH_ASSOC);
    if (empty($_checkEmail)){
        echo "Email не существует";
        exit();
    }
    $_checkUser = $pdo->query("SELECT * FROM `aut` WHERE `email` = '$_email' AND `password` = '$_password'")->fetch(PDO::FETCH_ASSOC);
    if (!empty($_checkUser) > 0){
        $_SESSION['userName'] = $_POST['email'];
        header('Location: http://chataut/chat.php');
        echo "<p>Вход успешен</p>";
    }
}
?>

