<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
	<h2>Kegiatan</h2>
	<ol class="breadcrumb">
	<li>
		<a href="<?php echo $url; ?>">Depan</a>
	</li>
    <li>
        <a href="<?php echo $url; ?>/laporan/">Laporan Kegiatan</a>
    </li>
	<li class="active">
		<strong>by Provinsi</strong>
	</li>

	</ol>
	</div>
	<div class="col-lg-2">
        
       <div class="title-action">
           
        </div>
       
	</div>
</div>
<div class="row wrapper wrapper-content animated fadeInRightBig tooltip-bps">
     <div class="row">
        <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Laporan Kegiatan by Provinsi</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <!--form pilih bulan tahun-->
                        <form class="form-inline" method="post">
                          <div class="form-group">
                            <label for="sdate">Pilih</label>
                            <select name="bln_pilih" class="form-control">
                                <option value="">Bulan</option>
                                <?php 
                                
                                for ($i=1;$i<=12;$i++) {
                                    if ($i==$bln_pilih) { $pilih_bln='selected="selected"'; }
                                    else { $pilih_bln=''; }
                                    echo '<option value="'.$i.'" '.$pilih_bln.'>'.$nama_bulan_panjang[$i].'</option>';
                                }
                                ?>
                            </select>
                             <select name="thn_pilih" class="form-control">
                                <option value="">Tahun</option>
                                <?php
                                $r_thn=list_tahun_kegiatan();
                                if ($r_thn["error"]==false) {
                                	$bnyk_thn=$r_thn["thn_total"];
                                	 for ($j=1;$j<=$bnyk_thn;$j++) {
	                                    if ($r_thn["item"][$j]["thn_keg"]==$thn_pilih) { $pilih_thn='selected="selected"'; }
	                                    else { $pilih_thn=''; }
	                                    echo '<option value="'.$r_thn["item"][$j]["thn_keg"].'" '.$pilih_thn.'>'.$r_thn["item"][$j]["thn_keg"].'</option>';

	                                }
                                }
                                else {
                                	$thn_skrg=date("Y");
	                                for ($j=($thn_skrg-2);$j<=$thn_skrg;$j++) {
	                                    if ($j==$thn_pilih) { $pilih_thn='selected="selected"'; }
	                                    else { $pilih_thn=''; }
	                                    echo '<option value="'.$j.'" '.$pilih_thn.'>'.$j.'</option>';

	                                }
                                }
                                
                                ?>
                            </select>
                          </div>
                          <button type="submit" name="view_harian" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="View data sesuai bulan">View Data</button>
                            </form>
                        <!--batas form bulan tahun-->
                        <br />
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center" rowspan="2">Bulan</th>
                                <th class="text-center" rowspan="2">Kegiatan</th>
                                <th class="text-center" rowspan="2">Bidang</th>
                                <th class="text-center" rowspan="2">Tipe</th>
                                <th class="text-center" rowspan="2">Tanggal Mulai</th>
                                <th class="text-center" rowspan="2">Tanggal Berakhir</th>
                                <th class="text-center" colspan="3">Kegiatan</th>
                                <th class="text-center" colspan="3">SPJ</th>
                            </tr>
                            <tr>   
                                <th class="text-center">Target</th>
                                <th class="text-center">Dikirim</th>
                                <th class="text-center">Diterima</th>
                                <th class="text-center">Target</th>
                                <th class="text-center">Dikirim</th>
                                <th class="text-center">Diterima</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $r_lap=list_laporan_kegiatan(0,0,$bln_pilih,$thn_pilih);
                            ?>
                            <tr>
                                <td class="text-center">Januari</td>
                                <td class="text-left"><strong><a href="http://10.52.6.31/balebps/kegiatan/view/591">Laporan Kinerja Bulan Juli 2018</a>
                                </strong>
                                <p>Subbagian Keuangan</p></td>
                                <td>Bagian Tata Usaha</td>
                                <td><span class="label label-primary">Provinsi</span></td>
                                <td class="text-right">Jum, 31 Agu 2018</td>
                                <td class="text-right">Jum, 31 Agu 2018</td>
                                <td class="text-right">6</td>
                                <td><div class="progress progress-striped active m-b-sm">
                                        <div style="width: 16.67%;" class="progress-bar"></td>
                                <td><div class="tooltip-bps"><div class="progress progress-striped active m-b-sm" data-toggle="tooltip" data-placement="top" title="Sudah dikirim 6 Dok">
                                        <div style="width: 16.67%;" class="progress-bar"></div></div>
                                    </div></td>
                                    <td class="text-right">1</td>
                                <td><div class="progress progress-striped active m-b-sm">
                                        <div style="width: 16.67%;" class="progress-bar"></td>
                                <td><div class="tooltip-bps"><div class="progress progress-striped active m-b-sm" data-toggle="tooltip" data-placement="top" title="Sudah dikirim 6 Dok">
                                        <div style="width: 16.67%;" class="progress-bar"></div></div>
                                    </div></td>
						    <tr>
                            <tr>
                                <td class="text-center">Januari</td>
                                <td class="text-left"><strong><a href="http://10.52.6.31/balebps/kegiatan/view/591">Laporan Kinerja Bulan Juli 2018</a>
                                </strong>
                                <p>Subbagian Keuangan</p></td>
                                <td>Bagian Tata Usaha</td>
                                <td><span class="label label-primary">Provinsi</span></td>
                                <td class="text-right">Jum, 31 Agu 2018</td>
                                <td class="text-right">Jum, 31 Agu 2018</td>
                                <td class="text-right">6</td>
                                <td><div class="progress progress-striped active m-b-sm">
                                        <div style="width: 16.67%;" class="progress-bar"></td>
                                <td><div class="tooltip-bps"><div class="progress progress-striped active m-b-sm" data-toggle="tooltip" data-placement="top" title="Sudah dikirim 6 Dok">
                                        <div style="width: 16.67%;" class="progress-bar"></div></div>
                                    </div></td>
                                    <td class="text-center" colspan="3">data spj tidak tersedia</td>
                               <tr>
                            </tbody>
                            </table>
                        </div>         

                    </div>
                </div>
        </div>
    
        
    </div>    
</div>