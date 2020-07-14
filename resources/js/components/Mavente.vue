<template>



</template>

<script>
    export default {



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


