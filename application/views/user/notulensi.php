<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('template/frontend/head') ?>
	<script src="<?= base_url() ?>assets/frontend/js/modernizr.js"></script>
</head>
<body>
	<div class="page-content">
		<div class="content-wrapper">
			<!-- Content area -->
			<div class="content container">
				<!-- Main charts -->
				<div class="row">
					<div class="col-xl-12">

						<!-- Traffic sources -->
						<div class="card mb-0">
							<div class="card-header">
								<div class="row">
									<div class="col-3 mb-1 mt-1">
										<img style="height:7rem;border-radius:5px" src="<?= base_url() ?>assets/frontend/img/logo-tsk.png" alt="" >
									</div>
									<div class="col-6 mb-1 mt-1 text-center">
										<h4 class=""><b>
											NOTULENSI KEGIATAN<br>
											PEMERINTAH KOTA TASIKMALAYA</b>
										</h4>
										<i>Jl. Letnan Harun No.1, Panglayungan, Kec. Cipedes, Tasikmalaya, Jawa Barat 46151</i>
									</div>
								</div>
							</div>
							<hr class="mt-0">
							</hr>
							<form action="#" method="POST">
								<div class="card-body table-responsive">
									<?php foreach ($read as $r) { ?>
										<div class="form-group row mb-0 ml-1">
											<label class="col-form-label col-lg-3 col-lg-3 col-6 p-1">NAMA KEGIATAN <span class="float-right">:</span></label>
											<label class="col-form-label col-lg-9 col-6 p-1">
												<b><?= strtoupper($r->nama_kegiatan) ?></b>
											</label>

											<label class="col-form-label col-lg-3 col-6 p-1">TANGGAL <span class="float-right">:</span></label>
											<label class="col-form-label col-lg-9 col-6 p-1">
												<?= date('Y-m-d', strtotime($r->waktu_kegiatan)) ?>
											</label>

											<label class="col-form-label col-lg-3 col-6 p-1">WAKTU <span class="float-right">:</span></label>
											<label class="col-form-label col-lg-9 col-6 p-1">
												<?= date('H.i') ?>
											</label>
										<?php } ?>
										</div><br>

										<div class="card card-outline card-info">
											<div class="card-header">
												<h4 class="card-title">
													Catatan Kegiatan
												</h4>
											</div>
											<!-- /.card-header -->
											<div class="card-body">
												<div class="form-group">
													<b>Rangkuman Kegiatan</b>
													<textarea class="ckeditor form-control" id="ckeditor" name="deskripsi" required=""></textarea>
												</div>
												<div class="form-group">
													<b>Bukti</b><br>
													<input type="file" name="foto" required="">
												</div>
											</div>
										</div>
								</div>
								<div class="card-footer">
									<div class="form-group m-0 text-right">
										<a class="btn btn-danger" href="<?= base_url() ?>Dashboard/notulensi"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
										<button type="submit" name="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
									</div>
								</div>
								<!-- /.col-->
						</div>
						</form>
					</div>
					<!-- /traffic sources -->

				</div>
			</div>
			<!-- /dashboard content -->

		</div>
		<!-- /content area -->

		<!-- Footer -->

		<!-- /footer -->

	</div>
	<!-- /main content -->

	</div>
	<!-- /page content -->
	<script src="<?= base_url() ?>assets/frontend/js/jquery.js"></script>
	<script type="text/javascript">
		jQuery.noConflict()
	</script>
	<script src="<?= base_url() ?>assets/frontend/js/jSignature.min.noconflict.js"></script>
	<script>
		(function($) {

			$(document).ready(function() {

				var $sigdiv = $("#signature").jSignature({
					'UndoButton': true
				});

				document.getElementById("signature").onchange = function() {
					myFunction()
				};

				function myFunction() {
					var data = $sigdiv.jSignature('getData', 'image');

					// Storing in textarea
					$('#output').val(data);

					// Alter image source
					$('#sign_prev').attr('src', "data:" + data);
					$('#sign_prev').show();
				}
				$('#click').click(function() {
					// Get response of type image
					var data = $sigdiv.jSignature('getData', 'image');

					// Storing in textarea
					$('#output').val(data);

					// Alter image source
					$('#sign_prev').attr('src', "data:" + data);
					$('#sign_prev').show();
				});

				$('[name="peserta"]').click(function() {
					var id = $('[name="peserta"]').val();
					$('#hasil').load('<?= base_url() . "pbc/cek/" ?>' + id);
				})

			})

		})(jQuery)
	</script>
</body>

</html>
<script src="<?= base_url() ?>assets/ckeditor/ckeditor.js"></script>