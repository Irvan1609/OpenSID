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
							<label for="nama">Nama Kategori</label>
							<select class="form-control input-sm required"  id="kategori" name="kategori" style="width:100%;">
								<option option value="">-- Pilih Kategori --</option>
								<?php foreach ($list_kategori as $kategori): ?>
<<<<<<< HEAD
									<option <?php if ($kategori_sekarang['id_kategori']==$kategori['id']): ?>selected<?php endif; ?> value="<?= $kategori['id']?>"><?= $kategori['judul']?></option>
=======
									<option <?php if ($kategori_sekarang['id_kategori'] == $kategori['id']): ?>selected<?php endif; ?> value="<?= $kategori['id']?>"><?= $kategori['judul']?></option>
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="reset" class="btn btn-social btn-flat btn-danger btn-sm" data-dismiss="modal"><i class='fa fa-sign-out'></i> Tutup</button>
			<button type="submit" class="btn btn-social btn-flat btn-info btn-sm" id="ok"><i class='fa fa-check'></i> Simpan</button>
		</div>
	</div>
</form>
