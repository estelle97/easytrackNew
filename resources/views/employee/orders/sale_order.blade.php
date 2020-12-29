<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Easytrak - Application pour la gestion de stock</title>
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
        <meta name="msapplication-TileColor" content="#206bc4" />
        <meta name="theme-color" content="#206bc4" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="mobile-web-app-capable" content="yes" />
        <meta name="HandheldFriendly" content="True" />
        <meta name="MobileOptimized" content="320" />
        <meta name="robots" content="noindex,nofollow,noarchive" />
        <link rel="icon" href="../../assets/static/favicon.png" type="image/png" />
        <link rel="shortcut icon" href="../../assets/static/favicon.png" type="image/png" />

        <style type="text/css">
            * {
                font-size: 14px;
                line-height: 24px;
                font-family: 'Ubuntu', sans-serif;
            }

            .btn {
                padding: 7px 10px;
                text-decoration: none;
                border: none;
                display: block;
                text-align: center;
                margin: 7px;
                cursor: pointer;
            }

            .btn-info {
                background-color: #999;
                color: #FFF;
            }

            .btn-primary {
                background-color: #267FC9;
                color: #FFF;
                width: 100%;
            }

            td,
            th,
            tr,
            table {
                border-collapse: collapse;
            }

            tr {
                border-bottom: 1px dotted #ddd;
            }

            td,
            th {
                padding: 7px 0;
                width: 50%;
            }

            table {
                width: 100%;
            }

            tfoot tr th:first-child {
                text-align: left;
            }

            .centered {
                text-align: center;
                align-content: center;
            }

            small {
                font-size: 11px;
            }

            .hidden-print {
               margin-top: 2rem;
            }

            @media print {
                * {
                    font-size: 12px;
                    line-height: 20px;
                }

                td,
                th {
                    padding: 5px 0;
                }

                .hidden-print {
                    display: none !important;
                }

                @page {
                    margin: 0;
                }

                body {
                    margin: 0.5cm;
                    margin-bottom: 1.6cm;
                }
            }

        </style>
    </head>

    <body>

        <div style="max-width:400px;margin:0 auto">
            <div id="receipt-data">
                <div class="centered">
                    <img src={{asset("template/assets/static/logo.svg")}} height="30" width="140"
                        style="margin:10px 0;filter: brightness(0);">

                    <p>Addresse: {{$sale->site->street}} - {{$sale->site->town}}, Cameroun
                        <br>Phone Number: 691236930
                    </p>
                </div>
                <p class="centered">
                    Date: {{$sale->created_at}}<br>
                    Reference: S0-{{$sale->code}}
                </p>
                <table>
                    <tbody>
                        <?php $total = 0 ?>
                        @foreach ($sale->products as $prod)
                            <tr>
                                <td colspan="2"> {{$prod->name}} <br>{{$prod->pivot->qty}} x {{$prod->pivot->price}}</td>
                                <td style="text-align:right;vertical-align:bottom"> {{$prod->pivot->qty * $prod->pivot->price}} </td>
                            </tr>
                            <?php $total += $prod->pivot->qty * $prod->pivot->price ?>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2">Livraison</th>
                            <th style="text-align:right">{{($sale->shipping_cost ?? 0)}}</th>
                        </tr>
                        <tr>
                            <th colspan="2">Total</th>
                            <th style="text-align:right">{{$total + $sale->shipping_cost}}</th>
                        </tr>
                    </tfoot>
                </table>
                <table>
                    <tbody>
                        <tr style="background-color:#ddd;">
                            <td style="padding: 5px;width:30%">Payé par: {{$sale->paying_method}} </td>
                            <td style="text-align:right; padding: 5px;width:40%">Montant: {{$total+$sale->shipping_cost}} </td>
                        </tr>
                        <tr>
                            <td class="centered" colspan="3"> {{($sale->sale_note ?? "Merci d'avoir fait vos achats chez nous")}} </td>
                        </tr>
                    </tbody>
                </table>

            </div>

            <div class="hidden-print">
                <table>
                    <tbody>
                        <tr>
                            <td><a href={{str_replace(url('/'), '', url()->previous())}} class="btn btn-info"><i class="fa fa-arrow-left"></i>
                                Retour</a>
                            </td>
                            @if(Auth::user()->may('print_sale_orders'))
                                <td><button onclick="window.print();" class="btn btn-primary"><i class="dripicons-print"></i>
                                    imprimer</button>
                                </td>
                            @endif

                        </tr>
                    </tbody>
                </table>
                <br>
            </div>
        </div>
    </body>
</html>

