<?
	if(!empty($_GET['hapus'])) {
		//$query = "DELETE FROM komoditi WHERE id = '".$_GET['hapus']."'";
		$query = "UPDATE komoditi SET hapus = 1 WHERE id = '".$_GET['hapus']."'";
		$result = mysql_query($query);
		
		ke("?inc=".$_GET['inc']);
	} else
	if(!empty($_GET['edit'])) {
		if(!empty($_POST['komoditi']) AND !empty($_POST['satuan'])) {
			$query = "UPDATE komoditi SET komoditi = '".$_POST['komoditi']."', satuan = '".$_POST['satuan']."' WHERE id = '".$_GET['edit']."'";
			$result = mysql_query($query);
			ke("?inc=".$_GET['inc']);
		} else {
			$query = "SELECT komoditi, satuan FROM komoditi WHERE id = '".$_GET['edit']."' AND hapus = 0";
			$result = mysql_query($query);
			
			list($komoditi, $satuan) = mysql_fetch_row($result);
		}
	} else
	if(!empty($_POST['komoditi']) AND !empty($_POST['satuan'])) {
		$query = "INSERT INTO komoditi (komoditi, satuan) VALUES ('".$_POST['komoditi']."', '".$_POST['satuan']."')";
		$result = mysql_query($query);
		ke("?inc=".$_GET['inc']);
	}
?>
			
	<form method="post">
	<h2 align="center">Daftar Komoditi</h2>
		<table border="0" cellspacing="2" cellpadding="5" class="table-condensed" align="center" style="width:1px;">
			<tr>
				<td align="right" nowrap="nowrap">Komoditi</td>
				<td nowrap="nowrap"><input type="text" name="komoditi" value="<? echo $komoditi; ?>" style="width:300px"></td>
			</tr>
			<tr>
				<td align="right" nowrap="nowrap">Satuan</td>
				<td nowrap="nowrap"><input type="text" name="satuan" value="<? echo $satuan; ?>" style="width:300px"></td>
			</tr>
			<tr>
				<td> </td>
				<td nowrap="nowrap">
					<input name="lanjut" class="btn-red btn-plain btn" style="display:inline" value="Simpan" type="submit">
				</td>
			</tr>
		</table>
	  <br><br>
		<table border="1" cellspacing="2" cellpadding="5" class="table-global" align="center" style="width:1px;">
		<thead>
			<tr>
				<th nowrap="nowrap">No</th>
				<th nowrap="nowrap">Komoditi</th>
				<th nowrap="nowrap">Satuan</th>
				<th nowrap="nowrap">Aksi</th>
			</tr>
		</thead>
		
			<?
				$query = "SELECT id, komoditi, satuan FROM komoditi WHERE hapus = 0 ORDER BY id";
				$result = mysql_query($query);
				
				while(list($id, $komoditi, $satuan) = mysql_fetch_row($result)) {
			?>
			<tr>
				<td align="center" nowrap="nowrap"><? echo ++$i; ?></td>
				<td nowrap="nowrap"><? echo $komoditi; ?></td>
				<td nowrap="nowrap"><? echo $satuan; ?></td>
				<td nowrap="nowrap" align="left">
					[<a href="<? echo encode("?inc=".$_GET['inc']."&edit=".$id); ?>">edit</a>] 
					[<a href="<? echo encode("?inc=".$_GET['inc']."&hapus=".$id); ?>" onClick="return confirm('Anda yakin akan menghapus data?')">hapus</a>]
				</td>
			</tr>
			<?
				}
				
				if(mysql_num_rows($result) <= 0) {
			?>
            <tr>
            	<td colspan="4"><em>Tidak ada data</em></td>
            </tr>
            <?
				}
			?>
		</table>
	</form>
			