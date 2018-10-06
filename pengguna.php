<?
	if(!empty($_GET['hapus'])) {
		$query = "DELETE FROM pengguna WHERE id = '".$_GET['hapus']."'";
		$result = mysql_query($query);
		
		ke("?inc=".$_GET['inc']);
	} else
	if(!empty($_GET['edit'])) {
		if(!empty($_POST['id']) AND !empty($_POST['role'])) {
			$query = "UPDATE pengguna SET id = '".$_POST['id']."', role = '".$_POST['role']."' WHERE id = '".$_GET['edit']."'";
			$result = mysql_query($query);
			ke("?inc=".$_GET['inc']);
		} else {
			$query = "SELECT id, pass, role FROM pengguna WHERE id = '".$_GET['edit']."'";
			$result = mysql_query($query);
			
			list($id, $pass, $role) = mysql_fetch_row($result);
		}
	} else
	if(!empty($_POST['id']) AND !empty($_POST['pass']) AND !empty($_POST['role'])) {
		$query = "INSERT INTO pengguna (id, pass, role) VALUES ('".$_POST['id']."', '".$_POST['pass']."', '".$_POST['role']."')";
		$result = mysql_query($query);
		ke("?inc=".$_GET['inc']);
	}
?>
			
	<form method="post">
	<h2 align="center">Daftar Pengguna</h2>
		<table border="0" cellspacing="2" cellpadding="5" class="table-condensed" align="center" style="width:1px;">
			<tr>
				<td align="right" nowrap="nowrap">Username</td>
				<td nowrap="nowrap"><input type="text" name="id" value="<? echo $id; ?>" style="width:300px"></td>
			</tr>
			<tr>
				<td align="right" nowrap="nowrap">Password</td>
				<td nowrap="nowrap"><input type="password" name="pass" value="<? echo $pass; ?>" style="width:300px"></td>
			</tr>
			<tr>
				<td align="right" nowrap="nowrap">Role</td>
				<td nowrap="nowrap">
                	<select name="role">
                    	<option value="admin" <? ($role=="admin")?"selected":""; ?>>Admin</option>
                        <option value="operator" <? ($role=="operator")?"selected":""; ?>>Operator</option>
                        <option value="surveyor" <? ($role=="surveyor")?"selected":""; ?>>Surveyor</option>
                    </select>
                </td>
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
				<th nowrap="nowrap">Id</th>
				<th nowrap="nowrap">Role</th>
				<th nowrap="nowrap">Aksi</th>
			</tr>
		</thead>
		
			<?
				$query = "SELECT id, pass, role FROM pengguna ORDER BY id";
				$result = mysql_query($query);
				
				while(list($id, $pass, $role) = mysql_fetch_row($result)) {
			?>
			<tr>
				<td align="center" nowrap="nowrap"><? echo ++$i; ?></td>
				<td nowrap="nowrap"><? echo $id; ?></td>
				<td nowrap="nowrap"><? echo $role; ?></td>
				<td nowrap="nowrap" align="left">
					[<a href="<? echo ("?inc=".$_GET['inc']."&edit=".$id); ?>">edit</a>] 
					[<a href="<? echo encode("?inc=".$_GET['inc']."&hapus=".$id); ?>" onClick="return confirm('Anda yakin akan menghapus data?')">hapus</a>]
				</td>
			</tr>
			<?
				}
				
				if(mysql_num_rows($result) <= 0) {
			?>
            <tr>
            	<td colspan="4" nowrap><em>Tidak ada data</em></td>
            </tr>
            <?
				}
			?>
		</table>
	</form>
			