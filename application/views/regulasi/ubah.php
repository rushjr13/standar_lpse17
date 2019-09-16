<form action="<?=base_url('regulasi/edit/').$regulasi['id_regulasi'] ?>" method="post">
	<div class="card shadow border-primary">
	  <div class="card-header bg-primary text-white">
	    <?=$regulasi['nama_regulasi'] ?>
	    <a href="<?=base_url('regulasi') ?>" class="btn btn-sm btn-circle btn-danger float-right" title="Kembali"><i class="fa fa-fw fa-times"></i></a>
	    <button type="submit" class="btn btn-sm btn-circle btn-info float-right mr-2" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
	  </div>
	  <div class="card-body">
	  	<input type="hidden" name="nama_regulasi" value="<?=$regulasi['nama_regulasi'] ?>">
	    <textarea class="form-control ckeditor" rows="5" id="isi_regulasi" name="isi_regulasi"><?=$regulasi['isi_regulasi'] ?></textarea>
	    <?php echo form_error('isi_regulasi', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
	  </div>
	  <?php
      date_default_timezone_set('Asia/Makassar');
        $tgl = date('d', $regulasi['tgl_update']);
        $bln = date('F', $regulasi['tgl_update']);
        $thn = date('Y', $regulasi['tgl_update']);
        $hari = date('l', $regulasi['tgl_update']);
        $h = date('H', $regulasi['tgl_update']);
        $i = date('i', $regulasi['tgl_update']);
        $s = date('s', $regulasi['tgl_update']);

        if($bln=='January'){
            $bulan='Januari';
        } else if($bln=='February'){
            $bulan='Februari';
        } else if($bln=='March'){
            $bulan='Maret';
        } else if($bln=='April'){
            $bulan='April';
        } else if($bln=='May'){
            $bulan='Mei';
        } else if($bln=='June'){
            $bulan='Juni';
        } else if($bln=='July'){
            $bulan='Juli';
        } else if($bln=='August'){
            $bulan='Agustus';
        } else if($bln=='September'){
            $bulan='September';
        } else if($bln=='October'){
            $bulan='Oktober';
        } else if($bln=='November'){
            $bulan='November';
        } else if($bln=='December'){
            $bulan='Desember';
        }

        if($hari=='Sunday'){
          $hr='Minggu';
        } else if($hari=='Monday'){
          $hr='Senin';
        } else if($hari=='Tuesday'){
          $hr='Selasa';
        } else if($hari=='Wednesday'){
          $hr='Rabu';
        } else if($hari=='Thursday'){
          $hr='Kamis';
        } else if($hari=='Friday'){
          $hr='Jumat';
        } else if($hari=='Saturday'){
          $hr='Sabtu';
        }

        if($h<10){
        	$h='0'.$h;
        }

        if($i<10){
        	$i='0'.$i;
        }

        if($s<10){
        	$s='0'.$s;
        }

        $tgl_update = $hr.', '.$tgl.' '.$bulan.' '.$thn.' - '.$h.':'.$i.':'.$s;
    ?>
	  <div class="card-footer text-center">
	  	<small>Terakhir di perbarui : <?=$tgl_update ?></small>
	  </div>
	</div>
</form>