@section('page-header')
	@include('layouts.partials.header',['header' => $header])
	@endsection
	@section('form-header')
	<h4 class="example-title">
		{{ $form_title }}
	</h4>
	<hr>
	@endsection
