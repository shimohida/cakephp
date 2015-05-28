
<?php if(isset($_GET['delete'])){
		if ($_GET['delete'] == 1){ ?>

		<h2>エラーが発生しました</h2>

	<?php	}else if($_GET['delete'] == 2){ ?>

		<h2>「UserID」が違うため削除できません！</h2>

	<?php	}else if($_GET['delete'] == 3){ ?>

		<h2>スレッドは削除されました</h2>

	<?php } ?>





<?php } //isset ?>

	<button onclick="location.href='thread2'">新規スレッド</button>
	<br/>
	<br/>
<table>
<tr>
	<th>日付</th>
	<th>スレッド</th>
	<th>名前</th>
	<th></th>
</tr>
	<?php foreach ($db_data as $key => $value):  ?>
		<tr>
			<td><?php echo date('Y-m-d H:i:s', $value['PartnerWork1Tb']['created']); ?></td>
			<td><a href="/kensyu/cakephp/less/less1?thread_id=<?php echo $value['PartnerWork1Tb']['id']; ?>">
					<?php echo $value['PartnerWork1Tb']['thread']; ?></a></td>
			<td><?php echo $value['UserTb']['name']; ?></td>
			<td>
				<form action="/kensyu/cakephp/thread/delete_user" method="POST">
					<input type="hidden" name="user_name" value="shimohida">
					<input type="hidden" name="delete_id" value="<?php echo $value['PartnerWork1Tb']['id']; ?>">
					<input type="submit" value="削除">
				</form>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
