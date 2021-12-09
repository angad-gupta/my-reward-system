  <section class="ccrm-counts bg-white mb-3">
    <div class="card bd-card">
        <div class="bg-orange-400 card-header header-elements-inline">
            <h5 class="card-title text-uppercase font-weight-semibold">Sales Statistics Overview</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <select class="form-control border-0" id="select_date" >
                        <option value="daily" selected="">Daily</option>
                        <option value="week">Weekly</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Quarterly">Quarterly</option>
                        <option value="Semi-Anually">Semi- Annually</option>
                        <option value="Anually">Annually</option>
                    </select>
                    <a class="list-icons-item ml-2" data-action="collapse"></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 col-xl-9">
                    <div class="row">
                        @php
                        $oil=(isset($total_sales[0]))?$total_sales[0]:0;
                        $shop=(isset($total_sales[1]))?$total_sales[1]:0;
                        $coffee=(isset($total_sales[2]))?$total_sales[2]:0;

                        $oil_daily=(isset($getDailySales[0]))?$getDailySales[0]:0;
                        $shop_daily=(isset($getDailySales[1]))?$getDailySales[1]:0;
                        $coffee_daily=(isset($getDailySales[2]))?$getDailySales[2]:0;

                        $oil_week=(isset($getWeekSales[0]))?$getWeekSales[0]:0;
                        $shop_week=(isset($getWeekSales[1]))?$getWeekSales[1]:0;
                        $coffee_week=(isset($getWeekSales[2]))?$getWeekSales[2]:0;

                        $oil_monthly=(isset($getMonthlySales[0]))?$getMonthlySales[0]:0;
                        $shop_monthly=(isset($getMonthlySales[1]))?$getMonthlySales[1]:0;
                        $coffee_monthly=(isset($getMonthlySales[2]))?$getMonthlySales[2]:0;


                        $oil_semi=(isset($getSemiSales[0]))?$getSemiSales[0]:0;
                        $shop_semi=(isset($getSemiSales[1]))?$getSemiSales[1]:0;
                        $coffee_semi=(isset($getSemiSales[2]))?$getSemiSales[2]:0;


                        $oil_half=(isset($getHalfSales[0]))?$getHalfSales[0]:0;
                        $shop_half=(isset($getHalfSales[1]))?$getHalfSales[1]:0;
                        $coffee_half=(isset($getHalfSales[2]))?$getHalfSales[2]:0;



                        $total=(float)$oil+(float)$shop+(float)$coffee;
                        $total_daily=(float)$oil_daily+(float)$shop_daily+(float)$coffee_daily;
                        $total_week=(float)$oil_week+(float)$shop_week+(float)$coffee_week;
                        $total_monthly=(float)$oil_monthly+(float)$shop_monthly+(float)$coffee_monthly;
                        $total_semi=(float)$oil_semi+(float)$shop_semi+(float)$coffee_semi;
                        $total_half=(float)$oil_half+(float)$shop_half+(float)$coffee_half;

                        @endphp
                        <div class="col-lg-6 col-xl-4">
                            <div class="card card-body">
                                <div class="media">
                                    <div class="media-body">
                                        <h4 class="mb-0">Modi Ganga Oil Store</h4>
                                        <p class="annual" >{{priceFormat($oil)}}</p>
                                        <p class="daily" style="display: none">{{priceFormat($oil_daily)}}</p>
                                        <p class="week" style="display: none">{{priceFormat($oil_week)}}</p>
                                        <p class="monthly"style="display: none">{{priceFormat($oil_monthly)}}</p>
                                        <p class="semi" style="display: none">{{priceFormat($oil_semi)}}</p>
                                        <p class="half" style="display: none">{{priceFormat($oil_half)}}</p>

                                    </div>
                                    <div class="mt-3 align-self-end svg-lg">
                                        <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M235.85 348.518l-14.981-5.618 18.882-50.352a30.8 30.8 0 00-7.047-32.529l-38.361-38.362 11.314-11.314 38.362 38.357a46.839 46.839 0 0110.712 49.461z" fill="#57646f"/><path d="M352 488H136a24 24 0 010-48h160a8.009 8.009 0 008-8v-48h16v48a24.028 24.028 0 01-24 24H136a8 8 0 000 16h216zM368 472h16v16h-16z" fill="#ccdce5"/><path d="M296 360h32v40h-32z" fill="#798b9b"/><path d="M192 32l-24 16 12.799 34.131L209.3 63.14z" fill="#abbac2"/><path d="M209.3 63.14l-28.501 18.991L192 112v48h40v-56z" fill="#ccdce5"/><path d="M208 208v112a16 16 0 0016 16h72v32h-80a40 40 0 01-40-40V208z" fill="#798b9b"/><path d="M280 368V248a24 24 0 00-24-24h-80v-24l8-56h56l24 24h48l32 43.093V368z" fill="#ef5249"/><g fill="#be382d"><path d="M304 328h16v16h-16zM200 184h16v16h-16z"/></g></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="card card-body">
                                <div class="media">
                                    <div class="media-body">
                                        <h4 class="mb-0">Saliza Shopping Center</h4>
                                        <p class="annual">{{priceFormat($shop)}}</p>
                                        <p class="daily" style="display: none">{{priceFormat($shop_daily)}}</p>
                                        <p class="week" style="display: none">{{priceFormat($shop_week)}}</p>
                                        <p class="monthly" style="display: none">{{priceFormat($shop_monthly)}}</p>
                                        <p class="semi" style="display: none">{{priceFormat($shop_semi)}}</p>
                                        <p class="half" style="display: none">{{priceFormat($shop_half)}}</p>
                                    </div>
                                    <div class="mt-3 align-self-end svg-lg">
                                        <svg viewBox="0 -29 512 511" xmlns="http://www.w3.org/2000/svg"><path d="M26.36 106.684v342.218a4.122 4.122 0 004.12 4.121h451.04a4.122 4.122 0 004.12-4.12v-342.22zm0 0" fill="#ed5176"/><g fill="#ba365f"><path d="M26.36 224.047h459.28v23.25H26.36zm0 0M26.36 106.684h459.28v23.25H26.36zm0 0"/><path d="M174.426 106.684v23.414c0 16.496 13.37 29.867 29.867 29.867h126.148c21.293 0 38.555-17.262 38.555-38.555v-14.726zm0 0M461.348 106.684v342.218a4.122 4.122 0 01-4.121 4.121h24.293a4.122 4.122 0 004.12-4.12v-342.22zm0 0"/></g><path d="M201.07 299.07v153.953h109.86V299.07c0-5.691-4.614-10.304-10.305-10.304h-89.254c-5.687 0-10.3 4.613-10.3 10.304zm0 0" fill="#6a7193"/><path d="M216.781 314.793c0-5.691 4.614-10.305 10.305-10.305h83.844v-5.418c0-5.691-4.614-10.304-10.301-10.304h-89.254c-5.691 0-10.305 4.613-10.305 10.304v153.953h15.711zm0 0" fill="#575b7a"/><path d="M.64 177.871v42.055a4.12 4.12 0 004.122 4.12h502.476a4.12 4.12 0 004.121-4.12V177.87a4.12 4.12 0 00-4.12-4.121H4.761a4.12 4.12 0 00-4.121 4.121zm0 0" fill="#c8e7f7"/><path d="M507.238 173.75H483.04a4.12 4.12 0 014.121 4.121v42.059a4.122 4.122 0 01-4.12 4.12h24.198a4.122 4.122 0 004.121-4.12V177.87a4.12 4.12 0 00-4.12-4.121zm0 0" fill="#8cbcd6"/><path d="M344.598 314.008v84.312a8.724 8.724 0 008.722 8.723h95.617a8.721 8.721 0 008.723-8.723v-84.312a8.719 8.719 0 00-8.723-8.723H353.32c-4.82-.004-8.722 3.903-8.722 8.723zm0 0M54.34 314.008v84.312a8.721 8.721 0 008.722 8.723h95.618a8.721 8.721 0 008.722-8.723v-84.312a8.721 8.721 0 00-8.722-8.723H63.062c-4.82-.004-8.722 3.903-8.722 8.723zm0 0M512 83.984V65.09H0v18.894c12.535 0 22.7 10.164 22.7 22.7h466.6c0-12.536 10.165-22.7 22.7-22.7zm0 0" fill="#c8e7f7"/><path d="M174.426 65.09h194.57v41.594h-194.57zm0 0M487.8 65.09v18.894c-12.538 0-22.702 10.164-22.702 22.7H489.3c0-12.536 10.164-22.7 22.699-22.7V65.09zm0 0" fill="#8cbcd6"/><path d="M158.715 30.367v84.305c0 16.492 13.37 29.867 29.867 29.867h134.836c16.492 0 29.867-13.375 29.867-29.867V30.367C353.285 13.871 339.91.5 323.418.5H188.582c-16.496 0-29.867 13.371-29.867 29.867zm0 0" fill="#ffeb96"/><path d="M226.125 378.395h-6.184c-4.14 0-7.5-3.36-7.5-7.5s3.36-7.5 7.5-7.5h6.184c4.145 0 7.5 3.359 7.5 7.5s-3.355 7.5-7.5 7.5zm0 0" fill="#252d4c"/><path d="M284.84 100.809h-45.883c-9.09 0-17.035-6.457-18.894-15.356l-9.754-46.617h-9.649a7.5 7.5 0 01-7.5-7.5 7.5 7.5 0 017.5-7.5h9.649c7.062 0 13.238 5.02 14.683 11.93l9.75 46.617a4.325 4.325 0 004.215 3.426h45.883a4.332 4.332 0 004.027-2.786l13.719-36.316h-60.828a7.5 7.5 0 110-15h64.887a12.2 12.2 0 0110.03 5.262 12.183 12.183 0 011.376 11.242l-15.153 40.113c-2.82 7.465-10.078 12.485-18.058 12.485zm0 0M240.29 122.742h-2.06a7.497 7.497 0 01-7.5-7.5 7.5 7.5 0 017.5-7.5h2.06a7.5 7.5 0 017.5 7.5c0 4.145-3.356 7.5-7.5 7.5zm0 0M273.77 122.742h-2.06a7.497 7.497 0 01-7.5-7.5 7.5 7.5 0 017.5-7.5h2.06a7.5 7.5 0 017.5 7.5c0 4.145-3.356 7.5-7.5 7.5zm0 0" fill="#5692d8"/></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="card mb-3 mb-lg-0  card-body">
                                <div class="media">
                                    <div class="media-body">
                                        <h4 class="mb-0">Petrol Stock</h4>
                                        <span class="small text-danger">(in litres)</span>
                                        <p>{{ $total_petrol_purchase }}</p>
                                    </div>
                                    <div class="mt-3 align-self-end svg-lg">
                                        <svg viewBox="0 -40 464 464" xmlns="http://www.w3.org/2000/svg"><path d="M112 296h16v64h-16zm0 0M336 296h16v64h-16zm0 0" fill="#57565c"/><path d="M464 144v48c0 61.855-50.145 112-112 112H112a110.233 110.233 0 01-31.04-4.398C33.02 285.773.005 241.895 0 192v-48C0 82.145 50.145 32 112 32h240c2.719 0 5.36.078 8 .238a115.7 115.7 0 0121.84 3.84C430.37 49.496 463.984 93.648 464 144zm0 0" fill="#ffb655"/><path d="M464 144v48c0 61.855-50.145 112-112 112H112a110.233 110.233 0 01-31.04-4.398C181.923 249.52 308.64 165.359 381.84 36.078 430.37 49.496 463.984 93.648 464 144zm0 0" fill="#ffa733"/><path d="M112 0h64v32h-64zm0 0" fill="#d1d3d4"/><path d="M104 184c0 22.09 17.91 40 40 40s40-17.91 40-40-40-72-40-72-40 49.91-40 72zm0 0" fill="#e6e7e8"/><path d="M0 352v32h464v-32zm0 0" fill="#787680"/><path d="M352 32h-8v24h-64V32h-16v224a8 8 0 008 8h80a8 8 0 008-8V32.238c-2.64-.16-5.281-.238-8-.238zm-8 40v16h-64V72zm-64 112v-16h64v16zm64 16v16h-64v-16zm-64-48v-16h64v16zm0-32v-16h64v16zm0 128v-16h64v16zm0 0" fill="#cc7400"/></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="card mb-3 mb-lg-0 card-body">
                                <div class="media">
                                    <div class="media-body">

                                        <h4 class="mb-0">Coffee Bagaan</h4>
                                        <p class="annual">{{priceFormat($coffee)}}</p>
                                        <p class="daily" style="display: none">{{priceFormat($coffee_daily)}}</p>
                                        <p class="week" style="display: none">{{priceFormat($coffee_week)}}</p>
                                        <p class="monthly" style="display: none">{{priceFormat($coffee_monthly)}}</p>
                                        <p class="semi" style="display: none">{{priceFormat($coffee_semi)}}</p>
                                        <p class="half" style="display: none">{{priceFormat($coffee_half)}}</p>

                                    </div>
                                    <div class="mt-3 align-self-end svg-lg">
                                        <svg viewBox="-40 0 472 472" xmlns="http://www.w3.org/2000/svg"><path d="M280 0H88C70.328 0 56 14.328 56 32v56h16V48h224v40h16V32c0-17.672-14.328-32-32-32zM72 32c0-8.836 7.164-16 16-16h192c8.836 0 16 7.164 16 16zm0 0M216 208h32v40h-32zm0 0" fill="#aab9c1"/><path d="M256 208h120c8.836 0 16-7.164 16-16s-7.164-16-16-16H256zm0 0" fill="#354f5c"/><path d="M272 176h40v32h-40zm0 0M304 352h-56v-16h48v-24h-48v-16h56a8 8 0 018 8v40a8 8 0 01-8 8zm0 0" fill="#aab9c1"/><path d="M128 472H80l-8-32h64zm0 0" fill="#354f5c"/><path d="M192 176h80v40h-80zm0 0" fill="#ccdce5"/><path d="M344 472h-48l-8-32h64zm0 0" fill="#354f5c"/><path d="M312 72H56c-8.836 0-16 7.164-16 16v336c0 8.836 7.164 16 16 16h320c8.836 0 16-7.164 16-16v-40c0-8.836-7.164-16-16-16H144V144h168c8.836 0 16-7.164 16-16V88c0-8.836-7.164-16-16-16zm0 0" fill="#eb4042"/><path d="M192 288h80v56c0 13.254-10.746 24-24 24h-32c-13.254 0-24-10.746-24-24zm0 0" fill="#ccdce5"/><path d="M288 144l-16 32h-80l-16-32zm0 0M328 96h24v16h-24zm0 0" fill="#354f5c"/><g fill="#cc2027"><path d="M64 96h16v16H64zm0 0M288 96h16v16h-16zm0 0M64 400h16v16H64zm0 0M352 400h16v16h-16zm0 0"/></g><path d="M0 120h16v184H0zm0 0" fill="#eb4042"/></svg>                                                </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-4">
                                <div class="card mb-3 mb-lg-0 card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <h4 class="mb-0">Total Sales NPR.</h4>
                                            <p class="annual">{{priceFormat($total)}}</p>
                                            <p class="daily" style="display: none">{{priceFormat($total_daily)}}</p>
                                            <p class="week" style="display: none">{{priceFormat($total_week)}}</p>
                                            <p class="monthly" style="display: none">{{priceFormat($total_monthly)}}</p>
                                            <p class="semi" style="display: none">{{priceFormat($total_semi)}}</p>
                                            <p class="half" style="display: none">{{priceFormat($total_half)}}</p>
                                        </div>
                                        <div class="mt-3 align-self-end svg-lg">
                                            <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M305.5 166.8l-77.7 77.7c-3 2.7-6.898 4.2-10.5 4.2-3.898 0-7.8-1.5-10.8-4.2-5.7-6-5.7-15.602 0-21.3l77.7-77.7c5.702-5.7 15.3-5.7 21.304 0 5.695 6 5.695 15.602-.004 21.3zm0 0" fill="#465a61"/><path d="M305.5 166.8L256 216.3v-42.6l28.2-28.2c5.698-5.7 15.3-5.7 21.3 0 5.7 6 5.7 15.602 0 21.3zm0 0" fill="#3b4a51"/><path d="M169.148 256.582c-2.253 0-4.539-.512-6.695-1.582L96.13 221.836c-7.414-3.707-10.418-12.715-6.711-20.125 3.723-7.399 12.73-10.418 20.129-6.711l66.324 33.164c7.414 3.707 10.418 12.715 6.711 20.125-2.637 5.262-7.926 8.293-13.434 8.293zm0 0" fill="#465a61"/><path d="M340.008 131.996c-4.57 0-9.067-2.062-12.012-6.004-4.98-6.62-3.633-16.027 3.004-20.992l72.012-53.992c6.605-4.98 15.996-3.664 20.992 3 4.98 6.62 3.633 16.027-3.004 20.992l-72.012 53.992a14.9 14.9 0 01-8.98 3.004zm0 0" fill="#3b4a51"/><path d="M76 150c-24.902 0-45 20.098-45 45 0 24.898 20.098 45 45 45s45-20.102 45-45c0-24.902-20.098-45-45-45zm0 0" fill="#697c86"/><path d="M196 210c-24.902 0-45 20.098-45 45 0 24.898 20.098 45 45 45s45-20.102 45-45c0-24.902-20.098-45-45-45zm0 0" fill="#c6e2e7"/><path d="M316 90c-24.902 0-45 20.098-45 45 0 24.898 20.098 45 45 45s45-20.102 45-45c0-24.902-20.098-45-45-45zm0 0" fill="#fdbf00"/><path d="M436 0c-24.902 0-45 20.098-45 45 0 24.898 20.098 45 45 45s45-20.102 45-45c0-24.902-20.098-45-45-45zm0 0M481 165v325.398h-90V165c0-8.402 6.598-15 15-15h60c8.402 0 15 6.598 15 15zm0 0" fill="#e63950"/><path d="M361 255v235.398h-90V255c0-8.402 6.598-15 15-15h60c8.402 0 15 6.598 15 15zm0 0" fill="#fdbf00"/><path d="M241 375v115.398h-90V375c0-8.402 6.598-15 15-15h60c8.402 0 15 6.598 15 15zm0 0" fill="#c6e2e7"/><path d="M121 315v175.398H31V315c0-8.402 6.598-15 15-15h60c8.402 0 15 6.598 15 15zm0 0" fill="#697c86"/><path d="M436 90V0c24.902 0 45 20.098 45 45 0 24.898-20.098 45-45 45zm0 0M481 165v325.398h-45V150h30c8.402 0 15 6.598 15 15zm0 0" fill="#cc2e43"/><path d="M316 180V90c24.902 0 45 20.098 45 45 0 24.898-20.098 45-45 45zm0 0M361 255v235.398h-45V240h30c8.402 0 15 6.598 15 15zm0 0" fill="#ff9f00"/><path d="M196 300v-90c24.902 0 45 20.098 45 45 0 24.898-20.098 45-45 45zm0 0M241 375v115.398h-45V360h30c8.402 0 15 6.598 15 15zm0 0" fill="#a8d3d8"/><path d="M76 240v-90c24.902 0 45 20.098 45 45 0 24.898-20.098 45-45 45zm0 0M121 315v175.398H76V300h30c8.402 0 15 6.598 15 15zm0 0" fill="#596c76"/><path d="M512 497c0 8.398-6.598 15-15 15H15c-8.402 0-15-6.602-15-15 0-8.402 6.598-15 15-15h482c8.402 0 15 6.598 15 15zm0 0" fill="#465a61"/><path d="M512 497c0 8.398-6.598 15-15 15H256v-30h241c8.402 0 15 6.598 15 15zm0 0" fill="#3b4a51"/></svg>                                                </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-xl-4">
                                    <div class="card mb-3 mb-lg-0  card-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <h4 class="mb-0">Diesel Stock</h4>
                                                  <span class="small text-danger">(in litres)</span>
                                                <p>{{ $total_diesel_purchase }}</p>
                                            </div>
                                            <div class="mt-3 align-self-end svg-lg">
                                                <svg viewBox="0 -40 464 464" xmlns="http://www.w3.org/2000/svg"><path d="M112 296h16v64h-16zm0 0M336 296h16v64h-16zm0 0" fill="#57565c"/><path d="M464 144v48c0 61.855-50.145 112-112 112H112a110.233 110.233 0 01-31.04-4.398C33.02 285.773.005 241.895 0 192v-48C0 82.145 50.145 32 112 32h240c2.719 0 5.36.078 8 .238a115.7 115.7 0 0121.84 3.84C430.37 49.496 463.984 93.648 464 144zm0 0" fill="#ffb655"/><path d="M464 144v48c0 61.855-50.145 112-112 112H112a110.233 110.233 0 01-31.04-4.398C181.923 249.52 308.64 165.359 381.84 36.078 430.37 49.496 463.984 93.648 464 144zm0 0" fill="#ffa733"/><path d="M112 0h64v32h-64zm0 0" fill="#d1d3d4"/><path d="M104 184c0 22.09 17.91 40 40 40s40-17.91 40-40-40-72-40-72-40 49.91-40 72zm0 0" fill="#e6e7e8"/><path d="M0 352v32h464v-32zm0 0" fill="#787680"/><path d="M352 32h-8v24h-64V32h-16v224a8 8 0 008 8h80a8 8 0 008-8V32.238c-2.64-.16-5.281-.238-8-.238zm-8 40v16h-64V72zm-64 112v-16h64v16zm64 16v16h-64v-16zm-64-48v-16h64v16zm0-32v-16h64v16zm0 128v-16h64v16zm0 0" fill="#cc7400"/></svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <script>
                    $(document).ready(function () {
                        $(document).on('change', '#select_date', function () {
                            var state = $(this).val();
                            if(state === 'daily'){
                                $(".annual").hide();
                                $(".daily").show();
                                $(".monthly").hide();
                                $(".semi").hide();
                                $(".half").hide();
                                $(".week").hide();
                            }
                            else if (state === 'week'){
                                $(".annual").hide();
                                $(".daily").hide();
                                $(".week").show();
                                $(".monthly").hide();
                                $(".semi").hide();
                                $(".half").hide();

                            }else if (state === 'Monthly'){
                                $(".annual").hide();
                                $(".daily").hide();
                                $(".monthly").show();
                                $(".semi").hide();
                                $(".half").hide();
                                $(".week").hide();
                            }else if (state === 'Quarterly'){
                                $(".annual").hide();
                                $(".daily").hide();
                                $(".monthly").hide();
                                $(".semi").show();
                                $(".half").hide();
                                $(".week").hide();
                            }else if (state === 'Semi-Anually'){
                                $(".annual").hide();
                                $(".daily").hide();
                                $(".monthly").hide();
                                $(".semi").hide();
                                $(".week").hide();
                                $(".half").show();
                            }else if (state === 'Anually'){
                                $(".annual").show();
                                $(".daily").hide();
                                $(".monthly").hide();
                                $(".semi").hide();
                                $(".half").hide();
                                $(".week").hide();
                            }
                        });
                    });
                    </script>
                        <div class="col-lg-12 col-xl-3">
                            <div class="card bd-card mt-lg-3 mt-xl-0 mb-0 bg-white" style="height: 311.35px;">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center align-items-center flex-column h-100">
                                        {{-- <h2>Fuel Stock </h2> --}}
                                        <div class="svg-center" id="salesSummary"></div>
                                        <script>

                                            var total_petrol_stock = "<?php echo json_encode($total_petrol_stock); ?>";
                                            var total_diesel_stock = "<?php echo json_encode($total_diesel_stock); ?>";
                                            var total_petrol_purchase = "<?php echo json_encode($total_petrol_purchase); ?>";
                                            var total_diesel_purchase = "<?php echo json_encode($total_diesel_purchase); ?>";
                                            var SalesDonut = function () {

                                                    // EMPLOYEE DASHBOARD ATTENDANCE
                                                    var _salesSummary = function(element, size) {
                                                        if (typeof d3 == 'undefined') {
                                                            console.warn('Warning - d3.min.js is not loaded.');
                                                            return;
                                                        }

                                                        // Initialize chart only if element exsists in the DOM
                                                        if(element) {

                                                            // Add data set
                                                            var data = [
                                                            {
                                                                "status": "Petrol",
                                                                "icon": "<i class='badge badge-mark border-blue-300 mr-2'></i>",
                                                                "value": total_petrol_purchase,
                                                                "color": "#27B849"
                                                            }, {
                                                                "status": "Remaining Petrol",
                                                                "icon": "<i class='badge badge-mark border-success-300 mr-2'></i>",
                                                                "value": total_petrol_stock,
                                                                "color": "#FF7043"
                                                            }, {
                                                                "status": "Diesel",
                                                                "icon": "<i class='badge badge-mark border-success-300 mr-2'></i>",
                                                                "value": total_diesel_purchase,
                                                                "color": "#F7CA18"
                                                            }, {
                                                                "status": "Remaining Diesel",
                                                                "icon": "<i class='badge badge-mark border-success-300 mr-2'></i>",
                                                                "value": total_diesel_stock,
                                                                "color": "#E26D5C"
                                                            }
                                                            ];

                                                            // Main variables
                                                            var d3Container = d3.select(element),
                                                                distance = 2, // reserve 2px space for mouseover arc moving
                                                                radius = (size/2) - distance,
                                                                sum = d3.sum(data, function(d) { return d.value; });


                                                            // Tooltip
                                                            // ------------------------------

                                                            var tip = d3.tip()
                                                            .attr('class', 'd3-tip')
                                                            .offset([-10, 0])
                                                            .direction('e')
                                                            .html(function (d) {
                                                                return "<ul class='list-unstyled mb-1'>" +
                                                                "<li>" + "<div class='font-size-base my-1'>" + d.data.icon + d.data.status + "</div>" + "</li>" +
                                                                "<li>" + "Total: &nbsp;" + "<span class='font-weight-semibold float-right'>" + d.value + "<em>ltrs</em>" + "</span>" + "</li>" +
                                                                "<li><span class='font-weight-semibold float-right'>" + (100 / (sum / d.value)).toFixed(2) + "%" + "</span>" + "</li>" +
                                                                "</ul>";
                                                            });


                                                            // Create chart
                                                            // ------------------------------

                                                            // Add svg element
                                                            var container = d3Container.append("svg").call(tip);

                                                            // Add SVG group
                                                            var svg = container
                                                            .attr("width", size)
                                                            .attr("height", size)
                                                            .append("g")
                                                            .attr("transform", "translate(" + (size / 2) + "," + (size / 2) + ")");


                                                            // Construct chart layout
                                                            // ------------------------------

                                                            // Pie
                                                            var pie = d3.layout.pie()
                                                            .sort(null)
                                                            .startAngle(Math.PI)
                                                            .endAngle(3 * Math.PI)
                                                            .value(function (d) {
                                                                return d.value;
                                                            });

                                                            // Arc
                                                            var arc = d3.svg.arc()
                                                            .outerRadius(radius);


                                                            //
                                                            // Append chart elements
                                                            //

                                                            // Group chart elements
                                                            var arcGroup = svg.selectAll(".d3-arc")
                                                            .data(pie(data))
                                                            .enter()
                                                            .append("g")
                                                            .attr("class", "d3-arc")
                                                            .style({
                                                                'stroke': '#fff',
                                                                'stroke-width': 2,
                                                                'cursor': 'pointer'
                                                            });

                                                            // Append path
                                                            var arcPath = arcGroup
                                                            .append("path")
                                                            .style("fill", function (d) {
                                                                return d.data.color;
                                                            });

                                                            // Add tooltip
                                                            arcPath
                                                            .on('mouseover', function (d, i) {

                                                                    // Transition on mouseover
                                                                    d3.select(this)
                                                                    .transition()
                                                                    .duration(500)
                                                                    .ease('elastic')
                                                                    .attr('transform', function (d) {
                                                                        d.midAngle = ((d.endAngle - d.startAngle) / 2) + d.startAngle;
                                                                        var x = Math.sin(d.midAngle) * distance;
                                                                        var y = -Math.cos(d.midAngle) * distance;
                                                                        return 'translate(' + x + ',' + y + ')';
                                                                    });
                                                                })
                                                            .on("mousemove", function (d) {

                                                                    // Show tooltip on mousemove
                                                                    tip.show(d)
                                                                    .style("top", (d3.event.pageY - 40) + "px")
                                                                    .style("left", (d3.event.pageX + 30) + "px");
                                                                })
                                                            .on('mouseout', function (d, i) {

                                                                    // Mouseout transition
                                                                    d3.select(this)
                                                                    .transition()
                                                                    .duration(500)
                                                                    .ease('bounce')
                                                                    .attr('transform', 'translate(0,0)');

                                                                    // Hide tooltip
                                                                    tip.hide(d);
                                                                });

                                                            // Animate chart on load
                                                            arcPath
                                                            .transition()
                                                            .delay(function(d, i) { return i * 500; })
                                                            .duration(500)
                                                            .attrTween("d", function(d) {
                                                                var interpolate = d3.interpolate(d.startAngle,d.endAngle);
                                                                return function(t) {
                                                                    d.endAngle = interpolate(t);
                                                                    return arc(d);
                                                                };
                                                            });
                                                        }
                                                    };

                                                    return {
                                                        initCharts: function() {
                                                            _salesSummary("#salesSummary", 160);
                                                        }
                                                    }
                                                }();

                                                // Initialize module
                                                // ------------------------------
                                                document.addEventListener('DOMContentLoaded', function() {
                                                    SalesDonut.initCharts();
                                                });




                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
