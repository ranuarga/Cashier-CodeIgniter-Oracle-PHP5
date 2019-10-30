<div class='container'>
    <h2>Daftar Belanjaan</h2>
        <a href="<?= base_url('pembelian')?>">
            <button class="btn btn-default">
                <span class="glyphicon glyphicon-triangle-left"></span>
                Kembali
            </button>
        </a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID Produk</th>
                        <th>Nama Produk</th>
                        <th style="width: 150px">Harga</th>
                        <th style="width: 50px">Qty</th>
                        <th style="width: 150px">Subtotal</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($konten->result() as $item):?>
                    <tr>
                        <td><?= $item->ID_PRODUCT?></td>
                        <td><?= $item->NAMA_PRODUCT?></td>
                        <td style="padding-right: 10px; text-align: right">Rp <?= number_format($item->HARGA, 0, ',', '.') ?></td>
                        <td style="padding-right: 10px; text-align: right"><?= $item->KUANTITAS?></td>
                        <td style="padding-right: 10px; text-align: right">Rp <?= number_format($item->SUBTOTAL, 0, ',', '.') ?></td>
                        <td><a href="<?= base_url('updatebeli/'.$item->ID_DETAIL)?>">UPDATE</a></td>
                        <td><a href="<?= base_url('deletebeli/'.$item->ID_DETAIL)?>">DELETE</a></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><b>TOTAL</b></td>
                    <td style="padding-right: 10px; text-align: right">Rp <?= number_format($total->TOTAL, 0, ',', '.') ?></td>
                    <td>
                        <a href="<?= base_url('deletecart/'.$ID_BELI)?>">
                            <button class='btn btn-danger'>
                                <span class="glyphicon glyphicon-trash"></span>
                                Empty Cart
                            </button>
                        </a>
                    </td>
                    <td>
                        <a href="<?=base_url('cetaknota/'.$ID_BELI)?>">
                            <button class='btn btn-primary'>
                                <span class="glyphicon glyphicon-ok"></span>
                                Konfirmasi
                            </button>
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
</div>
