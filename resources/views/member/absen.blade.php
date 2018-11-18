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
            <h2>Absensi Belum Di Buka</h2>
        </div>
        @else
        <div class="header">
                <h2>
                    {{
                        $hari
                    }}
                    <small>Pelajaran untuk tanggal : {{ $tanggal->format('d/m/Y') }} </small>
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
                            <th>Absen</th>
                        </tr>
                        @foreach ($sekarang as $item)
    
                          <?php
                          $apakahSudahAbsen = 'belum';
                           ?>
    
                          @foreach($kehadiran as $itemKehadrian)
                            @if($itemKehadrian->id_jadwal == $item->id)
                              <?php
                                $apakahSudahAbsen = 'sudah';
                               ?>
                            @endif
                          @endforeach
    
                          @if($apakahSudahAbsen == 'belum')
                          <tr>
                              <td>{{$item->jam_mulai}}</td>
                              <td>{{$item->jam_berakhir}}</td>
                              <td>{{$item->hari}}</td>
                              <td>{{$item->nama}}</td>
                              <td>{{$item->tlpn}}</td>
                              <td>{{$item->bs}}</td>
                              <td>
                                    <button
                                        type="button"
                                        class="btn btn-primary"
                                        data-toggle="modal"
                                        data-target="#kehadiranModal{{$item->id}}">Kehadiran</button>
    
                                    @csrf @method('DELETE')
    
                                    <!-- <button type="submit" class="btn btn-danger">Delete</button> -->
                                <!-- </form> -->
                                <div class="modal fade" id="kehadiranModal{{$item->id}}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="editModalLabel">apaan
                                                    {{$item->deskripsi}} untuk guru {{$item->nama}} untuk jam mulai {{$item->jam_mulai}}</h4>
                                            </div>
                                            <form method="POST" action="{{ route('absensi.store') }}">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row clearfix">
                                                        <div class="col-sm-12">
                                                            <div class="form-group form-float">
                                                                <div class="form-line{{ $errors->has('deskripsi') ? ' error' : '' }}">
                                                                  <input type="hidden" name="id_usr" value="{{Auth::user()->id}}">
                                                                  <input type="hidden" name="id_jadwal" value="{{$item->id}}">
                                                                  <input type="hidden" name="untuk_tanggal" value={{$tanggal->format('Y-m-d')}}>
                                                                    <input
                                                                        type="deskripsi"
                                                                        class="form-control{{ $errors->has('deskripsi') ? ' is-invalid' : '' }}"
                                                                        name="deskripsi"
                                                                        value=""
                                                                        required="required"
                                                                        autofocus="autofocus">
                                                                    <label class="form-label">Deskripsi</label>
                                                                </div>
                                                              </div>
                                                              <div class="form-group form-float">
                                                                <div class="form-line{{ $errors->has('stts') ? ' error' : '' }}">
                                                                    <select class="selectpicker form-control show-tick" data-live-search="true" name="stts">
                                                                      <option value=""></option>
                                                                      <option value="0">Tidak Hadir</option>
                                                                      <option value="1">Hadir</option>
                                                                    </select>
                                                                    @if ($errors->has('kelas'))
                                                                    <label id="name-error" class="error" for="kelas">{{ $errors->first('kelas') }}</label>
                                                                    @endif
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
                          @endif
    
                        @endforeach
                    </table>
    
            </div>
        @endif
    </div>
</div>

<input type="hidden" id="locationTo" value="{{ route('absensi.index') }}">

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
