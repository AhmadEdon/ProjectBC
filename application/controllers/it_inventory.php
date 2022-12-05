<?php

defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xslx;

class it_inventory extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper(array('form', 'url'));
  }


  public function index()
  {

    $data['title'] = 'Home';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $auth = $this->session->userdata('email');
    if (empty($auth)) {
      redirect('');
    }




    // get file from db
    $this->load->model('FileModel');
    $data['files'] = $this->FileModel->getAll();


    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('templates/it_inventory', $data);
    $this->load->view('templates/footer');
  }
  public function file($id)
  {
    $auth = $this->session->userdata('email');
    if (empty($auth)) {
      redirect('');
    }
    $data['title'] = 'Home';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    // get file
    $this->load->model('FileModel');
    $data['files'] = $this->FileModel->getById($id);

    // get file data
    $this->load->model('DataModel');
    $data['fileDatas'] = $this->DataModel->getByFileId($id);


    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('templates/dataFile', $data);
    $this->load->view('templates/footer');
  }

  public function file_download($id)
  {
    // $this->load->model('FileModel');
    // $file = $this->FileModel->getById($id);
    // $this->load->helper('download');

    // ob_clean();
    // $path = file_get_contents(base_url("uploads/") . $file['dir_file']);
    // force_download($file['dir_file'], $path);
  }
  public function file_delete($id)
  {
    $this->load->model('FileModel');
    $this->FileModel->delete($id);

    $this->session->set_flashdata('success', 'File berhasil dihapus.');

    redirect(base_url('it_inventory'));
  }

  public function file_export($id)
  {
    $this->load->model('FileModel');
    $file = $this->FileModel->getById($id);
    $this->load->model('DataModel');
    $datas = $this->DataModel->getByFileId($id);


    // new spreadsheet
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // set thead
    $sheet->setCellValue('A1', 'Jenis Dokumen');
    $sheet->setCellValue('B1', 'No Aju');
    $sheet->setCellValue('C1', 'No Daftar');
    $sheet->setCellValue('D1', 'Tanggal Daftar');
    $sheet->setCellValue('E1', 'NPWP Pengusaha');
    $sheet->setCellValue('F1', 'Nama Pengusaha');
    $sheet->setCellValue('G1', 'Kode Negara');
    $sheet->setCellValue('H1', 'Nama Pemasok');
    $sheet->setCellValue('I1', 'Kode Kantor');
    $sheet->setCellValue('J1', 'Seri Barang');
    $sheet->setCellValue('K1', 'Uraian Barang');
    $sheet->setCellValue('L1', 'HS Code');
    $sheet->setCellValue('M1', 'Kode Satuan');
    $sheet->setCellValue('N1', 'Jumlah Satuan');
    $sheet->setCellValue('O1', 'Netto Barang');
    $sheet->setCellValue('P1', 'CIF Rupiah');

    // stylize
    $array = array(
      'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P'
    );
    foreach ($array as $alp) {
      $spreadsheet->getActiveSheet()->getColumnDimension($alp)->setAutoSize(TRUE);
      $sheet->getStyle($alp . '1')->getFont()
        ->setBold(true);
      $sheet->getStyle($alp . '1')->getFont()
        ->getColor()
        ->setARGB('ffffff');
      $sheet->getStyle($alp . '1')->getFill()
        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
        ->getStartColor()
        ->setARGB('70AD47');
    }

    // set tbody
    $i = 2;
    foreach ($datas as $data) {
      $sheet->setCellValue('A' . $i, strval($data['jenis_dokumen']));
      $sheet->setCellValue('B' . $i, strval($data['no_aju']));
      $sheet->setCellValue('C' . $i, strval($data['no_daftar']));
      $sheet->setCellValue('D' . $i, date_format(date_create($data['tgl_daftar']), "d/m/Y"));
      $sheet->setCellValue('E' . $i, strval($data['npwp_pengusaha']));
      $sheet->setCellValue('F' . $i, strval($data['nama_pengusha']));
      $sheet->setCellValue('G' . $i, strval($data['kode_negara']));
      $sheet->setCellValue('H' . $i, strval($data['nama_pemasok']));
      $sheet->setCellValue('I' . $i, strval($data['kode_kantor']));
      $sheet->setCellValue('J' . $i, strval($data['seri_barang']));
      $sheet->setCellValue('K' . $i, strval($data['uraian_barang']));
      $sheet->setCellValue('L' . $i, strval($data['hs_code']));
      $sheet->setCellValue('M' . $i, strval($data['kode_satuan']));
      $sheet->setCellValue('N' . $i, strval($data['jml_satuan']));
      $sheet->setCellValue('O' . $i, strval($data['netto_barang']));
      $sheet->setCellValue('P' . $i, strval($data['cif_rp']));

      // set line color
      if (fmod($i, 2) == 1) {
        foreach ($array as $alp) {
          $sheet->getStyle($alp . $i)->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('E2EFDA');
        }
      }

      // style tbody
      foreach ($array as $alp) {
        $sheet->getStyle($alp . $i)
          ->getAlignment()
          ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
      }


      $i++;
    }

    // set to xlsx
    $writer = new Xlsx($spreadsheet);

    // set header
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Dispotition: attachment; filename="' . $file['dir_file'] . '.xlsx"');

    // save to excel

    $writer->save('php://output');
  }
  public function import()
  {
    $this->load->library('upload');
    // $spreadsheet = new Spreadsheet / read();

    $namaFile = $_FILES['excel']['name'];
    $extension = pathinfo($namaFile, PATHINFO_EXTENSION);
    $result = [];
    // cek extension file
    // path C:\laragon\www\ProjectBC\application\file

    // parse filename 
    $file = $_FILES['excel'];
    $key['name'] = pathinfo($file['name'], PATHINFO_FILENAME);
    $uniqId = uniqid();
    $file['name'] = $uniqId . "-" . $file['name'];
    $key['dir'] = $file['name'];

    // // config
    // $config['upload_path']          = 'uploads/';
    // $config['overwrite']          = TRUE;
    // $config['file_name']  =  $file['name'];
    // $config['allowed_types'] = 'csv|xls|xlsx';
    // $this->load->library('upload');
    // $this->upload->initialize($config);




    if ($extension == 'csv') {
      $reader = new PhpOffice\PhpSpreadsheet\Reader\Csv();
      $spreadsheet = $reader->load($_FILES['excel']['tmp_name']);
      $sheetdata  = $spreadsheet->getActiveSheet()->toArray();

      // if ($this->upload->do_upload('excel')) {


      // call push
      $result =  $this->push($sheetdata, $key);
      // } else {
      // $error = array('error' => $this->upload->display_errors());

      // var_dump($error);
      // }
    } else if ($extension == 'xlsx' || $extension == 'xls') {
      $reader = new PhpOffice\PhpSpreadsheet\Reader\Xlsx();
      $spreadsheet = $reader->load($_FILES['excel']['tmp_name']);
      $sheetdata  = $spreadsheet->getActiveSheet()->toArray();

      // if ($this->upload->do_upload('excel')) {


      // call push
      $result = $this->push($sheetdata, $key);
      // } else {
      // $error = array('error' => $this->upload->display_errors());

      // var_dump($error);
      // }
    }

    // set flash data
    if ($result['bol'] = true) {
      $this->session->set_flashdata('success', $result['msg']);
    } else {
      $this->session->set_flashdata('fail',  $result['msg']);
    }
    // redirect
    redirect('it_inventory');
  }

  private function push($datas, $key)
  {
    $msg = " ";
    $result = false;

    // push file to db
    $this->load->model('FileModel');
    if ($idFile = $this->FileModel->create($key)) {
      $result = true;

      // unset data no 0
      unset($datas[0]);

      // push data to db
      $this->load->model('DataModel');

      $i = 2;
      foreach ($datas as $data) {
        $data['id_file'] = $idFile;
        if ($this->DataModel->create($data)) {
        } else {
          $msg = "error pada file excel row " . $i++;
        }
      }


      $msg = "import excel suksess ";
    } else {

      $msg = "error saat upload file";
    }

    // return
    return $arr = array(
      'msg' => $msg,
      'bol' => $result,
    );
  }
}
