<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>
</head>
<body>
<form name ="create_user" action="<?= base_url();?>user/save_edit" method="post">
    <div class="card-body">
        <input type="hidden" id="id_add" name="id" class="form-control" value="<?php echo $user[0]['id']; ?>">    
        <div class="row form-group">
            <label class="col-3 col-form-label" for="username_add">Username</label>
            <div class="col-9">
                <input type="text" id="username_add" name="username" class="form-control" value="<?php echo $user[0]['username']; ?>" required>
            </div>
        </div>
        <div class="row form-group">
            <label class="col-3 col-form-label" for="fullname_add">Fullname</label>
            <div class="col-9">
                <input type="text" id="fullname_add" name="fullname" class="form-control" value="<?php echo $user[0]['fullname']; ?>" required>
            </div>
        </div>
        <div class="row form-group">
            <label class="col-3 col-form-label" for="email_add">Email</label>
            <div class="col-4">
                <input type="email" id="email_add" name="email" class="form-control" value="<?php echo $user[0]['email']; ?>" required>
            </div>
        </div>
        <div class="row form-group">
            <label class="col-3 col-form-label" for="password_add">Password</label>
            <div class="col-4">
                <input type="password" id="password_add" name="password" class="form-control" value="<?php echo $user[0]['password']; ?>" required>
            </div>
        </div>
    </div>
    <div class="card-footer text-right">
        <button class="btn btn-primary" type="submit">Save</button>
    </div>
</form>
    
</body>
</html>