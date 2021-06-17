@extends('layouts.appaudi', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')

@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush