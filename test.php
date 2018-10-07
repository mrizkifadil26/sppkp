<?php

	include ('config.php');

	if(isset($_POST['simpan'])) {
		$query = "DELETE ";
		
		foreach($_POST['harga'] as $key => $value) {
			// $array_query[] = "('".date("Ymd")."', '".$key."', '".$value."')";
			$array_query[] = "('20180930', '".$key."', '".$value."')";
		}

		print_r($array_query);
		
		if(is_array($array_query)) {
			$query = "REPLACE INTO harga (tanggal, id_komoditi, harga) VALUES ".implode(",", $array_query);
			$result = mysqli_query($connection, $query);
		}
		
		ke("?inc=".$_GET['inc']);
	}
	
	// $query = "SELECT id_komoditi, surveyor, harga, timestamp FROM survey WHERE tanggal = '".date("Ymd")."'";
	$query = "SELECT `id_komoditi`, `surveyor`, `harga`, `timestamp` FROM `survey` WHERE `tanggal` = '20180930'";
	$result = mysqli_query($connection, $query);
	
	while(list($id_komoditi, $surveyor, $harga, $timestamp) = mysqli_fetch_row($result)) {
		$array_surveyor[$surveyor] = $surveyor;
		$array_harga[$id_komoditi][$surveyor] = $harga;
		$array_timestamp[$id_komoditi][$surveyor] = $timestamp;

		// print_r($array_surveyor);
		// print_r($array_harga);
		// print_r($array_timestamp);
  }
  
?>

<h2 align="center">Verifikasi Harga</h2>

<?php if(!is_array($array_surveyor)) : ?>
  <center>data belum tersedia...</center>
<?php else: ?>

<form method="post">
	<table border="1" cellspacing="2" cellpadding="5" class="table-condensed" align="center" style="width:1px;">
    <tr>
      <td rowspan="2">Komoditi</td>
      <td colspan="<?= count($array_surveyor); ?>" align="center">Harga</td>
    </tr>
    <tr>
      <?php foreach($array_surveyor as $value) : ?>
      <td><?= $value; ?></td>
      <?php endforeach; ?>
    </tr>
    <?php
      // $query = "SELECT id_komoditi, komoditi FROM survey LEFT JOIN komoditi ON komoditi.id = survey.id_komoditi WHERE tanggal = '".date("Ymd")."' GROUP BY komoditi.komoditi";
      $query = "SELECT `id_komoditi`, `komoditi` FROM `survey` LEFT JOIN `komoditi` ON `komoditi`.`id` = `survey`.`id_komoditi` WHERE `tanggal` = '20180930'";
      $result = mysqli_query($connection, $query);
			
      while(list($id_komoditi, $komoditi) = mysqli_fetch_row($result)) :
		?>
    <tr>
      <td nowrap><?= $komoditi; ?></td>
      <?php foreach($array_surveyor as $value) : ?>
      <td nowrap align="right">
        <?= number_format($array_harga[$id_komoditi][$value], 0); ?><br><br>
        <small><em>time: <?= substr($array_timestamp[$id_komoditi][$value], 12, 8) ; ?></em></small><br>
        <input type="radio" name="harga[<? echo $id_komoditi; ?>]" value="<?= $array_harga[$id_komoditi][$value]; ?>">
      </td>
      <?php endforeach; ?>
    </tr>
    <?php endwhile; ?>
    <tr>
      <td colspan="<?= count($array_surveyor)+1; ?>" align="center"><input type="submit" name="simpan" value="Publikasikan!"></td>
    </tr>
  </table>
</form>
<?php	endif; ?>
