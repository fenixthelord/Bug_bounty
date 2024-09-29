@extends('layouts.app')

@section('title', 'إضافة اختصاص')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">إضافة اختصاص جديد</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('specializations.storee') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">اسم الاختصاص</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="أدخل اسم الاختصاص" required>
                        </div>
                        
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">إضافة</button>
                        <br>
                        <a href="{{ route('specializations') }}" class="btn btn-secondary">إلغاء</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection