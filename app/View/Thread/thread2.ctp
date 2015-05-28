<br/>
<form action="/kensyu/cakephp/thread/run_regist?user_id=<?php echo $get_data['user_id'] ?>" method="POST">
	タイトル：<input type="text" name="title" maxlength='30' required="required"><br/>

	詳細：<input type="text" name="detail" maxlength='100' required="required"><br/>

	<input type="submit" name="regist_btn" value="登録">
</form>