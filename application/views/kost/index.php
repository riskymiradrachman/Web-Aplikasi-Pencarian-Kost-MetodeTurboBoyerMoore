<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-12">
            <!------------------------------------------ menampilkan pesan error/berhasil di dari 'menu' apabila  isi data------------------------------------------------------>
            <?= form_error('nama', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('harga', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('fasilitas', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('alamat', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('no_telepon', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('lokasi', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('kost', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('kamar', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('toilet', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('kamar2', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>
            <!------------------------------------------ menampilkan pesan error/berhasil di dari 'menu' apabila  isi data------------------------------------------------------>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Tambah Data</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NAMA</th>
                        <th scope="col">HARGA</th>
                        <th scope="col">FASILITAS</th>
                        <th scope="col">ALAMAT</th>
                        <th scope="col">No Telepon</th>
                        <th scope="col">LOKASI</th>
                        <th scope="col">GAMBAR KOST</th>
                        <th scope="col">GAMBAR KAMAR</th>
                        <th scope="col">GAMBAR TOILET</th>
                        <th scope="col">GAMBAR KAMAR 2</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!------------------------------------------ mengurutkan nomor ------------------------------------------------------>
                    <?php $i = 1; ?>
                    <!------------------------------------------ mengurutkan nomor ------------------------------------------------------>
                    <?php foreach ($kost as $k) : ?>
                        <tr>
                            <!------------------------------------------ mengurutkan nomor ------------------------------------------------------>
                            <th scope="row"><?= $i; ?></th>
                            <!------------------------------------------ mengurutkan nomor ------------------------------------------------------>

                            <!------------------------------------------ menampilkan data menu ------------------------------------------------------>
                            <td><?= $k['nama']; ?></td>
                            <td><?= $k['harga']; ?></td>
                            <td><?= $k['fasilitas']; ?></td>
                            <td><?= $k['alamat']; ?></td>
                            <td><?= $k['no_telepon']; ?></td>
                            <td><?= $k['lokasi']; ?></td>
                            <td><img src=" <?= base_url('assets/img/kost/') . $k['kost']; ?>" width="100px"></td>
                            <td><img src=" <?= base_url('assets/img/kamar/') . $k['kamar']; ?>" width="100px"></td>
                            <td><img src=" <?= base_url('assets/img/toilet/') . $k['toilet']; ?>" width="100px"></td>
                            <td><img src=" <?= base_url('assets/img/kamar2/') . $k['kamar2']; ?>" width="100px"></td>

                            <!------------------------------------------ menampilkan data menu ------------------------------------------------------>
                            <td>
                                <a href=" <?= base_url(); ?>kost/edit/<?= $k['id']; ?>" class="badge badge-success">Edit</a>
                                <a href="<?= base_url(); ?>kost/hapus/<?= $k['id']; ?>" class="badge badge-danger float" onclick="return confirm('Yakin Menghapus Data Kost?'); ">Hapus</a>
                            </td>
                        </tr>
                        <!------------------------------------------ mengurutkan nomor ------------------------------------------------------>
                        <?php $i++; ?>
                        <!------------------------------------------ mengurutkan nomor ------------------------------------------------------>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!------------------------------------------------------------------------------------ Modal/pilihan form untuk isi data ------------------------------------------------------------------------------------------>

<!-- Modal -->
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Tambah Kost Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--------------------------------------------------------------------------------------- form tambah data ------------------------------------------------------------------------------------------------>
            <!----------------------------------------------------- php buat tambah data ---------------------------------------------->

            <!-- kalau upload file harus ada  enctype="multipart/form-data" -->
            <form action="<?= base_url('kost'); ?>" method="POST" enctype="multipart/form-data">
                <!------------------------------------------------- php buat tambah data ---------------------------------------------->
                <div class="modal-body">
                    <!-------------------------------------------------------------------- kotak form dari sini ---------------------------------------------->
                    <div class="form-group">
                        <div class="form-group mb-2">
                            <label for="nim">Nama Kost</label>
                            <input type="text" name="nama" class="form-control" id="nama">
                        </div>
                        <div class="form-group mb-2">
                            <label for="nama">Harga Sewa</label>
                            <input type="text" name="harga" class="form-control" id="harga">
                        </div>
                        <div class="form-group mb-2">
                            <label for="ipk">Fasilitas</label>
                            <input type="text" name="fasilitas" class="form-control" id="fasilitas">
                        </div>
                        <div class="form-group mb-2">
                            <label for="semester">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat">
                        </div>
                        <div class="form-group mb-4">
                            <label for="pekerjaan_family">Nomor Telepon</label>
                            <input type="text" name="no_telepon" class="form-control" id="no_telepon">
                        </div>
                        <div class="form-group mb-4">
                            <label for="pekerjaan_family">Lokasi</label>
                            <input type="text" name="lokasi" class="form-control" id="lokasi">
                        </div>
                        <div class="custom-file mb-4">
                            <input type="file" class="custom-file-input" name="kost" id="kost">
                            <label class="custom-file-label" for="sktm">Gambar Kost</label>
                        </div>
                        <div class="custom-file mb-4">
                            <input type="file" class="custom-file-input" name="kamar" id="kamar">
                            <label class="custom-file-label" for="sktmb">Gambar Kamar</label>
                        </div>
                        <div class="custom-file mb-4">
                            <input type="file" class="custom-file-input" name="toilet" id="toilet">
                            <label class="custom-file-label" for="sktmb">Gambar Toilet</label>
                        </div>
                        <div class="custom-file mb-4">
                            <input type="file" class="custom-file-input" name="kamar2" id="kamar2">
                            <label class="custom-file-label" for="sktmb">Gambar Kamar 2</label>
                        </div>
                    </div>
                    <!-------------------------------------------------------------------- kotak form sampai sini -------------------------------------------->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
            <!----------------------------------------------------------------------------------------- form tambah data -------------------------------------------------------------------------------------------->
        </div>
    </div>
</div>