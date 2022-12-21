<?php
// Cek apakah form telah disubmit
if (isset($_POST['submit'])) {
  // Ambil input dari form
  $phone = $_POST['phone'];
  $code = $_POST['code'];
  $password = $_POST['password'];

  // Cek apakah semua input telah terisi
  if (empty($phone) || empty($code) || empty($password)) {
    // Tampilkan pesan error jika ada input yang kosong
    echo "Mohon lengkapi semua input.";
  } else {
    // Cek apakah kode verifikasi yang dimasukkan sesuai dengan kode verifikasi yang dikirimkan ke nomor telepon
    if ($code == "123456") { // ganti dengan kode verifikasi yang sebenarnya
      // Update password di database
      // ...

      // Beri tahu pengguna bahwa proses reset password telah selesai
      echo "Password berhasil direset. Silakan login dengan password baru Anda.";
    } else {
      // Tampilkan pesan error jika kode verifikasi salah
      echo "Kode verifikasi salah. Mohon masukkan kode verifikasi yang benar.";
    }
  }
}

?>

<!-- Tampilkan form -->
<form method="post" action="">
  <label for="phone">Nomor Telepon:</label><br>
  <input type="text" name="phone"><br>
  <br>
  <label for="phone">Kode verifikasi:</label><br>
  <input type="text" name="code"><br>
  <br>
  <label for="phone">Password Baru:</label><br>
  <input type="text" name="password"><br>
  <br>
  <input type="submit" name="submit" value="Reset Password">
</form>
