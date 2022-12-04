<div class="content-wrapper">

  <section class="content">
    <div class="container-fluid">

      <section class="content">
        <form id="form-upload-user" method="post" autocomplete="off">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Upload Data CEISA</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label class="control-label">Jenis Dokumen</label>
                <select class="form-control" id="jenis_dokumen" name="jenis_dokumen">
                  <option selected value="40">BC 4.0</option>
                  <option value="41">BC 4.1</option>
                  <option value="27">BC 2.7 OUT</option>
                  <option value="23">BC 2.3</option>
                  <option value="25">BC 2.5</option>
                  <option value="261">BC 2.6.1</option>
                  <option value="262">BC 2.6.2</option>
                </select>
              </div>

              <form action="" method="POST" enctype="multipart/form-data">
                <label class="control-label">Input File</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend"></div>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="file_upload_ceisa" aria-describedby="inputGroupFileAddon01" name="file_upload_ceisa" accept=".xlsx" value="Upload" required>
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    <small class="text-warning">Khusus file dengan ekstensi xlsx hasil download dari CEISA TPB.</small>
                  </div>
                </div>
              </form>

              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-user btn-block btn-sm" id="btnUpload">Upload</button>
              </div>

              <div class="form-group">
                <div class="text-center">
                  <div id="user-loader-ceisa" style="display: none; ">
                    <i class="fa fa-spinner fa-spin"></i> <small>Memproses ...</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
    </form>

</div>

</div>