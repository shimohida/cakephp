
<pre><?php //var_dump($db_data);?> </pre>


    日付：<?php echo $db_data['PartnerWork1Tb']['created'];   ?><br><br>

タイトル：<?php echo $db_data['PartnerWork1Tb']['thread'];  ?><br><br>

    詳細：<?php echo $db_data['PartnerWork1Tb']['detail'];  ?><br><br>




------------------------------------------------------------------------------------<br><br>


<pre><?php //var_dump($db_order);?> </pre><br>

いずれ、隠し要素の中のvalue に post/get された値を入れる<br>
今回は仮に、１を入れておく<br><br>


<form action="/cakephp/less/less2" method="post">
<input type="hidden" name="user_id" value="<?php if(isset($user_id)){ echo $user_id; } ?>">
<input type="hidden" name="thread_id" value="<?php if(isset($thread_id)){ echo $thread_id; } ?> ?>" >

<input type="submit" value="レスを作成"><br><br>

</form>



<?php   foreach($db_order as $risult2){    ?>


<div style=" height:100px; border: 1px solid;">

	<div  style=" height:30px;">
		<div style="float: left;"><?php echo   date("Y-m-d H:i:s" , $risult2['PartnerWork2Tb']['created'] );   ?> : <?php echo $risult2['UserTb']['name']; ?> </div>

		 <div style="float: right;">
		 	<form action="/cakephp/less/delete_less" method="POST">
					<input type="hidden" name="delete_less" value="<?php echo  $risult2['PartnerWork2Tb']['id']; ?>">
					<input type="submit" value="削除">
			</form>
		 </div>
	</div>

	 <div><?php echo  $risult2['PartnerWork2Tb']['less']; ?></div>

</div>

<br>



<?php  }  ?>




