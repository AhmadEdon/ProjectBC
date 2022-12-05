<?php
defined('BASEPATH') or exit('No Direct script access allowed');

class FileModel extends CI_Model
{
    protected $table = 'db_file';
    public function create($key)
    {
        $data = array(
            'nama_file' => $key['name'],
            'dir_file' => $key['dir'],
            'created_at' => date("Y-m-d H:i:s"),
        );
        $result =  $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function getAll()
    {
        $this->db->select('*');
        $this->db->from($this->table);

        $files = $this->db->get();

        return $files->result_array();
    }
    public function getById($key)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('id=', $key);
        $file = $this->db->get();

        return $file->row_array();
    }
    public function delete($key)
    {
        $this->db->where('id=', $key);
        $this->db->delete($this->table);
    }
}
