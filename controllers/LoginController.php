<?php
    class LoginController {
        public function index() {
            require_once './Vistas/Login.php';
        }

        public function getAccessToken() {
            $code = isset($_GET['code']) ? $_GET['code'] : '';
            if(!isset($code)) {
              return;
            }
            $ch = curl_init();
            $arr = [
              'client_id'=> 'FHBGFIWS2BVFJ4L9BMGVPN0WOOU89R0J',
              'client_secret'=> 'AOPFWR6JNUIDQ3P33N1TDFTYSSX67DWS7OXY1GJT06MF7SAWO6PO5SXZKRWMZCLV',
              'code'=> $code
            ];
      
            $data =json_encode($arr);
            curl_setopt($ch, CURLOPT_URL, "https://app.clickup.com/api/v2/oauth/token");
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
            $res = curl_exec($ch);
            $decoded='';
            // if(curl_errno($ch)) {
            //   echo curl_error($ch);
            // } 
            if(curl_errno($ch)!==null) {
              $decoded = json_decode($res, true);
              if(!isset($decoded['access_token'])) return;
              $_SESSION['access_token'] = $decoded['access_token'];
            } 
            curl_close($ch);
          }
    }
?>

<?php

      function sendCode () {
        $code = isset($_GET['code']) ? $_GET['code'] : '';
        if(!isset($code)) {
           echo 'return'; 
          return;
        }
        $ch = curl_init();
        $arr = [
          'client_id'=> 'FHBGFIWS2BVFJ4L9BMGVPN0WOOU89R0J',
          'client_secret'=> 'AOPFWR6JNUIDQ3P33N1TDFTYSSX67DWS7OXY1GJT06MF7SAWO6PO5SXZKRWMZCLV',
          'code'=> $code
        ];
  
        $data =json_encode($arr);
        curl_setopt($ch, CURLOPT_URL, "https://app.clickup.com/api/v2/oauth/token");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
  
        $res = curl_exec($ch);
        $decoded='';
        // if(curl_errno($ch)) {
        //   echo curl_error($ch);
        // } 
        if(curl_errno($ch)!==null) {
          $decoded = json_decode($res, true);
          if(!isset($decoded['access_token'])) return;
          $_SESSION['access_token'] = $decoded['access_token'];
        } 
        curl_close($ch);
      }

    ?>