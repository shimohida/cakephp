<br>
less<br>
<form action="#" method="GET">

<input type="hidden" name="user_id" value="<?php if(isset($user_id)){ echo $user_id; } ?>">
<input type="hidden" name="thread_id" value="<?php if(isset($thread_id)){ echo $thread_id; } ?>">

<textarea name="less" required="required" ></textarea>

<input type="submit" value="レスを投稿">

</form>
