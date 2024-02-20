<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.7/dist/signature_pad.umd.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1/dist/signature_pad.umd.min.js"></script> -->

<!-- <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js" integrity="sha256-W+ivNvVjmQX6FTlF0S+SCDMjAuTVNKzH16+kQvRWcTg=" crossorigin="anonymous"></script> -->
<script>
	const canvas = document.getElementById("signature-pad");

	const signaturePad = new SignaturePad(canvas);

	<?php if (isset($tanda_tangan)) : ?>
	signaturePad.fromDataURL("data:image/png;base64,<?= $tanda_tangan ?>");
	<?php endif ?>

	var saveButton = document.getElementById('save');
	var	clearButton = document.getElementById('clear');
	var	showPointsToggle = document.getElementById('showPointsToggle');

	// saveButton.addEventListener('click', function(event) {
	// 	var data = signaturePad.toDataURL('image/png');
	// 	window.open(data);
	// });
	clearButton.addEventListener('click', function(event) {
		signaturePad.clear();
	});
	// showPointsToggle.addEventListener('click', function(event) { 
	// 	signaturePad.showPointsToggle();
	// 	showPointsToggle.classList.toggle('toggle');
	// });

	// signaturePad.addEventListener("beginStroke", () => {
	// 	console.log("Signature beginStroke");
	// }, { once: true });
	signaturePad.addEventListener("endStroke", () => {
		console.log("Signature endStroke");
		var data = signaturePad.toDataURL('image/png');
		$('#tanda_tangan').text(data)
	}, { once: true });
	// signaturePad.addEventListener("beforeUpdateStroke", () => {
	// 	console.log("Signature beforeUpdateStroke");
	// }, { once: true });
	// signaturePad.addEventListener("afterUpdateStroke", () => {
	// 	console.log("Signature afterUpdateStroke");
	// }, { once: true });
</script>
