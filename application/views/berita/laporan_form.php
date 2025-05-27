<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Liputan Berita</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Liputan Berita</li>
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
                <h3 class="card-title">Berita yang ditampilkan</h3>

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
                <h3>Laporan Berita</h3>
                <form method="post" action="<?= base_url('berita/cetak_laporan') ?>">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Dari Tanggal:</label>
                            <input type="date" name="tanggal_dari" required>

                            <label>Sampai Tanggal:</label>
                            <input type="date" name="tanggal_sampai" required>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Tampilkan Laporan</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <p>&copy; 2025 Arif News. All rights reserved.</p>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
</div>