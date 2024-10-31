<?php 
include './config/connect.php';
include './classes/karyawan.php';


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["logout"])) {
		session_start();
		session_unset();
		session_destroy();
		header("Location: ./index.php");
		exit();
	}
}

$db = new Database();
$karyawan = new Karyawan($db->getConnection());

session_start();
if (!isset($_SESSION['username'])) {
	echo "<script>alert('anda belum login.Silahkan login terlebih dahulu.'); window.location = 'index.php';</script>";
	exit();
}


?>
<script src="https://cdn.tailwindcss.com"></script>
<section class="antialiased bg-gray-100 text-gray-600 h-screen px-4">
    <div class="flex flex-col justify-center h-full">
	<b><h1 style="text-align: center; display: center; padding: 32px; letter-spacing: 20px; font-size: 1.5rem;" >CRUD OOP PHP</h1></b>
        <!-- Table -->
        <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
            <header class="px-5 py-4 border-b border-gray-100 flex justify-between">
                <h2 class="font-semibold text-gray-800">Data Karyawan</h2>
				<div>
					<a href="./create.php" class='mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline'>Add Data</a>
					<a href="./dashboard.php?logout=true" class='mr-3 text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline'>Logout</a>
				</div>
            </header>
				<div class="p-3">
					<div class="overflow-x-auto">
						<table class="table-auto w-full">
							<thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
								<tr>
									<th class="p-2 whitespace-nowrap">
										<div class="font-semibold text-left">ID</div>
									</th>
									<th class="p-2 whitespace-nowrap">
										<div class="font-semibold text-left">Name</div>
									</th>
									<th class="p-2 whitespace-nowrap">
										<div class="font-semibold text-center">Posisi</div>
									</th>
									<th class="p-2 whitespace-nowrap">
										<div class="font-semibold text-left">Gaji</div>
									</th>
								</tr>
							</thead>
							<tbody class="text-sm divide-y divide-gray-100">
								<?php
								$no = 1;
								foreach($karyawan->read() as $x){
									$id = $x["id_karyawan"];
									$nama = $x["nama"];
									$posisi = $x["posisi"];
									$gaji = $x["gaji"];
									$f_gaji = number_format($x["gaji"]);
									$dimas = ["IMG-20241004-WA0001.jpg", "IMG-20241004-WA0004.jpg", "SmartSelect_20241018_080405_Photos.jpg", "SmartSelect_20241018_080442_Photos.jpg", "SmartSelect_20241018_080620_Photos.jpg"];
									$farrel = $dimas[array_rand($dimas)];
									
									echo "
									<tr>
										<td class='p-2 whitespace-nowrap'>
											<div class='text-left'>$id</div>
										</td>
										<td class='p-2 whitespace-nowrap'>
											<div class='flex items-center'>
												<div class='w-10 h-10 flex-shrink-0 mr-2 sm:mr-3'><img class='rounded-full' src='https://raw.githubusercontent.com/Nopalaryan/A/main/$farrel' width='40' height='40' alt='$nama'></div>
												<div class='font-medium text-gray-800'>$nama</div>
											</div>
										</td>
										<td class='p-2 whitespace-nowrap'>
											<div class='text-left'>$posisi</div>
										</td>
										<td class='p-2 whitespace-nowrap'>
											<div class='text-left font-medium text-green-500'>Rp.$f_gaji</div>
										</td>
										<td class='p-2 whitespace-nowrap'>
											<div class='text-lg text-center'>
											</div>
										</td>
										<td class='p-3 px-5 flex justify-end'><a href=\"./edit.php?id_karyawan=" . $id . "&nama=" . $nama . "&posisi=" . $posisi . "&gaji=" . $gaji . "\" type='button' class='mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline'>Edt</a><button onclick=\"if (confirm('yakin hapus ini?')) window.location.href = './delete_action.php?id_karyawan=" . $id . "';\" type='button' class='text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline'>Delete</button></td>
									</tr>";
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>