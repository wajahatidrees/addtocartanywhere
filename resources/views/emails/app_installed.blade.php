<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>New App Install</title>
</head>
<body>
   <h2>🎉 A new store just installed your app! - {{ $request['app_name']}}</h2>


   <p><strong>App Name:</strong> {{ $request['app_name']}}</p>
   <p><strong>Shop Name:</strong> {{ $request['domain']}}</p>
   <p><strong>Shop Domain:</strong> {{  $request['domain']}}</p>
   <p><strong>Email:</strong> {{ $request['email']}}</p>
   <p><strong>Contact Number:</strong> {{ $request['phone']}}</p>


   <p>✅ Installation completed successfully.</p>
</body>
</html>
