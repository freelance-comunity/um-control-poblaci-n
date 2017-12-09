@extends('layouts.master-app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">UNIVERSIDAD MAYA</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Bienvenido de nuevo {{Auth::user()->name}}
                </div>
            </div>
        </div>
    </div>
</div>
<!--Población por carreras -->
<div class="col-lg-6 col-sm-6 col-xs-12">
  <div class="pmd-card pmd-z-depth todos">
    <div class="pmd-card-title">
      <div class="media-left">
        <span class="service-icon img-circle bg-fill-feedback">
      <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="31.999px" height="30.769px" viewBox="281.642 394.113 31.999 30.769" enable-background="new 281.642 394.113 31.999 30.769" xml:space="preserve">
        <g>
          <path fill="#FFFFFF" d="M290.526,394.574l-4.218,5.273l-2.753-1.835c-0.567-0.379-1.331-0.224-1.707,0.341
          s-0.224,1.331,0.341,1.707l3.692,2.461c0.209,0.139,0.447,0.207,0.683,0.207c0.362,0,0.72-0.16,0.961-0.462l4.923-6.154
          c0.425-0.53,0.338-1.306-0.192-1.729C291.726,393.958,290.951,394.044,290.526,394.574z"/>
          <path fill="#FFFFFF" d="M290.526,405.651l-4.218,5.272l-2.753-1.835c-0.566-0.379-1.331-0.225-1.707,0.341
          c-0.376,0.565-0.224,1.33,0.341,1.707l3.692,2.462c0.209,0.139,0.447,0.207,0.683,0.207c0.362,0,0.72-0.16,0.961-0.461l4.923-6.154
          c0.425-0.531,0.338-1.306-0.192-1.729C291.726,405.036,290.951,405.12,290.526,405.651z"/>
          <path fill="#FFFFFF" d="M290.526,416.729l-4.218,5.272l-2.753-1.835c-0.566-0.378-1.331-0.224-1.707,0.341
          c-0.376,0.566-0.224,1.329,0.341,1.707l3.692,2.462c0.209,0.139,0.447,0.206,0.683,0.206c0.362,0,0.72-0.159,0.961-0.461
          l4.923-6.154c0.425-0.531,0.338-1.306-0.192-1.73C291.726,416.113,290.951,416.198,290.526,416.729z"/>
          <rect x="296.41" y="419.959" fill="#FFFFFF" width="17.23" height="2.462"/>
          <rect x="296.41" y="408.882" fill="#FFFFFF" width="17.23" height="2.461"/>
          <rect x="296.41" y="397.805" fill="#FFFFFF" width="17.23" height="2.461"/>
        </g>
      </svg>
    </span>
      </div>
      <div class="media-body media-middle">
        <h2 class="pmd-card-title-text typo-fill-secondary">Población por carreras</h2>
      </div>
      <div style="width:100%;">
          {!! $chartjs->render() !!}
      </div>
    </div>

    <span class="btn-loader loader hidden">Cargando...</span>
  </div>
</div>
<!--end población por carreras-->

<!--content area start-->
<div id="content" class="pmd-content inner-page">
<!--tab start-->
    <div class="container-fluid full-width-container value-added-detail-page">
		<div>
			<div class="pull-right table-title-top-action">
				<div class="pmd-textfield pull-left">
				  <input type="text" id="exampleInputAmount" class="form-control" placeholder="Search for...">
				</div>
				<a href="javascript:void(0);" class="btn btn-primary pmd-btn-raised add-btn pmd-ripple-effect pull-left">Search</a>
			</div>
			<!-- Title -->
			<h1 class="section-title" id="services">
				<span>Table with Expand/Collapse</span>
			</h1><!-- End Title -->
			<!--breadcrum start-->
			<ol class="breadcrumb text-left">
			  <li><a href="index.html">Dashboard</a></li>
			  <li class="active">Table with Expand/Collapse</li>
			</ol><!--breadcrum end-->
		</div>
		<!-- Table -->
		<div class="table-responsive pmd-card pmd-z-depth">
			<table class="table table-mc-red pmd-table">
				<thead>
					<tr>
						<th>Ticket No.</th>
						<th>Browser Name</th>
						<th>Month</th>
						<th>Total</th>
						<th>Status</th>
						<th>Last Updated On</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td data-title="Ticket No">PMD484150</td>
						<td data-title="Browser Name">Firefox</td>
						<td data-title="Month">September</td>
						<td data-title="Total">25%</td>
						<td data-title="Status"><span class="status-btn blue-bg">Average</span></td>
						<td data-title="date">2016-09-20 15:50:00</td>
						<td class="pmd-table-row-action">
							<a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
								<i class="material-icons md-dark pmd-sm">edit</i>
							</a>
							<a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
								<i class="material-icons md-dark pmd-sm">delete</i>
							</a>
						</td>
					</tr>
					<tr>
						<td data-title="Ticket No">PMD484149</td>
						<td data-title="Browser Name">Google Chrome</td>
						<td data-title="Month">September</td>
						<td data-title="Total">32%</td>
						<td data-title="Status"><span class="status-btn blue-bg">High</span></td>
						<td data-title="date">2016-09-21 15:50:00</td>
						<td class="pmd-table-row-action">
							<a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
								<i class="material-icons md-dark pmd-sm">edit</i>
							</a>
							<a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
								<i class="material-icons md-dark pmd-sm">delete</i>
							</a>
						</td>
					</tr>
					<tr>
						<td data-title="Ticket No">PMD484148</td>
						<td data-title="Browser Name">Safari</td>
						<td data-title="Month">September</td>
						<td data-title="Total">13%</td>
						<td data-title="Status"><span class="status-btn blue-bg">Low</span></td>
						<td data-title="date">2016-09-20 14:00:00</td>
						<td class="pmd-table-row-action">
							<a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
								<i class="material-icons md-dark pmd-sm">edit</i>
							</a>
							<a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
								<i class="material-icons md-dark pmd-sm">delete</i>
							</a>
						</td>
					</tr>
					<tr>
						<td data-title="Ticket No">PMD484147</td>
						<td data-title="Browser Name">Opera</td>
						<td data-title="Month">September</td>
						<td data-title="Total">7%</td>
						<td data-title="Status"><span class="status-btn blue-bg">Low</span></td>
						<td data-title="date">2016-09-20 11:30:00</td>
						<td class="pmd-table-row-action">
							<a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
								<i class="material-icons md-dark pmd-sm">edit</i>
							</a>
							<a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
								<i class="material-icons md-dark pmd-sm">delete</i>
							</a>
							<a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm child-table-expand direct-expand"><i class="material-icons md-dark pmd-sm"></i></a>
						</td>
					</tr>
					<tr class="child-table">
						<td colspan="12">
							<div class="direct-child-table" style="display:none">
								<table class="table pmd-table table-striped table-sm">
									<thead>
										<tr>
											<th>Title</th>
											<th>Amount (%)</th>
											<th>Status</th>
											<th>Created</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									<tr>
										<td>Service Tax </td>
										<td>14.5</td>
										<td><span class="status-btn red-bg">InActive</span></td>
										<td>2014-03-03</td>
										<td class="pmd-table-row-action">
											<a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-xs"><i class="material-icons md-dark pmd-xs">edit</i></a>
											<a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-xs"><i class="material-icons md-dark pmd-xs">delete</i></a>
										</td>
									</tr>
									<tr>
										<td>CWT1 </td>
										<td>2</td>
										<td><span class="status-btn green-bg">Active</span></td>
										<td>2014-03-03</td>
										<td class="pmd-table-row-action">
											<a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-xs"><i class="material-icons md-dark pmd-xs">edit</i></a>
											<a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-xs"><i class="material-icons md-dark pmd-xs">delete</i></a>
										</td>
									</tr>
									<tr>
										<td>Service charge shaival test </td>
										<td>20</td>
										<td><span class="status-btn green-bg">Active</span></td>
										<td>2014-03-03</td>
										<td class="pmd-table-row-action">
											<a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-xs"><i class="material-icons md-dark pmd-xs">edit</i></a>
											<a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-xs"><i class="material-icons md-dark pmd-xs">delete</i></a>
										</td>
									</tr>
									<tr>
										<td>Fixed Tax </td>
										<td>2.5</td>
										<td><span class="status-btn red-bg">InActive</span></td>
										<td>2014-03-03</td>
										<td class="pmd-table-row-action">
											<a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-xs"><i class="material-icons md-dark pmd-xs">edit</i></a>
											<a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-xs"><i class="material-icons md-dark pmd-xs">delete</i></a>
										</td>
									</tr>
									<tr>
										<td>cess vat</td>
										<td>5.8</td>
										<td><span class="status-btn red-bg">InActive</span></td>
										<td>2014-03-03</td>
										<td class="pmd-table-row-action">
											<a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-xs"><i class="material-icons md-dark pmd-xs">edit</i></a>
											<a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-xs"><i class="material-icons md-dark pmd-xs">delete</i></a>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</td>
				</tr>
				<tr>
					<td data-title="Ticket No">PMD484146</td>
					<td data-title="Browser Name">Mobile & Tablet</td>
					<td data-title="Month">September</td>
					<td data-title="Total">4%</td>
					<td data-title="Status"><span class="status-btn blue-bg">Very Low</span></td>
					<td data-title="date">2016-07-21 17:40:00</td>
					<td class="pmd-table-row-action">
						<a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm"><i class="material-icons md-dark pmd-sm">edit</i></a>
						<a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm"><i class="material-icons md-dark pmd-sm">delete</i>
						</a>
					</td>
				</tr>
				<tr>
					<td data-title="Ticket No">PMD484145</td>
					<td data-title="Browser Name">Others</td>
					<td data-title="Month">September</td>
					<td data-title="Total">3%</td>
					<td data-title="Status"><span class="status-btn blue-bg">Very Low</span></td>
					<td data-title="date">2016-09-20 10:00:00</td>
					<td class="pmd-table-row-action">
						<a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
							<i class="material-icons md-dark pmd-sm">edit</i>
						</a>
						<a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
							<i class="material-icons md-dark pmd-sm">delete</i>
						</a>
					</td>
				</tr>
				<tr>
					<td data-title="Ticket No">PMD484145</td>
					<td data-title="Browser Name">Firefox</td>
					<td data-title="Month">August</td>
					<td data-title="Total">20%</td>
					<td data-title="Status"><span class="status-btn blue-bg">Low</span></td>
					<td data-title="date">2016-08-28 15:50:00</td>
					<td class="pmd-table-row-action">
						<a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
							<i class="material-icons md-dark pmd-sm">edit</i>
						</a>
						<a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
							<i class="material-icons md-dark pmd-sm">delete</i>
						</a>
					</td>
				</tr>
				<tr>
					<td data-title="Ticket No">PMD484144</td>
					<td data-title="Browser Name">Google Chrome</td>
					<td data-title="Month">August</td>
					<td data-title="Total">50%</td>
					<td data-title="Status"><span class="status-btn blue-bg">High</span></td>
					<td data-title="date">2016-08-28 13:00:00</td>
					<td class="pmd-table-row-action">
						<a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
							<i class="material-icons md-dark pmd-sm">edit</i>
						</a>
						<a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
							<i class="material-icons md-dark pmd-sm">delete</i>
						</a>
					</td>
				</tr>
				<tr>
					<td data-title="Ticket No">PMD484143</td>
					<td data-title="Browser Name">Safari</td>
					<td data-title="Month">August</td>
					<td data-title="Total">15%</td>
					<td data-title="Status"><span class="status-btn blue-bg">Low</span></td>
					<td data-title="date">2016-08-28 10:00:00</td>
					<td class="pmd-table-row-action">
						<a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
							<i class="material-icons md-dark pmd-sm">edit</i>
						</a>
						<a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
							<i class="material-icons md-dark pmd-sm">delete</i>
						</a>
					</td>
				</tr>
				<tr>
					<td data-title="Ticket No">PMD484142</td>
					<td data-title="Browser Name">Opera</td>
					<td data-title="Month">August</td>
					<td data-title="Total">10%</td>
					<td data-title="Status"><span class="status-btn blue-bg">Very Low</span></td>
					<td data-title="date">2016-08-22 19:00:00</td>
					<td class="pmd-table-row-action">
						<a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
							<i class="material-icons md-dark pmd-sm">edit</i>
						</a>
						<a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
							<i class="material-icons md-dark pmd-sm">delete</i>
						</a>
					</td>
				</tr>
				<tr>
					<td data-title="Ticket No">PMD484141</td>
					<td data-title="Browser Name">Mobile & Tablet</td>
					<td data-title="Month">August</td>
					<td data-title="Total">7%</td>
					<td data-title="Status"><span class="status-btn blue-bg">Very Low</span></td>
					<td data-title="date">2016-08-30 12:00:00</td>
					<td class="pmd-table-row-action">
						<a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
							<i class="material-icons md-dark pmd-sm">edit</i>
						</a>
						<a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
							<i class="material-icons md-dark pmd-sm">delete</i>
						</a>
					</td>
				</tr>
				<tr>
					<td data-title="Ticket No">PMD484140</td>
					<td data-title="Browser Name">Others</td>
					<td data-title="Month">August</td>
					<td data-title="Total">3%</td>
					<td data-title="Status"><span class="status-btn blue-bg">Very Low</span></td>
					<td data-title="date">2016-08-20 11:10:00</td>
					<td class="pmd-table-row-action">
						<a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
							<i class="material-icons md-dark pmd-sm">edit</i>
						</a>
						<a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
							<i class="material-icons md-dark pmd-sm">delete</i>
						</a>
					</td>
				</tr>
				<tr>
					<td data-title="Ticket No">PMD484139</td>
					<td data-title="Browser Name">Firefox</td>
					<td data-title="Month">July</td>
					<td data-title="Total">45%</td>
					<td data-title="Status"><span class="status-btn blue-bg">High</span></td>
					<td data-title="date">2016-07-28 15:50:00</td>
					<td class="pmd-table-row-action">
						<a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
							<i class="material-icons md-dark pmd-sm">edit</i>
						</a>
						<a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
							<i class="material-icons md-dark pmd-sm">delete</i>
						</a>
					</td>
				</tr>
				<tr>
					<td data-title="Ticket No">PMD484138</td>
					<td data-title="Browser Name">Google Chrome</td>
					<td data-title="Month">July</td>
					<td data-title="Total">55%</td>
					<td data-title="Status"><span class="status-btn blue-bg">Very High</span></td>
					<td data-title="date">2016-07-20 13:10:00</td>
					<td class="pmd-table-row-action">
						<a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
							<i class="material-icons md-dark pmd-sm">edit</i>
						</a>
						<a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
							<i class="material-icons md-dark pmd-sm">delete</i>
						</a>
					</td>
				</tr>
				<tr>
					<td data-title="Ticket No">PMD484137</td>
					<td data-title="Browser Name">Safari</td>
					<td data-title="Month">July</td>
					<td data-title="Total">21%</td>
					<td data-title="Status"><span class="status-btn blue-bg">High</span></td>
					<td data-title="date">2016-07-22 17:00:00</td>
					<td class="pmd-table-row-action">
						<a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
							<i class="material-icons md-dark pmd-sm">edit</i>
						</a>
						<a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
							<i class="material-icons md-dark pmd-sm">delete</i>
						</a>
					</td>
				</tr>
			</tbody>
		</table>
		</div>
		<!-- Card Footer -->
		<div class="pmd-card-footer">
		  <ul class="pmd-pagination pull-right list-inline">
			  <span>Rows per page:</span> <span class="dropdown pmd-dropdown">
			  <button class="btn pmd-ripple-effect pmd-btn-flat btn-link dropdown-toggle" type="button" id="dropdownMenuDivider" data-toggle="dropdown" aria-expanded="false">10 <span class="caret"></span></button>
			  <ul aria-labelledby="dropdownMenuDivider" role="menu" class="dropdown-menu">
				  <li role="presentation"><a href="javascript:void(0);" tabindex="-1" role="menuitem">10</a></li>
				  <li role="presentation"><a href="javascript:void(0);" tabindex="-1" role="menuitem">20</a></li>
				  <li role="presentation"><a href="javascript:void(0);" tabindex="-1" role="menuitem">30</a></li>
				  <li role="presentation"><a href="javascript:void(0);" tabindex="-1" role="menuitem">40</a></li>
				  <li role="presentation"><a href="javascript:void(0);" tabindex="-1" role="menuitem">50</a></li>
			  </ul>
			  </span> <span>1-10 of 100</span> <a href="javascript:void(0);" aria-label="Previous"><i class="material-icons md-dark pmd-sm">keyboard_arrow_left</i></a> <a href="javascript:void(0);" aria-label="Next"><i class="material-icons md-dark pmd-sm">keyboard_arrow_right</i></a>
		  </ul>
		</div>
	</div>
</div>
<!--tab start-->
@endsection
