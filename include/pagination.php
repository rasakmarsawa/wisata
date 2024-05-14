<!-- Pagination-->
<?php if ($maxpage!=0): ?>
  <nav aria-label="Pagination">
      <hr class="my-0" />
      <ul class="pagination justify-content-center my-4">
          <li class="page-item
          <?php if ($pagenum == 1): ?>
            disabled
          <?php endif; ?>
          "><a class="page-link" href="?<?php if(isset($_GET['category'])){echo 'category='.$_GET['category'];} ?>&&page=<?php echo $pagenum-1 ?>">Newer</a></li>
          <li class="page-item
          <?php if ($pagenum == 1): ?>
            active
          <?php endif; ?>
          " aria-current="page"><a class="page-link" href="?<?php if(isset($_GET['category'])){echo 'category='.$_GET['category'];} ?>&&page=1">1</a></li>
          <?php
          $i = 0;
          $startpage = $pagenum-1;
          while ($i<3 && $startpage<$maxpage) {
            if ($startpage>1) {
              ?>
              <li class="page-item
              <?php if ($startpage == $pagenum){ echo "active";} ?>
              "><a class="page-link" href="?<?php if(isset($_GET['category'])){echo 'category='.$_GET['category'];} ?>&&page=<?php echo $startpage ?>"><?php echo $startpage ?></a></li>
              <?php
            }
          ?>

          <?php

          $startpage++;
          $i++;
          }
          ?>
          <!-- <li class="page-item disabled"><a class="page-link" href="#!">...</a></li> -->
          <?php if ($maxpage != 1): ?>
            <li class="page-item
            <?php if ($pagenum == $maxpage): ?>
              active
            <?php endif; ?>"><a class="page-link" href="?<?php if(isset($_GET['category'])){echo 'category='.$_GET['category'];} ?>&&page=<?php echo $maxpage ?>"><?php echo $maxpage ?></a></li>
          <?php endif; ?>
          <li class="page-item
          <?php if ($pagenum == $maxpage): ?>
            disabled
          <?php endif; ?>
          "><a class="page-link" href="?<?php if(isset($_GET['category'])){echo 'category='.$_GET['category'];} ?>&&page=<?php echo $pagenum+1 ?>">Older</a></li>
      </ul>
  </nav>
<?php endif; ?>
