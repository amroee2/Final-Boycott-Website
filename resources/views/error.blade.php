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
    {{-- @include("layouts.sidebar") --}}
   
                      
                              <section>
                                <div class="container">
                                  <div class="text">
                                    <h1>Page Not Found</h1>
                                    <p class="text-success ">We can't seem to find the page you're looking for. Please check the URL for any typos.</p>
                                    <div class="input-box">
                                    </div>
                                    <ul class="menu">
                                      <li><a href="/">Go to Homepage</a></li>
                                    </ul>
                                  </div>
                                  <div><img class="image" src="https://omjsblog.files.wordpress.com/2023/07/errorimg.png" alt=""></div>
                                </div>
                                </div>
                              </section>
                            


                            
                        

                  
                        
</body>
    <style>

section {
 width: 100%;
}
.container {
 display: flex;
 justify-content: center;
 align-items: center;
 flex-direction: row;
 column-gap: 20px;
}
.container img {
 width: 420px;
}
.text {
 display: block;
 padding: 40px 40px;
 width: 450px;
}
..text {
 display: block;
 padding: 40px 40px;
 width: 450px;
}
.text h1 {
 color: #00c2cb;
 font-size: 35px;
 font-weight: 700;
 margin-bottom: 15px;
}
.text p {
 font-size: 15px;
 color: #e0ffff;
 margin-bottom: 15px;
 line-height: 1.5rem;
 margin-bottom: 15px;
}
.input-box{
 position: relative;
 display: flex;
 width: 100%;
}
.input-box input{
 width: 85%;
 height: 40px;
 padding: 5px 15px;
 font-size: 16px;
 color: #22232e;
 border-radius: 5px 0px 0px 5px;
 border: 2px solid #42455a;
 outline: none;
}
.input-box button{
 display: flex;
 width: 15%;
 border: 1px solid #004958;
 border-radius: 0px 5px 5px 0px;
 background: #004958;
 color: #e0ffff;
 font-size: 22px;
 align-items: center;
 justify-content: center;
 cursor: pointer;  
}
.menu{
 display: flex;
 flex-direction: column;
 margin-top: 15px;
 margin-left: 30px;
}
.menu li a{
 display: flex;
 font-size: 1rem;
 color: #00c2cb;
 transition: 0.1s;
}
@media screen and (max-width:600px) {
 .container{
   display: flex;
   flex-direction: column-reverse;
 }
 .text,.image{
   width: 100%;
 } 
 .container{
   min-width: 200px;
   padding: 40px 0px;
 }
 .text{
   display: block;
   width: 100%;
   padding: 20px 40px;
 }
 .image{
   display: flex;
   width: 200px;
   align-self: center;
   justify-content: center;
   margin: auto;
 }
}


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