@extends('master')
@section('title', 'Home')
@section('content')
	<div class="row">
		@if($products->count() > 1)
			@foreach($products as $product)
				<div class="col-sm-3">
					<div class="box box-solid">
						<div class="box-body">
							<h4 class="text-center">{{ $product->name }}</h4>
							<p class="text-center">{{ $product->priceStringFormatted() }}</p>
							<button class="btn btn-flat btn-block bg-blue" onclick="{{ Auth::check() ? 'addCart(this)' : 'window.location="'.url('login').'"' }}"
							product-name="{{ $product->name }}"
							url="{{ url('cart/'.$product->id) }}">Tambah Ke keranjang</button>
						</div>
					</div>
				</div>
			@endforeach
		@else
		<div class="col-sm-12">
			<p>Barang Belum Ada</p>
		</div>
		@endif
	</div>
	@include('page.add-cart-modal')
	@include('page.success-add-cart-modal')
@endsection
@push('scripts')
<script>
	$('#addCartForm').on('submit', function(e){
		e.preventDefault();
		var url = $(this).attr('action');
		var data = $(this).serialize();
		$.ajax({
			method: 'POST',
			url: url,
			data: data,
			error: function(msg){
				console.log(msg.responseJSON);
			},
			success: function(data) {
				console.log(data);
				$('#addCartModal').modal('hide');
				$('#successModal').modal({
					backdrop: 'static',
    				keyboard: false
				});
			}
		});
	});
	function addCart(e){
		$('#addCartModal #addCartForm').attr('action', $(e).attr('url'));
		$('#addCartModal #addCartForm input[name="product_name"]').val($(e).attr('product-name'));
		$('#addCartModal').modal('show');
	}
</script>
@endpush