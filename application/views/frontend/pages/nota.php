<div class='container'>
    <h2>Nota Pembelian</h2>
    <h4>Transaksi Tanggal <?=$konten->result()[0]->TANGGAL?></h4>
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