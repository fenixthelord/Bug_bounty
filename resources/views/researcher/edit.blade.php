@include('panel.static.header')
@include('panel.static.main')

<br><br>
<!DOCTYPE html>
<html lang="ar">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Researchers</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f8f9fa;
        }
        .form-container {
            max-width: 400px;
            margin: auto; 
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            background-color: #ffffff;
        }
        .form-container h1 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f2f2f2;
        }
        .form-group input:focus {
            border-color: #007bff;
            background-color: #ffffff;
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #6c757d;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .form-group button:hover {
            background-color: #5a6268;
        }
        .success-message {
            color: green;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>
<br><br>
<body>
    <div class="form-container">
        <h1>تعديل بيانات الباحث</h1>

        @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
        @endif

        <form action="{{ route('update.researcher',['uuid'=>$researcher->uuid]) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">الاسم</label>
                <input type="text" id="name" name="name" value="{{ $researcher->name }}" required>
            </div>

            <div class="form-group">
                <label for="email">البريد الإلكتروني</label>
                <input type="email" id="email" name="email" value="{{ $researcher->email }}" required>
            </div>

            <div class="form-group">
                <label for="phone">الهاتف</label>
                <input type="text" id="phone" name="phone" value="{{ $researcher->phone }}" required>
            </div>

            <div class="form-group">
                <label for="code">الرمز</label>
                <input type="text" id="code" name="code" value="{{ $researcher->code }}" required>
            </div>

            <div class="form-group">
                <label for="image">الصورة</label>
                <input type="file" id="image" name="image" required>
            </div>

            <div class="form-group">
                <label for="facebook">رابط الفيسبوك</label>
                <input type="text" id="facebook" name="facebook" value="{{ $researcher->facebook }}" required>
            </div>

            <div class="form-group">
                <label for="linkedin">رابط لينكد إن</label>
                <input type="text" id="linkedin" name="linkedin" value="{{ $researcher->linkedin }}" required>
            </div><div class="form-group">
                <label for="github">رابط Github</label>
                <input type="text" id="github" name="github" value="{{ $researcher->github }}" required>
            </div>

            <div class="form-group">
                <button type="submit">تحديث</button>
            </div>
        </form>
    </div>
</body>
</html>       

@include('panel.static.footer')