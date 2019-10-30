<?php defined('BASEPATH') OR exit('No Direct Script Allowed');

class URLcontroler extends CI_Controller{
    public function konfirmasi(){
        $id = $this->input->post('idbeli');
        $array = [
            'DETAIL.ID_PRODUCT' => 'PRODUCT.ID_PRODUCT'
        ];
        $this->db->select(
            'DETAIL.ID_DETAIL
            ,DETAIL.ID_PRODUCT
            ,NAMA_PRODUCT
            ,HARGA
            ,KUANTITAS
            ,(KUANTITAS*HARGA) AS "SUBTOTAL"');
        $this->db->from('DETAIL');
        $this->db->join('PRODUCT', 'DETAIL.ID_PRODUCT = PRODUCT.ID_PRODUCT');
        $this->db->where('DETAIL.ID_BELI',$id);
        $konfirmasi = $this->db->get();
        $this->db->select('SUM(DETAIL.KUANTITAS * PRODUCT.HARGA) AS TOTAL');
        $this->db->from('DETAIL');
        $this->db->join('PRODUCT', 'DETAIL.ID_PRODUCT = PRODUCT.ID_PRODUCT');
        $this->db->where('ID_BELI',$id);
        $total = $this->db->get()->row();
        $data = [
            'ID_BELI' => $id,
            'title' => 'Daftar Belanjaan', 
            'page' => 'konfirmasi',
            'konten' => $konfirmasi,
            'total' => $total
        ];

        $this->load->view('frontend/index', $data);
    }

    public function index(){
        $konten = 'lorem ipsum';
        $data = [
            'title' => 'Halaman Utama', 
            'page' => 'dashboard',
            'konten' => $konten
        ];

        $this->load->view('frontend/index', $data);
    }

    public function pembelian(){
        $konten = 'lorem ipsum';
        $obat = $this->db->get('PRODUCT');
        $data = [
            'title' => 'Halaman Transaksi', 
            'page' => 'pembelian',
            'konten' => $konten,
            'obat' => $obat
        ];
        $this->load->view('frontend/index', $data);    
    }

    public function tampilProduk(){
        $this->db->from('PRODUCT');
        $this->db->order_by('ID_PRODUCT');
        $produk = $this->db->get();
        $data = [
            'title' => 'Halaman Produk',
            'page' => 'produk',
            'konten' => $produk
        ];

        $this->load->view('frontend/index', $data, FALSE);
    }

    public function riwayatIdBeli(){
        $this->db->from('PEMBELIAN');
        $this->db->order_by('TANGGAL', 'ASC');
        $riwayat = $this->db->get();
        $this->db->select('SUM(TOTAL) AS PENDAPATAN');
        $this->db->from('PEMBELIAN');
        $pendapatan = $this->db->get()->row();
        $data = [
            'title' => 'Riwayat Transaki',
            'page' => 'riwayatIdBeli',
            'konten' => $riwayat,
            'pendapatan' => $pendapatan,
        ];

        $this->load->view('frontend/index', $data, FALSE);
    }
    
    public function formInsertProduk(){
        $data = [
            'title' => "Insert Produk",
            'page' => 'insertproduk'
        ];

        $this->load->view('frontend/index', $data, FALSE);
    }

    public function formUpdateProduk($id){
        $this->db->where('ID_PRODUCT',$id);
        $produk = $this->db->get('PRODUCT')->row();
        $data = [
            'title' => 'Update Produk',
            'page' => 'updateproduk',
            'konten' => $produk
        ];
        $this->load->view('frontend/index', $data, FALSE);
    }

    public function detailBeli($id){
        $this->db->select(
            'ID_PRODUCT
            ,NAMA_PRODUCT
            ,HARGA
            ,KUANTITAS
            ,SUBTOTAL
            ,TOTAL');
        $this->db->from('RIWAYAT');
        $this->db->join('PEMBELIAN', 'PEMBELIAN.ID_BELI = RIWAYAT.ID_BELI');
        $this->db->where('RIWAYAT.ID_BELI',$id);
        $detail = $this->db->get();
        $data = [
            'title' => 'Detail Pembelian', 
            'page' => 'detailBeli',
            'konten' => $detail
        ];

        $this->load->view('frontend/index', $data);
    }

    public function formUpdateBeli($id){
        $this->db->where('ID_DETAIL',$id);
        $beli = $this->db->get('DETAIL')->row();
        $data = [
            'title' => 'Update Pembelian',
            'page' => 'updatebeli',
            'konten' => $beli
        ];
        $this->load->view('frontend/index', $data, FALSE);
    }
}