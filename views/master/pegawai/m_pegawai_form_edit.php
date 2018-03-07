<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
	<h2>Data Master Pegawai</h2>
	<ol class="breadcrumb">
	<li>
		<a href="index.php">Depan</a>
	</li>
	<li>
		<a href="<?php echo $url; ?>/master/">Master</a>
	</li>
	<li>
        <a href="<?php echo $url; ?>/master/pegawai/">Pegawai</a>
    </li>
    <li class="active">
        <strong>Edit data</strong>
    </li>
	</ol>
	</div>
	<div class="col-lg-2">

	</div>
</div>
<div class="row wrapper wrapper-content animated fadeInRight">
	 <div class="row">
                <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Edit data pegawai</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                    <?php
                    $peg_no=$lvl4;
                    $r_peg=list_pegawai($peg_no,true);
                    if ($r_peg["error"]==false) {
                        $peg_id=$r_peg["item"][1]["peg_id"];
                        $peg_nip=$r_peg["item"][1]["peg_nip"];
                        $peg_nip_lama=$r_peg["item"][1]["peg_nip_lama"];
                        $peg_nama=$r_peg["item"][1]["peg_nama"];
                        $peg_jk=$r_peg["item"][1]["peg_jk"];
                        $user_no=$r_peg["item"][1]["user_no"];
                        $peg_status=$r_peg["item"][1]["peg_status"];
                        $peg_unitkerja=$r_peg["item"][1]["peg_unitkerja"];
                        $peg_jabatan=$r_peg["item"][1]["peg_jabatan"];
                    ?>
                        <form id="formAddPegawaiAbsen" name="formAddPegawaiAbsen" action="<?php echo $url.'/'.$page.'/'.$act;?>/update/"  method="post" class="form-horizontal" role="form">
       <fieldset>
        <div class="form-group">
            <label for="peg_id" class="col-sm-3 control-label">ID Absen Pegawai</label>

                <div class="col-lg-4 col-sm-4">
                    <div class="input-group margin-bottom-sm">
                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                    <input type="text" name="peg_id" class="form-control" placeholder="ID Absen di Mesin" value="<?php echo $peg_id;?>" required="" />
                </div>
                </div>
        </div>
        <div class="form-group">
            <label for="peg_nama" class="col-sm-3 control-label">Nama Lengkap</label>

                <div class="col-lg-7 col-sm-7">
                    <div class="input-group margin-bottom-sm">
                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                    <input type="text" name="peg_nama" class="form-control" placeholder="nama lengkap tanpa gelar" value="<?php echo $peg_nama;?>" required="" />
                 </div>
                </div>
        </div>
        <div class="form-group">
            <label for="peg_nip_lama" class="col-sm-3 control-label">NIP Lama</label>

                <div class="col-lg-7 col-sm-7">
                    <div class="input-group margin-bottom-sm">
                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                    <input type="text" name="peg_nip_lama" class="form-control" placeholder="NIP Lama (Honor kosongin)" value="<?php echo $peg_nip_lama;?>" />
                 </div>
                </div>
        </div>
        <div class="form-group">
            <label for="peg_nip" class="col-sm-3 control-label">NIP</label>

                <div class="col-lg-7 col-sm-7">
                    <div class="input-group margin-bottom-sm">
                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                    <input type="text" name="peg_nip" class="form-control" placeholder="NIP Pegawai (Honor kosongin)" value="<?php echo $peg_nip;?>" />
                 </div>
                </div>
        </div>
        <div class="form-group">
            <label for="peg_jk" class="col-sm-3 control-label">Jenis Kelamin</label>
                <div class="col-sm-4">
                    <div class="input-group margin-bottom-sm">
                        <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                        <select class="form-control" name="peg_jk" id="peg_jk" style="font-family:'FontAwesome', Arial;">
                        <option value="">Pilih Jenis Kelamin</option>
                        <?php
                        for ($i=1;$i<=2;$i++)
                            {
                                if ($i==$peg_jk) {
                                    $dipilih='selected="selected"';
                                }
                                else { $dipilih='';}
                                echo '<option value="'.$i.'" '.$dipilih.'>'.$JenisKelamin[$i].'</option>';
                            }
                        ?>
                        </select>
                    </div>
                </div>
        </div>
        <div class="form-group">
            <label for="peg_user_no" class="col-sm-3 control-label">ID Username</label>

                <div class="col-sm-6">
                    <div class="input-group margin-bottom-sm">
                        <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                        <select class="form-control" name="peg_user_no" id="peg_user_no" style="font-family:'FontAwesome', Arial;">
                        <option value="">Pilih User ID</option>
                        <?php
                        $r_user=list_users(0,false);
                        if ($r_user["error"]==false) {
                            $i=1;
                            $max_users=$r_user["user_total"];
                            for ($i=1;$i<=$max_users;$i++)
                                {
                                    if ($r_user["item"][$i]["user_no"]==$user_no) {
                                    $dipilih_user='selected="selected"';
                                    }
                                    else { $dipilih_user='';}

                                    echo '<option value="'.$r_user["item"][$i]["user_no"].'" '.$dipilih_user.'>('.$r_user["item"][$i]["user_id"].') '.$r_user["item"][$i]["user_nama"].'</option>';
                                }
                        }
                        else {
                            echo '<option value="">Data User Kosong</option>';
                        }
                        ?>
                        </select>
                    </div>
                </div>
        </div>
        <div class="form-group">
            <label for="peg_unitkerja" class="col-sm-3 control-label">Unitkerja</label>

                <div class="col-sm-7">
                    <div class="input-group margin-bottom-sm">
                        <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                        <select class="form-control" name="peg_unitkerja" id="peg_unitkerja" style="font-family:'FontAwesome', Arial;">
                        <option value="">Pilih Unitkerja</option>
                        <?php
                        $r_unit=list_unitkerja(0,false,false);
                        if ($r_unit["error"]==false) {
                            $i=1;
                            $max_unit=$r_unit["unit_total"];
                            for ($i=1;$i<=$max_unit;$i++)
                                {
                                    if ($r_unit["item"][$i]["unit_kode"]==$peg_unitkerja) {
                                    $dipilih_unit='selected="selected"';
                                    }
                                    else { $dipilih_unit='';}

                                    echo '<option value="'.$r_unit["item"][$i]["unit_kode"].'" '.$dipilih_unit.'>['.$r_unit["item"][$i]["unit_kode"].'] '.$r_unit["item"][$i]["unit_nama"].'</option>';
                                }
                        }
                        else {
                            echo '<option value="">Data Unit Kosong</option>';
                        }
                        ?>
                        </select>
                    </div>
                </div>
        </div>
        <div class="form-group">
            <label for="peg_jabatan" class="col-sm-3 control-label">Jabatan</label>
                <div class="col-sm-4">
                    <div class="input-group margin-bottom-sm">
                        <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                        <select class="form-control" name="peg_jabatan" id="peg_jabatan" style="font-family:'FontAwesome', Arial;">
                        <option value="">Pilih Jabatan</option>
                        <?php
                        for ($i=1;$i<=4;$i++)
                            {
                                if ($i==$peg_jabatan) {
                                    $dipilih_jabatan='selected="selected"';
                                }
                                else { $dipilih_jabatan='';}
                                echo '<option value="'.$i.'" '.$dipilih_jabatan.'>'.$JenisJabatan[$i].'</option>';
                            }
                        ?>
                        </select>
                    </div>
                </div>
        </div>
        <div class="form-group">
            <label for="peg_status" class="col-sm-3 control-label">Status</label>
                <div class="col-sm-4">
                    <div class="input-group margin-bottom-sm">
                        <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                        <select class="form-control" name="peg_status" id="peg_status" style="font-family:'FontAwesome', Arial;">
                        <option value="">Pilih Status Pegawai</option>
                        <?php
                        for ($i=0;$i<=1;$i++)
                            {
                                if ($i==$peg_status) {
                                    $dipilih_status='selected="selected"';
                                }
                                else { $dipilih_status='';}
                                echo '<option value="'.$i.'" '.$dipilih_status.'>'.$status_umum[$i].'</option>';
                            }
                        ?>
                        </select>
                    </div>
                </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
              <button type="submit" id="submit_pegawai" name="submit_pegawai" value="save" class="btn btn-primary">UPDATE</button>
            </div>
        </div>
        <input type="hidden" name="peg_no" value="<?php echo $peg_no;?>" />
</fieldset>
</form>
                       <?php
                        }
                        else {
                            echo 'Data Pegawai tidak tersedia';
                        }
                        ?>

                    </div>
                </div>
        </div>
        
    </div>
</div>
