<?php
	session_start()
	include('config.php');

	// $query = "SELECT id_komoditi FROM harga WHERE tanggal = '".date("Ymd")."'";
	$query = "SELECT id_komoditi FROM harga";
	$result = $connect->query($query);
	print_r($result);

	$array_id_komoditi[] = "''";
	while(list($id_komoditi) = mysqli_fetch_row($result)) {
		$array_id_komoditi[] = $id_komoditi;
	}
	
	if(isset($_POST['simpan'])) {
		foreach($_POST['harga'] as $k => $v) {
			if(!in_array($k,$array_id_komoditi) && !empty($v)) {
				$query = "REPLACE INTO survey (tanggal, id_komoditi, surveyor, harga) VALUES ('".date("Ymd")."', '".$k."','".$_SESSION['sesi_username']."', '".$v."')";
				$result = mysql_query($query);
			}
		}
		
		ke("?inc=".$_GET['inc']);
	}
	
	$query = "SELECT id_komoditi, harga FROM survey WHERE tanggal = '".date("Ymd")."' AND surveyor = '".$_SESSION['username']."'";
	$result = $connect->query($query);
	
	while(list($id_komoditi, $harga) = mysql_fetch_row($result)) {
		$array_harga[$id_komoditi] = $harga;
	}

?>

<h2 align="center">Survey Harga</h2>
<form method="post">
	<table border="0" cellspacing="2" cellpadding="5" class="table-condensed" align="center" style="width:1px;">
    	<?php
			$query = "SELECT id, komoditi, satuan FROM komoditi WHERE hapus = 0 AND id NOT IN (".implode(",",$array_id_komoditi).") ORDER BY komoditi";
			$result = mysql_query($query);
			
			if(mysql_num_rows($result)<=0) {
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
        		while(list($id, $komoditi, $satuan) = mysql_fetch_row($result)) {
		?>
         <tr>
        	<td nowrap><? echo ucwords($komoditi); ?></td>
            <td nowrap><input type="text" name="harga[<? echo $id; ?>]" value="<? echo $array_harga[$id]; ?>"> / <? echo $satuan; ?></td>
        </tr>
        <?php
				}
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