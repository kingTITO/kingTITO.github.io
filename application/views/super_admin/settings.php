<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("super_admin/components/header.php") ?>
    <link rel="icon" type="image/png" href="<?= base_url();?>assets/semarang1.png" />

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
    <?php if ($this->session->flashdata('password_err')){ ?>
    <script>
    swal({
        title: "Error Password!",
        text: "Ketik Ulang Password!",
        icon: "error"
    });
    </script>
    <?php } ?>
    <?php if ($this->session->flashdata('edit')){ ?>
    <script>
    swal({
        title: "Success!",
        text: "Data Berhasil Diedit!",
        icon: "success"
    });
    </script>
    <?php } ?>
    <?php if ($this->session->flashdata('eror_edit')){ ?>
    <script>
    swal({
        title: "Erorr!",
        text: "Data Gagal Diedit!",
        icon: "error"
    });
    </script>
    <?php } ?>
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= base_url();?>assets/admin_lte/dist/img/Loading.png"
                alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <?php $this->load->view("super_admin/components/navbar.php") ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view("super_admin/components/sidebar.php") ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Setting</h1>
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

                    <form action="<?=base_url();?>Settings/settings_account_super_admin" method="POST">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                aria-describedby="Username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                aria-describedby="password" required>
                        </div>
                        <div class="form-group">
                            <label for="re_password">Ulangi Password</label>
                            <input type="password" class="form-control" id="re_password" name="re_password"
                                aria-describedby="re_password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

					<div class="mt-3 mb-3" style="border: 1px solid #000;"></div>

					<form action="<?=base_url();?>Settings/tanda_tangan" method="POST">
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
<?php $this->load->view("super_admin/components/js.php") ?>
<?php $this->load->view("pegawai/components/js-signature.php") ?>
