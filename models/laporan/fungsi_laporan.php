<?php
function list_laporan_kegiatan($unit_kode,$jenis_lap,$bulan_keg,$tahun_keg) {
	//$jenis_lap -> 0 provinsi, 1 bidang/bagian, 2 kabkota
	$db_keg = new db();
	$conn_keg = $db_keg -> connect();
	if ($jenis_lap>0) {
        //unit_kode harus ada
    }
    else {
		//jenis laporan provinsi
		if ($bulan_keg > 0 ) {
			$sql_kegiatan = $conn_keg -> query("select kegiatan.*,unit_nama,unit_jenis,unit_parent from kegiatan inner join unitkerja on kegiatan.keg_unitkerja=unitkerja.unit_kode where month(keg_end)='$bulan_keg' and year(keg_end)='$tahun_keg' order by keg_dibuat_waktu desc") or die(mysqli_error($conn_keg));
		}
		else {
			$sql_kegiatan = $conn_keg -> query("select kegiatan.*,unit_nama,unit_jenis,unit_parent from kegiatan inner join unitkerja on kegiatan.keg_unitkerja=unitkerja.unit_kode where year(keg_end)='$tahun_keg' order by keg_dibuat_waktu desc") or die(mysqli_error($conn_keg));
		}
		
    }
	$cek = $sql_kegiatan -> num_rows;
	$data_keg=array("error"=>false);
	if ($cek>0) {
		$data_keg["error"]=false;
		$data_keg["keg_total"]=$cek;
		$i=1;
		while ($r= $sql_kegiatan -> fetch_object()) {
			$data_keg["item"][$i]=array(
				"keg_id"=>$r->keg_id,
				"keg_nama"=>$r->keg_nama,
				"keg_unitkerja"=>$r->keg_unitkerja,
				"keg_start"=>$r->keg_start,
				"keg_end"=>$r->keg_end,
				"keg_dibuat_oleh"=>$r->keg_dibuat_oleh,
				"keg_dibuat_waktu"=>$r->keg_dibuat_waktu,
				"keg_diupdate_oleh"=>$r->keg_diupdate_oleh,
				"keg_diupdate_waktu"=>$r->keg_diupdate_waktu,
				"keg_jenis"=>$r->keg_jenis,
				"keg_total_target"=>$r->keg_total_target,
				"keg_target_satuan"=>$r->keg_target_satuan,
				"keg_spj"=>$r->keg_spj,
				"keg_spj_target"=>$r->keg_spj_target,
				"keg_info"=>$r->keg_info,
				"keg_unitnama"=>$r->unit_nama,
				"keg_unitjenis"=>$r->unit_jenis,
				"keg_unitparent"=>$r->unit_parent,
				"keg_tipe"=>$r->keg_tipe
			);
			$i++;
		}
	}
	else {
		$data_keg["error"]=true;
		$data_keg["pesan_error"]="Data kegiatan tidak tersedia";		
	}
	return $data_keg;
	$conn_keg->close();
}
?>