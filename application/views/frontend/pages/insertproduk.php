<div class="container">
<h2>Masukkan Produk Baru</h2>
<form action="<?=base_url('post/insertproduk')?>" method="post" >
    <div class="form-group">
        <label for="">ID PRODUK</label>
        <input type="text" name="id" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="">NAMA PRODUK</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="">HARGA</label>
        <input type="text" name="harga" class="form-control" required>
    </div>
    <button class="btn btn-primary" type="submit">
        <span class="glyphicon glyphicon-ok"></span>
        Submit
    </button>
</form>
</div>