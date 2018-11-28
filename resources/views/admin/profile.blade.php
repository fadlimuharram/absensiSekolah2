@extends('layouts.admin')

@section('content')
<div class="row clearfix">
                <div class="col-xs-12 col-sm-3">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                <!-- <img src="../../images/user-lg.jpg" alt="AdminBSB - Profile Image"> -->
                                @if (Auth::user()->jk == "L")
                                  <img src="https://gurayyarar.github.io/AdminBSBMaterialDesign/images/user.png" width="120" height="120" alt="AdminBSB - Profile Image" />
                                @else
                                <img src="https://cdn1.iconfinder.com/data/icons/user-pictures/100/female1-512.png" width="120" height="120" alt="AdminBSB - Profile Image" >
                                @endif
                            </div>
                            <div class="content-area">
                                <h3>{{Auth::user()->firstname." ".Auth::user()->lastname}}</h3>
                                <p>Administrator</p>
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
                                    <!-- <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li> -->
                                    <li role="presentation"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Profile Settings</a></li>
                                    <li role="presentation"  class="active"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Password</a></li>
                                </ul>

                                <div class="tab-content">
<!-- {{ !isset($stts) ? 'active' : '' }} -->
                                    <div role="tabpanel" class="tab-pane fade" id="profile_settings">
                                        <form class="form-horizontal" action="{{route('adminprofil.update',Auth::user()->id)}}" method="post">
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
                                    <div role="tabpanel" class="tab-pane fade in active" id="change_password_settings">
                                        <form class="form-horizontal" method="POST" action="{{ route('changePass2') }}">
                                          @csrf
                                            <div class="form-group">
                                                <label for="OldPassword" class="col-sm-3 control-label">Old Password</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input class="form-control" id="OldPassword" name="current-password" placeholder="Old Password" required="" type="password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">New Password</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input class="form-control" id="NewPassword" name="password" placeholder="New Password" required="" type="password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPasswordConfirm" class="col-sm-3 control-label">New Password (Confirm)</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input class="form-control" id="NewPasswordConfirm" name="password_confirmation" placeholder="New Password (Confirm)" required="" type="password">
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
@endsection
@section('footScript')
<script type="text/javascript">
function activaTab(tab){
  $('.nav-tabs a[href="#' + tab + '"]').tab('show');
};


$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
var target = $(e.target).attr("href"); // activated tab
}
});
</script>
@endsection
