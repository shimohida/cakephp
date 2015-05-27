
    日付：<?php echo  date("Y-m-d H:i:s" ,$db_data['PartnerWork1Tb']['created']);   ?><br><br>
タイトル：<?php echo $db_data['PartnerWork1Tb']['thread'];  ?><br><br>
    詳細：<?php echo $db_data['PartnerWork1Tb']['detail'];  ?><br><br>

------------------------------------------------------------------------------------<br><br>


<form action="/kensyu/cakephp/less/less2" method="GET">
<input type="hidden" name="user_id" value="<?php if(isset($user_id)){ echo $user_id; } ?>">
<input type="hidden" name="thread_id" value="<?php if(isset($thread_id)){ echo $thread_id; } ?> ?>" >
<input type="submit" value="レスを作成"><br><br>
</form>

<?php   foreach($db_order as $risult2){    ?>

<div style=" height:100px; border: 1px solid;">

	<div  style=" height:30px;">
		<div style="float: left;"><?php echo date("Y-m-d H:i:s" , $risult2['PartnerWork2Tb']['created'] );?> : <?php echo $risult2['UserTb']['name']; ?> </div>

		 <div style="float: right;">
		 	<form action="/kensyu/cakephp/less/delete_less?thread_id=<?php  echo $thread_id; ?>&user_id=<?php echo $user_id; ?>" method="POST">
					<input type="hidden" name="delete_less" value="<?php echo  $risult2['PartnerWork2Tb']['id']; ?>">
					<input type="submit" value="削除">
			</form>
		 </div>
	</div>

	 <div><?php echo  $risult2['PartnerWork2Tb']['less']; ?></div>

</div>
<br>
<?php  }  ?>

<button onclick="location.href='/kensyu/cakephp/thread/thread1'">スレッド一覧</button>


