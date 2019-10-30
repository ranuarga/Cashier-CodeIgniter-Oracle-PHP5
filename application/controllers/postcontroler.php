<?php
defined('BASEPATH') OR exit('No Direct Script Allowed');

class postcontroler extends CI_Controller{
    public function cetaknota($id){
        $this->db->select('SUM(DETAIL.KUANTITAS * PRODUCT.HARGA) AS TOTAL');
        $this->db->from('DETAIL');
        $this->db->join('PRODUCT', 'DETAIL.ID_PRODUCT = PRODUCT.ID_PRODUCT');
        $this->db->where('ID_BELI',$id);
        $total = $this->db->get()->row();
        $obj1 = [
            'ID_BELI'   => $id,
            'TOTAL'     => $total->TOTAL,
            'TANGGAL'   => date('Y-m-d')
        ];
        $this->db->insert('PEMBELIAN', $obj1);
        $this->db->select(
            'ID_DETAIL
            ,DETAIL.ID_BELI
            ,DETAIL.ID_PRODUCT
            ,NAMA_PRODUCT
            ,HARGA
            ,KUANTITAS
            ,(KUANTITAS*HARGA) AS "SUBTOTAL"
            ,TOTAL');
        $this->db->from('PEMBELIAN');
        $this->db->join('DETAIL', 'DETAIL.ID_BELI = PEMBELIAN.ID_BELI');
        $this->db->join('PRODUCT', 'DETAIL.ID_PRODUCT = PRODUCT.ID_PRODUCT');
        $this->db->where('DETAIL.ID_BELI',$id);
        $nota = $this->db->get()->result();
        $insertObj = [];
        foreach($nota as $data){
            array_push($insertObj, [
                'ID_BELI'       => $id,
                'ID_DETAIL'     => $data->ID_DETAIL,
                'ID_PRODUCT'    => $data->ID_PRODUCT,
                'NAMA_PRODUCT'  => $data->NAMA_PRODUCT,
                'HARGA'         => $data->HARGA,
                'KUANTITAS'     => $data->KUANTITAS,
                'SUBTOTAL'      => $data->SUBTOTAL,
            ]);
        }
        $this->db->insert_batch('RIWAYAT', $insertObj);
        $this->db->select(
            'ID_PRODUCT
            ,TANGGAL
            ,NAMA_PRODUCT
            ,HARGA
            ,KUANTITAS
            ,SUBTOTAL
            ,TOTAL');
        $this->db->from('RIWAYAT');
        $this->db->join('PEMBELIAN', 'PEMBELIAN.ID_BELI = RIWAYAT.ID_BELI');
        $this->db->where('RIWAYAT.ID_BELI',$id);
        $output = $this->db->get();
        $data = [
            'title' => 'Nota', 
            'page' => 'nota',
            'konten' => $output
        ];

        $this->load->view('frontend/index', $data);
    }
    
    public function insertProduk(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');
        
        $obj = array(
            'ID_PRODUCT'    =>      $id,
            'NAMA_PRODUCT'  =>      $nama,
            'HARGA'         =>      $harga,
        );
        $this->db->insert('PRODUCT', $obj);
        $this->session->set_flashdata('notif','Barang Telah Ditambahkan Ke Database');
        redirect(base_url('produk'));
    }

    public function cartPembelian(){
        $idbeli = $this->input->post('idbeli');
        $idproduct = $this->input->post('idproduct');
        $kuantitas = $this->input->post('kuantitas');

        $obj = array(
            'ID_BELI'       =>      $idbeli,
            'ID_PRODUCT'    =>      $idproduct,
            'KUANTITAS'     =>      $kuantitas
        );
        $this->db->insert('DETAIL',$obj);
        $this->session->set_flashdata('notif','Barang Telah Ditambahkan Ke Cart');
        redirect(base_url('pembelian'));
    }

    public function deleteProduk($id){
        $this->db->where('ID_PRODUCT',$id);
        $this->db->delete('PRODUCT');
        $this->session->set_flashdata('notif','Barang Telah Dihapus Dari Database');
        redirect(base_url('produk'));
    }

    public function deleteBeli($id){
        $this->db->where('ID_DETAIL',$id);
        $this->db->delete('DETAIL');
        $this->session->set_flashdata('notif','Barang Sudah Dihapus Dari Cart');
        redirect(base_url('pembelian'));
    }

    public function deleteCart($id){
        $this->db->where('ID_BELI',$id);
        $this->db->delete('DETAIL');
        $this->session->set_flashdata('notif','Cart Sudah Dikosongkan');
        redirect(base_url('pembelian'));
    }

    public function updateProduk($id){
        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');
        
        $obj = array(
            'NAMA_PRODUCT'  =>      $nama,
            'HARGA'         =>      $harga,
        );
        $this->db->where('ID_PRODUCT', $id);
        $this->db->update('PRODUCT', $obj);
        $this->session->set_flashdata('notif','Update Data Berhasil');
        redirect(base_url('produk'));
    }

    public function updateBeli($id){
        $kuantitas = $this->input->post('kuantitas');
        
        $obj = array(
            'KUANTITAS'  =>      $kuantitas,
        );
        $this->db->where('ID_DETAIL', $id);
        $this->db->update('DETAIL', $obj);
        $this->session->set_flashdata('notif','Update Data Berhasil');
        redirect(base_url('pembelian'));
    }
}