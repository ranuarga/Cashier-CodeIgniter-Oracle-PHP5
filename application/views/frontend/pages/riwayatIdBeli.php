<div class="container">
    <h2>Riwayat Transaksi</h2>
    <table class="table table-hover">
    <thead>
      <tr>
        <th>ID Beli</th>
        <th>Tanggal Transaksi</th>
        <th style="width: 300px">Total Transaksi</th>
        <th>Detail Transaksi</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($konten->result() as $item):?>
        <tr>
            <td><?= $item->id_beli ?></td>
            <td><?= $item->tanggal?></td>
            <td style="padding-right: 150px; text-align: right">Rp <?= number_format($item->total, 0, ',', '.') ?></td>
            <td><a href="<?= base_url('detailBeli/'.$item->id_beli)?>">DETAIL</a></td>
        </tr>
    <?php endforeach; ?>
    <tr>
      <td></td>
      <td><b>TOTAL PENDAPATAN</b></td>
      <td style="padding-right: 150px; text-align: right">Rp <?= number_format($pendapatan->PENDAPATAN, 0, ',', '.')?></td>
      <td></td>
    </tr>
    </tbody>
  </table>
</div>