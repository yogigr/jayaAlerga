<div class="modal" id="pembayaranModal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header bg-blue">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span></button>
				<h4 class="modal-title">Konfirmasi Pembelian</h4>
			</div>
			<div class="modal-body">
				Anda akan melakukan pembayaran dengan detail pembelian sbb
				<form id="pembayaranForm" method="post" action="{{ url('order') }}">
					{{ csrf_field() }}
					<div class="form-group">
						<label>Subtotal (Rp)</label>
						<input type="text" name="subtotal" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label>Jne Service</label>
						<input type="text" name="jne_service" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label>Ongkir (Rp)</label>
						<input type="text" name="ongkir" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label>Total (Rp)</label>
						<input type="text" name="total" class="form-control" readonly>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
				<button type="button" class="btn btn-primary"
				onclick="getElementById('pembayaranForm').submit()">Bayar</button>
			</div>
		</div>
	</div>
</div>