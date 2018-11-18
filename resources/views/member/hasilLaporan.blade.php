@extends('layouts.member')

@section('content')
<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>
                {{
                    Carbon\Carbon::now()->format('l')
                }}
                <small>Pelajaran Hari Ini</small>
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
            <table class="table table-bordered">
                    <tr>
                        <th>Jam Mulai</th>
                        <th>Jam Berakhir</th>
                        <th>Hari</th>
                        <th>Nama Guru</th>
                        <th>Tlpn Guru</th>
                        <th>Pelajaran</th>

                        <th>Tanggal</th>
                        <th>Status</th>
                    </tr>

                    @foreach ($data as $val)
                    <tr>
                      <td>{{$val->jam_mulai}}</td>
                      <td>{{$val->jam_berakhir}}</td>
                      <td>{{$val->hari}}</td>
                      <td>{{$val->nama}}</td>
                      <td>{{$val->tlpn}}</td>

                      <td>{{$val->bs}}</td>
                      <td>{{$val->created_at}}</td>

                        <td>
                          @if ($val->stts == 1)
                          <a class="btn btn-primary">Hadir</a>
                          @else
                          <a class="btn btn-danger">Tidak Hadir</a>
                          @endif
                          <form class="" action="index.html" method="post">

                              <!-- <button
                                  type="button"
                                  class="btn btn-primary"
                                  data-toggle="modal"
                                  data-target="#editModal">Ubah</button> -->

                              @csrf @method('DELETE')

                              <!-- <button type="submit" class="btn btn-danger">Delete</button> -->
                          </form>
                          <div class="modal fade" id="editModal" tabindex="-1" role="dialog">
                              <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h4 class="modal-title" id="editModalLabel">Edit
                                              </h4>
                                      </div>
                                      <form method="POST" action="{{ route('absensi.store') }}">
                                          @csrf
                                          <div class="modal-body">
                                              <div class="row clearfix">
                                                  <div class="col-sm-12">
                                                      <div class="form-group form-float">
                                                          <div class="form-line{{ $errors->has('deskripsi') ? ' error' : '' }}">

                                                              <input type="text"
                                                                  class="form-control{{ $errors->has('deskripsi') ? ' is-invalid' : '' }}"
                                                                  name="deskripsi"
                                                                  value="{{$val->deskripsi}}"
                                                                  required="required"
                                                                  autofocus="autofocus">
                                                              <label class="form-label">Deskripsi</label>
                                                          </div>
                                                        </div>
                                                        <div class="form-group form-float">
                                                          <label class="form-label">Mapel</label>
                                                          <div class="form-line{{ $errors->has('kelas') ? ' error' : '' }}">
                                                              <select class="selectpicker form-control show-tick" data-live-search="true" name="kelas">
                                                                <option value=""></option>
                                                                @foreach ($kelas as $val2)
                                                                @if ($val->kelas_id == $val2->id)
                                                                <option selected
                                                                 value={{$val2->id}}>{{$val2->deskripsi}}</option>
                                                                 @else{
                                                                   value={{$val2->id}}>{{$val2->deskripsi}}</option>
                                                                 }
                                                                 @endif
                                                                @endforeach

                                                              </select>
                                                              @if ($errors->has('kelas'))
                                                              <label id="name-error" class="error" for="kelas">{{ $errors->first('kelas') }}</label>
                                                              @endif
                                                          </div>
                                                          @if ($errors->has('kelas'))
                                                          <label id="name-error" class="error" for="deskripsi">{{ $errors->first('kelas') }}</label>
                                                          @endif
                                                      </div>
                                                  </div>

                                              </div>
                                          </div>
                                          <div class="modal-footer">
                                              <div class="row clearfix">

                                                  <div class="col-sm-12">
                                                      <div class="form-group form-float">
                                                          <button type="submit" class="btn btn-link waves-effect">
                                                              {{ __('SIMPAN') }}
                                                          </button>
                                                          <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                      </div>
                                                  </div>
                                              </div>

                                          </div>

                                      </form>

                                  </div>
                              </div>
                          </div>

                        </td>

                    </tr>
@endforeach
                </table>

        </div>
    </div>
</div>

@endsection
