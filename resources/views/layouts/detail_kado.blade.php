<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="{{ asset('img//index/favicon.png')}} " rel="icon">
    
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">

    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}"> --}}

    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/themify/themify-icons.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/elegant-font/html-css/style.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css')}}">

	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css')}}">

	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/slick/slick.css')}}">
	
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/lightbox2/css/lightbox.min.css')}}">

	<link rel="stylesheet" href="{{asset('css/bootadmin.min.css')}}">
	
	<link rel="stylesheet" href="{{asset('css/fontawesome-all.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css')}}">
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">

	<style>
		.ui-state-hover, .ui-state-active {
			color: #ffffff;
			background-color: #E5418B !important;
			text-decoration: none !important;
			border: #E5418B !important;
		}
		.page-item.active .page-link {
			color: #ffffff !important;
			background-color: #E5418B !important;
			border-color: #E5418B !important;
		}

		.page-link{
			color: #E5418B !important;
		}
		
		.image-wrapper {
			padding-top: 100%;
			position: relative;
			width: 100%;
		}
		.image-wrapper img {
			bottom: 0;
			left: 0;
			margin: auto;
			max-height: 100%;
			max-width: 100%;
			right: 0;
			position: absolute;
			top: 0;
		}
		.font1{
		font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
		font-size: 1rem;
    	font-weight: 400;
    	line-height: 1.5;
		}
		.font2{
		font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
		}
	</style>
	
	@yield('custom-css')

    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
	<nav class="navbar navbar-expand navbar-dark bg-primary">
        <a class="sidebar-toggle mr-3" href="#"><i class="fa fa-bars"></i></a>
        <a class="navbar-brand font2" href="#">Admin</a>
    
        <div class="navbar-collapse collapse">
            <ul class="navbar-nav ml-auto">
                {{--  <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-envelope"></i> 5</a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-bell"></i> 3</a></li>  --}}
                <li class="nav-item dropdown">
                    <a href="#" id="dd_user" class="nav-link dropdown-toggle font1" data-toggle="dropdown"><i class="fa fa-user"></i> Gifuto</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd_user">
                        <a href="#" class="dropdown-item">Profile</a>
                        <a href="#" class="dropdown-item">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    
    <div class="d-flex">
        <div class="sidebar sidebar-dark bg-dark">
            <ul class="list-unstyled">
                <li><a href="/admin" class="font1"><i class="fa fa-fw fa-link"></i> Home</a></li>
                {{-- <li><a href="/admin/status-seller"><i class="fa fa-fw fa-link"></i> Status Seller</a></li> --}}
                <li><a href="/admin/transaksi" class="font1"><i class="fa fa-fw fa-link"></i> Transaksi</a></li>
            </ul>
        </div>
    
        <div class="content p-4">
            @yield('content')
        </div>
    </div>
    

	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>
    
    <!--===============================================================================================-->
	<script type="text/javascript" src="{{ asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <!--===============================================================================================-->
        <script type="text/javascript" src="{{ asset('vendor/animsition/js/animsition.min.js')}}"></script>
    <!--===============================================================================================-->
        <script type="text/javascript" src="{{ asset('vendor/bootstrap/js/popper.js')}}"></script>
        <script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!--===============================================================================================-->
		<script type="text/javascript" src="{{ asset('vendor/select2/select2.min.js')}}"></script>
		<script>
			$(".selection-1").select2({
				minimumResultsForSearch: 20,
				dropdownParent: $('#dropDownSelect1')
			});
			$(".selection-2").select2({
				minimumResultsForSearch: 20,
				dropdownParent: $('#dropDownSelect2')
			});
		</script>
        <script src="{{asset('js/bootadmin.min.js')}}"></script>
	<!--===============================================================================================-->
		<script type="text/javascript" src="{{ asset('vendor/daterangepicker/moment.min.js')}}"></script>
		<script type="text/javascript" src="{{ asset('vendor/daterangepicker/daterangepicker.js')}}"></script>
    <!--===============================================================================================-->
        <script type="text/javascript" src="{{ asset('vendor/slick/slick.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('js/slick-custom.js')}}"></script>
    <!--===============================================================================================-->
        <script type="text/javascript" src="{{ asset('vendor/lightbox2/js/lightbox.min.js')}}"></script>
    <!--===============================================================================================-->
        <script type="text/javascript" src="{{ asset('vendor/sweetalert/sweetalert.min.js')}}"></script>
        <script type="text/javascript">
            $('.block2-btn-addcart').each(function(){
                var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
                $(this).on('click', function(){
                    swal(nameProduct, "is added to cart !", "success");
                });
            });
    
            $('.block2-btn-addwishlist').each(function(){
                var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
                $(this).on('click', function(){
                    swal(nameProduct, "is added to wishlist !", "success");
                });
            });
		</script>
		
		<script src="{{ asset('js/main.js')}}"></script>

		<script>
			$(document).ready(function(){
				$('ul li a.kategori').click(function(e){
					e.preventDefault();
					var baseUrl = window.location.protocol+"//"+window.location.host
					var id = this.id;
					var ajaxUrl = baseUrl+'/sale/ajax?filter='+id;
					var url = baseUrl+'/sale?filter='+id;;
					// console.log(ajaxUrl);
					$.ajax({
						url : ajaxUrl,
						success: function(data){
							$('#posts').html(data);
							window.history.pushState("object or string", "Title", url);
						}
					});
				});
				$(document).on("click", ".pagination a",function(e){
					e.preventDefault();
					var url = $(this).attr('href');

					var baseUrl = window.location.protocol+"//"+window.location.host;

					const urlParams = new URLSearchParams(window.location.search);
					const urlPageParams = new URL(url);

					const pageParam = urlPageParams.searchParams.get('page');
					const filterParam = urlParams.get('filter');
					const searchParam = urlParams.get('term');

					// console.log(searchParam);

					var ajaxUrl = "";

					if (searchParam !== null) {
						ajaxUrl = baseUrl+'/sale/search/ajax?term='+searchParam+'&page='+pageParam;
						baseUrl = baseUrl+'/sale/search?term='+searchParam+'&page='+pageParam;
					} else {
						ajaxUrl = baseUrl+'/sale/ajax?filter='+filterParam+'&page='+pageParam;
						baseUrl = baseUrl+'/sale?filter='+filterParam+'&page='+pageParam;
					}

					// console.log(ajaxUrl);
					// console.log(window.location.search);

					$.ajax({
						url : ajaxUrl,
						success: function(data){
							$('#posts').html(data);
							window.history.pushState("object or string", "Title", baseUrl);
						}
					});
				});
				
				$(document).on("submit", "#searchField", function(e){
					e.preventDefault();
					var baseUrl = window.location.protocol+"//"+window.location.host
					var term = $("#searchProduct").val();
					$.ajax({
						url: baseUrl+"/sale/search/ajax?term="+term,
						success: function(data){
							// console.log(": "+data);
							$('#posts').html(data);
							window.history.pushState("object or string", "Title", baseUrl+"/sale/search?term="+term);
						}
					});
				});

				$(document).on("input", "#searchProduct", function() {
					var url = window.location.protocol+"//"+window.location.host+"/sale/search/autocomplete/"
					$( "#searchProduct" ).autocomplete({
						source: url
					});
				});
			});
			// pagination
			

		</script>


</body>
</html>