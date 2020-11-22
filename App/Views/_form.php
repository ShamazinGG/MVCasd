<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>
            <?php if ($param['id']): ?>
            Обновить пользователя: <b><?php echo $user['login']?></b>
            <?php else: ?>
                Создать нового пользователя

            <?php endif ?>
            </h3>

        </div>
        <div class="card-body">

<form method="post" enctype="multipart/form-data" action="">
                <div class="form-group">
                    <label>Логин</label>
                    <input name="login" value="<?php echo $user['login'] ?>"
                           class="form-control <?php echo $errors['login'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo $errors['login'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Имя</label>
                    <input name="name" value="<?php echo $user['name'] ?>"
                           class="form-control <?php echo $errors['name'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo $errors['name'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Фамилия</label>
                    <input name="surname" value="<?php echo $user['surname'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Дата рождения</label>
                    <input name="birthdate" value="<?php echo $user['birthdate'] ?>"
                           class="form-control <?php echo $errors['birthdate'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo $errors['birthdate'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input name="email" value="<?php echo $user['email'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Адрес</label>
                    <input name="address" value="<?php echo $user['address'] ?>" class="form-control">
                </div>

                <button class="btn btn-success">Сохранить</button>
        </div>
    </div>
</form>
    </form>
</div>
