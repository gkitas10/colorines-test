<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>Document</title>
</head>
<body>
    <!-- <a href="https://app.clickup.com/api?client_id=FHBGFIWS2BVFJ4L9BMGVPN0WOOU89R0J&redirect_uri=http://localhost/test/index.php">link</a> -->
    <form action="https://app.clickup.com/api" method="GET">
      <input type="hidden" value="FHBGFIWS2BVFJ4L9BMGVPN0WOOU89R0J" name="client_id">
      <input type="hidden" value="http://localhost/test/index.php" name="redirect_uri">

        <input type="submit">
    </form>
    <?php
      $code = isset($_GET['code']) ? $_GET['code'] : '';

      function getAccessToken ($code) {
        $ch = curl_init();
        $arr = [
          'client_id'=> 'FHBGFIWS2BVFJ4L9BMGVPN0WOOU89R0J',
          'client_secret'=> 'AOPFWR6JNUIDQ3P33N1TDFTYSSX67DWS7OXY1GJT06MF7SAWO6PO5SXZKRWMZCLV',
          'code'=> isset($code) ? $code : ''
        ];
  
        $data = http_build_query($arr);
        curl_setopt($ch, CURLOPT_URL, "https://app.clickup.com/api/v2/oauth/token");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  
        $res = curl_exec($ch);
  
        if(curl_errno($ch)) echo curl_error($ch);
        else $decoded = json_decode($res, true);
        if(isset($decoded['access_token'])) var_dump($decoded);
  
        curl_close($ch);
      }

      $token = getAccessToken($code);

    ?>
</body>
</html>
