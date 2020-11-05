@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script src='https://cdn.jsdelivr.net/lodash/4.17.2/lodash.min.js'></script>
<script type="text/javascript">
    var id = $('#event_id').val();
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

        if (!valida){
            //$("#formQuestion").submit();
            $("#store_survey_submit").css('display', 'none');
            $("#store_survey_loader").css('display', 'block');
            var route = "https://mybusinessacademypro.com/academia/settings/event";
            var parametros = $('#formQuestion').serialize();
            $.ajax({
                url:route,
                type:'POST',
                data:  parametros,
                success:function(ans){
                    $("#store_survey_loader").css('display', 'none');
                    $("#store_survey_submit").css('display', 'block');
                    if (ans == true){
                        $("#msj-error-ajax").css('display', 'none');
                        $("#modal-settings-survey").modal("hide");
                        $("#option-modal-settings").modal("hide");
                        $("#msj-success-text").html("La encuesta ha sido agregada con éxito");
                        $("#msj-success-ajax").css('display', 'block');
                        refreshMenu();
                        refreshSurveySection(false);
                    }else{
                        $("#msj-success-ajax").css('display', 'none');
                        $("#modal-settings-survey").modal("hide");
                        $("#option-modal-settings").modal("hide");
                        $("#msj-error-text").html("Ya posee una encuestra creada");
                        $("#msj-error-ajax").css('display', 'block');
                    }
                }
            });
        }else{
            msjError = '<p class="msjError" style="color: red">No pude enviar campos vacios!</>';
            $("#list_question").append(msjError);
        }
    });

    removeQuestion = function (q) {
        $('#content_' + q).remove()
    }
    
    function loadCharts() {
        $.ajax({
            url: 'https://mybusinessacademypro.com/academia/survey/statistics',
            method: 'POST',
            data: {
                id: id,
                _token: $('input[name="_token"]').val()
            }
        }).done(function (res) {
            res.forEach(value => {
                /*console.log("ID: "+value["id"]);
                console.log("Pregunta: "+value["question"]);
                console.log("Cantidad de Opciones: "+value["options_count"]);
                console.log("Opciones: "+value["options"]);
                console.log("Respuestas: "+value["responses"]);*/
            
                var ctx = document.getElementById('survey-chart-'+value["id"]).getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        //labels: responses,
                        labels: value["options"],
                        datasets: [{
                            label: 'Respuestas de la encuesta',
                            data: value["responses"],
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

            });
        });
    }
    
    if ($("#type_user").val() == 2){
        loadCharts();
    }
    

</script>
@endpush
