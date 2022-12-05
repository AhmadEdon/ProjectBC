<?php
defined('BASEPATH') or exit('No Direct script access allowed');

class DataModel extends CI_Model
{
    protected $table = 'db_data';
    public function create($key)
    {
        $data = array(
            'id_file' => $key['id_file'],
            'jenis_dokumen' => $key['0'],
            'no_aju' => $key['1'],
            'no_daftar' => $key['2'],
            'tgl_daftar' => $key['3'],
            'npwp_pengusaha' => $key['4'],
            'nama_pengusha' => $key['5'],
            'kode_negara' => $key['6'],
            'nama_pemasok' => $key['7'],
            'kode_kantor' => $key['8'],
            'seri_barang' => $key['9'],
            'uraian_barang' => $key['10'],
            'hs_code' => $key['11'],
            'kode_satuan' => $key['12'],
            'jml_satuan' => $key['13'],
            'netto_barang' => $key['14'],
            'cif_rp' => $key['15'],
        );

        $result =  $this->db->insert($this->table, $data);
    }
    public function getByFileId($key)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        // $this->db->limit(2);
        $this->db->where('id_file=', $key);
        $datas = $this->db->get();

        return $datas->result_array();
    }
}
