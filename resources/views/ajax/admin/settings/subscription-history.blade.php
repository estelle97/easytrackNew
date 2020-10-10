<div class="table-responsive">
    <table class="table card-table table-vcenter">
        <thead>
            <tr>
                <th>Abonnement</th>
                <th>Prix</th>
                <th colspan="2">Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach (Auth::user()->companies->first()->types as $type)

            @endforeach
            <tr>
                <td> {{$type->title}} </td>
                <td> {{$type->price}} FCFA</td>
                <td> {{date('M d, Y', strtotime($type->pivot->created_at))}} </td>
            </tr>
        </tbody>
    </table>
</div>
