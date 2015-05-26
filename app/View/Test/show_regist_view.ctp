

<h1>show_regist_view</h1>


<form action="/cakephp/test/run_regist" method="POST">

	<input type="hidden" name="update" value="<?php echo (isset($up_data['SampleTb']['id']))?$up_data['SampleTb']['id']:''; ?>"><br>

	Name<br>
	<input type="text" name="name" value="<?php echo (isset($up_data['SampleTb']['name']))?$up_data['SampleTb']['name']:''; ?>"><br>

	PASS<br>
	<input type="text" name="value" value="<?php echo (isset($up_data['SampleTb']['value']))?$up_data['SampleTb']['value']:''; ?>"><br><br>

	<input type="submit" value="登録">

</form>




