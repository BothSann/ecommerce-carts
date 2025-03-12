<x-app-layout>
    <!--============================
        PRODUCT DETAILS START
    =============================-->
    <section class="wsus__product_details mt_170 mb_100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-5 wow fadeInLeft">
                    <div class="wsus__product_details_slider_area">
                        <div class="row slider-forFive">
                            <div class="col-xl-12">
                                <div class="wsus__product_details_slide_show_img">
                                    <img src="{{ asset($product->thumbnail) }}" alt="product" class="img-fluid w-100">
                                </div>
                            </div>
                            @foreach ($product->images as $image)
                                <div class="col-xl-12">
                                    <div class="wsus__product_details_slide_show_img">
                                        <img src="{{ asset($image->path) }}" alt="product" class="img-fluid w-100">
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div class="wsus__product_details_slider">
                            <div class="row slider-navFive">
                                @foreach ($product->images as $image)
                                    <div class="col-xl-2">
                                        <div class="wsus__product_details_slider_img">
                                            <img src="{{ asset($image->path) }}" alt="product" class="img-fluid w-100">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-7 wow fadeInRight">
                    <div class="wsus__product_summary">
                        <h2>{{ $product->name }}</h2>
                        <span>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <b>8k+ reviews</b>
                        </span>
                        <h6> ${{ $product->price }}.00</h6>
                        <p>{{ $product->short_description }}
                        </p>

                        <h6 class="mt_30">Color</h6>
                        <select class="select_2" name="state">
                            @foreach ($product->colors as $color)
                                <option value="{{ $color->name }}">{{ $color->name }}</option>
                            @endforeach
                        </select>


                        <div class="wsus__product_add_cart">
                            <div class="wsus__product_quantity">
                                <button class="minus" type="submit"><i class="far fa-minus"></i></button>
                                <input type="text" placeholder="01">
                                <button class="plus" type="submit"><i class="far fa-plus"></i></button>
                            </div>
                            <div class="wsus__buy_cart_button">
                                <a href="#" class="cart"><img src="images/cart_icon_black.svg" alt="cart"
                                        class="img-fluid w-100"></a>
                                <a href="cart.html" class="common_btn">Buy Now</a>
                            </div>
                        </div>
                        <ul class="flex-wrap wishlist d-flex">
                            <li><a href="#"><span><i class="fal fa-heart"></i></span>ADD TO WISHLIST</a></li>
                            <li><a href="#"><span><i class="fal fa-share-alt"></i></span>SHARE</a></li>
                        </ul>
                        <ul class="details">
                            <li>SKU:<span>{{ $product->sku }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="wsus__product_details_menu_contant">
                        <div class="wsus__product_description wow fadeInUp">
                            <p>
                                {!! $product->description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
     PRODUCT DETAILS END
  =============================-->

    <x-slot name="scripts">
        <script src="{{ asset('assets/js/slick.min.js') }}"></script>
        <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    </x-slot>
</x-app-layout>
