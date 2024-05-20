<div class="card mb-4">
    <div class="card-header">Kategori</div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <ul class="list-unstyled mb-0">
                    <?php foreach ($listkategori1 as $key => $value): ?>
                      <li><a href="search.php?category=<?php echo $value['id_kategori'] ?>"><?php echo $value['nama_kategori'] ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-sm-6">
                <ul class="list-unstyled mb-0">
                    <?php foreach ($listkategori2 as $key => $value): ?>
                      <li><a href="search.php?category=<?php echo $value['id_kategori'] ?>"><?php echo $value['nama_kategori'] ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
