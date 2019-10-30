<div class='container'>
    <h2>Detail Transaksi</h2>
        <a href="<?= base_url('riwayatIdBeli')?>">
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
                        <th style="width: 100px">Harga</th>
                        <th style="width: 100px">Kuantitas</th>
                        <th style="width: 100px">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($konten->result() as $item):?>
                    <tr>
                        <td><?= $item->ID_PRODUCT?></td>
                        <td><?= $item->NAMA_PRODUCT?></td>
                        <td style="padding-right: 10px; text-align: right">Rp <?= number_format($item->HARGA, 0, ',', '.') ?></td>
                        <td style="text-align: right"><?= $item->KUANTITAS?></td>
                        <td style="padding-right: 10px; text-align: right">Rp <?= number_format($item->SUBTOTAL, 0, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><strong>TOTAL</strong></td>
                    <td style="padding-right: 10px; text-align: right">Rp <?= number_format($item->TOTAL, 0, ',', '.') ?></td>
                </tr>
                </tbody>
            </table>
</div>