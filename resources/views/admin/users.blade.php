@extends('layouts.admin')
@section('content')
<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>
                Anggota
                <small>Daftar Anggota yang Tersedia</small>
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
                        <th>No.</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Kelas</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>


                    @foreach ($data as $val)
                    <tr>
                      <td style="width:50px">{{ ++$i }}</td>
                      <td>{{$val->firstname}}</td>
                      <td>{{$val->lastname}}</td>
                      <td>{{$val->deskripsi}}</td>
                      <td>{{$val->email}}</td>

                      <td>
                        <form action="{{ route('users.destroy',$val->id_k) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button type="submit" name="submit" class="btn btn-danger">Delete</button>
                          <!-- <button
                              type="button"
                              class="btn btn-primary"
                              data-toggle="modal"
                              data-target="#editModal{{$val->id}}">Edit</button> -->
                        </form>
                      </td>
                    </tr>
                    @endforeach
                    </tbody>

            </table>
            {!! $data->links() !!}
        </div>
    </div>
</div>
@endsection
