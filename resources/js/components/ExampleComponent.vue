<template>
    <!--<div class="container">-->

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

                           <!-- <tr>
                               &lt;!&ndash; <th scope="row">1</th>&ndash;&gt;
                                <td>{{vente.producteur}}</td>
                                <td><button href="#" class="btn btn-sm btn-darker">Localiser</button></td>
                                &lt;!&ndash;<td>KOUADIO ALPHONSE</td>
                                <td>JEUNESSE ZATTRY</td>
                                <td>CACAO</td>
                                <td>400</td>
                                <td>100000</td>
                                <td>19/10/2020</td>&ndash;&gt;

                            </tr>-->
                           <!-- <tr>
                                <th scope="row">1</th>
                                <td>JEAN MARC MESSI</td>
                                <td>KOUADIO ALPHONSE</td>
                                <td>JEUNESSE ZATTRY</td>
                                <td>CACAO</td>
                                <td>400</td>
                                <td>100000</td>
                                <td>19/10/2020</td>
                                <td><button href="#" class="btn btn-sm btn-darker">Localiser</button></td>
                            </tr>-->
                            <!--<tr>
                                <th scope="row">2</th>
                                <td>KOUASSI KOFFI MICHEL</td>
                                <td>OUEDRAOGO BOUKARY</td>
                                <td>OPAS DE COOPERATIVE</td>
                                <td>CACAO</td>
                                <td>800</td>
                                <td>200000</td>
                                <td>19/10/2020</td>
                                <td><button href="#" class="btn btn-sm btn-darker">Localiser</button></td>
                            </tr>-->
                           <!-- <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>-->
                            </tbody>
                        </table>

                </div>
</template>

<script>
    export default {

/*
        data() {

            return {
                vente: []
            }
        },


        created() {

            this.listenForVente();
        },

        methods: {

            listenForVente(){
                Echo.channel('channel-vente')
                    .listen('VenteEvent', (e) => {

                        //this.vente = e;
                        this.vente.push(e);
                        console.log(e);
                    });
            }


        },*/


        mounted() {

            /*listenForVente()
            {*/
                Echo.channel('channel-vente')
                    .listen('VenteEvent', (e) => {



                        this.vente = e;
                        //this.vente.push(e);

                      /*  var table = document.getElementById('mytable');*/
                        var ip = "192.168.2.71";
                        var ports = "8100"
                        var path = "maps/"
                        var url = ip + ports + path;
                        $('#mytable').find('tbody').prepend(
                            "<tr>" +
                                /*"<td>"+e.id+"</td>\n" +*/
                                "<td>"+e.pisteur+"</td>\n" +
                                "<td>"+e.producteur+"</td>\n" +
                                "<td>"+e.cooperative+"</td>\n" +
                                "<td>"+e.produit+"</td>\n" +
                                "<td class='text-right'>"+e.poids+"</td>\n" +
                                "<td class='text-right'>"+e.montant+"</td>\n" +
                                "<td>"+e.date+"</td>\n" +
                                "<td><a href=\""+path+e.id+"\" class=\"btn btn-sm btn-darker\"><strong><i class=\"material-icons\" style=\"color: green\">my_location</i>Localiser</strong></a>" + "</td>" +
                            "</tr>"
                        )
                       /* console.log('Component mounted.')
                        console.log(e);*/

                    });
            /*}*/



        }
    }
</script>


