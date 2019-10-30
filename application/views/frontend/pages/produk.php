<div class="container">
    <h2>List Produk</h2>
    <?php
        if($this->session->flashdata('notif')){
            echo $this->session->flashdata('notif');
        }
    ?>
    <br>
    <a href="<?= base_url('insertproduk')?>">
        <button class="btn btn-default">
        <span class="glyphicon glyphicon-plus"></span>
        Tambah Produk
        </button>
    </a>
    <table class="table table-hover">
    <thead>
      <tr>
        <th>ID Produk</th>
        <th>Nama Produk</th>
        <th>Harga Produk</th>
        <th>Update</th> 
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($konten->result() as $item):?>
        <tr>
            <td><?= $item->id_product ?></td>
            <td><?= $item->nama_product ?></td>
            <td>Rp <?= number_format($item->harga, 0, ',', '.') ?></td>
            <td><a href="<?= base_url('updateproduk/'.$item->id_product)?>">UPDATE</a></td>
            <td><a href="<?= base_url('deleteproduk/'.$item->id_product)?>">DELETE</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>