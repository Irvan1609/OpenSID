<<<<<<< HEAD
<script type="text/javascript" src="<?= base_url(IRVAN)?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?= base_url(IRVAN)?>assets/js/validasi.js"></script>
<script type="text/javascript" src="<?= base_url(IRVAN)?>assets/js/localization/messages_id.js"></script>
<form action="<?=$form_action?>" method="post" id="validasi">
=======
<script type="text/javascript" src="<?= base_url()?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/validasi.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/localization/messages_id.js"></script>
<form action="<?= $form_action?>" method="post" id="validasi">
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
	<div class='modal-body'>
		<div class="row">
			<div class="col-sm-12">
				<div class="box box-danger">
					<div class="box-body">
						<div class="form-group">
							<label for="nama">Nama Kategori</label>
							<input id="kategori" name="kategori" class="form-control input-sm" type="text" value=""></input>
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
