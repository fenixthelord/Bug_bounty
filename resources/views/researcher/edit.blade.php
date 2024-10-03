@include('panel.static.header')
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
            background-color: #e0e0e0; /* خلفية رمادي فاتح */
        }

        .form-container {
            max-width: 600px; /* جعل النموذج أوسع ليكون على شكل مستطيل */
            margin: auto;
            padding: 30px;
            background-color: #ffffff; /* خلفية بيضاء داخل المستطيل */
            border: 1px solid #ccc;
            border-radius: 15px; /* حواف مستديرة أكثر */
            box-shadow: 3px 3px 15px rgba(0, 0, 0, 0.2); /* ظل بسيط */
        }

        .form-container h1 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px; /* توسيع المسافات بين الحقول */
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="file"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            font-size: 14px;
        }

        .form-group input:focus {
            border-color: #ff0000;
            outline: none;
        }

        .form-group button {
            width: 100%;
            padding: 12px;
            background-color: #ff0000;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-group button:hover {
            background-color: #cc0000;
        }

        .success-message {
            color: red;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group input,
        .form-group label {
            margin-bottom: 12px;
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
                <label for="linkedin">رابط لينكد إن</label><input type="text" id="linkedin" name="linkedin" value="{{ $researcher->linkedin }}" required>
            </div>

            <div class="form-group">
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