@extends('layouts.admin')

@section('content')

<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>
                Rekapitulasi Data
                <small>Isi form yang ada di bawah</small>
            </h2>
            <ul class="header-dropdown m-r--5">
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                        aria-haspopup="true" aria-expanded="true">
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
            <form method="POST" action="{{ route('dataRekap') }}">
                @csrf
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="form-group form-float">
                            <p>
                                <b>Guru</b>
                            </p>
                            <select class="selectpicker form-control show-tick" data-live-search="true" name="guru">
                                @foreach ($guru as $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group form-float">
                            <p>
                                <b>Bulan</b>
                            </p>
                            {{-- <input type="text" class="tmpicker form-control" placeholder="Please choose a time..."
                                name="jamakhir"> --}}
                            <select class="selectpicker form-control show-tick" data-live-search="true" name="bulan">
                                <option value="01">Januari</option>
                                <option value="02">February</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>

                            </select>

                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group form-float">
                            <p>
                                <b>Tahun</b>
                            </p>
                            <?php
                            $dariTahun = \Carbon\Carbon::now()
                                ->subYear(1)
                                ->format('Y');
                            $keTahun = \Carbon\Carbon::now()
                                ->addYear(1)
                                ->format('Y');
                            ?>
                            {{-- {{dd($keTahun)}} --}}
                            <select class="selectpicker form-control show-tick" data-live-search="true" name="tahun">
                                @for($x = $dariTahun; $x<=$keTahun; $x++) <option value="{{$x}}">{{$x}}</option>
                                    @endfor
                            </select>

                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group form-float">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Lihat Data') }}
                            </button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection

@section('footScript')
<script>
    $(function () {
        $('.selectpicker').selectpicker();
        $('.tmpicker').bootstrapMaterialDatePicker({
            format: 'mm',
            clearButton: true,
            monthPicker: true
        });
        $('#time').bootstrapMaterialDatePicker({
            date: false
        });

    });

</script>
@endsection
