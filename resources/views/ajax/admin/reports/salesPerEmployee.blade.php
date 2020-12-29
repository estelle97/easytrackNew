@if ($site == 'all')
    @if ($period == 'all')
        @foreach (Auth::user()->companies->first()->sites as $site)
            @foreach ($site->employees as $emp)
                <tr>
                    <td>
                        @if ($emp->user->photo)
                            <span class="avatar avatar-md"  style="background-image: url('{{asset($emp->user->photo)}}')"> </span>
                        @else
                            <span class="avatar avatar-md"  style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name={{$emp->user->name}}')"> </span>
                        @endif
                    </td>
                    <td>
                        {{$emp->user->name}}
                    </td>
                    <td class="text-muted"> {{$emp->user->totalSales()}} </td>
                </tr>
            @endforeach
        @endforeach
    @else
        @foreach (Auth::user()->companies->first()->sites as $site)
            @foreach ($site->employees as $emp)
                <tr>
                    <td>
                        @if ($emp->user->photo)
                            <span class="avatar avatar-md"  style="background-image: url('{{asset($emp->user->photo)}}')"> </span>
                        @else
                            <span class="avatar avatar-md"  style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name={{$emp->user->name}}')"> </span>
                        @endif
                    </td>
                    <td>
                        {{$emp->user->name}}
                    </td>
                    <td class="text-muted"> {{$emp->user->totalSales($period)}} </td>
                </tr>
            @endforeach
        @endforeach
    @endif
@else
    @if ($period == 'all')
        @foreach (App\Site::find($site)->employees as $emp)
            <tr>
                <td>
                    @if ($emp->user->photo)
                        <span class="avatar avatar-md"  style="background-image: url('{{asset($emp->user->photo)}}')"> </span>
                    @else
                        <span class="avatar avatar-md"  style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name={{$emp->user->name}}')"> </span>
                    @endif
                </td>
                <td>
                    {{$emp->user->name}}
                </td>
                <td class="text-muted"> {{$emp->user->totalSales()}} </td>
            </tr>
        @endforeach
    @else
        @foreach (App\Site::find($site)->employees as $emp)
            <tr>
                <td>
                    @if ($emp->user->photo)
                        <span class="avatar avatar-md"  style="background-image: url('{{asset($emp->user->photo)}}')"> </span>
                    @else
                        <span class="avatar avatar-md"  style="background-image: url('https://ui-avatars.com/api/?background=E0F1FF&color=267FC9&name={{$emp->user->name}}')"> </span>
                    @endif
                </td>
                <td>
                    {{$emp->user->name}}
                </td>
                <td class="text-muted"> {{$emp->user->totalSales($period)}} </td>
            </tr>
        @endforeach
    @endif
@endif