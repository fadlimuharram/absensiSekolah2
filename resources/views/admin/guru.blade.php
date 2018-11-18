@extends('layouts.admin') 

@section('content')

<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>
                Guru
                <small>Tambahakan Guru Baru</small>
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
            <form method="POST" action="{{ route('guru.store') }}">
                @csrf
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="form-group form-float">
                            <div class="form-line{{ $errors->has('nik') ? ' error' : '' }}">
                                <input
                                    type="text"
                                    class="form-control{{ $errors->has('nik') ? ' is-invalid' : '' }}"
                                    name="nik"
                                    value="{{ old('nik') }}"
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
                                  value="{{ old('nama') }}"
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
                                value="{{ old('email') }}"
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
                              value="{{ old('tlpn') }}"
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


<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>
                Guru
                <small>Daftar Guru Tersedia</small>
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
            <table class="table table-bordered" id="guru-table">
                <thead>
                    <tr>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>tlpn</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>


{{-- <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>
                Kelas
                <small>Daftar Kelas Tersedia</small>
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
                    <th>No</th>
                    <th>Daftar</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($kelas as $kel)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $kel->deskripsi }}</td>
                    <td>
                        <form action="{{ route('kelas.destroy',$kel->id) }}" method="POST">

                            <button
                                type="button"
                                class="btn btn-primary"
                                data-toggle="modal"
                                data-target="#editModal{{$kel->id}}">Edit</button>

                            @csrf 
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <div class="modal fade" id="editModal{{$kel->id}}" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="editModalLabel">Edit
                                            {{$kel->deskripsi}}</h4>
                                    </div>
                                    <form method="POST" action="{{ route('kelas.update',$kel->id) }}">
                                        @csrf @method('PUT')
                                        <div class="modal-body">
                                            <div class="row clearfix">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-float">
                                                        <div class="form-line{{ $errors->has('deskripsi') ? ' error' : '' }}">
                                                            <input
                                                                type="deskripsi"
                                                                class="form-control{{ $errors->has('deskripsi') ? ' is-invalid' : '' }}"
                                                                name="deskripsi"
                                                                value="{{ $kel->deskripsi }}"
                                                                required="required"
                                                                autofocus="autofocus">
                                                            <label class="form-label">Deskripsi</label>
                                                        </div>
                                                        @if ($errors->has('deskripsi'))
                                                        <label id="name-error" class="error" for="deskripsi">{{ $errors->first('deskripsi') }}</label>
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

            {!! $kelas->links() !!}
        </div>
    </div>
</div> --}}


@endsection

@section('footScript')
<script>
    $(function() {
        $('#guru-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('guruDataTable.data') !!}',
            columns: [
                { data: 'nik', name: 'nik' },
                { data: 'nama', name: 'nama' },
                { data: 'email', name: 'email' },
                { data: 'tlpn', name: 'tlpn' },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' },
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
    </script>
@endsection