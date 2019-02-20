@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-lg-6 col-xs-6">
				<div class="small-box bg-aqua">
						<div class="inner">
							<h3>{{ @$payment_count }}</h3>
							<p>Payment Full</p>
						</div>
						<!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
				</div>
			</div>

			<div class="col-lg-6 col-xs-6">
				<div class="small-box bg-red">
						<div class="inner">
							<h3>{{ @$reservation_count }}</h3>
							<p>Reservations</p>
						</div>
						<!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
				</div>
			</div>

			<div class="col-md-8 col-md-offset-2">



				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Home</h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						 Welcome to the new administrative site of Demented Haunt.
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->

			</div>
		</div>
	</div>
@endsection
