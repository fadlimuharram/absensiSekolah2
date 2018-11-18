@extends('layouts.admin')

@section('content')

<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>
                Kelas
                <small>Tambahakan Kelas Baru</small>
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
            <form method="POST" action="{{ route('kelas.store') }}">
                @csrf
                <div class="row clearfix">
                  <div class="col-sm-12">
                      <div class="form-group form-float">
                          <p>
                              <b>Hari</b>
                          </p>
                          <select class="selectpicker form-control show-tick" data-live-search="true" name="hari">
                            <option value="senin">Senin</option>
                            <option value="selasa">Selasa</option>
                            <option value="rabu">Rabu</option>
                            <option value="kamis">Kamis</option>
                            <option value="jumat">Jumat</option>
                          </select>
                          @if ($errors->has('bidangstudi'))
                          <label id="name-error" class="error" for="bidangstudi">{{ $errors->first('bidangstudi') }}</label>
                          @endif
                      </div>
                  </div>
                  <div class="col-sm-4">
                      <div class="form-group form-float">
                          <p>
                              <b>Hari</b>
                          </p>
                          <select class="selectpicker form-control show-tick" data-live-search="true" name="hari">
                            <option value="senin">Senin</option>
                            <option value="selasa">Selasa</option>
                            <option value="rabu">Rabu</option>
                            <option value="kamis">Kamis</option>
                            <option value="jumat">Jumat</option>
                          </select>
                          @if ($errors->has('bidangstudi'))
                          <label id="name-error" class="error" for="bidangstudi">{{ $errors->first('bidangstudi') }}</label>
                          @endif
                      </div>
                  </div>
                  <div class="col-sm-4">
                      <div class="form-group form-float">
                          <p>
                              <b>Hari</b>
                          </p>
                          <select class="selectpicker form-control show-tick" data-live-search="true" name="hari">
                            <option value="senin">Senin</option>
                            <option value="selasa">Selasa</option>
                            <option value="rabu">Rabu</option>
                            <option value="kamis">Kamis</option>
                            <option value="jumat">Jumat</option>
                          </select>
                          @if ($errors->has('bidangstudi'))
                          <label id="name-error" class="error" for="bidangstudi">{{ $errors->first('bidangstudi') }}</label>
                          @endif
                      </div>
                  </div>
                  <div class="col-sm-4">
                      <div class="form-group form-float">
                          <p>
                              <b>Hari</b>
                          </p>
                          <select class="selectpicker form-control show-tick" data-live-search="true" name="hari">
                            <option value="senin">Senin</option>
                            <option value="selasa">Selasa</option>
                            <option value="rabu">Rabu</option>
                            <option value="kamis">Kamis</option>
                            <option value="jumat">Jumat</option>
                          </select>
                          @if ($errors->has('bidangstudi'))
                          <label id="name-error" class="error" for="bidangstudi">{{ $errors->first('bidangstudi') }}</label>
                          @endif
                      </div>
                  </div>

                    <div class="col-sm-12">
                        <div class="form-group form-float">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Tambah Kelas') }}
                            </button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
