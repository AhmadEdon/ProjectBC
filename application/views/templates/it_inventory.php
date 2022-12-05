<div class="container-fluid">
  <?php
  if (!empty($this->session->flashdata('success'))) {
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>' . $this->session->flashdata('success') . '</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>';
  } else if (!empty($this->session->flashdata('fail'))) {
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>' . $this->session->flashdata('fail') . '</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>';
  }
  ?>

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Upload Data IT Inventory</h3>
    </div>


    <div class="card-body">
      <!-- <span id="data_csv">
      <div>
        Format Data CSV Data IT Inventory
        <table class='table'>
          <tr>
            <th>No. Dokumen</th>
            <th>NO. Aju</th>
            <th>No. Daftar</th>
            <th>Tgl. Daftar</th>
            <th>Nama Pengusaha</th>
            <th>Nama Pemasok</th>
            <th>Kode kantor bongkar</th>
          </tr>
        </table>
      </div>


      -->

      <!-- 
    <div class="form-group">
      <label class="control-label">Input File</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend"></div>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="file_upload_it" aria-describedby="inputGroupFileAddon01" name="file_upload_it" required>
          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
          <small class="text-warning"></small>
        </div>
      </div>
    </div> -->

      <?php echo form_open_multipart('it_inventory/import'); ?>
      <div>
        <div class="custom-file">
          <input type="file" name="excel" class="custom-file-input" id="inputGroupFile02">
          <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
        </div>
        <div class="mt-2">
          <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </div>
      </div>

      <?php echo form_close(); ?>
      <!-- </div>
        <input type="file" class="form-control form-control-sm" id="file_upload_it_inv_csv" name="file_upload_it_inv_csv" accept=".csv">
        <small class="text-danger">Khusus file dengan ekstensi csv.</small>
      </div> -->

      <!-- <div class="form-group">

      <button type="submit" class="btn btn-primary btn-user btn-block btn-sm waves-effect waves-light" id="btnUpload">Upload</button>
    </div> -->

      <!-- <div class="form-group">
        <div class="text-center">
          <div class="user-loader-it-inv" style="display: none; ">
            <i class="fa fa-spinner fa-spin"></i> <small>Memproses ...</small>
          </div>
        </div>
      </div>
      </span> -->
      <hr>
      <div class="mt-2">
        <table class="table" id="dataTable">
          <thead>
            <tr>
              <th style="width: 10%;">No</th>
              <th>Nama File</th>
              <th>Tanggal Masuk</th>
              <th style="width: 10%;">Menu</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
            foreach ($files as $file) {
            ?>
              <tr>
                <td scope="row"><?= $i++ ?></td>
                <td><?= $file['nama_file'] ?></td>
                <td><?= $file['created_at'] ?></td>

                <td>
                  <div class="btn-group" role="group" aria-label="Basic example">


                    <a class="btn btn-info" href="<?= base_url('it_inventory/file_export/' . $file['id']) ?>" role="button"><i class="fas fa-file-export"></i></a>
                    <a class="btn btn-primary" href="<?= base_url('it_inventory_file/' . $file['id']) ?>" role="button"><i class="fas fa-file-alt"></i></a>

                  </div>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>