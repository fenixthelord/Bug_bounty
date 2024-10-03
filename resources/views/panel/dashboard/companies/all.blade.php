@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Companies</h1>
    <div class="card-group">
        @foreach($companies as $company)
            <div class="card">
                <img src="{{ $company->image_url ?? asset('path/to/default/image.jpg') }}" class="card-img-top" alt="{{ $company->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $company->name }}</h5>
                    <p class="card-text">{{ $company->description }}</p>
                    <p class="card-text">
                        <small class="text-body-secondary">
                            Last updated {{ $company->updated_at->diffForHumans() }}
                        </small>
                    </p>
                    <div class="card-footer">
                        <a href="{{ route('companies.show', $company->id) }}" class="btn btn-primary" target="_self">View Details</a>
                    </div>
            </div>
        @endforeach
    </div>
</div>
@endsection