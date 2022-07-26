<div class="php">
<?php
session_start();
if (isset($_POST['email'])) {
}
 if (!isset($_SESSION['userName'])){
     header("Location: /");
}

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

if (isset($_POST['mesText'])) {
    $query = "INSERT INTO `messages` ( `username`, `message`) VALUES (:username, :message)"; //.$_SESSION['userName'].", ".$_POST['mesText'].);
    $params = [
        ':username' => $_SESSION['userName'],
        ':message' => $_POST['mesText']
    ];
    $stm = $pdo->prepare($query);
    $stm->execute($params);
}
$data = $pdo->query("SELECT * FROM messages")->fetchAll(PDO::FETCH_ASSOC);
foreach ($data as $k => $v) {
    echo '<div class="qwe"> '
        . '<span class="p1">' . $v['username'] . '</span> '
        . '<span class="p2">' . $v['message'] . '</span> '
        . '<span class="p3">' . $v['date'] . '</span> ' . '</div>';
}




?>
</div>
<head>
    <style>
        html,
        body
         {
            height: 100%;
            display: flex;
            flex-direction: column;

        }

        .message {
            display: flex;
            align-items: flex-end;
            align-items: center;
            justify-content: center;
        }

        .p1 {
            color: green;
        }

        .p2 {
            color: black;
            font-family: 'Times New Roman', Times, serif;
        }

        .p3 {
            color: red;
        }
        .php{
            overflow: auto;
            max-height: 90vh;
            flex-grow: 1;
        }
    </style>
</head>

<body>

    <div class="message">
        
        <form action="chat.php" method="post" class="message">
            <p>Сообщение</p>
            <input type="text" name="mesText">
            <button id="b2">Отправить</button>
        </form>
    </div>
</body>
<?php
