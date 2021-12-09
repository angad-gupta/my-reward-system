
@extends('layout')
@section('content')
<section class="ecm-banner">
    <div class="owl-carousel owl-theme banner-slider">
        @inject('banner', '\App\Modules\Banner\Repositories\BannerRepository')
        @php
            $header_banners = $banner->findAllActiveHeaderBanner($limit=50);
        @endphp

        @foreach($header_banners as $header_banner)

        <div class="item">
            <div class="banner-block" style="background-image: url('{{ ($header_banner->banner_image) ? asset($header_banner->file_full_path).'/'.$header_banner->banner_image : asset('admin/default.png' )}}');">
                <div class="container">
                    <div class="row justify-content-end">
                        <div class="col-md-4">
                            <div class="card banner-search">
                                <div class="card-body banner-search-title">
                                    <h6>Find your Car</h6>
                                </div>
                                <div class="card-body">
                                    <form action="">
                                        <div class="mb-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="budget">
                                                <label class="form-check-label" for="budget">By Budget</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="model">
                                                <label class="form-check-label" for="model">By Model</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" id="exampleFormControlSelect1">
                                            <option>Select Budget</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" id="exampleFormControlSelect1">
                                            <option>Select City</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100">Search</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<section class="ecm-features ecm-new pb-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="ecm-features__title d-flex align-items-center justify-content-between">
                    <h1><span>Deals</span> of the Month</h1>
                </div>
            </div>
        </div>
        <div class="owl-carousel owl-theme new-arrival">
            @inject('dealofmonth', '\App\Modules\Cars\Repositories\CarRepository')
            @php
                $deal_of_the_months = $dealofmonth->findDealOfMonth($limit=50);
            @endphp
            @foreach($deal_of_the_months as $deal_of_the_month) 
            <div class="item">
                <a href="category.php" class="ecm-new__item">
                    <img src="{{($deal_of_the_month->car_image) ? asset($deal_of_the_month->file_full_path).'/'.$deal_of_the_month->car_image : asset('admin/default.png' )}}" alt="{{$deal_of_the_month->ModelInfo->model_name}} {{$deal_of_the_month->VariantInfo->variant_name}}">
                    <h5>{{$deal_of_the_month->BrandInfo->brand_name}}</h5>
                </a>
            </div>
            @endforeach
     
        </div>
    </div>
</section>


<section class="ecm-features ecm-new pb-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="ecm-features__title d-flex align-items-center justify-content-between">
                    <h1><span>Car</span> brands</h1>
                    <a href="product-list.php" class="see-all text-right">View all <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="owl-carousel owl-theme brand discount-slider mt-4">
            @inject('get_car_brand', '\App\Modules\Brand\Repositories\BrandRepository')
            @php
                $car_brands = $get_car_brand->findCarType($limit=50);
            @endphp
            @foreach($car_brands as $car_brand)
            <div class="item">
                <a href="category.php" class="brand-item">
                    <img src="{{($car_brand->brand_logo) ? asset($car_brand->file_full_path).'/'.$car_brand->brand_logo : asset('admin/default.png')}}" alt="{{$car_brand->brand_name}}">
                    <h5>{{$car_brand->brand_name}}</h5>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="ecm-features ecm-new pt-3 pb-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="ecm-features__title d-flex align-items-center justify-content-between">
                    <h1><span>Bike</span> brands</h1>
                    <a href="product-list.php" class="see-all text-right">View all <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="owl-carousel owl-theme brand discount-slider mt-4">
            @inject('get_bike_brand', '\App\Modules\Brand\Repositories\BrandRepository')
            @php
                $bike_brands = $get_bike_brand->findBikeType($limit=50);
            @endphp

            @foreach($bike_brands as $bike_brand)
                <div class="item">
                    <a href="category.php" class="brand-item">
                        <img src="{{($bike_brand->brand_logo) ? asset($bike_brand->file_full_path).'/'.$bike_brand->brand_logo : asset('admin/default.png')}}" alt="{{$bike_brand->brand_name}}">
                        <h5>{{$bike_brand->brand_name}}</h5>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>


<section class="ecm-features home-tabs ecm-new pt-3 pb-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="ecm-features__title d-flex align-items-center justify-content-between">
                    <h1><span>Available</span> Services</h1>
                    <a href="product-list.php" class="see-all text-right">View all <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-one-tab" data-toggle="pill" href="#pills-one" role="tab" aria-controls="pills-one" aria-selected="true">Wokshop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-two-tab" data-toggle="pill" href="#pills-two" role="tab" aria-controls="pills-two" aria-selected="false">Servicing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-three-tab" data-toggle="pill" href="#pills-three" role="tab" aria-controls="pills-three" aria-selected="false">Roadside Assistance</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-one" role="tabpanel" aria-labelledby="pills-one-tab">
                        <div class="owl-carousel owl-theme new-featured">
                            <div class="item">
                                <div class="services_item">
                                    <img src="home/img/Mask-1.png" alt="">
                                    <div class="services_item_desc">
                                        <h6><a href="">Mauris Fermentum Dictum</a></h6>
                                        <span><i class="fa fa-map-marker"></i> &nbsp; Kathmandu, Nepal</span>
                                        <p class="mb-0">Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="services_item">
                                    <img src="home/img/Mask-2.png" alt="">
                                    <div class="services_item_desc">
                                        <h6><a href="">Mauris Fermentum Dictum</a></h6>
                                        <span><i class="fa fa-map-marker"></i> &nbsp; Kathmandu, Nepal</span>
                                        <p class="mb-0">Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="services_item">
                                    <img src="home/img/Mask-3.png" alt="">
                                    <div class="services_item_desc">
                                        <h6><a href="">Mauris Fermentum Dictum</a></h6>
                                        <span><i class="fa fa-map-marker"></i> &nbsp; Kathmandu, Nepal</span>
                                        <p class="mb-0">Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="services_item">
                                    <img src="home/img/Mask.png" alt="">
                                    <div class="services_item_desc">
                                        <h6><a href="">Mauris Fermentum Dictum</a></h6>
                                        <span><i class="fa fa-map-marker"></i> &nbsp; Kathmandu, Nepal</span>
                                        <p class="mb-0">Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="services_item">
                                    <img src="home/img/Mask-1.png" alt="">
                                    <div class="services_item_desc">
                                        <h6><a href="">Mauris Fermentum Dictum</a></h6>
                                        <span><i class="fa fa-map-marker"></i> &nbsp; Kathmandu, Nepal</span>
                                        <p class="mb-0">Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-two" role="tabpanel" aria-labelledby="pills-two-tab">

                    </div>
                    <div class="tab-pane fade" id="pills-three" role="tabpanel" aria-labelledby="pills-three-tab">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ecm-features home-tabs ecm-new pt-0 pb-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="ecm-features__title d-flex align-items-center justify-content-between">
                    <h1><span>Most Searched</span> Cars and Bikes</h1>
                    <a href="product-list.php" class="see-all text-right">View all <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-four-tab" data-toggle="pill" href="#pills-four" role="tab" aria-controls="pills-four" aria-selected="true">Sedan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-five-tab" data-toggle="pill" href="#pills-five" role="tab" aria-controls="pills-five" aria-selected="false">SUV</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-six-tab" data-toggle="pill" href="#pills-six" role="tab" aria-controls="pills-six" aria-selected="false">hatchback</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-four" role="tabpanel" aria-labelledby="pills-four-tab">
                        <div class="owl-carousel owl-theme new-featured">
                            <div class="item">
                                <div class="services_item">
                                    <img src="home/img/cars/Mask-1.png" alt="">
                                    <div class="services_item_desc">
                                        <h6><a href="#">Hyundai Aura</a></h6>
                                        <p class="mb-0">Starting 12 lakhs - 20 lakhs</p>
                                        <div class="d-flex justify-content-end">
                                            <a href="" class="btn btn-outline-warning">View Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="services_item">
                                    <img src="home/img/cars/Mask-2.png" alt="">
                                    <div class="services_item_desc">
                                        <h6><a href="#">Honda Amaze</a></h6>
                                        <p class="mb-0">Starting 14 lakhs - 20 lakhs</p>
                                        <div class="d-flex justify-content-end">
                                            <a href="" class="btn btn-outline-warning">View Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="services_item">
                                    <img src="home/img/cars/Mask-3.png" alt="">
                                    <div class="services_item_desc">
                                        <h6><a href="#">Maruti Dezire</a></h6>
                                        <p class="mb-0">Starting 11 lakhs - 20 lakhs</p>
                                        <div class="d-flex justify-content-end">
                                            <a href="" class="btn btn-outline-warning">View Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="services_item">
                                    <img src="home/img/cars/Mask.png" alt="">
                                    <div class="services_item_desc">
                                        <h6><a href="#">Hyundai Verna</a></h6>
                                        <p class="mb-0">Starting 12 lakhs - 15 lakhs</p>
                                        <div class="d-flex justify-content-end">
                                            <a href="" class="btn btn-outline-warning">View Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="services_item">
                                    <img src="home/img/cars/Mask-1.png" alt="">
                                    <div class="services_item_desc">
                                        <h6><a href="#">Hyundai Amaze</a></h6>
                                        <p class="mb-0">Starting 10 lakhs - 30 lakhs</p>
                                        <div class="d-flex justify-content-end">
                                            <a href="" class="btn btn-outline-warning">View Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-five" role="tabpanel" aria-labelledby="pills-five-tab">
                        <div class="owl-carousel owl-theme new-featured">
                            <div class="item">
                                <div class="services_item">
                                    <img src="home/img/cars/Mask-1.png" alt="">
                                    <div class="services_item_desc">
                                        <h6><a href="#">Hyundai Aura</a></h6>
                                        <p class="mb-0">Starting 12 lakhs - 20 lakhs</p>
                                        <div class="d-flex justify-content-end">
                                            <a href="" class="btn btn-outline-warning">View Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="services_item">
                                    <img src="home/img/cars/Mask-2.png" alt="">
                                    <div class="services_item_desc">
                                        <h6><a href="#">Honda Amaze</a></h6>
                                        <p class="mb-0">Starting 14 lakhs - 20 lakhs</p>
                                        <div class="d-flex justify-content-end">
                                            <a href="" class="btn btn-outline-warning">View Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="services_item">
                                    <img src="home/img/cars/Mask-3.png" alt="">
                                    <div class="services_item_desc">
                                        <h6><a href="#">Maruti Dezire</a></h6>
                                        <p class="mb-0">Starting 11 lakhs - 20 lakhs</p>
                                        <div class="d-flex justify-content-end">
                                            <a href="" class="btn btn-outline-warning">View Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="services_item">
                                    <img src="home/img/cars/Mask.png" alt="">
                                    <div class="services_item_desc">
                                        <h6><a href="#">Hyundai Verna</a></h6>
                                        <p class="mb-0">Starting 12 lakhs - 15 lakhs</p>
                                        <div class="d-flex justify-content-end">
                                            <a href="" class="btn btn-outline-warning">View Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="services_item">
                                    <img src="home/img/cars/Mask-1.png" alt="">
                                    <div class="services_item_desc">
                                        <h6><a href="#">Hyundai Amaze</a></h6>
                                        <p class="mb-0">Starting 10 lakhs - 30 lakhs</p>
                                        <div class="d-flex justify-content-end">
                                            <a href="" class="btn btn-outline-warning">View Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-six" role="tabpanel" aria-labelledby="pills-six-tab">
                        <div class="owl-carousel owl-theme new-featured">
                            <div class="item">
                                <div class="services_item">
                                    <img src="home/img/cars/Mask-1.png" alt="">
                                    <div class="services_item_desc">
                                        <h6><a href="#">Hyundai Aura</a></h6>
                                        <p class="mb-0">Starting 12 lakhs - 20 lakhs</p>
                                        <div class="d-flex justify-content-end">
                                            <a href="" class="btn btn-outline-warning">View Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="services_item">
                                    <img src="home/img/cars/Mask-2.png" alt="">
                                    <div class="services_item_desc">
                                        <h6><a href="#">Honda Amaze</a></h6>
                                        <p class="mb-0">Starting 14 lakhs - 20 lakhs</p>
                                        <div class="d-flex justify-content-end">
                                            <a href="" class="btn btn-outline-warning">View Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="services_item">
                                    <img src="home/img/cars/Mask-3.png" alt="">
                                    <div class="services_item_desc">
                                        <h6><a href="#">Maruti Dezire</a></h6>
                                        <p class="mb-0">Starting 11 lakhs - 20 lakhs</p>
                                        <div class="d-flex justify-content-end">
                                            <a href="" class="btn btn-outline-warning">View Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="services_item">
                                    <img src="home/img/cars/Mask.png" alt="">
                                    <div class="services_item_desc">
                                        <h6><a href="#">Hyundai Verna</a></h6>
                                        <p class="mb-0">Starting 12 lakhs - 15 lakhs</p>
                                        <div class="d-flex justify-content-end">
                                            <a href="" class="btn btn-outline-warning">View Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="services_item">
                                    <img src="home/img/cars/Mask-1.png" alt="">
                                    <div class="services_item_desc">
                                        <h6><a href="#">Hyundai Amaze</a></h6>
                                        <p class="mb-0">Starting 10 lakhs - 30 lakhs</p>
                                        <div class="d-flex justify-content-end">
                                            <a href="" class="btn btn-outline-warning">View Detail</a>
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
</section>

<section class="ap-features">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="d-flex align-items-center">
                    <svg width="46" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 47 47"><path d="M21.035 12.52l-6.2-10.332C14.388 1.377 13.31.75 12.41.75H2.437C1.27.75.552 2.098 1.18 3.086L11.242 17.37c2.606-2.515 6.02-4.223 9.793-4.851zM45.473.75H35.5c-.988 0-1.887.54-2.426 1.438L26.875 12.52c3.773.628 7.188 2.335 9.793 4.851L46.731 3.086c.628-.988-.09-2.336-1.258-2.336zM24 15.125c-8.805 0-15.813 7.098-15.813 15.813 0 8.804 7.008 15.812 15.813 15.812 8.715 0 15.813-7.008 15.813-15.813 0-8.714-7.098-15.812-15.813-15.812zm8.266 14.195l-3.414 3.325.808 4.671c.18.809-.719 1.438-1.527 1.078L24 36.148l-4.223 2.246c-.808.36-1.707-.269-1.527-1.078l.809-4.672-3.415-3.324c-.628-.629-.269-1.617.54-1.797l4.761-.628 2.067-4.313c.18-.36.539-.539.898-.539.45 0 .809.18.988.539l2.067 4.313 4.762.628c.808.18 1.168 1.168.539 1.797z" fill="#ccc"/></svg>
                    <div class="ap-features_item">
                        <h5>Nepal’s #1</h5>
                        <span>Largest Auto Portal</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="d-flex align-items-center">
                    <svg width="46" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 59 47"><path d="M47 17.91c.898.18 1.887.18 2.785 0l.809 1.348c.27.449.808.629 1.347.449.989-.36 1.977-.988 2.875-1.617.36-.36.54-.988.27-1.438l-.809-1.258c.63-.718 1.168-1.617 1.438-2.515h1.527c.54 0 .989-.36 1.078-.899.18-1.168.18-2.246 0-3.324-.09-.539-.539-.988-1.078-.988h-1.527c-.27-.898-.809-1.707-1.438-2.426l.809-1.258c.27-.539.09-1.078-.27-1.437-.898-.719-1.886-1.258-2.875-1.707-.539-.18-1.078 0-1.347.539l-.809 1.258a7.262 7.262 0 00-2.785 0l-.809-1.258c-.27-.54-.808-.719-1.347-.54-.989.45-1.977.99-2.875 1.708-.36.36-.54.898-.27 1.437l.809 1.258c-.63.719-1.168 1.528-1.438 2.426h-1.527c-.54 0-.988.45-1.078.988a10.322 10.322 0 000 3.324c.09.54.539.899 1.078.899h1.527c.27.898.809 1.797 1.438 2.516l-.809 1.257c-.27.45-.09 1.078.27 1.438.898.629 1.886 1.258 2.875 1.617.539.18 1.078 0 1.347-.45L47 17.91zm-.988-5.21c-2.606-3.505 1.258-7.458 4.761-4.762 2.696 3.414-1.257 7.367-4.761 4.761zM35.68 26.534c.36-1.887.36-3.863 0-5.75l3.054-1.527c.899-.54 1.258-1.617.899-2.606-.809-2.156-2.336-4.133-3.864-5.93-.628-.808-1.796-.988-2.695-.449l-2.605 1.528a15.178 15.178 0 00-4.942-2.875V5.96c0-1.078-.718-1.977-1.797-2.156a21.757 21.757 0 00-6.828 0c-.988.18-1.707 1.078-1.707 2.156v2.965c-1.886.629-3.504 1.617-4.941 2.875l-2.606-1.528c-.988-.539-2.066-.27-2.785.45-1.437 1.796-2.965 3.773-3.773 5.93-.36.988 0 2.066.988 2.605l2.965 1.527a15.468 15.468 0 000 5.75l-2.965 1.438c-.988.539-1.348 1.707-.988 2.605.808 2.246 2.336 4.223 3.773 5.93a2.207 2.207 0 002.785.449l2.606-1.438c1.437 1.169 3.055 2.157 4.941 2.786v3.054c0 1.078.72 1.977 1.797 2.157 2.246.359 4.582.359 6.738 0 1.079-.18 1.797-1.078 1.797-2.157v-3.054c1.797-.63 3.504-1.617 4.942-2.785l2.605 1.527c.899.45 2.067.27 2.696-.54 1.527-1.706 3.054-3.683 3.863-5.929.36-.988 0-2.066-.899-2.605l-3.054-1.438zm-10.602 1.887c-6.918 5.3-14.824-2.606-9.433-9.524 6.918-5.3 14.734 2.606 9.433 9.524zM47 44.773c.898.18 1.887.18 2.785 0l.809 1.348c.27.45.808.629 1.347.45.989-.36 1.977-.989 2.875-1.708.36-.27.54-.898.27-1.347l-.809-1.348c.63-.719 1.168-1.527 1.438-2.426h1.527c.54 0 .989-.36 1.078-.898.18-1.168.18-2.246 0-3.325-.09-.538-.539-.988-1.078-.988h-1.527c-.27-.898-.809-1.707-1.438-2.425l.809-1.258c.27-.54.09-1.078-.27-1.438-.898-.719-1.886-1.258-2.875-1.707-.539-.18-1.078 0-1.347.54l-.809 1.257a7.262 7.262 0 00-2.785 0l-.809-1.258c-.27-.539-.808-.719-1.347-.539-.989.45-1.977.988-2.875 1.707-.36.36-.54.899-.27 1.438l.809 1.258c-.63.718-1.168 1.527-1.438 2.425h-1.527c-.54 0-.988.45-1.078.989a10.323 10.323 0 000 3.324c.09.539.539.898 1.078.898h1.527c.27.899.809 1.707 1.438 2.426l-.809 1.348c-.27.449-.09 1.078.27 1.347.898.719 1.886 1.348 2.875 1.707.539.18 1.078 0 1.347-.449L47 44.773zm-.988-5.3c-2.606-3.414 1.258-7.367 4.761-4.672 2.696 3.414-1.257 7.367-4.761 4.672z" fill="#ccc"/></svg>
                    <div class="ap-features_item">
                        <h5>Top Listed</h5>
                        <span>Repair Services</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="d-flex align-items-center">
                    <svg width="46" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46 47"><path d="M9.344 20.875H2.156C.898 20.875 0 21.863 0 23.031v21.563c0 1.258.898 2.156 2.156 2.156h7.188c1.168 0 2.156-.898 2.156-2.156V23.03c0-1.168-.988-2.156-2.156-2.156zM5.75 43.156c-1.258 0-2.156-.898-2.156-2.156 0-1.168.898-2.156 2.156-2.156 1.168 0 2.156.988 2.156 2.156 0 1.258-.988 2.156-2.156 2.156zM34.5 8.117C34.5 1.47 30.187.75 28.031.75c-1.886 0-2.695 3.594-3.054 5.21-.54 1.978-.989 3.954-2.336 5.302-2.875 2.965-4.403 6.648-7.996 10.152-.18.27-.27.54-.27.809v19.226c0 .54.45.989.988 1.078 1.438 0 3.325.809 4.762 1.438C23 45.223 26.504 46.75 30.816 46.75h.27c3.863 0 8.445 0 10.242-2.605.809-1.079.988-2.426.54-4.043 1.526-1.528 2.245-4.403 1.526-6.739 1.528-2.066 1.708-5.031.81-7.097C45.28 25.188 46 23.48 45.91 21.863c0-2.785-2.336-5.3-5.3-5.3h-9.165c.72-2.516 3.055-4.672 3.055-8.446z" fill="#ccc"/></svg>
                    <div class="ap-features_item">
                        <h5>Easy Search</h5>
                        <span>All Vehicles</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="d-flex align-items-center">
                    <svg width="46" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46 47"><path d="M45.371 40.55l-8.984-8.984c-.45-.359-.989-.628-1.528-.628h-1.437c2.426-3.145 3.953-7.098 3.953-11.5C37.375 9.194 28.93.75 18.687.75 8.355.75 0 9.195 0 19.438 0 29.77 8.355 38.124 18.688 38.124c4.312 0 8.265-1.438 11.5-3.953v1.527c0 .54.18 1.078.628 1.528l8.895 8.894c.898.898 2.246.898 3.055 0l2.515-2.516c.899-.808.899-2.156.09-3.054zm-26.684-8.175A12.884 12.884 0 015.75 19.437C5.75 12.34 11.5 6.5 18.688 6.5c7.097 0 12.937 5.84 12.937 12.938 0 7.187-5.84 12.937-12.938 12.937zm2.426-13.656L17.07 17.46c-.539-.09-.808-.54-.808-1.078 0-.719.449-1.258 1.078-1.258h2.515c.36 0 .81.18 1.168.36.27.18.63.18.899-.09l.988-.989a.674.674 0 000-1.078c-.808-.629-1.797-.988-2.785-.988v-1.527c0-.36-.36-.72-.719-.72H17.97c-.45 0-.719.36-.719.72v1.527c-2.156 0-3.863 1.797-3.863 4.043a4.076 4.076 0 002.785 3.863l4.043 1.258c.539.09.808.539.808 1.078 0 .719-.449 1.168-1.078 1.168H17.43c-.36 0-.809-.09-1.168-.27a.691.691 0 00-.899.09l-.988.989a.674.674 0 000 1.078 4.642 4.642 0 002.875.988v1.438c0 .449.27.718.719.718h1.437c.36 0 .719-.27.719-.718v-1.438c2.066 0 3.773-1.797 3.773-4.043 0-1.797-1.168-3.414-2.785-3.863z" fill="#ccc"/></svg>
                    <div class="ap-features_item">
                        <h5>Offers</h5>
                        <span>Stay Updated</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="ecm-features">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="ecm-features__title d-flex align-items-center justify-content-between">
                    <h1><span>Explore Luxury</span> Vehicles</h1>
                    <a href="product-list.php" class="see-all text-right">View all <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="owl-carousel owl-theme luxury-block stock-clearance">
        @inject('banner', '\App\Modules\Banner\Repositories\BannerRepository')
        @php
            $luxury_banners = $banner->findAllActiveLuxuryBanner($limit=50);
        @endphp
        @foreach($luxury_banners as $luxury_banners)
            <div class="item">
                <div class="luxury-slider" style="background-image: url('{{ ($luxury_banners->banner_image) ? asset($luxury_banners->file_full_path).'/'.$luxury_banners->banner_image : asset('admin/default.png' )}}">
                    <div class="position-relative">
                        <h4>Checkout Luxury car</h4>
                        <p>{{$luxury_banners->short_content}}</p>
                        <a href="{{$luxury_banners->banner_link}}" class="btn btn-light">
                            View All
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
     
    </div>
    <div class="container">
        <div class="row">
            @inject('luxury', '\App\Modules\Cars\Repositories\CarRepository')
            @php
                $luxuaries = $luxury->findLuxury();
            @endphp
            @foreach($luxuaries as $luxury)
            <div class="col-md-3">
                <a href="category.php" class="ecm-luxury__item">
                    <span class="ecm-luxury__img">
                        <img src="{{ ($luxury->car_image) ? asset($luxury->file_full_path).'/'.$luxury->car_image : asset('admin/default.png' )}}" alt="{{$luxury->ModelInfo->model_name}} {{$luxury->VariantInfo->variant_name}}">
                    </span>
                    <h5>{{$luxury->BrandInfo->brand_name}}</h5>
                </a>
            </div>
            @endforeach
      
        </div>
    </div>
</section>


<section class="ecm-features pt-0 pb-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="ecm-features__title d-flex align-items-center justify-content-between">
                    <h1><span>Upcoming</span> New Cars</h1>
                    <a href="product-list.php" class="see-all text-right">View all <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel owl-theme trending-products">
                    <div class="item">
                        <a href="category.php" class="ecm-luxury__item">
                            <span class="ecm-luxury__img">
                                <img src="home/img/scooter/Mask.png" alt="">
                            </span>
                            <h5>Mercedez Benz</h5>
                        </a>
                    </div>
                    <div class="item">
                        <a href="category.php" class="ecm-luxury__item">
                            <span class="ecm-luxury__img">
                                <img src="home/img/scooter/Mask-1.png" alt="">
                            </span>
                            <h5>Mercedez Benz</h5>
                        </a>
                    </div>
                    <div class="item">
                        <a href="category.php" class="ecm-luxury__item">
                            <span class="ecm-luxury__img">
                                <img src="home/img/scooter/Mask-2.png" alt="">
                            </span>
                            <h5>Mercedez Benz</h5>
                        </a>
                    </div>
                    <div class="item">
                        <a href="category.php" class="ecm-luxury__item">
                            <span class="ecm-luxury__img">
                                <img src="home/img/scooter/Mask-3.png" alt="">
                            </span>
                            <h5>Mercedez Benz</h5>
                        </a>
                    </div>
                    <div class="item">
                        <a href="category.php" class="ecm-luxury__item">
                            <span class="ecm-luxury__img">
                                <img src="home/img/scooter/Mask-1.png" alt="">
                            </span>
                            <h5>Mercedez Benz</h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="ecm-features pt-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="ecm-features__title d-flex align-items-center justify-content-between">
                    <h1><span>Latest</span> News/Blogs</h1>
                    <a href="product-list.php" class="see-all text-right">View all <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <a href="category.php" class="ecm-luxury__item">
                    <span class="ecm-luxury__img">
                        <img src="home/img/blog/Mask.png" alt="">
                    </span>
                    <div class="ecm-luxury__desc">
                        <span><i class="fa fa-calendar"></i> &nbsp;October 28, 2020</span>
                        <h5>Mercedez Benz</h5>
                        <p>Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis.</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="category.php" class="ecm-luxury__item">
                    <span class="ecm-luxury__img">
                        <img src="home/img/blog/Mask-1.png" alt="">
                    </span>
                    <div class="ecm-luxury__desc">
                        <span><i class="fa fa-calendar"></i> &nbsp;October 28, 2020</span>
                        <h5>Mercedez Benz</h5>
                        <p>Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis.</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="category.php" class="ecm-luxury__item">
                    <span class="ecm-luxury__img">
                        <img src="home/img/blog/Mask-2.png" alt="">
                    </span>
                    <div class="ecm-luxury__desc">
                        <span><i class="fa fa-calendar"></i> &nbsp;October 28, 2020</span>
                        <h5>Mercedez Benz</h5>
                        <p>Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis.</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="category.php" class="ecm-luxury__item">
                    <span class="ecm-luxury__img">
                        <img src="home/img/blog/Mask-3.png" alt="">
                    </span>
                    <div class="ecm-luxury__desc">
                        <span><i class="fa fa-calendar"></i> &nbsp;October 28, 2020</span>
                        <h5>Mercedez Benz</h5>
                        <p>Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis.</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="rtt-subscribe" style="background-image: url('home/img/banner-two.png');">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="text-white">
                    <h3>Keep updated & Get Unlimited Offers</h3>
                    <p class="mb-0">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                        Aenean commodo ec, vulputate eget, arcu.
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="rtt-subscribe--form d-flex align-items-center justify-content-center">
                    <input type="text" name="" value="" placeholder="Your email address here">
                    <button class="btn btn-warning ml-2" type="submit">Subscribe</button>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection



