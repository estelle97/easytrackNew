@extends('layouts.mainlayoutAdmin') @section('content')

<br><br><br><br><br><br><br><br><br><br><br>
<section>
    <div class="container-fluid">
        <a href="#" data-toggle="modal" data-target="#createModal" class="btn btn-info"><i class="dripicons-plus"></i> Ajouter un rôle </a>
    </div>
    <div class="table-responsive">
        <table id="role-table" class="table table-hover">
            <thead>
                <tr>
                    <th class="not-exported"></th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th class="not-exported">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lims_role_all as $key=>$role)
                @if($role->is_active)
                <tr>
                    <td>{{$key}}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->description }}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">
                                <li>
                                    <button type="button" data-id="{{$role->id}}" class="open-EditroleDialog btn btn-link" data-toggle="modal" data-target="#editModal"><i class="dripicons-document-edit"></i> Modifier
                                </button>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="{{ route('admin.role.permission', ['id' => $role->id]) }}" class="btn btn-link"><i class="dripicons-lock-open"></i> Modifier les permissions</a>
                                </li>
                                @if(Auth::user()->is_admin == 2)
                                {{ Form::open(['route' => ['admin.role.destroy', $role->id], 'method' => 'DELETE'] ) }}
                                <li>
                                    <button type="submit" class="btn btn-link" onclick="return confirmDelete()"><i class="dripicons-trash"></i> Supprimer</button>
                                </li>
                                {{ Form::close() }}
                                @endif
                            </ul>
                        </div>
                    </td>
                </tr>
                @else
      
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</section>

<div id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
        {!! Form::open(['route' => 'admin.role.store', 'method' => 'post']) !!}
            <div class="modal-header">
                <h5 id="exampleModalLabel" class="modal-title">Ajouter un rôle</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
            </div>
            <div class="modal-body">
                <p class="italic"><small>Les champs marqués par * sont obligatoires.</small></p>
                <form>
                    <div class="form-group">
                    <label>Nom *</label>
                    {{Form::text('name',null,array('required' => 'required', 'class' => 'form-control'))}}
                    </div>
                    <div class="form-group">
                    <label>Slug *</label>
                    {{Form::text('slug',null,array('required' => 'required', 'class' => 'form-control'))}}
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        {{Form::textarea('description',null,array('rows'=> 5, 'class' => 'form-control'))}}
                    </div>
                    <input type="hidden" name="is_active" value="1">
                    <input type="hidden" name="guard_name" value="web">
                    <input type="submit" value="Ajouter" class="btn btn-primary">
            	</form>
        	</div>
        {{ Form::close() }}
    	</div>
	</div>
</div>

<div id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
	<div role="document" class="modal-dialog">
		  <div class="modal-content">
		    {!! Form::open(['route' => ['admin.role.update',1], 'method' => 'put']) !!}
		    <div class="modal-header">
		      <h5 id="exampleModalLabel" class="modal-title">Modifier un rôle</h5>
		      <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
		    </div>
		    <div class="modal-body">
		      <p class="italic"><small>Les champs marqués par * sont obligatoires.</small></p>
		        <form>
		            <input type="hidden" name="role_id">
		            <div class="form-group">
		                <label>Nom *</label>
		                {{Form::text('name',null,array('required' => 'required', 'class' => 'form-control'))}}
		            </div>
                    <div class="form-group">
		                <label>Slug *</label>
		                {{Form::text('slug',null,array('required' => 'required', 'class' => 'form-control'))}}
		            </div>
		            <div class="form-group">
		                <label>Description</label>
		                {{Form::textarea('description',null,array('rows'=> 5, 'class' => 'form-control'))}}
		            </div>
		            <input type="submit" value="Modifier" class="btn btn-primary">
		        </form>
		    </div>
		    {{ Form::close() }}
		  </div>
	</div>
</div>

<script type="text/javascript">

	 function confirmDelete() {
        if (confirm("Etes-vous sûr de vouloir supprimer?")) {
            return true;
        }
        return false;
    }

    $(document).ready(function() {
    $('.open-EditroleDialog').on('click', function() {
        var url = "admin/role/"
        var id = $(this).data('id').toString();
        url = url.concat(id).concat("/edit");

        $.get(url, function(data) {
            $("input[name='name']").val(data['name']);
            $("input[name='slug']").val(data['slug']);
            $("textarea[name='description']").val(data['description']);
            $("input[name='role_id']").val(data['id']);
        });
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#role-table').DataTable( {
        "order": [],
        'language': {
            'lengthMenu': '_MENU_ {{trans("file.records per page")}}',
             "info":      '<small>{{trans("file.Showing")}} _START_ - _END_ (_TOTAL_)</small>',
            "search":  '{{trans("file.Search")}}',
            'paginate': {
                    'previous': '<i class="dripicons-chevron-left"></i>',
                    'next': '<i class="dripicons-chevron-right"></i>'
            }
        },
        'columnDefs': [
            {
                "orderable": false,
                'targets': [0, 3]
            },
            {
                'render': function(data, type, row, meta){
                    if(type === 'display'){
                        data = '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>';
                    }

                   return data;
                },
                'checkboxes': {
                   'selectRow': true,
                   'selectAllRender': '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>'
                },
                'targets': [0]
            }
        ],
        'select': { style: 'multi',  selector: 'td:first-child'},
        'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
        dom: '<"row"lfB>rtip',
        buttons: [
            {
                extend: 'pdf',
                text: '{{trans("file.PDF")}}',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible'
                },
            },
            {
                extend: 'csv',
                text: '{{trans("file.CSV")}}',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible'
                },
            },
            {
                extend: 'print',
                text: '{{trans("file.Print")}}',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible'
                },
            },
            {
                extend: 'colvis',
                text: '{{trans("file.Column visibility")}}',
                columns: ':gt(0)'
            },
        ],
    } );
});
</script>

@endsection