@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script src='https://cdn.jsdelivr.net/lodash/4.17.2/lodash.min.js'></script>
<script type="text/javascript">
    var id = $('input[name="survey_id"]').val()
    console.log(id);
    var responses = [];
    var values = [];
    let nextinput = 1;
    $('.addResponse').on('click', function (e) {
        e.preventDefault();
        nextinput++;
        campo = '<div id="content_' + nextinput + '" class="form-group"> <label>Escribe la respuesta #' +
            nextinput +
            '</label> <div class="contentQuestion"> <textarea required class="form-control mr-2 fieldSurvey" id="r' +
            nextinput + '"&nbsp; name="r' + nextinput +
            '"&nbsp; ></textarea> <span> <a title="Eliminar pregunta"  class="btn btn-danger btn-circle " onclick="removeQuestion(' +
            nextinput + ')"><i class="fa fa-ban"></i></a> </span> </div> </div>';
        $(".msjError").remove();
        $("#list_question").append(campo);

    });

    $('.sendFormQuestion').on('click', function (e) {
        e.preventDefault();
        var questionArray = [];
        let valida = false;
        let elementos = document.querySelectorAll(".fieldSurvey")

        elementos.forEach((elemento) => {
            questionArray.push(elemento.value)
            valida = (elemento.value === "") ? true : false
        })
        $(".questionsArray").val(questionArray)

        if (!valida)
            $("#formQuestion").submit();
        else
            msjError = '<p class="msjError" style="color: red">No pude enviar campos vacios!</>';
        $("#list_question").append(msjError);
    });

    removeQuestion = function (q) {
        $('#content_' + q).remove()
    }

    $.ajax({
        url: '/survey/statistics',
        method: 'POST',
        data: {
            id: id,
            _token: $('input[name="_token"]').val()
        }

    }).done(function (res) {
        console.log(res);
        var array = JSON.parse(res);
        var resultadito = Object.entries(_.groupBy(array, 'response')).map(([key, value]) => {
            return {
                'name': key,
                'values': value
            }
        })
        for (var x = 0; x < resultadito.length; x++) {
            responses.push(resultadito[x].name);
            values.push(resultadito[x].values.length);
        }
        generargrafica();
    });

    function generargrafica() {
        /*CHART*/
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: responses,
                datasets: [{
                    label: 'Respuestas de la encuesta',
                    data: values,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

    }

</script>
@endpush
