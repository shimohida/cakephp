
<?php if(isset($delete['delete'])){
		if ($delete['delete'] == 1){ ?>

		<h2>エラーが発生しました</h2>

	<?php	}else if($delete['delete'] == 2){ ?>

		<h2>「UserID」が違うため削除できません！</h2>

	<?php	}else if($delete['delete'] == 3){ ?>

		<h2>スレッドは削除されました</h2>

	<?php } ?>

<?php } //isset ?>

	<button onclick="location.href='thread2'">新規スレッド</button>

	<div style="float: right;">
	<button onclick="location.href='thread2?session=logout'">ログアウト</button>
	</div>
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
			<?php if($value['UserTb']['id'] == 1){ ?>
				<form action="/kensyu/cakephp/thread/delete_thread" method="POST">
					<input type="hidden" name="user_id" value="1">
					<input type="hidden" name="delete_id" value="<?php echo $value['PartnerWork1Tb']['id']; ?>">
					<input type="submit" value="削除" >
				</form>
			<?php } //if分の終了 ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
