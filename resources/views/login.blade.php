<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('links')
</head>
<body>
    <form method="POST" action="/users/authenticate">
        @csrf
    <div class="container-fluid position-absolute    " style=" top:17%" >
        <div class="row  h-100 ">
            <div class="col-3 h-100"></div>
            <div class="col h-100 shadow rounded-4   ">
                <div class="row bg-white  rounded-4   ">
                    <div class="col-6 p-3 pb-5 ">
                        <div class="d-flex flex-column  justify-content-center  align-items-center ">
                            <h1  style=" margin:50px ">Sign in</h1>
                            @error('email')
                            <div style="color: red;">{{ $message }}</div>
                            @enderror
                            <input class=" form-control " type="email" id="email" name="email" placeholder="Email" required><br>
                            <input  class ="form-control" type="password" id="pwd" name="password" placeholder="Password" required><br>
                            <button class="btn text-white w-50  " style="background-color:#825ee4">SIGN IN</button>
                        </div>
                    </div>
                    <div class="col-6 p-3 rounded-4 pb-5  " style=" background: linear-gradient(180deg, #5e72e4 0, #825ee4 100%) !important; border-top-left-radius: 130px !important; border-bottom-left-radius: 100px !important;">
                        <div class="d-flex flex-column  align-items-center text-white h-100 " >
                            <h2 class="" style="margin-top: 40%">Log in</h2>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-3 h-100"></div>
        </div>
    </form>    

    
</body>
<style>
    body{
        background-color: #fafafa

    }
</style>
</html>
