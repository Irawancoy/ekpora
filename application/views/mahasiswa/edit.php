
<div class="container pt-5">
    <h3>Edit Data Barang</h3>
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php
                    //create form
                    $attributes = array('id' => 'FrmEditMahasiswa', 'method' => "post", "autocomplete" => "off", "enctype" => "multipart/form-data");
                    echo form_open('', $attributes);
                    ?>
                    <div class="form-group row">
                        <label for="judul_materi" class="col-sm-2 col-form-label">Judul</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="judul_materi" name="judul_materi" value=" <?= $data_mahasiswa->judul_materi; ?>">
                            <small class="text-danger">
                                <?php echo form_error('judul_materi') ?>
                            </small>
                        </div>
                    </div>
					<div class="form-group row">
                        <label for="isi_materi" class="col-sm-2 col-form-label">isi</label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="id_materi" name="idMhsw" value=" <?= $data_mahasiswa->id_materi; ?>">
                            <input type="text" class="form-control" id="isi_materi" name="isi_materi" value=" <?= $data_mahasiswa->isi_materi; ?>">
                            <small class="text-danger">
                                <?php echo form_error('isi_materi') ?>
                            </small>
                        </div>
                    </div>
					<div class="form-group row">
                        <label for="tags_materi" class="col-sm-2 col-form-label">Tags</label>
                        <div class="col-sm-10">
                            
                            <input type="text" class="form-control" id="tags_materi" name="tags_materi" value=" <?= $data_mahasiswa->tags_materi; ?>">
                            <small class="text-danger">
                                <?php echo form_error('tags_materi') ?>
                            </small>
                        </div>
                    </div>
					<div class="form-group row">
                        <label for="foto_materi" class="col-sm-2 col-form-label">Foto Materi</label>
                        <div class="col-sm-10">
						<input type="file" name="foto_materi" class="form-control" id="foto_materi" value=" <?= $data_mahasiswa->foto_materi; ?>">
                        <?php if ($data_mahasiswa->foto_materi != "") : ?>
                           
                            <small class="text-success"></small>
                        <?php endif; ?>
                        </div>
                    </div>
					<div class="form-group row">
                        <label for="thumbnail_materi" class="col-sm-2 col-form-label">Thumbnail</label>
                        <div class="col-sm-10">
						<input type="file" class="form-control" id="thumbnail_materi" name="thumnail_materi" value=" <?= $data_mahasiswa->thumbnail_materi; ?>">
                        <?php if ($data_mahasiswa->thumbnail_materi != "") : ?>
                           
                            <small class="text-success"></small>
							
                        <?php endif; ?>
                        </div>
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
