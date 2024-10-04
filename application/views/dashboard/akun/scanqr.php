<!--Camera Scan QR-->
<div id="reader" width="100%"></div>
<!--/Camera Scan QR-->
<script src="<?= base_url() ?>assets/frontend/js/html5-qrcode.min.js"></script>
<script>
		const html5QrCode = new Html5Qrcode("reader");
		
		// This method will trigger user permissions
		Html5Qrcode.getCameras().then(devices => {
		  /**
		   * devices would be an array of objects of type:
		   * { id: "id", label: "label" }
		   */
		  if (devices && devices.length) {
		    var cameraId = devices[0].id;
		    // .. use this to start scanning.
			// Create instance of the object. The only argument is the "id" of HTML element created above.
			
			
			html5QrCode.start(
			  { facingMode: "environment" },     // retreived in the previous step.
			  {
			    fps: 10,    // sets the framerate to 10 frame per second
			    qrbox: 700  // sets only 250 X 250 region of viewfinder to
					// scannable, rest shaded.
			  },
			  qrCodeMessage => {
			    // do something when code is read. For example:
				//alert(`${qrCodeMessage}`);
				window.location.href = '<?= base_url() ?>Operator/save_presensi/'+`${qrCodeMessage}`; //Will take you to Google.
				//console.log(`${qrCodeMessage}`);
			    
			  },
			  errorMessage => {
			    // parse error, ideally ignore it. For example:
			    console.log(`QR Code no longer in front of camera.`);
			  })
			.catch(err => {
			  // Start failed, handle it. For example,
			  console.log(`Unable to start scanning, error: ${err}`);
			}); 
		  }
		}).catch(err => {
		  // handle err
		});
</script>