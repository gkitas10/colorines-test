<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
        session_start();
        $token = $_SESSION['access_token'];
        include('../Auth/getAccessToken.php');
        include('../includes/taskController.php');
        sendCode($code);
        $data = '';
        if(!empty($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST'){
            $data=json_encode($_POST);
            createTask($token, $data);
            header('Location: create-task.php');
           }
    ?>

    <form action="" method="POST">
        <label>Nombre de la tarea</label>
        <input type="text" name="name">
        <input type="submit" name="submit">
    </form>
    
</body>
</html>


<!-- https://api.clickup.com/api/v2/list/#2mju5jm/task -->