<div class="container">


    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Tambah Data Mahasiswa
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                            <div class="form-text text-danger"><?= form_error('nama');?></div>
                        </div>
                        <div class="mb-3">
                            <label for="nrp" class="form-label">Nrp</label>
                            <input type="text" class="form-control" id="nrp" name="nrp">
                            <div class="form-text text-danger"><?= form_error('nrp');?></div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email">
                            <div class="form-text text-danger"><?= form_error('email');?></div>
                        </div>
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="jurusan">
                            <option selected>Jurusan</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Teknologi Informasi">Teknologi Informasi</option>
                        </select>
                        <div class="form-text text-danger"><?= form_error('jurusan');?></div>
                        <button type="submit" class="btn btn-primary float-end">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>