<!DOCTYPE html>
<html lang="ar">
<head> <p>Designed by Qusai</p>
                <a href="{{ route('Admin-Panel') }}" class="btn btn-danger">عودة</a>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>إرسال رسالة بريد إلكتروني</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .alert {
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">إرسال رسالة بريد إلكتروني</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- نموذج لإدخال الرسالة -->
        <form action="{{ route('send.email') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="recipientName" class="form-label">اسم المستلم:</label>
                <input type="text" class="form-control" id="recipientName" name="recipientName" required>
            </div>

            <div class="mb-3">
                <label for="recipientEmail" class="form-label">البريد الإلكتروني للمستلم:</label>
                <input type="email" class="form-control" id="recipientEmail" name="recipientEmail" required>
            </div>

            <div class="mb-3">
                <label for="messageContent" class="form-label">محتوى الرسالة:</label>
                <textarea id="messageContent" name="messageContent" class="form-control" rows="4" required></textarea>
            </div>

            <button type="submit" class="btn btn-danger">إرسال البريد الإلكتروني</button>
        </form>
    </div>
</body>
</html>