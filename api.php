<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");

$data_user = [
    [
        "id" => 1,
        "nama" => "Husriani Fitra Rhamadani",
        "email" => "ramadaniirann@gmail.com",
        "role" => "Admin"
    ],
    [
        "id" => 2,
        "nama" => "Qahar Qadrian",
        "email" => "qaharqdrn@gmail.com",
        "role" => "User"
    ]
];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $found = false;

    foreach ($data_user as $user) {
        if ($user['id'] == $id) {
            echo json_encode([
                "status" => "success",
                "data" => $user
            ]);
            $found = true;
            break;
        }
    }

    if (!$found) {
        http_response_code(404);
        echo json_encode(["status" => "error", "message" => "User tidak ditemukan"]);
    }

} else {
    echo json_encode([
        "status" => "success",
        "total_results" => count($data_user),
        "data" => $data_user
    ]);
}
?>