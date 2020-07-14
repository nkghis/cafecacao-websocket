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


                            <tr  v-for="item in ventes">
                                <td>{{ item.pisteur}}</td>
                                <td>{{ item.producteur }}</td>
                                <td>{{ item.cooperative }}</td>
                                <td>{{ item.produit}}</td>
                                <td class="text-right">{{ item.poids }}</td>
                                <td class="text-right">{{ item.montant}}</td>
                                <td>{{ item.date}}</td>
                                <td><a :href="'maps/'+item.id" class="btn btn-sm btn-darker"><strong><i class="material-icons" style="color:green">my_location</i></strong>Localiser</a></td>
                            </tr>

                            </tbody>
                        </table>

                </div>
</template>

<script>
    export default {


        data : function() {

            return {
                ventes: []
            }
        },


                created() {

                    axios.get('ventes').then((response) => {
                        this.ventes = response.data;


                    })
                    //console.log(ventes);
                },


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


