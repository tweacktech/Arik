<%- include("header") %>
    <style>
    .heading-title h2,
        h1 {
            font-weight: 500;
            text-align: center;
            text-transform: uppercase;
            color: #fff;
            margin: 0;
        }
        
        .layout-6.common-home #content .box-advanced-search .search-boxes,
        .layout-6.common-home #content .box-advanced-search .search-button {
            width: 25%;
            padding: 0 5px;
        }
        
        @media (max-width: 767px) {
            .layout-6.common-home #content .box-advanced-search .search-boxes,
            .layout-6.common-home #content .box-advanced-search .search-button {
                width: 100%;
                padding: 0 5px;
            }
        }
        
        .layout-6.common-home #content .so_advanced_search .heading-title h2 {
            font-size: 25px;
        }
        
        .img-responsive {
            max-height: 300px;
            width: auto!important;
        }
        
        .product-image-container {
            padding-top: 10px;
            padding-bottom: 10px;
        }
        
        @media (max-width: 767px) {
            .layout-6.common-home #content .so_advanced_search .heading-title h2 {
                padding: 40px 20px 20px 20px;
                font-size: 16px;
            }
        }
        
        @media (min-width: 992px) {
            .slide {
                height: 500px;
            }
        }
        
        @media (max-width: 991px) {
            .slide {
                height: 520px;
            }
        }
        
        @media (max-width: 927px) {
            .slide {
                height: 520px;
            }
        }
        
        @media (max-width: 827px) {
            .slide {
                height: 484px;
            }
        }
        
        @media (max-width: 751px) {
            .slide {
                height: 450px;
            }
        }
        
        @media (max-width: 680px) {
            .slide {
                height: 428px;
            }
        }
        
        @media (max-width: 650px) {
            .slide {
                height: 403px;
            }
        }
        
        @media (max-width: 600px) {
            .slide {
                height: 377px;
            }
        }
    }
    @media (max-width: 567px) {
        .slide {
            height: 351px;
        }
    }
    @media (max-width: 500px) {
        .slide {
            height: 267px;
        }
    }
    @media (max-width: 465px) {
        .slide {
            height: 237px;
        }
    }
    @media (max-width: 435px) {
        .slide {
            height: 210px;
        }
    }
    @media (max-width: 767px) {
        .layout-6.common-home #content .so_advanced_search .sas_inner-box-search .search-boxes {
            margin-bottom: 16px;
            width: 100%;
        }
    }
    #cover-spin {
        position: fixed;
        width: 100%;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        background-color: rgba(255, 255, 255, 0.7);
        z-index: 9999;
        display: none;
    }
    @-webkit-keyframes spin {
        from {
            -webkit-transform: rotate(0deg);
        }
        
        to {
            -webkit-transform: rotate(360deg);
        }
    }
    @keyframes spin {
        from {
            transform: rotate(0deg);
        }
        
        to {
            transform: rotate(360deg);
        }
    }
    #cover-spin::after {
        content: '';
        display: block;
        position: absolute;
        left: 48%;
        top: 40%;
        width: 40px;
        height: 40px;
        border-style: solid;
        border-color: black;
        border-top-color: transparent;
        border-width: 4px;
        border-radius: 50%;
        -webkit-animation: spin .8s linear infinite;
        animation: spin .8s linear infinite;
    }
    </style>
    <% const get_discount = (price, dis) => {
var d1 = price * dis
return Math.floor(d1/100).toFixed(2)

} %>
        <% function truncate(str, n){
  return (str.length > n) ? str.substr(0, n-1) + '&hellip;' : str;
}; %>
            <!-- Main Container  -->
            <div class="main-container" style="ma">
                <div id="content">
                    <div class="slideshow-full">
                        <div class="module sohomepage-slider " style="background: #fff;">
                            <div class="yt-content-slider" data-rtl="yes" data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column00="1" data-items_column0="1" data-items_column1="1" data-items_column2="1" data-items_column3="1" data-items_column4="1"
                                data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="no" data-hoverpause="yes">

                                <div class="yt-content-slide">

                                    <div class="slide" style="width: 100%;background: url('<%= settings[0].slider_1 %>') center; background-size: cover; background-repeat: no-repeat;">
                                        <!--<img src="/img/bg/gapp_2.png" alt="slider1" class="img-responsive">-->
                                    </div>
                                </div>
                                <div class="yt-content-slide">
                                    <div class="slide" style="width: 100%;background: url('<%= settings[0].slider_2 %>') center; background-size: cover;background-repeat: no-repeat;">
                                    </div>
                                    <!--<a href="/parts"><img src="/img/bg/gapa_banner2.png" alt="slider2" class="img-responsive"></a>-->
                                </div>

                                <div class="yt-content-slide">
                                    <div class="slide" style="width: 100%;background: url('<%= settings[0].slider_3 %>') center; background-size: cover;background-repeat: no-repeat;">
                                    </div>
                                    <!--<a href="/parts"><img src="/img/bg/slide3.jpg" alt="slider3" class="img-responsive"></a>-->
                                </div>
                            </div>

                            <div class="loadeding"></div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="box-advanced-search">
                            <div class="so_advanced_search">
                                <div class="sas_wrap">
                                    <div class="sas_inner">
                                        <div class="heading-title">
                                            <h1 style="padding: 10px 10px 10px 10px;">Find Your Vehicle Parts</h1>
                                        </div>
                                        <div class="sas_inner-box-search" style="padding: 10px 60px 10px 60px">
                                            <form action="/search" class="row" style="margin-bottom: 10px;">
                                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 search-boxes">

                                                    <div id="cover-spin"></div>

                                                    <select name="make" id="so_make0" class="form-control" onchange="change_model()">
                                                <option value="">Select Make</option>
                                                    <% brands.forEach(brand => { %>
                                                    <option value="<%= brand.id %>"><%= brand.name %></option>
                                                    <% }) %> 
                                                    
                                            </select>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 search-boxes" id="002">
                                                    <select name="model" id="so_model0" class="form-control" onchange="change_md()">
                                                <option value="">Select Model</option>
                                                
                                            </select>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 search-boxes" id="003">
                                                    <select name="year" id="so_year0" class="form-control" onchange="change_yr()">
                                                <option value="">Select Year</option>
                                            </select>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 search-button">
                                                    <button type="submit" id="sas_search_button0" style="width: 100%;">Find My Part</button>
                                                </div>
                                            </form>
                                            <div class="heading-title">
                                                <h2 style="padding: 5px 10px 25px 10px;">— OR —</h2>
                                            </div>
                                            <form class="row" action="/vin-search" method="GET">
                                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 search-boxes">
                                                    <select name="type" id="so_type01" class="form-control" onChange="change_type()">
                                                <option value="vin">Search By VIN</option>
                                                <option value="code">Search By Article Number</option>
                                            </select>
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 search-boxes" id="vn">
                                                    <input type="text" name="vin" placeholder="Vehicle Vin" id="vin" onchange="change_vin()" class="form-control" maxlength="17" style="padding: 21px 10px 21px 10px!important;">
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 search-boxes" id="pc" style="display: none;">
                                                    <input type="text" name="code" placeholder="Article Number" id="code" class="form-control" style="padding: 21px 10px 21px 10px!important;">
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 search-button">
                                                    <button type="submit" style="width: 100%;">Find My Part</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="custom-cates" style="margin-top: 20px; margin-bottom: 0px;">
                        <div style="z-index: 0;" class="yt-content-slider contentslider" data-rtl="no" data-loop="yes" data-autoplay="no" data-autoheight="yes" data-autowidth="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column00="5" data-items_column0="5"
                            data-items_column1="4" data-items_column2="3" data-items_column3="2" data-items_column4="1" data-arrows="no" data-pagination="no" data-lazyload="yes" data-hoverpause="yes">
                            <% categories.forEach(cat => { %>
                                <div class="item" style="height: 130px!important;">
                                    <a href="/category/<%= cat.slug %>" class="img">
                        <img src="<%= cat.img_url %>" alt="banner">
                    </a>
                                    <div class="cont">
                                        <h5>
                                            <%= cat.title %>
                                        </h5>
                                        <span>View products</span>
                                    </div>
                                    <div class="lnk"><a href="/category/<%= cat.slug %>">Discover now</a></div>
                                </div>
                                <% }) %>
                        </div>
                    </div>

                    <div class="content-main-w">
                        <div class="container" style="padding: 0px;">

                            <% if(top.length > 0){ %>
                                <div class="module extra-layout6">
                                    <div class="pre_text">Our Top Products</div>
                                    <h3 class="modtitle"><span>Hand Picked Quality Products</span></h3>
                                    <div class="mx-auto modcontent">
                                        <div class="so-extraslider">
                                            <div class="extraslider-inner products-list" style="margin: 0 auto 0 auto; padding: 0px;">
                                                <center>
                                                    <div class="item" style="margin: auto;">
                                                        <% top.forEach((top, id) => { %>
                                                            <% if(id == 1){ %>
                                                                <div class="product-layout product-grid style1 nitem item-1">
                                                                    <div class="product-item-container item--static">
                                                                        <div class="left-block">
                                                                            <div class="product-image-container second_img">
                                                                                <a href="/parts/<%= top.part.id %>" title="<%- truncate(top.part.name, 24) %>">
                                                                                    <!--<img src="/img/ter3449350_1.jpeg" class="img-1 img-responsive" alt="image1">-->
                                                                                    <!--<img src="/img/ter3449350_1.jpeg" class="img-2 img-responsive" alt="image2">-->
                                                                                    <img src="<%= top.part.img_url %>" class="img-1 img-responsive" alt="image1">
                                                                                    <img src="<%= top.part.img_url %>" class="img-2 img-responsive" alt="image2">
                                                                                </a>
                                                                            </div>
                                                                            <span class="label-product label-new">TOP</span>

                                                                        </div>
                                                                        <div class="right-block">
                                                                            <div class="button-group cartinfo--static">

                                                                                <button type="button" class="wishlist btn-button" title="Add to Wish List" onclick="wishlist.add('<%= top.part.id %>');"><i class="fa fa-heart"></i></button>
                                                                                <button type="button" class="addToCart" title="Add to cart" data-id="<%= top.part.id %>" data-img="<%= top.part.img_url %>" data-name="<%= top.part.name %>" data-quantity="1" clic="cart.add('<%= top.part.id %>', '<%= top.part.img_url %>', '<%= top.part.name %>', '1');">
                                                        <span>Add to cart </span>   
                                                    </button></div>
                                                                            <h4>
                                                                                <a href="/parts/<%= top.part.id %>" title="<%= top.part.name %>">
                                                                                    <%= top.part.name %>
                                                                                </a>
                                                                            </h4>

                                                                            <% var tot = 0 %>

                                                                                <% top.part.reviews.forEach(review => { 
                                    tot = tot + review.rating 
                                            }) %>
                                                                                    <% var rating = top.part.reviews.length > 0 ? tot / top.part.reviews.length  : 0; %>
                                                                                        <div class="rating">
                                                                                            <% if(rating == 0){ %>
                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                <% }else if(rating > 0 && rating < 1){ %>
                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-half fa-stack-2x" style="color: #FFC501;"></i></span>
                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                    <% } else if(rating === 1){ %>
                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                        <% }else if(rating > 1 && rating < 2){ %>
                                                                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-half fa-stack-2x" style="color: #FFC501;"></i></span>
                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                            <% } else if(rating === 2){ %>
                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                <% }else if(rating > 2 && rating < 3){ %>
                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-half fa-stack-2x" style="color: #FFC501;"></i></span>
                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                    <% } else if(rating === 3){ %>
                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                        <% }else if(rating > 3 && rating < 4){ %>
                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-half fa-stack-2x" style="color: #FFC501;"></i></span>
                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                            <% } else if(rating === 4){ %>
                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                <% }else if(rating > 4 && rating < 5){ %>
                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-half fa-stack-2x" style="color: #FFC501;"></i></span>
                                                                                                                                    <% } else if(rating === 5){ %>
                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                        <% } %>
                                                                                        </div>
                                                                                        <% if(top.part.discount > 0){ %>
                                                                                            <div class="price">
                                                                                                <% var prcc = top.part.price - parseInt(get_discount(top.part.price, top.part.discount)) %>
                                                                                                    <span class="price-new" itemprop="price"><%- cur %><%= prcc.toFixed(2) %></span>
                                                                                                    <span class="price-old"><%- cur %><%= top.part.price.toFixed(2) %></span>
                                                                                            </div>
                                                                                            <% } else { %>
                                                                                                <div class="price">
                                                                                                    <span class="price"><%- cur %> <%= top.part.price.toFixed(2) %></span>
                                                                                                </div>
                                                                                                <% } %>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <% } %>
                                                                    <% }) %>
                                                                        <% top.forEach((top, id) => { %>
                                                                            <% if(id == 3){ %>
                                                                                <div class="product-layout product-grid style1 nitem item-2" style="margin-top:35px!important;">
                                                                                    <div class="product-item-container item--static">
                                                                                        <div class="left-block">
                                                                                            <div class="product-image-container second_img">
                                                                                                <a href="/parts/<%= top.part.id %>" title="<%- truncate(top.part.name, 24) %>">
                                                        <img src="<%= top.part.img_url %>" class="img-1 img-responsive" alt="image1">
                                                        <img src="<%= top.part.img_url %>" class="img-2 img-responsive" alt="image2">
                                                    </a>
                                                                                            </div>
                                                                                            <span class="label-product label-new">TOP</span>
                                                                                        </div>
                                                                                        <div class="right-block">
                                                                                            <div class="button-group cartinfo--static">
                                                                                                <button type="button" class="wishlist btn-button" title="Add to Wish List" onclick="wishlist.add('<%= top.part.id %>');"><i class="fa fa-heart"></i></button>
                                                                                                <button type="button" class="addToCart" title="Add to cart" data-id="<%= top.part.id %>" data-img="<%= top.part.img_url %>" data-name="<%= top.part.name %>" data-quantity="1" clic="cart.add('<%= top.part.id %>', '<%= top.part.img_url %>', '<%= top.part.name %>', '1');">
                                                        <span>Add to cart </span>   
                                                    </button></div>
                                                                                            <h4>
                                                                                                <a href="/parts/<%= top.part.id %>" title="<%= top.part.name %>">
                                                                                                    <%- truncate(top.part.name, 24) %>
                                                                                                </a>
                                                                                            </h4>

                                                                                            <% var tot = 0 %>

                                                                                                <% top.part.reviews.forEach(review => { 
                                    tot = tot + review.rating 
                                            }) %>
                                                                                                    <% var rating = top.part.reviews.length > 0 ? tot / top.part.reviews.length  : 0; %>
                                                                                                        <div class="rating">
                                                                                                            <% if(rating == 0){ %>
                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                <% }else if(rating > 0 && rating < 1){ %>
                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-half fa-stack-2x" style="color: #FFC501;"></i></span>
                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                    <% } else if(rating === 1){ %>
                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                        <% }else if(rating > 1 && rating < 2){ %>
                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-half fa-stack-2x" style="color: #FFC501;"></i></span>
                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                            <% } else if(rating === 2){ %>
                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                <% }else if(rating > 2 && rating < 3){ %>
                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-half fa-stack-2x" style="color: #FFC501;"></i></span>
                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                    <% } else if(rating === 3){ %>
                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                        <% }else if(rating > 3 && rating < 4){ %>
                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-half fa-stack-2x" style="color: #FFC501;"></i></span>
                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                            <% } else if(rating === 4){ %>
                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                <% }else if(rating > 4 && rating < 5){ %>
                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-half fa-stack-2x" style="color: #FFC501;"></i></span>
                                                                                                                                                    <% } else if(rating === 5){ %>
                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                        <% } %>
                                                                                                        </div>
                                                                                                        <% if(top.part.discount > 0){ %>
                                                                                                            <div class="price">
                                                                                                                <% var prcc = top.part.price - parseInt(get_discount(top.part.price, top.part.discount)) %>
                                                                                                                    <span class="price-new" itemprop="price"><%- cur %><%= prcc.toFixed(2) %></span>
                                                                                                                    <span class="price-old"><%- cur %><%= top.part.price.toFixed(2) %></span>
                                                                                                            </div>
                                                                                                            <% } else { %>
                                                                                                                <div class="price">
                                                                                                                    <span class="price"><%- cur %> <%= top.part.price.toFixed(2) %></span>
                                                                                                                </div>
                                                                                                                <% } %>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <% } %>
                                                                                    <% }) %>
                                                                                        <% top.forEach((top, id) => { %>
                                                                                            <% if(id == 0){ %>
                                                                                                <div class="product-layout product-grid style1 special-item item-3">
                                                                                                    <div class="product-item-container item--static">
                                                                                                        <div class="left-block">
                                                                                                            <div class="product-image-container second_img">
                                                                                                                <a href="/parts/<%= top.part.id %>" title="<%= top.part.name %>">
                                                        <img src="<%= top.part.img_url %>" class="img-1 img-responsive" alt="image1">
                                                        <img src="<%= top.part.img_url %>" class="img-2 img-responsive" alt="image2">
                                                    </a>
                                                                                                            </div>
                                                                                                            <span class="label-product label-new">TOP</span>
                                                                                                        </div>
                                                                                                        <div class="right-block">
                                                                                                            <div class="button-group cartinfo--static">

                                                                                                                <button type="button" class="wishlist btn-button" title="Add to Wish List" onclick="wishlist.add('<%= top.part.id %>');"><i class="fa fa-heart"></i></button>
                                                                                                                <button type="button" class="addToCart" title="Add to cart" data-id="<%= top.part.id %>" data-img="<%= top.part.img_url %>" data-name="<%= top.part.name %>" data-quantity="1" clic="cart.add('<%= top.part.id %>', '<%= top.part.img_url %>', '<%= top.part.name %>', '1');">
                                                        <span>Add to cart </span>   
                                                    </button>

                                                                                                            </div>
                                                                                                            <h4>
                                                                                                                <a href="/parts/<%= top.part.id %>" title="<%= top.part.name %>">
                                                                                                                    <%- truncate(top.part.name, 24) %>
                                                                                                                </a>
                                                                                                            </h4>

                                                                                                            <% var tot = 0 %>

                                                                                                                <% top.part.reviews.forEach(review => { 
                                    tot = tot + review.rating 
                                            }) %>
                                                                                                                    <% var rating = top.part.reviews.length > 0 ? tot / top.part.reviews.length  : 0; %>
                                                                                                                        <div class="rating">
                                                                                                                            <% if(rating == 0){ %>
                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                <% }else if(rating > 0 && rating < 1){ %>
                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-half fa-stack-2x" style="color: #FFC501;"></i></span>
                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                    <% } else if(rating === 1){ %>
                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                        <% }else if(rating > 1 && rating < 2){ %>
                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-half fa-stack-2x" style="color: #FFC501;"></i></span>
                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                            <% } else if(rating === 2){ %>
                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                <% }else if(rating > 2 && rating < 3){ %>
                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-half fa-stack-2x" style="color: #FFC501;"></i></span>
                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                    <% } else if(rating === 3){ %>
                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                        <% }else if(rating > 3 && rating < 4){ %>
                                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-half fa-stack-2x" style="color: #FFC501;"></i></span>
                                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                            <% } else if(rating === 4){ %>
                                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                                <% }else if(rating > 4 && rating < 5){ %>
                                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-half fa-stack-2x" style="color: #FFC501;"></i></span>
                                                                                                                                                                    <% } else if(rating === 5){ %>
                                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                        <% } %>
                                                                                                                        </div>
                                                                                                                        <% if(top.part.discount > 0){ %>
                                                                                                                            <div class="price">
                                                                                                                                <% var prcc = top.part.price - parseInt(get_discount(top.part.price, top.part.discount)) %>
                                                                                                                                    <span class="price-new" itemprop="price"><%- cur %><%= prcc.toFixed(2) %></span>
                                                                                                                                    <span class="price-old"><%- cur %><%= top.part.price.toFixed(2) %></span>
                                                                                                                            </div>
                                                                                                                            <% } else { %>
                                                                                                                                <div class="price">
                                                                                                                                    <span class="price"><%- cur %> <%= top.part.price.toFixed(2) %></span>
                                                                                                                                </div>
                                                                                                                                <% } %>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <% } %>
                                                                                                    <% }) %>
                                                                                                        <% top.forEach((top, id) => { %>
                                                                                                            <% if(id == 2){ %>
                                                                                                                <div class="product-layout product-grid style1 nitem item-4">
                                                                                                                    <div class="product-item-container item--static">
                                                                                                                        <div class="left-block">
                                                                                                                            <div class="product-image-container second_img">
                                                                                                                                <a href="/parts/<%= top.part.id %>" title="<%= top.part.name %>">
                                                        <img src="<%= top.part.img_url %>" class="img-1 img-responsive" alt="image1">
                                                        <img src="<%= top.part.img_url %>" class="img-2 img-responsive" alt="image2">
                                                    </a>
                                                                                                                            </div>
                                                                                                                            <span class="label-product label-new">TOP</span>
                                                                                                                        </div>
                                                                                                                        <div class="right-block">
                                                                                                                            <div class="button-group cartinfo--static">

                                                                                                                                <button type="button" class="wishlist btn-button" title="Add to Wish List" onclick="wishlist.add('<%= top.part.id %>');"><i class="fa fa-heart"></i></button>
                                                                                                                                <button type="button" class="addToCart" title="Add to cart" data-id="<%= top.part.id %>" data-img="<%= top.part.img_url %>" data-name="<%= top.part.name %>" data-quantity="1" clic="cart.add('<%= top.part.id %>', '<%= top.part.img_url %>', '<%= top.part.name %>', '1');">
                                                        <span>Add to cart </span>   
                                                    </button>
                                                                                                                            </div>

                                                                                                                            <h4>
                                                                                                                                <a href="/parts/<%= top.part.id %>" title="<%= top.part.img_url %>">
                                                                                                                                    <%- truncate(top.part.name, 24) %>
                                                                                                                                </a>
                                                                                                                            </h4>

                                                                                                                            <% var tot = 0 %>

                                                                                                                                <% top.part.reviews.forEach(review => { 
                                    tot = tot + review.rating 
                                            }) %>
                                                                                                                                    <% var rating = top.part.reviews.length > 0 ? tot / top.part.reviews.length  : 0; %>
                                                                                                                                        <div class="rating">
                                                                                                                                            <% if(rating == 0){ %>
                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                <% }else if(rating > 0 && rating < 1){ %>
                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-half fa-stack-2x" style="color: #FFC501;"></i></span>
                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                    <% } else if(rating === 1){ %>
                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                        <% }else if(rating > 1 && rating < 2){ %>
                                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-half fa-stack-2x" style="color: #FFC501;"></i></span>
                                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                            <% } else if(rating === 2){ %>
                                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                                <% }else if(rating > 2 && rating < 3){ %>
                                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-half fa-stack-2x" style="color: #FFC501;"></i></span>
                                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                                    <% } else if(rating === 3){ %>
                                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                                        <% }else if(rating > 3 && rating < 4){ %>
                                                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-half fa-stack-2x" style="color: #FFC501;"></i></span>
                                                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                                            <% } else if(rating === 4){ %>
                                                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                                                <% }else if(rating > 4 && rating < 5){ %>
                                                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-half fa-stack-2x" style="color: #FFC501;"></i></span>
                                                                                                                                                                                    <% } else if(rating === 5){ %>
                                                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                                        <% } %>
                                                                                                                                        </div>
                                                                                                                                        <% if(top.part.discount > 0){ %>
                                                                                                                                            <div class="price">
                                                                                                                                                <span class="price-new" itemprop="price"><%- cur %><%= top.part.price.toFixed(2) - get_discount(top.part.price, top.part.discount) %></span>
                                                                                                                                                <span class="price-old"><%- cur %><%= top.part.price.toFixed(2) %></span>
                                                                                                                                            </div>
                                                                                                                                            <% } else { %>
                                                                                                                                                <div class="price">
                                                                                                                                                    <span class="price"><%- cur %> <%= top.part.price.toFixed(2) %></span>
                                                                                                                                                </div>
                                                                                                                                                <% } %>

                                                                                                                        </div>

                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <% } %>
                                                                                                                    <% }) %>
                                                                                                                        <% top.forEach((top, id) => { %>
                                                                                                                            <% if(id == 4){ %>
                                                                                                                                <div class="product-layout product-grid style1 nitem item-5" style="margin-top:35px!important;">
                                                                                                                                    <div class="product-item-container item--static">
                                                                                                                                        <div class="left-block">
                                                                                                                                            <div class="product-image-container second_img">
                                                                                                                                                <a href="/parts/<%= top.part.id %>" title="<%= top.part.name %>">
                                                        <img src="<%= top.part.img_url %>" class="img-1 img-responsive" alt="image1">
                                                        <img src="<%= top.part.img_url %>" class="img-2 img-responsive" alt="image2">
                                                    </a>
                                                                                                                                            </div>
                                                                                                                                            <span class="label-product label-new">TOP</span>
                                                                                                                                        </div>
                                                                                                                                        <div class="right-block">
                                                                                                                                            <div class="button-group cartinfo--static">

                                                                                                                                                <button type="button" class="wishlist btn-button" title="Add to Wish List" onclick="wishlist.add('<%= top.part.id %>');"><i class="fa fa-heart"></i></button>
                                                                                                                                                <button type="button" class="addToCart" title="Add to cart" data-id="<%= top.part.id %>" data-img="<%= top.part.img_url %>" data-name="<%= top.part.name %>" data-quantity="1" clic="cart.add('<%= top.part.id %>', '<%= top.part.img_url %>', '<%= top.part.name %>', '1');">
                                                        <span>Add to cart </span>   
                                                    </button></div>
                                                                                                                                            <h4>
                                                                                                                                                <a href="/parts/<%= top.part.id %>" title="<%= top.part.img_url %>">
                                                                                                                                                    <%- truncate(top.part.name, 24) %>
                                                                                                                                                </a>
                                                                                                                                            </h4>

                                                                                                                                            <% var tot = 0 %>

                                                                                                                                                <% top.part.reviews.forEach(review => { 
                                    tot = tot + review.rating 
                                            }) %>
                                                                                                                                                    <% var rating = top.part.reviews.length > 0 ? tot / top.part.reviews.length  : 0; %>
                                                                                                                                                        <div class="rating">
                                                                                                                                                            <% if(rating == 0){ %>
                                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                                <% }else if(rating > 0 && rating < 1){ %>
                                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-half fa-stack-2x" style="color: #FFC501;"></i></span>
                                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                                    <% } else if(rating === 1){ %>
                                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                                        <% }else if(rating > 1 && rating < 2){ %>
                                                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-half fa-stack-2x" style="color: #FFC501;"></i></span>
                                                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                                            <% } else if(rating === 2){ %>
                                                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                                                <% }else if(rating > 2 && rating < 3){ %>
                                                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-half fa-stack-2x" style="color: #FFC501;"></i></span>
                                                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                                                    <% } else if(rating === 3){ %>
                                                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                                                        <% }else if(rating > 3 && rating < 4){ %>
                                                                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-half fa-stack-2x" style="color: #FFC501;"></i></span>
                                                                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                                                            <% } else if(rating === 4){ %>
                                                                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                                                                <% }else if(rating > 4 && rating < 5){ %>
                                                                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-half fa-stack-2x" style="color: #FFC501;"></i></span>
                                                                                                                                                                                                    <% } else if(rating === 5){ %>
                                                                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                                                        <% } %>
                                                                                                                                                        </div>
                                                                                                                                                        <% if(top.part.discount > 0){ %>
                                                                                                                                                            <div class="price">
                                                                                                                                                                <% var prcc = top.part.price - parseInt(get_discount(top.part.price, top.part.discount)) %>
                                                                                                                                                                    <span class="price-new" itemprop="price"><%- cur %><%= prcc %></span>
                                                                                                                                                                    <span class="price-old"><%- cur %><%= top.part.price.toFixed(2) %></span>
                                                                                                                                                            </div>
                                                                                                                                                            <% } else { %>
                                                                                                                                                                <div class="price">
                                                                                                                                                                    <span class="price"><%- cur %> <%= top.part.price.toFixed(2) %></span>
                                                                                                                                                                </div>
                                                                                                                                                                <% } %>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <% } %>
                                                                                                                                    <% }) %>
                                                    </div>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <% } %>

                            <div class="container">
                                <div class="module listingtab-layout6">
                                    <% if(featured_brakes.length > 0){ %>
                                        <div class="pre_text">
                                            Our Featured Spare Parts
                                        </div>

                                        <h3 class="modtitle"><span>Featured Products</span></h3>
                                        <div class="modcontent">
                                            <div id="so_listing_tabs_3" class="so-listing-tabs first-load">
                                                <div class="loadeding"></div>
                                                <div class="ltabs-wrap">
                                                    <div class="ltabs-tabs-container" data-delay="300" data-duration="600" data-effect="none" data-ajaxurl="" data-type_source="0" data-lg="4" data-md="4" data-sm="3" data-xs="1" data-margin="30">
                                                        <!--Begin Tabs-->
                                                        <div class="ltabs-tabs-wrap">

                                                            <span class="ltabs-tab-selected">Brake Parts</span> <span class="ltabs-tab-arrow">▼</span>
                                                            <div class="item-sub-cat">
                                                                <ul class="ltabs-tabs cf">
                                                                    <li class="ltabs-tab tab-sel" data-category-id="31" data-active-content=".items-category-31"> <span class="ltabs-tab-label">Brake Parts</span> </li>
                                                                    <% if(featured_engine.length > 0){ %>
                                                                        <li class="ltabs-tab " data-category-id="18" data-active-content=".items-category-18"> <span class="ltabs-tab-label">Engine & Drivetrain</span> </li>
                                                                        <% } %>
                                                                            <% if(featured_wheels.length > 0) { %>
                                                                                <li class="ltabs-tab " data-category-id="25" data-active-content=".items-category-25"> <span class="ltabs-tab-label">Wheels</span> </li>
                                                                                <% } %>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <!-- End Tabs-->
                                                    </div>
                                                    <div class="wap-listing-tabs products-list grid">
                                                        <div class="ltabs-items-container">
                                                            <!--Begin Items-->
                                                            <div class="ltabs-items ltabs-items-selected items-category-31" data-total="16">
                                                                <div class="ltabs-items-inner">
                                                                    <% featured_brakes.forEach(item => { %>
                                                                        <div class="item">
                                                                            <div class="product-layout product-grid">
                                                                                <div class="product-item-container item--static">
                                                                                    <div class="left-block">
                                                                                        <div class="product-image-container second_img">
                                                                                            <a href="/parts/<%= item.part.id %>" title="<%= item.part.name %>">
                                                                        <img src="<%= item.part.img_url %>" class="img-1 img-responsive" alt="image1">
                                                                        <img src="<%= item.part.img_url %>" class="img-2 img-responsive" alt="image2">
                                                                    </a>
                                                                                        </div>
                                                                                        <span class="label-product label-sale">Featured </span>
                                                                                    </div>
                                                                                    <div class="right-block">
                                                                                        <div class="button-group cartinfo--static">

                                                                                            <button type="button" class="wishlist btn-button" title="Add to Wish List" onclick="wishlist.add('<%= item.part.id %>');"><i class="fa fa-heart"></i></button>
                                                                                            <button type="button" class="addToCart" title="Add to cart" data-id="<%= item.part.id %>" data-img="<%= item.part.img_url %>" data-name="<%= item.part.name %>" data-quantity="1" clic="cart.add('<%= item.part.id %>', '<%= item.part.img_url %>', '<%= item.part.name %>', '1');">
                                                                        <span>Add to cart </span>   
                                                                    </button>

                                                                                        </div>
                                                                                        <h4>
                                                                                            <a href="/parts/<%= item.part.id %>" title="<%= item.part.name %>">
                                                                                                <%= item.part.name %>
                                                                                            </a>
                                                                                        </h4>
                                                                                        <% var tot = 0 %>

                                                                                            <% item.part.reviews.forEach(review => { 
                                    tot = tot + review.rating 
                                            }) %>
                                                                                                <% var rating = item.part.reviews.length > 0 ? tot / item.part.reviews.length  : 0; %>
                                                                                                    <div class="rating">
                                                                                                        <% if(rating == 0){ %>
                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                            <% }else if(rating > 0 && rating < 1){ %>
                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-half fa-stack-2x" style="color: #FFC501;"></i></span>
                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                <% } else if(rating === 1){ %>
                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                    <% }else if(rating > 1 && rating < 2){ %>
                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-half fa-stack-2x" style="color: #FFC501;"></i></span>
                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                        <% } else if(rating === 2){ %>
                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                            <% }else if(rating > 2 && rating < 3){ %>
                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-half fa-stack-2x" style="color: #FFC501;"></i></span>
                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                <% } else if(rating === 3){ %>
                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                    <% }else if(rating > 3 && rating < 4){ %>
                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-half fa-stack-2x" style="color: #FFC501;"></i></span>
                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                        <% } else if(rating === 4){ %>
                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                            <% }else if(rating > 4 && rating < 5){ %>
                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-half fa-stack-2x" style="color: #FFC501;"></i></span>
                                                                                                                                                <% } else if(rating === 5){ %>
                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                    <% } %>
                                                                                                    </div>
                                                                                                    <% if(item.part.discount > 0){ %>
                                                                                                        <div class="price">
                                                                                                            <span class="price-new" itemprop="price"><%- cur %><%= item.part.price.toFixed(2) - get_discount(item.part.price, item.part.discount) %></span>
                                                                                                            <span class="price-old"><%- cur %><%= item.part.price.toFixed(2) %></span>
                                                                                                        </div>
                                                                                                        <% } else { %>
                                                                                                            <div class="price">
                                                                                                                <span class="price"><%- cur %> <%= item.part.price.toFixed(2) %></span>
                                                                                                            </div>
                                                                                                            <% } %>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <% }) %>
                                                                </div>

                                                            </div>
                                                            <% if(featured_engine.length > 0){ %>
                                                                <div class="ltabs-items items-category-18 grid" data-total="16">
                                                                    <div class="ltabs-items-inner">
                                                                        <% featured_engine.forEach(item => { %>
                                                                            <div class="item">
                                                                                <div class="product-layout product-grid">
                                                                                    <div class="product-item-container item--static">
                                                                                        <div class="left-block">
                                                                                            <div class="product-image-container second_img">
                                                                                                <a href="/parts/<%= item.part.id %>" title="<%= item.part.name %>">
                                                                        <img src="<%= item.part.img_url %>" class="img-1 img-responsive" alt="image1">
                                                                        <img src="<%= item.part.img_url %>" class="img-2 img-responsive" alt="image2">
                                                                    </a>
                                                                                            </div>
                                                                                            <span class="label-product label-sale">Featured </span>
                                                                                        </div>
                                                                                        <div class="right-block">
                                                                                            <div class="button-group cartinfo--static">

                                                                                                <button type="button" class="wishlist btn-button" title="Add to Wish List" onclick="wishlist.add('<%= item.part.id %>');"><i class="fa fa-heart"></i></button>
                                                                                                <button type="button" class="addToCart" title="Add to cart" data-id="<%= item.part.id %>" data-img="<%= item.part.img_url %>" data-name="<%= item.part.name %>" data-quantity="1" clic="cart.add('<%= item.part.id %>', '<%= item.part.img_url %>', '<%= item.part.name %>', '1');">
                                                                        <span>Add to cart </span>   
                                                                    </button>

                                                                                            </div>
                                                                                            <h4>
                                                                                                <a href="/parts/<%= item.part.id %>" title="<%= item.part.name %>">
                                                                                                    <%= item.part.name %>
                                                                                                </a>
                                                                                            </h4>
                                                                                            <% var tot = 0 %>

                                                                                                <% item.part.reviews.forEach(review => { 
                                    tot = tot + review.rating 
                                            }) %>
                                                                                                    <% var rating = item.part.reviews.length > 0 ? tot / item.part.reviews.length  : 0; %>
                                                                                                        <div class="rating">
                                                                                                            <% if(rating == 0){ %>
                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                <% }else if(rating > 0 && rating < 1){ %>
                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-half fa-stack-2x" style="color: #FFC501;"></i></span>
                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                    <% } else if(rating === 1){ %>
                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                        <% }else if(rating > 1 && rating < 2){ %>
                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-half fa-stack-2x" style="color: #FFC501;"></i></span>
                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                            <% } else if(rating === 2){ %>
                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                <% }else if(rating > 2 && rating < 3){ %>
                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-half fa-stack-2x" style="color: #FFC501;"></i></span>
                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                    <% } else if(rating === 3){ %>
                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                        <% }else if(rating > 3 && rating < 4){ %>
                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-half fa-stack-2x" style="color: #FFC501;"></i></span>
                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                            <% } else if(rating === 4){ %>
                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                <% }else if(rating > 4 && rating < 5){ %>
                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-half fa-stack-2x" style="color: #FFC501;"></i></span>
                                                                                                                                                    <% } else if(rating === 5){ %>
                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                        <% } %>
                                                                                                        </div>
                                                                                                        <% if(item.part.discount > 0){ %>
                                                                                                            <div class="price">
                                                                                                                <span class="price-new" itemprop="price"><%- cur %><%= item.part.price.toFixed(2) - get_discount(item.part.price, item.part.discount) %></span>
                                                                                                                <span class="price-old"><%- cur %><%= item.part.price.toFixed(2) %></span>
                                                                                                            </div>
                                                                                                            <% } else { %>
                                                                                                                <div class="price">
                                                                                                                    <span class="price"><%- cur %> <%= item.part.price.toFixed(2) %></span>
                                                                                                                </div>
                                                                                                                <% } %>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <% }) %>
                                                                    </div>

                                                                </div>
                                                                <% } %>
                                                                    <% if(featured_wheels.length > 0){ %>
                                                                        <div class="ltabs-items  items-category-25 grid" data-total="16">
                                                                            <div class="ltabs-items-inner">
                                                                                <% featured_wheels.forEach(item => { %>
                                                                                    <div class="item">
                                                                                        <div class="product-layout product-grid">
                                                                                            <div class="product-item-container item--static">
                                                                                                <div class="left-block">
                                                                                                    <div class="product-image-container second_img">
                                                                                                        <a href="/parts/<%= item.part.id %>" title="<%= item.part.name %>">
                                                                        <img src="<%= item.part.img_url %>" class="img-1 img-responsive" alt="image1">
                                                                        <img src="<%= item.part.img_url %>" class="img-2 img-responsive" alt="image2">
                                                                    </a>
                                                                                                    </div>
                                                                                                    <span class="label-product label-sale">Featured </span>
                                                                                                </div>
                                                                                                <div class="right-block">
                                                                                                    <div class="button-group cartinfo--static">

                                                                                                        <button type="button" class="wishlist btn-button" title="Add to Wish List" onclick="wishlist.add('<%= item.part.id %>');"><i class="fa fa-heart"></i></button>
                                                                                                        <button type="button" class="addToCart" title="Add to cart" data-id="<%= item.part.id %>" data-img="<%= item.part.img_url %>" data-name="<%= item.part.name %>" data-quantity="1" clic="cart.add('<%= item.part.id %>', '<%= item.part.img_url %>', '<%= item.part.name %>', '1');">
                                                                        <span>Add to cart </span>   
                                                                    </button>

                                                                                                    </div>
                                                                                                    <h4>
                                                                                                        <a href="/parts/<%= item.part.id %>" title="<%= item.part.name %>">
                                                                                                            <%= item.part.name %>
                                                                                                        </a>
                                                                                                    </h4>
                                                                                                    <% var tot = 0 %>

                                                                                                        <% item.part.reviews.forEach(review => { 
                                    tot = tot + review.rating 
                                            }) %>
                                                                                                            <% var rating = item.part.reviews.length > 0 ? tot / item.part.reviews.length  : 0; %>
                                                                                                                <div class="rating">
                                                                                                                    <% if(rating == 0){ %>
                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                        <% }else if(rating > 0 && rating < 1){ %>
                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-half fa-stack-2x" style="color: #FFC501;"></i></span>
                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                            <% } else if(rating === 1){ %>
                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                <% }else if(rating > 1 && rating < 2){ %>
                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-half fa-stack-2x" style="color: #FFC501;"></i></span>
                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                    <% } else if(rating === 2){ %>
                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                        <% }else if(rating > 2 && rating < 3){ %>
                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-half fa-stack-2x" style="color: #FFC501;"></i></span>
                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                            <% } else if(rating === 3){ %>
                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                <% }else if(rating > 3 && rating < 4){ %>
                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-half fa-stack-2x" style="color: #FFC501;"></i></span>
                                                                                                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                    <% } else if(rating === 4){ %>
                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                                                                                        <% }else if(rating > 4 && rating < 5){ %>
                                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                            <span class="fa fa-stack"><i class="fa fa-star-half fa-stack-2x" style="color: #FFC501;"></i></span>
                                                                                                                                                            <% } else if(rating === 5){ %>
                                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                                                                                                                <% } %>
                                                                                                                </div>
                                                                                                                <% if(item.part.discount > 0){ %>
                                                                                                                    <div class="price">
                                                                                                                        <span class="price-new" itemprop="price"><%- cur %><%= item.part.price.toFixed(2) - get_discount(item.part.price, item.part.discount) %></span>
                                                                                                                        <span class="price-old"><%- cur %><%= item.part.price.toFixed(2) %></span>
                                                                                                                    </div>
                                                                                                                    <% } else { %>
                                                                                                                        <div class="price">
                                                                                                                            <span class="price"><%- cur %> <%= item.part.price.toFixed(2) %></span>
                                                                                                                        </div>
                                                                                                                        <% } %>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <% }) %>
                                                                            </div>
                                                                        </div>
                                                                        <% } %>
                                                                            <!--End Items-->
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <% } %>
                                </div>
                            </div>

                            <!-- Policy -->
                            <div class="container block-services " style="background-color: #fff; padding-top: 10px!important; padding-bottom: 5px!important; margin-top: 20px;margin-bottom: 40px;">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 " style="margin-right: auto!important; margin-left: auto!important;margin-bottom: 10px!important;">
                                        <div class="icon-service">
                                            <div class="icon"><i class="pe-7s-car">&nbsp;</i></div>
                                            <div class="text">
                                                <h6>Nationwide shipping</h6>
                                                <p class="no-margin" style="color: #000!important;">Shipping To All Parts of The Country</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 col-margin1">-->
                                    <!--    <div class="icon-service">-->
                                    <!--        <div class="icon"><i class="pe-7s-refresh-2">&nbsp;</i></div>-->
                                    <!--        <div class="text">-->
                                    <!--            <h6>30 days return</h6>-->
                                    <!--            <p class="no-margin">You have 30 days to return</p>-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="margin-right: auto!important; margin-left: auto!important;margin-bottom: 10px!important;">
                                        <div class="icon-service">
                                            <div class="icon"><i class="pe-7s-door-lock">&nbsp;</i></div>
                                            <div class="text">
                                                <h6>Safe Shopping<br></h6>
                                                <p class="no-margin" style="color: #000!important;">Payment 100% secure</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="margin-right: auto!important; margin-left: auto!important;">
                                        <div class="icon-service">
                                            <div class="icon"><i class="pe-7s-users">&nbsp;</i></div>
                                            <div class="text">
                                                <h6>Online support</h6>
                                                <p class="no-margin" style="color: #000!important;">Contact us 24 hours a day</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- end Policy -->

                    </div>





                </div>
            </div>
            <!-- //Main Container -->


            <%- include("footer") %>
                <script>
                    let dateDropdown = document.getElementById('so_year0');

                    let currentYear = new Date().getFullYear();
                    let earliestYear = 1975;
                    while (currentYear >= earliestYear) {
                        let dateOption = document.createElement('option');
                        dateOption.text = currentYear;
                        dateOption.value = currentYear;
                        dateDropdown.add(dateOption);
                        currentYear -= 1;
                    }
                    var elem = document.getElementById("so_model0")
                    var make = document.getElementById("so_make0")
                    var data = [
                        <% brands.forEach(brand => { %> {
                            id: '<%= brand.id %>',
                            brand: '<%= brand.name %>',
                            cars: [
                                <% brand.cars.forEach(car => { %> {
                                    id: "<%= car.id %>",
                                    car: "<%= car.name %>",
                                    models: [
                                        <% car.models.forEach(model => { %> {
                                            id: "<%= model.id %>",
                                            name: "<%= model.name %>"
                                        },
                                        <% }) %>
                                    ]
                                },
                                <% }) %>
                            ]
                        },
                        <% }) %>
                    ]

                    function change_model() {
                        $('#cover-spin').show(0)
                        $('#002').hide()
                        $('#003').hide()
                        $('#sas_search_button0').hide()
                        setTimeout(() => {
                            if (make.value == "") {
                                elem.innerHTML = `<option value="">Select Model</option>`
                                $('#cover-spin').hide(0)
                            } else {
                                var t = ''

                                var d = data.filter(d => d.id == make.value)[0].cars
                                d.forEach(cr => {
                                    var b = ""
                                    console.log(cr)
                                    cr.models.forEach(md => {
                                        b += `<option value="${md.id}">${md.name}</option>`
                                    })
                                    t += `<optgroup label="${cr.car}">${b}</optgroup>`
                                })
                                $('#002').show()
                                $('#cover-spin').hide(0)
                                elem.innerHTML = 'elem.innerHTML = `<option value="">Select Model</option>' + t

                            }
                        }, 1800)

                    }

                    function change_md() {
                        $('#cover-spin').show(0)
                        setTimeout(() => {
                            if (elem.value == "") {
                                $('#cover-spin').hide(0)
                                return null
                            } else {
                                $('#cover-spin').hide(0)
                                $('#003').show()
                                document.getElementById("003").value = ""
                            }
                        }, 1800)
                    }

                    function change_yr() {
                        $('#cover-spin').show(0)
                        setTimeout(() => {
                            if (elem.value == "") {
                                $('#cover-spin').hide(0)
                                return null
                            } else {
                                $('#cover-spin').hide(0)
                                $('#sas_search_button0').show()
                            }
                        }, 1800)
                    }

                    function change_vin() {
                        if (document.getElementById("vin").value !== "") {
                            if (document.getElementById("vin").value.length === 17) {
                                document.getElementById("vin_btn").disabled = false
                            } else {
                                document.getElementById("vin_btn").disabled = true
                            }
                        } else {
                            document.getElementById("vin_btn").disabled = true
                        }
                    }

                    function change_type() {
                        if (document.getElementById("so_type01").value == "vin") {
                            document.getElementById("vn").style.display = "block"
                            document.getElementById("pc").style.display = "none"
                        } else {
                            document.getElementById("vn").style.display = "none"
                            document.getElementById("pc").style.display = "block"
                        }
                    }

                    setTimeout(() => $(".bs-example-modal-lg").modal("show"), 6000)
                </script>
                <script>
                    var dp2 = document.getElementById('so_year0_2');

                    let currentYear_2 = new Date().getFullYear();
                    let earliestYear_2 = 1975;
                    while (currentYear_2 >= earliestYear_2) {
                        let dateOption = document.createElement('option');
                        dateOption.text = currentYear_2;
                        dateOption.value = currentYear_2;
                        document.getElementById('so_year0_2').add(dateOption);
                        currentYear_2 -= 1;
                    }
                    var elem_2 = document.getElementById("so_model0_2")
                    var make_2 = document.getElementById("so_make0_2")
                    var data2 = [
                        <% brands.forEach(brand => { %> {
                            id: '<%= brand.id %>',
                            brand: '<%= brand.name %>',
                            cars: [
                                <% brand.cars.forEach(car => { %> {
                                    id: "<%= car.id %>",
                                    car: "<%= car.name %>",
                                    models: [
                                        <% car.models.forEach(model => { %> {
                                            id: "<%= model.id %>",
                                            name: "<%= model.name %>"
                                        },
                                        <% }) %>
                                    ]
                                },
                                <% }) %>
                            ]
                        },
                        <% }) %>
                    ]

                    function change_model_2() {
                        $('#cover-spin_2').show(0)
                        $('#002_2').hide()
                        $('#003_2').hide()
                        $('#sas_search_button0_2').hide()
                        setTimeout(() => {
                            if (document.getElementById("so_make0_2").value == "") {
                                document.getElementById("so_model0_2").innerHTML = `<option value="">Select Model</option>`
                                $('#cover-spin').hide(0)
                            } else {
                                var t = ''

                                var d = data2.filter(d => d.id == document.getElementById("so_make0_2").value)[0].cars
                                d.forEach(cr => {
                                    var b = ""
                                    console.log(cr)
                                    cr.models.forEach(md => {
                                        b += `<option value="${md.id}">${md.name}</option>`
                                    })
                                    t += `<optgroup label="${cr.car}">${b}</optgroup>`
                                })
                                $('#002_2').show()
                                $('#cover-spin_2').hide(0)
                                document.getElementById("so_model0_2").innerHTML = 'elem.innerHTML = `<option value="">Select Model</option>' + t

                            }
                        }, 1800)

                    }

                    function change_md_2() {
                        $('#cover-spin_2').show(0)
                        setTimeout(() => {
                            if (document.getElementById("so_model0_2").value == "") {
                                $('#cover-spin_2').hide(0)
                                return null
                            } else {
                                $('#cover-spin_2').hide(0)
                                $('#003_2').show()
                                document.getElementById("003_2").value = ""
                            }
                        }, 1800)
                    }

                    function change_yr_2() {
                        $('#cover-spin_2').show(0)
                        setTimeout(() => {
                            if (document.getElementById("so_model0_2").value == "") {
                                $('#cover-spin_2').hide(0)
                                return null
                            } else {
                                $('#cover-spin_2').hide(0)
                                $('#sas_search_button0_2').show()
                            }
                        }, 1800)
                    }
                </script>