<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama = trim($_POST['nama']);
    $email = trim($_POST['email']);
    $usia = trim($_POST['usia']);
    
    $errors = [];

    if (empty($nama)) {
        $errors[] = "Nama tidak boleh kosong.";
    }

    if (empty($email)) {
        $errors[] = "Email wajib diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format email tidak valid.";
    } else {
        $domain = substr(strrchr($email, "@"), 1);
        if ($domain !== 'gmail.com') {
            $errors[] = "Maaf, email harus menggunakan @gmail.com";
        }
    }

    if (empty($usia)) {
        $errors[] = "Usia wajib diisi.";
    } elseif (!is_numeric($usia) || $usia < 17) {
        $errors[] = "Usia harus angka dan minimal 17 tahun.";
    }

    if (count($errors) > 0) {
        $errorMessage = urlencode($errors[0]);
        header("Location: index.php?error=$errorMessage");
        exit();
    } else {        
        header("Location: index.php?status=sukses");
        exit();
    }

} else {
    header("Location: index.php");
    exit();
}
?>