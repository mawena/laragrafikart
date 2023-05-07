@extends('base')

@section('title', 'Login')

@section('content')
    <h1>Se connecter</h1>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('auth.login') }}" method="POST" class="vstack gap-3">
                @csrf
                <div class="form-group">
                    <label class="form-label mt-4" for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Mon email" value="{{ old('email') }}"
                        @class(['form-control', 'is-invalid' => $errors->get('email')])>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label mt-4" for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" placeholder="Mon mot de passe"
                        @class(['form-control', 'is-invalid' => $errors->get('password')])>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-outline-success">Se connecter</button>
            </form>
        </div>
    </div>
@endsection
