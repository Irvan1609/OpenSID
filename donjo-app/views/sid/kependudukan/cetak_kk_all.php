<?php $this->load->view('print/headjs.php'); ?>
	<style type="text/css">
		#body
		{
			page-break-after: always;
		}
	</style>
	<body>
		<div id="container">
<<<<<<< HEAD
			<link href="<?php echo base_url(IRVAN)?>assets/css/report.css" rel="stylesheet" type="text/css">
			<?php
                foreach ($all_kk as $kk):
                    $this->load->view("sid/kependudukan/cetak_kk", $kk);
                endforeach;
?>
=======
			<link href="<?= base_url()?>assets/css/report.css" rel="stylesheet" type="text/css">
			<?php
                foreach ($all_kk as $kk):
                    $this->load->view('sid/kependudukan/cetak_kk', $kk);
                endforeach;
            ?>
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
			<div id="aside"></div>
		</div>
	</body>
</html>
