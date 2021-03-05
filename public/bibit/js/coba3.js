// multi product carousel
$(document).ready(function() {
    var itemsMainDiv = ".MultiCarousel";
    var itemsDiv = ".MultiCarousel-inner";
    var itemWidth = "";
    $(".leftLst, .rightLst").click(function() {
        var condition = $(this).hasClass("leftLst");
        if (condition) click(0, this);
        else click(1, this);
    });
    ResCarouselSize();
    $(window).resize(function() {
        ResCarouselSize();
    });
    //this function define the size of the items
    function ResCarouselSize() {
        var incno = 0;
        var dataItems = "data-items";
        var itemClass = ".item";
        var id = 0;
        var btnParentSb = "";
        var itemsSplit = "";
        var sampwidth = $(itemsMainDiv).width();
        var bodyWidth = $("body").width();
        $(itemsDiv).each(function() {
            id = id + 1;
            var itemNumbers = $(this).find(itemClass).length;
            btnParentSb = $(this)
                .parent()
                .attr(dataItems);
            itemsSplit = btnParentSb.split(",");
            $(this)
                .parent()
                .attr("id", "MultiCarousel" + id);
            if (bodyWidth >= 1200) {
                incno = itemsSplit[3];
                itemWidth = sampwidth / incno;
            } else if (bodyWidth >= 992) {
                incno = itemsSplit[2];
                itemWidth = sampwidth / incno;
            } else if (bodyWidth >= 768) {
                incno = itemsSplit[1];
                itemWidth = sampwidth / incno;
            } else {
                incno = itemsSplit[0];
                itemWidth = sampwidth / incno;
            }
            $(this).css({
                transform: "translateX(0px)",
                width: itemWidth * itemNumbers
            });
            $(this)
                .find(itemClass)
                .each(function() {
                    $(this).outerWidth(itemWidth);
                });
            $(".leftLst").addClass("over");
            $(".rightLst").removeClass("over");
        });
    }
    //this function used to move the items
    function ResCarousel(e, el, s) {
        var leftBtn = ".leftLst";
        var rightBtn = ".rightLst";
        var translateXval = "";
        var divStyle = $(el + " " + itemsDiv).css("transform");
        var values = divStyle.match(/-?[\d\.]+/g);
        var xds = Math.abs(values[4]);
        if (e == 0) {
            translateXval = parseInt(xds) - parseInt(itemWidth * s);
            $(el + " " + rightBtn).removeClass("over");
            if (translateXval <= itemWidth / 2) {
                translateXval = 0;
                $(el + " " + leftBtn).addClass("over");
            }
        } else if (e == 1) {
            var itemsCondition =
                $(el)
                    .find(itemsDiv)
                    .width() - $(el).width();
            translateXval = parseInt(xds) + parseInt(itemWidth * s);
            $(el + " " + leftBtn).removeClass("over");
            if (translateXval >= itemsCondition - itemWidth / 2) {
                translateXval = itemsCondition;
                $(el + " " + rightBtn).addClass("over");
            }
        }
        $(el + " " + itemsDiv).css(
            "transform",
            "translateX(" + -translateXval + "px)"
        );
    }
    //It is used to get some elements from btn
    function click(ell, ee) {
        var Parent =
            "#" +
            $(ee)
                .parent()
                .attr("id");
        var slide = $(Parent).attr("data-slide");
        ResCarousel(ell, Parent, slide);
    }
});

//function sidecart
$(document).ready(function() {
    var fns = {},
        productData = {},
        cartCounter = 0,
        cartTotal = 0,
        productCounter = 1,
        timer = "",
        addCart = $(".add-cart"),
        deleteCart = $(".cart-product-delete");

    fns.getProductData = function(a) {
        var p = a.closest(".product");
        productData.id = p.data("product-id");
        productData.id = parseInt(productData.id);
        productData.img = p.find(".product-img img").attr("src");
        productData.brand = p.find(".product-brand").text();
        productData.decription = p.find(".product-decription").text();
        productData.volume = p.find(".product-volume").text();
        productData.price = p.find(".product-price").text();
        productData.price = parseInt(productData.price);
        /*console.log('id: '            + productData.id + 
                '\n img: '            + productData.img + 
                '\n brand: '       + productData.brand +
                '\n decription: '  + productData.decription +
                '\n volume: '      + productData.volume +
                '\n price: '       + productData.price);*/
    };

    fns.changeCart = function() {
        var counter = $(".cart-counter"),
            total = $(".cart-total").find(".product-price b");
        counter.text(cartCounter);
        total.text(cartTotal);
    };

    fns.hideCart = function(cart) {
        var width = cart.width();
        cart.animate({ right: -width });
        setTimeout(function() {
            cart.removeAttr("class");
            cart.removeAttr("style");
            timer = "";
        }, 1000);
    };

    fns.cartTimer = function(cart) {
        timer = setTimeout(function() {
            fns.hideCart(cart);
        }, 3000);
    };

    fns.showCart = function(cart) {
        var show = cart.hasClass("show");
        if (show) {
            return false;
        } else {
            cart.addClass("show");
            cart.animate({ right: 0 });
            if (timer == "") {
                fns.cartTimer(cart);
            }
        }
    };

    fns.addToCard = function() {
        var pattern =
                "<article class='cart-product' data-cart-product-id='" +
                productData.id +
                "' data-cart-product-counter='" +
                productCounter +
                "'>\n<div class='cart-product-img'><img src=" +
                productData.img +
                " alt=''></div>\n<div class='cart-product-info'>\n<span class='product-brand'>" +
                productData.brand +
                "</span>\n<span class='product-decription'>" +
                productData.decription +
                "</span><span class='product-volume'>" +
                productData.volume +
                "</span>\n</div>\n<div class='cart-product-footer'>\n<span class='product-price'></i><b>" +
                productData.price +
                "</b>-</span><a href='#' class='cart-product-delete'><i class='fa fa-trash-o fa-fw'></i></a>\n</div>\n</article>",
            cart = $("#cart"),
            cartProducts = cart.find(".cart-product"),
            cartItem;

        if (cartProducts.length > 0) {
            for (var i = 0; i < cartProducts.length; i++) {
                //console.log("i: " + i);
                if (
                    cartProducts.eq(i).data("cart-product-id") != productData.id
                ) {
                    //console.log("data: " + cartProducts.eq(i).data('cart-product-id') + " id: " + productData.id);
                    if (i == cartProducts.length - 1) {
                        $(pattern).insertBefore(cart.find(".cart-total"));
                        cartProducts = cart.find(".cart-product");
                        break;
                    }
                } else {
                    cartItem = i;
                    var cartProductPrice = cartProducts
                            .eq(cartItem)
                            .find(".cart-product-footer .product-price b"),
                        price = cartProductPrice.text();
                    price = parseInt(price);
                    price += productData.price;
                    cartProductPrice.text(price);
                    break;
                }
            }
        } else {
            $(pattern).insertBefore(cart.find(".cart-total"));
            cartProducts = cart.find(".cart-product");
        }

        cartCounter++;
        cartTotal += productData.price;
        fns.changeCart();
        fns.showCart(cart);
    };

    addCart.on("click", function() {
        var _THIS = $(this);
        fns.getProductData(_THIS);
        fns.addToCard();
    });

    /*deleteCart.on('click', function(e){
    e = event || window.event;
    e.preventDefault();
    var id = $(this).closest('.cart-product').data('cart-product-id');
    console.log($(this));
  });*/
});
