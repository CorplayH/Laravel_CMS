@extends('layout.member.master')
@section('menu')
    @include('layout.member.show_menu')
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            动态
        </div>
        <div class="card-body">
            <h4 class="card-title">Header</h4>
            <p class="card-text">Header</p>
        </div>
        <div class="card-footer text-muted">
            Header
        </div>
    </div>
@endsection
@push('js')

@endpush
@push('css')

@endpush