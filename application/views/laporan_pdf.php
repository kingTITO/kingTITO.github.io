<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Surat Cuti</title>
</head>

<style>
	.table-top {
		width: 100%;
		border: 0;
	}

	.table-top td {
		width: 50%;
		vertical-align: bottom;
		padding: 4px 0px;
	}
</style>

<body>
	<?php
	function tgl_indo($tanggal)
	{
		$bulan = array(
			1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
		$pecahkan = explode('-', $tanggal);

		return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
	}

	$id = 0;
	foreach ($cuti as $i) :
		$id++;
		$id_cuti = $i['id_cuti'];
		$id_user = $i['id_user'];
		$nama_lengkap = $i['nama_lengkap'];
		$alasan = $i['alasan'];
		$nip = $i['nip'];
		$pangkat = $i['pangkat'];
		$jabatan = $i['jabatan'];
		$perihal_cuti = $i['perihal_cuti'];
		$tgl_diajukan = $i['tgl_diajukan'];
		$mulai = $i['mulai'];
		$berakhir = $i['berakhir'];
		$id_status_cuti = $i['id_status_cuti'];
		$tanda_tangan = $i['tanda_tangan'];
	?>

		<?php $diff = abs(strtotime($mulai) - strtotime($berakhir));
		$years = floor($diff / (365 * 60 * 60 * 24));
		$months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
		$days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
		?>
		<p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:12pt;">
			<span style="height:0pt; text-align:left; display:block; position:absolute; z-index:-1;">
				<img src="" width="105" height="105" alt="" class="fr-fir fr-dib fr-draggable">
			</span>
			<strong>
				<span style="font-family:'Times New Roman';">
					PROVINSI KOTA BOYOLALI
				</span>
			</strong>
		</p>

		<p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:14pt;"><strong><span style="font-family:'Times New Roman';">CV. BOYOLALI PUTRA ENGINEERING</span></strong></p>
		<p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:14pt;"><strong><span style="font-family:'Times New Roman';">kECAMATAN JEBRES</span></strong></p>
		<p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%;"><span style="font-family:Arial;">Butuh Rt 07/ Rw 01, No 001, Mojosongo, Boyolali, Jawa Tengah</span></p>

		<hr>

		<table class="table-top" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
			<tr>
				<td></td>
				<td>Jebres, <?= tgl_indo($tgl_diajukan) ?></td>
			</tr>
			<tr>
				<td>
					Nomor : 020/30/Penda/2020
				</td>
				<td>
					<span>
						Kepada <br>
						Yth. Kepala CV. Boyolali Putra Engineering
					</span>
				</td>
			</tr>
			<tr>
				<td>Lampiran : 1 (satu) lembar</td>
				<td>Wilayah Kabupaten Boyolali</td>
			</tr>
			<tr>
				<td>Perihal: <?= $perihal_cuti ?></td>
				<td>Di- Kecamatan Boyolali</td>
			</tr>
		</table>

		<div style="height: 24px;"></div>

		<p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; line-height:150%;"><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">Bersama
				ini diteruskan usul Cuti Karena Alasan Penting pegawai Dinas Perumahan dan Kawasan Permukiman atas nama saudara :</span></p>
		<p style="margin-top:0pt; margin-bottom:0pt; line-height:150%;"><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">&nbsp;Nama</span><span style="width:6.99pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">:
				<?= $nama_lengkap ?></span></p>
		<p style="margin-top:0pt; margin-bottom:0pt; line-height:150%;"><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">&nbsp;Nip</span><span style="width:16.75pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">:
				<?= $nip ?></span></p>
		<p style="margin-top:0pt; margin-bottom:0pt; line-height:150%;"><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">&nbsp;Pangkat/Gol ruang</span><span style="width:16.46pt; display:inline-block;"></span><span style="font-family:'Times New Roman';">:
				<?= $pangkat ?></span></p>
		<p style="margin-top:0pt; margin-bottom:0pt; line-height:150%;"><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">&nbsp;Jabatan</span><span style="width:0.27pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">: <?= $jabatan ?></span></p>
		<p style="margin-top:0pt; margin-bottom:0pt; line-height:150%;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
		<p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; line-height:150%;"><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">Dengan
				ini saya mengajukan Permohonan Cuti Karena Alasan Penting selama <?= $days ?> hari kerja, yaitu
				terhitung mulai
				tanggal <?= $mulai ?> s.d <?= $berakhir ?> yang akan di pergunakan untuk <?= $alasan ?>.</span>
		</p>
		<p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; line-height:150%;"><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">Demikian
				Permohonan ini saya ajukan, atas pertimbangan dan perhatian Bapak diucapkan terima kasih.</span></p>

			
		<!-- <div style="display: table; width: 100%;">
			<div style="display: table-cell; vertical-align: middle;">
				<img src="http://c5-ci.test/uploads/cuti/293101.png" alt="Sign 1" style="width: 100px; height: 100px;">
				<p style="text-align: center; margin-top: 10px;">Nama Seseorang 1</p>
			</div>
			<div style="display: table-cell; vertical-align: middle;">
				<img src="http://c5-ci.test/uploads/cuti/293101.png" alt="Sign 2" style="width: 100px; height: 100px;">
				<p style="text-align: center; margin-top: 10px;">Nama Seseorang 2</p>
			</div>
		</div> -->

		<table style="width: 100%; table-layout: fixed; margin-top: 50px">
			<tr>
				<td style="text-align: center;">Diketahui Oleh</td>
				<td></td>
				<td style="text-align: center;">Hormat Saya</td>
			</tr>
			<tr>
				<th style="text-align: center;"><img src="<?= base_url() ?>/<?= $tanda_tangan_primary; ?>" alt="Sign 1" style="width: 100px; height: 100px;"></th>
				<th style="width: 65%"></th>
				<th style="text-align: center;"><img src="<?= base_url() ?>/<?= $tanda_tangan; ?>" alt="Sign 1" style="width: 100px; height: 100px;"></th>
			</tr>
			<tr>
				<td style="text-align: center;">Akhmad Khasbi</td>
				<td></td>
				<td style="text-align: center;"><?= $nama_lengkap ?></td>
			</tr>
		</table>
	<?php endforeach; ?>
</body>

</html>
