<div class="content-wrapper">
  <section class="content-header">
      <h1>
        Data Anggota
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Anggota</li>
      </ol>
    </section>

    <section class="content">
      <?php echo $this->session->flashdata('message'); ?>
      <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Data Anggota</button>
      <a class="btn btn-danger" href="<?php echo base_url('anggota/print_angg') ?>"><i class="fa fa-print"></i> Print</a>
      <a class="btn btn-success" href="<?php echo base_url('anggota/excel_angg') ?>"><i class="fa fa-download"></i> Export to Excel</a>

      <div class="navbar-form navbar-right">
        <?php echo form_open('anggota/search') ?>
        <input type="text" name="keyword" class="form-control" placeholder="Search">
        <button type="submit" class="btn btn-success">Cari</button>
        <?php echo form_close() ?>
      </div>

      <table class="table">
        <tr>
          <th>NO</th>
          <th>NO INDUK</th>
          <th>NAMA ANGGOTA</th>
          <th>KELAS</th>
          <th>ALAMAT</th>
          <th>TANGGAL LAHIR</th>
          <th colspan="2">AKSI</th>
        </tr>

        <?php
        
        $no = 1;
        foreach ($anggota as $anggota) :  ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $anggota->no_induk?></td>
          <td><?php echo $anggota->nama?></td>
          <td><?php echo $anggota->kelas?></td>
          <td><?php echo $anggota->alamat?></td>
          <td><?php echo $anggota->tgl_lahir?></td>
          <td><?php echo anchor('anggota/detail/'.$anggota->id_anggota,'<div class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></div>')?></td>
          <td onclick="javascript: return confirm('Anda yakin ingin menghapus?') "><?php echo anchor('anggota/hapus/'.$anggota->id_anggota, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>')?></td>
          <td><?php echo anchor('anggota/edit/'.$anggota->id_anggota, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>')?></td>
        </tr>
        <?php endforeach; ?>
      </table>
    </section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Form Input Data Anggota Perpustakaan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart('anggota/tambah_aksi'); ?>
          
            <div class="form-group">
              <label>No Induk</label>
              <input type="text" name="no_induk" class="form-control">
            </div>

            <div class="form-group">
              <label>Nama Anggota</label>
              <input type="text" name="nama" class="form-control">
            </div>

            <div class="form-group">
              <label for="Kelas">Kelas</label>
              <select class="form-control" name="kelas">
                <option>X MIPA</option>
                <option>X IPS.1</option>
                <option>X IPS.2</option>
                <option>X BB</option>
                <option>XI MIPA</option>
                <option>XI IPS.1</option>
                <option>XI IPS.2</option>
                <option>XI BB</option>
                <option>XII MIPA</option>
                <option>XII IPS.1</option>
                <option>XII IPS.2</option>
                <option>XII BB</option>
              </select>
            </div>

            <div class="form-group">
              <label>Alamat</label>
              <input type="text" name="alamat" class="form-control">
            </div>

            <div class="form-group">
              <label>No Telepon</label>
              <input type="text" name="no_telp" class="form-control">
            </div>

            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" class="form-control">
            </div>

            <div class="form-group">
              <label>Tanggal Lahir</label>
              <input type="date" name="tgl_lahir" class="form-control">
            </div>

            <div class="form-group">
              <label>Upload Foto</label>
              <input type="file" name="foto" class="form-control">
            </div>

            <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
            <button type="submit" class="btn btn-primary">Simpan</button>

        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
</div>