@include('panel.static.header')
@include('panel.static.main')

@extends('layouts.app')

@section('title', 'إضافة اختصاص')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-header bg- text-white">
                    <h3 class="card-title mb-0">إضافة اختصاص جديد</h3>
                </div>
                
                <div class="card-body">
                    <form action="{{ route('specializations.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">اسم الاختصاص</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="أدخل اسم الاختصاص" value="{{ old('title') }}" required>
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-outline-success btn-sm">إضافة</button>
                            <a href="{{ route('specializations') }}" class="btn btn-outline-secondary btn-sm">إلغاء</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@include('panel.static.footer')