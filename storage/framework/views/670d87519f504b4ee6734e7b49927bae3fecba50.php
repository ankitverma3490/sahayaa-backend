<?php $__env->startSection('content'); ?>
    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
            <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <h5 class="text-dark font-weight-bold my-1 mr-5">
                            Dashboard </h5>
                    </div>
                </div>
                <?php echo $__env->make('admin.elements.quick_links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <div class="d-flex flex-column-fluid">
            <div class=" container ">
                <div class="row">

                    <div class="col-lg-3">
                        <a href="<?php echo e(route('products.index')); ?>"
                            class="card card-custom bg-dark bg-hover-state-info card-stretch gutter-b">
                            <div class="card-body">
                                <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">

                                    <i class="fas fa-box product-icon" style="color: white;  font-size: 30px;"></i>
                                </span>
                                <div class="card-title font-weight-bolder text-light font-size-h2 mb-0 mt-6 d-block">
                                    <?php echo e($totalProducts); ?>

                                </div>
                                <div class="font-weight-bold text-light  font-size-sm">Total Products</div>

                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3">
                        <a href="<?php echo e(route('users.index')); ?>"
                            class="card card-custom bg-primary bg-hover-state-success card-stretch gutter-b">
                            <div class="card-body">
                                <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                    <i class="fas fa-users product-icon" style="color: white; font-size: 30px;"></i> 
                                </span>
                                <div class="card-title font-weight-bolder text-light font-size-h2 mb-0 mt-6 d-block">
                                    <?php echo e($totalUsers); ?>

                                </div>
                                <div class="font-weight-bold text-light font-size-sm">Total Customers</div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3">
                        <a href="<?php echo e(route('orders.index')); ?>"
                            class="card card-custom bg-info bg-hover-state-info card-stretch gutter-b">
                            <div class="card-body">
                                <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                    <i class="fa fa-shopping-basket" style="color: white;  font-size: 30px;"></i>



                                </span>
                                <div class="card-title font-weight-bolder text-light font-size-h2 mb-0 mt-6 d-block">
                                    <?php echo e($totalOrders); ?>

                                </div>
                                <div class="font-weight-bold text-light  font-size-sm">Total Orders</div>

                            </div>
                        </a>
                    </div>


                    <div class="col-lg-3">
                        <a href="<?php echo e(route('transactions.index')); ?>"
                            class="card card-custom bg-dark bg-hover-state-info card-stretch gutter-b">
                            <div class="card-body">
                                <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">

                                    <i class="fas fa-money-bill-wave transaction-icon"
                                        style="color: white;  font-size: 30px;"></i>
                                </span>
                                <div class="card-title font-weight-bolder text-light font-size-h2 mb-0 mt-6 d-block">
                                    <?php echo e($totalTransactions); ?>

                                </div>
                                <div class="font-weight-bold text-light  font-size-sm">Total Transactions</div>

                            </div>
                        </a>
                    </div>


                    <div class="col-lg-3">
                        <a href="<?php echo e(route('enquiries.index')); ?>"
                            class="card card-custom bg-danger bg-hover-state-info card-stretch gutter-b">
                            <div class="card-body">
                                <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                    <i class="fas fa-question-circle inquiry-icon"
                                        style="color: white;  font-size: 30px;"></i>
                                </span>
                                <div class="card-title font-weight-bolder text-light font-size-h2 mb-0 mt-6 d-block">
                                    <?php echo e($totalEnquiries); ?>

                                </div>
                                <div class="font-weight-bold text-light  font-size-sm">Total Enquires</div>

                            </div>
                        </a>
                    </div>

                  
                    

                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="row supportSortable draggable-zone">
                            <div class="col-xl-12">

                                <div style="box-shadow:none;" class="card card-custom  gutter-b card-stretch gutter-b">
                                    <div class="card-header h-auto border-0">
                                        <div class="card-title py-5">
                                            <h3 class="card-label">
                                                <span class="d-block text-dark font-weight-bolder">Products & Users
                                                </span>
                                                <span class="d-block text-muted mt-2 font-size-sm"></span>
                                            </h3>
                                        </div>
                                        <div class="ml-auto mt-6 leadStartDate" style="display:none;">
                                            <form action="<?php echo e(route('dashboard.statistics')); ?>" method="GET" class="form-inline" autocomplete="off">
                                                <div class="form-group">
                                                    <?php echo e(Form::text('start_date', isset($start_date) ? $start_date : '', ['class' => 'form-control form-control-solid form-control-lg datepicker-input ' . ($errors->has('start_date') ? 'is-invalid' : ''), 'placeholder' => trans('Start date'), 'id' => 'datepickerfrom'])); ?>

                                                    <div class="invalid-feedback"><?php echo $errors->first('start_date'); ?></div>
                                                </div>
                                                <div class="form-group leadEndDate mx-3" style="display:none;">
                                                    <?php echo e(Form::text('end_date', isset($end_date) ? $end_date : '', ['class' => 'form-control form-control-solid form-control-lg datepicker-input ' . ($errors->has('end_date') ? 'is-invalid' : ''), 'placeholder' => trans('End date'), 'id' => 'datepickerto'])); ?>

                                                    <div class="invalid-feedback"><?php echo $errors->first('end_date'); ?></div>
                                                </div>
                                                <div class="lead_date_button" style="display:none;">
                                                    <button type="button"
                                                        class="btn btn-success font-weight-bold text-uppercase px-9 py-3 h-45px admin_leads_graph_filter_button">
                                                        Submit
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="ml-6 mt-6">
                                            <div class="form-group">
                                                <?php echo e(Form::select(
                                                    'lead_graph_type',
                                                    [
                                                        'yearly' => trans('Current Year'),
                                                        'monthly' => trans('Current Month'),
                                                        'weekly' => trans('Current Week'),
                                                        'custom' => trans('Custom'),
                                                    ],
                                                    isset($lead_graph_type) ? $lead_graph_type : '',
                                                    [
                                                        'class' =>
                                                            'min-w-140px h-45px form-control admin_leads_graph_filter chosenselect_graph_type ' .
                                                            ($errors->has('lead_graph_type') ? 'is-invalid' : ''),
                                                    ],
                                                )); ?>

                                                <div class="invalid-feedback"><?php echo $errors->first('lead_graph_type'); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div id="chart5"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            


        </div>
    </div>
    </div>

	<script>
		$(document).ready(function() {
			var shortMonths = JSON.parse('<?php echo $shortMonthsJson; ?>');
			var registeredUsers = JSON.parse('<?php echo $registeredUsersJson; ?>');
			var productsData = JSON.parse('<?php echo $productsJson; ?>');
	
			var options = {
				series: [
					{
						name: 'Users',
						data: registeredUsers
					},
					{
						name: 'Products',
						data: productsData 
					}
				],
				chart: {
					type: 'bar',
					height: 350,
					toolbar: {
						show: false
					}
				},
				plotOptions: {
					bar: {
						horizontal: false,
						columnWidth: '55%',
						endingShape: 'rounded'
					}
				},
				dataLabels: {
					enabled: false
				},
				stroke: {
					show: true,
					width: 2,
					colors: ['transparent']
				},
				xaxis: {
					categories: shortMonths,
				},
				yaxis: {
					title: {
						text: ''
					}
				},
				fill: {
					opacity: 1
				},
				tooltip: {
					y: {
						formatter: function(val, opts) {
							if (opts.seriesIndex === 1) {
								var tooltipIndex = opts.dataPointIndex;
							}
							return val;
						}
					}
				}
			};
	
			var chart5 = new ApexCharts(document.querySelector("#chart5"), options);
			chart5.render();
	
			$(".admin_leads_graph_filter").change(function(e) {
				e.preventDefault();
				var type = $('select[name=lead_graph_type]').val();
				if (type == 'custom') {
					$(".leadStartDate").show();
					$(".leadEndDate").show();
					$(".lead_date_button").show();
				} else {
					$(".leadStartDate").hide();
					$(".leadEndDate").hide();
					$(".lead_date_button").hide();
					$.fn.statisticsChart();
				}
			});
	
			$.fn.statisticsChart = function() {
				var type = $('select[name=lead_graph_type]').val();
				var start_date = $('input[name=start_date]').val();
				var end_date = $('input[name=end_date]').val();
				$.ajax({
					url: "<?php echo e(route('dashboard.statistics')); ?>",
					method: 'get',
					data: {
						'lead_graph_type': type,
						'date_from': start_date,
						'date_to': end_date
					},
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					success: function(r) {
						console.log(r);
						chart5.updateOptions({
							xaxis: {
								categories: r.dates
							}
						});
						chart5.updateSeries([
							{
								name: 'Users',
								data: JSON.parse(r.registered_users)
							},
							{
								name: 'Products',
								data: JSON.parse(r.products) 
							}
						]);
					}
				});
			}
	
			$(".admin_leads_graph_filter_button").click(function(e) {
				var type = $('select[name=lead_graph_type]').val();
				var start_date = Date.parse($('input[name=start_date]').val());
				var end_date = Date.parse($('input[name=end_date]').val());
				if (start_date != '' && end_date != '') {
					$.fn.statisticsChart();
				} else {
					show_message("Start date and End date both are mandatory.", 'error');
				}
			});
	
			$("#datepickerfrom").datepicker({
				format: 'yyyy-mm-dd',
				autoclose: true,
			}).on('changeDate', function(selected) {
				var minDate = new Date(selected.date.valueOf());
				$('#datepickerto').datepicker('setStartDate', minDate);
				$('.datepicker').hide();
			}).attr('readonly', 'readonly');
	
			$("#datepickerto").datepicker({
				format: 'yyyy-mm-dd',
				autoclose: true,
			}).on('changeDate', function(selected) {
				var minDate = new Date(selected.date.valueOf());
				$('#datepickerfrom').datepicker('setEndDate', minDate);
				$('.datepicker').hide();
			}).attr('readonly', 'readonly');
		});
	</script>
	

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ayva/web/ayva.stage04.obdemo.com/public_html/resources/views/admin/dashboard/dashboard.blade.php ENDPATH**/ ?>