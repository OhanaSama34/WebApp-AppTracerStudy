<?php if ($userdata['role_id'] == 1) { ?>
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        <div class="page-title">

            <h3 class="text-dark">DataChart</h3>
            <p class="text-subtitle text-muted">Manage all the progess of alumni</p>

        </div>
        <div class="card ">

            <div class="card-header">
                <h4 class="card-title text-center text-dark">Alumni Statistics</h4>
            </div>
            <div class="card-body card-responsive">
                <div id="chart"></div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var options = {
            chart: {
                type: 'bar',
                animations: {
                    enabled: true,
                    easing: 'easeinout',
                    speed: 1000,
                    animateGradually: {
                        enabled: true,
                        delay: 150
                    },
                    dynamicAnimation: {
                        enabled: true,
                        speed: 350
                    }
                },
                height: 400,
                zoom: {
                    enabled: true
                }
            },
            series: [{
                name: 'Alumni Data',
                data: [<?= $bekerja ?>, <?= $wirausaha ?>, <?= $belumbekerja ?>, <?= $kuliah ?>]
            }],
            xaxis: {
                categories: ['Work', 'Entrepreneur', 'Unemployment', 'Colleges'],
                tickPlacement: 'on'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        position: 'bottom',
                    }
                }
            },
            fill: {
                colors: '#e0b800'
            },
        }

        var chart = new ApexCharts(document.querySelector("#chart"), options);

        chart.render();
    </script>

<?php } else {
    $this->load->view('eror');
} ?>