{{-- add cart success modal --}}
<div class="modal fade" id="successModal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header bg-blue">
				<h4 class="modal-title">Sukses</h4>
			</div>
			<div class="modal-body">
				Berhasil menambahkan Produk ke Keranjang
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default pull-left" onclick="window.location='{{ url('/') }}'">Lanjut Belanja</button>
				<button type="button" class="btn btn-success"
				onclick="window.location='{{ url('cart') }}'">Bayar</button>
			</div>
		</div>
	</div>
</div>