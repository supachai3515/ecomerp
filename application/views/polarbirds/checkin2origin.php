<main role="main" class="container-fluid">

	
		<div class="row">
			<div class="col-4">
				<div class="card">

				<!-- Heading -->
					<div class="card-body">
					<h4 class="card-title">ข้อมูลเช็กอิน</h4>
					<h6 class="card-subtitle text-muted">ประจำวันที่ <?=user_time( $date, 'Asia/Bangkok', 'd F Y')?><br/>ระยะเช็กอิน น้อยกว่า 100 เมตร</h6> 
					</div>

					
					<!-- Text Content -->
					<div class="card-body">
					
						<table class="table">
							<?php 
								$no = 1;
								foreach ($data as $key => $value) {
									if($value->radius != 'N/A' && $value->distance_res < 0.1)
									{
										echo '<tr>
										<td style="width:5px">'.$no++.'</td>
										<td style="width:100px">';
										echo !empty($value->image) ? $value->image : "<img src='https://dummyimage.com/100x100/bdbdbd/0f18a1&text=no+picture'/>";
										echo '</td><td>';
										echo $value->code."&nbsp; ";
										echo $value->name."<br/>";
										echo $value->province."<br/>";
										echo $value->salesman."<br/>";
										echo $value->radius."<br/>";
										echo '</td></tr>';
									}
								}

							?>
						</table>


					</div>

				</div>
			</div>


			<div class="col-4">
				<div class="card">

				<!-- Heading -->
					<div class="card-body">
					<h4 class="card-title">ข้อมูลเช็กอิน</h4>
					<h6 class="card-subtitle text-muted">ประจำวันที่ <?=user_time( $date, 'Asia/Bangkok', 'd F Y')?><br/>ระยะเช็กอิน มากกว่า 100 เมตร</h6> 
					</div>

					
					<!-- Text Content -->
					<div class="card-body">
					
						<table class="table">
							<?php 
								$no = 1;
								foreach ($data as $key => $value) {
									if($value->radius != 'N/A' && $value->distance_res > 0.1)
									{
										echo '<tr>
										<td style="width:5px">'.$no++.'</td>
										<td style="width:100px">';
										echo !empty($value->image) ? $value->image : "<img src='https://dummyimage.com/100x100/bdbdbd/0f18a1&text=no+picture'/>";
										echo '</td><td>';
										echo $value->code."&nbsp; ";
										echo $value->name."<br/>";
										echo $value->province."<br/>";
										echo $value->salesman."<br/>";
										echo $value->radius."<br/>";
										echo '</td></tr>';
									}
								}

							?>
						</table>

					</div>

				</div>
			</div>

			<div class="col-4">
				<div class="card">

				<!-- Heading -->
					<div class="card-body">
					<h4 class="card-title">ข้อมูลเช็กอิน</h4>
					<h6 class="card-subtitle text-muted">ประจำวันที่ <?=user_time( $date, 'Asia/Bangkok', 'd F Y')?><br/>ไม่มีข้อมูล ตำแหน่ง จีพีเอส</h6>
					</div>

					
					<!-- Text Content -->
					<div class="card-body">
					
						<table class="table">
							<?php 
								$no = 1;
								foreach ($data as $key => $value) {
									if($value->radius == 'N/A')
									{
										echo '<tr>
										<td style="width:5px">'.$no++.'</td>
										<td style="width:100px">';
										echo !empty($value->image) ? $value->image : "<img src='https://dummyimage.com/100x100/bdbdbd/0f18a1&text=no+picture'/>";
										echo '</td><td>';
										echo $value->code."&nbsp; ";
										echo $value->name."<br/>";
										echo $value->province."<br/>";
										echo $value->salesman."<br/>";
										echo $value->radius."<br/>";
										echo '</td></tr>';
									}
								}

							?>
						</table>

					</div>

				</div>
			</div>

			
		</div>
 


</main>
