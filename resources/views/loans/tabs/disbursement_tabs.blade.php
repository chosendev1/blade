@extends('loans.loan_actions')
	@section('tabs_headers')
	@include('layouts.partials.tabs-headers.loan_disbursement_tab_headers')
	@endsection
    @section('tabs_content')
	@include('loans.tabs.disbursement_tab')
	@include('loans.tabs.collaterals_tab') 
    @include('loans.tabs.guarantors_tab')
    {{-- @include('layouts.tabs.payments_tabs') --}}
	@endsection
