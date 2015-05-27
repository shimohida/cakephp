<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>データベース一覧</title>
</head>
<body>
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
			<td><a href="kensyu/cakephp/thread/thread2?id=<?php echo $value['PartnerWork1Tb']['id']; ?>">
					<?php echo $value['PartnerWork1Tb']['thread']; ?></a></td>
			<td><?php echo $value['UserTb']['name']; ?></td>
			<td>
				<form action="http://localhost/kensyu/cakephp/thread/delete_user" method="POST">
					<input type="hidden" name="id" value="<?php echo $value['PartnerWork1Tb']['id']; ?>">
					<input type="submit" value="削除">
				</form>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
</body>
</html>