<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    Halo <br>
    Berikut link untuk reset password E-Rilis Toba<br>
    <a href="<?= route("auth.recovery-password")."?email=".$email ?>"><?= route("recovery-password")."?email=".$email ?></a>
</body>
</html>