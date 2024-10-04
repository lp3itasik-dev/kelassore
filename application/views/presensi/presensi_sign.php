<!DOCTYPE html>
<html lang="en">
<head>
	 <?php $this->load->view('template/backend/head') ?>
	<style>
	.form-control, .select2-selection{
		border:2px solid #ddd;
		border-top-color:#ddd!important;
		border-radius: 5px;
		padding: 5px;
	}
	.select2-selection{
		padding: 10px 5px;
	}
	.select2-selection--single .select2-selection__arrow:after {
		right: 5px;
	}
	.form-control:not(.border-bottom-1):not(.border-bottom-2):not(.border-bottom-3):focus {
        border-color: #0a5387;
		border-top-color:#0a5387!important;
	}
	.select2-selection:not(.border-bottom-1):not(.border-bottom-2):not(.border-bottom-3):focus {
        border-color: #0a5387;
		border-top-color:#0a5387!important;
	}
	</style>
	<script src="<?= base_url() ?>assets/frontend/js/js/modernizr.js"></script>
	<style type="text/css">
		#signatureparent {
			color:#0a5387;
			background-color:#fff;
			/*max-width:600px;*/
		}

		/*This is the div within which the signature canvas is fitted*/
		#signature {
			border:2px solid #ddd;
			border-radius: 10px;
			background-color:fff;
		}
		.jSignature{
			height: 300px!important;
			width: 100%!important;
		}
		/* Drawing the 'gripper' for touch-enabled devices */
		html.touch #scrollgrabber {
			float:right;
			width:4%;
			margin-right:2%;
			background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAFCAAAAACh79lDAAAAAXNSR0IArs4c6QAAABJJREFUCB1jmMmQxjCT4T/DfwAPLgOXlrt3IwAAAABJRU5ErkJggg==)
		}
		html.borderradius #scrollgrabber {
			border-radius: 1em;
		}

	</style>
</head>

<body>
	<div class="page-content">
		<div class="content-wrapper">
			<div class="content container">
				<div class="row">
					<div class="col-xl-12">
						<div class="card mb-0">
							<div class="card-header">
								<div class="row">
									<div class="col-3 mb-1 mt-1">
										<img style="height:7rem;border-radius:5px" src="<?= base_url() ?>assets/frontend/img/logo-tsk.png" alt="" >
									</div>
									<div class="col-7 text-center">
										<h4><b>
											DAFTAR HADIR KEGIATAN<br>
											PEMERINTAH KOTA TASIKMALAYA</b>
										</h4>
										<i>Jl. Letnan Harun No.1, Panglayungan, Kec. Cipedes, Tasikmalaya, Jawa Barat 46151</i>
									</div>
								</div>
							</div>
							<hr class="mt-0"></hr>
							<form action="<?=base_url()?>Presensi/simpan" method="POST" enctype="multipart/form-data">
								<div class="card-body table-responsive">
									<div class="form-group row mb-0 ml-0">
										<label class="col-form-label col-lg-3 col-lg-3 col-6 p-1">NAMA KEGIATAN <span class="float-right">:</span></label>
										<label class="col-form-label col-lg-9 col-6 p-1">
											<?= strtoupper($read[0]->nama_kegiatan)?>
										</label>

										<label class="col-form-label col-lg-3 col-6 p-1">TANGGAL <span class="float-right">:</span></label>
										<label class="col-form-label col-lg-9 col-6 p-1">
											<?= date('Y-m-d',strtotime($read[0]->waktu_kegiatan)) ?>
										</label>

										<label class="col-form-label col-lg-3 col-6 p-1">WAKTU <span class="float-right">:</span></label>
										<label class="col-form-label col-lg-9 col-6 p-1">
											<?= date('H.i')?>
										</label>
									</div>
								</div>
								<div class="card-body pl-4 pr-4">
								    <input name="id_kegiatan" type="hidden" class="form-control form-control-lg" value="<?= ($read[0]->id_kegiatan)?>" required="" autocomplete="off">
									<div class="form-group form-group-lg row">
										<label class="col-form-label col-lg-12">NIP :</label>
										<div class="col-lg-12">
											<input name="nip" type="text" class="form-control form-control-lg" value="" required="" autocomplete="off">
										</div>
									</div>
									
									<div class="form-group form-group-lg row">
										<label class="col-form-label col-lg-12">NAMA PESERTA :</label>
										<div class="col-lg-12">
											<input name="nama" type="text" class="form-control form-control-lg" value="" required="" autocomplete="off">
										</div>
									</div>
									<div class="form-group form-group-lg row">
										<label class="col-form-label col-lg-12">ALAMAT :</label>
										<div class="col-lg-12">
											<textarea name="alamat" class="form-control form-control-lg" required></textarea>
										</div>
									</div>
									<div class="form-group form-group-lg row">
										<label class="col-form-label col-lg-12">NO TELEPHONE :</label>
										<div class="col-lg-12">
											<input name="no_tlp" type="text" class="form-control form-control-lg" value="" required="" autocomplete="off">
										</div>
									</div>
									<div class="form-group form-group-lg row">
										<label class="col-form-label col-lg-12">EMAIL :</label>
										<div class="col-lg-12">
											<input name="email" type="text" class="form-control form-control-lg" value="" required="" autocomplete="off">
										</div>
									</div>
									
									<div class="form-group row">
										<label class="col-form-label col-lg-12">SIGNATURE :</label>
										<div class="col-lg-12">
											<div id="content">
												<div id="signatureparent">
													<div id="signature"></div></div>
													<textarea id="output" class="d-none" name="signature"></textarea>
											</div>
										</div>
									</div>
									<div class="form-group m-0 text-right">
											<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
									</div>
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
	<script src="<?= base_url() ?>assets/frontend/js/js/jquery.js"></script>
	<script type="text/javascript">
	jQuery.noConflict()
	</script>
	<script src="<?= base_url() ?>assets/frontend/js/js/jSignature.min.noconflict.js"></script>

	<script>
	(function($){

	$(document).ready(function() {

		var $sigdiv = $("#signature").jSignature({'UndoButton':true});

		document.getElementById("signature").onchange = function() {myFunction()};

		function myFunction() {
		var data = $sigdiv.jSignature('getData', 'image');

								// Storing in textarea
								$('#output').val(data);

								// Alter image source
								$('#sign_prev').attr('src',"data:"+data);
								$('#sign_prev').show();
		}
		$('#click').click(function(){
				// Get response of type image
				var data = $sigdiv.jSignature('getData', 'image');

				// Storing in textarea
				$('#output').val(data);

				// Alter image source
				$('#sign_prev').attr('src',"data:"+data);
				$('#sign_prev').show();
		});
		
		$('[name="peserta"]').click(function(){
		    var id = $('[name="peserta"]').val();
		    $('#hasil').load('<?= base_url()."pbc/cek/" ?>'+id);
		})

	})

	})(jQuery)
	</script>
</body>
</html>
