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
                            <div class="form-line{{ $errors->has('deskripsi') ? ' error' : '' }}">
                                <input
                                required=""
                                    type="text"
                                    class="form-control{{ $errors->has('deskripsi') ? ' is-invalid' : '' }}"
                                    name="deskripsi"
                                    value="{{ old('deskripsi') }}"

                                    autofocus="autofocus">
                                <label class="form-label">Deskripsi</label>
                            </div>
                            @if ($errors->has('deskripsi'))
                            <label id="name-error" class="error" for="deskripsi">{{ $errors->first('deskripsi') }}</label>
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

<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
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
          <div class="table-responsive">
            <table class="table table-bordered" id="kelasTable">
              <thead>
                <tr>

                  <th>Daftar</th>
                  <th width="280px">Aksi</th>
                </tr>

              </thead>

                {{-- @foreach ($kelas as $kel)
                <tr>
                    <td style="width:50px">{{ ++$i }}</td>
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
                                                        <div class="form-line">
                                                            <input
                                                                type="deskripsi"
                                                                class="form-control{{ $errors->has('deskripsi') ? ' is-invalid' : '' }}"
                                                                name="deskripsi"
                                                                value="{{ $kel->deskripsi }}"
                                                                required="required"
                                                                autofocus="autofocus">
                                                            <label class="form-label">Deskripsi</label>
                                                        </div>

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
                @endforeach --}}
            </table>
          </div>
            <!-- {!! $kelas->links() !!} -->
        </div>
    </div>
</div>
@endsection
@section('footScript')
<script type="text/javascript">

$(function() {
  $('#kelasTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: '{!! route('kelasDataTable') !!}',
    columns: [
      {data: 'deskripsi', name: 'deskripsi' },
      {data: 'action', name: 'action', orderable: false, searchable: false}
    ]
  });
});
</script>
@endsection
