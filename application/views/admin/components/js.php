<!-- jQuery -->
<script src="<?= base_url();?>assets/admin_lte/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url();?>assets/admin_lte/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url();?>assets/admin_lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url();?>assets/admin_lte/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<!-- <script src="<?= base_url();?>assets/admin_lte/plugins/sparklines/sparkline.js"></script> -->
<!-- JQVMap -->
<script src="<?= base_url();?>assets/admin_lte/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url();?>assets/admin_lte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url();?>assets/admin_lte/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url();?>assets/admin_lte/plugins/moment/moment.min.js"></script>
<script src="<?= base_url();?>assets/admin_lte/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url();?>assets/admin_lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
</script>
<!-- Summernote -->
<script src="<?= base_url();?>assets/admin_lte/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url();?>assets/admin_lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url();?>assets/admin_lte/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="<?= base_url();?>assets/admin_lte/dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<!-- Datatables -->
<!-- <script src="<?= base_url();?>assets/admin_lte/dist/js/pages/dashboard.js"></script> -->
<script src="<?= base_url();?>assets/admin_lte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url();?>assets/admin_lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url();?>assets/admin_lte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url();?>assets/admin_lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url();?>assets/admin_lte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url();?>assets/admin_lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url();?>assets/admin_lte/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url();?>assets/admin_lte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url();?>assets/admin_lte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url();?>assets/admin_lte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url();?>assets/admin_lte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url();?>assets/admin_lte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": true,
        "buttons": ["colvis"],
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

	$('#table-cuti').DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": true,
        "buttons": [
			"colvis",
			"excel",
            {
                text: 'Excel (Izin Cuti Diterima)',
                extend: 'excel',
				customizeData: function( e, dt, node, config ) {
					const cek = e.body.filter((x) => x[7].includes('Izin Cuti Diterima'))
					e.body = cek
				},
                exportOptions: {
					// autoFilter: true,
                    modifier: {
                        selected: null,
                        search: 'applied',
                        order: 'applied',
                        page: 'all'
                    },
                    orthogonal: 'export',
					columns: [0,1,2,3,4,5,6,8],
                    format: {
                        header: function (data, columnIdx) {
                            if (columnIdx == 7) { // Ganti dengan indeks kolom status
                                // return 'Status Cuti';
                            }
                            return data;
                        },
                        body: function (data, columnIdx, rowIdx, node) {
									
							if(rowIdx === 7) {
								let text = $('<div />').html(data).text().replace(/\s/g, '').replace(/([A-Z])/g, ' $1');
								// console.log(rowIdx, columnIdx, data)
								// console.log(text)
								
								// return text;
								if(text.includes('Izin Cuti Diterima')) {
									return text
								} else {
									return ''
								}
							}

							return data;
                        },
                    }
                }
            }
        ]
    }).buttons().container().appendTo('#table-cuti_wrapper .col-md-6:eq(0)');
});
</script>

<!-- <script src="https://cdn.datatables.net/tabletools/2.2.4/js/dataTables.tableTools.min.js"></script>
<script>
$(document).ready(function() {
    $('#example1').DataTable( {
        "sDom": 'T<"clear">lfrtip',
        "tableTools": {
            "sSwfPath": "https://cdn.datatables.net/tabletools/2.2.4/swf/copy_csv_xls_pdf.swf",
            "aButtons": [
                {
                    "sExtends": "xls",
                    "sButtonText": "Excel (Izin Cuti Diterima)",
                    "mColumns": [0,1,2,3,4,5,6,7], // Ganti dengan indeks kolom status
                    "sMessage": "Berikut adalah data dengan status Izin Cuti Diterima.", // Ganti dengan status yang Anda cari
                    "bSelectedOnly": true,
                    "fnCellRender": function (sValue, iColumn, nTr, iDataIndex) {
                        if (iColumn == 7) { // Ganti dengan indeks kolom status
                            if (sValue == 'Izin Cuti Diterima') { // Ganti dengan status yang Anda cari
                                return sValue;
                            }
                            return '';
                        }
                        return sValue;
                    }
                }
            ]
        }
    });
});
</script> -->
