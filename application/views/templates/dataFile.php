<div class="container-fluid">
    <div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <strong>File : <?= $files['nama_file'] ?></strong>
                        (<?= $files['created_at'] ?>)
                    </div>
                    <div class="col" style="display: flex; justify-content: flex-end">

                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a text-align="right" class="btn btn-info" href="<?= base_url('it_inventory/file_export/' . $files['id']) ?>" role="button">
                        <i class="fas fa-file-export"></i> Export Data
                    </a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                        Hapus File
                    </button>

                </div>
                <hr>
                <table class="table" id="dataTable">
                    <thead>
                        <tr>
                            <th style="width: 1%;">No</th>
                            <th style="width: 3%;">Jenis Dok</th>
                            <th>No Aju</th>
                            <th>No Daftar</th>
                            <th>Tgl Daftar</th>
                            <th>NPWP Pengusaha</th>
                            <th>Nama Pengusaha</th>
                            <th>Kode Asal Negara</th>
                            <th>Nama Pemasok</th>
                            <th>Kode Kantor</th>
                            <th>Seri Barang</th>
                            <th>Uraian Barang</th>
                            <th>Hs Code</th>
                            <th>Kode Satuan</th>
                            <th>Jml Satuan</th>
                            <th>Netto Barang</th>
                            <th>CIF Rupiah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($fileDatas as $data) {
                        ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $data['jenis_dokumen'] ?></td>
                                <td><?= $data['no_aju'] ?></td>
                                <td><?= $data['no_daftar'] ?></td>
                                <td><?= date_format(date_create($data['tgl_daftar']), "d/m/Y"); ?></td>
                                <td><?= $data['npwp_pengusaha'] ?></td>
                                <td><?= $data['nama_pengusha'] ?></td>
                                <td><?= $data['kode_negara'] ?></td>
                                <td><?= $data['nama_pemasok'] ?></td>
                                <td><?= $data['kode_kantor'] ?></td>
                                <td><?= $data['seri_barang'] ?></td>
                                <td><?= $data['uraian_barang'] ?></td>
                                <td><?= $data['hs_code'] ?></td>
                                <td><?= $data['kode_satuan'] ?></td>
                                <td><?= $data['jml_satuan'] ?></td>
                                <td><?= $data['netto_barang'] ?></td>
                                <td><?= $data['cif_rp'] ?></td>
                            </tr>
                        <?php
                        }
                        ?>


                    </tbody>
                    <tfoor>
                        <tr>
                            <th style="width: 1%;">No</th>
                            <th style="width: 3%;">Jenis Dok</th>
                            <th>No Aju</th>
                            <th>No Daftar</th>
                            <th>Tgl Daftar</th>
                            <th>NPWP Pengusaha</th>
                            <th>Nama Pengusaha</th>
                            <th>Kode Asal Negara</th>
                            <th>Nama Pemasok</th>
                            <th>Kode Kantor</th>
                            <th>Seri Barang</th>
                            <th>Uraian Barang</th>
                            <th>Hs Code</th>
                            <th>Kode Satuan</th>
                            <th>Jml Satuan</th>
                            <th>Netto Barang</th>
                            <th>CIF Rupiah</th>
                        </tr>
                    </tfoor>
                </table>

            </div>

        </div>
    </div>

</div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <strong>Perhatian!</strong> Anda akan menghapus file ini secara permanen?!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <a text-align="right" class="btn btn-danger" href="<?= base_url('it_inventory/file_delete/' . $files['id']) ?>" role="button">
                    <i class="fas fa-trash"></i> Tetap Hapus
                </a>
            </div>
        </div>
    </div>
</div>