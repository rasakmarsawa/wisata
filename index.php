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
        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Website Wisata Kabupaten Tanah Datar</h1>
                    <p class="lead mb-0">Selamat Datang!</p>
                </div>
            </div>
        </header>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    <?php if (isset($data['id_wisata'])): ?>
                      <div class="card mb-4">
                          <a href="#!"><img class="card-img-top" src="uploads/<?php echo $data['id_wisata'].".".$data['imgtype'] ?>" alt="..." /></a>
                          <div class="card-body">
                              <div class="small text-muted"><?php echo $data['created_on'] ?></div>
                              <h2 class="card-title"><?php echo $data['nama_wisata'] ?></h2>
                              <!-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p> -->
                              <a class="btn btn-primary" href="detail.php?id=<?php echo $data['id_wisata'] ?>">Read more →</a>
                          </div>
                      </div>
                    <?php endif; ?>
                    <!-- Nested row for non-featured blog posts-->
                    <div class="row">
                        <div class="col-lg-6">
                            <?php foreach ($data21 as $key => $value): ?>
                              <div class="card mb-4">
                                  <a href="#!"><img class="card-img-top" src="uploads/<?php echo $value['id_wisata'].".".$value['imgtype'] ?>" alt="..." /></a>
                                  <div class="card-body">
                                      <div class="small text-muted"><?php echo $value['created_on'] ?></div>
                                      <h2 class="card-title h4"><?php echo $value['nama_wisata'] ?></h2>
                                      <!-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla.</p> -->
                                      <a class="btn btn-primary" href="detail.php?id=<?php echo $value['id_wisata'] ?>">Read more →</a>
                                  </div>
                              </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="col-lg-6">
                          <?php foreach ($data22 as $key => $value): ?>
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="uploads/<?php echo $value['id_wisata'].".".$value['imgtype'] ?>" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted"><?php echo $value['created_on'] ?></div>
                                    <h2 class="card-title h4"><?php echo $value['nama_wisata'] ?></h2>
                                    <!-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla.</p> -->
                                    <a class="btn btn-primary" href="detail.php?id=<?php echo $value['id_wisata'] ?>">Read more →</a>
                                </div>
                            </div>
                          <?php endforeach; ?>
                        </div>
                    </div>
                    <?php require "include/pagination.php" ?>
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Categories widget-->
                    <?php require 'include/categorywidget.php' ?>
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
