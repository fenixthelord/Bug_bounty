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
                    <h3 class="card-title">تعديل الاختصاص </h3>
                </div>
                <div class="card-body">
<<<<<<< HEAD
                    <form action="{{ route('specializations.update',$specialization->id) }}" method="POST">
=======
                    <form action="{{ route('specializations.updatee',$specialization->id) }}" method="POST">
>>>>>>> 9aa45d7731e2407b1e13439416ea16a81ee133b7
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">اسم الاختصاص</label>
                            <input type="text" name="title" class="form-control" id="title" required value="{{ $specialization->title }}">
                        </div>
                        
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">تحديث</button>
                        <br>
                        <a href="{{ route('specializations') }}" class="btn btn-secondary">إلغاء</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection