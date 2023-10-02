<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>कुखुरा बिकास फार्म</title>
</head>
<body>
    <div class="container-fluid py-3">
        <div class="row">
          <div class="col">
            <img class="rounded" src="{{ asset('frontend\assets\image\login\login.jpg') }}" height="700" width="800" alt="">
          </div>
          
          <div class="col container py-4 " style=" margin-top: 180px;">
            <form action="{{route('login')}}" method="post">
              @csrf
                <P><strong>Login</strong></P>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <input style="width: 500px;" name="email" type="email" class="form-control" placeholder="Enter Emali Here...">
                
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input style="width: 500px;" name="password" type="password" class="form-control" placeholder="password" >
                </div>
               
                <button type="submit" class="btn btn-primary">Submit</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                
                    <a style="text-decoration: none;" href="{{ url('forget')}}">Forget Password?</a>
              </form>
          </div>
    
        </div>
    </div>
</body>
</html>