@extends('layouts.app')

@section('content')
<div class="login-wrap">
    <div class="login-html">
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Connectez-vous</label>
        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>

        <div class="login-form">
            <div class="sign-in-htm">
                <form method="POST" class="form-horizontal" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="group{{ $errors->has('username') ? '           has-error' : '' }}">
                            <br/><br/>
                            <label for="username" class="label">Username</label>
                            <input id="username" type="text" class="input" name="username" value="{{ old('username') }}" required>
                            @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                                @endif

                        </div>
                        <div class="group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="label">Password</label>
                            <input id="password" type="password" name="password" class="input" data-type="password" required="">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        @if(session('erreur'))
                        <div><strong style="color: red">{{session('erreur')}}</strong></div>
                        @endif
                        <br/>
                        <br/>
                        <div class="group">
                            <input type="submit" class="button" value="Connexion">
                        </div>
                        <div class="hr"></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
