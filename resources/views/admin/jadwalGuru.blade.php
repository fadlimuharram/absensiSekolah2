@extends('layouts.admin')

@section('content')

<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>
                Jadwal
                <small>Tambahakan Jadwal Guru Berdasarkan Bidang Studi</small>
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
            <form method="POST" action="{{ route('jadwalguru.store') }}">
                @csrf
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="form-group form-float">
                            <p>
                                <b>Kelas</b>
                            </p>
                            <select class="selectpicker form-control show-tick" data-live-search="true" name="kelas">
                              <option value=""></option>
                              @foreach($kelas as $val)
                                <option value="{{$val->id}}">{{$val->deskripsi}}</option>
                              @endforeach
                            </select>
                            @if ($errors->has('kelas'))
                            <label id="name-error" class="error" for="kelas">{{ $errors->first('kelas') }}</label>
                            @endif
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group form-float">
                            <p>
                                <b>Guru</b>
                            </p>
                            <select class="selectpicker form-control show-tick" data-live-search="true" name="guru">
                              <option value=""></option>
                              @foreach($guru as $val)
                                <option value="{{$val->id}}">{{$val->nama}}</option>
                              @endforeach
                            </select>
                            @if ($errors->has('guru'))
                            <label id="name-error" class="error" for="guru">{{ $errors->first('guru') }}</label>
                            @endif
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group form-float">
                            <p>
                                <b>Bidang Studi</b>
                            </p>
                            <select class="selectpicker form-control show-tick" data-live-search="true" name="bidangstudi">
                              <option value=""></option>
                              @foreach($bidangStudi as $val)
                                <option value="{{$val->id}}">{{$val->deskripsi}}</option>
                              @endforeach
                            </select>
                            @if ($errors->has('bidangstudi'))
                            <label id="name-error" class="error" for="bidangstudi">{{ $errors->first('bidangstudi') }}</label>
                            @endif
                        </div>
                    </div>



                  <div class="col-sm-12">
                      <div class="form-group form-float">
                          <p>
                              <b>Jam Mulai</b>
                          </p>
                          <input type="text" class="tmpicker form-control" placeholder="Please choose a time..." name="jammulai">
                          @if ($errors->has('jammulai'))
                          <label id="name-error" class="error" for="jammulai">{{ $errors->first('jammulai') }}</label>
                          @endif
                      </div>
                  </div>

                  <div class="col-sm-12">
                      <div class="form-group form-float">
                          <p>
                              <b>Jam Berakhir</b>
                          </p>
                          <input type="text" class="tmpicker form-control" placeholder="Please choose a time..." name="jamakhir">
                          @if ($errors->has('jamakhir'))
                          <label id="name-error" class="error" for="jamakhir">{{ $errors->first('jamakhir') }}</label>
                          @endif
                      </div>
                  </div>

                  <div class="col-sm-12">
                      <div class="form-group form-float">
                          <p>
                              <b>Hari</b>
                          </p>
                          <select class="selectpicker form-control show-tick" data-live-search="true" name="hari">
                            <option value=""></option>
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
                                {{ __('Tambah Jadwal') }}
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
                        <th>Jam Mulai</th>
                        <th>Jam Berakhir</th>
                        <th>Hari</th>
                        <th>Kelas</th>
                        <th>Tlpn Guru</th>
                        <th>Pelajaran</th>
                        <th>Action</th>
                    </tr>
                    {{-- @foreach ($data as $val)
                    <tr>
                      <td>{{$val->nik}}</td>
                      <td>{{$val->nama}}</td>
                      <td>{{$val->jam_mulai}}</td>
                      <td>{{$val->jam_berakhir}}</td>
                      <td>{{$val->hari}}</td>
                      <td>{{$val->kelasd}}</td>
                      <td>{{$val->tlpn}}</td>
                      <td>{{$val->bs}}</td>
                      <td>
                        <form action="{{ route('jadwalguru.destroy',$val->id) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button type="submit" name="submit" class="btn btn-danger">Delete</button>
                        </form>
                      </td>
                    </tr>
                    @endforeach --}}
                </thead>
            </table>
            {{-- {!! $data->links() !!} --}}
        </div>
    </div>
</div>




@endsection

@section('footScript')
<script>

$(function(){
  $('.selectpicker').selectpicker();
  $('.tmpicker').bootstrapMaterialDatePicker({
        format: 'HH:mm',
        clearButton: true,
        date: false
    });
  $('#time').bootstrapMaterialDatePicker({ date: false });

});

    $(function() {
        $('#guru-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('jadwalGuruDataTable') !!}',
            columns: [
                { data: 'nik', name: 'guru.nik' },
                { data: 'nama', name: 'guru.nama' },
                { data: 'jam_mulai', name: 'jadwal_guru.jam_mulai', searchable: false },
                { data: 'jam_berakhir', name: 'jadwal_guru.jam_berakhir', searchable: false },
                { data: 'hari', name: 'jadwal_guru.hari' },
                { data: 'kelasd', name: 'kelas.deskripsi' },
                { data: 'tlpn', name: 'guru.tlpn' },
                { data: 'bs', name: 'bidang_studi.deskripsi' },
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });

</script>
@endsection
