<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/test/assests/style.css">
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
    <div class="create-task">
        <div class="title">Crea una tarea</div>
        <div class="form-cont">
            <form action="create" method="POST" class="form">
            <label>Nombre de la tarea</label>
            <input type="text" name="name">
            <label>Prioridad</label>
            <input type="number" name="priority">
            <label>Descripción</label>
            <textarea name="description"></textarea>
            <input type="submit" class="form-cont__task-submit">
    </form>
        </div>
    </div>
    
</body>
</html>
