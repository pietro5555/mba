 $('document').ready(function () {

     chartVentas()

     chartUsuario()

 })

 

 function muestraReloj() {

  var fechaHora = new Date();

  var horas = fechaHora.getHours();

  var minutos = fechaHora.getMinutes();

  var segundos = fechaHora.getSeconds();



  if(horas < 10) { horas = '0' + horas; }

  if(minutos < 10) { minutos = '0' + minutos; }

  if(segundos < 10) { segundos = '0' + segundos; }



  document.getElementById("reloj").innerHTML = horas+':'+minutos+':'+segundos;

}


/**
* Permite Cargar la grafica de ventas 
*/
 function chartVentas() {

    let url = 'admin/chart/ventas'

    let ventas = []

    let ganancias = []

    $.get(url, function (response) {

        let data = JSON.parse(response)

        data.forEach(element => {

            ventas.push(element.total)
             
        });
      

        data.forEach(element => {

            ganancias.push(element.ganancia)
           
        });
       
        var ctx = document.getElementById("salesChart").getContext('2d');

        var arearChar = new Chart(ctx, {

            type: 'bar',

            data: {

                datasets: [
                    {
                    label: 'Ventas Mensuales',
                    data: ventas,
                    backgroundColor:[
                        '#00a65a',
                        '#00a65a',
                        '#00a65a',
                        '#00a65a',
                        '#00a65a',
                        '#00a65a',
                        '#00a65a',
                        '#00a65a',
                        '#00a65a',
                        '#00a65a',
                        '#00a65a',
                        '#00a65a'
                    ]
                },
                {
                    label: 'Ganancias Mensuales',
                    data: ganancias,
                    backgroundColor:[
                        '#00bcd5',
                        '#00bcd5',
                        '#00bcd5',
                        '#00bcd5',
                        '#00bcd5',
                        '#00bcd5',
                        '#00bcd5',
                        '#00bcd5',
                        '#00bcd5',
                        '#00bcd5',
                        '#00bcd5',
                        '#00bcd5',
                    ]
                }
            ],

                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],

            }

        })

    })

}


   /**
    * Permite cargar la grafica de rangos
    */ 
 function chartRangos() {

    let url = 'admin/chart/rangos'

    let labeles = []

    let colores = []

    let valores = []

    $.get(url, function (response) {

        let data = JSON.parse(response)

        data.forEach(element => {

            labeles.push(element.name)

            valores.push(element.cantidad)

            colores.push('rgb(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ')')

        });

        var ctx = document.getElementById("chart_rangos").getContext('2d'); 

        var myDoughnutChart = new Chart(ctx, {

            type: 'doughnut',

            data: {

                datasets: [{

                    data: valores,

                    backgroundColor: colores

                }],

                labels: labeles

            },

            options: {

                cutoutPercentage: 50

            }

        });

    })

 }


 /**
  * Permite cargar la grafica de los usuarios activos
  */
 function chartUsuario() {

     let url = 'admin/chart/usuarios'

     $.get(url, function (response) {

         let data = JSON.parse(response)
         $('#acti').text(data.activos)
         $('#ina').text(data.inactivos)

         var ctx = document.getElementById("chart_usuarios").getContext('2d');

         var myChart = new Chart(ctx, {

             type: 'doughnut',

             data: {

                 labels: ["Activos", "Inactivos"],

                 datasets: [{

                     label: 'N° de Usuarios',

                     data: [data.activos, data.inactivos],

                     backgroundColor: [

                         '#00a65a',

                         'rgba(255, 99, 132)',

                     ],

                     borderColor: [

                         '#00a65a',

                         'rgba(255,99,132,1)',

                     ],

                     borderWidth: 1

                 }]

             },

            //  options: {

            //      scales: {

            //          yAxes: [{

            //              ticks: {

            //                  beginAtZero: true

            //              }

            //          }]

            //      },

            //  }

         });

     })

 }