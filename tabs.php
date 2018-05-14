<?php
session_start();

	$p = $_GET['id'];
	switch($p) {
		case "1": default:?>
<tr>
<td>關注健康問題 : (可選多項)

</tr>	
<tr>
<td colspan=2>
<?php 
	if(isset($_SESSION['hm_q1']) && ($_SESSION['hm_q1']) =='1')	{$checked = "checked"; } 
		else {$checked = "2";}
?>
	
	<label>		
	    <input type="checkbox" name="hm_q1" value="1" <?php echo $checked; ?>>
	    高血壓 / 高血糖/ 高血脂
    </label>

<?php 
	if(isset($_SESSION['hm_q2']) && ($_SESSION['hm_q2']) =='1')	{$checked2 = "checked"; } 
		else {$checked2 = 2;}
?>
    
	<label>		
	    <input type="checkbox" name="hm_q2" value="1" <?php echo $checked2; ?>>
	    糖尿病問題
    </label>
	
<?php 
	if(isset($_SESSION['hm_q3']) && ($_SESSION['hm_q3']) =='1')	{$checked3 = "checked"; } 
		else {$checked3 = 2;}
?>

    <label>		
	    <input type="checkbox" name="hm_q3" value="1"  <?php echo $checked3; ?>>
	    痛症
    </label>
    
<?php 
	if(isset($_SESSION['hm_q4']) && ($_SESSION['hm_q4']) =='1')	{$checked4 = "checked"; } 
		else {$checked4 = 2;}
?>

    <label>		
	    <input type="checkbox" name="hm_q4" value="1"  <?php echo $checked4; ?>>
	    過重過輕
    </label>
    
<?php 
	if(isset($_SESSION['hm_q5']) && ($_SESSION['hm_q5']) =='1')	{$checked5 = "checked"; } 
		else {$checked5 = 2;}
?>

    <label>		
	    <input type="checkbox" name="hm_q5" value="1"  <?php echo $checked5; ?>>
	    失眠
    </label>
    

<?php 
	if(isset($_SESSION['hm_q6']) && ($_SESSION['hm_q6']) =='1')	{$checked6 = "checked"; } 
		else {$checked6 = 2;}
?>

    <label>		
	    <input type="checkbox" name="hm_q6" value="1"  <?php echo $checked6; ?>>
	    焦慮
    </label>
    

<?php 
	if(isset($_SESSION['hm_q7']) && ($_SESSION['hm_q7']) =='1')	{$checked7 = "checked"; } 
		else {$checked7 = 2;}
?>
    <label>		
	    <input type="checkbox" name="hm_q7" value="1"  <?php echo $checked7; ?>>
	    皮膚問題
    </label>
    

<?php 
	if(isset($_SESSION['hm_q8']) && ($_SESSION['hm_q8']) =='1')	{$checked8 = "checked"; } 
		else {$checked8 = 2;}
?>
    <label>		
	    <input type="checkbox" name="hm_q8" value="1"  <?php echo $checked8; ?>>
	    心臓問題
    </label>
    

<?php 
	if(isset($_SESSION['hm_q9']) && ($_SESSION['hm_q9']) =='1')	{$checked9 = "checked"; } 
		else {$checked9 = 2;}
?>
    <label>		
	    <input type="checkbox" name="hm_q9" value="1"  <?php echo $checked9; ?>>
	    骨質疏鬆
    </label>
    

<?php 
	if(isset($_SESSION['hm_q10']) && ($_SESSION['hm_q10']) =='1')	{$checked10 = "checked"; } 
		else {$checked10 = 2;}
?>
    <label>		
	    <input type="checkbox" name="hm_q10" value="1"  <?php echo $checked10; ?>>
	    其他
    </label>

    <input type="text" class="height-class" name="hm_q_other" value="<?php if(isset($_SESSION['hm_q_other'])) echo $_SESSION['hm_q_other']; ?>">

    
</td>
</tr>
<tr>
<td>HM負責同事：</td>
</tr>	
<tr>
<td colspan=3>
	<label>		
	    <input type="radio" name="hm_team" value="Rachel" <?php if(isset($_SESSION['hm_team']) && $_SESSION['hm_team']=="Rachel") { ?>checked<?php  } ?>>
	    Rachel
    </label>
    
	<label>		
	    <input type="radio" name="hm_team" value="Nicole" <?php if(isset($_SESSION['hm_team']) && $_SESSION['hm_team']=="Nicole") { ?>checked<?php  } ?>>
	    Nicole
    </label>
	
    <label>		
	    <input type="radio" name="hm_team" value="ShanShan" <?php if(isset($_SESSION['hm_team']) && $_SESSION['hm_team']=="ShanShan") { ?>checked<?php  } ?>>
	    Shan Shan
    </label>
    
    <label>		
	    <input type="radio" name="hm_team" value="Paisley" <?php if(isset($_SESSION['hm_team']) && $_SESSION['hm_team']=="Paisley") { ?>checked<?php  } ?>>
	    Paisley
    </label>
    
    <label>		
	    <input type="radio" name="hm_team" value="Kitty" <?php if(isset($_SESSION['hm_team']) && $_SESSION['hm_team']=="Kitty") { ?>checked<?php  } ?>>
	    Kitty
    </label>
    
    <label>		
	    <input type="radio" name="hm_team" value="Yan" <?php if(isset($_SESSION['hm_team']) && $_SESSION['hm_team']=="Yan") { ?>checked<?php  } ?>>
	    Yan
    </label>
    
    <label>		
	    <input type="radio" name="hm_team" value="Regina" <?php if(isset($_SESSION['hm_team']) && $_SESSION['hm_team']=="Regina") { ?>checked<?php  } ?>>
	    Regina
    </label>
    
    <label>		
	    <input type="radio" name="hm_team" value="Yuki" <?php if(isset($_SESSION['hm_team']) && $_SESSION['hm_team']=="Yuki") { ?>checked<?php  } ?>>
	    Yuki
    </label>
        
    <label>		
	    <input type="radio" name="hm_team7" value="Other" <?php if(isset($_SESSION['hm_team']) && $_SESSION['hm_team']=="Other") { ?>checked<?php  } ?>>
	    其他
    </label>
    <input type="text" class="height-class" name="hm_team_other" value="<?php if(isset($_SESSION['hm_team_other'])) echo $_SESSION['hm_team_other']; ?>">
    
</td>
</tr>
<tr>

	<td>負責店舖 (HM) : 
	
	<label>		
	    <input type="radio" name="hm_shop" value="TST" <?php if(isset($_SESSION['hm_shop']) && $_SESSION['hm_shop']=="TST") { ?>checked<?php  } ?>>
	    TST
    </label>
    
    <label>		
	    <input type="radio" name="hm_shop" value="CWB" <?php if(isset($_SESSION['hm_shop']) && $_SESSION['hm_shop']=="CWB") { ?>checked<?php  } ?>>
	    CWB
    </label>
    </td>
</tr>

<tr>

	<td>選購優惠 :
	<label>		
	    <input type="radio" name="hm_buy" value="498-Combo3" <?php if(isset($_SESSION['hm_buy']) && $_SESSION['hm_buy']=="498三項健康") { ?>checked<?php  } ?>>
	    $498三項健康 - 1）十二經絡磁叉x50 mins 及 2) PT x 60mins 及
						3)火療 x 45mins<BR>
    </label>
    
    </td>
</tr>

<?php 

		
		break;
					  
		case "2":	?>

<tr>
<td>關注頭部問題 : (可選多項)</td></tr>
<tr>
<td colspan=2>
<label>		

<?php 
	if(isset($_SESSION['hc_q1']) && ($_SESSION['hc_q1']) =='1')	{$checkedc = "checked"; } 
		else {$checkedc = 2;}
?>
	    <input type="checkbox" name="hc_q1" value="1" <?php echo $checkedc; ?>>脫髮</label>
    
<?php 
	if(isset($_SESSION['hc_q2']) && ($_SESSION['hc_q2']) =='1')	{$checkedc2 = "checked"; } 
		else {$checkedc2 = 2;}
?>
	<label>		
	    <input type="checkbox" name="hc_q2" value="1" <?php echo $checkedc2; ?>>生髮</label>
	
<?php 
	if(isset($_SESSION['hc_q3']) && ($_SESSION['hc_q3']) =='1')	{$checkedc3 = "checked"; } 
		else {$checkedc3 = 2;}
?>
	<label>		
	    <input type="checkbox" name="hc_q3" value="1" <?php echo $checkedc3; ?>>斑禿</label>

<?php 
	if(isset($_SESSION['hc_q4']) && ($_SESSION['hc_q4']) =='1')	{$checkedc4 = "checked"; } 
		else {$checkedc4 = 2;}
?>
    <label>		
	    <input type="checkbox" name="hc_q4" value="1" <?php echo $checkedc4; ?>>頭部皮膚 (如:敏感、濕疹、牛皮癬 、頭痕…等)</label>
    
<?php 
	if(isset($_SESSION['hc_q5']) && ($_SESSION['hc_q5']) =='1')	{$checkedc5 = "checked"; } 
		else {$checkedc5 = 2;}
?>
    <label>		
	    <input type="checkbox" name="hc_q5" value="1" <?php echo $checkedc5; ?>>產後脫髮</label>
    
<?php 
	if(isset($_SESSION['hc_q6']) && ($_SESSION['hc_q6']) =='1')	{$checkedc6 = "checked"; } 
		else {$checkedc6 = 2;}
?>
    <label>		
	    <input type="checkbox" name="hc_q6" value="1" <?php echo $checkedc6; ?>>頭瘡</label>
    

<?php 
	if(isset($_SESSION['hc_q7']) && ($_SESSION['hc_q7']) =='1')	{$checkedc7 = "checked"; } 
		else {$checkedc7 = 2;}
?>
    <label>		
	    <input type="checkbox" name="hc_q7" value="1" <?php echo $checkedc7; ?>>頭油</label>
    

<?php 
	if(isset($_SESSION['hc_q8']) && ($_SESSION['hc_q8']) =='1')	{$checkedc8 = "checked"; } 
		else {$checkedc8 = 2;}
?>
    <label>		
	<input type="checkbox" name="hc_q_other" value="1" <?php echo $checkedc8; ?>>其他</label>
    <input type="text" class="height-class" name="hc_q_other" value="<?php if(isset($_SESSION['hc_q_other'])) echo $_SESSION['hc_q_other']; ?>">
    
</td>
</tr>
<tr>
<td>HC負責同事：</td>
</tr>
<tr>
<td colspan=3>
   <label>		
	    <input type="radio" name="hc_team" value="Yoes"  <?php if(isset($_SESSION['hc_team']) && $_SESSION['hc_team']=="Yoes") { ?>checked<?php  } ?>>
	    Yoes
    </label>
    
	<label>		
	    <input type="radio" name="hc_team" value="Ming" <?php if(isset($_SESSION['hc_team']) && $_SESSION['hc_team']=="Ming") { ?>checked<?php  } ?>>
	    Ming
    </label>
	
    <label>		
	    <input type="radio" name="hc_team" value="Kim"<?php if(isset($_SESSION['hc_team']) && $_SESSION['hc_team']=="Kim") { ?>checked<?php  } ?>>
	    Kim
    </label>
    
    <label>		
	    <input type="radio" name="hc_team" value="Amy" <?php if(isset($_SESSION['hc_team']) && $_SESSION['hc_team']=="Amy") { ?>checked<?php  } ?>>
	    Amy
    </label>
    
    <label>		
	    <input type="radio" name="hc_team" value="Ruby" <?php if(isset($_SESSION['hc_team']) && $_SESSION['hc_team']=="Ruby") { ?>checked<?php  } ?>>
	    Ruby
    </label>
    
    <label>		
	    <input type="radio" name="hc_team" value="Yennis" <?php if(isset($_SESSION['hc_team']) && $_SESSION['hc_team']=="Yennis") { ?>checked<?php  } ?>>
	    Yennis
    </label>
    
    <label>		
	    <input type="radio" name="hc_team" value="Moon" <?php if(isset($_SESSION['hc_team']) && $_SESSION['hc_team']=="Moon") { ?>checked<?php  } ?>>
	    Moon
    </label>
    
    <label>		
	    <input type="radio" name="hc_team" value="Kenneth" <?php if(isset($_SESSION['hc_team']) && $_SESSION['hc_team']=="Kenneth") { ?>checked<?php  } ?>>
	    Kenneth
    </label>
    <label>		
	    <input type="radio" name="hc_team" value="Tina" <?php if(isset($_SESSION['hc_team']) && $_SESSION['hc_team']=="Tina") { ?>checked<?php  } ?>>
	    Tina
    </label>
    <label>		
	    <input type="radio" name="hc_team" value="Miu" <?php if(isset($_SESSION['hc_team']) && $_SESSION['hc_team']=="Miu") { ?>checked<?php  } ?>>
	    Miu
    </label>
    <label>		
	    <input type="radio" name="hc_team" value="Oscar" <?php if(isset($_SESSION['hc_team']) && $_SESSION['hc_team']=="Oscar") { ?>checked<?php  } ?>>
	    Oscar
    </label>
    <label>		
	    <input type="radio" name="hc_team" value="Car" <?php if(isset($_SESSION['hc_team']) && $_SESSION['hc_team']=="Car") { ?>checked<?php  } ?>>
	    Car
    </label>
    <label>		
	    <input type="radio" name="hc_team" value="Samuel" <?php if(isset($_SESSION['hc_team']) && $_SESSION['hc_team']=="Samuel") { ?>checked<?php  } ?>>
	    Samuel
    </label>

        
    <label>		
	    <input type="radio" name="hc_team" value="Other" <?php if(isset($_SESSION['hc_team']) && $_SESSION['hc_team']=="Other") { ?>checked<?php  } ?>>
	    其他
    </label>
    <input type="text" class="height-class" name="hc_team_other" value="<?php if(isset($_SESSION['hc_team_other'])) echo $_SESSION['hc_team_other']; ?>">
    
</td>
</tr>
<tr>

	<td>負責店舖 (HC) :
	<label>		
	    <input type="radio" name="hc_shop" value="TST" <?php if(isset($_SESSION['hc_shop']) && $_SESSION['hc_shop']=="TST") { ?>checked<?php  } ?>> TST

    </label>
    
    <label>
    	<input type="radio" name="hc_shop" value="CWB" <?php if(isset($_SESSION['hc_shop']) && $_SESSION['hc_shop']=="CWB") { ?>checked<?php  } ?>> CWB
    </label>
    <label>		
    	<input type="radio" name="hc_shop" value="MK" <?php if(isset($_SESSION['hc_shop']) && $_SESSION['hc_shop']=="MK") { ?>checked<?php  } ?>> MK
	    
    </label>
    </td>
</tr>
<tr>

	<td>選購優惠 :
	    
    <label>
	    <input type="radio" name="hc_buy" value="488-3times" <?php if(isset($_SESSION['hc_buy']) && $_SESSION['hc_buy']=="488-3times") { ?>checked<?php  } ?>>
	    $488/3次-純中藥外敷療程
    </label>
    <label>		
	    <input type="radio" name="hc_buy" value="588-3times" <?php if(isset($_SESSION['hc_buy']) && $_SESSION['hc_buy']=="588-3times") { ?>checked<?php  } ?>>
	    $588/3次-中藥頭風療程
    </label>
    </td>
</tr>


<?php 

		break;
		
	}
?>