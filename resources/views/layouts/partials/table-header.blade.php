@section('page-header')
	@include('layouts.partials.header',['header' => $header])
	@endsection
	@section('table-header')
	<h4 class="example-title">
		{{ $table_title }}
	</h4>
	<hr>
	@endsection
