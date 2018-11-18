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
                        <th></th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Kelas</th>
                        <th>Email</th>

                        <th>Action</th>
                    </tr>
                    @foreach ($data as $val)
                    <tr>
                      <td></td>
                      <td>{{$val->firstname}}</td>
                      <td>{{$val->lastname}}</td>
                      <td>{{$val->deskripsi}}</td>
                      <td>{{$val->email}}</td>

                      <td>
                        <form action="{{ route('users.destroy',$val->id_k) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button type="submit" name="submit" class="btn btn-danger">Delete</button>
                          <button
                              type="button"
                              class="btn btn-primary"
                              data-toggle="modal"
                              data-target="#editModal{{$val->id}}">Edit</button>
                        </form>
                        <div class="modal fade" id="editModal{{$val->id}}" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="editModalLabel">Edit
                                            </h4>
                                    </div>
                                    <form method="POST" action="{{ route('users.update',$val->id_k) }}">
                                        @csrf @method('PUT')
                                        <div class="modal-body">
                                            <div class="row clearfix">
                                                <div class="col-sm-12">
                                                  <div class="form-group form-float">
                                                      <div class="form-line{{ $errors->has('deskripsi') ? ' error' : '' }}">
                                                          <input
                                                              type="text"
                                                              class="form-control{{ $errors->has('deskripsi') ? ' is-invalid' : '' }}"
                                                              name="fname"
                                                              value="{{ $val->firstname }}"
                                                              required="required"
                                                              autofocus="autofocus">
                                                          <label class="form-label">firstname</label>
                                                      </div>
                                                      @if ($errors->has('fname'))
                                                      <label id="name-error" class="error" for="deskripsi">{{ $errors->first('fname') }}</label>
                                                      @endif
                                                  </div>
                                                  <div class="form-group form-float">
                                                      <div class="form-line{{ $errors->has('deskripsi') ? ' error' : '' }}">
                                                          <input
                                                              type="deskripsi"
                                                              class="form-control{{ $errors->has('deskripsi') ? ' is-invalid' : '' }}"
                                                              name="lname"
                                                              value="{{ $val->lastname }}"
                                                              required="required"
                                                              autofocus="autofocus">
                                                          <label class="form-label">Lastname</label>
                                                      </div>
                                                      @if ($errors->has('lname'))
                                                      <label id="name-error" class="error" for="deskripsi">{{ $errors->first('lname') }}</label>
                                                      @endif
                                                  </div>
                                                  <div class="form-group form-float">
                                                    <label class="form-label">Kelas</label>
                                                    <div class="form-line{{ $errors->has('kelas') ? ' error' : '' }}">
                                                        <select class="selectpicker form-control show-tick" data-live-search="true" name="kelas">
                                                          <option value=""></option>
                                                          @foreach ($kelas as $val2)
                                                          @if ($val->kelas_id == $val2->id)
                                                          <option selected
                                                           value="{{$val2->id}}">{{$val2->deskripsi}}</option>
                                                           @else{
                                                             <option
                                                             value="{{$val2->id}}">{{$val2->deskripsi}}</option>
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
                                                <div class="form-group form-float">
                                                  <label class="form-label">Email</label>
                                                    <div class="form-line{{ $errors->has('deskripsi') ? ' error' : '' }}">
                                                        <input
                                                            type="text"
                                                            class="form-control{{ $errors->has('deskripsi') ? ' is-invalid' : '' }}"
                                                            name="email"
                                                            value="{{ $val->email }}"
                                                            required="required"
                                                            autofocus="autofocus">
                                                    </div>
                                                    @if ($errors->has('email'))
                                                    <label id="name-error" class="error" for="deskripsi">{{ $errors->first('email') }}</label>
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
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection
