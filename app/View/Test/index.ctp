
<pre><?php //var_dump($db_data); ?></pre>


<button onclick="location.href='/cakephp/test/show_regist_view'">新規登録</button>

<table border="1">
	<tr>
		<th>id</th> <th>name</th> <th>value</th> <th>param1</th> <th>param2</th>
	</tr>


	<?php   foreach($db_data as $risult){    ?>
	<tr>
			<td><?php echo $risult['SampleTb']['id']; ?></td>

			<td><a href="/cakephp/test/show_regist_view?id=<?php echo $risult['SampleTb']['id']; ?>"><?php echo $risult['SampleTb']['name']; ?></a></td>

			<td><?php echo $risult['SampleTb']['value']; ?></td>

			<td><?php echo $risult['SampleParamTb']['param1']; ?></td>

			<td><?php echo $risult['SampleParamTb']['param2']; ?></td>

			<td>
				<form action="/cakephp/test/delete_ib" method="POST">
					<input type="hidden" name="delete_id" value="<?php echo $risult['SampleTb']['id']; ?>">
					<input type="submit" value="削除">
				</form>
			</td>

	</tr>

	<?php  }  ?>



</table>
