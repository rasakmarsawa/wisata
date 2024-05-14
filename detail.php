<?php
session_start();
require 'controller/pageController.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <?php require "include/head.php" ?>
    </head>
    <body>
        <!-- Responsive navbar-->
        <?php require "include/navbar.php" ?>
        <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1"><?php echo $data['nama_wisata'] ?></h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Posted on <?php echo $data['created_on'] ?> by <?php echo $data['nama_admin'] ?></div>
                            <!-- Post categories-->
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!"><?php echo $data['nama_kategori'] ?></a>
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded" src="<?php echo $image ?>" alt="https://dummyimage.com/900x400/ced4da/6c757d.jpg" /></figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            <p class="fs-5 mb-4"><?php echo $data['deskripsi'] ?></p>
                        </section>
                    </article>
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Categories widget-->
                    <?php require 'include/categorywidget.php' ?>
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">Lokasi</div>
                        <div class="card-body">
                          <iframe src="<?php echo $data['map'] ?>" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
