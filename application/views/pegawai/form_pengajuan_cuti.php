<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("pegawai/components/header.php") ?>

	<style>
		#signature-pad {
			display: block;
			position: relative;
			border: 1px solid;
			background-color: #fff;
			margin-bottom: 1rem;
		}
	</style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= base_url(); ?>assets/admin_lte/dist/img/Loading.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <?php $this->load->view("pegawai/components/navbar.php") ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view("pegawai/components/sidebar.php") ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Form Permohonan Cuti</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Setting</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <form action="<?= base_url(); ?>Form_Cuti/proses_cuti" method="POST" enctype="multipart/form-data">
                        <input type="text" value="<?= $this->session->userdata('id_user') ?>" name="id_user" hidden>
                        <div class="form-group">
                            <label for="alasan">Alasan</label>
                            <textarea class="form-control" id="alasan" rows="3" name="alasan" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="perihal_cuti">Perihal Cuti</label>
                            <input type="text" class="form-control" id="perihal_cuti" aria-describedby="perihal_cuti" name="perihal_cuti" required>
                        </div>
                        <div class="form-group">
                            <label for="mulai">Mulai Cuti</label>
                            <input type="date" class="form-control" id="mulai" aria-describedby="mulai" name="mulai" required>
                        </div>
                        <div class="form-group">
                            <label for="berakhir">Berakhir Cuti</label>
                            <input type="date" class="form-control" id="berakhir" aria-describedby="berakhir" name="berakhir" required>
                        </div>
                        <div class="form-group">
                            <label for="file">Dokumen</label>
                            <input type="file" class="form-control" id="file" aria-describedby="file" name="file">
                        </div>
						<div class="form-group">
                            <label for="file">Tanda Tangan</label>
							<br>
							<canvas id="signature-pad" width="300" height="150"></canvas>
							<div>
								<button type="button" id="clear">Ulangi</button>
							</div>

                            <!-- <input type="text" class="form-control" id="tanda_tangan" aria-describedby="tanda_tangan" name="tanda_tangan"> -->
							<textarea name="tanda_tangan" id="tanda_tangan" hidden></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

</body>

</html>
<?php $this->load->view("pegawai/components/js.php") ?>
<?php $this->load->view("pegawai/components/js-signature.php") ?>
<?php if ($this->session->flashdata('input')) { ?>
	<script>
		swal({
			title: "Success!",
			text: "Data Berhasil Ditambahkan!",
			icon: "success"
		});
	</script>
<?php } ?>

<?php if ($this->session->flashdata('eror_input')) { ?>
	<script>
		swal({
			title: "Erorr!",
			text: "Data Gagal Ditambahkan!",
			icon: "error"
		});
	</script>
<?php } ?>
