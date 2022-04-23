<div class="container">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash');?>"></div>
    <?php if ($this->session->flashdata('flash')) : ?>
        <!-- <div class="row mt-3">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Mahasiswa<strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div> -->
    <?php endif; ?>
    <div class="row">
        <div class="col-md-6 mt-3">
            <a href="<?= base_url(); ?>mahasiswa/tambah" class="btn btn-primary">Tambah Data Mahasiswa</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Data Mahasiswa" name="keyword">
                    <button class="input-group-text btn-primary" type="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <h3>Daftar Mahasiswa</h3>
            <?php if (empty($mahasiswa)) :?>
                <div class="alert alert-danger" role="alert">
                    Data Mahasiswa Tidak Ditemukan
                </div>
            <?php endif;?>
            <ul class="list-group">
                <?php foreach ($mahasiswa as $mhs) : ?>
                    <li class="list-group-item tombol-hapus">
                        <?= $mhs['nama']; ?>
                        <a href="<?= base_url(); ?>/mahasiswa/hapus/<?= $mhs['id']; ?>"><span class="badge rounded-pill bg-danger float-end tombol-hapus" id="tombol-hapus">hapus</span></a>
                        <a href="<?= base_url(); ?>/mahasiswa/ubah/<?= $mhs['id']; ?>"><span class="badge rounded-pill bg-success float-end">ubah</span></a>
                        <a href="<?= base_url(); ?>/mahasiswa/detail/<?= $mhs['id']; ?>"><span class="badge rounded-pill bg-primary float-end">detail</span></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>


</div>