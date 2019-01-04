@extends('layouts.member')

@section('content')
<div class="row clearfix">
                <div class="col-xs-12 col-sm-3">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                <!-- <img src="../../images/user-lg.jpg" alt="AdminBSB - Profile Image"> -->
                                @if (Auth::user()->jk == "L")
                                  <img src="{{URL::asset('/images/maleuser.png')}}" width="120" height="120" alt="AdminBSB - Profile Image" />
                                @else
                                <img src="{{URL::asset('/images/femaleusers.png')}}" width="120" height="120" alt="AdminBSB - Profile Image" >
                                @endif
                            </div>
                            <div class="content-area">
                                <h3>{{Auth::user()->firstname." ".Auth::user()->lastname}}</h3>
                                <p>Ketua Kelas</p>
                                <p>{{$curr_kelas}}</p>
                            </div>
                        </div>
                        <div class="profile-footer">

                            <button class="btn btn-primary btn-lg waves-effect btn-block">FOLLOW</button>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">

                                    @if (isset($error))
                                    <li role="presentation"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Profile Settings</a></li>
                                    <li role="presentation" class="active"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Password</a></li>

                                    @else
                                    <li role="presentation" class="active"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Profile Settings</a></li>
                                    <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Password</a></li>

                                    @endif

                                </ul>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in {{ isset($error) || isset($errorr) ? '' : 'active' }}" id="profile_settings">
                                        <form class="form-horizontal" action="{{route('profile.update',Auth::user()->id)}}" method="post">
                                          @method('PATCH')
                                          @csrf
                                          <div class="form-group">
                                              <label for="NameSurname" class="col-sm-3 control-label">Firstname</label>
                                              <div class="col-sm-9">
                                                  <div class="form-line focused">
                                                      <input class="form-control" id="NameSurname" name="fname" placeholder="firstname" value="{{Auth::user()->firstname}}" required="" type="text">
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label for="NameSurname" class="col-sm-3 control-label">Lastname</label>
                                              <div class="col-sm-9">
                                                  <div class="form-line focused">
                                                      <input class="form-control" id="NameSurname" name="lname" placeholder="firstname" value="{{Auth::user()->lastname}}" required="" type="text">
                                                  </div>
                                              </div>
                                          </div>
                                            <div class="form-group">
                                                <label for="Email" class="col-sm-3 control-label">Email</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line focused">
                                                        <input class="form-control" id="Email" name="email" placeholder="Email" value="{{Auth::user()->email}}" required="" type="email">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputExperience" class="col-sm-3 control-label">Jenis Kelamin</label>

                                                <div class="col-sm-9">
                                                    <!-- <div class="form-line"> -->
                                                      <select name="gender" required="required">
                                                        <option value=""></option>
                                                        @if (Auth::user()->jk == "L")
                                                        <option value="L" selected>Laki - Laki</option>
                                                        <option value="P">Perempuan</option>
                                                        @else
                                                        <option value="L">Laki - Laki</option>
                                                        <option value="P" selected>Perempuan</option>
                                                        @endif
                                                      </select>
                                                    <!-- </div> -->
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">SUBMIT</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade in {{ isset($error) || isset($errorr) ? 'active' : '' }}" id="change_password_settings">
                                        <form class="form-horizontal" method="POST" action="{{ route('changePass') }}">
                                          @csrf
                                          {{-- <div class="form-line focused error">
                                        <input class="form-control" name="error" value="Error" required="" type="text">
                                        <label class="form-label">Form Validation - Error</label>
                                    </div> --}}
                                          <div class="form-group">
                                              <label for="OldPassword" class="col-sm-3 control-label">Password Lama</label>
                                              <div class="col-sm-9">
                                                <div class="form-line{{ isset($error) ? ' focused error' : ''   }}">
                                                    <input id="OldPassword" class="form-control is-invalid" name="current-password" placeholder="Old Password" required="" type="password">
                                                </div>
                                              </div>

                                          </div>

                                            <div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">Password Baru</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input class="form-control" id="NewPassword" name="password" placeholder="Password Baru" required="" type="password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPasswordConfirm" class="col-sm-3 control-label">Konfirmasi Password</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line{{ isset($errorr) ? ' focused error' : ''   }}">
                                                        <input class="form-control" id="NewPasswordConfirm" name="password_confirmation" placeholder="Konfirmasi Password" required="" type="password">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-danger">SUBMIT</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (isset($error))
            <div class="alert bg-red alert-dismissible animated fadeInDown" role="alert" style="display: inline-block; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; bottom: 20px; right:10px;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                {{$error}}
            </div>
    </div>

            @endif
            @if (isset($errorr))
            <div class="alert bg-red alert-dismissible animated fadeInDown" role="alert" style="display: inline-block; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; bottom: 20px; right:10px;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                {{$errorr}}
            </div>
    </div>

            @endif
@endsection
