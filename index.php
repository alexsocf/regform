<?php
session_start();



if(isset($_POST)) {
	$_SESSION = $_POST;
	}

if (empty(isset($_SESSION["cName"])) || empty(isset($_SESSION["eName"])) || 
		empty(isset($_SESSION["gender"])) || empty(isset($_SESSION["mobile"]))
	){ 
		$error_message = "請輸入資料";
	
	}else
	{
		$feet = $inch = 0;
		
		if(empty(isset($_POST["hc_shop"]))) { $_SESSION["hc_shop"] = ""; }
		if(empty(isset($_POST["promotion"]))) { $_SESSION["promotion"] = ""; }
		if(empty(isset($_POST["hm_q1"]))) { $_SESSION["hm_q1"] = ""; }
		if(empty(isset($_POST["hm_q2"]))) { $_SESSION["hm_q2"] = ""; }
		if(empty(isset($_POST["hm_q3"]))) { $_SESSION["hm_q3"] = ""; }
		if(empty(isset($_POST["hm_q4"]))) { $_SESSION["hm_q4"] = ""; }
		if(empty(isset($_POST["hm_q5"]))) { $_SESSION["hm_q5"] = ""; }
		if(empty(isset($_POST["hm_q6"]))) { $_SESSION["hm_q6"] = ""; }
		if(empty(isset($_POST["hm_q7"]))) { $_SESSION["hm_q7"] = ""; }
		if(empty(isset($_POST["hm_q8"]))) { $_SESSION["hm_q8"] = ""; }
		if(empty(isset($_POST["hm_q9"]))) { $_SESSION["hm_q9"] = ""; }
		if(empty(isset($_POST["hm_q10"]))) { $_SESSION["hm_q10"] = ""; }
		if(empty(isset($_POST["hm_q_other"]))) { $_SESSION["hm_q_other"] = ""; }
		if(empty(isset($_POST["hm_team"]))) { $_SESSION["hm_team"] = ""; }
		if(empty(isset($_POST["hm_shop"]))) { $_SESSION["hm_shop"] = ""; }
		if(empty(isset($_POST["hm_buy"]))) { $_SESSION["hm_buy"] = ""; }
		if(empty(isset($_POST["hc_q1"]))) { $_SESSION["hc_q1"] = ""; }
		if(empty(isset($_POST["hc_q2"]))) { $_SESSION["hc_q2"] = ""; }
		if(empty(isset($_POST["hc_q3"]))) { $_SESSION["hc_q3"] = ""; }
		if(empty(isset($_POST["hc_q4"]))) { $_SESSION["hc_q4"] = ""; }
		if(empty(isset($_POST["hc_q5"]))) { $_SESSION["hc_q5"] = ""; }
		if(empty(isset($_POST["hc_q6"]))) { $_SESSION["hc_q6"] = ""; }
		if(empty(isset($_POST["hc_q7"]))) { $_SESSION["hc_q7"] = ""; }
		if(empty(isset($_POST["hc_q_other"]))) { $_SESSION["hc_q_other"] = ""; }
		if(empty(isset($_POST["hc_team"]))) { $_SESSION["hc_team"] = ""; }
		if(empty(isset($_POST["hc_buy"]))) { $_SESSION["hc_buy"] = ""; }


		if (!isset($_SESSION["height_feet"]) || $_SESSION["height_feet"] == '') { 
			$feet=0;		}
		else {$feet = $_SESSION["height_feet"]*30.48;}

		if (!isset($_SESSION["height_inch"]) || $_SESSION["height_inch"] == '') { 
			$inch=0;		}
		else {$inch = $_SESSION["height_inch"]*2.54;}

		if (is_numeric($feet) && is_numeric($inch)) {
			$_SESSION["height_cm"] = intval($feet) + intval($inch);
		}

		if(!isset($error_message)) {
			require_once("dbcontroller.php");
			$db_handle = new DBController();
			$query = "select * from registered_users where mobile ='".@$_SESSION['mobile']."'";
				
			echo $query;
			$result = $db_handle->runQuery($query);

			echo "<br>".$result;

		if($result <> 0) {
				$error_message = "此電話號碼已登記";
				
			} else {
				
				if(!empty($_SESSION["userEmail"])) {
					if(!isset($error_message)) {
						if (!filter_var($_SESSION["userEmail"], FILTER_VALIDATE_EMAIL)) {
							$error_message = "電郵地址不正確";
							}
						}
					}

				
				if(!isset($error_message)) {
						require_once("dbcontroller.php");
						$db_handle = new DBController();
						$query = "INSERT INTO registered_users (cName, eName, gender, hkid, dob_year, dob_month, dob_date, height_cm, promotion, hm_q1, hm_q2, hm_q3, hm_q4, hm_q5, hm_q6, hm_q7, hm_q8, hm_q9, hm_q10, hm_q_other, hm_team, hm_shop, hm_buy, hc_q1, hc_q2, hc_q3, hc_q4, hc_q5, hc_q6, hc_q7, hc_q_other, hc_team, hc_shop, hc_buy, mobile, userEmail, regtime) VALUES
						(
						 '" . $_SESSION["cName"] . "',
						 '" . $_SESSION["eName"] . "', 
						 '" . $_SESSION["gender"] . "', 
						 '" . $_SESSION["hkid"] . "',
						 '" . $_SESSION["dob_year"] . "',
						 '" . $_SESSION["dob_month"] . "',
						 '" . $_SESSION["dob_date"] . "',
						 '" . $_SESSION["height_cm"] . "',
						 '" . $_SESSION["promotion"] . "',
						 '" . $_SESSION["hm_q1"] . "','" . $_SESSION["hm_q2"] . "',
						 '" . $_SESSION["hm_q3"] . "','" . $_SESSION["hm_q4"] . "',
						 '" . $_SESSION["hm_q5"] . "','" . $_SESSION["hm_q6"] . "',
						 '" . $_SESSION["hm_q7"] . "','" . $_SESSION["hm_q8"] . "',
						 '" . $_SESSION["hm_q9"] . "','" . $_SESSION["hm_q10"] . "',
						 '" . $_SESSION["hm_q_other"] . "',
						 '" . $_SESSION["hm_team"] . "',
						 '" . $_SESSION["hm_shop"] . "',
						 '" . $_SESSION["hm_buy"] . "',
						 '" . $_SESSION["hc_q1"] . "','" . $_SESSION["hc_q2"] . "',
						 '" . $_SESSION["hc_q3"] . "','" . $_SESSION["hc_q4"] . "',
						 '" . $_SESSION["hc_q5"] . "','" . $_SESSION["hc_q6"] . "',
						 '" . $_SESSION["hc_q7"] . "','" . $_SESSION["hc_q_other"] . "',
						 '" . $_SESSION["hc_team"] . "',
						 '" . $_SESSION["hc_shop"] . "',
						 '" . $_SESSION["hc_buy"] . "',						 
						 '" . $_SESSION["mobile"] . "',
						 '" . $_SESSION["userEmail"] . "',
						 '" . $_SESSION["regtime"] . "'


						)";
						$result = $db_handle->insertQuery($query);
						if(!empty($result)) {
							$error_message = "";
							$success_message = "已成功登記";
							$_SESSION = "";
							session_destroy();
		
						} else {
							$error_message = "連線有問題，請重新再試";	
						}
					}
			}
		}
	}

?>

<html>
<head>
<title>健康問卷調查</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="css/style.css">

<script type="text/javascript" src="js/jquery-1.2.3.pack.js"></script>
	<script type="text/javascript">
			
		function loadTabContent(tabUrl){
			$("#preloader").show();
				jQuery.ajax({
					url: tabUrl, 
					cache: false,
					success: function(message) {
						jQuery("#tabcontent").empty().append(message);
						$("#preloader").hide();
					}
				});
			}
			
			jQuery(document).ready(function(){
				
				$("#preloader").hide();				
				jQuery("[id^=tab]").click(function(){	
					
					// get tab id and tab url
					tabId = $(this).attr("id");	
					tabUrl = jQuery("#"+tabId).attr("href");
					
					jQuery("[id^=tab]").removeClass("current");
					jQuery("#"+tabId).addClass("current");
					
					// load tab content
					loadTabContent(tabUrl);
					return false;
				});
			});
			
		</script>


</head>
<body>
<div>
填寫健康問卷調查 | 搜尋問卷調查資料
</div>


<?php if(!empty($success_message)) { ?>	
<div class="success-message"><?php if(isset($success_message)) echo $success_message; ?></div>
<?php } ?>
<?php if(!empty($error_message)) { ?>	
<div class="error-message"><?php if(isset($error_message)) echo $error_message; $highlight = ''; ?></div>
<?php } ?>

<div class="content">
<form name="frmRegistration" method="post" action="">

<table border="0" class="demo-table">

<tr>

<?php if (!isset($_SESSION["cName"]) || $_SESSION["cName"] == '') { $highlight = "(請輸入)";}else {$highlight = '';}?>

<td>姓名 (中文) <?php echo $highlight; ?></td>
<td><input type="text" class="demoInputBox" name="cName" value="<?php if(isset($_SESSION['cName'])) echo $_SESSION['cName']; ?>"></td>


<?php if (!isset($_SESSION["eName"]) || $_SESSION["eName"] == '') { $highlight = "(請輸入)";}else {$highlight = '';}?>

<td>姓名 (英文)  <?php echo $highlight; ?></td>
<td><input type="text" class="demoInputBox" name="eName" value="<?php if(isset($_SESSION['eName'])) echo $_SESSION['eName']; ?>"></td>
</tr>

<tr>



<?php if (!isset($_SESSION["gender"]) || $_SESSION["gender"] == '') { $highlight = "(請輸入)";}else {$highlight = '';}?>


<td>姓別 <?php echo $highlight; ?></td>
<td><input type="radio" name="gender" value="Male" <?php if(isset($_SESSION['gender']) && $_SESSION['gender']=="Male") { ?>checked<?php  } ?>> 男
<input type="radio" name="gender" value="Female" <?php if(isset($_SESSION['gender']) && $_SESSION['gender']=="Female") { ?>checked<?php  } ?>> 女
</td>
<td>身份証號碼 /<br> 護照號碼:</td>
<td><input type="text" class="demoInputBox" name="hkid" value="<?php if(isset($_SESSION['hkid'])) echo $_SESSION['hkid']; ?>"></td>
</tr>

<tr>


<?php if (!isset($_SESSION["mobile"]) || $_SESSION["mobile"] == '') { $highlight = "(請輸入)";}else {$highlight = '';}?>

<td>電話號碼 <?php echo $highlight; ?></td>
<td>
	<input type="text" class="demoInputBox" name="mobile" value="<?php if(isset($_SESSION['mobile'])) echo $_SESSION['mobile']; ?>">
	
</td>

<td>Email</td>
<td><input type="text" class="demoInputBox" name="userEmail" value="<?php if(isset($_SESSION['userEmail'])) echo $_SESSION['userEmail']; ?>"></td>
</tr>


<tr>
<td colspan=4>
	**** 健康檢測必須填寫 出生日期 及 高度 ****
</td>
</tr>

<tr>
<td colspan=4>出生日期
<select name="dob_year" class="dob-class" value="<?php if(isset($_SESSION['dob_year'])) echo $_SESSION['dob_year']; ?>">
<?PHP
    $dob_year = date("Y") - 80; 
    
    for ($i = 0; $i < 80; $i++) 
        {   
            $dob_year++;
            
            if ($dob_year == date("Y")) {
                echo "<option selected>$dob_year</option>";
                }

            echo "<option>$dob_year</option>";
        }
?>
</select>年

<select name="dob_month" class="dob-class" value="<?php if(isset($_SESSION['dob_month'])) echo $_SESSION['dob_month']; ?>">
<?PHP
        
    for ($i = 1; $i < 13; $i++) 
        {   
            $dob_month++;
            
            echo "<option>$dob_month</option>";
        }
?>
</select>月

<select name="dob_date" class="dob-class" value="<?php if(isset($_SESSION['dob_date'])) echo $_SESSION['dob_date']; ?>">
<?PHP
       
    for ($i = 1; $i < 32; $i++) 
        {   
            $dob_date++;
          
            echo "<option>$dob_date</option>";
        }
?>
</select>日
	</td>
</tr>
<tr>

<td colspan=4>高度 
	<input type="text" class="height-class" name="height_cm" value="<?php if(isset($_SESSION['height_cm'])) echo $_SESSION['height_cm']; ?>"> (cm) 或 <input type="text" class="height-class" name="height_feet" value="<?php if(isset($_SESSION['height_feet'])) echo $_SESSION['height_feet']; ?>"> 呎 <input type="text" class="height-class" name="height_inch" value="<?php if(isset($_SESSION['height_inch'])) echo $_SESSION['height_inch']; ?>"> 吋
	
</td>
</tr>



<tr>
<td colspan=4>


<div class="container">
		
			<div class="navcontainer">
				<ul>
					<li><a id="tab1" href="tabs.php?id=1">健康</a></li>
					<li><a id="tab2" href="tabs.php?id=2">頭髮</a></li>
				
				</ul>
			</div>

			
			<div id="tabcontent">
				請選擇健康資訊 或 頭髮資訊
			</div>
					
		</div>


</td>
</tr>

<?php 
	if(isset($_SESSION['promotion']) && ($_SESSION['promotion']) =='1')
			{$checked = "checked"; } 
		else
			{$checked = null;}
	?>


<tr>
	<td>最新資訊及推廣優惠:</td>
	<td colspan=3><label>		
	 <input type="checkbox" name="promotion" value="1" <?php echo $checked; ?>>
	    本人不希望接收到德善醫療集團、健康管理及德善健髮的最新資訊及推廣優惠。
    </label></td>

</tr>

  
<tr>
<td colspan=4>
本公司會以合法及公正的方式收集、保存及使用各項個人資料，這些資料僅供本公司進行上述預約安排之用。閣下有權電郵至cs@chineseessence.com 或傳真至 28902218 向本公司查詢或更正任何個人資料。<BR><BR>
<input type="submit" name="register-user" value="進行登記" class="btnRegister">
<input type="hidden" name="regtime" value="<?php echo time(); ?>" />

</td>
</tr>

</table>
</form>
</div>

</body></html>