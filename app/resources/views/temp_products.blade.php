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

    @include("navbar")
    <div class=" ahmad  ">
       


        <div class="container-fluid  position-relative " style="top: -0px;">
          


            <div class="row mt-4 px-5" >
                <div class="col">
                    <div class="card shadow border-0  " style="background-color: f8f9fe;">                
                        <div class="card-body  p-0 ">
                            <div class="table-responsive  " style="width: 100% !important;">
                                <table class="table border-top">
                                    <thead>
                                        <tr style="height: 30px;">
                                            <th style="background-color: #f7fafc" scope="col">ID</th>
                                            <th style="background-color: #f7fafc" scope="col">Arabic Name</th>
                                            <th style="background-color: #f7fafc" scope="col">Sub_Category</th>
                                            <th style="background-color: #f7fafc" scope="col">Category</th>
                                            <th style="background-color: #f7fafc" scope="col">Barcode</th>
                                            <th style="background-color: #f7fafc" scope="col">boycott</th>
                                        
                                            <th style="background-color: #f7fafc" scope="col">ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody class="gap-2 ">
                                    @foreach($tempProducts as $tempProduct)
                                        <tr>
                                            <th class="align-middle " scope="row "><span class="badge p-2 text-bg-success ">{{$tempProduct->id}}</span></th>
                                            <td class="align-middle "> {{$tempProduct->ar_name}}</td>
                                            <td class="align-middle "> {{$tempProduct->sub_category}}</td>
                                            <td class="align-middle "> {{$tempProduct->category}}</td>
                                            <td class="align-middle "> {{$tempProduct->barcode}}</td>
                                            <td class="align-middle "> {{$tempProduct->boycott}}</td>
                                            <td class="align-middle d-flex justify-content-center align-items-center column-gap-2  "> 
                                            <form method="post" action="/tempProduct/delete" >
                                                @csrf
                                                <input type="hidden" name="id" value={{$tempProduct->id}}>
                                                <button type="submit" class=" w-100 btn btn-danger btn1">Delete</button>
                                            </form>
                                            <form>
                                                <button type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal{{$tempProduct->id}}" class=" w-100 btn btn-primary btn1">Update</button>
                                            </form>
                                                <form method="post" action="/product/store" >
                                                    @csrf
                                                    <input type="hidden" name="id" value={{$tempProduct->id}}>
                                                    <input type="hidden" name="ar_name" value="{{$tempProduct->ar_name}}">
                                                    <input type="hidden" name="boycott" value="{{$tempProduct->boycott}}">
                                                    <input type="hidden" name="sub_category" value="{{$tempProduct->sub_category}}">
                                                    <input type="hidden" name="barcode" value="{{$tempProduct->barcode}}">
                                                    <input type="hidden" name="category" value="{{$tempProduct->category}}">

                                                    <button type="submit" class=" w-100 btn btn-success btn1">Confirm</button>
                                                </form>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                @foreach($tempProducts as $tempProduct)
                                <div class="modal fade border-0 " id="exampleModal{{$tempProduct->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h1 class="modal-title fs-5 ps-2 " id="exampleModal{{$tempProduct->id}}">Update </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="post" action="/tempProduct/update">
                                            @csrf
                                        <div class="modal-body d-flex flex-column align-items-center px-5 row-gap-4 rounded " style= "background-color: #F7F8FA !important;">
                                            <input type="hidden" class="form-control mt-2" name="id" value={{$tempProduct->id}} id="">

                                            <div class="w-100 flex-column justify-content-start">
                                                <label for="">Name in Arabic</label>
                                                <input class="form-control mt-2" placeholder="اسم المنتج" value="{{$tempProduct->ar_name}} "type="text" name="ar_name" id="">
                                            </div>
                                            <div class="w-100 mt-3flex-column justify-content-start">
                                                <label for="">sub_category</label>
                                                <input class="form-control mt-2" placeholder="SUB_CATEGORY" value="{{$tempProduct->sub_category}}  "type="text" name="sub_category" id="">
                                            </div>
                                            <div class="w-100 mt-3flex-column justify-content-start">
                                                <label for="">category</label>
                                                <input class="form-control mt-2" placeholder="Category" value="{{$tempProduct->category}} " type="text" name="category" id="">
                                            </div>
                                            <div class="w-100 mt-3flex-column justify-content-start">  
                                                <label for="">Barcode</label>                                         
                                                <input class="form-control mt-2" placeholder="Barcode" value="{{$tempProduct->barcode}}"  type="text" name="barcode" id="">
                                            </div>
                                            <div class="w-100 mt-3flex-column justify-content-start">
                                                <label for="">Is Boyoctted</label>
                                                <input class="form-control mt-2" placeholder="1 OR 0" value="{{$tempProduct->boycott}} " type="text" name="boycott" id=""> 
                                            </div>                                           
                                            <button type="submit" class="btn btn-primary mt-3 p-2 px-3" style="max-width: 180px;">Save changes</button>
                                            <br>
                                        </div>
                                    </form>
                                            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}    
                                    </div>
                                    </div>
                                </div>
                                @endforeach

                        {{-- </div> --}}


                            
                        </div>

                        
                    </div>
                    
                </div>
                <div class="col-3">
                    <button  data-bs-toggle="modal" data-bs-target="#exampleModal2" class="  mt-3 btn btn-success text-white btn1 ">Create</button>
                    <div class="modal fade border-0 " id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5 ps-2 " id="exampleModalLabel">Create </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="post" action="/tempProduct/store">
                            @csrf
                            <div class="modal-body d-flex flex-column align-items-center px-5 row-gap-4 rounded " style= "background-color: #F7F8FA !important;">
                                <div class="w-100 flex-column justify-content-start">
                                    <label for="">Name in Arabic</label>
                                    <input class="form-control mt-2" placeholder="اسم المنتج" type="text" name="ar_name" id="">
                                </div>
                                <div class="w-100 mt-3flex-column justify-content-start">
                                    <label for="">sub category</label>
                                    <input class="form-control mt-2" placeholder="items sub category..." type="text" name="sub_category" id="">
                                </div>
                                <div class="w-100 mt-3flex-column justify-content-start">
                                    <label for="">category</label>
                                    <input class="form-control mt-2" placeholder="items category.. " type="text" name="category" id="">
                                </div>
                                <div class="w-100 mt-3flex-column justify-content-start">  
                                    <label for="">Barcode</label>                                         
                                    <input class="form-control mt-2" placeholder="Barcode" type="text" name="barcode" id="">
                                </div>
                                <div class="w-100 mt-3flex-column justify-content-start">
                                    <label for="">Is Boycotted</label>
                                    <input class="form-control mt-2" placeholder="1 OR 0 OR 2" type="text" name="boycott" id=""> 
                                </div>                                           
                                <button type="submit" class="btn btn-primary mt-3 p-2 px-3" style="max-width: 180px;">Save changes</button>
                                <br>
                            </div>
                        </form>
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