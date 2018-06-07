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
    <table class="table table-hover table-data">
        <thead class="thead-dark">
        <tr>
            <th style="width:5%" scope="col">No</th>
            <th style="width:10%" scope="col">Username</th>
            <th style="width:20%" scope="col">Fullname</th>
            <th style="width:20%" scope="col">Email</th>
            <th style="width:10%" scope="col">Password</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $i = 1;
            if (is_array($user_list) || is_object($user_list))
            {
                foreach ($user_list as $user) {
                    ?>
                    <tr class="mhs-row" data-href="/user/profile/<?= $user->{"id"} ?>">
                        <td><?= $i ?></td>
                        <td><?= $user->{"username"} ?></td>
                        <td><?= $user->{"fullname"} ?></td>
                        <td><?= $user->{"email"} ?></td>
                        <td><?= $user->{"password"} ?></td>
                    </tr>
                    <?php
                    $i++;
                }
            }
        ?>
        </tbody>
    </table>
</body>
</html>