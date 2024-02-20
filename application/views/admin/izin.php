<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("admin/components/header.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <?php if ($this->session->flashdata('edit')) { ?>
        <script>
            swal({
                title: "Success!",
                text: "Data Berhasil Diedit!",
                icon: "success"
            });
        </script>
    <?php } ?>

    <?php if ($this->session->flashdata('eror_edit')) { ?>
        <script>
            swal({
                title: "Erorr!",
                text: "Data Gagal Diedit !",
                icon: "error"
            });
        </script>
    <?php } ?>

    <?php if ($this->session->flashdata('hapus')) { ?>
        <script>
            swal({
                title: "Success!",
                text: "Data Berhasil Dihapus!",
                icon: "success"
            });
        </script>
    <?php } ?>

    <?php if ($this->session->flashdata('eror_hapus')) { ?>
        <script>
            swal({
                title: "Erorr!",
                text: "Data Gagal Dihapus !",
                icon: "error"
            });
        </script>
    <?php } ?>

    <?php if ($this->session->flashdata('input')) { ?>
        <script>
            swal({
                title: "Success!",
                text: "Status Izin Berhasil Diubah!",
                icon: "success"
            });
        </script>
    <?php } ?>

    <?php if ($this->session->flashdata('eror_input')) { ?>
        <script>
            swal({
                title: "Erorr!",
                text: "Status Izin Gagal Diubah!",
                icon: "error"
            });
        </script>
    <?php } ?>

    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= base_url(); ?>assets/admin_lte/dist/img/Loading.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <?php $this->load->view("admin/components/navbar.php") ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view("admin/components/sidebar.php") ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Izin</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Izin</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Izin Pegawai</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>

                                            <tr>
                                                <th>No</th>
                                                <th>Nama Lengkap</th>
                                                <th>Alasan</th>
                                                <th>Tanggal Diajukan</th>
                                                <th>Mulai</th>
                                                <th>Berakhir</th>
                                                <th>Perihal Izin</th>
                                                <th>Status Izin</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $no = 0;
                                            foreach ($izin as $i) :
                                                $no++;
                                                $id_izin = $i['id_izin'];
                                                $id_user = $i['id_user'];
                                                $nama_lengkap = $i['nama_lengkap'];
                                                $alasan = $i['alasan'];
                                                $tgl_diajukan = $i['tgl_diajukan'];
                                                $mulai = $i['mulai'];
                                                $berakhir = $i['berakhir'];
                                                $id_status_izin = $i['id_status_izin'];
                                                $perihal_izin = $i['perihal_izin'];

                                            ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $nama_lengkap ?></td>
                                                    <td><?= $alasan ?></td>
                                                    <td><?= $tgl_diajukan ?></td>
                                                    <td><?= $mulai ?></td>
                                                    <td><?= $berakhir ?></td>
                                                    <td><?= $perihal_izin ?></td>
                                                    <td><?php if ($id_status_izin == 1) { ?>
                                                            <div class="table-responsive">
                                                                <div class="table table-striped table-hover ">
                                                                    <a href="" class="btn btn-info" data-toggle="modal" data-target="#edit_data_pegawai">
                                                                        Menunggu Konfirmasi
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        <?php } elseif ($id_status_izin == 2) { ?>
                                                            <div class="table-responsive">
                                                                <div class="table table-striped table-hover ">
                                                                    <a href="" class="btn btn-success" data-toggle="modal" data-target="#edit_data_pegawai">
                                                                        Izin Diterima
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        <?php } elseif ($id_status_izin == 3) { ?>
                                                            <div class="table-responsive">
                                                                <div class="table table-striped table-hover ">
                                                                    <a href="" class="btn btn-danger" data-toggle="modal" data-target="#edit_data_pegawai">
                                                                        Izin Ditolak
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <div class="table-responsive">
                                                            <div class="table table-striped table-hover ">
                                                                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#edit<?= $id_izin ?>">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="table-responsive">
                                                            <div class="table table-striped table-hover ">
                                                                <a href="" data-toggle="modal" data-target="#hapus<?= $id_izin ?>" class="btn btn-danger"><i class="fas fa-trash"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>


                                                </tr>
                                                <!-- Modal Edit Izin -->
                                                <div class="modal fade" id="edit<?= $id_izin ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data
                                                                    Izin
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <form action="<?= base_url(); ?>Izin/edit_izin_admin" method="POST">
                                                                    <input type="text" value="<?= $id_izin ?>" name="id_izin" hidden>
                                                                    <div class="form-group">
                                                                        <label for="alasan">Alasan</label>
                                                                        <textarea class="form-control" id="alasan" rows="3" name="alasan" required><?= $alasan ?></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="perihal_izin">Perihal Izin</label>
                                                                        <input type="text" class="form-control" id="perihal_izin" aria-describedby="perihal_izin" name="perihal_izin" value="<?= $perihal_izin ?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="tgl_diajukan">Tanggal Diajukan</label>
                                                                        <input type="date" class="form-control" id="tgl_diajukan" aria-describedby="tgl_diajukan" name="tgl_diajukan" value="<?= $tgl_diajukan ?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="mulai">Mulai Izin</label>
                                                                        <input type="date" class="form-control" id="mulai" aria-describedby="mulai" name="mulai" value="<?= $mulai ?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="berakhir">Berakhir Izin</label>
                                                                        <input type="date" class="form-control" id="berakhir" aria-describedby="berakhir" name="berakhir" value="<?= $berakhir ?>" required>
                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal Hapus Izin -->
                                                <div class="modal fade" id="hapus<?= $id_izin ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data
                                                                    Izin
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?php echo base_url() ?>Izin/hapus_izin_admin" method="post" enctype="multipart/form-data">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <input type="hidden" name="id_izin" value="<?php echo $id_izin ?>" />
                                                                            <input type="hidden" name="id_user" value="<?php echo $id_user ?>" />

                                                                            <p>Apakah kamu yakin ingin menghapus data
                                                                                ini?</i></b></p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger ripple" data-dismiss="modal">Tidak</button>
                                                                        <button type="submit" class="btn btn-success ripple save-category">Ya</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </tbody>

                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>

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

    <?php $this->load->view("admin/components/js.php") ?>
</body>

</html>