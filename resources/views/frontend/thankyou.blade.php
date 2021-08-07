<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="https://pluskh.com.kh/fantasy/public/dist/img/cbsfantasylogo.png" type="image/x-icon">
    <title>CBS Fantasy League</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />
    <link href="{{ asset('dist/css/adminlte.min.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Battambang&display=swap" rel="stylesheet"> 
    <link href="{{ asset('css/custom1.css') }}" rel="stylesheet" />
    <style>
        .thank{
            font-size: 2.5rem;
        }
        .detail-th{
            font-size: 1.5rem;
        }
        @media only screen and (max-width: 991px) {
            .thank {
                font-size: 1.8rem;
            }
            .detail-th{
                font-size: 1.2rem;
            }
        }
        @media only screen and (max-width: 364px) {
            .thank {
                font-size: 1.5rem;
            }
            .detail-th{
                font-size: 1rem;
            }
        }
        
    </style>
</head>

<body style="height: auto;">
    <div class="wrapper">
        <div class="container mb-5">
            <div class="row mt-5">
                <div class="col-md-10 mx-auto">
                    <img class="banner" src="{{ asset('dist/img/FantasySeason2BannerWebsite.jpg') }}" alt="banner">
                </div>
                <div class="col-md-10 mx-auto">
                    <div class="container p-5 my-0" style="background-color: rgb(255, 255, 255);">
                        <div class="main">
                            <div class="swal2-icon swal2-success swal2-animate-success-icon" style="display: flex; margin-top: -25px;
                            margin-bottom: 5px;">
                                <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
                                  <span class="swal2-success-line-tip"></span>
                                  <span class="swal2-success-line-long"></span>
                                  <div class="swal2-success-ring"></div> 
                                  <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                                  <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
                                </div>
                            </div>
                            <div class="col-md-6 mx-auto mb-3">
                                <p class="thank text-success text-center">ចុះឈ្មោះជោគជ័យ</p>
                            </div>
                            <p class="detail-th text-center" style="color: #07ab2d!important;">សូមអគុណ​ ក្នុងការចុះឈ្មោះ</p>
                            <p class="detail-th text-center" style="color: #07ab2d!important;">យើងនឹងត្រួតពិនិត្យលើការបង់ប្រាក់របស់អ្នក</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/sweetalert2/sweetalert2/sweetalert2@10.js') }}"></script>
</body>

</html>
