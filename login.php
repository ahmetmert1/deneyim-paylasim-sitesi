<?php require_once 'controllers/authController.php';    ?>

<?php if (isset($_SESSION['username'])) {
    header('location: login.php');
    exit();

} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="style.css">

    <title>login</title>
</head>

<body style="background-color: #87F78E;">


    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form-div">
                <form action="login.php" method="POST">

                    <h3 class="text-center"><b>Giriş Yap</b></h3>

                    <?php if (count($errors) > 0) : ?>
                        <div class="alert alert-danger">
                            <?php foreach ($errors as $error) : ?>
                                <li><?php echo $error ?></li>

                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="username">Kullanıcı Adı</label>
                        <input type="text" name="username" class="form-control form-control-lg">
                    </div>
                    <br>
                    
                    
                    <div class="form-group">
                        <label for="password">Şifre</label>
                        <input type="password" name="password" class="form-control form-control-lg">
                    </div>
                    <br>
                    

                    <div class="form-group ">
                        <button type="submit" name="login-btn" class="btn btn-primary btn-block btn-lg" style="width:100%">Giriş Yap</button>
                    </div>

                    <p class="text-center"><b>Henüz üye olmadın mı ?</b><a href="signup.php">Kayıt Ol !</a></p>

                </form>
            </div>
        </div>
    </div>

</body>

</html>