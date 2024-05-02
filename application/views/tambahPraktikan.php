
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-widthli initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Praktikan</title>


  <link href="<?php echo base_url();?>/assets/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body >
  <div class="container mt-3">
    <h4 class="mt-4">Tambah Data Praktikan</h4>
    <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success" role="alert">
      <?php echo $this->session->flashdata('success');?>. <u><a href="<?php echo base_url();?>mahasiswa" style="color: #155724">Lihat data praktikan</a></u>
    </div>               
    <?php endif;?>
    <form method="POST" action="<?php echo base_url();?>praktikan/simpanData" enctype="multipart/form-data">                        
      <div class="card shadow-sm mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Tambah Data Mahasiswa </h6>
        </div>
        <div class="card-body">
          <label for="nama">Nama Praktikan</label>
          <div class="form-group">
            <input type="text" class="form-control form-control-user" placeholder="Masukkan Nama Praktikan" name="nama" required="">
          </div>
          <label for="nim">Nim Praktikan</label>
          <div class="form-group">
            <input type="number" class="form-control form-control-user" placeholder="Masukkan NIM Praktikan" name="nim" required="">
          </div>
          <label for="fakultas">Kelas</label>
          <div class="form-group">
          <input type="text" class="form-control form-control-user" placeholder="Masukkan Kelas Praktikan" name="kelas" required="">
          </div>
          <label for="jurusan">Jadwal</label>
          <div class="form-group">
          <input type="text" class="form-control form-control-user" placeholder="Masukkan Jadwal Praktikan" name="jadwal" required="">
          </div>
          <label for="jurusan">Sesi</label>
          <div class="form-group">
          <input type="text" class="form-control form-control-user" placeholder="Masukkan Sesi Praktikan" name="sesi" required="">
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
          <a href="<?php echo base_url();?>" class="btn btn-default">Batal</a>
        </div>
      </div>
    </form>      
    <footer class="mt-5 mb-3">
    <div class="container my-auto">
      <div class="text-center my-auto">
      </div>
    </div>
  </footer> 
  </div>                   

  <script src="<?php echo base_url(); ?>/assets/jquery/jquery.slim.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
