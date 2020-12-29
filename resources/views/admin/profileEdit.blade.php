@extends('layouts.base')


@section('content')

    <!-- Page title -->
    <div class="page-header text-white">
        <div class="row align-items-center">
            <div class="col-auto">
                <h2 class="page-title">
                    <a href={{route('admin.profile')}} class="mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M7.828 11H20v2H7.828l5.364 5.364-1.414 1.414L4 12l7.778-7.778 1.414 1.414z"
                                fill="rgba(255,255,255,1)" /></svg>
                    </a>
                    Edition du compte
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ml-auto d-print-none">
                <div class="d-flex align-items-center">
                    <a href={{route('admin.profile')}} class="d-flex align-items-center text-white mr-5">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="mr-2"><path fill="none" d="M0 0h24v24H0z"/><path d="M20 22h-2v-2a3 3 0 0 0-3-3H9a3 3 0 0 0-3 3v2H4v-2a5 5 0 0 1 5-5h6a5 5 0 0 1 5 5v2zm-8-9a6 6 0 1 1 0-12 6 6 0 0 1 0 12zm0-2a4 4 0 1 0 0-8 4 4 0 0 0 0 8z" fill="rgba(255,255,255,1)"/></svg>
                        Vue d'ensemble
                    </a>
                    <a href="#" class="d-flex align-items-center text-white" data-toggle="modal" data-target="#modal-edit-password">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="mr-2"><path fill="none" d="M0 0h24v24H0z"/><path d="M18 8h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1h2V7a6 6 0 1 1 12 0v1zM5 10v10h14V10H5zm6 4h2v2h-2v-2zm-4 0h2v2H7v-2zm8 0h2v2h-2v-2zm1-6V7a4 4 0 1 0-8 0v1h8z" fill="rgba(255,255,255,1)"/></svg>
                        Sécurité
                    </a>
                </div>
            </div>
        </div>
    </div>
    <form method="post" enctype="multipart/form-data">
    <div class="row">
            <div class="card col-lg-3 px-3 py-0"
                style="max-height: 200px; border:none; box-shadow: none; background-color: transparent;">
                <input type="file" name="photo" class="file" accept="image/*" hidden>
                <a id="profile" class="button-click-action">
                    <img class="card-img-top" style="border-radius: 10px;" src="{{(Auth::user()->photo != null) ? asset(Auth::user()->photo) : asset("template/assets/static/avatar.png")}}" alt="Profile picture">
                </a>

                <div class="card-body d-flex flex-column">
                    <div class="d-flex align-items-center mt-auto">
                        <div class="ml-2">
                            <a class="h2 text-body">{{Auth::user()->name}}</a>
                            <small class="d-block text-muted">En ligne</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card p-4">
                    <div class="row">
                        @csrf
                        <div class="col-md-5">
                            <div class="mb-2">
                                <label class="form-label">Company</label>
                                <input type="text" class="form-control" disabled  placeholder="Company" value="{{Auth::user()->companies->first()->name}}">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="mb-2">
                                <label class="form-label">Nom d'utilisateur</label>
                                <input type="text" name="username" class="form-control"  placeholder="Saisisez votre nom d'utilisateur" value="{{Auth::user()->username}}" required>
                                {!! $errors->first('username','<span class="text-danger"> :message </span>') !!}
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="mb-2">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Votre adresse email" value="{{Auth::user()->email}}" required>
                                {!! $errors->first('email','<span class="text-danger"> :message </span>') !!}
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="mb-2">
                                <label class="form-label">Nom complet</label>
                                <input type="text"   maxlength="100" pattern="^[A-Z a-z]+[0-9]{0,3}" name="name" class="form-control" placeholder="Saisissez votre nom" value="{{Auth::user()->name}}" required>
                                {!! $errors->first('name','<span class="text-danger"> :message </span>') !!}
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                                <div class="mb-2">
                                    <label class="form-label">Numéro de téléphone</label>
                                    <input type="tel" name="phone" class="form-control" placeholder="Saisissez Numéro de téléphone" value="{{Auth::user()->phone}}"  pattern="[0-9]{3}[0-9]{3}[0-9]{3}" required>
                                    {!! $errors->first('phone','<span class="text-danger"> :message </span>') !!}
                                </div>
                            </div>
                        <div class="col-md-12">
                            <div class="mb-2">
                                <label class="form-label">Addresse</label>
                                <input type="text" name="address" class="form-control"  placeholder="Saisisez votre adresse" value="{{Auth::user()->address}}" required>
                                {!! $errors->first('address','<span class="text-danger"> :message </span>') !!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-2 mb-0">
                                <label class="form-label">A Propos</label>
                                <textarea rows="5" name="bio" class="form-control" placeholder="Here can be your description"> {{Auth::user()->bio}} </textarea>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary" data-toggle="modal"
                                data-target="#modal-save-profile">Sauvegarder</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="modal-section">
        <div class="modal modal-blur fade" id="modal-edit-password" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Sécurité du compte</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <line x1="18" y1="6" x2="6" y2="18" />
                                <line x1="6" y1="6" x2="18" y2="18" />
                            </svg>
                        </button>
                    </div>
                    <div class="modal-body bg-white">
                        <div class="row mb-3 align-items-end">
                            <div class="col-lg-12 mb-4">
                                <label class="form-label">Mot de passe actuel</label>
                                <div class="input-icon">
                                    <span class="input-icon-addon ml-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                                            <path fill="none" d="M0 0h24v24H0z" />
                                            <path
                                                d="M18 8h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1h2V7a6 6 0 1 1 12 0v1zM5 10v10h14V10H5zm6 4h2v2h-2v-2zm-4 0h2v2H7v-2zm8 0h2v2h-2v-2zm1-6V7a4 4 0 1 0-8 0v1h8z" />
                                        </svg>
                                    </span>
                                    <input type="password" name="password" id="password" class="auth-input form-control py-2 px-5"
                                        required autocomplete="off" minlength="8"/>
                                    <span class="input-icon-addon mr-2">
                                        <a class="link-secondary" id="show-password" title="Show password" data-toggle="tooltip"><svg
                                                xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" />
                                                <circle cx="12" cy="12" r="2" />
                                                <path d="M2 12l1.5 2a11 11 0 0 0 17 0l1.5 -2" />
                                                <path d="M2 12l1.5 -2a11 11 0 0 1 17 0l1.5 2" />
                                            </svg>
                                        </a>
                                    </span>
                                </div>
                                <span class="text-danger" id="password-error"></span>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label class="form-label">Nouveau mot de passe</label>
                                <div class="input-icon">
                                    <span class="input-icon-addon ml-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                                            <path fill="none" d="M0 0h24v24H0z" />
                                            <path
                                                d="M18 8h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1h2V7a6 6 0 1 1 12 0v1zM5 10v10h14V10H5zm6 4h2v2h-2v-2zm-4 0h2v2H7v-2zm8 0h2v2h-2v-2zm1-6V7a4 4 0 1 0-8 0v1h8z" />
                                        </svg>
                                    </span>
                                    <input type="hidden" id="user_id" value={{Auth::user()->id}}>
                                    <input type="password" name="newPassword" id="newPassword" class="auth-input form-control py-2 px-5"
                                        required autocomplete="off" minlength="8"/>
                                    <span class="input-icon-addon mr-2">
                                        <a class="link-secondary" id="show-password" title="Show password" data-toggle="tooltip"><svg
                                                xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" />
                                                <circle cx="12" cy="12" r="2" />
                                                <path d="M2 12l1.5 2a11 11 0 0 0 17 0l1.5 -2" />
                                                <path d="M2 12l1.5 -2a11 11 0 0 1 17 0l1.5 2" />
                                            </svg>
                                        </a>
                                    </span>
                                </div>
                                <span class="text-danger" id="newPassword-error"></span>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-icon">
                                    <span class="input-icon-addon ml-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                                            <path fill="none" d="M0 0h24v24H0z" />
                                            <path
                                                d="M18 8h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1h2V7a6 6 0 1 1 12 0v1zM5 10v10h14V10H5zm6 4h2v2h-2v-2zm-4 0h2v2H7v-2zm8 0h2v2h-2v-2zm1-6V7a4 4 0 1 0-8 0v1h8z" />
                                        </svg>
                                    </span>
                                    <input type="password" name="newPasswordConfirm" id="newPasswordConfirm" class="auth-input form-control py-2 px-5"
                                        placeholder="Ressaisisez le mot de passe" required autocomplete="off" minlength="8"/>
                                    <span class="input-icon-addon mr-2">
                                        <a class="link-secondary" id="show-password" title="Show password" data-toggle="tooltip"><svg
                                                xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" />
                                                <circle cx="12" cy="12" r="2" />
                                                <path d="M2 12l1.5 2a11 11 0 0 0 17 0l1.5 -2" />
                                                <path d="M2 12l1.5 -2a11 11 0 0 1 17 0l1.5 2" />
                                            </svg>
                                        </a>
                                    </span>
                                </div>
                                <span class="text-danger" id="newPasswordConfirm-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="savepwd btn btn-primary" style="width: 100%;">
                            Sauvegarder
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $(".savepwd").click(function(){
            var token = '{{csrf_token()}}';
            var password = $("#password").val();
            var newPassword = $("#newPassword").val();
            var newPasswordConfirm = $("#newPasswordConfirm").val();
            var user_id = $("#user_id").val();
            $.ajax({
                url: '/resetPassword/'+user_id,
                method: 'post',
                data: {
                    _token : token,
                    password : password,
                    newPassword : newPassword,
                    newPasswordConfirm : newPasswordConfirm
                },
                success: function(data){
                    if(data == 'error'){
                        $(".text-danger").fadeOut().html('');
                        $('#password-error').html('Mot de passe incorrect').fadeIn();
                    } else {
                        $('#modal-edit-password').modal('hide');
                        $('.modal-backdrop').remove();

                        alert('Mot de passe modifié avec succès!');
                    }
                },
                error: function (err) {
                    if (err.status == 422) { // when status code is 422, it's a validation issue
                            // console.log(err.responseJSON);

                        // you can loop through the errors object and show it to the user
                            //console.warn(err.responseJSON.errors);
                        // display errors on each form field

                        $(".text-danger").fadeOut().html('');

                        $.each(err.responseJSON.errors, function (i, error) {
                            var el = $('#'+i+'-error');
                            el.html(error[0]).fadeIn();
                        });
                    }
                }
            });
        });

        $("#profile").click(function(){
            $(".file").click();

            $('input[type="file"]').change(function(e) {
                var fileName = e.target.files[0].name;
                // $("#file").val(fileName);

                var reader = new FileReader();
                reader.onload = function(e) {
                    // get loaded data and render thumbnail.
                    pic = "<img style='border-radius: 10px;' src='"+e.target.result+"' class='card-img-top' />";
                    $("#profile").html(pic);
                    // document.getElementById("preview").src = e.target.result;
                };
                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
            });
        })
    </script>
@endsection
