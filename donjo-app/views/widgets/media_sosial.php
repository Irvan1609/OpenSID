<!-- widget SocMed -->

<<<<<<< HEAD
<div class="single_bottom_rightbar">
	<h2><i class="fa fa-globe"></i> Info Media Sosial</h2>
	<div class="box-body">
		<?php foreach ($sosmed as $data): ?>
			<?php if (!empty($data["link"])): ?>
				<a href="<?= $data['link']?>" rel="noopener noreferrer" target="_blank">
					<img src="<?= base_url(IRVAN) . 'assets/front/'.$data['gambar'] ?>" alt="<?= $data['nama'] ?>" style="width:50px;height:50px;"/>
				</a>
			<?php endif; ?>
=======
<div class="box box-primary box-solid">
  <div class="box-header">
    <h3 class="box-title"><i class="fa fa-globe"></i> Info Media Sosial</h3>
  </div>
  <div class="box-body">
		<?php foreach ($sosmed as $data): ?>
		  <?php if (! empty($data['link'])): ?>
		    <a href="<?= $data['link']?>" target="_blank">
		    	<img src="<?= base_url() . 'assets/front/' . $data['gambar'] ?>" alt="<?= $data['nama'] ?>" style="width:50px;height:50px;"/>
		    </a>
		  <?php endif; ?>
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
		<?php endforeach; ?>
	</div>
</div>
