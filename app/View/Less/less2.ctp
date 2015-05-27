



レス内容<br>
<form action="#" method="post">

<input type="hidden" name="user_id" value=" <?php if(isset($_POST['user_id'])){ echo $_POST['user_id']; } ?> ">
<input type="hidden" name="thread_id" value=" <?php if(isset($_POST['thread_id'])){ echo $_POST['thread_id']; } ?> ">
<input type="hidden" name="created" value="<?php echo time(); ?>">

<textarea name="less" ></textarea>

<input type="submit" value="レスを投稿">

</form>



