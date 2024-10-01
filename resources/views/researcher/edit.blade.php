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
              }
              .form-container {
                max-width: 400px;
                margin: auto; 
                padding: 20px;
                border: 1px solid #ccc;
                border-radius: 5px;
                box-shadow: 2px 2px 12px rgba(0,0,0,0.1);
            }
            .form-container h1 {
                text-align: center;
            }
            .form-group {
            margin-bottom: 15px;
           

 }
        .form-group label {
          display: block;
          margin-bottom: 5px;
   }
         .form-group input {
           width: 100%;
           padding: 8px;
           border: 1px solid #ccc;
           border-radius: 4px;
         }
         .form-group button {
          width: 100%;
          padding: 10px;
          background-color: #FF0000;
          color: white;
          border: none;
          border-radius: 4px;
         cursor: pointer;
         }
          .form-group button:hover {
        background-color: #218838;
     }
        .success-message {
        color: red;
        text-align: center
    }
    </style>
</head>
<br><br>
<body>
   <div class="form-container">
        <h1>Edit Researchers</h1>

      @if(session('success'))
      <div class="success-message">{{ session('success') }}</div>
         @endif
      <form action="{{ route('update.researcher',['uuid'=>$researcher->uuid]) }}" method="POST"  enctype= "multipart/form-data">
           @csrf

                     <div class="form-group">
                     <label for="name"> name</label>
                    <input type="text" id="name" name="name"  value="{{$researcher->name}}"  required>
                 </div>
                 <div class="form-group">
                     <label for="email">email</label>
                    <input type="email" id="email" name="email"  value="{{$researcher->email}}"     required>
                 </div>
                
                 <div class="form-group">
                     <label for="phone">phone</label>
                    <input type="text" id="phone" name="phone"  value="{{$researcher->phone}}"    required>
                 </div>
                 <div class="form-group">
                     <label for="code">code</label>
                    <input type="text" id="code" name="code"  value="{{$researcher->code}}"    required>
                 </div>
                 <div class="form-group">
                     <label for="image">image</label>
                    <input type="file" id="image" name="image"  value=""    required>
                 </div>
                 
                 <div class="form-group">
                     <label for="facebook">facebook</label>
                    <input type="text" id="facebook" name="facebook"   value="{{$researcher->facebook}}"   required>
                 </div>
                 <div class="form-group">
                     <label for="linkedin">linkedin</label>
                    <input type="text" id="linkedin" name="linkedin"  value="{{$researcher->linkedin}}"    required>
                 </div>
                 <div class="form-group">
                     <label for="github">github</label>
                    <input type="text" id="github" name="github"  value="{{$researcher->github}}"    required>
                 </div>
                <br></br>
                 <div class="form-group">
              <button type="submit">Update</button>
                  </div>
              </form>
         </div>

</body>
</html>       

        </div>
            
            
        </div>
</div>

@include('panel.static.footer')

