<?php $page = 'homepage'; include "./config/include.php"; ?>

<!-- *** stylesheet *** -->
<?php include "./templates/common_css.php"; ?>
<link type="text/css" href="static/css/slick.css" rel="stylesheet">
<link type="text/css" href="static/css/slick-theme.css" rel="stylesheet">

<!-- *** javascript *** -->
<?php include "./templates/common_js.php"; ?>
</head>

<body class="appWrapper">
	<div id="wrap" class="animsition">
		<?php include "./templates/header.php"; ?>
		<!-- ====================================================
        ================= CONTENT ===============================
        ===================================================== -->
        <section id="contents" class="main-content home">
        	
            <?php include "./components/category.php"; ?>
            
        </section>
        <!--/ CONTENT -->
		<?php include "./templates/footer.php"; ?>
	</div>		
<!--/ Application Content -->


        <!-- ============================================
        ============== Vendor JavaScripts ===============
        ============================================= -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="assets/js/vendor/bootstrap/bootstrap.min.js"></script>

        <script src="assets/js/vendor/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/js/vendor/daterangepicker/daterangepicker.js"></script>

        <!-- ============================================
        ============== Custom JavaScripts ===============
        ============================================= -->
        <script src="assets/js/main.js"></script>
        <!--/ custom javascripts -->
\

        <!-- ===============================================
        ============== Page Specific Scripts ===============
        ================================================ -->
        <!--/ Page Specific Scripts -->

    </body>
</html>