@extends('layouts.member')

@section('content')
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="card">
        <div class="body">
                <div id="datepicker" data-date="{{
                    $tanggal->format('m-d-Y')
                }}"></div>
                <input type="hidden" id="my_hidden_input">
        </div>
    </div>
</div>
<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">

        <div class="card">
        @if($tanggal->timestamp > \Carbon\Carbon::now()->addHour(1)->timestamp)
        <div class="body">
            <h2>Hasil Belum Di Laporkan</h2>
        </div>
        @else
                <div class="header">
                        <h2>
                            {{
                                $hari
                            }}
                            <small>Laporan untuk tanggal : {{ $tanggal->format('d/m/Y') }} </small>
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
                              <td>{{$val->tgl}}</td>

                                <td>
                                  @if ($val->stts == 1)
                                  <a class="btn btn-primary">Hadir</a>
                                  @else
                                  <a class="btn btn-danger">Tidak Hadir</a>
                                  @endif

                                  <form action="{{ route('hasil.destroy',$val->id) }}" method="POST">
                                        @csrf
                                         @method('DELETE')

                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>

                            </tr>
        @endforeach
                        </table>
                      </div>
                </div>
        @endif
</div>

</div>
<input type="hidden" id="locationTo" value="{{ route('hasil.index') }}">
@endsection

@section('footScript')

<script type="text/javascript">

    $(function () {
        $('#datepicker').datepicker({
            language: 'en'
        });
        $('#datepicker').on('changeDate', function() {
            $('#my_hidden_input').val(
                $('#datepicker').datepicker('getFormattedDate')
            );

            var temukan = '/';
            var replacenya = new RegExp(temukan, 'g');

            window.location = $('#locationTo').val() + '/' + $('#datepicker').datepicker('getFormattedDate').replace(replacenya,'-');

        });
    });
</script>
@endsection
