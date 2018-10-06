<?
	if(isset($_POST['simpan'])) {
		$query = "DELETE ";
		
		foreach($_POST['harga'] as $k => $v) {
			$array_query[] = "('".date("Ymd")."', '".$k."', '".$v."')";
		}
		
		if(is_array($array_query)) {
			$query = "REPLACE INTO harga (tanggal, id_komoditi, harga) VALUES ".implode(",", $array_query);
			$result = mysql_query($query);
		}
		
		ke("?inc=".$_GET['inc']);
	}
	
	$query = "SELECT id_komoditi, surveyor, harga, timestamp FROM survey WHERE tanggal = '".date("Ymd")."'";
	$result = mysql_query($query);
	
	while(list($id_komoditi, $surveyor, $harga, $timestamp) = mysql_fetch_row($result)) {
		$array_surveyor[$surveyor] = $surveyor;
		$array_harga[$id_komoditi][$surveyor] = $harga;
		$array_timestamp[$id_komoditi][$surveyor] = $timestamp;
	}
?>
<h2 align="center">Verifikasi Harga</h2>
<?
	if(!is_array($array_surveyor)) {
		echo "<center>data belum tersedia...</center>";
	} else {
?>
<form method="post">
	<table border="1" cellspacing="2" cellpadding="5" class="table-condensed" align="center" style="width:1px;">
    	<tr>
        	<td rowspan="2">Komoditi</td>
            <td colspan="<? echo count($array_surveyor); ?>" align="center">Harga</td>
        </tr>
        <tr>
        	<?
				foreach($array_surveyor as $v) {
			?>
        	<td><? echo $v; ?></td>
            <?
				}
			?>
        </tr>
        <?
			$query = "SELECT id_komoditi, komoditi FROM survey LEFT JOIN komoditi ON komoditi.id = survey.id_komoditi WHERE tanggal = '".date("Ymd")."' GROUP BY komoditi.komoditi";
			$result = mysql_query($query);
			
			while(list($id_komoditi, $komoditi) = mysql_fetch_row($result)) {
		?>
        <tr>
        	<td nowrap><? echo $komoditi; ?></td>
            <?
				foreach($array_surveyor as $v) {
			?>
        	<td nowrap align="right">
				<? echo number_format($array_harga[$id_komoditi][$v],0) ; ?><br><br>
                <small><em>time: <? echo substr($array_timestamp[$id_komoditi][$v],12,8) ; ?></em></small><br>
                <input type="radio" name="harga[<? echo $id_komoditi; ?>]" value="<? echo $array_harga[$id_komoditi][$v]; ?>">
            </td>
            <?
				}
			?>
        </tr>
        <?
			}
		?>
        <tr>
        	<td colspan="<? echo count($array_surveyor)+1; ?>" align="center"><input type="submit" name="simpan" value="Publikasikan!"></td>
        </tr>
    </table>
</form>
<?
	}
?>
