<form action="<?= base_url('kost/edit/' . $kost[0]['id']); ?>" method="POST" enctype="multipart/form-data">
    <div class="container">
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        <div class="form-group">
            <div class="form-group mb-2">
                <label for="nim">Nama Kost</label>
                <input type="text" name="nama" class="form-control" id="nama" value="<?= $kost[0]['nama'] ?>">
            </div>
            <div class="form-group mb-2">
                <label for="nama">Harga Sewa</label>
                <input type="text" name="harga" class="form-control" id="harga" value="<?= $kost[0]['harga'] ?>">
            </div>
            <div class="form-group mb-2">
                <label for="ipk">Fasilitas</label>
                <input type="text" name="fasilitas" class="form-control" id="fasilitas" value="<?= $kost[0]['fasilitas'] ?>">
            </div>
            <div class="form-group mb-2">
                <label for="semester">Alamat</label>
                <input type="text" name="alamat" class="form-control" id="alamat" value="<?= $kost[0]['alamat'] ?>">
            </div>
            <div class="form-group mb-4">
                <label for="pekerjaan_family">Nomor Telepon</label>
                <input type="text" name="no_telepon" class="form-control" id="no_telepon" value="<?= $kost[0]['no_telepon'] ?>">
            </div>
            <div class="form-group mb-4">
                <label for="pekerjaan_family">Lokasi</label>
                <input type="text" name="lokasi" class="form-control" id="lokasi" value="<?= $kost[0]['lokasi'] ?>">
            </div>
            <div class="form-group mb-4">
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-2">
                            <img src="<?= base_url('assets/img/kost/') . $kost[0]['kost']; ?>" width="100px">
                        </div>
                        <div class="col-sm-10">
                            <div class="col-mb-2">Gambar Kost</div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="kost" name="kost">
                                <label class="custom-file-label" for="sktm">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group mb-4">
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-2">
                            <img src="<?= base_url('assets/img/kamar/') . $kost[0]['kamar']; ?>" width="100px">
                        </div>
                        <div class="col-sm-10">
                            <div class="col-mb-2">Gambar Kamar</div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="kamar" name="kamar">
                                <label class="custom-file-label" for="sktmb">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group mb-4">
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-2">
                            <img src="<?= base_url('assets/img/toilet/') . $kost[0]['toilet']; ?>" width="100px">
                        </div>
                        <div class="col-sm-10">
                            <div class="col-mb-2">Gambar Toilet</div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="toilet" name="toilet">
                                <label class="custom-file-label" for="sktmb">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group mb-4">
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-2">
                            <img src="<?= base_url('assets/img/kamar2/') . $kost[0]['kamar2']; ?>" width="100px">
                        </div>
                        <div class="col-sm-10">
                            <div class="col-mb-2">Gambar Kamar 2</div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="kamar2" name="kamar2">
                                <label class="custom-file-label" for="sktmb">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Ubah</button>
    </div>
    </div>
</form>