let trace1 = {
    x: [],
    y: [],
    type: 'scatter'
};
let trace2 = {
    x: [],
    y: [],
    type: 'scatter'
};
let trace3 = {
    x: [],
    y: [],
    type: 'scatter'
};

var traceData;

const sin1Check = document.getElementById("sin1");
const sin2Check = document.getElementById("sin2");
const sin3Check = document.getElementById("sin3");


if (typeof (EventSource) !== "undefined") {
    var source = new EventSource("sse0.php");
    source.addEventListener("message", function (e) {
        // var result = JSON.parse(e.data)
        // document.getElementById("result").innerHTML = result.x + "<br>"; 
        document.getElementById("result").innerHTML = e.data + "<br>";
        addData(JSON.parse(e.data))
        drawGraph();
    }, false);
} else {
    document.getElementById("result").innerHTML = "Pokazili sme si to.";
}

function addData(data) {
    trace1["x"].push(data["x"]);
    trace1["y"].push((data["y1"]));
    trace2["x"].push(data["x"]);
    trace2["y"].push((data["y2"]));
    trace3["x"].push(data["x"]);
    trace3["y"].push((data["y3"]));
}

function drawGraph() {
    traceData = [];
    if (sin1Check.checked)
        traceData.push(trace2);
    if (sin2Check.checked)
        traceData.push(trace1);
    if (sin3Check.checked)
        traceData.push(trace3)
    Plotly.newPlot('myGraph', traceData);
}

$('#myForm').submit(function(e) {
    e.preventDefault();
    $.ajax({
        url: 'form.php',
        type: 'post',
        data: $('#myForm').serialize(),
        success: function() {}
    });
});