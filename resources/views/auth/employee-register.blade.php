@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Employee Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('employee.register.submit') }}" aria-label="{{ __('Register') }}">
                        @csrf


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Last username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>




                        <div class="col-md-6">

                         <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('first_name') }}</label>
                                <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required>

                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                        </div>



                        <div class="col-md-6">
                        <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('last_name') }}</label>
                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required>

                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                        </div>


                        <div class="col-md-6">
                        <label for="nickname" class="col-md-4 col-form-label text-md-right">{{ __('nickname') }}</label>
                                <input id="nickname" type="text" class="form-control{{ $errors->has('nickname') ? ' is-invalid' : '' }}" name="nickname" value="{{ old('nickname') }}" required>

                                @if ($errors->has('nickname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nickname') }}</strong>
                                    </span>
                                @endif
                        </div>


                        <div class="col-md-6">
                        <label for="looking_for" class="col-md-4 col-form-label text-md-right">{{ __('looking_for') }}</label>
                                <input id="looking_for" type="text" class="form-control{{ $errors->has('looking_for') ? ' is-invalid' : '' }}" name="looking_for" value="{{ old('looking_for') }}" required>

                                @if ($errors->has('looking_for'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('looking_for') }}</strong>
                                    </span>
                                @endif
                        </div>


                        
                        <div class="col-md-6">
                        <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('date_of_birth') }}</label>
                                <input id="date_of_birth" type="date" class="form-control{{ $errors->has('date_of_birth') ? ' is-invalid' : '' }}" name="date_of_birth" value="{{ old('date_of_birth') }}" required>

                                @if ($errors->has('date_of_birth'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('date_of_birth') }}</strong>
                                    </span>
                                @endif
                        </div>



                        <div class="col-md-6">
                        <label for="language" class="col-md-4 col-form-label text-md-right">{{ __('language') }}</label>
                                <input id="language" type="text" class="form-control{{ $errors->has('language') ? ' is-invalid' : '' }}" name="language" value="{{ old('language') }}" required>

                                @if ($errors->has('language'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('language') }}</strong>
                                    </span>
                                @endif
                        </div>



                        <div class="col-md-6">
                        <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('country') }}</label>
                                <input id="country" type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ old('country') }}" required>

                                @if ($errors->has('country'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                        </div>


                        <div class="col-md-6">
                        <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('city') }}</label>
                                <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}" required>

                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                        </div>



                        <div class="col-md-6">
                        <label for="height" class="col-md-4 col-form-label text-md-right">{{ __('height') }}</label>
                                <input id="height" type="number" step="0.01" class="form-control{{ $errors->has('height') ? ' is-invalid' : '' }}" name="height" value="{{ old('height') }}" required>

                                @if ($errors->has('height'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('height') }}</strong>
                                    </span>
                                @endif
                        </div>


                        <div class="col-md-6">
                        <label for="weight" class="col-md-4 col-form-label text-md-right">{{ __('weight') }}</label>
                                <input id="weight" type="number" step="0.01" class="form-control{{ $errors->has('weight') ? ' is-invalid' : '' }}" name="weight" value="{{ old('weight') }}" required>

                                @if ($errors->has('weight'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('weight') }}</strong>
                                    </span>
                                @endif
                        </div>


                        <div class="col-md-6">
                        <label for="hair_color" class="col-md-4 col-form-label text-md-right">{{ __('hair_color') }}</label>
                                <input id="hair_color" type="text" class="form-control{{ $errors->has('hair_color') ? ' is-invalid' : '' }}" name="hair_color" value="{{ old('hair_color') }}" required>

                                @if ($errors->has('hair_color'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('hair_color') }}</strong>
                                    </span>
                                @endif
                        </div>


                        <div class="col-md-6">
                        <label for="eye_color" class="col-md-4 col-form-label text-md-right">{{ __('eye_color') }}</label>
                                <input id="eye_color" type="text" class="form-control{{ $errors->has('eye_color') ? ' is-invalid' : '' }}" name="eye_color" value="{{ old('eye_color') }}" required>

                                @if ($errors->has('eye_color'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('eye_color') }}</strong>
                                    </span>
                                @endif
                        </div>


                        <div class="col-md-6">
                        <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('gender') }}</label>
                                <input id="gender" type="text" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" value="{{ old('gender') }}" required>

                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                        </div>


                        <div class="col-md-6">
                        <label for="smoking" class="col-md-4 col-form-label text-md-right">{{ __('smoking') }}</label>
                                <input id="smoking" type="text" class="form-control{{ $errors->has('smoking') ? ' is-invalid' : '' }}" name="smoking" value="{{ old('smoking') }}" required>

                                @if ($errors->has('smoking'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('smoking') }}</strong>
                                    </span>
                                @endif
                        </div>


                        <div class="col-md-6">
                        <label for="drinking" class="col-md-4 col-form-label text-md-right">{{ __('drinking') }}</label>
                                <input id="drinking" type="text" class="form-control{{ $errors->has('drinking') ? ' is-invalid' : '' }}" name="drinking" value="{{ old('drinking') }}" required>

                                @if ($errors->has('drinking'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('drinking') }}</strong>
                                    </span>
                                @endif
                        </div>





                        <div class="col-md-6">
                        <label for="relationship" class="col-md-4 col-form-label text-md-right">{{ __('relationship') }}</label>
                                <input id="relationship" type="text" class="form-control{{ $errors->has('relationship') ? ' is-invalid' : '' }}" name="relationship" value="{{ old('relationship') }}" required>

                                @if ($errors->has('relationship'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('relationship') }}</strong>
                                    </span>
                                @endif
                        </div>



                        <div class="col-md-6">
                        <label for="children" class="col-md-4 col-form-label text-md-right">{{ __('children') }}</label>
                                <input id="children" type="text" class="form-control{{ $errors->has('children') ? ' is-invalid' : '' }}" name="children" value="{{ old('children') }}" required>

                                @if ($errors->has('children'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('children') }}</strong>
                                    </span>
                                @endif
                        </div>




                        <div class="col-md-6">
                        <label for="education" class="col-md-4 col-form-label text-md-right">{{ __('education') }}</label>
                                <input id="education" type="text" class="form-control{{ $errors->has('education') ? ' is-invalid' : '' }}" name="education" value="{{ old('education') }}" required>

                                @if ($errors->has('education'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('education') }}</strong>
                                    </span>
                                @endif
                        </div>



                        <div class="col-md-6">
                        <label for="nationality" class="col-md-4 col-form-label text-md-right">{{ __('nationality') }}</label>
                                <input id="nationality" type="text" class="form-control{{ $errors->has('nationality') ? ' is-invalid' : '' }}" name="nationality" value="{{ old('nationality') }}" required>

                                @if ($errors->has('nationality'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nationality') }}</strong>
                                    </span>
                                @endif
                        </div>



                        <div class="col-md-6">
                        <label for="occupation" class="col-md-4 col-form-label text-md-right">{{ __('occupation') }}</label>
                                <input id="occupation" type="text" class="form-control{{ $errors->has('occupation') ? ' is-invalid' : '' }}" name="occupation" value="{{ old('occupation') }}" required>

                                @if ($errors->has('occupation'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('occupation') }}</strong>
                                    </span>
                                @endif
                        </div>




                        <div class="col-md-6">
                        <label for="heading" class="col-md-4 col-form-label text-md-right">{{ __('heading') }}</label>
                                <input id="heading" type="text" class="form-control{{ $errors->has('heading') ? ' is-invalid' : '' }}" name="heading" value="{{ old('heading') }}" required>

                                @if ($errors->has('heading'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('heading') }}</strong>
                                    </span>
                                @endif
                        </div>





                        <div class="col-md-6">
                        <label for="about" class="col-md-4 col-form-label text-md-right">{{ __('about') }}</label>
                                <input id="about" type="text" class="form-control{{ $errors->has('about') ? ' is-invalid' : '' }}" name="about" value="{{ old('about') }}" required>

                                @if ($errors->has('about'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('about') }}</strong>
                                    </span>
                                @endif
                        </div>



                        <div class="col-md-6">
                        <label for="credit_card_number" class="col-md-4 col-form-label text-md-right">{{ __('credit_card_number') }}</label>
                                <input id="credit_card_number" type="text" class="form-control{{ $errors->has('credit_card_number') ? ' is-invalid' : '' }}" name="credit_card_number" value="{{ old('credit_card_number') }}" required>

                                @if ($errors->has('credit_card_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('credit_card_number') }}</strong>
                                    </span>
                                @endif
                        </div>




                        <div class="col-md-6">
                        <label for="employee_type_id" class="col-md-4 col-form-label text-md-right">{{ __('employee_type_id') }}</label>
                                <input id="employee_type_id" type="integer" class="form-control{{ $errors->has('employee_type_id') ? ' is-invalid' : '' }}" name="employee_type_id" value="{{ old('employee_type_id') }}" required>

                                @if ($errors->has('employee_type_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('employee_type_id') }}</strong>
                                    </span>
                                @endif
                        </div>

                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
