		<!-- FORM tampilkan list bulan sebelumnya -->

		<div class="radio_buttons">
			<!-- Hadir -->
			<label for="hadir<?= $data['id'] ?>" class="radio">
				<input type="radio" name="<?= $data['id'] ?>" id="hadir<?= $data['id'] ?>" class="radio__input" value=1 />
				<div class="radio__radio green"></div>
			</label>

			<!-- S -->
			<label for="sakit<?= $data['id'] ?>" class="radio">
				<input type="radio" name="<?= $data['id'] ?>" id="sakit<?= $data['id'] ?>" class="radio__input" value=2 />
				<div class="radio__radio yellow"></div>
			</label>

			<!-- DL -->
			<label for="dl<?= $data['id'] ?>" class="radio">
				<input type="radio" name="<?= $data['id'] ?>" id="dl<?= $data['id'] ?>" class="radio__input" value=3 />
				<div class="radio__radio grey"></div>
			</label>

			<!-- ==== I ==== -->
			<label for="i<?= $data['id'] ?>" class="radio">
				<input type="radio" name="<?= $data['id'] ?>" id="i<?= $data['id'] ?>" class="radio__input" value=4 />
				<div class="radio__radio blue"></div>
			</label>

			<!-- Alpha -->
			<label for="tap<?= $data['id'] ?>" class="radio">
				<input type="radio" name="<?= $data['id'] ?>" id="tap<?= $data['id'] ?>" class="radio__input" value=5 />
				<div class="radio__radio red"></div>
			</label>


		</div>