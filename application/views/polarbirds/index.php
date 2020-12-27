
<script>
		

		var config = {
			type: 'pie',
			data: {
				datasets: [{
					data: [50, 100 ],
					backgroundColor: [
						window.chartColors.red,
						window.chartColors.blue,
					],
					label: 'Dataset 1'
				}],
				labels: [
					'Red',
					'Blue'
				]
			},
			options: {
				responsive: true
			}
		};



	
	</script>

<main role="main" class="container-fluid">

	
		<div class="row">
			<div class="col-6">
				<div class="card" style="max-width: 550px;">

				<!-- Heading -->
					<div class="card-body">
					<h4 class="card-title">รายงานการขาย</h4>
					<h6 class="card-subtitle text-muted">ประจำวันที่ <?=user_time( $date, 'Asia/Bangkok', 'd F Y')?></h6>
					</div>

					
					<!-- Text Content -->
					<div class="card-body">
					<?php 
					echo "<span class='text-danger font-weight-bold'>จำนวนเงิน ".number_format(($result_cash->amount_cash + $result_credit->amount_credit))." บาท<br/></span>";
					echo "ทั้งหมด ".($result_cash->bill_cash + $result_credit->bill_credit)." บิล เฉลี่ย ". number_format(($result_cash->amount_cash + $result_credit->amount_credit) / ($result_cash->bill_cash + $result_credit->bill_credit)) ."  บาท/บิล<br/>";
					echo " - เครดิต ".$result_credit->bill_credit." บิล เป็นเงิน ".number_format($result_credit->amount_credit)." บาท<br/>";
					echo " - เงินสด ".$result_cash->bill_cash." บิล เป็นเงิน ".number_format($result_cash->amount_cash)." บาท<br/>";
					echo "<br/>";
					echo "5 อันดับสินค้าขายดีประจำวัน<br/>";
					?>
					<table class="table table-sm">
						<?php foreach ($top5products as $key => $value) : ?>
						<tr>
							<td><?=number_format($value->qty)?></td>
							<td><?=$value->baseunit?></td>
							<td><?=mb_strimwidth($value->product_title, 0, 50, '...')?></td>
						</tr>
						<?php endforeach; ?>
					</table>

					<?php
					echo "<span class='text-info'><i class='fa fa-thumbs-o-up mr-2'></i>เซลส์ที่ทำยอดสูงที่สุด $topsales->salesman_name<br/></span>";
					echo "<span class='text-info'><i class='mr-4'></i>ขายได้ ".number_format($topsales->total)." บาท<br/></span>";
					?>

					</div>

				</div>
			</div>

			
			<div class="col-6">
				<div class="card" style="max-width: 550px;">
					<div class="card-body">
					<h4 class="card-title">สถิติบิลขาย ยอดขายเฉลี่ยต่อบิล</h4>
					<h6 class="card-subtitle text-muted">จากวันที่ 01 ถึงวันที่ <?=user_time( $date, 'Asia/Bangkok', 'd F Y')?></h6>
					</div>

					<div class="card-body">
						<table class="table table-sm"> 
								<tr class="">
									<td>จำนวนบิล</td>
									<td class="text-right"><?=$month2date[0]->totalbills?> บิล</td>  
								</tr>

								<tr class="">
									<td>เฉลี่ย จำนวนบิลต่อคน</td>
									<td class="text-right <?=$month2date[0]->avgbill < 3 ? 'text-danger' : ''?>"><?=number_format($month2date[0]->avgbill,2)?> บิล</td> 
								</tr>


								<tr class="">
									<td>จำนวนเงิน (ยอดขายรวม)</td>
									<td class="text-right"><?=number_format($month2date[0]->totalamount)?> บาท</td> 
								</tr>

								<tr class="">
									<td>ยอดขายเฉลี่ยต่อบิล</td>
									<td class="text-right"><?=number_format($month2date[0]->totalamount / $month2date[0]->totalbills)?> บาท</td> 
								</tr>
								
								<tr class="">
									<td>ยอดขายเฉลี่ย ต่อคน/ต่อวัน</td>
									<td class="text-right"><?=number_format($month2date[0]->avgamount)?> บาท</td> 
								</tr>
								<tr class="">
									<td>&nbsp;</td><td></td>
								</tr>

								<tr class="text-primary">
									<td>จำนวนเช็กอิน</td>
									<td class="text-right"><?=$customervisit[0]->totalvisit?> ร้านค้า</td> 
								</tr>

								<tr class="text-primary">
									<td>จำนวนเช็กอินเฉลี่ย</td>
									<td class="text-right"><?=number_format($customervisit[0]->avgcheckin,2)?> ร้านค้า</td> 
								</tr>

							</table>

						
						</div>
					</div>
			</div>


		</div>
 
		<div class="row mt-5">
			<div class="col-6">
				<div class="card" style="max-width: 550px;">

				<!-- Heading -->
					<div class="card-body">
					<h4 class="card-title">รายงานการพบลูกค้า</h4>
					<h6 class="card-subtitle text-muted">ประจำวันที่ <?=user_time( $date, 'Asia/Bangkok', 'd F Y')?></h6>
					</div>

					
					<!-- Text Content -->
					<div class="card-body">
					
					<table class="table table-sm"> 
						<tr class="bg-info">
							<td>ภาคกลาง</td>
							<td class="text-right">แผน</td>
							<td class="text-right">เช็กอิน</td>
							<td class="text-right">จีพีเอส</td>
							<td class="text-right">ถ่ายรูป</td>
							<td class="text-right">เปิดบิล</td>
							<td class="text-right">ยอดเงิน</td>
							
						</tr>
						<?php foreach ($checkin1 as $key => $value) : ?>
						<tr style="<?=$value->supervisor==1?'background-color: #D6EAF8;':''?> ">
							<td><?=$value->salesman?></td>
							<td class="text-right <?=$value->plan==0?"text-danger":""?>"><?=$value->plan?></td>
							<td class="text-right <?=$value->total_visit==0?"text-danger":""?>"><?=$value->total_visit?></td>
							<td class="text-right">
								
								<?php 
								if($value->total_visit > 0)
								{
									if($value->withGPS == $value->total_visit)
									{
										echo '<i class="text-success fa fa-check-circle"></i>';
									}
									elseif($value->withGPS > 0 && $value->withGPS != $value->total_visit)
									{
										echo '<i class="text-warning fa fa-question-circle"></i>';
									}
									elseif($value->withGPS == 0 )
									{
										echo '<i class="text-danger fa fa-times-circle"></i>';
									}
								}else{
									echo '<i style="color:#ccc" class="fa fa-minus-circle"></i>';
								}
								?>
								 
							</td>
							<td class="text-right <?=$value->image==0?"text-danger":""?>"><?=$value->image?></td>
							<td class="text-right <?=$value->effective==0?"text-danger":""?>"><?=$value->effective?></td>
							<td class="text-right <?=$value->amount==0?"text-danger":""?>"><?=number_format($value->amount)?></td>
							</tr>
						<?php endforeach; ?>
						
						<tr class="bg-info">
							<td>ภาคเหนือ</td>
							<td class="text-right">แผน</td>
							<td class="text-right">เช็กอิน</td>
							<td class="text-right">จีพีเอส</td>
							<td class="text-right">ถ่ายรูป</td>
							<td class="text-right">เปิดบิล</td>
							<td class="text-right">ยอดเงิน</td>
							
						</tr>
						<?php foreach ($checkin2 as $key => $value) : ?>
						<tr style="<?=$value->supervisor==1?'background-color: #D6EAF8;':''?> ">
							<td><?=$value->salesman?></td>
							<td class="text-right <?=$value->plan==0?"text-danger":""?>"><?=$value->plan?></td>
							<td class="text-right <?=$value->total_visit==0?"text-danger":""?>"><?=$value->total_visit?></td>
							<td class="text-right">
								
								<?php 
								if($value->total_visit > 0)
								{
									if($value->withGPS == $value->total_visit)
									{
										echo '<i class="text-success fa fa-check-circle"></i>';
									}
									elseif($value->withGPS > 0 && $value->withGPS != $value->total_visit)
									{
										echo '<i class="text-warning fa fa-question-circle"></i>';
									}
									elseif($value->withGPS == 0 )
									{
										echo '<i class="text-danger fa fa-times-circle"></i>';
									}
								}else{
									echo '<i style="color:#ccc" class="fa fa-minus-circle"></i>';
								}
								?>
								 
							</td>
							<td class="text-right <?=$value->image==0?"text-danger":""?>"><?=$value->image?></td>
							<td class="text-right <?=$value->effective==0?"text-danger":""?>"><?=$value->effective?></td>
							<td class="text-right <?=$value->amount==0?"text-danger":""?>"><?=number_format($value->amount)?></td>
							
						</tr>
						<?php endforeach; ?>
					</table>


					</div>

				</div>
			</div>

			<div class="col-6">
				<div class="card" style="max-width: 550px;">

				<!-- Heading -->
					<div class="card-body">
					<h4 class="card-title">รายงานการพบลูกค้า</h4>
					<h6 class="card-subtitle text-muted">ประจำวันที่ <?=user_time( $date, 'Asia/Bangkok', 'd F Y')?></h6>
					</div>

					
					<!-- Text Content -->
					<div class="card-body">
					
					<table class="table table-sm"> 
						<tr class="bg-info">
							<td>ภาคอีสาน</td>
							<td class="text-right">แผน</td>
							<td class="text-right">เช็กอิน</td>
							<td class="text-right">จีพีเอส</td>
							<td class="text-right">ถ่ายรูป</td>
							<td class="text-right">เปิดบิล</td>
							<td class="text-right">ยอดเงิน</td>
							
						</tr>
						<?php foreach ($checkin3 as $key => $value) : ?>
						<tr style="<?=$value->supervisor==1?'background-color: #D6EAF8;':''?> ">
							<td><?=$value->salesman?></td>
							<td class="text-right <?=$value->plan==0?"text-danger":""?>"><?=$value->plan?></td>
							<td class="text-right <?=$value->total_visit==0?"text-danger":""?>"><?=$value->total_visit?></td>
							<td class="text-right">
								
								<?php 
								if($value->total_visit > 0)
								{
									if($value->withGPS == $value->total_visit)
									{
										echo '<i class="text-success fa fa-check-circle"></i>';
									}
									elseif($value->withGPS > 0 && $value->withGPS != $value->total_visit)
									{
										echo '<i class="text-warning fa fa-question-circle"></i>';
									}
									elseif($value->withGPS == 0 )
									{
										echo '<i class="text-danger fa fa-times-circle"></i>';
									}
								}else{
									echo '<i style="color:#ccc" class="fa fa-minus-circle"></i>';
								}
								?>
								 
							</td>
							<td class="text-right <?=$value->image==0?"text-danger":""?>"><?=$value->image?></td>
							<td class="text-right <?=$value->effective==0?"text-danger":""?>"><?=$value->effective?></td>
							<td class="text-right <?=$value->amount==0?"text-danger":""?>"><?=number_format($value->amount)?></td>
							
						</tr>
						<?php endforeach; ?>
						
						<tr class="bg-info">
							<td>ภาคใต้</td>
							<td class="text-right">แผน</td>
							<td class="text-right">เช็กอิน</td>
							<td class="text-right">จีพีเอส</td>
							<td class="text-right">ถ่ายรูป</td>
							<td class="text-right">เปิดบิล</td>
							<td class="text-right">ยอดเงิน</td>
							
						</tr>
						<?php foreach ($checkin4 as $key => $value) : ?>
						<tr style="<?=$value->supervisor==1?'background-color: #D6EAF8;':''?> ">
							<td><?=$value->salesman?></td>
							<td class="text-right <?=$value->plan==0?"text-danger":""?>"><?=$value->plan?></td>
							<td class="text-right <?=$value->total_visit==0?"text-danger":""?>"><?=$value->total_visit?></td>
							<td class="text-right">
								
								<?php 
								if($value->total_visit > 0)
								{
									if($value->withGPS == $value->total_visit)
									{
										echo '<i class="text-success fa fa-check-circle"></i>';
									}
									elseif($value->withGPS > 0 && $value->withGPS != $value->total_visit)
									{
										echo '<i class="text-warning fa fa-question-circle"></i>';
									}
									elseif($value->withGPS == 0 )
									{
										echo '<i class="text-danger fa fa-times-circle"></i>';
									}
								}else{
									echo '<i style="color:#ccc" class="fa fa-minus-circle"></i>';
								}
								?>
								 
							</td>
							<td class="text-right <?=$value->image==0?"text-danger":""?>"><?=$value->image?></td>
							<td class="text-right <?=$value->effective==0?"text-danger":""?>"><?=$value->effective?></td>
							<td class="text-right <?=$value->amount==0?"text-danger":""?>"><?=number_format($value->amount)?></td>
							
						</tr>
						<?php endforeach; ?>
					</table>


					</div>

				</div>
			</div>
		</div>

		<div class="row mt-5 mb-5">
			
			<div class="col-6">
				<div class="card" style="max-width: 550px;">

				<!-- Heading -->
					<div class="card-body">
					<h4 class="card-title">รายงานการพบลูกค้า</h4>
					<h6 class="card-subtitle text-muted">ประจำวันที่ <?=user_time( $date, 'Asia/Bangkok', 'd F Y')?></h6>
					</div>

					
					<!-- Text Content -->
					<div class="card-body">
					
					<table class="table table-sm"> 
						<tr class="bg-info">
							<td>กรุงเทพฯ</td>
							<td class="text-right">แผน</td>
							<td class="text-right">เช็กอิน</td>
							<td class="text-right">จีพีเอส</td>
							<td class="text-right">ถ่ายรูป</td>
							<td class="text-right">เปิดบิล</td>
							<td class="text-right">ยอดเงิน</td>
							
						</tr>
						<?php foreach ($checkin5 as $key => $value) : ?>
						<tr style="<?=$value->supervisor==1?'background-color: #D6EAF8;':''?> ">
							<td><?=$value->salesman?></td>
							<td class="text-right <?=$value->plan==0?"text-danger":""?>"><?=$value->plan?></td>
							<td class="text-right <?=$value->total_visit==0?"text-danger":""?>"><?=$value->total_visit?></td>
							<td class="text-right">
								
								<?php 
								if($value->total_visit > 0)
								{
									if($value->withGPS == $value->total_visit)
									{
										echo '<i class="text-success fa fa-check-circle"></i>';
									}
									elseif($value->withGPS > 0 && $value->withGPS != $value->total_visit)
									{
										echo '<i class="text-warning fa fa-question-circle"></i>';
									}
									elseif($value->withGPS == 0 )
									{
										echo '<i class="text-danger fa fa-times-circle"></i>';
									}
								}else{
									echo '<i style="color:#ccc" class="fa fa-minus-circle"></i>';
								}
								?>
								 
							</td>
							<td class="text-right <?=$value->image==0?"text-danger":""?>"><?=$value->image?></td>
							<td class="text-right <?=$value->effective==0?"text-danger":""?>"><?=$value->effective?></td>
							<td class="text-right <?=$value->amount==0?"text-danger":""?>"><?=number_format($value->amount)?></td>
							
						</tr>
						<?php endforeach; ?>
						
					</table>


					</div>

				</div>
			</div>

			<div class="col-6">
				<div class="card" style="max-width: 550px;">

				<!-- Heading -->
					<div class="card-body">
					<h4 class="card-title">รายงานการพบลูกค้า</h4>
					<h6 class="card-subtitle text-muted">ประจำวันที่ <?=user_time( $date, 'Asia/Bangkok', 'd F Y')?></h6>
					</div>

					
					<!-- Text Content -->
					<div class="card-body">
					
					<table class="table table-sm"> 
						<tr class="bg-info">
							<td>หน่วยรถ</td>
							<td class="text-right">แผน</td>
							<td class="text-right">เช็กอิน</td>
							<td class="text-right">จีพีเอส</td>
							<td class="text-right">ถ่ายรูป</td>
							<td class="text-right">เปิดบิล</td>
							<td class="text-right">ยอดเงิน</td>
							
						</tr>
						<?php foreach ($checkin6 as $key => $value) : ?>
						<tr style="<?=$value->supervisor==1?'background-color: #D6EAF8;':''?> ">
							<td><?=$value->salesman?></td>
							<td class="text-right <?=$value->plan==0?"text-danger":""?>"><?=$value->plan?></td>
							<td class="text-right <?=$value->total_visit==0?"text-danger":""?>"><?=$value->total_visit?></td>
							<td class="text-right">
								
								<?php 
								if($value->total_visit > 0)
								{
									if($value->withGPS == $value->total_visit)
									{
										echo '<i class="text-success fa fa-check-circle"></i>';
									}
									elseif($value->withGPS > 0 && $value->withGPS != $value->total_visit)
									{
										//echo $value->withGPS;
										echo '<i class="text-warning fa fa-question-circle"></i>';
									}
									elseif($value->withGPS == 0 )
									{
										echo '<i class="text-danger fa fa-times-circle"></i>';
									}
								}else{
									echo '<i style="color:#ccc" class="fa fa-minus-circle"></i>';
								}
								?>
								 
							</td>
							<td class="text-right <?=$value->image==0?"text-danger":""?>"><?=$value->image?></td>
							<td class="text-right <?=$value->effective==0?"text-danger":""?>"><?=$value->effective?></td>
							<td class="text-right <?=$value->amount==0?"text-danger":""?>"><?=number_format($value->amount)?></td>
							
						</tr>
						<?php endforeach; ?>
						
						
					</table>


					</div>

				</div>
			</div>
		</div>


</main>
