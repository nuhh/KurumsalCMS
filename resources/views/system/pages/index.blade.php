@extends('system.theme.main')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Adı</th>
							<th>Anahtarı</th>
							<th>İşlem</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Adı</th>
							<th>Anahtarı</th>
							<th>İşlem</th>
						</tr>
					</tfoot>
					<tbody>
						@foreach($all as $e)
							<tr>
								<td>{{ $e['title'] }}</td>
								<td>{{ $e['title'] }}</td>
								<td class="text-center">
									<a href="{{route('page.edit', $e['id'] )}}">Düzenle</a>
									{{ Form::open([ 'route' => [ 'page.destroy', $e['id'] ], 'method' => 'delete' ]) }}
										{{ Form::submit('Sil') }}
									{{ Form::close() }}
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->


@endsection
