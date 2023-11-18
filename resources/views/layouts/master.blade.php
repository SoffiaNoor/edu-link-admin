<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="http://localhost:8000/assets/images/RUNGKAD.png">
    <title>
        RUNGKAD
    </title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="http://localhost:8000/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="http://localhost:8000/assets/css/argon-dashboard.css" rel="stylesheet" />

    <!-- Animasi -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>
<style>
    .fixed-bottom-footer {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        color: white;
        text-align: center;
        padding: 10px 0;
        z-index: 1;
    }

    .sidenav {
        z-index: 999 !important;
    }

    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.9);
        z-index: 9999;
    }

    .loader-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #1B3C5F;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .swing-animation {
        animation: swing 2s infinite ease-in-out;
        max-width: 100px;
    }

    @keyframes swing {
        0% {
            transform: rotate(0deg);
        }

        50% {
            transform: rotate(15deg);
        }

        100% {
            transform: rotate(0deg);
        }
    }
</style>

<body class="g-sidenav-show bg-gray-100">
    {{-- <div class="loader-container">
        <img src="http://localhost:8000/assets/images/RUNGKAD3.png" class="swing-animation" alt="Loading..." />
    </div> --}}
    <div class="min-height-300 position-absolute w-100"></div>
    <span class="mask bg-gradient-warning opacity-10"
        style="background: linear-gradient(45deg, #1b3c5fc9, #1B3C5F);background-size: cover;"></span>
    <aside
        class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="/">
                <img src="/assets/images/RUNGKAD.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bolder">Ruang Akademik</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link mx-3 my-1 text-dark {{ preg_match('/^\/$/', Route::current()->uri) == 1 ? 'bg-gradient-secondary shadow border-radius-xl mx-3 my-1 text-white font-weight-bolder' : '' }}"
                        href="/"
                        style="{{ preg_match('/^\/$/', Route::current()->uri) == 1 ? 'background: linear-gradient(45deg, #1b3c5fc9, #1B3C5F);background-size: cover;' : '' }}">
                        <i class="fa fa-tachometer" aria-hidden="true"></i>
                        <span class="nav-link-text ms-1 font-weight-bold">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-3 my-1 text-dark {{ preg_match('/mahasiswa/',Route::current()->uri) == true ? 'bg-gradient-secondary shadow border-radius-xl mx-3 my-1 text-white font-weight-bolder' : '' }}"
                        href="/mahasiswa"
                        style="{{ preg_match('/mahasiswa/',Route::current()->uri) == true ? 'background: linear-gradient(45deg, #1b3c5fc9, #1B3C5F);background-size: cover;' : '' }}">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span class="nav-link-text ms-1 font-weight-bold">Mahasiswa</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-3 my-1 text-dark {{ preg_match('/mata_kuliah/',Route::current()->uri) == true ? 'bg-gradient-secondary shadow border-radius-xl mx-3 my-1 text-white font-weight-bolder' : '' }}"
                        href="/mata_kuliah"
                        style="{{ preg_match('/mata_kuliah/',Route::current()->uri) == true ? 'background: linear-gradient(45deg, #1b3c5fc9, #1B3C5F);background-size: cover;' : '' }}">
                        <i class="fa fa-bookmark" aria-hidden="true"></i>
                        <span class="nav-link-text ms-1 font-weight-bold">Mata Kuliah</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-3 my-1 text-dark {{ preg_match('/dosen/',Route::current()->uri) == true ? 'bg-gradient-secondary shadow border-radius-xl mx-3 my-1 text-white font-weight-bolder' : '' }}"
                        href="/dosen"
                        style="{{ preg_match('/dosen/',Route::current()->uri) == true ? 'background: linear-gradient(45deg, #1b3c5fc9, #1B3C5F);background-size: cover;' : '' }}">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <span class="nav-link-text ms-1 font-weight-bold">Dosen</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-3 my-1 text-dark {{ preg_match('/ruang/',Route::current()->uri) == true ? 'bg-gradient-secondary shadow border-radius-xl mx-3 my-1 text-white font-weight-bolder' : '' }}"
                        href="/ruang"
                        style="{{ preg_match('/ruang/',Route::current()->uri) == true ? 'background: linear-gradient(45deg, #1b3c5fc9, #1B3C5F);background-size: cover;' : '' }}">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <span class="nav-link-text ms-1 font-weight-bold">Ruang Kelas</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-3 my-1 text-dark {{ preg_match('/tempat/',Route::current()->uri) == true ? 'bg-gradient-secondary shadow border-radius-xl mx-3 my-1 text-white font-weight-bolder' : '' }}"
                        href="/tempat"
                        style="{{ preg_match('/tempat/',Route::current()->uri) == true ? 'background: linear-gradient(45deg, #1b3c5fc9, #1B3C5F);background-size: cover;' : '' }}">
                        <i class="fas fa-map" aria-hidden="true"></i>
                        <span class="nav-link-text ms-1 font-weight-bold">Kelas Mata Kuliah</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-3 my-1 text-dark {{ preg_match('/ambil_kuliah/',Route::current()->uri) == true ? 'bg-gradient-secondary shadow border-radius-xl mx-3 my-1 text-white font-weight-bolder' : '' }}"
                        href="/ambil_kuliah"
                        style="{{ preg_match('/ambil_kuliah/',Route::current()->uri) == true ? 'background: linear-gradient(45deg, #1b3c5fc9, #1B3C5F);background-size: cover;' : '' }}">
                        <i class="fa fa-hand-rock-o" aria-hidden="true"></i>
                        <span class="nav-link-text ms-1 font-weight-bold">Ambil Mata Kuliah</span>
                    </a>
                </li>
                <h6 class="ps-4 my-2 text-uppercase text-xs font-weight-bolder opacity-6">Histori</h6>
                <li class="nav-item">
                    <a class="nav-link mx-3 my-1 text-dark {{ preg_match('/histori_mk/',Route::current()->uri) == true ? 'bg-gradient-secondary shadow border-radius-xl mx-3 my-1 text-white font-weight-bolder' : '' }}"
                        href="/histori_mk"
                        style="{{ preg_match('/histori_mk/',Route::current()->uri) == true ? 'background: linear-gradient(45deg, #1b3c5fc9, #1B3C5F);background-size: cover;' : '' }}">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        <span class="nav-link-text ms-1 font-weight-bold">Audit Mata Kuliah</span>
                    </a>
                </li>
                <h6 class="ps-4 my-2 text-uppercase text-xs font-weight-bolder opacity-6">User Configuration</h6>
                <li class="nav-item">
                    <a class="nav-link mx-3 my-1 text-dark {{ preg_match('/user/',Route::current()->uri) == true ? 'bg-gradient-secondary shadow border-radius-xl mx-3 my-1 text-white font-weight-bolder' : '' }}"
                        href="/user"
                        style="{{ preg_match('/user/',Route::current()->uri) == true ? 'background: linear-gradient(45deg, #1b3c5fc9, #1B3C5F);background-size: cover;' : '' }}">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        <span class="nav-link-text ms-1 font-weight-bold">List User</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="sidenav-footer mx-3 ">
            <div class="card card-plain shadow-none" id="sidenavCard" style="opacity:0">
                <img class="w-50 mx-auto" src="../assets/img/illustrations/icon-documentation.svg"
                    alt="sidebar_illustration">
                <div class="card-body text-center p-3 w-100 pt-0">
                    <div class="docs-info">
                        <h6 class="mb-0">Need help?</h6>
                        <p class="text-xs font-weight-bold mb-0">Please check our docs</p>
                    </div>
                </div>
            </div>
            <a href="/register" target="_blank" class="btn btn-dark btn-sm w-100 mb-3"
                style="background: linear-gradient(45deg, #1b3c5fc9, #1B3C5F);background-size: cover;">Daftar Akun</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-danger btn-sm mb-0 w-100" type="submit">Log Out</button>
            </form>
        </div>
    </aside>
    <main class="main-content position-relative border-radius-lg ">

        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
            data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    @if(request()->path() !== '/')
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white">Ruang Akademik</a></li>
                        @php
                        $urlSegments = explode('/', request()->path());
                        $breadcrumbPath = '';
                        @endphp

                        @foreach($urlSegments as $segment)
                        @php
                        $cleanedSegment = str_replace('_', ' ', $segment);
                        $breadcrumbPath .= "/$segment";
                        @endphp

                        <li class="breadcrumb-item text-sm {{ $loop->last ? 'text-white active' : '' }}">
                            <a href="{{ $breadcrumbPath }}" class="text-white">
                                {{ ucfirst($cleanedSegment) }}
                            </a>
                        </li>
                        @endforeach
                    </ol>
                    <h6 class="font-weight-bolder text-white mb-0">{{ ucfirst($cleanedSegment) }}</h6>
                    @endif
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search"
                                    aria-hidden="true"></i></span>
                            <input type="text" class="form-control" id="searchInput" placeholder="Type here...">
                        </div>
                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a href="/user/{{{$loggedInUser->id}}}" class="nav-link text-white font-weight-bold px-0">
                                <i class="fa fa-user me-sm-1"></i>
                                <span class="d-sm-inline d-none">{{ ucfirst($loggedInUser->name) }}</span>
                            </a>
                        </li>
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>



        @yield('content')
        <footer class="footer pt-3 fixed-bottom-footer">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-12 mb-lg-0 mb-4">
                        <div class="copyright text-center text-xs text-muted text-lg-end"
                            style="color:white!important;opacity:100%!important">
                            © <script>
                                document.write(new Date().getFullYear())
                            </script>,
                            made with <i class="far fa-grin"></i> by
                            <a class="font-weight-bolder text-white">Ruang Akademik</a>
                            for a better SIAKAD.
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </main>



    @yield('jquery')
    <script>
        AOS.init();
    </script>
    <script src="http://localhost:8000/assets/js/core/popper.min.js"></script>
    <script src="http://localhost:8000/assets/js/core/bootstrap.min.js"></script>
    <script src="http://localhost:8000/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="http://localhost:8000/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="http://localhost:8000/assets/js/plugins/chartjs.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
    </script>
    {{-- <script>
        window.addEventListener('load', function () {
        document.querySelector('.loader-container').style.display = 'none';
    });
    </script> --}}
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
    <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317"
        integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA=="
        data-cf-beacon='{"rayId":"81f9fc41bb863e60","version":"2023.10.0","token":"1b7cbb72744b40c580f8633c6b62637e"}'
        crossorigin="anonymous"></script>

    <script>
        const searchInput = document.getElementById("searchInput");
            const tableRows = document.querySelectorAll("table tbody tr");
        
            searchInput.addEventListener("input", function () {
                const searchTerm = searchInput.value.trim().toLowerCase();
        
                tableRows.forEach(row => {
                    const rowData = row.textContent.toLowerCase();
        
                    if (rowData.includes(searchTerm)) {
                        row.style.display = "table-row";
                    } else {
                        row.style.display = "none";
                    }
                });
            });
    </script>
</body>

</html>