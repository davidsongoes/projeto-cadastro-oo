<?php
include(__DIR__.'/../layout/menu.php');
use models\Chamado;
?>

<script type="text/javascript">
    google.load('visualization', '1', {'packages':['corechart']});
    google.setOnLoadCallback(function(){
        var json_text = $.ajax({url: '<?php Chamado::montaGrafico()?>', dataType:"json", async: false}).responseText;
        var json = eval("(" + json_text + ")");
        var dados = new google.visualization.DataTable(json.dados);

        var chart = new google.visualization.LineChart(document.getElementById('area_grafico'));
        chart.draw(dados, json.config);
    });
</script>
<!--<div id="chart_div" style="width: 900px; height: 500px;"></div>-->


<div id="area_grafico"></div>