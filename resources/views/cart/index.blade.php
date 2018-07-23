@extends('master')
@section('title', 'Keranjang Belanja')
@section('breadcrumb')
	<li class="active">Keranjang Belanja</li>
@endsection
@section('content')
	<div class="row">
		<div class="col-sm-12">
			<div class="box box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">
						Daftar Produk yang akan dibeli
					</h3>
				</div>
				@if($carts->count() > 0)
					@include('cart.table')
					<div class="box-footer">
						<div class="row">
							<div class="col-sm-6">
								<form method="post" action="{{ url('cart/clear') }}">
									{{ csrf_field() }}
									{{ method_field('delete') }}
									<button type="submit" class="btn btn-link text-red">
										<i class="fa fa-trash"></i>
										Hapus Semua
									</button>
								</form>
							</div>
							<div class="col-sm-6">
								<div class="pull-right">
									Total Tagihan
									<span class="text-orange"><strong id="totalTagihan"></strong></span>
								</div>
							</div>
						</div>
					</div>
				@else
					<div class="box-body">
						<h3 class="text-center">Keranjang Kosong</h3>
						<div class="text-center">
							<a href="{{ url('/') }}" class="btn btn-warning btn-lg">Mulai Belanja</a>
						</div>
					</div>
				@endif
			</div>
		</div>
	</div>
	@if($carts->count() > 0)
	<div class="row">
		<div class="col-sm-6">
			<button type="button" class="btn btn-default btn-lg"
			onclick="window.location='{{ url('/') }}'">
				<i class="fa fa-angle-left"></i>
				Lanjutkan Berbelanja
			</button>
		</div>
		<div class="col-sm-6 text-right">
			<button id="pembayaranBtn" type="button" class="btn bg-orange btn-lg"
			subtotal="{{ $subtotal }}" jne-service="">
				Pembayaran
				<i class="fa fa-angle-right"></i>
			</button>
		</div>
	</div>
	@endif
	@include('cart.edit-cart-modal')
	@include('cart.konfirmasi-pembelian-modal')
@endsection
@push('scripts')
<script>
	$(function(){
		var subtotal = "{{ $subtotal }}";
		var ongkir = $('#ongkir').val();
		$('#totalTagihan').text(numeral(parseInt(subtotal)+parseInt(ongkir)).format('$ 0,0'));
		$('#pembayaranBtn').attr('jne-service', $('#ongkir').find(':selected').attr('jne-service'));	
	});
	
	//edit qty
	$('body').on('click', '.editCartBtn', function(){
		$('#editCartModal #editCartForm').attr('action', $(this).attr('url'));
		$('#editCartModal #editCartForm').find('input[name="product_name"]').val($(this).attr('product-name'));
		$('#editCartModal #editCartForm').find('input[name="quantity"]').val($(this).attr('quantity'));
		$('#editCartModal').modal('show');
	});

	$('#ongkir').on('change',function(){
		var subtotal = "{{ $subtotal }}";
		var ongkir = $('#ongkir').val();
		var totalTagihan = numeral(parseInt(subtotal)+parseInt($(this).val())).format('$ 0,0');
		$('#totalTagihan').text(totalTagihan);
	});

	$('#pembayaranBtn').on('click', function(){
		var subtotal = "{{ $subtotal }}";
		var ongkir = $('#ongkir').val();
		$('#pembayaranForm').find('input[name="subtotal"]').val(subtotal);
		$('#pembayaranForm').find('input[name="jne_service"]').val($('#ongkir').find(':selected').attr('jne-service'));
		$('#pembayaranForm').find('input[name="ongkir"]').val(ongkir);
		$('#pembayaranForm').find('input[name="total"]').val(parseInt(ongkir)+parseInt(subtotal));
		$('#pembayaranModal').modal('show');
	});

</script>
@endpush