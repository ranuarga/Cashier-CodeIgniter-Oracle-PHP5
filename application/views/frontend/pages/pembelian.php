<div class="container">
    <h2>Transaksi</h2>
    <?php
        if($this->session->flashdata('notif')){ 
            echo $this->session->flashdata('notif');
        }
    ?>
    <form action="<?=base_url('post/cartbeli')?>" method="post" >
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>ID Beli</th>
                    <th>Nama Produk</th>
                    <th>Qty</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input style="width:130px" class="form-control" type="text" name='idbeli'></td>
                    <td>
                        <select style="width:130px" class='form-control' name="idproduct">
                            <?php foreach($obat->result() as $ob):?>
                                <option value="<?= $ob->id_product?>"><?= $ob->nama_product?></option>
                            <?php endforeach;?>
                        </select>
                    </td>
                    <td><input style="width:130px" class="form-control" type="text" name='kuantitas'></td>
                    <td>
                        <button class='btn btn-primary pull-right' type='submit'>
                            <span class="glyphicon glyphicon-shopping-cart"></span>
                            Add To Cart
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
    <form action="<?=base_url('konfirmasi')?>" method='post'>
        <table class='table table-condensed'>
            <thead>
                <tr>
                    <th>ID Beli</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input style="width:130px" class="form-control" type="text" name='idbeli'></td>
                    <td>
                        <button class='btn btn-primary pull-right' type='submit'>
                            <span class="glyphicon glyphicon-shopping-cart"></span>
                            Lihat Cart
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>