<?php $page = 'homepage'; include "./config/include.php"; ?>

<!-- *** stylesheet *** -->
<?php include "./templates/common_css.php"; ?>

<!-- *** javascript *** -->
<?php include "./templates/common_js.php"; ?>
</head>

<body class="appWrapper">
	<div id="wrap" class="animsition">
		<?php include "./templates/header.php"; ?>
		<!-- ====================================================
        ================= CONTENT ===============================
        ===================================================== -->
        <div class="main-content bg-blue-light">
            <!-- breadcrumb -->
            <div class="box-breadcrumb bg-white">
                <div class="container">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item fs-11"><a href="#">TOP</a></li>
                            <li class="breadcrumb-item active fs-11" aria-current="page">マイページ</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- End breadcrumb -->
            <!-- Content  -->
            <div class="main-content-wrap container">
                <div class="row">
                    <div class="sidebar-l col-12 col-md-3">
                        <div class="mypage-cat">
                            <ul>
                                <li class="lnk-item"><a href="#">マイページ</a></li>
                                <li class="lnk-item"><a class="active" href="#">プロフィール</a></li>
                                <li class="lnk-item"><a href="#">応募済み求人</a></li>
                                <li class="lnk-item"><a href="#">気になる求人</a></li>
                                <li class="lnk-item"><a href="#">新着求人メール</a></li>
                                <li class="lnk-item"><a href="#">閲覧履歴</a></li>
                                <li class="lnk-item"><a href="#">設定</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="main-content-r col-12 col-md-9">
                        <div class="content-wrap">
                            <h3 class="stt-title-icon">
                                <svg width="28" height="24" viewBox="0 0 28 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.44596 19.3334V18.4667C3.44596 18.0134 3.6593 17.5868 3.99263 17.3867C6.24596 16.0401 8.8193 15.3334 11.446 15.3334C11.486 15.3334 11.5126 15.3334 11.5526 15.3467C11.686 14.4134 11.9526 13.5201 12.3393 12.7067C12.046 12.6801 11.7526 12.6667 11.446 12.6667C8.2193 12.6667 5.20596 13.5601 2.63263 15.0934C1.4593 15.7867 0.779297 17.0934 0.779297 18.4667V22.0001H13.126C12.566 21.2001 12.126 20.2934 11.8326 19.3334H3.44596Z" fill="#019CCE"/>
                                    <path d="M11.446 11.3334C14.3926 11.3334 16.7793 8.94675 16.7793 6.00008C16.7793 3.05341 14.3926 0.666748 11.446 0.666748C8.4993 0.666748 6.11263 3.05341 6.11263 6.00008C6.11263 8.94675 8.4993 11.3334 11.446 11.3334ZM11.446 3.33341C12.9126 3.33341 14.1126 4.53341 14.1126 6.00008C14.1126 7.46675 12.9126 8.66675 11.446 8.66675C9.9793 8.66675 8.7793 7.46675 8.7793 6.00008C8.7793 4.53341 9.9793 3.33341 11.446 3.33341Z" fill="#019CCE"/>
                                    <path d="M25.7793 16.6667C25.7793 16.3734 25.7393 16.1067 25.6993 15.8267L27.2193 14.4801L25.886 12.1734L23.9526 12.8267C23.526 12.4667 23.046 12.1867 22.5126 11.9867L22.1126 10.0001H19.446L19.046 11.9867C18.5126 12.1867 18.0326 12.4667 17.606 12.8267L15.6726 12.1734L14.3393 14.4801L15.8593 15.8267C15.8193 16.1067 15.7793 16.3734 15.7793 16.6667C15.7793 16.9601 15.8193 17.2267 15.8593 17.5067L14.3393 18.8534L15.6726 21.1601L17.606 20.5067C18.0326 20.8667 18.5126 21.1467 19.046 21.3467L19.446 23.3334H22.1126L22.5126 21.3467C23.046 21.1467 23.526 20.8667 23.9526 20.5067L25.886 21.1601L27.2193 18.8534L25.6993 17.5067C25.7393 17.2267 25.7793 16.9601 25.7793 16.6667ZM20.7793 19.3334C19.3126 19.3334 18.1126 18.1334 18.1126 16.6667C18.1126 15.2001 19.3126 14.0001 20.7793 14.0001C22.246 14.0001 23.446 15.2001 23.446 16.6667C23.446 18.1334 22.246 19.3334 20.7793 19.3334Z" fill="#019CCE"/>
                                </svg>
                                <span>プロフィール</span>
                            </h3>
                            
                            <div class="box-white pd-32 mb-24">
                                <div class="job-apply">
                                    <div class="job-apply-h">
                                        <h4>
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13 0H2C0.9 0 0 0.9 0 2V16C0 17.1 0.9 18 2 18H16C17.1 18 18 17.1 18 16V5L13 0ZM16 16H2V2H12V6H16V16ZM4 14H14V12H4V14ZM9 4H4V6H9V4ZM4 10H14V8H4V10Z" fill="#EC644D"/>
                                            </svg>
                                            基本情報
                                        </h4>
                                        <button type="button" class="btn">もっと見る</button>
                                    </div>
                                    <div id="accordion" class="mp-job-content">
                                        <div class="card card-job box-white mb-24 br-16">
                                            <div class="card-header white-shadow-blue" id="headingOne">
                                                <h4 class="mb-0">
                                                    <button class="card-header--title02" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                            <div class="card-header--title02__desc">
                                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M13 0H2C0.9 0 0 0.9 0 2V16C0 17.1 0.9 18 2 18H16C17.1 18 18 17.1 18 16V5L13 0ZM16 16H2V2H12V6H16V16ZM4 14H14V12H4V14ZM9 4H4V6H9V4ZM4 10H14V8H4V10Z" fill="#EC644D"/>
                                                                </svg>
                                                                
                                                                <div class="card-header--title02__info">
                                                                    <span class="top">基本情報</span>
                                                                    <span class="bottom">完成まで<b class="text-secondary">12</b>項目</span>
                                                                </div>
                                                                
                                                            </div>
                                                            <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M24.885 23.5575L18 16.6875L11.115 23.5575L9 21.4425L18 12.4425L27 21.4425L24.885 23.5575Z" fill="#019CCE"/>
                                                            </svg>
                                                    </button>
                                                </h4>
                                            </div>

                                            <div id="collapseOne" class="collapse card-content" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body">
                                                    <form role="form-tab01" method="POST" action="#" class="mp-form frm-dym">
                                                        <div class="form-group row mb-8">
                                                            <div class="col-12 col-md-4">
                                                                <label class="lbl" for="full-name">氏名 <span class="label-required text-danger">（必須）</span></label>
                                                            </div>
                                                            <div class="col-12 col-md-8 pd-16">
                                                                <div class="row row-mr-s">
                                                                    <div class="col-12 col-md-6 pd-8">
                                                                        <!-- is-invalid -->
                                                                        <input type="text" class="form-control fs-14 lh-24" id="first-name" name="first-name" placeholder="山田">
                                                                        <!-- invalid-feedback -->
                                                                        <span class="form-text d-none" role="alert">
                                                                            パスワードを入力してください
                                                                        </span>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 pd-8">
                                                                        <input type="text" class="form-control fs-14 lh-24" id="last-name" name="last-name" placeholder="花子">
                                                                        <!-- invalid-feedback -->
                                                                        <span class="form-text d-none" role="alert">
                                                                            パスワードを入力してください
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-8">
                                                            <div class="col-12 col-md-4">
                                                                <label class="lbl" for="full-name">ふりがな <span class="label-required text-danger">（必須）</span></label>
                                                            </div>
                                                            <div class="col-12 col-md-8 pd-16">
                                                                <div class="row row-mr-s">
                                                                    <div class="col-12 col-md-6 pd-8">
                                                                        <!-- is-invalid -->
                                                                        <input type="text" class="form-control fs-14 lh-24" id="first-name" name="first-name" placeholder="やまだ">
                                                                        <!-- invalid-feedback -->
                                                                        <span class="form-text d-none" role="alert">
                                                                            パスワードを入力してください
                                                                        </span>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 pd-8">
                                                                        <input type="text" class="form-control fs-14 lh-24" id="last-name" name="last-name" placeholder="はなこ">
                                                                        <!-- invalid-feedback -->
                                                                        <span class="form-text d-none" role="alert">
                                                                            パスワードを入力してください
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-8">
                                                            <div class="col-12 col-md-4">
                                                                <label class="lbl" for="date-of-birth">生年月日 <span class="label-required text-danger">（必須）</span></label>
                                                            </div>
                                                            <div class="col-12 col-md-8 pd-16">
                                                                <div class="row">
                                                                    <div class="col-12 col-md-12">
                                                                        <!-- is-invalid -->
                                                                        <div class="d-flex box-inline-group">
                                                                            <select class="form-control form-control-md fs-14 lh-24" name="year" id="year">
                                                                                <option value="">西暦</option>
                                                                                <option value="2022">2022</option>
                                                                                <option value="2023">2023</option>
                                                                            </select>
                                                                            <select class="form-control form-control-ssm fs-14 lh-24" name="month" id="month">
                                                                                <option value="">月</option>
                                                                                <option value="1">01</option>
                                                                                <option value="2">02</option>
                                                                            </select>
                                                                            <select class="form-control form-control-ssm fs-14 lh-24" name="day" id="day">
                                                                                <option value="">日</option>
                                                                                <option value="1">01</option>
                                                                                <option value="2">02</option>
                                                                            </select>
                                                                        </div>
                                                                        
                                                                        <!-- invalid-feedback -->
                                                                        <span class="form-text d-none" role="alert">
                                                                            パスワードを入力してください
                                                                        </span>
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-8">
                                                            <div class="col-12 col-md-4">
                                                            <label class="lbl" for="gender">性別 <span class="label-required text-danger">（必須）</span></label>
                                                            </div>
                                                            <div class="col-12 col-md-8 pd-16">
                                                                <div class="row">
                                                                    <div class="col-12 col-md-12">
                                                                        <!-- is-invalid -->
                                                                        <div class="d-flex box-inline-group form-check-inline">
                                                                            <div class="form-control form-control-ssm fs-14">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="radio" name="male" id="male" value="1" checked>
                                                                                    <label class="form-check-label" for="male">女性</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-control form-control-ssm fs-14">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="radio" name="male" id="female" value="0">
                                                                                    <label class="form-check-label" for="female">男性</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <!-- invalid-feedback -->
                                                                        <span class="form-text d-none" role="alert">
                                                                            パスワードを入力してください
                                                                        </span>
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-8">
                                                            <div class="col-12 col-md-4">
                                                                <label class="lbl" for="date-of-birth">郵便番号1</label>
                                                            </div>
                                                            <div class="col-12 col-md-8 pd-16">
                                                                <div class="row">
                                                                    <div class="col-12 col-md-12">
                                                                        <!-- is-invalid -->
                                                                        <div class="d-flex box-inline-group">
                                                                            <input type="text" class="form-control form-control-md fs-14 lh-24" id="postal-code" name="postal-code" placeholder="1040033">
                                                                        </div>
                                                                        
                                                                        <!-- invalid-feedback -->
                                                                        <span class="form-text d-none" role="alert">
                                                                            パスワードを入力してください
                                                                        </span>
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-8">
                                                            <div class="col-12 col-md-4">
                                                                <label class="lbl" for="address">住所1 <span class="label-required text-danger">（必須）</span></label>
                                                            </div>
                                                            <div class="col-12 col-md-8 pd-16">
                                                                <div class="row row-mr-s mb-3">
                                                                    <div class="col-12 col-md-8 pd-8">
                                                                        <!-- is-invalid -->
                                                                        <input type="text" class="form-control fs-14 lh-24" name="address1" placeholder="都道府県">
                                                                        <!-- invalid-feedback -->
                                                                        <span class="form-text d-none" role="alert">
                                                                            パスワードを入力してください
                                                                        </span>
                                                                    </div>
                                                                    <div class="col-12 col-md-4 pd-8">
                                                                        <input type="text" class="form-control fs-14 lh-24" name="address2" placeholder="市区町村">
                                                                        <!-- invalid-feedback -->
                                                                        <span class="form-text d-none" role="alert">
                                                                            パスワードを入力してください
                                                                        </span>
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="row row-mr-s mb-3">
                                                                    <div class="col-12 col-md-12 pd-8">
                                                                        <!-- is-invalid -->
                                                                        <input type="text" class="form-control fs-14 lh-24" name="street-bunch" placeholder="町名・番地">
                                                                        <!-- invalid-feedback -->
                                                                        <span class="form-text d-none" role="alert">
                                                                            パスワードを入力してください
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="row row-mr-s mb-3">
                                                                    <div class="col-12 col-md-12 pd-8">
                                                                        <!-- is-invalid -->
                                                                        <input type="text" class="form-control fs-14 lh-24" name="building-name" placeholder="建物名">
                                                                        <!-- invalid-feedback -->
                                                                        <span class="form-text d-none" role="alert">
                                                                            パスワードを入力してください
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-8">
                                                            <div class="col-12 col-md-4">
                                                                <label class="lbl" for="date-of-birth">住所1ふりがな</label>
                                                            </div>
                                                            <div class="col-12 col-md-8 pd-16">
                                                                <div class="row">
                                                                    <div class="col-12 col-md-12">
                                                                        <!-- is-invalid -->
                                                                        <textarea class="form-control form-textarea mb-3" name="" id="" cols="30" rows="2">
                                                                        </textarea>
                                                                        
                                                                        <!-- invalid-feedback -->
                                                                        <span class="form-text d-none" role="alert">
                                                                            パスワードを入力してください
                                                                        </span>
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-8">
                                                            <div class="col-12 col-md-4">
                                                                <label class="lbl" for="phone">電話番号1 <span class="label-required text-danger">（必須）</span></label>
                                                            </div>
                                                            <div class="col-12 col-md-8 pd-16">
                                                                <div class="row">
                                                                    <div class="col-12 col-md-12">
                                                                        <!-- is-invalid -->
                                                                        <div class="d-flex box-inline-group">
                                                                            <input type="text" class="form-control form-control-md fs-14 lh-24" id="phone" name="phone" placeholder="09012345678">
                                                                        </div>
                                                                        
                                                                        <!-- invalid-feedback -->
                                                                        <span class="form-text d-none" role="alert">
                                                                            パスワードを入力してください
                                                                        </span>
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-8">
                                                            <div class="col-12 col-md-4">
                                                                <label class="lbl" for="phone">メールアドレス1</label>
                                                            </div>
                                                            <div class="col-12 col-md-8 pd-16">
                                                                <div class="row">
                                                                    <div class="col-12 col-md-12">
                                                                        <!-- is-invalid -->
                                                                        <div class="d-flex box-inline-group">
                                                                            <p class="info">
                                                                                <span>sample@email.co.jp</span><br />
                                                                                <span>※編集不可<b class="text-primary">「設定」</b>から変更できます</span>
                                                                            </p>
                                                                        </div>
                                                                        
                                                                        <!-- invalid-feedback -->
                                                                        <span class="form-text d-none" role="alert">
                                                                            パスワードを入力してください
                                                                        </span>
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-8">
                                                            <div class="col-12 col-md-4">
                                                                <label class="lbl" for="date-of-birth">郵便番号2</label>
                                                            </div>
                                                            <div class="col-12 col-md-8 pd-16">
                                                                <div class="row">
                                                                    <div class="col-12 col-md-12">
                                                                        <!-- is-invalid -->
                                                                        <div class="d-flex box-inline-group">
                                                                            <input type="text" class="form-control form-control-md fs-14 lh-24 mb-8" name="postal-code2" placeholder="1040033">
                                                                        </div>
                                                                        
                                                                        <!-- invalid-feedback -->
                                                                        <span class="form-text d-none" role="alert">
                                                                            パスワードを入力してください
                                                                        </span>
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-8">
                                                            <div class="col-12 col-md-4">
                                                                <label class="lbl" for="address">住所2</label>
                                                            </div>
                                                            <div class="col-12 col-md-8 pd-16">
                                                                <div class="row row-mr-s mb-3">
                                                                    <div class="col-12 col-md-8 pd-8">
                                                                        <!-- is-invalid -->
                                                                        <input type="text" class="form-control fs-14 lh-24" name="address1" placeholder="都道府県">
                                                                        <!-- invalid-feedback -->
                                                                        <span class="form-text d-none" role="alert">
                                                                            パスワードを入力してください
                                                                        </span>
                                                                    </div>
                                                                    <div class="col-12 col-md-4 pd-8">
                                                                        <input type="text" class="form-control fs-14 lh-24" name="address2" placeholder="市区町村">
                                                                        <!-- invalid-feedback -->
                                                                        <span class="form-text d-none" role="alert">
                                                                            パスワードを入力してください
                                                                        </span>
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="row row-mr-s mb-3">
                                                                    <div class="col-12 col-md-12 pd-8">
                                                                        <!-- is-invalid -->
                                                                        <input type="text" class="form-control fs-14 lh-24" name="street-bunch" placeholder="町名・番地">
                                                                        <!-- invalid-feedback -->
                                                                        <span class="form-text d-none" role="alert">
                                                                            パスワードを入力してください
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="row row-mr-s mb-3">
                                                                    <div class="col-12 col-md-12 pd-8">
                                                                        <!-- is-invalid -->
                                                                        <input type="text" class="form-control fs-14 lh-24" name="building-name" placeholder="建物名">
                                                                        <!-- invalid-feedback -->
                                                                        <span class="form-text d-none" role="alert">
                                                                            パスワードを入力してください
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-8">
                                                            <div class="col-12 col-md-4">
                                                                <label class="lbl" for="date-of-birth">住所2ふりがな</label>
                                                            </div>
                                                            <div class="col-12 col-md-8 pd-16">
                                                                <div class="row">
                                                                    <div class="col-12 col-md-12">
                                                                        <!-- is-invalid -->
                                                                        <textarea class="form-control form-textarea mb-3" name="" id="" cols="30" rows="2">
                                                                        </textarea>
                                                                        
                                                                        <!-- invalid-feedback -->
                                                                        <span class="form-text d-none" role="alert">
                                                                            パスワードを入力してください
                                                                        </span>
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="form-group row mb-8">
                                                            <div class="col-12 col-md-4">
                                                                <label class="lbl" for="phone">電話番号2</label>
                                                            </div>
                                                            <div class="col-12 col-md-8 pd-16">
                                                                <div class="row">
                                                                    <div class="col-12 col-md-12">
                                                                        <!-- is-invalid -->
                                                                        <div class="d-flex box-inline-group">
                                                                            <input type="text" class="form-control form-control-md fs-14 lh-24" id="phone" name="phone" placeholder="09012345678">
                                                                        </div>
                                                                        
                                                                        <!-- invalid-feedback -->
                                                                        <span class="form-text d-none" role="alert">
                                                                            パスワードを入力してください
                                                                        </span>
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-8">
                                                            <div class="col-12 col-md-4">
                                                                <label class="lbl" for="email2">メールアドレス2</label>
                                                            </div>
                                                            <div class="col-12 col-md-8 pd-16">
                                                                <div class="row">
                                                                    <div class="col-12 col-md-12">
                                                                        <!-- is-invalid -->
                                                                        <div class="d-flex box-inline-group">
                                                                            <input type="text" class="form-control form-control-md fs-14 lh-24" id="email2" name="email2" placeholder="sample@email.co.jp">
                                                                        </div>
                                                                        
                                                                        <!-- invalid-feedback -->
                                                                        <span class="form-text d-none" role="alert">
                                                                            パスワードを入力してください
                                                                        </span>
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-8">
                                                            <div class="col-12 col-md-4">
                                                                <label class="lbl" for="date-of-birth">連絡時の注意点</label>
                                                            </div>
                                                            <div class="col-12 col-md-8 pd-16">
                                                                <div class="row">
                                                                    <div class="col-12 col-md-12">
                                                                        <!-- is-invalid -->
                                                                        <textarea class="form-control form-textarea mb-3" name="" id="" cols="30" rows="5">
                                                                        </textarea>
                                                                        
                                                                        <!-- invalid-feedback -->
                                                                        <span class="form-text d-none" role="alert">
                                                                            パスワードを入力してください
                                                                        </span>
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-8">
                                                            <div class="col-12 col-md-4">
                                                            <label class="lbl" for="employement-status">現在の就業状況</label>
                                                            </div>
                                                            <div class="col-12 col-md-8 pd-16">
                                                                <div class="row">
                                                                    <div class="col-12 col-md-12">
                                                                        <!-- is-invalid -->
                                                                        <div class="d-flex box-inline-group form-check-inline">
                                                                            <div class="form-control form-control-ssm fs-14">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="radio" name="employement-status" value="1" checked>
                                                                                    <label class="form-check-label" for="male">就業中</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-control form-control-ssm fs-14">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="radio" name="employement-status" value="0">
                                                                                    <label class="form-check-label" for="female">離職中</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-control form-control-ssm fs-14">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="radio" name="employement-status" value="1" checked>
                                                                                    <label class="form-check-label" for="male">在学中</label>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <!-- invalid-feedback -->
                                                                        <span class="form-text d-none" role="alert">
                                                                            パスワードを入力してください
                                                                        </span>
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-8">
                                                            <div class="col-12 col-md-4">
                                                            <label class="lbl" for="employement-status">資格/取得年月</label>
                                                            </div>
                                                            <div class="col-12 col-md-8 pd-16">
                                                                <div class="box-group">
                                                                    <div class="row mb-14">
                                                                        <div class="col-12 col-md-12">
                                                                            <!-- is-invalid -->
                                                                            <div class="d-flex box-inline-group form-check-inline">
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input" type="checkbox" id="inlChk01" value="1" checked>
                                                                                    <label class="form-check-label" for="inlChk01">医師</label>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                            
                                                                            <!-- invalid-feedback -->
                                                                            <span class="form-text d-none" role="alert">
                                                                                パスワードを入力してください
                                                                            </span>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    <div class="row mb-24">
                                                                        <div class="col-12 col-md-6">
                                                                            <!-- is-invalid -->
                                                                            <select class="form-control fs-14 lh-24" name="year" id="year">
                                                                                <option value="">西暦</option>
                                                                                <option value="2022">2022</option>
                                                                                <option value="2023">2023</option>
                                                                            </select>
                                                                            
                                                                            
                                                                            <!-- invalid-feedback -->
                                                                            <span class="form-text d-none" role="alert">
                                                                                パスワードを入力してください
                                                                            </span>
                                                                        </div>
                                                                        <div class="col-12 col-md-6">
                                                                            <!-- is-invalid -->
                                                                            <select class="form-control fs-14 lh-24" name="month" id="month">
                                                                                <option value="">月</option>
                                                                                <option value="1">01</option>
                                                                                <option value="2">02</option>
                                                                            </select>
                                                                            
                                                                            <!-- invalid-feedback -->
                                                                            <span class="form-text d-none" role="alert">
                                                                                パスワードを入力してください
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-14">
                                                                        <div class="col-12 col-md-12">
                                                                            <!-- is-invalid -->
                                                                            <div class="d-flex box-inline-group form-check-inline">
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input" type="checkbox" id="inlChk02" value="1" checked>
                                                                                    <label class="form-check-label" for="inlChk02">取得予定（1年以内）</label>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                            
                                                                            <!-- invalid-feedback -->
                                                                            <span class="form-text d-none" role="alert">
                                                                                パスワードを入力してください
                                                                            </span>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="box-group">
                                                                    <div class="row mb-14">
                                                                        <div class="col-12 col-md-12">
                                                                            <!-- is-invalid -->
                                                                            <div class="d-flex box-inline-group form-check-inline">
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input" type="checkbox" id="inlChk21" value="1" checked>
                                                                                    <label class="form-check-label" for="inlChk21">薬剤師</label>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                            
                                                                            <!-- invalid-feedback -->
                                                                            <span class="form-text d-none" role="alert">
                                                                                パスワードを入力してください
                                                                            </span>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    <div class="row mb-24">
                                                                        <div class="col-12 col-md-6">
                                                                            <!-- is-invalid -->
                                                                            <select class="form-control fs-14 lh-24" name="year" id="year">
                                                                                <option value="">西暦</option>
                                                                                <option value="2022">2022</option>
                                                                                <option value="2023">2023</option>
                                                                            </select>
                                                                            
                                                                            
                                                                            <!-- invalid-feedback -->
                                                                            <span class="form-text d-none" role="alert">
                                                                                パスワードを入力してください
                                                                            </span>
                                                                        </div>
                                                                        <div class="col-12 col-md-6">
                                                                            <!-- is-invalid -->
                                                                            <select class="form-control fs-14 lh-24" name="month" id="month">
                                                                                <option value="">月</option>
                                                                                <option value="1">01</option>
                                                                                <option value="2">02</option>
                                                                            </select>
                                                                            
                                                                            <!-- invalid-feedback -->
                                                                            <span class="form-text d-none" role="alert">
                                                                                パスワードを入力してください
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-14">
                                                                        <div class="col-12 col-md-12">
                                                                            <!-- is-invalid -->
                                                                            <div class="d-flex box-inline-group form-check-inline">
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input" type="checkbox" id="inlChk22" value="1" checked>
                                                                                    <label class="form-check-label" for="inlChk22">取得予定（1年以内）</label>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                            
                                                                            <!-- invalid-feedback -->
                                                                            <span class="form-text d-none" role="alert">
                                                                                パスワードを入力してください
                                                                            </span>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="box-group">
                                                                    <div class="row mb-14">
                                                                        <div class="col-12 col-md-12">
                                                                            <!-- is-invalid -->
                                                                            <div class="d-flex box-inline-group form-check-inline">
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input" type="checkbox" id="inlChk31" value="1" checked>
                                                                                    <label class="form-check-label" for="inlChk31">自動車運転免許</label>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                            
                                                                            <!-- invalid-feedback -->
                                                                            <span class="form-text d-none" role="alert">
                                                                                パスワードを入力してください
                                                                            </span>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    <div class="row mb-24">
                                                                        <div class="col-12 col-md-6">
                                                                            <!-- is-invalid -->
                                                                            <select class="form-control fs-14 lh-24" name="year" id="year">
                                                                                <option value="">西暦</option>
                                                                                <option value="2022">2022</option>
                                                                                <option value="2023">2023</option>
                                                                            </select>
                                                                            
                                                                            
                                                                            <!-- invalid-feedback -->
                                                                            <span class="form-text d-none" role="alert">
                                                                                パスワードを入力してください
                                                                            </span>
                                                                        </div>
                                                                        <div class="col-12 col-md-6">
                                                                            <!-- is-invalid -->
                                                                            <select class="form-control fs-14 lh-24" name="month" id="month">
                                                                                <option value="">月</option>
                                                                                <option value="1">01</option>
                                                                                <option value="2">02</option>
                                                                            </select>
                                                                            
                                                                            <!-- invalid-feedback -->
                                                                            <span class="form-text d-none" role="alert">
                                                                                パスワードを入力してください
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-14">
                                                                        <div class="col-12 col-md-12">
                                                                            <!-- is-invalid -->
                                                                            <div class="d-flex box-inline-group form-check-inline">
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input" type="checkbox" id="inlChk32" value="1" checked>
                                                                                    <label class="form-check-label" for="inlChk32">取得予定（1年以内）</label>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                            
                                                                            <!-- invalid-feedback -->
                                                                            <span class="form-text d-none" role="alert">
                                                                                パスワードを入力してください
                                                                            </span>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="form-control mb-3">
                                                                    <div class="row mb-14">
                                                                        <div class="col-12 col-md-12">
                                                                            <!-- is-invalid -->
                                                                            <div class="d-flex box-inline-group form-check-inline">
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input" type="checkbox" id="inlChk41" value="1" checked>
                                                                                    <label class="form-check-label" for="inlChk41">資格を持っていない</label>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                            
                                                                            <!-- invalid-feedback -->
                                                                            <span class="form-text d-none" role="alert">
                                                                                パスワードを入力してください
                                                                            </span>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="box-btn">
                                                                    <button type="button" class="btn">上記以外の資格を追加する</button>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-8">
                                                            <div class="col-12 col-md-4">
                                                                <label class="lbl" for="station-name">自宅最寄駅</label>
                                                            </div>
                                                            <div class="col-12 col-md-8 pd-16">
                                                                <div class="row mb-3">
                                                                    <div class="col-12 col-md-12">
                                                                        <!-- is-invalid -->
                                                                        <select class="form-control fs-14 lh-24" name="station-name">
                                                                            <option value="">東京都</option>
                                                                            <option value="2022">2022</option>
                                                                            <option value="2023">2023</option>
                                                                        </select>
                                                                        <!-- invalid-feedback -->
                                                                        <span class="form-text d-none" role="alert">
                                                                            パスワードを入力してください
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-12 col-md-12">
                                                                        <!-- is-invalid -->
                                                                        <select class="form-control fs-14 lh-24" name="route-name">
                                                                            <option value="">路線</option>
                                                                            <option value="2022">2022</option>
                                                                            <option value="2023">2023</option>
                                                                        </select>
                                                                        <!-- invalid-feedback -->
                                                                        <span class="form-text d-none" role="alert">
                                                                            パスワードを入力してください
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-12 col-md-12">
                                                                        <!-- is-invalid -->
                                                                        <select class="form-control fs-14 lh-24" name="station-name">
                                                                            <option value="">駅</option>
                                                                            <option value="2022">2022</option>
                                                                            <option value="2023">2023</option>
                                                                        </select>
                                                                        <!-- invalid-feedback -->
                                                                        <span class="form-text d-none" role="alert">
                                                                            パスワードを入力してください
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-12 col-md-12">
                                                                        <!-- is-invalid -->
                                                                        <div class="d-flex box-inline-group form-check-inline box-inline-featured">
                                                                            <label class="form-check-label">から</label>
                                                                            <select class="form-control fs-14 lh-24" name="station-name">
                                                                                <option value="">徒歩</option>
                                                                                <option value="2022">2022</option>
                                                                                <option value="2023">2023</option>
                                                                            </select>
                                                                            <label class="form-check-label">で</label>
                                                                            <input class="form-control form-control-ssm" type="text" name="employement-status">
                                                                            <label class="form-check-label" for="male">分</label>
                                                                        </div>
                                                                        <!-- invalid-feedback -->
                                                                        <span class="form-text d-none" role="alert">
                                                                            パスワードを入力してください
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-8">
                                                            <div class="col-12 col-md-4">
                                                                <label class="lbl" for="dependents-name">扶養家族</label>
                                                            </div>
                                                            <div class="col-12 col-md-8 pd-16">
                                                                <div class="row">
                                                                    <div class="col-12 col-md-12">
                                                                        <!-- is-invalid -->
                                                                        <div class="d-flex box-inline-group form-check-inline box-inline-featured">
                                                                            <input class="form-control form-control-ssm" type="text" name="dependents-name">
                                                                            <label class="form-check-label" for="dependents-name">人</label>
                                                                        </div>
                                                                        <!-- invalid-feedback -->
                                                                        <span class="form-text d-none" role="alert">
                                                                            パスワードを入力してください
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-8">
                                                            <div class="col-12 col-md-4">
                                                            <label class="lbl" for="gender">配偶者</label>
                                                            </div>
                                                            <div class="col-12 col-md-8 pd-16">
                                                                <div class="row">
                                                                    <div class="col-12 col-md-12">
                                                                        <!-- is-invalid -->
                                                                        <div class="d-flex box-inline-group form-check-inline">
                                                                            <div class="form-control form-control-ssm fs-14">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="radio" name="spouse" value="1" checked>
                                                                                    <label class="form-check-label" for="spouse">あり</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-control form-control-ssm fs-14">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="radio" name="malspousee" value="0">
                                                                                    <label class="form-check-label" for="spouse">なし</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <!-- invalid-feedback -->
                                                                        <span class="form-text d-none" role="alert">
                                                                            パスワードを入力してください
                                                                        </span>
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-8">
                                                            <div class="col-12 col-md-4">
                                                            <label class="lbl" for="gender">顔写真</label>
                                                            </div>
                                                            <div class="col-12 col-md-8 pd-16">
                                                                <div class="row mb-3">
                                                                    <div class="col-12 col-md-12">
                                                                        <!-- is-invalid -->
                                                                        <p class="mp-featured"><img src="./static/img/mypage/img-mypage-profile.png" alt="image featured" /></p>
                                                                        <div class="box-btn mb-3">
                                                                            <button type="button" class="btn">写真をアップロードする</button>
                                                                        </div>
                                                                        <p class="desc">※単身胸から上。３ヶ月以内位に撮影されたものを使用してください</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-8">
                                                            <div class="col-12 col-md-4">
                                                            <label class="lbl" for="gender">自己PR</label>
                                                            </div>
                                                            <div class="col-12 col-md-8 pd-16">
                                                                <p class="desc mb-2">特技、好きな学科、アピールポイントなど</p>
                                                                <textarea class="form-control form-textarea" name="" id="" cols="30" rows="5">
                                                                大学で薬学科を卒業後、国家資格を習得し、6年間大学病院の薬剤師として、努めてまいりました。
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                        <div class="box-btn-bottom d-flex justify-content-center">
                                                            <button type="button" class="btn btn-primary mt-2 d-flex justify-content-center">
                                                                プロフィール一覧を見る
                                                            </button>
                                                            <button type="button" class="btn btn-default mt-2 d-flex justify-content-center">
                                                                保存して確認する
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card card-job white-shadow-blue mb-24 br-16">
                                            <div class="card-header white-shadow-blue" id="headingTwo">
                                                <h4 class="mb-0">
                                                    <button class="card-header--title02" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                            <div class="card-header--title02__desc">
                                                                <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M11 0L0 6L4 8.18V14.18L11 18L18 14.18V8.18L20 7.09V14H22V6L11 0ZM17.82 6L11 9.72L4.18 6L11 2.28L17.82 6ZM16 12.99L11 15.72L6 12.99V9.27L11 12L16 9.27V12.99Z" fill="#EC644D"/>
                                                                </svg>

                                                                <div class="card-header--title02__info">
                                                                    <span class="top">学歴</span>
                                                                    <span class="bottom">完成まで<b class="text-secondary">6</b>項目</span>
                                                                </div>
                                                                
                                                            </div>
                                                            <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M24.885 23.5575L18 16.6875L11.115 23.5575L9 21.4425L18 12.4425L27 21.4425L24.885 23.5575Z" fill="#019CCE"/>
                                                            </svg>
                                                    </button>
                                                </h4>
                                            </div>
                                            <div id="collapseTwo" class="collapse show card-content" aria-labelledby="headingTwo" data-parent="#accordion">
                                                <div class="card-body">
                                                    <form role="form-tab02" method="POST" action="#" class="mp-form frm-dym">
                                                        <div class="form-group row mb-8">
                                                            <div class="col-12 col-md-4">
                                                                <label class="lbl" for="final-education">最終学歴</label>
                                                            </div>
                                                            <div class="col-12 col-md-8 pd-16">
                                                                <div class="row row-mr-s">
                                                                    <div class="col-12 col-md-6 pd-8">
                                                                        <!-- is-invalid -->
                                                                        <select class="form-control fs-14 lh-24" name="final-education">
                                                                            <option value="">高等学校</option>
                                                                            <option value="">高等学校</option>
                                                                            <option value="">高等学校</option>
                                                                        </select>
                                                                        <!-- invalid-feedback -->
                                                                        <span class="form-text d-none" role="alert">
                                                                            パスワードを入力してください
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-8">
                                                            <div class="col-12 col-md-4">
                                                                <label class="lbl" for="school-name">学校名</label>
                                                            </div>
                                                            <div class="col-12 col-md-8 pd-16">
                                                                <div class="row row-mr-s">
                                                                    <div class="col-12 col-md-12 pd-8">
                                                                        <!-- is-invalid -->
                                                                        <input type="text" class="form-control" name="school-name" placeholder="〇〇大学">
                                                                        <!-- invalid-feedback -->
                                                                        <span class="form-text d-none" role="alert">
                                                                            パスワードを入力してください
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-8">
                                                            <div class="col-12 col-md-4">
                                                                <label class="lbl" for="school-name">学部・学科</label>
                                                            </div>
                                                            <div class="col-12 col-md-8 pd-16">
                                                                <div class="row row-mr-s">
                                                                    <div class="col-12 col-md-12 pd-8">
                                                                        <!-- is-invalid -->
                                                                        <input type="text" class="form-control" name="school-name" placeholder="〇〇大学">
                                                                        <!-- invalid-feedback -->
                                                                        <span class="form-text d-none" role="alert">
                                                                            パスワードを入力してください
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-8">
                                                            <div class="col-12 col-md-4">
                                                                <label class="lbl" for="school-name">専攻</label>
                                                            </div>
                                                            <div class="col-12 col-md-8 pd-16">
                                                                <div class="row row-mr-s">
                                                                    <div class="col-12 col-md-12 pd-8">
                                                                        <!-- is-invalid -->
                                                                        <input type="text" class="form-control" name="school-name" placeholder="〇〇大学">
                                                                        <!-- invalid-feedback -->
                                                                        <span class="form-text d-none" role="alert">
                                                                            パスワードを入力してください
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-8">
                                                            <div class="col-12 col-md-4">
                                                                <label class="lbl" for="graduation-category">卒業区分</label>
                                                            </div>
                                                            <div class="col-12 col-md-8 pd-16">
                                                                <div class="row row-mr-s">
                                                                    <div class="col-12 col-md-6 pd-8">
                                                                        <!-- is-invalid -->
                                                                        <select class="form-control form-control-md fs-14 lh-24" name="graduation-category">
                                                                            <option value="">卒業</option>
                                                                            <option value="">卒業</option>
                                                                            <option value="">卒業</option>
                                                                        </select>
                                                                        <!-- invalid-feedback -->
                                                                        <span class="form-text d-none" role="alert">
                                                                            パスワードを入力してください
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-8">
                                                            <div class="col-12 col-md-4">
                                                                <label class="lbl">卒業年月</label>
                                                            </div>
                                                            <div class="col-12 col-md-8 pd-16">
                                                                <div class="row">
                                                                    <div class="col-12 col-md-12 mb-3">
                                                                        <!-- is-invalid -->
                                                                        <div class="d-flex box-inline-featured">
                                                                            <select class="form-control form-control-md fs-14 lh-24" name="graduation-year">
                                                                                <option value="">西暦</option>
                                                                                <option value="2022">2022</option>
                                                                                <option value="2023">2023</option>
                                                                            </select>
                                                                            <label class="lbl">年</label>
                                                                            <select class="form-control form-control-ssm fs-14 lh-24" name="graduation-month">
                                                                                <option value="">月</option>
                                                                                <option value="1">01</option>
                                                                                <option value="2">02</option>
                                                                            </select>
                                                                            <label class="lbl">月</label>
                                                                        </div>
                                                                        
                                                                        <!-- invalid-feedback -->
                                                                        <span class="form-text d-none" role="alert">
                                                                            パスワードを入力してください
                                                                        </span>
                                                                    </div>
                                                                    <div class="col-12 col-md-12">
                                                                        <p class="text-primary fs-12">卒業区分が「卒業」「中退」の場合は、卒業年月に過去の年月を登録してください</p>
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="box-btn-bottom d-flex justify-content-center">
                                                            <button type="button" class="btn btn-primary mt-2 d-flex justify-content-center">
                                                                プロフィール一覧を見る
                                                            </button>
                                                            <button type="button" class="btn btn-default mt-2 d-flex justify-content-center">
                                                                保存して確認する
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card card-job white-shadow-blue mb-24 br-16">
                                            <div class="card-header white-shadow-blue" id="headingThree">
                                                <h4 class="mb-0">
                                                    <button class="card-header--title02" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                                            <div class="card-header--title02__desc">
                                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M12 4.5V2.5H8V4.5H12ZM2 6.5V17.5H18V6.5H2ZM18 4.5C19.11 4.5 20 5.39 20 6.5V17.5C20 18.61 19.11 19.5 18 19.5H2C0.89 19.5 0 18.61 0 17.5L0.00999999 6.5C0.00999999 5.39 0.89 4.5 2 4.5H6V2.5C6 1.39 6.89 0.5 8 0.5H12C13.11 0.5 14 1.39 14 2.5V4.5H18Z" fill="#EC644D"/>
                                                                </svg>
                                                                <div class="card-header--title02__info">
                                                                    <span class="top">職務経歴</span>
                                                                    <span class="bottom">完成まで<b class="text-secondary">6</b>項目</span>
                                                                </div>
                                                                
                                                            </div>
                                                            <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M24.885 23.5575L18 16.6875L11.115 23.5575L9 21.4425L18 12.4425L27 21.4425L24.885 23.5575Z" fill="#019CCE"/>
                                                            </svg>
                                                    </button>
                                                </h4>
                                            </div>
                                            <div id="collapseThree" class="collapse card-content" aria-labelledby="headingThree" data-parent="#accordion">
                                                <div class="card-body">
                                                    content 3
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
            </div>
            <!-- End Content -->
        </div>
        <!--/ CONTENT -->
		<?php include "./templates/footer.php"; ?>
	</div>		
<!--/ Application Content -->


        <!-- ============================================
        ============== Vendor JavaScripts ===============
        ============================================= -->


        <!-- ============================================
        ============== Custom JavaScripts ===============
        ============================================= -->
        <?php include "./templates/common_js.php"; ?>
        
        <!--/ custom javascripts -->
\

        <!-- ===============================================
        ============== Page Specific Scripts ===============
        ================================================ -->
        <!--/ Page Specific Scripts -->

    </body>
</html>