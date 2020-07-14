@extends('layouts.app')

@section('title', 'Gestion des ventes en temps réel')
@section('css')
    {{--<link href="{{ asset('vendor') }}/DataTables/datatables.css" rel="stylesheet">--}}
@endsection

@section('content')
    @include('layouts.headers.cards')
    
    <div class="container-fluid mt--7">

        <div class="card">
            <div class="card-header">
                LISTE DES VENTES EN TEMPS REEL
            </div>
            <div id="app" class="card-body">

                    {{--<example-component></example-component>--}}
                   {{-- <vente></vente>--}}

                <div class="table-responsive">
                    <table id="mytable" class="table table-sm">
                        <thead>
                        <tr>
                            <!--<th>id</th>-->
                            <th><strong>Pisteur</strong></th>
                            <th><strong>Producteur</strong></th>
                            <th ><strong>Cooperative</strong></th>
                            <th><strong>Produit</strong></th>
                            <th class="text-right"><strong>Poids (Kg)</strong></th>
                            <th class="text-right"><strong>Montant</strong></th>
                            <th><strong>Date</strong></th>
                            <th><strong>Action</strong></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($result as $item)
                        <tr >
                            <td>{{ $item->pisteur->nom.' '.$item->pisteur->prenom}}</td>
                            <td>{{ $item->producteur->nom.' '.$item->producteur->prenom }}</td>
                            <td>{{ $item->producteur->cooperative->libelle }}</td>
                            <td>{{ $item->produit->libelle}}</td>
                            <td class="text-right">{{ $item->poids }}</td>
                            <td class="text-right">{{ $item->montant}}</td>
                            <td>{{ $item->created_at->format('d-m-Y H:i:s')}}</td>
                            <td><a href="{!! route('maps', ['id'=>$item->id]) !!}" class="btn btn-sm btn-darker"><strong><i class="material-icons" style="color:green">my_location</i></strong>Localiser</a></td>
                        </tr>
                        @endforeach
                        <mavente></mavente>
                        </tbody>
                    </table>

                </div>

            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    {{--<script>
        var markers = @json($mesventes);
    </script>--}}

    {{--<script src="{{ asset('vendor') }}/DataTables/datatables.js"></script>

    <script>
        $(document).ready(function() {
            $('#mytable').DataTable({

                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                },

                "order": [[ 0, 'desc' ]]


            });
        } );
    </script>--}}
   {{-- <script>
        $(document).ready(function() {
            $('#mytable').find('tbody').prepend("<th scope=\"row\">3</th>\n" +
                "                                <td>ALBERT KOUADIO</td>\n" +
                "                                <td>OUEDRAOGO BOUKARY</td>\n" +
                "                                <td>OPAS DE COOPERATIVE</td>\n" +
                "                                <td>CACAO</td>\n" +
                "                                <td>800</td>\n" +
                "                                <td>200000</td>\n" +
                "                                <td>19/10/2020</td>\n" +
                "                                <td><button href=\"#\" class=\"btn btn-sm btn-darker\">Localiser</button></td>")
        } );
    </script>--}}
@endpush
