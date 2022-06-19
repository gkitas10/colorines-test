<?php

$token = $_SESSION['access_token'];


function createTask($token, $data) {
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

    // var_dump($response);
}




/* "{
    \"name\": \"New Task Name\",
    \"description\": \"New Task Description\",
    \"assignees\": [
      183
    ],
    \"tags\": [
      \"tag name 1\"
    ],
    \"status\": \"Open\",
    \"priority\": 3,
    \"due_date\": 1508369194377,
    \"due_date_time\": false,
    \"time_estimate\": 8640000,
    \"start_date\": 1567780450202,
    \"start_date_time\": false,
    \"notify_all\": true,
    \"parent\": null,
    \"links_to\": null,
    \"check_required_custom_fields\": true,
    \"custom_fields\": [
      {
        \"id\": \"0a52c486-5f05-403b-b4fd-c512ff05131c\",
        \"value\": 23
      },
      {
        \"id\": \"03efda77-c7a0-42d3-8afd-fd546353c2f5\",
        \"value\": \"Text field input\"
      }
    ]
  }" */

  ?>