<?php
require_once 'start.php';
$appId = "4LEQT7-6XJX4E4K3X";
$stmt = $mysqli->prepare("SELECT * FROM `patient` WHERE id = ?");
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();
$result = $stmt->get_result();
$first_row = true;
$row = $result->fetch_assoc();

$weight = 70;
$height = 1.75;
$query = urlencode("BMI of " . $weight . "kg and " . $height . "m height");
$url = "http://api.wolframalpha.com/v2/query?input={$query}&appid={$appId}&output=JSON";
$response = file_get_contents($url);
$data = json_decode($response, true);

$bmi = null;
if (!empty($data['queryresult']['pods'])) {
	foreach ($data['queryresult']['pods'] as $pod) {
		if (strpos(strtolower($pod['title']), 'result') !== false) {
			foreach ($pod['subpods'] as $subpod) {
				$bmi = $subpod['plaintext'];
				break 2; // Exit both loops
			}
		}
	}
}
if (preg_match('/\|[\s]*([0-9.]+)/', $bmi, $matches)) {
    $bmi = $matches[1];
}

$weight = 70; // in kilograms
$height = 175; // in centimeters
$query = urlencode("BSA of " . $weight . "kg and " . $height . "cm height");
$url = "http://api.wolframalpha.com/v2/query?input={$query}&appid={$appId}&output=JSON";
$response = file_get_contents($url);
$data = json_decode($response, true);
$bsa = null;
if (!empty($data['queryresult']['pods'])) {
	foreach ($data['queryresult']['pods'] as $pod) {
		if (strpos(strtolower($pod['title']), 'result') !== false) {
			foreach ($pod['subpods'] as $subpod) {
				$bsa = $subpod['plaintext'];
				break 2; // Exit both loops
			}
		}
	}
}
if (preg_match('/([0-9]*\.?[0-9]+)/', $bsa, $matches)) {
    $bsa = $matches[1];
}


$query = urlencode("average resting heart rate");
$url = "http://api.wolframalpha.com/v2/query?input={$query}&appid={$appId}&output=JSON";
$response = file_get_contents($url);
$data = json_decode($response, true);
$heartbeatText = null;
if (!empty($data['queryresult']['pods'])) {
	foreach ($data['queryresult']['pods'] as $pod) {
		if (strpos(strtolower($pod['title']), 'result') !== false || strpos(strtolower($pod['title']), 'heartbeat') !== false) {
			foreach ($pod['subpods'] as $subpod) {
				$heartbeatText = $subpod['plaintext'];
				break 2; // Exit both loops
			}
		}
	}
}

if ($heartbeatText) {
	// Extract numbers from the text
	if (preg_match('/(\d+)\s*to\s*(\d+)/', $heartbeatText, $matches)) {
		$low = (int) $matches[1];
		$high = (int) $matches[2];
		$average = ($low + $high) / 2;
	}
}
?>
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	<div class="breadcrumb-title pe-3">Patient</div>


</div>
<!--end breadcrumb-->
<div class="row">
	<div class="col-12 col-xl-4">
		<div class="card rounded-4">
			<div class="card-body p-4">
				<div class="position-relative mb-5">
					<img src="assets/images/gallery/profile-cover.html" class="img-fluid rounded-4 shadow" alt="">
					<div class="profile-avatar position-absolute top-100 start-50 translate-middle">
						<img src="assets/images/patients/<?php echo $row['id']; ?>.png"
							class="img-fluid rounded-circle p-1 bg-grd-danger shadow" width="170" height="170" alt="">
					</div>
				</div>
				<div class="profile-info pt-5 d-flex align-items-center justify-content-between">
					<div class="">
						<h3><?php echo $row['full_name']; ?></h3>
						<p class="mb-0">Engineer at BB Agency Industry<br>
							New York, United States</p>
					</div>
					<div class="">
						<a href="javascript:;" class="btn btn-grd-primary rounded-5 px-4"><i
								class="bi bi-chat me-2"></i>Send
							Message</a>
					</div>
				</div>

			</div>
		</div>
	</div>
	<div class="col-xl-6 col-xxl-2 d-flex align-items-stretch">
		<div class="card w-100 rounded-4">
			<div class="card-body">
				<div class="d-flex align-items-start justify-content-between mb-1">
					<div class="">
						<h5 class="mb-0">78%</h5>
						<p class="mb-0">Cardiovascular Risk</p>
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
				<div class="chart-container2">
					<div id="chart1"></div>
				</div>
				<div class="text-center">
					<p class="mb-0 font-12">2% increased from last month</p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-6 col-xxl-2 d-flex align-items-stretch">
		<div class="card w-100 rounded-4">
			<div class="card-body">
				<div class="d-flex align-items-start justify-content-between mb-3">
					<div class="">
						<h5 class="mb-0"><?php echo $bmi; ?></h5>
						<p class="mb-0">BMI</p>
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
				<div class="chart-container2">
					<div id="chart2"></div>
				</div>
				<div class="text-center">
					<p class="mb-0 font-12"><span class="text-success me-1">12.5%</span> from last month</p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-xl-4">
		<div class="card rounded-4">
			<div class="card-body">
				<div class="d-flex align-items-start justify-content-between mb-3">
					<div class="">
						<h5 class="mb-0 fw-bold">About</h5>
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
				<div class="full-info">
					<div class="info-list d-flex flex-column gap-3">
						<div class="info-list-item d-flex align-items-center gap-3"><span
								class="material-icons-outlined">flag</span>
							<p class="mb-0">Country: USA</p>
						</div>
						<div class="info-list-item d-flex align-items-center gap-3"><span
								class="material-icons-outlined">language</span>
							<p class="mb-0">Language: English</p>
						</div>
						<div class="info-list-item d-flex align-items-center gap-3"><span
								class="material-icons-outlined">send</span>
							<p class="mb-0">Email: jhon.xyz</p>
						</div>
						<div class="info-list-item d-flex align-items-center gap-3"><span
								class="material-icons-outlined">call</span>
							<p class="mb-0">Phone: (124) 895-6724</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>


<div class="row">

	<div class="col-xl-6 col-xxl-4 d-flex align-items-stretch">
		<div class="card w-100 rounded-4">
			<div class="card-body">
				<div class="d-flex flex-column gap-3">
					<div class="d-flex align-items-start justify-content-between">
						<div class="">
							<h5 class="mb-0">Risk Factors Contribution</h5>
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
							<h2 class="mb-1">68%</h2>
							<h6 class="mb-0">eGFR</h6>
						</div>
						<div id="chart6"></div>
					</div>
					<div class="d-flex flex-column gap-3">
						<div class="d-flex align-items-center justify-content-between">
							<p class="mb-0 d-flex align-items-center gap-2 w-25"><span
									class="material-icons-outlined fs-6 text-primary">desktop_windows</span>Sugar</p>
							<div class="">
								<p class="mb-0">35%</p>
							</div>
						</div>
						<div class="d-flex align-items-center justify-content-between">
							<p class="mb-0 d-flex align-items-center gap-2 w-25"><span
									class="material-icons-outlined fs-6 text-danger">tablet_mac</span>Salt</p>
							<div class="">
								<p class="mb-0">48%</p>
							</div>
						</div>
						<div class="d-flex align-items-center justify-content-between">
							<p class="mb-0 d-flex align-items-center gap-2 w-25"><span
									class="material-icons-outlined fs-6 text-success">phone_android</span>Others</p>
							<div class="">
								<p class="mb-0">27%</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



	<div class="col-xxl-4">
		<div class="row">
			<div class="col-md-6 d-flex align-items-stretch">
				<div class="card w-100 rounded-4">
					<div class="card-body">
						<div class="d-flex align-items-start justify-content-between mb-1">
							<div class="">
								<h5 class="mb-0"><?php echo $bsa; ?></h5>
								<p class="mb-0">BSA</p>
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
						<div class="chart-container2">
							<div id="chart3"></div>
						</div>
						<div class="text-center">
							<p class="mb-0 font-12"><span class="text-success me-1">3.5%</span> from last month</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 d-flex align-items-stretch">
				<div class="card w-100 rounded-4">
					<div class="card-body">
						<div class="d-flex align-items-start justify-content-between mb-1">
							<div class="">
								<h5 class="mb-0">68.4K</h5>
								<p class="mb-0">eGFR</p>
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
						<div class="chart-container2">
							<div id="chart4"></div>
						</div>
						<div class="text-center">
							<p class="mb-0 font-12">35K users increased from last month</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card rounded-4">
			<div class="card-body">
				<div class="d-flex align-items-center gap-3 mb-2">
					<div class="">
						<h3 class="mb-0"><?php echo $average; ?></h3>
					</div>
					<div class="flex-grow-0">
						<p
							class="dash-lable d-flex align-items-center gap-1 rounded mb-0 bg-success text-success bg-opacity-10">
							<span class="material-icons-outlined fs-6">arrow_downward</span>23.7%
						</p>
					</div>
				</div>
				<p class="mb-0">Average Heartbeat Rate</p>
				<div id="chart7"></div>
			</div>
		</div>
	</div>
	<div class="col-xl-6 col-xxl-4 d-flex align-items-stretch">
		<div class="card w-100 rounded-4">
			<div class="card-body">
				<div class="d-flex align-items-start justify-content-between mb-3">
					<div class="">
						<h6 class="mb-0 fw-bold">Detected conditions</h6>
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

				<ul class="list-group list-group-flush">
					<li class="list-group-item px-0 bg-transparent">
						<div class="d-flex align-items-center gap-3">
							<div
								class="wh-42 d-flex align-items-center justify-content-center rounded-3 bg-grd-primary">
								<span class="material-icons-outlined text-white">calendar_today</span>
							</div>
							<div class="flex-grow-1">
								<h6 class="mb-0">Hypoxemia</h6>
							</div>
							<div class="d-flex align-items-center gap-3">
								<p class="mb-0">54</p>
								<p class="mb-0 fw-bold text-success">28%</p>
							</div>
						</div>
					</li>
					<li class="list-group-item px-0 bg-transparent">
						<div class="d-flex align-items-center gap-3">
							<div
								class="wh-42 d-flex align-items-center justify-content-center rounded-3 bg-grd-success">
								<span class="material-icons-outlined text-white">email</span>
							</div>
							<div class="flex-grow-1">
								<h6 class="mb-0">Tachycardia</h6>
							</div>
							<div class="d-flex align-items-center gap-3">
								<p class="mb-0">245</p>
								<p class="mb-0 fw-bold text-danger">15%</p>
							</div>
						</div>
					</li>
					<li class="list-group-item px-0 bg-transparent">
						<div class="d-flex align-items-center gap-3">
							<div
								class="wh-42 d-flex align-items-center justify-content-center rounded-3 bg-grd-branding">
								<span class="material-icons-outlined text-white">open_in_new</span>
							</div>
							<div class="flex-grow-1">
								<h6 class="mb-0">Bradycardia</h6>
							</div>
							<div class="d-flex align-items-center gap-3">
								<p class="mb-0">54</p>
								<p class="mb-0 fw-bold text-success">30.5%</p>
							</div>
						</div>
					</li>
					<li class="list-group-item px-0 bg-transparent">
						<div class="d-flex align-items-center gap-3">
							<div
								class="wh-42 d-flex align-items-center justify-content-center rounded-3 bg-grd-warning">
								<span class="material-icons-outlined text-white">ads_click</span>
							</div>
							<div class="flex-grow-1">
								<h6 class="mb-0">O2 Anomaly</h6>
							</div>
							<div class="d-flex align-items-center gap-3">
								<p class="mb-0">859</p>
								<p class="mb-0 fw-bold text-danger">34.6%</p>
							</div>
						</div>
					</li>
					<li class="list-group-item px-0 bg-transparent">
						<div class="d-flex align-items-center gap-3">
							<div class="wh-42 d-flex align-items-center justify-content-center rounded-3 bg-grd-info">
								<span class="material-icons-outlined text-white">subscriptions</span>
							</div>
							<div class="flex-grow-1">
								<h6 class="mb-0">Sleep Apnea</h6>
							</div>
							<div class="d-flex align-items-center gap-3">
								<p class="mb-0">24,758</p>
								<p class="mb-0 fw-bold text-success">53%</p>
							</div>
						</div>
					</li>
					<li class="list-group-item px-0 bg-transparent">
						<div class="d-flex align-items-center gap-3">
							<div class="wh-42 d-flex align-items-center justify-content-center rounded-3 bg-grd-danger">
								<span class="material-icons-outlined text-white">inbox</span>
							</div>
							<div class="flex-grow-1">
								<h6 class="mb-0">Spam Message</h6>
							</div>
							<div class="d-flex align-items-center gap-3">
								<p class="mb-0">548</p>
								<p class="mb-0 fw-bold text-danger">47%</p>
							</div>
						</div>
					</li>
					<li class="list-group-item px-0 bg-transparent">
						<div class="d-flex align-items-center gap-3">
							<div
								class="wh-42 d-flex align-items-center justify-content-center rounded-3 bg-grd-deep-blue">
								<span class="material-icons-outlined text-white">visibility</span>
							</div>
							<div class="flex-grow-1">
								<h6 class="mb-0">Views Mails</h6>
							</div>
							<div class="d-flex align-items-center gap-3">
								<p class="mb-0">9845</p>
								<p class="mb-0 fw-bold text-success">68%</p>
							</div>
						</div>
					</li>
				</ul>

			</div>
		</div>
	</div>


</div>
<?php
require_once 'end.php';
?>
<script src="assets/js/dashboard12.js"></script>