@extends('layouts.admin') 

@section('content')

<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>
                Guru
                <small>Edit Guru</small>
            </h2>
            <ul class="header-dropdown m-r--5">
                <li class="dropdown">
                    <a
                        href="javascript:void(0);"
                        class="dropdown-toggle"
                        data-toggle="dropdown"
                        role="button"
                        aria-haspopup="true"
                        aria-expanded="true">
                        <i class="material-icons">more_vert</i>
                    </a>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <a href="javascript:void(0);" class=" waves-effect waves-block">Action</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="body">
            <form method="POST" action="{{ route('guru.update',$guru->id) }}">
                @csrf
                @method('PUT')
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="form-group form-float">
                            <div class="form-line{{ $errors->has('nik') ? ' error' : '' }}">
                                <input
                                    type="text"
                                    class="form-control{{ $errors->has('nik') ? ' is-invalid' : '' }}"
                                    name="nik"
                                    value="{{ $guru->nik }}"
                                    required="required"
                                    autofocus="autofocus">
                                <label class="form-label">NIK</label>
                            </div>
                            @if ($errors->has('nik'))
                            <label id="name-error" class="error" for="nik">{{ $errors->first('nik') }}</label>
                            @endif
                        </div>
                    </div>

                    <div class="col-sm-12">
                      <div class="form-group form-float">
                          <div class="form-line{{ $errors->has('nama') ? ' error' : '' }}">
                              <input
                                  type="text"
                                  class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}"
                                  name="nama"
                                  value="{{ $guru->nama }}"
                                  required="required"
                                  autofocus="autofocus">
                              <label class="form-label">Nama</label>
                          </div>
                          @if ($errors->has('nama'))
                          <label id="name-error" class="error" for="nama">{{ $errors->first('nama') }}</label>
                          @endif
                      </div>
                  </div>

                  <div class="col-sm-12">
                    <div class="form-group form-float">
                        <div class="form-line{{ $errors->has('email') ? ' error' : '' }}">
                            <input
                                type="email"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                name="email"
                                value="{{ $guru->email }}"
                                required="required"
                                autofocus="autofocus">
                            <label class="form-label">E-Mail</label>
                        </div>
                        @if ($errors->has('email'))
                        <label id="name-error" class="error" for="email">{{ $errors->first('email') }}</label>
                        @endif
                    </div>
                </div>

                <div class="col-sm-12">
                  <div class="form-group form-float">
                      <div class="form-line{{ $errors->has('tlpn') ? ' error' : '' }}">
                          <input
                              type="tlpn"
                              class="form-control{{ $errors->has('tlpn') ? ' is-invalid' : '' }}"
                              name="tlpn"
                              value="{{ $guru->tlpn }}"
                              required="required"
                              autofocus="autofocus">
                          <label class="form-label">No Telephone</label>
                      </div>
                      @if ($errors->has('tlpn'))
                      <label id="name-error" class="error" for="tlpn">{{ $errors->first('tlpn') }}</label>
                      @endif
                  </div>
              </div>

                    <div class="col-sm-12">
                        <div class="form-group form-float">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Tambah Guru') }}
                            </button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection

