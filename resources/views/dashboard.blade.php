@extends('layouts.app')

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

                    <example-component></example-component>

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
