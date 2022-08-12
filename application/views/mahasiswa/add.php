
<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Materi</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('mahasiswa'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Data</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
					
				<?php
                    //create form
                    $attributes = array('id' => 'FrmAddMahasiswa', 'method' => "post", "enctype" => "multipart/form-data");
                    echo form_open('', $attributes);
                    ?>
                    <div class="form-group row">
                        <label for="judul_materi" class="col-sm-2 col-form-label">Judul materi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="judul_materi" name="judul_materi" value=" <?= set_value('judul_materi'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('judul_materi') ?>
                            </small>
                        </div>
                    </div>
					<div class="form-group row">
                        <label for="isi_materi" class="col-sm-2 col-form-label">Isi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="isi_materi" name="isi_materi" value=" <?= set_value('isi_materi'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('isi_materi') ?>
                            </small>
                        </div>
                    </div>
					<div class="form-group row">
                        <label for="tags_materi" class="col-sm-2 col-form-label">Tags</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tags_materi" name="tags_materi" value=" <?= set_value('tags_materi'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('tags_materi') ?>
                            </small>
                        </div>
                    </div>

					<div class="form-group row">
                        <label for="foto_materi" class="col-sm-2 col-form-label">Foto Materi</label>
                        <div class="col-sm-10">
						<input type="file" name="foto_materi" class="form-control" id="foto_materi" name="foto_materi">
                            <small class="text-danger">
                                <?php echo form_error('foto_materi') ?>
                            </small>
                        </div>
                    </div>	
					<div class="form-group row">
                        <label for="thumbnail_materi" class="col-sm-2 col-form-label">Foto Thumbnail</label>
                        <div class="col-sm-10">
						<input type="file" name="thumbnail_materi" class="form-control" id="thumbnail_materi" name="thumbnail_materi">
                            <small class="text-danger">
                                <?php echo form_error('thumbnail_materi') ?>
                            </small>
                        </div>
                    </div>
					<div class="col-md-12">

<label>Kategori Materi</label>

<br>

<select class="custom-select" name="kategori">

	<option selected>Kategori</option>

	<?php foreach ($kategori as $k) : ?>

		<option value="<?= $k['id_kategori_materi']; ?>"><?= $k['nama_kategori_materi'] ?></option>

	<?php endforeach; ?>

</select>

</div>
	
                    <div class="form-group row">
                        <div class="col-sm-10 offset-md-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a class="btn btn-secondary" href="javascript:history.back()">Kembali</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
