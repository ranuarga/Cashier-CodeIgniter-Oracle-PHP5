<div class='container'>
<h2>Update Data Pembelian</h2>
    <form action="<?=base_url('post/updatebeli/'.$konten->ID_DETAIL)?>" method="post" >
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>ID Produk</th>
                    <th>Kuantitas</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class='form-group'><?= $konten->ID_PRODUCT?></td>
                    <td class='form-group' style="width:130px">
                        <input type="text" name="kuantitas" class="form-control" value="<?= $konten->KUANTITAS?>">
                    </td>
                </tr>
            </tbody>
        </table>
        <button class='btn btn-primary pull-right' type='submit'>
            <span class="glyphicon glyphicon-ok"></span>
            Konfirmasi
        </button>
    </form>
</div>