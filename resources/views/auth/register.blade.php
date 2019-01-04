@extends('layouts.regis')

@section('content')
  <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);">SMK Negeri<b> 24</b></a>
            <small>Admin BootStrap Based - Material Design</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_up" method="POST" action="{{ route('register') }}">
                  @csrf
                    <div class="msg">Register a new membership</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input class="form-control" name="firstname" placeholder="Firstname" required="" aria-required="true" type="text">
                        </div>
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input class="form-control" name="lastname" placeholder="Lastname" required=""  aria-required="true" type="text">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div id="emails" class="form-line{{ $errors->has('email') ? ' focused error' : ''   }}">
                            <input class="form-control" name="email" placeholder="Email Address" {{ $errors->has('email') ? 'autofocus=""' : ''   }} required="" aria-required="true" type="email">
                        </div>
                        @if ($errors->has('email'))
                        <label id="name-error" class="error" for="emails">{{ $errors->first('email') }}</label>
                        @endif
                        {{-- @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif --}}

                    </div>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="material-icons">group</i>
                      </span>
                      <div id="kelas3" class="form-line{{ $errors->has('id_kelas') ? ' focused error' : ''   }}">
                        <select required="" class="form-control" name="id_kelas">
                          <option value=""></option>
                          @foreach ($kelas as $item)
                            <option value="{{$item->id}}">{{$item->deskripsi}}</option>
                          @endforeach
                        </select>
                      </div>
                      @if ($errors->has('id_kelas'))
                      <label id="name-error" class="error" for="kelas3">{{ $errors->first('id_kelas') }}</label>
                      @endif


                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input class="form-control" name="password" minlength="6" placeholder="Password" required="" aria-required="true" type="password">
                        </div>
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div  id="cf"class="form-line{{ $errors->has('password') ? ' focused error' : ''   }}">
                            <input class="form-control" name="password_confirmation" minlength="6" placeholder="Confirm Password" required="" aria-required="true" type="password">
                        </div>
                        @if ($errors->has('password'))
                        <label id="name-error" class="error" for="cf">{{ $errors->first('password') }}</label>
                        @endif
                    </div>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="material-icons">wc</i>
                      </span>
                      <div id="gender" class="form-line{{ $errors->has('gender') ? ' focused error' : ''   }}">
                        <select required="" class="form-control" name="gender">
                          <option value=""></option>
                          <option value="L">Laki - Laki</option>
                          <option value="P">Perempuan</option>
                        </select>
                      </div>
                    </div>
                    {{-- <div class="form-group">
                        <input name="terms" id="terms" class="filled-in chk-col-pink" type="checkbox">
                        <label for="terms">I read and agree to the <a href="javascript:void(0);">terms of usage</a>.</label>
                    </div> --}}

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">SIGN UP</button>

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="{{ route('login') }}">You already have a membership?</a>
                    </div>
                </form>
            </div>
        </div>
    </div
@endsection
