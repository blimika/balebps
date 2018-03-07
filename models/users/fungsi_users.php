<?php
function get_idnama_users($user_id) {
	//(user_id) user_nama
	$db_users = new db();
	$conn_users = $db_users->connect();
	$sql_users = $conn_users -> query("select * from users where user_id='".$user_id."'");
	$cek=$sql_users->num_rows;
	if ($cek>0) {
	   $nama_user='';
	   $r=$sql_users->fetch_object();
	   $nama_user='('.$r->user_id.') '. $r->user_nama;
	}
	else {
	 $nama_user='';
	}
	return $nama_user;
	$conn_users->close();
	}

function get_email_users($user_id) {
	//(user_id) user_nama
	$db_users = new db();
	$conn_users = $db_users->connect();
	$sql_users = $conn_users -> query("select * from users where user_id='".$user_id."'");
	$cek=$sql_users->num_rows;
	if ($cek>0) {
	   $email_user='';
	   $r=$sql_users->fetch_object();
	   $email_user=$r->user_email;
	}
	else {
	 $email_user='';
	}
	return $email_user;
	$conn_users->close();
	}

function gen_passwd($passwd_ori) {
	global $pengacak;
	$passwd_md5=md5($pengacak.'('.$passwd_ori.')'.$pengacak);
  return $passwd_md5;
}
function cek_user_akses ($user_id,$user_level,$user_unitkerja,$target_unitkerja) {
//function untuk edit,akses dan hapus
	if ($user_level > 1) {
		if ($user_level > 2) {

		}
		else {
			
		}
	}
	else {
		$hak_akses=array(1,'user : '.$user_id.' tidak mempunyai akses');
	}
}
function cek_users_login($user_id,$user_passwd) {
	global $ip;
	$db = new db();
	$conn = $db->connect();
	$pass_md5=gen_passwd($user_passwd);
	$sql_cek = $conn -> query("select * from users where user_id='$user_id' and user_passwd='$pass_md5'");
	$cek=$sql_cek->num_rows;
	$r_login=array("error"=>false);
	if ($cek>0) {
		//berhasil login
		$waktu_lokal=date("Y-m-d H:i:s");
		$r=$sql_cek->fetch_object();
		if ($r->user_status==1) {
			//berhasil login dan aktif
			$sql_update_login=$conn -> query("update users set user_lastip='$ip', user_lastlogin='$waktu_lokal' where user_id='$user_id'");
			$r_login["error"]=false;
			$r_login["user_id"]=$user_id;
			$r_login["user_passwd"]=$user_passwd;
			$r_login["user_passwd_md5"]=$pass_md5;
			$r_login["user_no"]=$r->user_no;
			$r_login["user_nama"]=$r->user_nama;
			$r_login["user_level"]=$r->user_level;
			$r_login["user_unitkerja"]=$r->user_unitkerja;
			$r_login["user_provkab"]=get_jenis_unit($r->user_unitkerja);
			$r_login["pesan_error"]="Selamat Datang <b>".$r->user_nama."</b>";
		}
		else {
			//id user belum aktif
			$r_login["error"]=true;
			$r_login["pesan_error"]='User ID <strong>'.$user_id.'</strong> belum aktif.<br /> Hubungi Admin Provinsi';
		}
	}
	else {
		//tidak berhasil login
		$r_login["error"]=true;
		$r_login["pesan_error"]="Username/Password salah!";
	}
	return $r_login;
	$db->close();
}

function list_users($user_id,$detil=false) {
	$db_users = new db();
	$conn_users = $db_users -> connect();
	if ($detil==true) {
		$sql_users = $conn_users -> query("select * from users where user_id='".$user_id."'");
	}
	else {
		$sql_users = $conn_users -> query("select users.*, unitkerja.unit_nama from users left join unitkerja on users.user_unitkerja=unitkerja.unit_kode where unitkerja.unit_jenis=1 order by users.user_unitkerja asc");
	}
	$cek_users = $sql_users->num_rows;
	$users_list=array("error"=>false);
	if ($cek_users>0) {
		$users_list["error"]=false;
		$users_list["user_total"]=$cek_users;
		$i=1;
		while ($r=$sql_users->fetch_object()) {
			$users_list["item"][$i]=array(
				"user_no"=>$r->user_no,
				"user_id"=>$r->user_id,
				"user_nama"=>$r->user_nama,
				"user_passwd"=>$r->user_passwd,
				"user_email"=>$r->user_email,
				"user_unitkerja"=>$r->user_unitkerja,
				"user_dibuat_waktu"=>$r->user_dibuat_waktu,
				"user_dibuat_oleh"=>$r->user_dibuat_oleh,
				"user_lastlogin"=>$r->user_lastlogin,
				"user_lastip"=>$r->user_lastip,
				"user_status"=>$r->user_status,
				"user_diupdate_waktu"=>$r->user_diupdate_waktu,
				"user_diupdate_oleh"=>$r->user_diupdate_oleh,
				"user_level"=>$r->user_level,
				"unit_nama"=>$r->unit_nama
			);
			$i++;
		}
	}
	else {
		$users_list["error"]=true;
		$users_list["pesan_error"]="data kosong";
	}
	return $users_list;
	$conn_users->close();
}
?>
