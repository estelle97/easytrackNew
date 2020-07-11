@extends('layouts.auth')

@section('content')
<div class="col-lg-4 d-flex flex-row align-items-center">
    <div class="container-tight">
        <form class="card card-md auth-card pt-6 pb-5 px-3" action="" method="post">
            <div class="card-body mb-5">
                <div class="text-center mb-5">
                    <img src={{asset("template/assets/static/logo.svg")}} height="56" alt="" />
                </div>
                <h2 class="mb-2 text-center text-black">Mot de passe oublié</h2>
                <h4 class="mb-5 text-center text-muted">
                    Saisissez votre adresse email, votre nom d'utilisateur ou votre numéro de téléphone et un nous vous enverrons un lien pour le rénitialiser.
                </h4>
                <div class="mb-3">
                    <div class="input-icon">
                        <span class="input-icon-addon ml-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                                <path fill="none" d="M0 0h24v24H0z" />
                                <path
                                    d="M20 12a8 8 0 1 0-3.562 6.657l1.11 1.664A9.953 9.953 0 0 1 12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10v1.5a3.5 3.5 0 0 1-6.396 1.966A5 5 0 1 1 15 8H17v5.5a1.5 1.5 0 0 0 3 0V12zm-8-3a3 3 0 1 0 0 6 3 3 0 0 0 0-6z" />
                            </svg>
                        </span>
                        @csrf 
                        <input type="text" name="login" class="auth-input form-control form-control-rounded py-2 px-5"
                            placeholder="Entrez votre login" autocomplete="off" value="{{old('login')}}" />
                    </div>
                    {!! $errors->first('login','<span class="help-block"> :message </span>') !!}
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-gradient btn-block btn-pill btn-no-border">
                        Envoyer
                    </button>
                </div>
                <div class="text-center text-muted mb-3">
                   Connectez vous 
                    <a href={{route('login')}} tabindex="-1"> Connectez vous</a>
                </div>
            </div>
            <div class="px-5 text-center mt-5">
                Protected by reCAPTCHA and subject to the <span class="text-primary">Privacy Policy</span> and <span class="text-primary">Terms of Service</span>.
            </div>
        </form>
    </div>
</div>
@endsection