<?php

class Anggota extends CI_Controller{
    public function index()
    {
        $data['anggota'] = $this->anggota_m->tampil_data()->result();
        $this->load->view('template/_header');
        $this->load->view('data/anggota', $data);
        $this->load->view('template/_footer');
    }

    public function tambah_aksi(){
        $this->load->model('anggota_m');

        $no_induk   = $this->input->post('no_induk');
        $nama       = $this->input->post('nama');
        $kelas      = $this->input->post('kelas');
        $alamat     = $this->input->post('alamat');
        $no_telp    = $this->input->post('no_telp');
        $email      = $this->input->post('email');
        $tgl_lahir  = $this->input->post('tgl_lahir');
        $foto       = $_FILES['foto'];
        if ($foto=''){}else{
            $config['upload_path']  = './assets/foto';
            $config['allowed_types'] = 'jpg|png|gif';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('foto')){
                echo "Upload Gagal"; die();
            }else{
                $foto=$this->upload->data('file_name');
            }
        }

        $data = array(
            'no_induk'  => $no_induk,
            'nama'      => $nama,
            'kelas'     => $kelas,
            'alamat'    => $alamat,
            'no_telp'   => $no_telp,
            'email'     => $email,
            'tgl_lahir' => $tgl_lahir,
            'foto'      => $foto
        );

        $this->anggota_m->input_data($data, 'tbl_anggota');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"
              aria-label="Close"><span aria-hidden="true">&times;</span></button>
              Data Berhasil Ditambahkan!
            </div>');
        redirect('anggota/index');
    }

    public function hapus ($id_anggota)
    {
        $where = array ('id_anggota' => $id_anggota);
        $this->anggota_m->hapus_data($where, 'tbl_anggota');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"
              aria-label="Close"><span aria-hidden="true">&times;</span></button>
              Data Berhasil Dihapus!
            </div>');
        redirect('anggota/index');
    }

    public function edit($id_anggota)
    {
        $where = array('id_anggota' => $id_anggota);
        $data['anggota'] = $this->anggota_m->edit_data($where, 'tbl_anggota')->result();
        $this->load->view('template/_header');
        $this->load->view('data/edit', $data);
        $this->load->view('template/_footer');
    }
    public function update()
    {
        $id_anggota = $this->input->post('id_anggota');
        $no_induk = $this->input->post('no_induk');
        $nama = $this->input->post('nama');
        $kelas = $this->input->post('kelas');
        $alamat = $this->input->post('alamat');
        $no_telp = $this->input->post('no_telp');
        $email = $this->input->post('email');
        $tgl_lahir = $this->input->post('tgl_lahir');

        $data = array(
            'no_induk'  => $no_induk,
            'nama'      => $nama,
            'kelas'     => $kelas,
            'alamat'    => $alamat,
            'no_telp'   => $no_telp,
            'email'     => $email,
            'tgl_lahir' => $tgl_lahir
        );

        $where = array(
            'id_anggota' => $id_anggota
        );

        $this->anggota_m->update_data($where,$data,'tbl_anggota');
        $this->session->set_flashdata('message', '<div class="alert alert-primary alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"
              aria-label="Close"><span aria-hidden="true">&times;</span></button>
              Data Berhasil Diupdate!
            </div>');
        redirect('anggota/index');
    }

    public function detail($id_anggota)
    {
        $this->load->model('anggota_m');
        $detail = $this->anggota_m->detail_data($id_anggota);
        $data['detail'] = $detail;
        $this->load->view('template/_header');
        $this->load->view('data/detail', $data);
        $this->load->view('template/_footer');
    }

    public function print_angg()
    {
        $data['anggota'] = $this->anggota_m->tampil_data("tbl_anggota")->result();
        $this->load->view('data/print_anggota', $data);
    }

    public function excel_angg()
    {
        $data['anggota'] = $this->anggota_m->tampil_data("tbl_anggota")->result();

        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();

        $object->getProperties()->setCreator("Nur Wakhid Bagus Riyanto");
        $object->getProperties()->setLastModifiedBy("Nur Wakhid Bagus Riyanto");
        $object->getProperties()->setTitle("Daftar Anggota Perpustakaan");

        $object->setActiveSheetIndex(0);

        $object->getActiveSheet()->setCellValue('A1', 'NO');
        $object->getActiveSheet()->setCellValue('B1', 'NO INDUK');
        $object->getActiveSheet()->setCellValue('C1', 'NAMA ANGGOTA');
        $object->getActiveSheet()->setCellValue('D1', 'KELAS');
        $object->getActiveSheet()->setCellValue('E1', 'ALAMAT');
        $object->getActiveSheet()->setCellValue('F1', 'NO TELEPON');
        $object->getActiveSheet()->setCellValue('G1', 'EMAIL');
        $object->getActiveSheet()->setCellValue('H1', 'TANGGAL LAHIR');

        $baris = 2;
        $no = 1;

        foreach ($data['anggota'] as $anggota ) {
           $object->getActiveSheet()->setCellValue('A'.$baris, $no++);
           $object->getActiveSheet()->setCellValue('B'.$baris, $anggota->no_induk);
           $object->getActiveSheet()->setCellValue('C'.$baris, $anggota->nama);
           $object->getActiveSheet()->setCellValue('D'.$baris, $anggota->kelas);
           $object->getActiveSheet()->setCellValue('E'.$baris, $anggota->alamat);
           $object->getActiveSheet()->setCellValue('F'.$baris, $anggota->no_telp);
           $object->getActiveSheet()->setCellValue('G'.$baris, $anggota->email);
           $object->getActiveSheet()->setCellValue('H'.$baris, $anggota->tgl_lahir);

           $baris++;
        }

        $filename="Data_Anggota".'.xlsx';

        $object->getActiveSheet()->setTitle("Data Anggota Perpustakaan");
        
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename. '"');
        header('Cache-Control: max-age=0');

        $writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
        $writer->save('php://output');

        exit;
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['anggota']=$this->anggota_m->get_keyword($keyword);
        $this->load->view('template/_header');
        $this->load->view('data/anggota', $data);
        $this->load->view('template/_footer');

    }
}