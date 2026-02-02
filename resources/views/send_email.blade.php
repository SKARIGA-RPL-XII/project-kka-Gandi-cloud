<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Ambil data
    $nama   = htmlspecialchars($_POST['nama']);
    $email  = htmlspecialchars($_POST['email']);
    $pesan  = htmlspecialchars($_POST['pesan']);

    // GANTI dengan email kamu
    $tujuan = "goclean@gmail.com";

    // Subjek email
    $subject = "Pesan dari Website GOCLEAN";

    // Isi pesan
    $message = "
    Nama   : $nama
    Email  : $email

    Pesan:
    $pesan
    ";

    // Header
    $headers  = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8";

    // Kirim email
    if (mail($tujuan, $subject, $message, $headers)) {

        echo "
        <script>
            alert('Pesan berhasil dikirim!');
            window.location.href='contact.php';
        </script>
        ";

    } else {

        echo "
        <script>
            alert('Pesan gagal dikirim!');
            window.location.href='contact.php';
        </script>
        ";

    }
}
?>
