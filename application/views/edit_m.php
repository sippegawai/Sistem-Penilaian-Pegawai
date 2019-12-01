<div class="content-wrapper">
	
	<section class="content">
		<?php foreach ($manager as $man ) {?>
			<form action="<?php echo base_url('admin/update_man'); ?>" method="post">

	              <div class="form-group">
	                <label>Nik</label>
	                <input type="hidden" name="id_manager" value="<?php echo $man->id_manager ?>" class="form-control">
	                <input type="text" id="nik"  name="nik" class="form-control" placeholder="Nik" value="<?php echo $man->nik ?>">
	              </div>
					<div class="form-group">
	                <label>Nama</label>
	                <input type="text" name="name" class="form-control" placeholder="Nama" value="<?php echo $man->name ?>">
	              </div>

	              <div class="form-group">
	                <label>E-mail</label>
	                <input type="text" id="email"  name="email" class="form-control" placeholder="E-mail" value="<?php echo $man->email ?>">
	              </div>

	              <div class="form-group">
	                <label>Jenis Kelamin</label>
	                <input type="text" id="jk"  name="jk" class="form-control" placeholder="Jenis Kelamin" value="<?php echo $man->jk ?>">
	              </div>

	              <div class="form-group">
	                <label>agama</label>
	                <input type="text" id="agama"  name="agama" class="form-control" placeholder="Agama" value="<?php echo $man->agama ?>">
	              </div>

	              <div class="form-group">
	                <label>Tanggal Lahir</label>
	                <input type="date" id="tgl_lahir"  name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" value="<?php echo $man->tgl_lahir ?>">
	              </div>
	              <button type="reset" class="btn btn-denger" data-dismiss="modal">Reset</button>
	              <button type="submit" class="btn btn-primary">Simpan</button>
			</form>
		<?php }?>
	</section>

</div>