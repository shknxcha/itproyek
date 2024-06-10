<div class="mobile-menu-overlay"></div>

<div class="main-container">
	<div class="xs-pd-20-10 pd-ltr-20">
		<div class="title pb-20">
			<h2 class="h3 mb-0">Daftar Akun</h2>
		</div>
		<div class="card-box pb-10">
			<div class="h5 pd-20 mb-0">Edit Akun </div>
			<div class="pd-20 card-box mb-30">
				<div class="clearfix">
				</div>
				<form method="post" action="<?= base_url('akun/edit_akun/' . $key->id_akun) ?>" enctype="multipart/form-data">
					<div class="form-group row">
						<label class="col-sm-12 col-md-2 col-form-label">ID</label>
						<div class="col-sm-12 col-md-10">
							<input class="form-control" type="text" placeholder="" name="id" value="<?php echo $key->id ?> "/>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-12 col-md-2 col-form-label">Username</label>
						<div class="col-sm-12 col-md-10">
							<input class="form-control" type="text" placeholder="" name="username" value="<?php echo $key->username ?> "/>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-12 col-md-2 col-form-label">Password</label>
						<div class="col-sm-12 col-md-10">
							<input class="form-control" placeholder="" type="text" name="password" value="<?php echo $key->password ?> "/>
						</div>
					</div>
					
					<div class="form-group row">
						<label class="col-sm-12 col-md-2 col-form-label">Level</label>
						<div class="col-sm-12 col-md-10">
							<select class="form-control" name="level">
							<option value="ADMIN" <?php echo $key->level=='ADMIN'?'selected':'null'?>>ADMIN</option>
							<option value="PEMBELI" <?php echo $key->level=='PEMBELI'?'selected':'null'?>>PEMBELI</option>
							</select>
						</div>

					</div>
					
					<div class="form-group row">
						<div class="col-sm-12 col-md-10">
							<button type="submit" class="btn btn-primary">simpan</button>
						</div>
					</div>
				</form>
			</div>


		</div>

	</div>
</div>