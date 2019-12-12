
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manager</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manager</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <a class="btn btn-primary" href="<?php echo base_url('c_admin/tambah_man');?>"><i class="fas fa-plus"></i> Tambah Data Manager</a>
      <div class="card">
            <div class="card-header">

            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-striped table-bordered table-sm">
              <thead>
              <tr>
                <th>No.</th>
                <th>Nik</th>
                <th>Nama</th>
                <th>E-mail</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Tanggal Lahir</th>
                <th>Role/Level</th>
                <th colspan="2">Option</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
                foreach ($manager as $man) :
              ?>
              <tr>
                <td><?php echo $no++;?></td>
                <td><?php echo $man->nik;?></td>
                <td><?php echo $man->name;?></td>
                <td><?php echo $man->email;?></td>
                <td><?php echo $man->jk;?></td>
                <td><?php echo $man->agama;?></td>
                <td><?php echo $man->tgl_lahir;?></td>
                <td><?php echo $man->role;?></td>
                <td><?php echo anchor('c_admin/edit_man/'.$man->id_manager,('<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>'));?></td>
                <td><div onclick="javascript: return confirm('Anda yakin ingin menghapus data ini ?')"><?php echo anchor('c_admin/hapus_man/'.$man->email,('<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>'));?></div></td>
              </tr>

              <?php endforeach; ?>
            </tbody>
            <tfoot>
            </tfoot>
            </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

    </section>

    <!-- Modal -->
    <div class="modal fade" id="tambah_manager" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Tamabah Daftar Manager</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="<?php echo base_url('c_admin/tambah_manager'); ?>">

              <?= $this->session->flashdata('message'); ?>
              <div class="form-group">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" placeholder="Nama">
              </div>

              <div class="form-group">
                <label>E-mail</label>
                <input type="text" name="email" class="form-control" placeholder="E-mail">
              </div>

              <div class="form-group">
                <label>Password</label>
                <input type="password" id="password1" name="password1"  class="form-control" placeholder="Password">
                <?= form_error('password1','<small class="text-danger pl-3">','</small>'); ?>
              </div>
              <div class="form-group">
                <label>Ulangi Password</label>
                <input type="password" class="form-control" id="password2" name="password2" placeholder="Repeat Password">
                <input type="hidden" name="role" value="manager">
              </div>
              <button type="reset" class="btn btn-denger" data-dismiss="modal">Reset</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
  
