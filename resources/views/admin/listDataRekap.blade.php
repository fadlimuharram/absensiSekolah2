@extends('layouts.admin') 

@section('content')
<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>
                Kelas
                <small>Daftar Kelas Tersedia</small>
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
            <table class="table table-bordered">
                {{-- 'jadwal_guru.jam_mulai',
                'jadwal_guru.jam_berakhir',
                'kehadiran.tgl',
                'bidang_studi.deskripsi as "mapel"',
                'kelas.deskripsi',
                'kehadiran.stts',
                'kelas.deskripsi as kelas',
                'kehadiran.deskripsi as "why"' --}}
                <tr>
                    <th>Jam Mulai</th>
                    <th>Jam AKhir</th>
                    <th>Tanggal</th>
                    <th>Bidang Studi</th>
                    <th>Kelas</th>
                    <th>Kehadiran</th>
                </tr>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $item->jam_mulai }}</td>
                    <td>{{ $item->jam_berakhir }}</td>
                    <td>{{ $item->tgl }}</td>
                    <td>{{ $item->mapel }}</td>
                    <td>{{ $item->kelas }}</td>
                    <td>{{ $item->stts }}</td>
                    
                </tr>
                @endforeach
            </table>

        </div>
    </div>
</div>

@endsection
