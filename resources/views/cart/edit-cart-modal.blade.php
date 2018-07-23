{{--modal edit cart--}}
<div class="modal fade" id="editCartModal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header bg-blue">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span></button>
				<h4 class="modal-title">Edit Keranjang</h4>
			</div>
			<div class="modal-body">
				<form id="editCartForm" method="post" action="">
					{{ csrf_field() }}
					{{ method_field('patch') }}
					<div class="form-group">
						<label>Nama Produk</label>
						<input type="text" name="product_name" class="form-control" value="" readonly>
					</div>
					<div class="form-group">
						<label>Quantity</label>
						<input type="number" name="quantity" value="1" class="form-control" min="1" required>
					</div>
					<div class="form-group" style="margin-bottom: 0">
						<button type="submit" class="btn btn-primary btn-block">
							Update
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>