<?php
    class TaskController {
        public function index() {
            require_once './Vistas/create-task.php';
            require_once './controllers/loginController.php';
            $login = new LoginController();
            if(!isset($_SESSION['access_token'])) {
                $login->getAccessToken();
            }
        }

        public function create() {
            require_once './Vistas/create-task.php';
            echo $data;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,"https://api.clickup.com/api/v2/list/198438254/task");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, FALSE);

            curl_setopt($ch, CURLOPT_POST, TRUE);
            
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: $token",
            "Content-Type: application/json"
            ));

            $response = curl_exec($ch);
            curl_close($ch);

        }
     }
?>