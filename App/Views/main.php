<?php
$users = new UserModel();
$users->getUsers();


?>

<div class="container">
    <p>
        <a class="btn btn-outline-success" href="/user/create">Добавить пользователя</a>
        <a class="btn btn-outline-danger" href="/user/authorization">Выйти</a>
        <a href="../index.php"><img src="../img/123.png" alt="" class="img-thumbnail" align="right" width="100" height="56"></a>
    </p>

    <table class="table">
        <thead>
        <tr>
            <th>Логин</th>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Дата рождения</th>
            <th>Email</th>
            <th>Адрес</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['login'] ?></td>
                <td><?php echo $user['name'] ?></td>
                <td><?php echo $user['surname'] ?></td>
                <td><?php echo $user['birthdate'] ?></td>
                <td><?php echo $user['email'] ?></td>
                <td><?php echo $user['address'] ?></td>
                <td>

                    <a href="user/<?php echo $user['id']?>/view" class="btn btn-sm btn-outline-info">Показать</a>
                    <a href="user/<?php echo $user['id']?>/update" class="btn btn-sm btn-outline-secondary">Редактировать</a>
                    <a href="user/<?php echo $user['id']?>/delete" class="btn btn-sm btn-outline-danger">Удалить</a>

                    </form>
                </td>
            </tr>
        <?php endforeach;; ?>
        </tbody>
    </table>
</div>

<?php include 'partials/footer.php'; ?>

