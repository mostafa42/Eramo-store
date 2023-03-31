// getting city based on country
$("#country").change(function () {
    $country_id = $(this).children("option:selected").val();

    $complete_url = "/api/get-city/" + $country_id;
    $.ajax({
        type: "GET",
        url: $complete_url,
        success: function (data) {
            $("#cities").find("option").remove().end();
            $("#cities").append(
                ` <option value=""> Choose City ------- </option>`
            );
            for (var i = 0; i < Object.keys(data).length; i++) {
                $("#cities").append(`
                <option value="${data[i].id}">
                    ${data[i].title_en}
                </option>`);
            }
        },
        error: function (data) {
            console.log("error");
        },
    });
});
// getting regions based on city
$("#cities").change(function () {
    $cities_id = $(this).children("option:selected").val();

    $complete_url = "/api/get-region/" + $cities_id;
    $.ajax({
        type: "GET",
        url: $complete_url,
        success: function (data) {
            $("#regions").find("option").remove().end();

            for (var i = 0; i < Object.keys(data).length; i++) {
                $("#regions").append(`
                <option value="${data[i].id}">
                    ${data[i].title_en}
                </option>`);
            }
        },
        error: function (data) {
            console.log("error");
        },
    });
});

function setProductSlug($id) {
    $complete_url = "/api/get-specific-product/" + $id;
    $.ajax({
        type: "GET",
        url: $complete_url,
        success: function (data) {
            console.log(data);
            $("#qv_img").attr("src", data.primary_image_url);
            $("#qv_main_title").text(data.title_en);
            $("#qv_price").text(data.real_price + " EGP");
            $("#qv_product_details").text(data.description_en);
        },
        error: function (data) {
            console.log("error");
        },
    });
}

// prevent input number to write in it
$("#quick_view_modal_qunatity").keypress(function (evt) {
    evt.preventDefault();
});

// adding to compare list function
function add_to_compare_list($product_id) {
    $("#product_id_compare_list").val($product_id);
    product_item = $("#product_id_compare_list").val();
    $complete_url = "/api/add-to-compare-list/" + product_item;
    $.ajax({
        type: "GET",
        url: $complete_url,
        success: function (data) {
            console.log(data);
            if (data == "created") {
                $("#compare_list_count").html(
                    parseInt($("#compare_list_count").text()) + 1
                );
                toastr.success(
                    "Item has been added to compare list",
                    "success",
                    { iconClass: "toast-custom" }
                );
            }
            if (data == "deleted") {
                $("#compare_list_count").html(
                    parseInt($("#compare_list_count").text()) - 1
                );
                toastr.error(
                    "Item has been removed from compare list",
                    "success",
                    { iconClass: "toast-custom" }
                );
            }
        },
        error: function (data) {
            console.log("error");
        },
    });
}

function add_to_cart_list($product_id) {
    $("#product_id_cart_list").val($product_id);
    product_item = $("#product_id_cart_list").val();
    $complete_url = "/api/add-to-cart-list/" + product_item;
    console.log( )
    $.ajax({
        type: "GET",
        url: $complete_url,
        success: function (data) {
            $("#cart_list_count").html(
                data.length
            );
            $("#my_cart_pop_up").empty() ;

            sub_total = 0 ;

            for( x = 0 ; x < data.length ; x++  ){
                $("#my_cart_pop_up").append(`
                    <li>
                        <div class="media">

                            <a href="#"><img alt="" class="me-3"
                                    src="${data[x].product.primary_image_url}"
                                    width="50px"></a>
                            <div class="media-body">
                                <a href="#">
                                    <h4>${data[x].product.title_en}</h4>
                                </a>
                                <h4><span>${data[x].quantity} x
                                ${data[x].product.real_price}</span>
                                </h4>
                            </div>
                        </div>
                    </li>
                `);
                sub_total += data[x].product.real_price * data[x].quantity ;
            }
            $(".sub_total_model").html(
                sub_total
            );

        },
        error: function (data) {
            console.log("error");
        },
    });
}


// changing quantity in cart
$(".main_tbody") > $(".qty_input").on("input", function (e) {

    $(".main_tbody") > $(".qty_input") > $(".this_price_based_on_qty_input").html("hello");

});

// filteration
$("#filter_btn").on("click", function () {
    total_price_input = $("#price_filter").val().split(";");
    term = $("#search_term").val();

    start_price = total_price_input[0];
    end_price = total_price_input[1];

    // get selected brands
    var check_brands = $('input[name="brands_choices"]:checked')
        .map(function () {
            return $(this).val();
        })
        .get();

    complete_url =
        "/api/filter-by-price/" +
        start_price +
        "/" +
        end_price +
        "/" +
        term +
        "/" +
        check_brands;

    $.ajax({
        type: "GET",
        url: complete_url,
        data: { brands: check_brands },
        success: function (data) {
            $("#product_filter_content").empty();
            if (data.length == 0) {
                $("#product_filter_content").append(
                    `<h3 style="margin-top: 20px;">No product match this filter</h3>`
                );
            } else {
                for (x = 0; x < data.length; x++) {
                    console.log(data[x]);
                    $("#product_filter_content").append(`
                    <div class="col-xl-3 col-6 col-grid-box">
                        <div class="product-box">
                            <div class="img-wrapper">
                                <div class="front">
                                    <a href="#"><img src="${data[x].primary_image_url}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                </div>

                                <div class="back">
                                    <a href="#"><img src="${data[x].primary_image_url}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                </div>

                                <div class="cart-info cart-wrap">
                                    <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart">
                                        <i class="ti-shopping-cart"></i>
                                    </button>
                                    <a href="javascript:void(0)" title="Add to Wishlist">
                                        <i class="ti-heart" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View">
                                        <i class="ti-search" aria-hidden="true"></i>
                                    </a>
                                    <a  onclick="add_to_compare_list(${data[x].id})" href="javascript:void(0)" title="Compare">
                                        <i class="ti-reload" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-detail">
                                <div>
                                    <a href="product-page(no-sidebar).html">
                                        <h6>${data[x].title_en}</h6>
                                    </a>
                                    <p> ${data[x].description_en} </p>
                                    <h4>${data[x].real_price} EGP <span></span>
                                    <del>${data[x].fake_price}</del></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                                                        `);
                }
            }
        },
        error: function (data) {
            console.log("error");
        },
    });
});
