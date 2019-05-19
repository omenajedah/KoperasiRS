<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Koperasi Rumah Sakit</title>


    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sticky-footer-navbar/"> -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600">



    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script language="JavaScript" src="js/index.js"></script>
    <script language="JavaScript" src="js/affine.js"></script>
    <script language="JavaScript" src="js/util.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        window.onload = function() {
            if (!document.getElementById || !window.jQuery) {
                alert('Sorry, you need a newer browser.');
                return;
            }

            start_update();
        }

        function sl(kd) {
            $.ajax({
                type: "GET",
                url: "http://localhost/koperasi(kopwali)/getanggota.php?kd=" + kd,
                cache: false,
                //data: $("#add_izin").serialize(),
                dataType: "html",
                success: function(respond) {
                    $("#nama").val(respond);
                }
            })
        }

        function ch(id) {
            if (id == 'JS000001') {
                $("#totalS").val('30000');
                $("#totalT").val('30000');
            } else if (id == 'JS000002') {
                $("#totalS").val('50000');
                $("#totalT").val('50000');
            } else if (id == 'JS000003') {
                $("#totalS").val('');
                $("#totalT").val('');
            } else if(id == 'JP000001'){
                $("#totalS").val('1500000');
                $("#bunga").val('1.5%');
                var bng = 1500000*(1.5/100);
                var tot = 1500000 + bng;
                $("#totalT").val(tot);
            }else if(id == 'JP000002'){
                $("#totalS").val('4000000');
                $("#bunga").val('1.5%');
                var bng = 4000000*(1.5/100);
                var tot = 4000000 + bng;
                $("#totalT").val(tot);
            }else if(id == 'JP000003'){
                $("#totalS").val('10000000');
                $("#bunga").val('1.5%');
                var bng = 10000000*(1.5/100);
                var tot = 10000000 + bng;
                $("#totalT").val(tot);
            }
        }

        function start_update() {
            if ((!document.Affine_Loaded) || (!document.Util_Loaded) ||
                (!document.getElementById('affine'))) {
                window.setTimeout('start_update()', 100);
                return;
            }
            upd();
        }


        function upd() {
            if (IsUnchanged(document.encoder.a) * IsUnchanged(document.encoder.b) *
                IsUnchanged(document.encoder.encdec) *
                IsUnchanged(document.encoder.text)) {
                window.setTimeout('upd()', 100);
                return;
            }

            var e = document.getElementById('affine');

            if (document.encoder.text.value == '') {
                e.value = 'Isi Planning Text, dan lihat hasilnya disini!';
            } else if (!IsCoprime(document.encoder.a.value * 1, 26)) {
                e.value = 'The value for "a" is not coprime to 26.  Pick another.';
            } else {
                e.value = SwapSpaces(HTMLEscape(Affine(document.encoder.encdec.value * 1,
                    document.encoder.text.value,
                    document.encoder.a.value * 1, document.encoder.b.value * 1)));
            }

            window.setTimeout('upd()', 100);
        }

        function a_plus() {
            var a = document.encoder.a.value;
            if (a < 1) {
                a = 1;
            } else {
                a++;
                while (!IsCoprime(a, 26)) {
                    a++;
                }
            }
            document.encoder.a.value = a;
        }

        function a_minus() {
            var a = document.encoder.a.value;
            if (a < 2) {
                a = 1;
            } else {
                a--;
                while (!IsCoprime(a, 26)) {
                    a--;
                }
            }
            document.encoder.a.value = a;
        }
    </script>
<!--     <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style> -->
    <!-- Custom styles for this template -->
</head>

<body class="d-flex flex-column h-100">
    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href=".">
                <img class="navbar-brand" src="img/icon-navbar.png" alt="logo" width="50" height="50">
                Rumah Sakit
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <?php if (!$isLogin) {?>
                        <li class='<?php echo ($menu == 'home' ? "nav-item active" : "nav-item"); ?>'>
                            <a class="nav-link" href="/koperasi">Home
                                <?php if ($menu == 'home') {?>
                                    <span class="sr-only">(current)</span>
                                <?php }?>
                            </a>
                        </li>
                        <li class='<?php echo ($menu == 'login' ? "nav-item active" : "nav-item"); ?>'>
                            <a class="nav-link" href="/koperasi/login">Login
                                <?php if ($menu == 'login') {?>
                                    <span class="sr-only">(current)</span>
                                <?php }?>
                            </a>
                        </li>
                    <?php } else {?>
                        <li class='<?php echo ($menu == 'anggota' ? "nav-item active" : "nav-item"); ?>'>
                            <a class="nav-link" href="/koperasi/anggota">Anggota
                                <?php if ($menu == 'anggota') {?>
                                    <span class="sr-only">(current)</span>
                                <?php }?>
                            </a>
                        </li>
                        <li class='<?php echo ($menu == 'simpanan' ? "nav-item active" : "nav-item"); ?>'>
                            <a class="nav-link" href="/koperasi/simpanan">Simpanan
                                <?php if ($menu == 'simpanan') {?>
                                    <span class="sr-only">(current)</span>
                                <?php }?>
                            </a>
                        </li>
                        <li class='<?php echo ($menu == 'pinjaman' ? "nav-item active" : "nav-item"); ?>'>
                            <a class="nav-link" href="/koperasi/pinjaman">Pinjaman
                                <?php if ($menu == 'pinjaman') {?>
                                    <span class="sr-only">(current)</span>
                                <?php }?>
                            </a>
                        </li>
                        <li class='<?php echo ($menu == 'angsuran' ? "nav-item active" : "nav-item"); ?>'>
                            <a class="nav-link" href="/koperasi/angsuran">Angsuran
                                <?php if ($menu == 'angsuran') {?>
                                    <span class="sr-only">(current)</span>
                                <?php }?>
                            </a>
                        </li>
                        <li class='<?php echo ($menu == 'kwitansi' ? "nav-item active" : "nav-item"); ?>'>
                            <a class="nav-link" href="/koperasi/kwitansi">Kwitansi
                                <?php if ($menu == 'kwitansi') {?>
                                    <span class="sr-only">(current)</span>
                                <?php }?>
                            </a>
                        </li>
                        <li class='<?php echo ($menu == 'help' ? "nav-item active" : "nav-item"); ?>'>
                            <a class="nav-link" href="/koperasi/help">Help
                                <?php if ($menu == 'help') {?>
                                    <span class="sr-only">(current)</span>
                                <?php }?>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                                                                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                                                                </li> -->

                    <?php }?>
                </ul>

                <?php if ($isLogin) {?>
                    <form class="form-inline mt-2 mt-md-0" action="/koperasi/logout" method="post">
                        <p class="navbar-text mr-sm-2 nav-welcome">Selamat datang, <?php echo $nama_anggota; ?></p>
                        <!-- <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search"> -->
                        <button id="logout" class="btn btn-outline-success my-2 my-sm-0" type="button">Logout <i class="icon-signout"></i></button>
                    </form>
                <?php }?>
            </div>
        </nav>
    </header>

    <!-- Begin page content -->
    <main role="main" class="flex-shrink-0">
        <div class="container">
            <div class="container-wrapper">

                <!-- content menu -->
                <?php include 'content.php';?>

            </div>
            <!-- <h1 class="mt-5">Sticky footer with fixed navbar</h1> -->
            <!-- <p class="lead">Pin a footer to the bottom of the viewport in desktop browsers with this custom HTML and CSS. A fixed navbar has been added with <code>padding-top: 60px;</code> on the <code>main &gt; .container</code>.</p> -->
            <!-- <p>Back to <a href="/docs/4.3/examples/sticky-footer/">the default sticky footer</a> minus the navbar.</p> -->
        </div>
    </main>

    <footer class="footer mt-auto py-3">
        <div class="container">
            <span class="text-muted">Universitas Budiluhur &copy; <?php echo date('Y'); ?>.</span>
        </div>
    </footer>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>

</body>
</html>