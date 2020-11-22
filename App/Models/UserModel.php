<?php
//namespace App\Models;

class UserModel
{
    public function getUsers()
    {
        return json_decode(file_get_contents('App/Models/users.json'), true);

    }

//    function getAdmins ()
//    {
//        return json_decode(file_get_contents(__DIR__ . '/admins.json'), true);
//
//    }

    function getUserById($id)
    {
        $users = getUsers();
        foreach ($users as $user) {
            if ($user['id'] == $id) {
                return $user;
            }
        }
        return null;
    }

    function createUser($data)
    {
        $users = getUsers();

        //$data['id'] = rand(1000000,2000000);
        $data['id'] =  uniqid();



        $users[] = $data;

        putJson($users);

        return $data;

    }

    function updateUser($data, $id)
    {
        $users = getUsers();
        foreach ($users as $i => $user){
            if ($user['id'] == $id){
                $users[$i] = array_merge($user, $data);
            }
        }
        file_put_contents(__DIR__ . '/users.json', json_encode($users), JSON_PRETTY_PRINT);
    }

    function deleteUser($id)
    {
        $users = getUsers();

        foreach ($users as $i => $user) {
            if ($user['id'] == $id){

                array_splice($users, $i, 1);
            }
        }

        putJson($users);

    }



    function putJson($users)
    {
        file_put_contents(__DIR__. '/users.json', json_encode($users, JSON_PRETTY_PRINT));
    }

    function validateUser($user, &$errors)
    {
        $isValid = true;

        //Начало валидации
        if (!$user['login'] || strlen($user['login']) < 5 || strlen($user['login']) > 20) {
            $isValid = false;
            $errors['login'] = 'Поле "Логин" обязательно и должно содержать от 5 до 20 символов';
        }
        if (!$user['name']) {
            $isValid = false;
            $errors['name'] = 'Поле "Имя" обязательно';
        }

        if (!$user['birthdate']  ) {
            $isValid = false;
            $errors['birthdate'] = '"Дата рождения" введена некорректно';

        }
        // Конец валидации

        return $isValid;

    }

}