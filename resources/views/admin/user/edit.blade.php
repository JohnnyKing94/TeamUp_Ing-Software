@extends('layouts.app')

@section('page_title'){{$user->name}} {{$user->surname}} - {{ __('title.profile.edit') }}@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('title.profile.edit') }}</div>
                    <div class="card-body">
                        @if(session('message'))
                            <div class="alert alert-success">
                                {{session('message')}}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('admin.user.edit', $user->slug) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('field.user.email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ $user->email }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('field.user.password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">{{ __('field.user.confirmPassword') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('field.user.name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ $user->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="surname"
                                       class="col-md-4 col-form-label text-md-right">{{ __('field.user.surname') }}</label>

                                <div class="col-md-6">
                                    <input id="surname" type="text"
                                           class="form-control @error('surname') is-invalid @enderror" name="surname"
                                           value="{{ $user->surname }}" required autocomplete="surname" autofocus>

                                    @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="birthday"
                                       class="col-md-4 col-form-label text-md-right">{{ __('field.user.birthday') }}</label>

                                <div class="col-md-6">
                                    <input id="birthday" max="{{ \Carbon\Carbon::today()->addYear(5)->toDateString() }}" min="{{ \Carbon\Carbon::today()->subYear(110)->toDateString() }}" type="date"
                                           class="form-control @error('birthday') is-invalid @enderror" name="birthday"
                                           value="{{ $user->birthday }}" required autocomplete="birthday" autofocus>

                                    @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="gender"
                                       class="col-md-4 col-form-label text-md-right">{{ __('field.user.gender') }}</label>

                                <div class="col-md-6">
                                    <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" required autocomplete="gender" autofocus>
                                        <option value="Maschio" {{ $user->gender == 'Maschio' ? 'selected' : '' }}>Maschio</option>
                                        <option value="Femmina" {{ $user->gender == 'Femmina' ? 'selected' : '' }}>Femmina</option>
                                        <option value="Non specificato" {{ $user->gender == 'Non specificato' ? 'selected' : '' }}>Non specificato</option>
                                    </select>

                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="skills"
                                       class="col-md-4 col-form-label text-md-right">{{ __('field.user.skills') }}</label>

                                <div class="col-md-6">
                                <textarea id="skills" class="form-control @error('skills') is-invalid @enderror"
                                          name="skills" rows="10" required autocomplete="skills"
                                          autofocus>{{ $user->skills }}</textarea>

                                    @error('skills')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="interests"
                                       class="col-md-4 col-form-label text-md-right">{{ __('field.user.interests') }}</label>

                                <div class="col-md-6">
                                    <select id="interests" multiple class="js-interests-multiple form-control @error('interests') is-invalid @enderror" name="interests[]" required
                                            autocomplete="interests" autofocus>
                                        @foreach($interests as $interest)
                                            <option value="{{$interest}}" {{ in_array($interest, $user->interests) ? 'selected' : '' }}>{{$interest}}</option>
                                        @endforeach
                                    </select>
                                    @error('interests')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('button.submit.profile.update') }}
                                    </button>
                                    <a href="{{ route('admin.user.index') }}" id="cancel" class="btn btn-default">{{ __('button.cancel') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
