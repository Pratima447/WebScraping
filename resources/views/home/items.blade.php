@include('common.header')

<body style="background: #eee;">
    <!-- Header -->
    <section class="container-fluid position_fixed header_section white_background">
        <div class="row col-md-12 col-sm-12 col-lg-12 col-xs-12 height_70 general_box_shadow">

        </div>
    </section>
    <!-- Header ends -->

    <!-- Main Page -->
    <section class="container-fluid m_t_5 ">
        <div class="row d_flex">
            @include('home.filter')

            <div class="col-md-9 col-sm-9 col-lg-9 col-xs-10 white_background  margin_0_10 sort_box chunk">
                <div class="chunk padding_10 h1_tag">
                    <h1 class="sans_font font_weight color_9b9b9b font_size_18 vertical_sub"><span class="custom_dot">. </span>Latest Deals</h2>
                </div>

                <!-- Placeholder divs -->
                <div class="d_flex sans_font" id="items">
                </div>
                <!-- Placeholder divs ends-->

                  <!-- Listings -->
                  <div class="d_flex sans_font" id="real_items">
                      @for($i = 0; $i < 10; $i++) 
                        <div class="item_main_card item_card_border ">
                            <div class=" item_box_shadow img_container">
                                <img class="item_img" src="./images/products/smart_band.jpeg" alt="Buy Mi Smart Band - India's No.1 Fitness Band" title="Buy Mi Smart Band - India's No.1 Fitness Band">
                            </div>
                            <div class="offer_card">
                                <p class="offer_text">40% &nbsp;OFF</p>
                            </div>
                            <div class="row item_detail_chunk font_size_14 sans_font">
                                <div class="margin_10_0">
                                    <span class="striked_text">1990</span>
                                    <span class="red_font">597/-</span>
                                </div>
                                <div>
                                    <span class="item_title">Buy Mi Smart Band - India's No.1 Fitness Band</span>
                                </div>
                            </div>
                            <hr class="custom_line">
                            <div class="chunk">
                                <div class="deal_btn deal_btn_pos m_b_10">
                                    <a class="no_deco_text font_size_12 green_font " href="">Get Deal</a>
                                </div>
                            </div>
                        </div>
                    @endfor

                </div>
                <!-- Listings Ends -->
            </div>
        </div>
    </section>
</body>

<footer>
    @include('common.footer')
</footer>