function gerarGrafico(dadosAlunoJSON) {
    google.charts.load("current", {
        packages: ["corechart"],
    });
    google.charts.setOnLoadCallback(drawChart);

    var aluno = JSON.parse(dadosAlunoJSON);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ["Task", "Hours per Day"],
            ["Matematica", 11],
            ["Portugues", 12],
            ["Ingles", 7],
            ["Ciencias", 2],
        ]);

        var options = {
            title: "Média alunos Instituto Federal do Paraná",
            height: 500,
            is3D: true,
        };

        var chart_div = document.getElementById("chart_div");
        var chart = new google.visualization.PieChart(
            document.getElementById("chart_div")
        );

        google.visualization.events.addListener(chart, "ready", function () {
            chart_div.innerHTML = "" + chart.getImageURI() + "";
        });
        chart.draw(data, options);

        gerarGraficoPDF(chart_div.innerHTML, aluno);
    }

    function gerarGraficoPDF(grafico, dados) {
        img = new Image();
        img.src = grafico;

        var generateData = function () {
            var result = [];
            var data = {
                nome: dados.nome,
                curso: dados.curso.nome,
                turma: dados.turma,
                napne: dados.napne,
                ano_ingresso: dados.ano_ingresso,
            };
            result.push(Object.assign({}, data));
            return result;
        };

        function createHeaders(keys) {
            var result = [];
            for (var i = 0; i < keys.length; i += 1) {
                result.push({
                    id: keys[i],
                    name: keys[i],
                    prompt: keys[i],
                    width: 65,
                    align: "center",
                    padding: 0,
                });
            }

            return result;
        }

        var headers = createHeaders([
            "nome",
            "curso",
            "turma",
            "napne",
            "ano_ingresso"
        ]);

        var doc = new jsPDF({
            putOnlyUsedFonts: true,
            orientation: "landscape",
        });
        doc.addImage(img, "JPEG", 15, 40, 180, 160);

        doc.table(1, 1, generateData(), headers, { autoSize: true });

        doc.save("table.pdf");
    }
}
