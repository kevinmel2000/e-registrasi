<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>E-registrasi list</title>
  </head>
  <body>
    <h5>Jumlah baris: <?php echo $total_rows; ?></h5>
    <p>Filter</p>
    <form class="" action="<?php echo site_url(); ?>registrasi/index" method="post">
      <label>Status Transaksi</label>
      <select id="statusTrx" name="status_trx">
        <option value="">--Silahkan pilih--</option>
        <?php foreach ($filter_status_trx as $row): ?>
          <option value="<?php echo $row->status_trx; ?>"
            <?php if (isset($_SESSION['sess_status_trx']) && ($_SESSION['sess_status_trx'] == $row->status_trx)): ?>
              <?php echo "selected"; ?>
            <?php endif; ?>><?php echo $row->status_trx; ?></option>
        <?php endforeach; ?>
      </select>
      <label>Tahun</label>
      <select class="" name="tahun_ajaran">
        <option value="">--Silahkan pilih--</option>
        <?php foreach ($filter_tahun_ajaran as $row): ?>
          <option value="<?php echo $row->tahun_ajaran; ?>"
            <?php if (isset($_SESSION['sess_tahun_ajaran']) && ($_SESSION['sess_tahun_ajaran'] == $row->tahun_ajaran)): ?>
              <?php echo "selected"; ?>
            <?php endif; ?>><?php echo $row->tahun_ajaran; ?></option>
        <?php endforeach; ?>
      </select>
      <label for="">Fakultas</label>
      <select class="" name="fakultas">
        <option value="">--Silahkan pilih--</option>
        <?php foreach ($filter_fakultas as $row): ?>
          <option value="<?php echo $row->fakultas; ?>"
            <?php if (isset($_SESSION['sess_fakultas']) && ($_SESSION['sess_fakultas'] == $row->fakultas)): ?>
              <?php echo "selected"; ?>
            <?php endif; ?>><?php echo $row->fakultas; ?></option>
        <?php endforeach; ?>
      </select>
      <input type="submit" value="cari" name="search">
      <input type="submit" name="reset" value="hapus filter">
    </form>
    <table>
      <thead>
        <th>Tahun Ajaran</th>
        <th>Semester</th>
        <th>Nama</th>
        <th>Nominal</th>
      </thead>
      <tbody>
        <?php foreach ($list_bayar as $row): ?>
        <tr>
          <td><?php echo $row->tahun_ajaran; ?></td>
          <td><?php echo $row->semester; ?></td>
          <td><?php echo $row->nama; ?></td>
          <td><?php echo $row->nominal; ?></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
    <?php echo $pagination; ?>
  </body>
</html>
