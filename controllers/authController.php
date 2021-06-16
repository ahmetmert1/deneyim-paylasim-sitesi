<?php


session_start();

require_once 'config/db.php';

$errors = array();

$username ="";
$email ="";


//Eğer kullanıcı kayıt ol butonuna tıklarsa
if (isset($_POST['signup-btn'])) {
    

//formdan gelen verileri al

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordConf = $_POST['passwordConf'];

//geçerlilik

if (empty($username)) {
    
    $errors['username'] = "Username Required";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] ="Email adress is invalid";
}

if (empty($email)) {
    
    $errors['email'] = "Email Required";
}

if (empty($password)) {
    
    $errors['password'] = "Password Required";
}

if ($password !== $passwordConf) {
    $errors['password'] = "Passwords dont match";

}

$emailQuery ="SELECT * FROM users WHERE email=? LIMIT 1";
$stmt = $conn->prepare($emailQuery);
$stmt->bind_param('s',$email);
$stmt->execute();
$result = $stmt->get_result();
$userCount = $result->num_rows;
$stmt->close();

if ($userCount > 0) {
    $errors['email'] = "Email already exists";
}

if (count($errors)===0) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $token = bin2hex(random_bytes(50));
    $verified = false;

    $sql = "INSERT INTO users(username , email , verified , token , password ) VALUES (?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssbss',$username,$email,$verified,$token,$password); 

    if ($stmt->execute()) {
        //kullanıcıyı girişi yaptır
        $user_id = $conn->insert_id;
        $_SESSION['id'] = $user_id;
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['verified'] = $verified;

        //giriş yapıldıktan sonra gelecek olan mesaj
        $_SESSION['message'] = "You are now logged in";
        $_SESSION['alert-class'] = "alert-success";

        header('location: index.php');
        exit();



    }else{
        $errors['db_error'] = "Database error: failed to register";
    }
}



}//isset sonu


//eğer kullanıcı giriş butonuna tıklarsa
if (isset($_POST['login-btn'])) {
    

    //formdan gelen verileri al
    
    $username = $_POST['username'];
    
    $password = $_POST['password'];
    
    
    //geçerlilik
    
    if (empty($username)) {
        
        $errors['username'] = "Username Required";
    }
    
    if (empty($password)) {
        
        $errors['password'] = "Password Required";
    }

    if (count($errors)===0) {
        $sql = "SELECT * FROM users WHERE email=? OR username=? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss',$username,$username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        //giriş başarılı
        //kullanıcıyı girişi yaptır
        
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['verified'] = $verified;

        //giriş yapıldıktan sonra gelecek olan mesaj
        $_SESSION['message'] = "You are now logged in";
        $_SESSION['alert-class'] = "alert-success";

        header('location: index.php');
        exit();

    }else{
        $errors['login_failed'] = "Wrong password";
    }
    }

    

}

//çıkış yapılması için
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    
    header('location:login.php');
    exit();
}

//kullanıcıyı ana sayfaya yönlendirmek için
if (isset($_POST['siteyedevamet-btn'])) {
    header('location: anasayfa.php');
    exit();
}





if (isset($_POST['deneyimekle-btn'])) {
    // header('location: anasayfa.php');
    // exit();

    //Formdan gelen verileri al

    $urun_adi = $_POST['title'];
    $urun_deneyim = $_POST['content'];

    if (empty($urun_adi)) {
        
        $errors['urun_adi'] = "Urun adi gereklidir";
    }
    
    if (empty($urun_deneyim)) {
        
        $errors['urun_deneyim'] = "Urunle ilgili deneyimin girilmesi gereklidir";
    }

    if (count($errors)===0) {
    
        $sql = "INSERT INTO deneyim (`iduye` , `urunadi` , `deneyim` ) VALUES (?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('iss',$_SESSION['id'],$urun_adi,$urun_deneyim); 
    
        if ($stmt->execute()) {
            
        }else{
            $errors['db_error'] = "Database error: failed to register";
        }
    }
    
        

       //echo "calisti"; 
}

if (isset($_POST['profil-btn'])) {
    header('location: anasayfa.php');
    exit();
}

if (isset($_POST['duzenlemeyibitir-btn'])) {
    


}

if (isset($_POST['deneyimsil-btn'])) {
    $not = $_GET['sil'];
    $sql = "DELETE FROM deneyim WHERE iddeneyim=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $not);
    $stmt->execute();

    
    header('location: profil.php');
    exit();
}

