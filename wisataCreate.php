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
                    <h1 class="h3 mb-2 text-gray-800">Buat Wisata Baru</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                          <form name="login" method="POST" enctype="multipart/form-data">
                              <div class="form-group">
                                  <label for="nama_wisata">Nama Wisata</label>
                                  <input type="text" name="nama_wisata" class="form-control" placeholder="Nama Wisata">
                              </div>
                              <div class="form-group">
                                  <label for="deskripsi">Deskripsi</label>
                                  <textarea name="deskripsi" rows="8" cols="80" class="form-control"></textarea>
                              </div>
                              <div class="form-group">
                                  <label for="alamat">Alamat</label>
                                  <input type="text" name="alamat" class="form-control" placeholder="Alamat">
                              </div>
                              <div class="form-group">
                                  <label for="map">Embed Source</label>
                                  <input type="text" name="map" class="form-control" placeholder="Embed Tag">
                              </div>
                              <div class="form-group">
                                  <label for="id_Kategori">Kategori</label>
                                  <select name="id_kategori" class="form-control">
                                    <?php foreach ($data as $key => $value): ?>
                                      <option value="<?php echo $value['id_kategori'] ?>"><?php echo $value['nama_kategori'] ?></option>
                                    <?php endforeach; ?>
                                  </select>
                              </div>
                              <div class="form-group">
                                  <label for="foto">Foto</label>
                                  <input type="file" name="foto" class="form-control" placeholder="Foto">
                              </div>
                              <input type="submit" name="submit" class="btn btn-primary btn-user btn-block" value="Submit">
                          </form>

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

    <div id="map">

    </div>

</body>

</html>
