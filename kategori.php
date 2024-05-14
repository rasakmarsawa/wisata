<?php
session_start();
require 'controller/pageController.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

      <?php require "include/head.admin.php" ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php require 'include/sidebar.admin.php' ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php require 'include/topbar.admin.php' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Kategori Wisata</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <a class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#newKategoriModal">
                                <span class="icon text-white-50">
                                    <i class="fas fa-flag"></i>
                                </span>
                                <span class="text">Buat Data Baru</span>
                            </a>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                      <?php foreach ($data as $key => $value): ?>
                                        <tr>
                                            <td><?php echo $value['nama_kategori'] ?></td>
                                            <td>
                                              <a class="btn btn-info btn-icon-split" data-toggle="modal" data-id="<?php echo $value['id_kategori'].'-'.$value['nama_kategori'] ?>" onclick="$('#dataidupdate').val($(this).data('id')); $('#updateKategoriModal').modal('show');">
                                                  <span class="icon text-white-50">
                                                      <i class="fas fa-pen"></i>
                                                  </span>
                                                  <span class="text">Ubah</span>
                                              </a>
                                              <a id="delete" class="btn btn-danger btn-icon-split" data-toggle="modal" data-id="<?php echo $value['id_kategori'].'-'.$value['nama_kategori'] ?>" onclick="$('#dataiddelete').val($(this).data('id')); $('#deleteKategoriModal').modal('show');">
                                                  <span class="icon text-white-50">
                                                      <i class="fas fa-trash"></i>
                                                  </span>
                                                  <span class="text">Hapus</span>
                                              </a>
                                            </td>
                                        </tr>
                                      <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade" id="newKategoriModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Buat Kategori</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                  <form method="POST">
                      <div class="form-group">
                          <input type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori Baru">
                      </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <input type="submit" name="submit" class="btn btn-primary" value="Buat">
                </div>
              </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteKategoriModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Kategori</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                  <form method="post">
                    <div class="form-group">
                        <input type="text" name="dataiddelete" id="dataiddelete" class="form-control" readonly="true">
                    </div>
                    Apakah anda yakin akan menghapus kategori ini?
                  </div>
                  <div class="modal-footer">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                      <input type="submit" name="submit" class="btn btn-danger" value="Hapus">
                  </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateKategoriModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Kategori</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                  <form method="post">
                    <div class="form-group">
                        <input type="text" name="dataidupdate" id="dataidupdate" class="form-control" readonly="true">
                    </div>
                    <div class="form-group">
                        <input type="text" name="nama_kategori" class="form-control">
                    </div>
                  </div>
                  <div class="modal-footer">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                      <input type="submit" name="submit" class="btn btn-info" value="Ubah">
                  </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
