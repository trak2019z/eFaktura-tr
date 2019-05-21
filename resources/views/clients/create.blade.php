@extends('layouts.app', ['title' => __('Dodaj nowego kontrahenta')])

@section('content')
     @include('layouts.headers.default') 

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Dodaj nowego kontrahenta') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('client.index') }}" class="btn btn-sm btn-primary">{{ __('Wróć do listy kontrahentów') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('client.store') }}" autocomplete="off">
                            @csrf
                            <div class="row">
                             <div class="col-lg-4 col-sm-6{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Nazwa kontrahenta') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nazwa kontrahenta') }}" value="test" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                    <label class="form-control-label" for="input-email">{{ __('Adres e-mail') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Adres e-mail') }}" value="asd@wp.pl" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                             </div>
                                <div class="col-lg-4 col-sm-6{{ $errors->has('password') ? ' has-danger' : '' }}">

                                    <label class="form-control-label" for="input-password">{{ __('NIP') }}</label>
												<input type="text" name="NIP" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('') }}" value="1231231231" required> @if ($errors->has('password'))
												<span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>@endif

                                    <label class="form-control-label" for="input-password">{{ __('Hasło') }}</label>
                                    <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Hasło') }}" value="test" required>
                                    
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                    
                                </div>   
									<div class="col-lg-4 col-sm-6{{ $errors->has('password') ? ' has-danger' : '' }}">
										<div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
											<label class="form-control-label" for="input-password">{{ __('Ulica') }}</label>
											<input type="text" name="street" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('') }}" value="test" required> @if ($errors->has('password'))
											<span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                            </span> @endif

                                            <label class="form-control-label" for="input-password-confirmation">{{ __('Powtórz Hasło') }}</label>
                                                <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Powtórz Hasło') }}" value="test" required>
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span> 
                                            
                                    
									    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-sm-6{{ $errors->has('password') ? ' has-danger' : '' }}">
                                                
                                    <label class="form-control-label" for="input-password">{{ __('Miejscowość') }}</label>
												<input type="text" name="town" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('asd') }}" value="test" required> @if ($errors->has('password'))
												<span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span> @endif

												<label class="form-control-label" for="input-password">{{ __('Kod pocztowy') }}</label>
												<input type="text" name="postcode" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('asd') }}" value="test" required> @if ($errors->has('password'))
												<span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span> @endif
                                    </div>
                                    <div class="col-lg-4 col-sm-6{{ $errors->has('password') ? ' has-danger' : '' }}">
												<label class="form-control-label" for="input-password">{{ __('Miejscowość poczty') }}</label>
												<input type="text" name="postcode_town" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('asd') }}" value="test" required> @if ($errors->has('password'))
												<span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span> @endif

                                    
												<label class="form-control-label" for="input-password">{{ __('Numer domu') }}</label>
												<input type="text" name="property_number" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('asd') }}" value="test" required> @if ($errors->has('password'))
												<span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span> @endif
									</div>
                                    <div class="col-lg-4 col-sm-6{{ $errors->has('password') ? ' has-danger' : '' }}">
												<label class="form-control-label" for="input-password">{{ __('Telefon') }}</label>
												<input type="text" name="phone_number" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('asd') }}" value="test" required> @if ($errors->has('password'))
												<span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span> @endif
									</div>
                                </div>
                               

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Dodaj') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection
