<div class="table-responsive">
    <table class="table card-table table-vcenter">
        <thead>
            <tr>
                <th>Utilisateur</th>
                <th>Action</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach (App\Action::all()->where('company_id', Auth::user()->companies->first()->id)->reverse() as $action)
                <tr>
                    <td class="w-1">
                        <a href={{(Auth::user()->id == $action->initiator->id) ? route('admin.profile') : route('admin.user.show', $action->initiator->id)}}>
                            @if ($action->initiator->photo)
                                <span class="avatar"> <img src="{{asset($action->initiator->photo)}}" alt=""> </span>
                            @else
                                <span class="avatar"  style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name={{$action->initiator->name}}')"> </span>
                            @endif
                        </a>
                    </td>
                    <td class="td-truncate">
                        <div class="text-truncate">
                            {{$action->action}}
                        </div>
                    </td>
                    <td class="text-nowrap text-muted"> {{date('j-m-y à H:i', strtotime($action->created_at))}} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
