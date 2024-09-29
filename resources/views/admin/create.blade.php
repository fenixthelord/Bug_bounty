@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-danger">
                <div class="card-header bg-danger text-white">إضافة مشرف جديد</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">الاسم</label>
                            <input id="name" type="text" class="form-control" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">البريد الإلكتروني</label>
                            <input id="email" type="email" class="form-control" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="password">كلمة المرور</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">موبايل</label>
                            <input id="phone" type="phone" class="form-control" name="phone" required>
                        </div>

                        <div class="form-group">
                            <label for="profile_picture">صورة شخصية</label>
                            <input type="file" id="profile_picture" class="form-control"
                             name="profile_picture">
                        </div>

                        <button type="submit" class="btn btn-danger">إضافة مشرف</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection