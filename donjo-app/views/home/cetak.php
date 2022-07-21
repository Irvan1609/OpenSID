<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Laporan Peserta Program <?= $peserta[0]["nama"];?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<<<<<<< HEAD
		<link href="<?= base_url(IRVAN)?>assets/css/report.css" rel="stylesheet" type="text/css">
		<style type="text/css">
			.textx, td
=======
		<?php if (is_file(LOKASI_LOGO_DESA . 'favicon.ico')): ?>
			<link rel="shortcut icon" href="<?= base_url()?><?= LOKASI_LOGO_DESA?>favicon.ico" />
		<?php else: ?>
			<link rel="shortcut icon" href="<?= base_url()?>favicon.ico" />
		<?php endif; ?>
		<link href="<?= base_url()?>assets/css/report.css" rel="stylesheet" type="text/css">
		<!-- TODO: Pindahkan ke external css -->
		<style>
			.textx
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
			{
				mso-number-format:"\@";
			}
		</style>
	</head>
	<body>
		<div id="body">
			<table>
				<tbody>
					<tr>
						<td align="center">
							<?php if ($aksi != 'unduh'): ?>
								<img src="<?= gambar_desa($config['logo']);?>" alt="" style="width:100px; height:auto">
							<?php endif; ?>
							<h1>PEMERINTAH <?= strtoupper($this->setting->sebutan_kabupaten)?> <?= strtoupper($config['nama_kabupaten'])?> </h1>
							<h1 style="text-transform: uppercase;"></h1>
							<h1><?= strtoupper($this->setting->sebutan_kecamatan)?> <?= strtoupper($config['nama_kecamatan'])?> </h1>
							<h1><?= strtoupper($this->setting->sebutan_desa)." ".strtoupper($config['nama_desa'])?></h1>
						</td>
					</tr>
					<tr>
						<td style="padding: 5px 20px;">
							<hr style="border-bottom: 2px solid #000000; height:0px;">
						</td>
					</tr>
					<tr>
						<td align="center" >
							<h4><u>Daftar Peserta Program <?= $peserta[0]["nama"];?></u></h4>
						</td>
					</tr>
					<tr>
<<<<<<< HEAD
						<td style="padding: 5px 20px;">
							<strong>Sasaran Peserta : </strong><?= $sasaran[$peserta[0]["sasaran"]];?><br>
							<strong>Masa Berlaku : </strong><?= fTampilTgl($peserta[0]["sdate"], $peserta[0]["edate"]);?><br>
							<strong>Keterangan : </strong><?= $peserta[0]["ndesc"];?>
						</td>
					</tr>
					<tr>
						<td style="padding: 5px 20px;">
							<table class="border thick">
								<thead>
									<tr class="border thick">
										<th rowspan="2">No</th>
										<th rowspan="2"><?= $peserta[0]["judul_peserta"]?></th>
										<?php if (!empty($peserta[0]['judul_peserta_plus'])) : ?>
											<th rowspan="2" nowrap class="text-center"><?= $peserta[0]["judul_peserta_plus"] ?></th>
										<?php endif; ?>
										<th rowspan="2"><?= $peserta[0]["judul_peserta_info"]?></th>
										<th colspan="7" style="text-align: center;">Identitas di Kartu Peserta</th>
									</tr>
									<tr class="border thick">
										<th>No. Kartu Peserta</th>
										<th>NIK</th>
										<th>Nama</th>
										<th>Tempat Lahir</th>
										<th>Tanggal Lahir</th>
										<th>Jenis Kelamin</th>
										<th>Alamat</th>
									</tr>
								</thead>
								<tbody>
									<?php	foreach ($peserta[1] as $key => $item): ?>
									<tr>
										<td align="center"><?= $key + 1?></td>
										<td class='textx'><?=$item["nik"]?></td>
										<?php if (!empty($item['peserta_plus'])) : ?>
											<td><?= $item["peserta_plus"] ?></td>
										<?php endif; ?>
										<td><?=$item["peserta_info"]?></td>
										<td class='textx' align="center"><?=$item["no_id_kartu"]?></td>
										<td class='textx'><?=$item["kartu_nik"]?></td>
										<td><?=$item["kartu_nama"]?></td>
										<td><?=$item["kartu_tempat_lahir"]?></td>
										<td class='textx'><?= tgl_indo_out($item["kartu_tanggal_lahir"])?></td>
										<td><?=$item["sex"]?></td>
										<td><?=$item["kartu_alamat"]?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</body>

</html>
=======
						<td colspan="2" class="bold">Bulan / Tahun</td>
						<td colspan="1"> : <?= getBulan(date('m')) . ' / ' . date('Y')?></td>
						<td colspan="10">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="13">&nbsp;</td>
					</tr>
				</table>
				<table class="border thick">
					<thead>
						<tr class="border thick">
							<th width="3%">NO</th>
							<th width="10%">NAMA</th>
							<th><?= $this->setting->sebutan_nip_desa  ?></th>
							<th>NIP</th>
							<th>JENIS KELAMIN</th>
							<th>TEMPAT TANGGAL LAHIR</th>
							<th>AGAMA</th>
							<th width="5%">PANGKAT/ GOLONGAN</th>
							<th>JABATAN</th>
							<th>PENDIDIKAN TERAKHIR</th>
							<th width="10%">NOMOR DAN TANGGAL KEPUTUSAN PENGANGKATAN</th>
							<th width="10%">NOMOR DAN TANGGAL KEPUTUSAN PEMBERHENTIAN</th>
							<th width="7%">KETERANGAN (Periode/Masa Jabatan)</th>
						</tr>
						<tr>
							<th>1</th>
							<th>2</th>
							<th>3</th>
							<th>4</th>
							<th>5</th>
							<th>6</th>
							<th>7</th>
							<th>8</th>
							<th>9</th>
							<th>10</th>
							<th>11</th>
							<th>12</th>
							<th>13</th>
					</thead>
					<tbody>
						<?php foreach ($main as $data): ?>
							<tr>
								<td><?= $data['no']?></td>
								<td><?= $data['nama']?></td>
								<td class="textx"><?= $data['pamong_niap']?></td>
								<td class="textx"><?= $data['pamong_nip']?></td>
								<td><?= $data['sex']?></td>
								<td><?= $data['tempatlahir'] . ', ' . tgl_indo_out($data['tanggallahir'])?></td>
								<td><?= $data['agama']?></td>
								<td><?= $data['pamong_pangkat']?></td>
								<td><?= $data['jabatan']?></td>
								<td><?= $data['pendidikan_kk']?></td>
								<td><?= $data['pamong_nosk'] . ', ' . tgl_indo_out($data['pamong_tglsk'])?></td>
								<td><?= $data['pamong_nohenti'] . ', ' . tgl_indo_out($data['pamong_tglhenti'])?></td>
								<td><?= $data['pamong_masajab']?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				<?php $this->load->view('global/blok_ttd_pamong.php', ['total_col' => 13, 'spasi_kiri' => 3, 'spasi_tengah' => 6]); ?>
			</div>
		</div>
	</body>
</html>
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
