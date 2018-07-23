<div class="table-responsive">
	<table class="table table-bordered table-hover" style="margin-bottom: 0">
		<tbody>
			@foreach($carts as $cart)
				<tr>
					<td colspan="2">
						<h5 class="text-blue" style="margin: 0">
							{{ $cart->product->name }}
						</h5>
						{{ $cart->quantity }} barang ({{ $cart->product->weightInKilo() }})
						X {{ $cart->product->priceStringFormatted() }} <br>
						<button type="button" class="btn btn-link text-orange btn-xs editCartBtn"
						product-name="{{ $cart->product->name }}" quantity="{{ $cart->quantity }}"
						url="{{ url('cart/'.$cart->id) }}">
							<i class="fa fa-edit"></i>
							Ubah
						</button>
					</td>
					<td class="text-right">
						{{ $cart->totalPriceStringFormatted() }}
					</td>
					<td>
						<form method="post" action="{{ url('cart/'.$cart->id) }}">
							{{ csrf_field() }}
							{{ method_field('delete') }}
							<button type="submit" class="btn btn-link text-red btn-xs">
								<i class="fa fa-trash"></i>
							Hapus
							</button>
						</form>
					</td>
				</tr>
			@endforeach
			<tr class="bg-info">
				<td>
					<strong>Alamat Tujuan</strong><br>
					{{ Auth::user()->name }}<br>
					{{ Auth::user()->city->name }}
				</td>
				<td class="text-right">
					<strong>Total Berat</strong><br>
					{{ $totalBeratInKilo }}
				</td>
				<td class="text-right">
					<strong>Subtotal</strong><br>
					{{ $subtotalFormatted }}
				</td>
				<td style="max-width: 100px">
					<strong>Ongkos Kirim (JNE)</strong>
					@if(is_null($daftarLayananJne))
					<p class="text-red">Koneksi Bermasalah</p>
					@elseif($daftarLayananJne['status'] != 200)
					<p class="text-red">Error Code: {{ $daftarLayananJne['status'] }}</p>
					@else
					<form>
						{{ csrf_field() }}
						{{ method_field('patch') }}
						<select id="ongkir" class="form-control" name="jne_service">
							@foreach($daftarLayananJne['layanan'] as $k => $v)
								<option jne-service="{{ $k }}" value="{{ $v }}">
									{{ $k . ' (Rp. '.number_format($v, 0, '', '.').')' }}
								</option>
							@endforeach
						</select>
					</form>
					@endif
				</td>
			</tr>
		</tbody>
	</table>
</div>