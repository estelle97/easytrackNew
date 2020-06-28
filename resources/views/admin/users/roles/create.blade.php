@extends('layouts.mainlayoutAdmin') 

@push('css')
    
@endpush

@section('content')

        <div class="content">
            <div class="container-xl">
                <!-- Page title -->
                <div class="page-header text-white">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <h2 class="page-title">
                                <a href="./users.html" class="mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path fill="none" d="M0 0h24v24H0z" />
                                        <path
                                            d="M7.828 11H20v2H7.828l5.364 5.364-1.414 1.414L4 12l7.778-7.778 1.414 1.414z"
                                            fill="rgba(255,255,255,1)" /></svg>
                                </a>
                                Gestion des rôles
                            </h2>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-auto ml-auto d-print-none">
                            <div class="d-flex align-items-center">
                                <a href="#" class="text-white" data-toggle="modal" data-target="#modal-create-role">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <line x1="12" y1="5" x2="12" y2="19" />
                                        <line x1="5" y1="12" x2="19" y2="12" />
                                    </svg>
                                    Ajouter un rôle
                                </a>

                                <span class="dropdown ml-5">
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
                                            Date
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
                    <div class="card">
                        <div class="table-responsive">
                            <table id="datatable" class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                    <tr>
                                        <th>Nom du rôle</th>
                                        <th>Description</th>
                                        <th class="not-exported">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($lims_role_all as $key=>$role)
                                    @if($role->is_active)
                                    <tr>
                                        <td class="w-1">
                                            <span>{{ $role->name }}</span>
                                        </td>
                                        <td class="td-truncate">
                                            <div class="text-truncate">
                                                {{ $role->description }}
                                            </div>
                                        </td>
                                        <td class="text-right">
                                                <button type="button" data-id="{{$role->id}}" data-name="{{$role->name}}" data-slug="{{$role->slug}}" data-description="{{$role->description}}" class="open-EditroleDialog btn btn-white btn-sm mt-1" data-toggle="modal" data-target="#modal-edit-role">
                                                    Modifier
                                                </button>
                                                <span class="dropdown">
                                                    <button class="btn btn-white btn-sm dropdown-toggle align-text-top"
                                                        data-boundary="viewport" data-toggle="dropdown">Actions</button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="{{ route('admin.role.permission', ['id' => $role->id]) }}">
                                                            Changer les permissions
                                                        </a>
                                                        @if(Auth::user()->is_admin == 2)
                                                         <a type="javascript:;" class="dropdown-item" onclick="deleteData({{$role->id}})" data-toggle="modal" data-target="#modal-delete-role">
                                                                Supprimer
                                                         </a>
                                                         @endif
                                                    </div>
                                                </span>
                                            </td>
                                    </tr>
                                    @else
      
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="modal-section">
                <div class="modal modal-blur fade" id="modal-create-role" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    {!! Form::open(['route' => 'admin.role.store', 'method' => 'post']) !!}
                        <div class="modal-content">
                        <form>
                            
                            <div class="modal-header">
                                <h5 class="modal-title">Ajouter un nouveau role</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <line x1="18" y1="6" x2="6" y2="18" />
                                        <line x1="6" y1="6" x2="18" y2="18" /></svg>
                                </button>
                            </div>
                            
                            <div class="modal-body bg-white">
                                <div class="row mb-3 align-items-end">
                                
                                    <div class="col-lg-12 mb-4">
                                        <label class="form-label ml-4">Nom</label>
                                            {{Form::text('name',null,array('required' => 'required', 'placeholder' => 'Saisissez le nom', 'class' => 'form-control'))}}
                                    </div>
                                    <div class="col-lg-12 mb-4">
                                        <label class="form-label ml-4">Slug</label>
                                            {{Form::text('slug',null,array('required' => 'required', 'placeholder' => 'Saisissez le nom', 'class' => 'form-control'))}}
                                    </div>
                                    <div class="col-lg-12 mb-1">
                                        <label class="form-label ml-4">Description</label>
                                            {{Form::textarea('description',null,array('rows'=> 1, 'placeholder' => 'Saisissez la description', 'class' => 'form-control'))}}
                                    </div>
                                
                                </div>
                                <input type="hidden" name="is_active" value="1">
                                <input type="hidden" name="guard_name" value="web">
                                <input type="submit" value="Ajouter" class="col-lg-12 mb-4 btn btn-primary">
                                
                            </div>
                            </form>
                            
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
                <div class="modal modal-blur fade" id="modal-edit-role" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    
                        <div class="modal-content">
                        
                            <div class="modal-header">
                                <h5 class="modal-title">Modifier un rôle</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <line x1="18" y1="6" x2="6" y2="18" />
                                        <line x1="6" y1="6" x2="18" y2="18" /></svg>
                                </button>
                            </div>
                            
                            <div class="modal-body bg-white">
                            <form role="form">
                                <div class="row mb-3 align-items-end">
                                    <input type="hidden" name="role_id">
                                    <div class="col-lg-12 mb-4">
                                        <label class="form-label ml-4">Nom</label>
                                        <input type="text" id="name_edit" class="form-control">
                                        <p class="errorName text-center alert alert-danger hidden"></p>
                                    </div>
                                    <div class="col-lg-12 mb-4">
                                        <label class="form-label ml-4">Slug</label>
                                        <input type="text" class="form-control" id="slug_edit">
                                        <p class="errorSlug text-center alert alert-danger hidden"></p>
                                    </div>
                                    <div class="col-lg-12 mb-1">
                                        <label class="form-label ml-4">Description</label>
                                        <input type="text" class="form-control" id="description_edit">
                                        <p class="errorDescription text-center alert alert-danger hidden"></p>
                                    </div>
                                </div>
                                </form>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-primary edit" style="width: 100%;">Modifier</button>
                                    
                                </div>
                            </div>
                            
                            
                            
                            
                        </div>
                    </div>
                </div>
                <div class="modal modal-blur fade" id="modal-delete-role" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                    <form action="" id="deleteForm" method="post">
                        <div class="modal-content">
                            
                            <div class="modal-body">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                                <input type="hidden" name="_method" value="DELETE">
                                <div class="modal-title">Êtes vous sure ?</div>
                                <div>Si vous continuez, vous perdrez toutes les données lié à ce rôle.</div>
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

        </div>

@endsection

@push('js')
<script type="text/javascript">

function deleteData(id)
     {
         var id = id;
         var url = '{{ route("admin.role.destroy", ":id") }}';
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
            $('#slug_edit').val($(this).data('slug'));
            $('#description_edit').val($(this).data('description'));
            id = $('#id_edit').val();
        });
        $('.modal-footer').on('click', '.edit', function() {
            $.ajax({
                type: 'PUT',
                url: 'admin/role/' + id,
                data: {
                    '_token': $('input[name=csrf-token]').val(),
                    'id': $("#id_edit").val(),
                    'name': $('#name_edit').val(),
                    'slug': $('#slug_edit').val(),
                    'description': $('#description_edit').val()
                },
                success: function(data) {
                    $('.errorName').addClass('hidden');
                    $('.errorSlug').addClass('hidden');
                    $('.errorDescription').addClass('hidden');
                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#modal-create-role').modal('show');
                            toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                        }, 500);
                        if (data.errors.name) {
                            $('.errorName').removeClass('hidden');
                            $('.errorName').text(data.errors.name);
                        }
                        if (data.errors.slug) {
                            $('.errorSlug').removeClass('hidden');
                            $('.errorSlug').text(data.errors.slug);
                        }
                        if (data.errors.description) {
                            $('.errorDescription').removeClass('hidden');
                            $('.errorDescription').text(data.errors.description);
                        }
                    } else {
                        toastr.success('Successfully updated Post!', 'Success Alert', {timeOut: 5000});
                        
                        
                    }
                }
            });
        });
</script>
@endpush