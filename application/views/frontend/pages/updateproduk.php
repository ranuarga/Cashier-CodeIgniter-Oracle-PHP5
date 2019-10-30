<div class="container">
<h2>Update Data Produk</h2>
<form action="<?=base_url('post/updateproduk/'.$konten->id_product)?>" method="post" >
    <div class="form-group">
        <label for="">NAMA PRODUK</label>
        <input type="text" name="nama" class="form-control" value="<?= $konten->nama_product?>" required>
    </div>
    <div class="form-group">
        <label for="">HARGA</label>
        <input type="text" name="harga" class="form-control" value="<?= $konten->harga?>" required>
    </div>
    <button class='btn btn-primary' type="submit">
        <span class="glyphicon glyphicon-ok"></span>
        Submit
    </button>
</form>
</div>