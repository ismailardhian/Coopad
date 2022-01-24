<?php 
include '../function.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];
$id_users = $_SESSION['users']['id_users'];


if ($nama == "" || $email == "" || $password == "") {
	$data['status'] = 3;
	$data['msg']   = 'Terdapat form yang kosong, pastikan form telah terisi dengan benar.';
	die(json_encode($data));
} else {

	if (strlen($password) > 8) {
		$tambah = $func->update_users($nama,$email,$password,$id_users);

		if ($tambah == 'success_edit') {
			$data['status'] = 0;
			$data['msg']   = 'Success update users<br><br>Nama : '.$nama.'<br>Email : '.$email.'<br>Password : '.$password;
			die(json_encode($data));
		} 
	} else {
		$data['status'] = 1;
		$data['msg']   = 'Password kurang dari 8 karakter!';
		die(json_encode($data));
	}
}




?>