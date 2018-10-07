<?php
	session_start();
	include('config.php');

	// $query = "SELECT id_komoditi FROM harga WHERE tanggal = '".date("Ymd")."'";
	$query = "SELECT id_komoditi FROM harga";
	$result = mysqli_query($connection, $query);

	$array_id_komoditi[] = "''";
	while(list($id_komoditi) = mysqli_fetch_row($result)) {
		$array_id_komoditi[] = $id_komoditi;
	}
	
	if(isset($_POST['simpan'])) {
		foreach($_POST['harga'] as $k => $v) {
			if(!in_array($k,$array_id_komoditi) && !empty($v)) {
				// $query = "REPLACE INTO survey (tanggal, id_komoditi, surveyor, harga) VALUES ('".date("Ymd")."', '".$k."','".$_SESSION['sesi_username']."', '".$v."')";
				$query = "REPLACE INTO survey (tanggal, id_komoditi, surveyor, harga) VALUES ('20180930', '".$k."','".$_SESSION['user_id']."', '".$v."')";
				$result = mysqli_query($connection, $query);
			}
		}
		
		travelTo("?inc=".$_GET['inc']);
	}
	
	// $query = "SELECT id_komoditi, harga FROM survey WHERE tanggal = '".date("Ymd")."' AND surveyor = '".$_SESSION['user_id']."'";
	$query = "SELECT id_komoditi, harga FROM survey WHERE tanggal = '20180930' AND surveyor = '".$_SESSION['user_id']."'";
	$result = mysqli_query($connection, $query);
	
	while(list($id_komoditi, $harga) = mysqli_fetch_row($result)) {
		$array_harga[$id_komoditi] = $harga;
	}

?>

<h2 align="center">Survey Harga</h2>
<form method="post">
	<table border="0" cellspacing="2" cellpadding="5" class="table-condensed" align="center" style="width:1px;">
    	<?php
			$query = "SELECT id, komoditi, satuan FROM komoditi WHERE hapus = 0 AND id NOT IN (".implode(",",$array_id_komoditi).") ORDER BY komoditi";
			$result = mysqli_query($connection, $query);
			
			if(mysqli_num_rows($result) <= 0) {
		?>
        <tr>
        	<td colspan="2" nowrap>Harga sudah dipublikasikan...</td>
        </tr>
        <?php
			} else {
		?>
    	<tr>
        	<td>Komoditi</td>
            <td>Harga</td>
        </tr>
        <?php
        		while(list($id, $komoditi, $satuan) = mysqli_fetch_row($result)) :
		?>
         <tr>
        	<td nowrap><?= ucwords($komoditi); ?></td>
            <td nowrap><input type="text" name="harga[<?= $id; ?>]" value="<?= $array_harga[$id]; ?>"> / <?= $satuan; ?></td>
        </tr>
        <?php
				endwhile;
		?>
        <tr>
        	<td>&nbsp;</td>
            <td><input type="submit" name="simpan" value="Simpan"></td>
        </tr>
        <?php
			}
		?>
    </table>
</form>