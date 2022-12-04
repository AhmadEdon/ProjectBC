<div class="card">
  <div class="card-header">
    <h3 class="card-title">Upload Data IT Inventory</h3>
  </div>
  <div class="card-body">
    <span id="data_csv">
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

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Type</label>
        </div>
        <select class="custom-select" id="inputGroupSelect01">
          <option selected>Choose...</option>
          <option value="csv">CSV</option>
          <option value="xlsx">Excel (.xlsx)</option>
        </select>
      </div>

      <div class="form-group">
        <label class="control-label">Pilih Delimeter</label>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Delimeter</label>
          </div>
          <select class="custom-select" id="inputGroupSelect01">
            <option selected>Choose Delimeter...</option>
            <option value="1">Koma(,)</option>
            <option value="2">Titik Koma(;)</option>
            <option value="3">Tab( )</option>
          </select>
        </div>
      </div>

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
      </div>
      <!-- </div>
        <input type="file" class="form-control form-control-sm" id="file_upload_it_inv_csv" name="file_upload_it_inv_csv" accept=".csv">
        <small class="text-danger">Khusus file dengan ekstensi csv.</small>
      </div> -->

      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-user btn-block btn-sm waves-effect waves-light" id="btnUpload">Upload</button>
      </div>

      <div class="form-group">
        <div class="text-center">
          <div class="user-loader-it-inv" style="display: none; ">
            <i class="fa fa-spinner fa-spin"></i> <small>Memproses ...</small>
          </div>
        </div>
      </div>
    </span>

  </div>
</div>
</div>