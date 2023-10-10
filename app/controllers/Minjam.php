<?php

class Minjam extends Controller {

    public function index()
    {
        $data['judul'] = 'Data Peminjaman';
        $data['minjam'] = $this->model('MinjamModel')->getAllMinjam();
        $this->view('templatess/header', $data);
        $this->view('minjam/index', $data);
        $this->view('templatess/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Tambah Peminjaman';
        $this->view('templatess/header', $data);
        $this->view('minjam/create');
        $this->view('templatess/footer');
    }

    public function simpanMinjam(){
        if( $this->model("MinjamModel")->tambahMinjam($_POST) > 0 ) {
            header('location: '. BASE_URL . '/minjam/index');
            exit;
        }else{
            header('location: '. BASE_URL . '/minjam/index');
            exit;
        }
    }

    public function edit($id){

        $data['judul'] = 'Edit Peminjaman';
        $data['minjam'] = $this->model('MinjamModel')->getMinjamById($id);
        $this->view('templatess/header', $data);
        $this->view('minjam/edit', $data);
        $this->view('templatess/footer');
    }

    public function updateMinjam(){
        if( $this->model('MinjamModel')->updateDataMinjam($_POST) > 0) {
            header('location: '. BASE_URL . '/minjam/index');
            exit;
        }else{
            header('location: '. BASE_URL . '/minjam/index');
            exit;
        }
    }

    public function hapus($id){
            if ( $this->model('MinjamModel')->deleteMinjam($id) > 0) {
                header('location: '. BASE_URL . '/minjam/index');
                exit;
            }else{
                header('location: '. BASE_URL . '/minjam/index');
                exit;
            }
    }
   
}
?>