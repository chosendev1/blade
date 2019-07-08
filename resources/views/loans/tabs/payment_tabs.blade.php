@extends('loans.loan_actions')
	@section('tabs_headers')
	@include('layouts.partials.tabs-headers.loan_payment_tab_headers')
	@endsection
    @section('tabs_content')
	{{-- @include('layouts.tabs.approval_tabs') --}}
	@include('layouts.tabs.payments_tab')
	@endsection
