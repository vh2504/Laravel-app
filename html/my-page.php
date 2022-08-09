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
                                <li class="lnk-item"><a class="active" href="#">マイページ</a></li>
                                <li class="lnk-item"><a href="#">プロフィール</a></li>
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
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 12C14.2 12 16 10.2 16 8C16 5.8 14.2 4 12 4C9.8 4 8 5.8 8 8C8 10.2 9.8 12 12 12ZM12 6.66667C12.7333 6.66667 13.3333 7.26667 13.3333 8C13.3333 8.73333 12.7333 9.33333 12 9.33333C11.2667 9.33333 10.6667 8.73333 10.6667 8C10.6667 7.26667 11.2667 6.66667 12 6.66667ZM20 18.1067C20 14.7733 14.7067 13.3333 12 13.3333C9.29333 13.3333 4 14.7733 4 18.1067V20H20V18.1067ZM7.30667 17.3333C8.29333 16.6533 10.28 16 12 16C13.72 16 15.7067 16.6533 16.6933 17.3333H7.30667ZM21.3333 0H2.66667C1.18667 0 0 1.2 0 2.66667V21.3333C0 22.8 1.18667 24 2.66667 24H21.3333C22.8 24 24 22.8 24 21.3333V2.66667C24 1.2 22.8 0 21.3333 0ZM21.3333 21.3333H2.66667V2.66667H21.3333V21.3333Z" fill="#019CCE"/>
                                </svg>
                                <span>マイページ</span>
                            </h3>
                            <div class="box-white pd-32 d-flex w-100 justify-content-center flex-column align-items-center mb-24">
                                <h4 class="text-primary text-b">プロフィールを充実させてスカウトを受け取りましょう！</h4>
                                <p>プロフィールから職務経歴書を作成できます。</p>
                                <button type="button" class="btn btn-primary">
                                プロフィールの入力はこちら
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.5293 11.06L8.58263 8L5.5293 4.94L6.4693 4L10.4693 8L6.4693 12L5.5293 11.06Z" fill="white"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="box-white pd-32 mb-24">
                                <div class="job-apply">
                                    <div class="job-apply-h">
                                        <h4>
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.5 18.5V7.5H19.5V10.79C20.22 11.01 20.9 11.33 21.5 11.76V7.5C21.5 6.39 20.61 5.5 19.5 5.5H15.5V3.5C15.5 2.39 14.61 1.5 13.5 1.5H9.5C8.39 1.5 7.5 2.39 7.5 3.5V5.5H3.5C2.39 5.5 1.51 6.39 1.51 7.5L1.5 18.5C1.5 19.61 2.39 20.5 3.5 20.5H11.18C10.88 19.88 10.68 19.21 10.58 18.5H3.5ZM9.5 3.5H13.5V5.5H9.5V3.5Z" fill="#EC644D"/>
                                                <path d="M17.5 12.5C14.74 12.5 12.5 14.74 12.5 17.5C12.5 20.26 14.74 22.5 17.5 22.5C20.26 22.5 22.5 20.26 22.5 17.5C22.5 14.74 20.26 12.5 17.5 12.5ZM19.15 19.85L17 17.7V14.5H18V17.29L19.85 19.14L19.15 19.85Z" fill="#EC644D"/>
                                            </svg>
                                            応募済み求人
                                        </h4>
                                        <button type="button" class="btn">もっと見る</button>
                                    </div>
                                    <div id="accordion" class="mp-job-content">
                                        <div class="card card-job white-shadow-blue mb-24 br-16">
                                            <div class="card-header white-shadow-blue" id="headingOne">
                                                <h5 class="mb-0">
                                                    <button class="card-header--title" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    <span>HADA LOUNGEスマルナクリニック 新宿院</span>
                                                    <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M24.885 23.5575L18 16.6875L11.115 23.5575L9 21.4425L18 12.4425L27 21.4425L24.885 23.5575Z" fill="#019CCE"/>
                                                    </svg>
                                                    </button>
                                                </h5>
                                            </div>

                                            <div id="collapseOne" class="collapse show card-content" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">応募日時</th>
                                                                <td>2022/06/30</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">募集職種</th>
                                                                <td>薬剤師</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">給与</th>
                                                                <td>正社員 月給296,500円〜343,000円</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">アクセス</th>
                                                                <td>東京都千代田区神田美土代町○○<br />
                                                                東京メトロ〇〇線<br />
                                                                〇〇駅から徒歩〇分<br />
                                                                JR〇〇線〇〇駅から徒歩○分</td>
                                                            </tr>
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card card-job white-shadow-blue mb-24 br-16">
                                            <div class="card-header white-shadow-blue" id="headingTwo">
                                            <h5 class="mb-0">
                                                <button class="card-header--title collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                <span>王子リボン歯科・矯正歯科 </span>
                                                <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M24.885 23.5575L18 16.6875L11.115 23.5575L9 21.4425L18 12.4425L27 21.4425L24.885 23.5575Z" fill="#019CCE"/>
                                                </svg>

                                                </button>
                                            </h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse card-content" aria-labelledby="headingTwo" data-parent="#accordion">
                                            <div class="card-body">
                                                content 2
                                            </div>
                                            </div>
                                        </div>
                                        <div class="card card-job white-shadow-blue mb-24 br-16">
                                            <div class="card-header white-shadow-blue" id="headingThree">
                                            <h5 class="mb-0">
                                                <button class="card-header--title collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                <span>おい歯科 イオンスタイル板橋前野町医院</span>
                                                <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M24.885 23.5575L18 16.6875L11.115 23.5575L9 21.4425L18 12.4425L27 21.4425L24.885 23.5575Z" fill="#019CCE"/>
                                                </svg>
                                                </button>
                                            </h5>
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
                            <div class="box-white pd-32 mb-24">
                                <div class="job-apply">
                                    <div class="job-apply-h">
                                        <h4>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14 6.5V4.5H10V6.5H14ZM4 8.5V19.5H20V8.5H4ZM20 6.5C21.11 6.5 22 7.39 22 8.5V19.5C22 20.61 21.11 21.5 20 21.5H4C2.89 21.5 2 20.61 2 19.5L2.01 8.5C2.01 7.39 2.89 6.5 4 6.5H8V4.5C8 3.39 8.89 2.5 10 2.5H14C15.11 2.5 16 3.39 16 4.5V6.5H20Z" fill="#EC644D"/>
                                        <path d="M11.9993 17.0583L11.516 16.6183C9.79935 15.0617 8.66602 14.035 8.66602 12.775C8.66602 11.7483 9.47268 10.9417 10.4993 10.9417C11.0793 10.9417 11.636 11.2117 11.9993 11.6383C12.3627 11.2117 12.9193 10.9417 13.4993 10.9417C14.526 10.9417 15.3327 11.7483 15.3327 12.775C15.3327 14.035 14.1993 15.0617 12.4827 16.6217L11.9993 17.0583Z" fill="#EC644D"/>
                                        </svg>

                                            気になる求人
                                        </h4>
                                        <button type="button" class="btn">もっと見る</button>
                                    </div>
                                    <div class="mp-job-content">
                                        <div class="job-featured d-flex">
                                            <p class="job-featured-img mb-0"><img src="./static/img/mypage/img-my-job.png" alt="image featured" /></p>
                                            <div class="job-featured-desc">
                                                <h4>HADA LOUNGEスマルナクリニックド…</h4>
                                                <p>仕事内容のテキストが入りますテキストテキストテキストテキストテキストテキストテキストテキストテキストテ…</p>
                                                <h6>医師</h6>
                                                <div class="box-btn d-flex justify-content-start">
                                                    <button type="button" class="btn btn-primary mt-2 d-flex w-100 justify-content-center">
                                                        会員登録する
                                                    </button>
                                                    <button type="button" class="btn btn-default mt-2 d-flex w-100 justify-content-center">
                                                        ログインする
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-white pd-32 mb-24">
                                <div class="job-apply">
                                    <div class="job-apply-h">
                                        <h4>
                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M23.9993 14.6666C23.9993 15.56 23.9993 16.44 23.9993 17.3333C25.5993 17.3333 27.6793 17.3333 29.3327 17.3333C29.3327 16.44 29.3327 15.56 29.3327 14.6666C27.6793 14.6666 25.5993 14.6666 23.9993 14.6666Z" fill="#EC644D"/>
                                            <path d="M21.3327 23.48C22.6127 24.4266 24.2794 25.68 25.5993 26.6666C26.1327 25.96 26.666 25.24 27.1993 24.5333C25.8793 23.5466 24.2127 22.2933 22.9327 21.3333C22.3994 22.0533 21.866 22.7733 21.3327 23.48Z" fill="#EC644D"/>
                                            <path d="M27.1993 7.46665C26.666 6.75998 26.1327 6.03998 25.5993 5.33331C24.2794 6.31998 22.6127 7.57331 21.3327 8.53331C21.866 9.23998 22.3994 9.95998 22.9327 10.6666C24.2127 9.70665 25.8793 8.46665 27.1993 7.46665Z" fill="#EC644D"/>
                                            <path d="M5.33268 12C3.86602 12 2.66602 13.2 2.66602 14.6666L2.66602 17.3333C2.66602 18.8 3.86602 20 5.33268 20H6.66602L6.66602 25.3333H9.33268V20H10.666L17.3327 24L17.3327 7.99998L10.666 12H5.33268ZM12.0393 14.28L14.666 12.7066V19.2933L12.0393 17.72L11.3993 17.3333H5.33268V14.6666L11.3993 14.6666L12.0393 14.28Z" fill="#EC644D"/>
                                            <path d="M20.666 16C20.666 14.2266 19.8927 12.6266 18.666 11.5333V20.4533C19.8927 19.3733 20.666 17.7733 20.666 16Z" fill="#EC644D"/>
                                        </svg>
                                        おすすめ求人
                                        </h4>
                                    </div>
                                    <div class="mp-job-content">
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="recomend-job-item box-white-shadow">
                                                    <a href="">
                                                        <p class="recomend-job-featured mb-0 w-100"><img class="w-100" src="./static/img/mypage/img-my-job02.png" alt="image featured" /></p>
                                                        <div class="recomend-job-desc">
                                                            <h4>就労継続支援A・B型事業所あおぞらワーク</h4>
                                                            <ul>
                                                                <li>
                                                                    <span class="left">
                                                                        <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M7.59935 7.16667H10.9993V8.83333H6.83268V10.5H10.9993V12.1667H6.83268V15.5H5.16602V12.1667H0.999349V10.5H5.16602V8.83333H0.999349V7.16667H4.39935L0.166016 0.5H2.14102L5.99935 6.575L9.85768 0.5H11.8327L7.59935 7.16667Z" fill="#EC644D"/>
                                                                        </svg>
                                                                        給与
                                                                    </span>
                                                                    <span class="right">正職員 / 月給500,000円〜</span>
                                                                </li>
                                                                <li>
                                                                    <span class="left">
                                                                    <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M10.666 3.41668V1.75001H7.33268V3.41668H10.666ZM2.33268 5.08334V14.25H15.666V5.08334H2.33268ZM15.666 3.41668C16.591 3.41668 17.3327 4.15834 17.3327 5.08334V14.25C17.3327 15.175 16.591 15.9167 15.666 15.9167H2.33268C1.40768 15.9167 0.666016 15.175 0.666016 14.25L0.674349 5.08334C0.674349 4.15834 1.40768 3.41668 2.33268 3.41668H5.66602V1.75001C5.66602 0.82501 6.40768 0.0833435 7.33268 0.0833435H10.666C11.591 0.0833435 12.3327 0.82501 12.3327 1.75001V3.41668H15.666Z" fill="#EC644D"/>
                                                                    </svg>

                                                                    仕事内容
                                                                    </span>
                                                                    <span class="right">テキストテキストテキストテキストのテキストのテキス…</span>
                                                                </li>
                                                                <li>
                                                                    <span class="left">
                                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M16.841 8.64999L9.34102 1.14999C9.04102 0.84999 8.62435 0.666656 8.16602 0.666656H2.33268C1.41602 0.666656 0.666016 1.41666 0.666016 2.33332V8.16666C0.666016 8.62499 0.849349 9.04166 1.15768 9.34999L8.65768 16.85C8.95768 17.15 9.37435 17.3333 9.83268 17.3333C10.291 17.3333 10.7077 17.15 11.0077 16.8417L16.841 11.0083C17.1493 10.7083 17.3327 10.2917 17.3327 9.83332C17.3327 9.37499 17.141 8.94999 16.841 8.64999ZM9.83268 15.675L2.33268 8.16666V2.33332H8.16602V2.32499L15.666 9.82499L9.83268 15.675Z" fill="#EC644D"/>
                                                                    <path d="M4.41602 5.66666C5.10637 5.66666 5.66602 5.10701 5.66602 4.41666C5.66602 3.7263 5.10637 3.16666 4.41602 3.16666C3.72566 3.16666 3.16602 3.7263 3.16602 4.41666C3.16602 5.10701 3.72566 5.66666 4.41602 5.66666Z" fill="#EC644D"/>
                                                                    </svg>


                                                                    応募要件
                                                                    </span>
                                                                    <span class="right">薬剤師…</span>
                                                                </li>
                                                                
                                                                <li>
                                                                    <span class="left">
                                                                    <svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M7.00065 9.00001C6.08398 9.00001 5.33398 8.25001 5.33398 7.33334C5.33398 6.41667 6.08398 5.66667 7.00065 5.66667C7.91732 5.66667 8.66732 6.41667 8.66732 7.33334C8.66732 8.25001 7.91732 9.00001 7.00065 9.00001ZM12.0007 7.50001C12.0007 4.475 9.79232 2.33334 7.00065 2.33334C4.20898 2.33334 2.00065 4.475 2.00065 7.50001C2.00065 9.45001 3.62565 12.0333 7.00065 15.1167C10.3757 12.0333 12.0007 9.45001 12.0007 7.50001ZM7.00065 0.666672C10.5007 0.666672 13.6673 3.35001 13.6673 7.50001C13.6673 10.2667 11.4423 13.5417 7.00065 17.3333C2.55898 13.5417 0.333984 10.2667 0.333984 7.50001C0.333984 3.35001 3.50065 0.666672 7.00065 0.666672Z" fill="#EC644D"/>
                                                                    </svg>


                                                                    住所
                                                                    </span>
                                                                    <span class="right">静岡県〇〇市〇〇町123-23</span>
                                                                </li>
                                                                
                                                            </ul>
                                                            <div class="box-tag">
                                                                <span>職場の環境</span>
                                                                <span>駅近（5分以内）</span>
                                                            </div>
                                                            <div class="box-btn d-flex justify-content-start">
                                                                <button type="button" class="btn mt-2 d-flex justify-content-center">
                                                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M9.02688 5.00962L7.80188 0.976288C7.56021 0.184621 6.44355 0.184621 6.21021 0.976288L4.97688 5.00962H1.26854C0.460211 5.00962 0.126878 6.05129 0.785211 6.51796L3.81855 8.68462L2.62688 12.5263C2.38521 13.3013 3.28521 13.9263 3.92688 13.4346L7.00188 11.1013L10.0769 13.443C10.7185 13.9346 11.6185 13.3096 11.3769 12.5346L10.1852 8.69296L13.2185 6.52629C13.8769 6.05129 13.5435 5.01796 12.7352 5.01796H9.02688V5.00962Z" fill="#E4E4E4"/>
                                                                    </svg>

                                                                    気になる
                                                                </button>
                                                                <button type="button" class="btn btn-default mt-2 d-flex justify-content-center">
                                                                    ログインする
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="recomend-job-item box-white-shadow">
                                                    <a href="">
                                                        <p class="recomend-job-featured mb-0 w-100"><img class="w-100" src="./static/img/mypage/img-my-job02.png" alt="image featured" /></p>
                                                        <div class="recomend-job-desc">
                                                            <h4>就労継続支援A・B型事業所あおぞらワーク</h4>
                                                            <ul>
                                                                <li>
                                                                    <span class="left">
                                                                        <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M7.59935 7.16667H10.9993V8.83333H6.83268V10.5H10.9993V12.1667H6.83268V15.5H5.16602V12.1667H0.999349V10.5H5.16602V8.83333H0.999349V7.16667H4.39935L0.166016 0.5H2.14102L5.99935 6.575L9.85768 0.5H11.8327L7.59935 7.16667Z" fill="#EC644D"/>
                                                                        </svg>
                                                                        給与
                                                                    </span>
                                                                    <span class="right">正職員 / 月給500,000円〜</span>
                                                                </li>
                                                                <li>
                                                                    <span class="left">
                                                                    <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M10.666 3.41668V1.75001H7.33268V3.41668H10.666ZM2.33268 5.08334V14.25H15.666V5.08334H2.33268ZM15.666 3.41668C16.591 3.41668 17.3327 4.15834 17.3327 5.08334V14.25C17.3327 15.175 16.591 15.9167 15.666 15.9167H2.33268C1.40768 15.9167 0.666016 15.175 0.666016 14.25L0.674349 5.08334C0.674349 4.15834 1.40768 3.41668 2.33268 3.41668H5.66602V1.75001C5.66602 0.82501 6.40768 0.0833435 7.33268 0.0833435H10.666C11.591 0.0833435 12.3327 0.82501 12.3327 1.75001V3.41668H15.666Z" fill="#EC644D"/>
                                                                    </svg>

                                                                    仕事内容
                                                                    </span>
                                                                    <span class="right">テキストテキストテキストテキストのテキストのテキス…</span>
                                                                </li>
                                                                <li>
                                                                    <span class="left">
                                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M16.841 8.64999L9.34102 1.14999C9.04102 0.84999 8.62435 0.666656 8.16602 0.666656H2.33268C1.41602 0.666656 0.666016 1.41666 0.666016 2.33332V8.16666C0.666016 8.62499 0.849349 9.04166 1.15768 9.34999L8.65768 16.85C8.95768 17.15 9.37435 17.3333 9.83268 17.3333C10.291 17.3333 10.7077 17.15 11.0077 16.8417L16.841 11.0083C17.1493 10.7083 17.3327 10.2917 17.3327 9.83332C17.3327 9.37499 17.141 8.94999 16.841 8.64999ZM9.83268 15.675L2.33268 8.16666V2.33332H8.16602V2.32499L15.666 9.82499L9.83268 15.675Z" fill="#EC644D"/>
                                                                    <path d="M4.41602 5.66666C5.10637 5.66666 5.66602 5.10701 5.66602 4.41666C5.66602 3.7263 5.10637 3.16666 4.41602 3.16666C3.72566 3.16666 3.16602 3.7263 3.16602 4.41666C3.16602 5.10701 3.72566 5.66666 4.41602 5.66666Z" fill="#EC644D"/>
                                                                    </svg>


                                                                    応募要件
                                                                    </span>
                                                                    <span class="right">薬剤師…</span>
                                                                </li>
                                                                
                                                                <li>
                                                                    <span class="left">
                                                                    <svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M7.00065 9.00001C6.08398 9.00001 5.33398 8.25001 5.33398 7.33334C5.33398 6.41667 6.08398 5.66667 7.00065 5.66667C7.91732 5.66667 8.66732 6.41667 8.66732 7.33334C8.66732 8.25001 7.91732 9.00001 7.00065 9.00001ZM12.0007 7.50001C12.0007 4.475 9.79232 2.33334 7.00065 2.33334C4.20898 2.33334 2.00065 4.475 2.00065 7.50001C2.00065 9.45001 3.62565 12.0333 7.00065 15.1167C10.3757 12.0333 12.0007 9.45001 12.0007 7.50001ZM7.00065 0.666672C10.5007 0.666672 13.6673 3.35001 13.6673 7.50001C13.6673 10.2667 11.4423 13.5417 7.00065 17.3333C2.55898 13.5417 0.333984 10.2667 0.333984 7.50001C0.333984 3.35001 3.50065 0.666672 7.00065 0.666672Z" fill="#EC644D"/>
                                                                    </svg>


                                                                    住所
                                                                    </span>
                                                                    <span class="right">静岡県〇〇市〇〇町123-23</span>
                                                                </li>
                                                                
                                                            </ul>
                                                            <div class="box-tag">
                                                                <span>職場の環境</span>
                                                                <span>駅近（5分以内）</span>
                                                            </div>
                                                            <div class="box-btn d-flex justify-content-start">
                                                                <button type="button" class="btn mt-2 d-flex justify-content-center">
                                                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M9.02688 5.00962L7.80188 0.976288C7.56021 0.184621 6.44355 0.184621 6.21021 0.976288L4.97688 5.00962H1.26854C0.460211 5.00962 0.126878 6.05129 0.785211 6.51796L3.81855 8.68462L2.62688 12.5263C2.38521 13.3013 3.28521 13.9263 3.92688 13.4346L7.00188 11.1013L10.0769 13.443C10.7185 13.9346 11.6185 13.3096 11.3769 12.5346L10.1852 8.69296L13.2185 6.52629C13.8769 6.05129 13.5435 5.01796 12.7352 5.01796H9.02688V5.00962Z" fill="#E4E4E4"/>
                                                                    </svg>

                                                                    気になる
                                                                </button>
                                                                <button type="button" class="btn btn-default mt-2 d-flex justify-content-center">
                                                                    ログインする
                                                                </button>
                                                            </div>
                                                        </div>
                                                        
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mp-box-search pd-32 mb-24 bg-primary-light d-flex justify-content-between">
                                <p class="mb-0 txt-desc">ご希望の求人を探してみましょう！<br />
                                思いつくキーワードで求人を検索してみましょう</p>
                                <div class="input-group rounded form-control rounded primary">
                                    <input type="search" class="form-control-search" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                    <span class="search-addon border-0" id="search-addon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.9772 14.4716H15.1872L14.9072 14.2016C16.1072 12.8016 16.7272 10.8916 16.3872 8.86157C15.9172 6.08157 13.5972 3.86157 10.7972 3.52157C6.56719 3.00157 3.00719 6.56156 3.52719 10.7916C3.86719 13.5916 6.08719 15.9116 8.86719 16.3816C10.8972 16.7216 12.8072 16.1016 14.2072 14.9016L14.4772 15.1816V15.9716L18.7272 20.2216C19.1372 20.6316 19.8072 20.6316 20.2172 20.2216C20.6272 19.8116 20.6272 19.1416 20.2172 18.7316L15.9772 14.4716ZM9.97719 14.4716C7.48719 14.4716 5.47719 12.4616 5.47719 9.97157C5.47719 7.48157 7.48719 5.47157 9.97719 5.47157C12.4672 5.47157 14.4772 7.48157 14.4772 9.97157C14.4772 12.4616 12.4672 14.4716 9.97719 14.4716Z" fill="#019CCE"/>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="box-white pd-32 mb-24">
                                <div class="job-apply">
                                    <div class="job-apply-h">
                                        <h4 class="text-primary">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.5 18.5V7.5H19.5V10.79C20.22 11.01 20.9 11.33 21.5 11.76V7.5C21.5 6.39 20.61 5.5 19.5 5.5H15.5V3.5C15.5 2.39 14.61 1.5 13.5 1.5H9.5C8.39 1.5 7.5 2.39 7.5 3.5V5.5H3.5C2.39 5.5 1.51 6.39 1.51 7.5L1.5 18.5C1.5 19.61 2.39 20.5 3.5 20.5H11.18C10.88 19.88 10.68 19.21 10.58 18.5H3.5ZM9.5 3.5H13.5V5.5H9.5V3.5Z" fill="#EC644D"/>
                                                <path d="M17.5 12.5C14.74 12.5 12.5 14.74 12.5 17.5C12.5 20.26 14.74 22.5 17.5 22.5C20.26 22.5 22.5 20.26 22.5 17.5C22.5 14.74 20.26 12.5 17.5 12.5ZM19.15 19.85L17 17.7V14.5H18V17.29L19.85 19.14L19.15 19.85Z" fill="#EC644D"/>
                                            </svg>
                                            新着求人メール
                                        </h4>
                                        <button type="button" class="btn">もっと見る</button>
                                    </div>
                                    <div id="accordion" class="mp-job-content">
                                        <div class="card card-job white-shadow-blue mb-24 br-16">
                                            <div class="card-header white-shadow-blue" id="headingOne">
                                                <h5 class="mb-0">
                                                    <button class="card-header--title" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    <span>HADA 薬剤師、東京都、港区、契約社員 <b>2022/06/30 17:00</b></span>
                                                    <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M24.885 23.5575L18 16.6875L11.115 23.5575L9 21.4425L18 12.4425L27 21.4425L24.885 23.5575Z" fill="#019CCE"/>
                                                    </svg>
                                                    </button>
                                                </h5>
                                            </div>

                                            <div id="collapseOne" class="collapse show card-content" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body">
                                                    content
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card card-job white-shadow-blue mb-24 br-16">
                                            <div class="card-header white-shadow-blue" id="headingTwo">
                                            <h5 class="mb-0">
                                                <button class="card-header--title collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                <span>HADA 薬剤師、東京都、港区、契約社員 <b>2022/06/30 17:00</b></span>
                                                <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M24.885 23.5575L18 16.6875L11.115 23.5575L9 21.4425L18 12.4425L27 21.4425L24.885 23.5575Z" fill="#019CCE"/>
                                                </svg>

                                                </button>
                                            </h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse card-content" aria-labelledby="headingTwo" data-parent="#accordion">
                                            <div class="card-body">
                                                content 2
                                            </div>
                                            </div>
                                        </div>
                                        <div class="card card-job white-shadow-blue mb-24 br-16">
                                            <div class="card-header white-shadow-blue" id="headingThree">
                                            <h5 class="mb-0">
                                                <button class="card-header--title collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                <span>HADA 薬剤師、東京都、港区、契約社員 <b>2022/06/30 17:00</b></span>
                                                <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M24.885 23.5575L18 16.6875L11.115 23.5575L9 21.4425L18 12.4425L27 21.4425L24.885 23.5575Z" fill="#019CCE"/>
                                                </svg>
                                                </button>
                                            </h5>
                                            </div>
                                            <div id="collapseThree" class="collapse card-content" aria-labelledby="headingThree" data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-item-center">
                                                        <span>検索条件　薬剤師　東京都　千代田区　契約社員</span>
                                                        <button type="button" class="btn btn-primary">
                                                            会員登録する
                                                        </button>
                                                    </div>
                                                    <div class="d-flex justify-content-end">
                                                        <a class="lnk" href="#">名前を変更</a>
                                                        <a class="lnk" href="#">条件を削除</a>
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