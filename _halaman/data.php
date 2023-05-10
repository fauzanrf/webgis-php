<?php
  $title="Data Sekolah";
  $judul=$title;
  $url='data';
  if ($session->get('level')!='Admin'){
  	redirect(url('beranda'));
  }

if(isset($_POST['simpan'])){
	$file=upload('alamat','geojson');
	if($file!=false){
		$data['alamat']=$file;
		if($_POST['id_smp']!=''){
			// hapus file di dalam folder
			$db->where('id_smp',$_GET['id']);
			$get=$db->ObjectBuilder()->getOne('t_hotspot');
			$alamat=$get->alamat;
			unlink('assets/unggah/geojson/'.$alamat);
			// end hapus file di dalam folder
		}
	}


	// cek validasi
	$validation=null;
	// cek kode apakah sudah ada
	if($_POST['id_smp']!=""){
		$db->where('id_smp !='.$_POST['id_smp']);
	}
	$db->where('NPSN',$_POST['NPSN']);
	$db->get('t_hotspot');
	if($db->count>0){
		$validation[]='Kode NPSN Sudah Ada ';
	}
	//tidak boleh kosong
	if($_POST['nm_smp']==''){
		$validation[]='Nama Sekolah Dasar Tidak Boleh Kosong';
	}

	if($validation!=null){
		$setTemplate=false;
		$session->set('error_validation',$validation);
		$session->set('error_value',$_POST);
		redirect($_SERVER['HTTP_REFERER']);
		return false;
	}
	// cek validasi



	if($_POST['id_smp']==""){
		$data['NPSN']=$_POST['NPSN'];
		$data['nm_smp']=$_POST['nm_smp'];
		$data['akre']=$_POST['akre'];
		$data['lat']=$_POST['lat'];
		$data['lng']=$_POST['lng'];
		$data['alamat']=$_POST['alamat'];
		$exec=$db->insert("t_hotspot",$data);
		$info='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Sukses!</h4> Data Sukses Ditambah </div>';
		
	}
	else{
		$data['NPSN']=$_POST['NPSN'];
		$data['nm_smp']=$_POST['nm_smp'];
		$data['akre']=$_POST['akre'];
		$data['lat']=$_POST['lat'];
		$data['lng']=$_POST['lng'];
		$data['alamat']=$_POST['alamat'];
		$db->where('id_smp',$_POST['id_smp']);
		$exec=$db->update("t_hotspot",$data);
		$info='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Sukses!</h4> Data Sukses diubah </div>';
	}

	if($exec){
		$session->set('info',$info);
	}
	else{
      $session->set("info",'<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Error!</h4> Proses gagal dilakukan <br>'.$db->getLastError().'
              </div>');
	}
	redirect(url($url));
}

if(isset($_GET['hapus'])){
	$setTemplate=false;
	// hapus file di dalam folder
	$db->where('id_smp',$_GET['id']);
	$get=$db->ObjectBuilder()->getOne('t_hotspot');
	$alamat=$get->alamat;
	unlink('assets/unggah/geojson/'.$alamat);
	// end hapus file di dalam folder
	$db->where("id_smp",$_GET['id']);
	$exec=$db->delete("t_hotspot");
	$info='<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Sukses!</h4> Data Sukses dihapus </div>';
	if($exec){
		$session->set('info',$info);
	}
	else{
      $session->set("info",'<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Error!</h4> Proses gagal dilakukan
              </div>');
	}
	redirect(url($url));
}

elseif(isset($_GET['tambah']) OR isset($_GET['ubah'])){
  $id_smp="";
  $NPSN="";
  $nm_smp="";
  $alamat="";
  $akre="";
  $lat="";
  $lng="";
  if(isset($_GET['ubah']) AND isset($_GET['id'])){
  	$id=$_GET['id'];
  	$db->where('id_smp',$id);
	$row=$db->ObjectBuilder()->getOne('t_hotspot');
	if($db->count>0){
		$id_smp=$row->id_smp;
		$NPSN=$row->npsn;
		$nm_smp=$row->nm_smp;
		$alamat=$row->alamat;
		$akre=$row->akre;
		$lat=$row->lat;
		$lng=$row->lng;
	}
  }
  // value ketika validasi
  if($session->get('error_value')){
  	extract($session->pull('error_value'));
  }
?>
<?=content_open('Form Sekolah Dasar')?>
    <form method="post" enctype="multipart/form-data">
    	<?php
    		// menampilkan error validasi
  			if($session->get('error_validation')){
  				foreach ($session->pull('error_validation') as $key => $value) {
  					echo '<div class="alert alert-danger">'.$value.'</div>';
  				}
  			}
    	?>
    	<?=input_hidden('id_smp',$id_smp)?>
    	<div class="form-group">
    		<label>NPSN</label>
    		<div class="row">
	    		<div class="col-md-4">
	    			<?=input_text('NPSN',$NPSN)?>
		    	</div>
	    	</div>
    	</div>
    	<div class="form-group">
    		<label>Nama SMP</label>
    		<div class="row">
	    		<div class="col-md-6">
	    			<?=input_text('nm_smp',$nm_smp)?>
	    		</div>
    		</div>
    	</div>
    	<div class="form-group">
    		<label>Alamat</label>
    		<div class="row">
	    		<div class="col-md-6">
    				<?=input_text('alamat',$alamat)?>
    			</div>
    		</div>
    	</div>
    	<div class="form-group">
    		<label>Akre</label> 
    		<div class="row">
	    		<div class="col-md-6">
	    			<?=input_text('akre',$akre)?>
	    		</div>
    		</div>
    	</div>
    	<div class="form-group">
    		<label>Latitude</label> 
    		<div class="row">
	    		<div class="col-md-6">
	    			<?=input_text('lat',$lat)?>
	    		</div>
    		</div>
    	</div>
    	<div class="form-group">
    		<label>Longtitude</label> 
    		<div class="row">
	    		<div class="col-md-6">
	    			<?=input_text('lng',$lng)?>
	    		</div>
    		</div>
    	</div>
    	<div class="form-group">
    		<button type="submit" name="simpan" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
			<a href="<?=url($url)?>" class="btn btn-danger" ><i class="fa fa-reply"></i> Kembali</a>
    	</div>
    </form>
<?=content_close()?>

<?php  } else { ?>
<?=content_open('Data Base Sekolah')?>

<a href="<?=url($url.'&tambah')?>" class="btn btn-success" ><i class="fa fa-plus"></i> Tambah</a>
<hr>
<?=$session->pull("info")?>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama SMP</th>
			<th>NPSN</th>
			<th>Alamat</th>
			<th>Akreditas</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$no=1;
			$getdata=$db->ObjectBuilder()->get('t_hotspot');
			foreach ($getdata as $row) {
				?>
					<tr>
						<td><?=$no?></td>
						<td><?=$row->nm_smp?></td>
						<td><?=$row->npsn?></td>
						<td><?=$row->alamat?></td>
						<td><?=$row->akre?></td>
						<td>
							<a href="<?=url($url.'&ubah&id='.$row->id_smp)?>" class="btn btn-info"><i class="fa fa-edit"></i> Ubah</a>
							<a href="<?=url($url.'&hapus&id='.$row->id_smp)?>" class="btn btn-danger" onclick="return confirm('Hapus data?')"><i class="fa fa-trash"></i> Hapus</a>
						</td>
					</tr>
				<?php
				$no++;
			}

		?>
	</tbody>
</table>
<?=content_close()?>
<?php } ?>