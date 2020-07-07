@extends('layouts.mainlayoutAdmin')

@section('content')


           
<div class="content">
            <div class="container-xl">
                <!-- Page title -->
                <div class="page-header text-white">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <h2 class="page-title">
                                Gestion des Sites
                            </h2>
                        </div>
                        <div class="col-auto">
                            <div class="text-white text-h5 mt-2">
                                1-10 of 30
                            </div>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-auto ml-auto d-print-none">
                            <div class="d-flex align-items-center">
                                <a href="#" class="btn btn-white" data-toggle="modal" data-target="#modal-create-site">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <line x1="12" y1="5" x2="12" y2="19" />
                                        <line x1="5" y1="12" x2="19" y2="12" />
                                    </svg>
                                    Nouveau
                                </a>
                                <span class="dropdown ml-3">
                                    <div class="dropdown-toggle" data-boundary="viewport" data-toggle="dropdown">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                            height="24">
                                            <path fill="none" d="M0 0h24v24H0z" />
                                            <path
                                                d="M2 18h7v2H2v-2zm0-7h9v2H2v-2zm0-7h20v2H2V4zm18.674 9.025l1.156-.391 1 1.732-.916.805a4.017 4.017 0 0 1 0 1.658l.916.805-1 1.732-1.156-.391c-.41.37-.898.655-1.435.83L19 21h-2l-.24-1.196a3.996 3.996 0 0 1-1.434-.83l-1.156.392-1-1.732.916-.805a4.017 4.017 0 0 1 0-1.658l-.916-.805 1-1.732 1.156.391c.41-.37.898-.655 1.435-.83L17 11h2l.24 1.196c.536.174 1.024.46 1.434.83zM18 18a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"
                                                fill="rgba(255,255,255,1)" /></svg>
                                    </div>

                                    <div class="dropdown-menu dropdown-menu-right mt-3">
                                        <span class="dropdown-header">Trier par</span>
                                        <a class="dropdown-item" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18"
                                                height="18" class="mr-2">
                                                <path fill="none" d="M0 0h24v24H0z" />
                                                <path
                                                    d="M8 4h13v2H8V4zM4.5 6.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 7a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 6.9a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM8 11h13v2H8v-2zm0 7h13v2H8v-2z" />
                                            </svg>
                                            Nom
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18"
                                                height="18" class="mr-2">
                                                <path fill="none" d="M0 0h24v24H0z" />
                                                <path
                                                    d="M8 4h13v2H8V4zM4.5 6.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 7a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 6.9a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM8 11h13v2H8v-2zm0 7h13v2H8v-2z" />
                                            </svg>
                                            Email
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18"
                                                height="18" class="mr-2">
                                                <path fill="none" d="M0 0h24v24H0z" />
                                                <path
                                                    d="M8 4h13v2H8V4zM4.5 6.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 7a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 6.9a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM8 11h13v2H8v-2zm0 7h13v2H8v-2z" />
                                            </svg>
                                            Ville
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18"
                                                height="18" class="mr-2">
                                                <path fill="none" d="M0 0h24v24H0z" />
                                                <path
                                                    d="M5.463 4.433A9.961 9.961 0 0 1 12 2c5.523 0 10 4.477 10 10 0 2.136-.67 4.116-1.81 5.74L17 12h3A8 8 0 0 0 6.46 6.228l-.997-1.795zm13.074 15.134A9.961 9.961 0 0 1 12 22C6.477 22 2 17.523 2 12c0-2.136.67-4.116 1.81-5.74L7 12H4a8 8 0 0 0 13.54 5.772l.997 1.795z" />
                                            </svg>
                                            Actualiser
                                        </a>
                                    </div>
                                </span>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table table-vcenter card-table">
                                    <thead>
                                        <tr>
                                            <th class="w-1"><input class="form-check-input m-0 align-middle"
                                                    type="checkbox"></th>
                                            <th class="w-1">No.
                                            </th>
                                            <th>Nom</th>
                                            <th>Email</th>
                                            <th>Ville</th>
                                            <th>Téléphone</th>
                                            <th>Quartier</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($lims_site_all as $key=>$site)
                                        <tr>
                                            <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                    aria-label="Select invoice"></td>
                                            <td><span class="text-muted">{{$site->id}}</span></td>
                                            <td><a href="#" class="text-reset" tabindex="-1">
                                            {{$site->name}}</a>
                                            </td>
                                            <td>
                                            {{$site->email}}
                                            </td>
                                            <td>
                                            {{$site->town}}
                                            </td>
                                            <td>
                                            {{$site->tel1}}
                                            </td>
                                            <td>
                                            {{$site->street}}
                                            </td>
                                            <td class="text-right">
                                                <button type="button" data-id="{{$site->id}}" data-name="{{$site->name}}" data-email="{{$site->email}}" data-town="{{$site->town}}" data-street="{{$site->street}}" data-tel1="{{$site->tel1}}" data-tel2="{{$site->tel2}}" class="open-EditroleDialog btn btn-white btn-sm mt-1" data-toggle="modal" data-target="#modal-edit-site">
                                                    Modifier
                                                </button>
                                                <span class="dropdown">
                                                    <button class="btn btn-white btn-sm dropdown-toggle align-text-top"
                                                        data-boundary="viewport" data-toggle="dropdown">Actions</button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#">
                                                            Dupiquer
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            Marquer comme inactif
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        @if(Auth::user()->is_admin == 2)
                                                        <a class="dropdown-item" href="#" onclick="deleteData({{$site->id}})" data-toggle="modal" data-target="#modal-delete-site">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                width="18" height="18" class="mr-2">
                                                                <path fill="none" d="M0 0h24v24H0z" />
                                                                <path
                                                                    d="M7 4V2h10v2h5v2h-2v15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V6H2V4h5zM6 6v14h12V6H6zm3 3h2v8H9V9zm4 0h2v8h-2V9z" />
                                                            </svg>
                                                            Supprimer
                                                        </a>
                                                        @endif
                                                    </div>
                                                </span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer d-flex align-items-center">
                                <p class="m-0 text-muted">Affichage <span>1</span> à <span>10</span> de <span>30</span>
                                    élements</p>
                                <ul class="pagination m-0 ml-auto">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" />
                                                <polyline points="15 6 9 12 15 18" /></svg>
                                            précédent
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">
                                            suivant <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" />
                                                <polyline points="9 6 15 12 9 18" /></svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
        <div class="modal-section">
        <div class="modal modal-blur fade" id="modal-create-site" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter un nouveau site</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <line x1="18" y1="6" x2="6" y2="18" />
                                <line x1="6" y1="6" x2="18" y2="18" /></svg>
                        </button>
                    </div>
                    {!! Form::open(['route' => 'admin.site.store', 'method' => 'post']) !!}
                    <div class="modal-body">
                        <div class="row mb-3 align-items-end">
                            <div class="col-lg-9">
                                <label class="form-label">Nom</label>
                                {{Form::text('name',null,array('required' => 'required', 'placeholder' => 'Saisissez le nom', 'class' => 'form-control'))}}
                            </div>
                            <div class="col-lg-12 mt-4">
                                <label class="form-label">Email</label>
                                {{Form::email('email',null,array('required' => 'required', 'placeholder' => 'Saisissez le mail', 'class' => 'form-control'))}}
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label class="form-label">Tel1</label>
                                {{Form::text('tel1',null,array('placeholder' => 'Saisissez le téléphone N°1', 'class' => 'form-control'))}}
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label class="form-label">Tel2</label>
                                {{Form::text('tel2',null,array('placeholder' => 'Saisissez le téléphone N°2', 'class' => 'form-control'))}}
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label class="form-label">Ville</label>
                                {{Form::text('town',null,array('placeholder' => 'Saisissez la ville', 'class' => 'form-control'))}}
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label class="form-label">Quartier</label>
                                <div class="col-lg-12 mb-4">
                                <label class="form-label">Tel1</label>
                                {{Form::text('street',null,array('placeholder' => 'Saisissez le quartier', 'class' => 'form-control'))}}
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" style="width: 100%;"
                            >Ajouter</button>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
        <div class="modal modal-blur fade" id="modal-edit-site" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modifier le site</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <line x1="18" y1="6" x2="6" y2="18" />
                                <line x1="6" y1="6" x2="18" y2="18" /></svg>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3 align-items-end">
                            <input type="hidden" name="site_id">
                            <div class="col-lg-9">
                                <label class="form-label">Nom</label>
                                <input type="text" class="form-control"
                                id="name_edit">
                            </div>
                            <div class="col-lg-12 mt-4">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control"
                                id="email_edit">
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label class="form-label">Tel1</label>
                                <input type="text" class="form-control"
                                id="tel1_edit">
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label class="form-label">Tel2</label>
                                <input type="text" class="form-control"
                                id="tel2_edit">
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label class="form-label">Ville</label>
                                <input type="text" class="form-control"
                                id="town_edit">
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label class="form-label">Quartier</label>
                                <input type="text" class="form-control"
                                id="street_edit">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" style="width: 100%;"
                            data-dismiss="modal">Modifier</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal modal-blur fade" id="modal-delete-site" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <form action="" id="deleteForm" method="post">
                <div class="modal-content">
                    
                    <div class="modal-body">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                        <input type="hidden" name="_method" value="DELETE">
                        <div class="modal-title">Êtes vous sure ?</div>
                        <div>Si vous continuez, vous perdrez toutes les données lié à ce site.</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link link-secondary mr-auto"
                            data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-danger" name="" onclick="formSubmit()" data-dismiss="modal">Oui, supprimer</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script type="text/javascript">

function deleteData(id)
     {
         var id = id;
         var url = '{{ route("admin.site.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }

     // Edit a post
     $(document).on('click', '.open-EditroleDialog', function() {
            $('#id_edit').val($(this).data('id'));
            $('#name_edit').val($(this).data('name'));
            $('#email_edit').val($(this).data('email'));
            $('#tel1_edit').val($(this).data('tel1'));
            $('#tel2_edit').val($(this).data('tel2'));
            $('#town_edit').val($(this).data('town'));
            $('#street_edit').val($(this).data('street'));
            id = $('#id_edit').val();
        });
        $('.modal-footer').on('click', '.edit', function() {
            $.ajax({
                type: 'PUT',
                url: 'admin/site/' + id,
                data: {
                    '_token': $('input[name=csrf-token]').val(),
                    'id': $("#id_edit").val(),
                    'name': $('#name_edit').val(),
                    'email': $('#email_edit').val()
                    'tel1': $('#tel1_edit').val()
                    'tel2': $('#tel2_edit').val()
                    'town': $('#town_edit').val()
                    'street': $('#street_edit').val()
                },
                success: function(data) {
                    $('.errorName').addClass('hidden');
                    $('.errorEmail').addClass('hidden');
                    $('.errorTel1').addClass('hidden');
                    $('.errorTel2').addClass('hidden');
                    $('.errorTown').addClass('hidden');
                    $('.errorStreet').addClass('hidden');
                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#modal-create-site').modal('show');
                            toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                        }, 500);
                        if (data.errors.name) {
                            $('.errorName').removeClass('hidden');
                            $('.errorName').text(data.errors.name);
                        }
                        if (data.errors.email) {
                            $('.errorEmail').removeClass('hidden');
                            $('.errorEmail').text(data.errors.email);
                        }
                        if (data.errors.tel1) {
                            $('.errorTel1').removeClass('hidden');
                            $('.errorTel1').text(data.errors.tel1);
                        }
                        if (data.errors.tel2) {
                            $('.errorTel2').removeClass('hidden');
                            $('.errorTel2').text(data.errors.tel2);
                        }
                        if (data.errors.town) {
                            $('.errorTown').removeClass('hidden');
                            $('.errorTown').text(data.errors.town);
                        }
                        if (data.errors.street) {
                            $('.errorStreet').removeClass('hidden');
                            $('.errorStreet').text(data.errors.street);
                        }
                    } else {
                        toastr.success('Successfully updated Post!', 'Success Alert', {timeOut: 5000});
                        
                        
                    }
                }
            });
        });
</script>
@endpush