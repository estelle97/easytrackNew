
@foreach (App\Type::all() as $type)
    @if ($months == 'all')
        <tr>
            <td> {{$type->title}} </td>
            <td> {{$type->companies()->count()}} </td>
            <td> {{$type->companies()->wherePivot('is_active', 1)->count()}} </td>
            <td class="w-50">
                <div class="progress progress-xs">
                    <?php
                        $percentage = ($type->companies()->count() * 100) / $total
                    ?>
                    <div class="progress-bar bg-primary" style="width: {{$percentage}}%"></div>
                </div>
            </td>
        </tr>
    @else
        <tr>
            <td> {{$type->title}} </td>
            <td> {{$type->companies()->wherePivot('created_at', '>', \Carbon\Carbon::today()->subMonths(1))->count()}} </td>
            <td> {{$type->companies()->wherePivot('created_at', '>', \Carbon\Carbon::today()->subMonths(1))->wherePivot('is_active', 1)->count()}} </td>
            <td class="w-50">
                <div class="progress progress-xs">
                    <?php
                        $percentage = ($type->companies()->wherePivot('created_at', '>', \Carbon\Carbon::today()->subMonths(1))->count() * 100) / $total
                    ?>
                    <div class="progress-bar bg-primary" style="width: {{$percentage}}%"></div>
                </div>
            </td>
        </tr>
    @endif
@endforeach
