@include('common.header')

<body style="background: #eee;">
    <!-- Header -->
    <section class="container-fluid position_fixed header_section white_background">
        <div class="row col-md-12 col-sm-12 col-lg-12 col-xs-12 height_70 general_box_shadow">
            <center><h1 class="margin_0_10 chunk">Better pricing for better market !</h1></center>
            
        </div>
    </section>
    <!-- Header ends -->

    <section class="container-fluid m_t_5 ">
        <div class="row d_flex">
            <div id ="options" class="col-md-8 white_background  margin_0_10 chunk">
                <div class="chunk padding_10 h1_tag">
                    <h1 class="sans_font font_weight color_9b9b9b font_size_18 vertical_sub"><span class="custom_dot">. </span>Select sites, Brand and Category</h2>
                </div>

                <div class="row d_flex chunk padding_10 ">
                    <label class="chunk col-md-1 col-lg-1 col-sm-1" for="site">Site : </label>
                    <select name="site" id="site" class="chunk">
                        <option value="https://shakedeal.com">Shakedeal</option>
                    </select>
                </div>

                <div class="row d_flex chunk padding_10">
                    <label class="chunk col-md-1 col-lg-1 col-sm-1" for="category">Page : </label>
                    <select name="page" id="page" class="chunk">
                        <option value="">Select</option>
                        <option value="brand_page">Brand</option>
                        <option value="category_page">Category</option>
                    </select>
                </div>

                <div class="row d_flex chunk padding_10 d_none" id="cat_options">
                    <label class="chunk col-md-1 col-lg-1 col-sm-1" for="category">Category : </label>
                    <select name="category" id="category" class="chunk">
                        <option value="">Select</option>
                        <option value="/electricals-lp1">Electronics</option>
                        <option value="/cutters-power-tools-lp2">Cutting Machines</option>
                        <option value="/air-blowers-blowers-heat-guns-lp3">Air Blowers</option>
                        <option value="/safety-glasses-eye-protection-lp3">Safety Glasses</option>
                    </select>

                </div>

                <div class="row d_flex chunk padding_10 d_none" id="brand_options">
                    <label class="chunk col-md-1 col-lg-1 col-sm-1" for="brand">Brand : </label>
                    <select name="brand" id="brand" class="chunk">
                        <option value="">Select</option>
                        <option value="/brands/bosch">Bosch</option>
                        <option value="/brands/blue-steel">Blue-steel</option>
                        <option value="/brands/aerospace">Aerospace</option>

                    </select>

                </div>

                <div class="row d_flex chunk padding_10 ">
                    <button id="get_site_data" class="chunk sort_selected"> GO</button>
                </div>
            </div>
        </div>

    </section>
</body>

<footer>
    @include('common.footer')
    <script src="../../../js/fetch_info.js?v=1.0.10"></script>
</footer>