<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restaurnat</title>
    <link href="https:cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
     <link rel="stylesheet" href="https:fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,600,0,200" />
     <link rel="stylesheet" href="https:fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,300,1,0" />
     <link rel="stylesheet" href="https:fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,300,0,0" />
     <link rel="stylesheet" href="https:fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
     <link rel="stylesheet" href="https:fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
     <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
     <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    @include('navbar')
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <style>
         /* .form-select{
            width: 100px !important;
        } */
    </style>
</head>

<body>
    {{-- @include("layouts.sidebar") --}}
    <div class=" ahmad  ">
       


        <div class="container-fluid  position-relative " style="top: -0px;">
          


            <div class="row mt-4 px-5" >
                <div class="col">
                    <div class="card shadow border-0  " style="background-color: f8f9fe;">
                        <div class="card-header border-0   py-4 px-4 bg-white  gy-2 " >
                            <div class="d-flex justify-content-between align-content-center pb-3   "> 
                                <h5 class=" text-center">Messages</h5>
                                <div class="d-flex align-items-center   column-gap-2 ">
                                </div>
                            </div>
                        
                            <div class="card-body  p-0 ">
                            <div class="table-responsive  " style="width: 100% !important;">
                                <table class="table border-top">
                                    <thead>
                                        <tr style="height: 30px;">
                                            <th style="background-color: #f7fafc" scope="col">ID</th>
                                            <th style="background-color: #f7fafc" scope="col">Name</th>
                                            <th style="background-color: #f7fafc" scope="col">Number</th>
                                            <th style="background-color: #f7fafc" scope="col">Messages</th>
                                        </tr>
                                    </thead>
                                    <tbody class="gap-2 ">
                                    @foreach($messages as $message)
                                        <tr>
                                            <th class="align-middle " scope="row "><span class="badge p-2 text-bg-success ">{{$message->id}}</span></th>
                                            <td class="align-middle "> {{$message->name}}</td>
                                            <td class="align-middle "> {{$message->phone}}</td>
                                            <td class="align-middle "> <button  data-bs-toggle="modal" data-bs-target="#exampleModal{{$message->id}}" class=" btn w-50 btn-success text-white btn1 ">VIEW</button></td>
                                        </tr> 
                                    </tbody>
                                    <div class="modal fade border-0 " id="exampleModal{{$message->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog ">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h1 class="modal-title fs-5 ps-2 " id="exampleModalLabel">Message </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body d-flex flex-column align-items-center px-5 row-gap-4 rounded" style="background-color: #F7F8FA !important;">
                                                <label for=""><b>Message</b></label>
                                                <p class="long-text">{{$message->message}}</p>
                                            </div>
                                            
                                            
                                                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                                                
                                        </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </table>
                                    </div>
                    

                        </div>  
                        </div> 
                    </div>
                    <div class="col-3">
                    <button data-bs-toggle="modal" data-bs-target="#CreateMessage" class="mt-3 btn btn-success text-white btn1 ">Create a message</button>
                </div>
                    <div class="modal fade border-0 " id="CreateMessage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5 ps-2 " id="exampleModalLabel">Create Message</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="post" action="/messages/store">
                            @csrf
                            <div class="modal-body d-flex flex-column align-items-center px-5 row-gap-4 rounded " style= "background-color: #F7F8FA !important;">
                                <div class="w-100 flex-column justify-content-start">
                                    <label for="">Name</label>
                                    <input class="form-control mt-2" placeholder="Name..." type="text" name="name" id="">
                                </div>
                                <div class="w-100 mt-3flex-column justify-content-start">  
                                    <label for="">Phone</label>                                         
                                    <input class="form-control mt-2" placeholder="Phone Number..." type="text" name="phone" id="">
                                </div>
                                <div class="w-100 mt-3flex-column justify-content-start">
                                    <label for="">Message</label>
                                    <textarea class="form-control mt-2" placeholder="Enter message..." name="message"></textarea>
                                </div>                                         
                                <button type="submit" class="btn btn-primary mt-3 p-2 px-3" style="max-width: 180px;">Save changes</button>
                                <br>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
            


        </div>



        



    


    </div>

    <style>

        body{
            background-color: #fafbfc; 
        }

        a{
            text-decoration: none;
            cursor: pointer;
        }
        label{
            color: gray;
            font-weight: bold;
        }
        .form-select{
            /* max-width: 150px !important; */
        }

        .form-check-input{
            width: 28px;
            height: 28px;
            border: none;
            background-color: white;
            border: 1px solid gray;
        }

        .form-check-input:checked{
           
            background-color: #5e72e4;
            
        }

        .form-check{
            display: flex;
            column-gap: 8px;
            align-items: center;
           
        }
        .btn1{
            width: 70%;
        }
       
        tbody .number{
            background-color: rgb(79, 214, 156); 
            border-radius:40%;
            display:flex; 
            justify-content: center;
            color: white;

        }
        tbody th{
            width: 100px;
        }
        .onumber{
            background-color:rgb(79, 214, 156) ;
            border-radius: 40%;
             max-width:30px;
             padding: 10px;
        }
        tr,th,td{
            text-align: center;
        }
        .badge{
            border-radius: 50%;
                }

                .text-bg-success{
            background-color:rgb(79, 214, 156) !important;
        }
        
:root
{
    --blue: #5e72e4;
    --indigo: #5603ad;
    --purple: #8965e0;
    --pink: #f3a4b5;
    --red: #f5365c;
    --orange: #fb6340;
    --yellow: #ffd600;
    --green: #2dce89;
    --teal: #11cdef;
    --cyan: #2bffc6;
    --white: #fff;
    --gray: #8898aa;
    --gray-dark: #32325d;
    --light: #ced4da;
    --lighter: #e9ecef;
    --primary: #5e72e4;
    --secondary: #f7fafc;
    --success: #2dce89;
    --info: #11cdef;
    --warning: #fb6340;
    --danger: #f5365c;
    --light: #adb5bd;
    --dark: #212529;
    --default: #172b4d;
    --white: #fff;
    --neutral: #fff;
    --darker: black;
    --breakpoint-xs: 0;
    --breakpoint-sm: 576px;
    --breakpoint-md: 768px;
    --breakpoint-lg: 992px;
    --breakpoint-xl: 1200px;
    --font-family-sans-serif: Open Sans, sans-serif;
    --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, 'Liberation Mono', 'Courier New', monospace;
}

      .btn-primary{
        background-color: #5e72e4;
      }
      .btn-success{
        background-color: #2dce89;
      }
      .btn-danger{
        background-color: #f5365c;
      }
      .btn-info{
        background-color: #11cdef;
      }
      .btn-dark{
        background-color: var(--default);
      }
      .btn {
        border: none;
      }
      .long-text {
    word-wrap: break-word;
    max-width: 100%; /* Adjust this value according to your layout */
    }

  
  
      @media( max-width:1000px ){
  
          .col-3{
              display: none;
          }
          .raziYaKhara{
              display: none;
          }
          .ahmad{
              /* left:0px; */
              margin-left: 0px;
              /* background-color: white; */
          }
          #CollapsedImage{
              display: block;
          }
          .collapsedCol{
              display: flex;
              justify-content: center;
          }
  
      }
  
      /* @media(min-width:2000px){
          .ahmad{
              width: 100%;
          }
      } */
  
      @keyframes pulse-red {
    0% { opacity: 0; }
    100% { opacity: 1; }
  }
  .bg-primary {
    background-color: #e5e8f9 !important;
}
.text-primary{
    color: #6b7bd5  !important;
}

.bg-blue {
    background-color: #5e72e4 !important;
}
.text-blue{
    color: #5e72e4  !important;
}

  .bg-success {
    background-color: #2dce89 !important;
}

  .bg-info {
    background-color: #11cdef !important;
}
.bg-red{
    background-color: #fce5e0 !important;
}

.text-red{
    color: #d98572 !important;
}


  

    </style>
    <script>
    // Assuming you have included the Bootstrap datepicker library
    // Initialize the datepicker
    $('#e').datepicker({
        format: 'Date Form', // Specify the format you want
        autoclose: true
    });
</script>
    
</body>
</html>