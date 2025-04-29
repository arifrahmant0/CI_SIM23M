<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kategori</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Kategori</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Kategori</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <a href="<?= base_url('kategori/tambah'); ?>" class="btn btn-primary mb-3">Tambah Kategori</a>
                <?php if (!empty($kategori)): ?>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nama Kategori</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kategori as $k): ?>
                                <tr>
                                    <td><?= $k['nama_kategori']; ?></td>
                                    <td><?= $k['deskripsi']; ?></td>
                                    <td>
                                        <a href="<?= base_url('kategori/edit/' . $k['id']); ?>" class="btn btn-sm btn-info">Edit</a>
                                        <a href="<?= base_url('kategori/hapus/' . $k['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>Tidak ada kategori yang tersedia.</p>
                <?php endif; ?>
            </div>
            <!-- /.card-body -->
        </div>
        <div class="card-footer">
            Footer
        </div>
        <!-- /.card-footer-->
</div>
<!-- /.card -->
</section>
<!-- /.content -->
</div>