<!doctype html>
<html>
<head>	
	<meta charset="utf-8">
	<title>พิมพ์ที่อยู่จัดส่งเอกสาร</title>		
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500&family=Sarabun:wght@300;400;500&display=swap');
	
		@media print {
			body {		
				background-color: #fff;				
				/*zoom:70% */}
			
			@page { 
				/*size: <?php //echo $size?>;
				/*size: a5 landscape;
				size: landscape;*/
			}
			
			p{
				font-size: 18px;
				font-weight: normal;
				font-family: Sarabun, Arial, sans-serif;
			}
		}
	</style>		

</head>


<body><?php //print_r($addrData); 
	$addr=$addrData; //foreach($addrData AS $addr);?>
	  <input type="hidden" name="a4Size" id="a4Size" value="<?php echo $size?>">
		<table width="100%">
			<tbody>
				<tr>
					<td colspan="2" valign="top">
						<p style="text-align: left; padding-left: 30px; padding-top: 20px;"><strong>ที่อยู่ผู้ส่ง</strong></p>
						<p style="text-align: left; padding-left: 30px;">
							ตรอ. ทรัพย์เจริญเซอร์วิส (โทรศัพท์ 097-3245364)<br>
							536 ถ.รัถการ ต.หาดใหญ่ <br>
							อ.หาดใหญ่ จ.สงขลา<br>
							90110
						</p>
					</td>

				</tr>
				<tr>
					
					<td width="50%" align="right" valign="top" style="padding-top: 20px;">&nbsp;</td>
					<td width="50%" align="left" valign="top" style="padding-top: 20px;">
						<table width="100%">
					  <tbody>
					    <tr>
					      <td nowrap><p style="text-align: left;  padding-top: 2px;"><strong>ที่อยู่ผู้รับ</strong></p>
					        <p style="text-align: left;"> <?php echo $addr->post_name;
											  if($addr->telephone!=''){ echo " โทร ".$addr->telephone; }
											  if($addr->corp_name!=''){ echo "<br> ".$addr->corp_name; }
											  if($addr->house_number!=''){ echo "<br> ".$addr->house_number; }
											  if($addr->home_group!=''){ echo " หมู่ ".$addr->home_group; }
											  if($addr->road!=''){ echo " ถนน ".$addr->road; }
											  if($addr->alley!=''){ echo " ซอย ".$addr->alley; }
											  if($addr->subdistric!=''){ echo "<br> ตำบล ".$addr->subdistric; }
											  if($addr->distric!=''){ echo "&nbsp;&nbsp;&nbsp;อำเภอ ".$addr->distric; }
											  if($addr->province!=''){ echo " ".$addr->province; }
											  if($addr->post_code!=''){ echo "&nbsp;&nbsp;&nbsp;".$addr->post_code; }
					                          
										?>
					          <!--(โทรศัพท์ 09x-xxxxxxx)<br>
										123 ถ.ประชาธิปัตย์ ต.หาดใหญ่ <br>
										อ.หาดใหญ่ จ.สงขลา<br>
										90110		-->
				            </p></td>
				        </tr>
				      </tbody>
				    </table></td>
				</tr>
			</tbody>
		</table>

	<script>
		//window.print();
	</script>

</body>
<script>
	$(document).ready(function(){ printDataAddr('printAddr');})
</script>

</html>