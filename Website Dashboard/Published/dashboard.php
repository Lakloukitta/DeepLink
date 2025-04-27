<?php
require_once 'start.php';
?>
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	<div class="breadcrumb-title pe-3">Dashboard</div>
	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Analysis</li>
			</ol>
		</nav>
	</div>

</div>
<!--end breadcrumb-->

<div class="row">
	<div class="col-xxl-12 d-flex align-items-stretch">
		<div class="card w-100 overflow-hidden rounded-4">
			<div class="card-body position-relative p-4">
				<div class="row">
					<div class="col-12 col-sm-7">
						<div class="d-flex align-items-center gap-3 mb-3">
							<img src="assets/images/doctors/<?php echo $doctor_row['id'] ?>.png"
								class="rounded-circle bg-grd-info p-1" width="60" height="60" alt="user">
							<div class="">
								<p class="mb-0 fw-semibold">Welcome back</p>
								<h4 class="fw-semibold mb-0 fs-4 mb-0"><?php echo $doctor_row['full_name'] ?></h4>
							</div>
						</div>
						<div class="d-flex align-items-center gap-5">
							<div class="">
								<h4 class="mb-1 fw-semibold d-flex align-content-center">$65.4K<i
										class="ti ti-arrow-up-right fs-5 lh-base text-success"></i>
								</h4>
								<p class="mb-2">This Week's Income</p>
								<div class="progress mb-0" style="height:5px;">
									<div class="progress-bar bg-grd-success" role="progressbar" style="width: 60%"
										aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
							<div class="vr"></div>
							<div class="">
								<h4 class="mb-1 fw-semibold d-flex align-content-center">78.4%<i
										class="ti ti-arrow-up-right fs-5 lh-base text-success"></i>
								</h4>
								<p class="mb-2">Growth Rate</p>
								<div class="progress mb-0" style="height:5px;">
									<div class="progress-bar bg-grd-danger" role="progressbar" style="width: 60%"
										aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-5">
						<div class="welcome-back-img pt-4">
							<img src="assets/images/gallery/welcome-back-3.png" height="170" alt="">
						</div>
					</div>
				</div><!--end row-->
			</div>
		</div>
	</div>
</div>



<div class="row">
	<div class="col-xl-6 col-xxl-6 d-flex align-items-stretch">
		<div class="card w-100 rounded-4">
			<div class="card-body">
				<div class="text-center">
					<h6 class="mb-0">Patient Status Overview</h6>
				</div>
				<div class="mt-4" id="chart5"></div>
				<p>Patient Status Overview</p>
				<div class="d-flex align-items-center gap-3 mt-4">
					<div class="">
						<h1 class="mb-0 text-success">Stable: 10</h1>
					</div>
					<div class="d-flex flex-column align-items-start">
						<p class="mb-0 text-warning">Caution: 5</p>
						<p class="mb-0 text-danger">Critical: 2</p>
					</div>
				</div>

			</div>
		</div>
	</div>


	<div class="col-xl-6 col-xxl-6 d-flex align-items-stretch">
		<div class="card w-100 rounded-4">
			<div class="card-body">
				<div class="d-flex flex-column gap-3">
					<div class="d-flex align-items-start justify-content-between">
						<div class="">
							<h5 class="mb-0">Health Alert Distribution</h5>
						</div>
						<div class="dropdown">
							<a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle"
								data-bs-toggle="dropdown">
								<span class="material-icons-outlined fs-5">more_vert</span>
							</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="javascript:;">Action</a></li>
								<li><a class="dropdown-item" href="javascript:;">Another action</a></li>
								<li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
							</ul>
						</div>
					</div>
					<div class="position-relative">
						<div class="piechart-legend">
							<h2 class="mb-3">128</h2>
							<h6 class="mb-0">Total Alerts</h6>
						</div>
						<div id="chart6"></div>
					</div>
					<div class="d-flex align-items-center justify-content-around flex-wrap">
						<div class="d-flex flex-column gap-3">

							<div class="d-flex align-items-center justify-content-between">
								<p class="mb-0 d-flex align-items-center gap-1 w-25">
									<span class="material-icons-outlined fs-6"
										style="color: #ff6a00">adjust</span>Hypoxemia
								</p>
								<div class="">
									<p class="mb-0 ms-1">30%</p>
								</div>
							</div>
							<div class="d-flex align-items-center justify-content-between">
								<p class="mb-0 d-flex align-items-center gap-1 w-25"><span
										class="material-icons-outlined fs-6"
										style="color: #98ec2d">adjust</span>Tachycardia
								</p>
								<div class="">
									<p class="mb-0 ms-1">25%</p>
								</div>
							</div>
							<div class="d-flex align-items-center justify-content-between">
								<p class="mb-0 d-flex align-items-center gap-1 w-25"><span
										class="material-icons-outlined fs-6"
										style="color: #3494e6">adjust</span>Bradycardia
								</p>
								<div class="">
									<p class="mb-0 ms-1">15%</p>
								</div>
							</div>
						</div>
						<div class="d-flex flex-column gap-3">

							<div class="d-flex align-items-center justify-content-between">
								<p class="mb-0 d-flex align-items-center gap-1 w-25"><span
										class="material-icons-outlined fs-6"
										style="color: #f1c40f">adjust</span>HeartSpike
								</p>
								<div class="">
									<p class="mb-0 ms-1">10%</p>
								</div>
							</div>
							<div class="d-flex align-items-center justify-content-between">
								<p class="mb-0 d-flex align-items-center gap-1 w-25"><span
										class="material-icons-outlined fs-6"
										style="color: #9b59b6">adjust</span>O2_Anomaly</p>
								<div class="">
									<p class="mb-0 ms-1">10%</p>
								</div>
							</div>
							<div class="d-flex align-items-center justify-content-between">
								<p class="mb-0 d-flex align-items-center gap-1 w-25"><span
										class="material-icons-outlined fs-6"
										style="color: #16a085">adjust</span>SleepApnea
								</p>
								<div class="">
									<p class="mb-0 ms-1">10%</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-lg-12 col-xxl-12 d-flex align-items-stretch">
		<div class="card w-100 rounded-4">
			<div class="card-body">
				<div class="d-flex align-items-start justify-content-between mb-3">
					<div class="">
						<h5 class="mb-0">Patients</h5>
					</div>
					<div class="dropdown">
						<a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle"
							data-bs-toggle="dropdown">
							<span class="material-icons-outlined fs-5">more_vert</span>
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="javascript:;">Action</a></li>
							<li><a class="dropdown-item" href="javascript:;">Another action</a></li>
							<li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
						</ul>
					</div>
				</div>
				<div class="order-search position-relative my-3">
					<input class="form-control rounded-5 px-5" type="text" placeholder="Search">
					<span
						class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50">search</span>
				</div>
				<div class="table-responsive">
					<table class="table align-middle">
						<thead>
							<tr>
								<th>Patient</th>
								<th>Age</th>
								<th>Last Recorded Vitals</th>
								<th>Status</th>
								<th>Last Alert</th>
								<th>Device Connectivity</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$stmt = $mysqli->prepare("SELECT * FROM `patient` WHERE 1 LIMIT 6");
							$stmt->execute();
							$result = $stmt->get_result();
							$first_row = true;
							while ($row = $result->fetch_assoc()) {
								/*$stmt2 = $mysqli->prepare("SELECT `name` FROM `vendor_types` WHERE `id` = ?");
																																												$stmt2->bind_param("i", $row['type']);
																																												$stmt2->execute();
																																												$result2 = $stmt2->get_result();
																																												$row2 = $result2->fetch_assoc();
																																												$stmt2->close();

																																												$stmt3 = $mysqli->prepare("SELECT SUM(`value`) as the_sum, COUNT(*) as the_count FROM `vouchers` WHERE `receiver_vendor_id` = ? AND `used_date` > ?");
																																												$stmt3->bind_param("is", $row['id'], getLastReportDate($row['id']));
																																												$stmt3->execute();
																																												$result3 = $stmt3->get_result();
																																												$row3 = $result3->fetch_assoc();
																																												$stmt3->close();
																																												$the_sum = $row3['the_sum'];
																																												if ($row3['the_sum'] == '')
																																												  $row3['the_sum'] = '0';
																																												$received_count = $row3['the_count'];
																																												$stmt3 = $mysqli->prepare("SELECT SUM(`value`) as the_sum, COUNT(*) as the_count FROM `vouchers` WHERE `giver_vendor_id` = ? AND `given_date` > ?");
																																												$stmt3->bind_param("is", $row['id'], getLastReportDate($row['id']));
																																												$stmt3->execute();
																																												$result3 = $stmt3->get_result();
																																												$row3 = $result3->fetch_assoc();
																																												$stmt3->close();
																																												$given_count = $row3['the_count'];
																																												if ($row3['the_sum'] != '')
																																												$the_sum -= $row3['the_sum'];*/

								$status_text = '<p class="dash-lable mb-0 bg-success bg-opacity-10 text-success rounded-2">Stable</p>';
								if ($row['status'] == 2)
									$status_text = '<p class="dash-lable mb-0 bg-warning bg-opacity-10 text-warning rounded-2">Caution</p>';
								elseif ($row['status'] == 3)
									$status_text = '<p class="dash-lable mb-0 bg-danger bg-opacity-10 text-danger rounded-2">Critical</p>';

								if ($first_row)
									$status_text = '<p id="thestatus" class="dash-lable mb-0 bg-success bg-opacity-10 text-success rounded-2">Stable</p>';

								$connectivity_text = '<span class="material-icons-outlined fs-6 text-primary">fiber_manual_record</span> Online';
								if ($row['device_connectivity'] == 0)
									$connectivity_text = '<span class="material-icons-outlined fs-6 text-primary">fiber_manual_record</span> Offline';


								echo '<tr>
								<td><div class="d-flex align-items-center gap-3"><div class=""><img src="assets/images/patients/' . $row['id'] . '.png" class="rounded-circle" width="50" height="50" alt=""></div><a href="patient.php?id=' . $row['id'] . '"><p class="mb-0">' . $row['full_name'] . '</p></a></div></td>
								<td>' . getAgeFromDatetime($row['birthday']) . ' yrs</td>
								<td><span class="material-symbols-outlined" style="font-size: 20px">ecg_heart</span> <span ';
								echo $first_row ? 'id="heartrate"' : '';
								echo '>' . $row['last_heart_beat'] . '</span> BPM <span class="material-symbols-outlined" style="font-size: 20px">spo2</span><span ';
								echo $first_row ? ' id="oxygenlevel"' : '';
								echo '>' . $row['last_o2'] . '</span>%</td>
								<td>' . $status_text . '</td>
								<td>' . timeAgo($row['last_alert']) . '</td>
								<td>' . $connectivity_text . '</td>
							</tr>';
								$first_row = false;

							}
							$stmt->close();
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	// Function to fetch data from the API and update the table
	var laststate = 1;
	async function updateTable() {
		try {
			// Fetch data from the PHP API
			const response = await fetch('update_api.php');
			const data = await response.json();

			if (data.success) {
				// Update table cells
				document.getElementById('heartrate').textContent = data.heartrate;
				document.getElementById('oxygenlevel').textContent = data.oxygenlevel;

				var statusElement = document.getElementById("thestatus");
				if (statusElement) {
					if (data.oxygenlevel <= 90) {
						statusElement.textContent = "Critical";
						statusElement.className = "dash-lable mb-0 bg-danger bg-opacity-10 text-danger rounded-2";
						if(laststate == 1)
						Swal.fire({
							title: 'Critical Alert: John Doe',
							text: 'Abnormal O2 levels, tachycardia, and potential Acute Myocardial Infarction detected. AI Agent is swiftly alerting 911. Immediate intervention recommended.',
							icon: 'warning',
							confirmButtonText: 'Ok'
						});
						laststate=0;
					}
					else {
						laststate=1;
						statusElement.textContent = "Stable";
						statusElement.className = "dash-lable mb-0 bg-success bg-opacity-10 text-success rounded-2";
					}
				}
			} else {
				console.error('Error fetching data:', data.message);
			}
		} catch (error) {
			console.error('Error:', error);
		}
	}

	// Update the table every 2 seconds
	setInterval(updateTable, 2000);

	// Initial update
	updateTable();
</script>
<?php
require_once 'end.php';
?>
<script src="assets/js/dashboard1.js"></script>