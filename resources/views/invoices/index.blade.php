@extends('layouts.app', ['title' => __('Client Management')]) @section('content') @include('layouts.headers.default')

<div class="container-fluid mt--7">
	<div class="row">
		<div class="col">
			<div class="card shadow">
				<div class="card-header border-0">
					<div class="row align-items-center">
						<div class="col-8">
							<h3 class="mb-0">{{ __('Lista faktur') }}</h3>
						</div>
						<div class="col-4 text-right">
							<a href="{{ route('client.create') }}" class="btn btn-sm btn-primary">{{ __('Dodaj nowego kontrahenta') }}</a>
						</div>
					</div>
				</div>

				<div class="col-12">
					@if (session('status'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						{{ session('status') }}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
					</div>
					@endif
				</div>

				<div class="table-responsive">
					<table class="table align-items-center table-flush">
						<thead class="thead-light">
							<tr>
								<th scope="col">{{ __('NIP') }}</th>
								<th scope="col">{{ __('Firma') }}</th>
								<th scope="col">{{ __('Imie') }}</th>
								<th scope="col">{{ __('Nazwisko') }}</th>
								<th scope="col">{{ __('ulica') }}</th>
								<th scope="col">{{ __('miasto') }}</th>
								<th scope="col">{{ __('kod pocztowy') }}</th>
								<th scope="col">{{ __('numer telefonu') }}</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($invoices as $invoice)
							<tr>
								<td>
									<a href="{{ route('invoice.index', $invoice->id ) }}">{{ $invoice->NIP === "" ? $client->NIP : "Osoba prywatna" }}</a>
								</td>
								<td>
									<a href="{{ route('invoice.index', $invoice->id ) }}">{{ $invoice->NIP === "" ? $client->NIP : "---" }}</a>
								</td>	
								<td>
									<a href="{{ route('invoice.index', $invoice->id ) }}">{{ $invoice->firstName }}  tt</a>
								</td>	
								<td>
									<a href="{{ route('invoice.index', $invoice->id ) }}">{{ $invoice->lastName }}  tt</a>
								</td>		
								<td>
									<a href="{{ route('invoice.index', $invoice->id ) }}">{{ $invoice->street }}  tt</a>
								</td>	
								<td>
									<a href="{{ route('invoice.index', $invoice->id ) }}">{{ $invoice->town }}  tt</a>
								</td>		
								<td>
									<a href="{{ route('invoice.index', $invoice->id ) }}">{{ $invoice->post_code }}  tt</a>
								</td>		
								<td>
									<a href="{{ route('invoice.index', $invoice->id ) }}">{{ $invoice->phone_number }}  tt</a>
								</td>						
						
								<td class="text-right">
									<a class="btn btn-sm btn-primary" href="{{ route('invoice.generatePDF', ['id' => Auth::user()->id, 'invoice' => $invoice ]) }}" type="button">Pobierz</a>
									<a class="btn btn-sm btn-primary" href="{{ route('invoice.show', ['id' => Auth::user()->id, 'invoice' => $invoice ]) }}" type="button">Zobacz</a>
								</td>
								
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	
	@include('layouts.footers.auth')
</div>
@endsection
