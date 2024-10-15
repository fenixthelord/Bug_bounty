@include('panel.static.header')
@include('panel.static.main')



<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
 
        <div class="content-body">



<!DOCTYPE html>
<html>
<head>
    <title>إضافة محافظة</title>
   <style>
        
        body {
 
 background-color: #bbbb;
 background-image: url("tt.jpg");
 background-size: cover;

         }
        .edit-form {
            width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .edit-form label {
            font-weight: bold;

        }

        

        .edit-form button {
            padding: 5px 10px;
        }
    </style>
</head>
<body>
<div class="edit-form">
        
        <form method="POST" action="{{ route('homepage-validate') }}">
            @csrf
            <div class="form-group">
            <h2>الصفحة الرئيسية</h2>
            <hr>
            </div>
            
            <div>
            
                <label for="name">اسم الشركة:<label>
                <input type="text" id="name" name="name" >
                
                
                <br>
   
            </div>
    <hr>
            <div>
            
            <label for="type">نوع الشركة:<label>
            <select name="type" id="type">
                <option selected>تحديد</option>
                @foreach ( $types as $type)
                <option value="{{ $type }}"  >{{ $type ?? 'لا توجد بيانات'  }}</option>
                @endforeach
            </select>
        
            
            </div>
            
    <hr>

    
            <div>
            
            <label for="specialization">اختصاص الشركة:<label>
            <select name="specialization" id="specialization">
                <option selected>تحديد</option>
                @foreach ( $specializations as $specialization)
                <option value="{{ $specialization }}"  >{{ $specialization ?? 'لا توجد بيانات' }}</option>
                @endforeach
            </select>
            </div>
    <hr>
            
    <button>بحث</button>
    
        </form>
    </div>
</body>
</html>
</div>
    </div>
</div>
<!-- END: Content-->
@include('panel.static.footer')














