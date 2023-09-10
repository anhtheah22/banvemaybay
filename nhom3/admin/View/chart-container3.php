<div class="chart-title">Số vé của mỗi hãng máy bay</div>
<div class="chart">
    <div class="bar vietjet" data-value="230"></div>
    <div class="bar bomboo" data-value="80"></div>
    <div class="bar vnairline" data-value="320"></div>
    <div class="bar vtairline" data-value="120"></div>
</div>
<script>
    const bars = document.querySelectorAll(".bar");

    bars.forEach((bar) => {
        const value = bar.getAttribute("data-value");
        bar.style.height = `${value}px`;
    });
</script>