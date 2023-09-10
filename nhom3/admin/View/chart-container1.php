<canvas id="myCanvas" width="400" height="400"></canvas>

<script>
    var canvas = document.getElementById("myCanvas");
    var ctx = canvas.getContext("2d");
    var data = [230, 80, 320, 120];
    var colors = [
        "rgba(255, 99, 132, 0.6)",
        "rgba(54, 162, 235, 0.6)",
        "rgba(255, 206, 86, 0.6)",
        "rgba(75, 192, 192, 0.6)",
        "rgba(153, 102, 255, 0.6)",
    ];

    var total = 0;
    for (var i = 0; i < data.length; i++) {
        total += data[i];
    }

    var startAngle = 0;
    var endAngle = 0;
    for (var i = 0; i < data.length; i++) {
        var sliceAngle = (2 * Math.PI * data[i]) / total;
        endAngle = startAngle + sliceAngle;

        ctx.beginPath();
        ctx.fillStyle = colors[i];
        ctx.moveTo(canvas.width / 2, canvas.height / 2);
        ctx.arc(
            canvas.width / 2,
            canvas.height / 2,
            canvas.width / 2,
            startAngle,
            endAngle
        );
        ctx.lineTo(canvas.width / 2, canvas.height / 2);
        ctx.fill();

        startAngle = endAngle;
    }
</script>