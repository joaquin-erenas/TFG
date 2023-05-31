<div id="dashboardVentana">
    <div class="appInfo">
        <h2>Dashboard</h2>
        <p>05 Apr 2023, Wednesday</p>
    </div>
    <div class="appContainer">
        <div class="container">
            <div class="row">
                <div class="col-12 shadow-sm">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h3>Welcome back root !</h3>
                                <p>You've learned 80% of your goal this week!</p>
                            </div>
                            <div class="col">
                                Column
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 shadow-sm">
                    <h2 class="h6 font-weight-bold text-center mb-4">Overall progress</h2>
                    <!-- Progress bar 1 -->
                    <div class="progress mx-auto" data-value='80'>
                        <span class="progress-left">
                            <span class="progress-bar border-success"></span>
                        </span>
                        <span class="progress-right">
                            <span class="progress-bar border-success"></span>
                        </span>
                        <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                            <div class="h2 font-weight-bold">80<sup class="small">%</sup></div>
                        </div>
                    </div>
                    <!-- END -->

                    <!-- Demo info -->
                    <div class="row text-center mt-4">
                        <div class="col-6 border-right">
                            <div class="h4 font-weight-bold mb-0">28%</div><span class="small text-gray">Last week</span>
                        </div>
                        <div class="col-6">
                            <div class="h4 font-weight-bold mb-0">60%</div><span class="small text-gray">Last month</span>
                        </div>
                    </div>
                    <!-- END -->


                </div>
                <div class="col-6 shadow-sm">
                    <div class="seccionVentananaInfo">
                        <h4>Latest Developments</h4>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
</div>


<script>
    $(function() {

        $(".progress").each(function() {

            var value = $(this).attr('data-value');
            var left = $(this).find('.progress-left .progress-bar');
            var right = $(this).find('.progress-right .progress-bar');

            if (value > 0) {
                if (value <= 50) {
                    right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
                } else {
                    right.css('transform', 'rotate(180deg)')
                    left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
                }
            }

        })

        function percentageToDegrees(percentage) {

            return percentage / 100 * 360

        }

    });
</script>