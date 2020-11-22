<?php

//if (!isset($param['id'])){
//    include 'partials/not_found.php';
//   exit;
//}
$userId = $param['id'];
$user = getUserById($userId);

//$user = getUserById($userId);
//if (!$user) {
//    include 'partials/not_found.php';
//    exit;
//}

$errors = [
    "login" => "",
    "name" => "",
    "birthdate" => ""

];

//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = array_merge($user, $_POST);

    $isValid = validateUser($user, $errors);
    if ($isValid) {
        $user = updateUser($_POST, $userId);
        header("Location: /");
   // }

}


?>


<?php include '_form.php' ?>




