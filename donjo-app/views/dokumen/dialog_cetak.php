<script type="text/javascript" src="<?= base_url(IRVAN)?>assets/js/script.js"></script>
<script type="text/javascript" src="<?= base_url(IRVAN)?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?= base_url(IRVAN)?>assets/js/validasi.js"></script>
<script type="text/javascript" src="<?= base_url(IRVAN)?>assets/js/localization/messages_id.js"></script>
<form action="<?=$form_action?>" method="post" id="validasi">
	<div class='modal-body'>
		<div class="row">
			<div class="col-sm-12">
				<div class="box box-danger">
					<div class="box-body">
						<div class="form-group">
							<label class="control-label">Tahun Laporan</label>
							<select class="form-control input-sm jenis_link"  name="tahun">>
								<option value="">Pilih Tahun Laporan</option>
								<?php foreach ($tahun_laporan as $tahun): ?>
									<option value="<?= $tahun['tahun']?>"><?= $tahun['tahun']?></option>
								<?php endforeach; ?>
							</select>
						</div>
<<<<<<< HEAD
=======
						<?php if ($kat == 3): ?>
							<div class="form-group">
								<label class="control-label">Jenis Peraturan</label>
									<select class="form-control input-sm select" name="jenis_peraturan" style="width: 100%;">
										<option value=''>-- Pilih Jenis Peraturan --</option>
										<?php foreach ($jenis_peraturan as $item): ?>
											<option value="<?= $item ?>"><?= $item?></option>
										<?php endforeach; ?>
									</select>
							</div>
						<?php endif; ?>
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
						<div class="form-group">
							<label class="control-label">Pamong tertanda</label>
							<select class="form-control input-sm jenis_link" name="pamong_ttd">
								<option value="">Pilih Staf Penandatangan</option>
								<?php foreach ($pamong as $data): ?>
<<<<<<< HEAD
									<option value="<?= $data['pamong_nama']?>" data-jabatan="<?= trim($data['jabatan'])?>" <?php if (strpos(strtolower($data['jabatan']), 'sekretaris')!==false): ?> selected <?php endif; ?>><?= $data['pamong_nama']?>(<?= $data['jabatan']?>)</option>
=======
									<option value="<?= $data['pamong_id']?>" <?= selected($pamong_ttd['pamong_id'], $data['pamong_id'])?>><?= $data['nama']?> (<?= $data['jabatan']?>)</option>
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label">Pamong mengetahui</label>
							<select class="form-control input-sm jenis_link"  name="jabatan_ketahui">
								<option value="">Pilih Staf Mengetahui</option>
								<?php foreach ($pamong as $data): ?>
<<<<<<< HEAD
									<option value="<?= $data['pamong_nama']?>" data-jabatan="<?= trim($data['jabatan'])?>" <?php if (strpos(strtolower($data['jabatan']), 'kepala')!==false and strpos(strtolower($data['jabatan']), 'dusun')===false): ?>selected<?php endif; ?>><?= $data['pamong_nama']?>(<?= $data['jabatan']?>)</option>
								<?php endforeach;?>
=======
									<option value="<?= $data['pamong_id']?>" <?= selected($pamong_ketahui['pamong_id'], $data['pamong_id'])?>><?= $data['nama']?> (<?= $data['jabatan']?>)</option>
								<?php endforeach; ?>
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="reset" class="btn btn-social btn-flat btn-danger btn-sm" data-dismiss="modal"><i class='fa fa-sign-out'></i> Tutup</button>
			<button type="submit" class="btn btn-social btn-flat btn-info btn-sm" id="ok">
				<?php if (strpos($form_action, '/cetak') !== false): ?>
					<i class='fa fa-print'></i> Cetak
				<?php else: ?>
					<i class='fa fa-download'></i> Unduh
				<?php endif; ?>
			</button>
		</div>
	</div>
</form>
<script type="text/javascript">

</script>