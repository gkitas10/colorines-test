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
        $token = isset($_SESSION['access_token']) ? $_SESSION['access_token']: '';
       
        $data = '';
        if(!empty($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST'){
            $data=json_encode($_POST);
           }
    ?> 
    <form action="create" method="POST">
        <label>Nombre de la tarea</label>
        <input type="text" name="name">
        <input type="submit" name="submit">
    </form>
</body>
</html>