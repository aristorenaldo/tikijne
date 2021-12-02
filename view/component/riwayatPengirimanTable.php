<h3>Riwayat Pengiriman</h3>
<?php Flasher::flash(); ?>
<table class="table table-bordered">
    <thead>
        <th scope="col">Timestamp</th>
        <th scope="col">Status</th>
        <th scope="col">Kabupaten / Kota</th>
    </thead>
    <tbody>
        <?php foreach($listRiwayat as $riwayat): ?>
        <tr>
            <td><?=$riwayat['time_stamp']?></td>
            <td><?=$riwayat['nama_status']?></td>
            <td><?=$riwayat['kab_kota']?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<button class="btn btn-secondary" <?=$btnDisabled?> onclick=" window.open('<?=BASEURL?>/printResi.php?resi=<?=urlencode($resi)?>','_blank')">Print</button>