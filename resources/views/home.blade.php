@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <table class="table table-bordered table-sm">
                        <tr>
                            <td>Login Name</td>
                            <td>{{ Auth::user()->name }}</td>
                        </tr>
                        <tr>
                            <td>Login Email</td>
                            <td>{{ Auth::user()->email }}</td>
                        </tr>
                    </table>
            </div>
        </div>
    </div>
</div>
@endsection
