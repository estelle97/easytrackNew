@if ($site == 'all')
    @if ($period == 'all')
        @foreach (Auth::user()->companies->first()->sites->first()->products->load('category')->unique("category_id") as $cats)
            <tr>
                <td>
                    {{$cats->category->name}}
                </td>
                <td class="text-muted">
                    <?php $totalSales = 0 ?>
                    @foreach (Auth::user()->companies->first()->sites as $site)
                        @foreach ($site->sales as $sale)
                            <?php $totalSales += $sale->products->where('category_id', $cats->category->id)->sum('pivot.qty') ?>
                        @endforeach
                    @endforeach

                    {{$totalSales}} 
                </td>
                <td class="text-muted"> {{Auth::user()->companies->first()->totalSales(null, $cats->category->id)}} Fcfa</td>
                <td class="text-muted"> {{ (Auth::user()->companies->first()->totalSales() != 0) ? Auth::user()->companies->first()->totalSales(null, $cats->category_id)  * 100 / Auth::user()->companies->first()->totalSales() : 0 }} %</td>
                <td class="text-right">
                    <div class="chart-sparkline" id="sparkline-9" style="display: none;">17, 24, 20, 10, 5,
                        1, 4, 18, 13</div><svg class="peity" height="40" width="64">
                        <polygon fill="#d2e1f3"
                            points="0 39 0 12.083333333333332 8 1 16 7.333333333333332 24 23.166666666666664 32 31.083333333333332 40 37.416666666666664 48 32.66666666666667 56 10.5 64 18.416666666666668 64 39">
                        </polygon>
                        <polyline fill="none"
                            points="0 12.083333333333332 8 1 16 7.333333333333332 24 23.166666666666664 32 31.083333333333332 40 37.416666666666664 48 32.66666666666667 56 10.5 64 18.416666666666668"
                            stroke="#206bc4" stroke-width="2" stroke-linecap="square"></polyline>
                    </svg>
                </td>
            </tr>
        @endforeach 
    @else
        @foreach (Auth::user()->companies->first()->sites->first()->products->load('category')->unique("category_id") as $cats)
            <tr>
                <td>
                    {{$cats->category->name}}
                </td>
                <td class="text-muted">
                    <?php $totalSales = 0 ?>
                    @foreach (Auth::user()->companies->first()->sites as $site)
                        @foreach ($site->sales as $sale)
                            <?php $totalSales += $sale->products->where('category_id', $cats->category->id)->sum('pivot.qty') ?>
                        @endforeach
                    @endforeach

                    {{$totalSales}} 
                </td>
                <td class="text-muted"> {{Auth::user()->companies->first()->totalSales($period, $cats->category->id)}} Fcfa</td>
                <td class="text-muted"> {{ (Auth::user()->companies->first()->totalSales() != 0) ? Auth::user()->companies->first()->totalSales($period, $cats->category_id)  * 100 / Auth::user()->companies->first()->totalSales() : 0 }} %</td>
                <td class="text-right">
                    <div class="chart-sparkline" id="sparkline-9" style="display: none;">17, 24, 20, 10, 5,
                        1, 4, 18, 13</div><svg class="peity" height="40" width="64">
                        <polygon fill="#d2e1f3"
                            points="0 39 0 12.083333333333332 8 1 16 7.333333333333332 24 23.166666666666664 32 31.083333333333332 40 37.416666666666664 48 32.66666666666667 56 10.5 64 18.416666666666668 64 39">
                        </polygon>
                        <polyline fill="none"
                            points="0 12.083333333333332 8 1 16 7.333333333333332 24 23.166666666666664 32 31.083333333333332 40 37.416666666666664 48 32.66666666666667 56 10.5 64 18.416666666666668"
                            stroke="#206bc4" stroke-width="2" stroke-linecap="square"></polyline>
                    </svg>
                </td>
            </tr>
        @endforeach 
    @endif
@else
    @if ($period == 'all')
        @foreach (App\Site::find($site)->products->load('category')->unique("category_id") as $cats)
            <tr>
                <td>
                    {{$cats->category->name}}
                </td>
                <td class="text-muted">
                    <?php $totalSales = 0 ?>
                    @foreach (App\Site::find($site)->sales as $sale)
                        <?php $totalSales += $sale->products->where('category_id', $cats->category->id)->sum('pivot.qty') ?>
                    @endforeach

                    {{$totalSales}} 
                </td>
                <td class="text-muted"> {{App\Site::find($site)->totalSales(null, $cats->category->id)}} Fcfa</td>
                <td class="text-muted"> {{ (App\Site::find($site)->totalSales() != 0) ? App\Site::find($site)->totalSales(null, $cats->category_id)  * 100 / App\Site::find($site)->totalSales() : 0}} %</td>
                <td class="text-right">
                    <div class="chart-sparkline" id="sparkline-9" style="display: none;">17, 24, 20, 10, 5,
                        1, 4, 18, 13</div><svg class="peity" height="40" width="64">
                        <polygon fill="#d2e1f3"
                            points="0 39 0 12.083333333333332 8 1 16 7.333333333333332 24 23.166666666666664 32 31.083333333333332 40 37.416666666666664 48 32.66666666666667 56 10.5 64 18.416666666666668 64 39">
                        </polygon>
                        <polyline fill="none"
                            points="0 12.083333333333332 8 1 16 7.333333333333332 24 23.166666666666664 32 31.083333333333332 40 37.416666666666664 48 32.66666666666667 56 10.5 64 18.416666666666668"
                            stroke="#206bc4" stroke-width="2" stroke-linecap="square"></polyline>
                    </svg>
                </td>
            </tr>
        @endforeach    
    @else
        @foreach (App\Site::find($site)->products->load('category')->unique("category_id") as $cats)
            <tr>
                <td>
                    {{$cats->category->name}}
                </td>
                <td class="text-muted">
                    <?php $totalSales = 0 ?>
                    @foreach (App\Site::find($site)->sales as $sale)
                        <?php $totalSales += $sale->products->where('category_id', $cats->category->id)->sum('pivot.qty') ?>
                    @endforeach

                    {{$totalSales}} 
                </td>
                <td class="text-muted"> {{App\Site::find($site)->totalSales($period, $cats->category->id)}} Fcfa</td>
                <td class="text-muted"> {{ (App\Site::find($site)->totalSales() != 0) ? App\Site::find($site)->totalSales($period, $cats->category_id)  * 100 / App\Site::find($site)->totalSales() : 0 }} %</td>
                <td class="text-right">
                    <div class="chart-sparkline" id="sparkline-9" style="display: none;">17, 24, 20, 10, 5,
                        1, 4, 18, 13</div><svg class="peity" height="40" width="64">
                        <polygon fill="#d2e1f3"
                            points="0 39 0 12.083333333333332 8 1 16 7.333333333333332 24 23.166666666666664 32 31.083333333333332 40 37.416666666666664 48 32.66666666666667 56 10.5 64 18.416666666666668 64 39">
                        </polygon>
                        <polyline fill="none"
                            points="0 12.083333333333332 8 1 16 7.333333333333332 24 23.166666666666664 32 31.083333333333332 40 37.416666666666664 48 32.66666666666667 56 10.5 64 18.416666666666668"
                            stroke="#206bc4" stroke-width="2" stroke-linecap="square"></polyline>
                    </svg>
                </td>
            </tr>
        @endforeach
    @endif
@endif