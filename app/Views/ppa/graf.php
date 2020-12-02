<h2>Graf Maklumbalas Aduan Pelanggan</h2>

<p>
    <a href="https://www.chartjs.org/docs/latest/axes/">Axis</a>
</p>

<script src="<?php echo base_url('assets/vendor/chartjs/dist/Chart.min.js'); ?>"></script>

<canvas id="myChart" style="width:2000px; height:1000px;"></canvas>
<script>
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'horizontalBar',
        data: {
            labels: [
                'Aduan Dalam Tindakan',
                'Aduan Diselesaikan',
                'Aduan Diterima/Baru'
            ],
            datasets: [{
                label: '<?php echo $tahun[0]; ?>',
                data: [
                    <?php echo $dalam[0]; ?>,
                    <?php echo $selesai[0]; ?>,
                    <?php echo $terima[0]; ?>
                ],
                backgroundColor: [
                    '#ffcc00',
                    '#ffcc00',
                    '#ffcc00',
                ],
                borderWidth: 1
            }, {
                label: '<?php echo $tahun[1]; ?>',
                data: [
                    <?php echo $dalam[1]; ?>,
                    <?php echo $selesai[1]; ?>,
                    <?php echo $terima[1]; ?>
                ],
                backgroundColor: [
                    '#000088',
                    '#000088',
                    '#000088',
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
                }],
                xAxis: [{
                    ticks: {
                        beginAtZero: true
                    }
                }],
            }
        }
    });
</script>
