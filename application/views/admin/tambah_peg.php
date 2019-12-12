<div class="content-wrapper">
	
	<section class="content">
		<div class="p-5">
		  <div class="text-center">
	        <h1 class="h4 text-gray-900 mb-4">Tambah Pegawai</h1>
	      </div>
            <form method="post" action="<?php echo base_url('c_admin/tambah_pegawai'); ?>">
	        <div class="form-group">
	          <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Full name" value="<?= set_value ('name'); ?>">
	          <?= form_error('name','<small class="text-danger pl-3">','</small>'); ?>
	        </div>
	        <div class="form-group">
	          <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= set_value ('email'); ?>">
	           <?= form_error('email','<small class="text-danger pl-3">','</small>'); ?>
	        </div>
	        <div class="form-group row">
	          <div class="col-sm-6 mb-3 mb-sm-0">
	            <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
	            <?= form_error('password1','<small class="text-danger pl-3">','</small>'); ?>
	          </div>
	          <div class="col-sm-6">
	            <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                <input type="hidden" name="role" value="pegawai">
	          </div>
	        </div>
	        <button type="submit" class="btn btn-primary btn-user btn-block">
	          Tambah Akun
	        </button>
	      </form>
	      <hr>
	     </div>
	</section>

</div>