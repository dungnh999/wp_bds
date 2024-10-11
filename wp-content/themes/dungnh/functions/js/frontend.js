function formatNumberInput() {
    document
        .querySelectorAll(".col-price .price-input")
        .forEach(
            (inp) =>
                new Cleave(inp, {
                    numeral: true,
                    // delimiter: ".",
                    numeralDecimalMark: ",",
                    delimiter: ".",
                    numeralThousandsGroupStyle: "thousand",
                })
        );
}


(function ($) {

    'use strict';


    jQuery(document).ready(function () {

        var ua = navigator.userAgent,
        event = (ua.match(/iPad/i) || ua.match(/iPhone/)) ? "touchstart" : "click";

        formatNumberInput();

        if(!$('body').hasClass('single')) {
            AOS.init({

                // offset: 120, // offset (in px) from the original trigger point
                delay: 0, // values from 0 to 3000, with step 50ms
                duration: 1000, // values from 0 to 3000, with step 50ms
                easing: 'ease', // default easing for AOS animations
                once: false, // whether animation should happen only once - while scrolling down
                mirror: false, // whether elements should animate out while scrolling past them
                anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation
    
            });
        }


        $('.accordion label').click(function () {
            $('.accordion').removeClass('active');
            $(this).parent().addClass('active');
        });


        const slidehomebanner = new Swiper('.slidebanner .swiper', {
            autoplay: {
                delay: 3000,
            },
            lazy: false,
            speed: 1000,
            loop: true,
            // Default parameters
            slidesPerView: 1,
            spaceBetween: 0,
        });


        const gr_giatri = new Swiper('.gr_giatri .swiper', {
            // autoplay: {
            //     delay: 3000,
            // },

            speed: 1000,
            loop: true,
            // Default parameters
            slidesPerView: 3,
            spaceBetween: 0,
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 1,
                    spaceBetween: 0
                },
                // when window width is >= 480px
                768: {
                    slidesPerView: 2,
                    spaceBetween: 0
                },
                // when window width is >= 640px
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 0,
                }
            }

        });


        const slidewhy = new Swiper('.listwhyhome .swiper', {
            autoplay: {
                delay: 3000,
            },

            speed: 1000,
            loop: true,
            // Default parameters
            slidesPerView: 3,
            spaceBetween: 20,
            navigation: {
                nextEl: '.listwhyhome .swiper-button-next',
                prevEl: '.listwhyhome .swiper-button-prev',
            },
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 1,
                    spaceBetween: 15
                },
                // when window width is >= 480px
                768: {
                    slidesPerView: 2,
                    spaceBetween: 15
                },
                // when window width is >= 640px
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                }
            }

        });


        const slide_list_ht = new Swiper('.list_ht .swiper', {
            autoplay: {
                delay: 3000,
            },

            speed: 1000,
            loop: true,
            // Default parameters
            slidesPerView: 3,
            spaceBetween: 10,
            navigation: {
                nextEl: '.list_ht .swiper-button-next',
                prevEl: '.list_ht .swiper-button-prev',
            },
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 1,
                    spaceBetween: 15
                },
                // when window width is >= 480px
                768: {
                    slidesPerView: 2,
                    spaceBetween: 15
                },
                // when window width is >= 640px
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                }
            }

        });


        const gr_partner = new Swiper('.gr_partner .swiper', {
            autoplay: {
                delay: 3000,
            },

            speed: 1000,
            loop: true,
            // Default parameters
            slidesPerView: 3,
            spaceBetween: 10,
            navigation: {
                nextEl: '.gr_partner .swiper-button-next',
                prevEl: '.gr_partner .swiper-button-prev',
            },
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 1,
                    spaceBetween: 15
                },
                // when window width is >= 480px
                768: {
                    slidesPerView: 2,
                    spaceBetween: 15
                },
                // when window width is >= 640px
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                }
            }

        });


        const slidemb = new Swiper('.slide-matbang-mb .swiper', {
            autoplay: {
                delay: 3000,
            },
            speed: 1000,
            loop: true,
            // Default parameters
            slidesPerView: 1,
            spaceBetween: 0,
        });



        const roundmb = new Swiper('.round-mb .swiper', {
            autoplay: {
                delay: 3000,
            },
            speed: 1000,
            loop: true,
            // Default parameters
            slidesPerView: 1,
            spaceBetween: 0,
        });


        const slidestep = new Swiper('.slidestep .swiper', {
            autoplay: {
                delay: 3000,
            },
            speed: 1000,
            loop: true,
            // Default parameters
            slidesPerView: 3,
            spaceBetween: 15,
            navigation: {
                nextEl: '.slidestep .swiper-button-next',
                prevEl: '.slidestep .swiper-button-prev',
            },
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 1,
                    spaceBetween: 15
                },
                // when window width is >= 480px
                768: {
                    slidesPerView: 2,
                    spaceBetween: 15
                },
                // when window width is >= 640px
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 15,
                }
            }

        });



        const slidech = new Swiper('.slide-ch .swiper', {
            autoplay: {
                delay: 3000,
            },
            speed: 1000,
            loop: true,
            // Default parameters
            slidesPerView: 3,
            spaceBetween: 0,
            navigation: {
                nextEl: '.slide-ch .swiper-button-next',
                prevEl: '.slide-ch .swiper-button-prev',
            },
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 1,
                    spaceBetween: 0
                },
                // when window width is >= 480px
                768: {
                    slidesPerView: 2,
                    spaceBetween: 0
                },
                // when window width is >= 640px
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 0,
                }
            }

        });



        const slideproperty = new Swiper('.slide-property .swiper', {
            autoplay: {
                delay: 3000,
            },
            speed: 1000,
            loop: true,
            // Default parameters
            slidesPerView: 3,
            spaceBetween: 0,
            navigation: {
                nextEl: '.slide-property .swiper-button-next',
                prevEl: '.slide-property .swiper-button-prev',
            },
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 1,
                    spaceBetween: 0
                },
                // when window width is >= 480px
                768: {
                    slidesPerView: 2,
                    spaceBetween: 0
                },
                // when window width is >= 640px
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 0,
                }
            }

        });


        var slideP = new Swiper('.main-images-bds-mb .swiper', {
            autoplay: {
                delay: 3000,
            },
            speed: 1000,
            loop: true,
            // Default parameters
            slidesPerView: 1,
            spaceBetween: 0,
        });



        var galleryTop = new Swiper('.gallery-top .swiper', {
            spaceBetween: 10,
            // navigation: {
            //     nextEl: '.swiper-button-next',
            //     prevEl: '.swiper-button-prev',
            // },
            loop: true,
            loopedSlides: 4
        });
        var galleryThumbs = new Swiper('.gallery-thumbs .swiper', {
            spaceBetween: 10,
            centeredSlides: false,
            slidesPerView: 4,
            spaceBetween: 15,
            touchRatio: 0.2,
            slideToClickedSlide: true,
            loop: true,
            loopedSlides: 4
        });
        galleryTop.controller.control = galleryThumbs;
        galleryThumbs.controller.control = galleryTop;





        $('.more-des > a, .cta-more-gt').click(function () {
            $('.description-ch, .inner-content-tab-gioi-thieu').toggleClass('show');
        });




        $('.item-loaibdsitem').click(function () {
            var loaibds_id = $(this).attr('data-id');
            $('input[name="loaibds"]').attr('value', loaibds_id);

            $('#form-property').submit();
        });

        $(document).on('click', '.applyBtn, .cta-submit', function () {
            $('#form-property').submit();
        });

        $('.citi-field .item-citi:not(.item-back)').click(function () {
            var citi_id = $(this).attr('data-id');
            $('input[name="citi"]').attr('value', citi_id);

            $.ajax({
                type: "post", //Phương thức truyền post hoặc get
                dataType: "html", //Dạng dữ liệu trả về xml, json, script, or html
                url: dev_ajax.ajax_url,
                data: {
                    action: "get_ward", //Tên action
                    CitiID: citi_id,//Biến truyền vào xử lý. $_POST['website']
                },
                context: this,
                beforeSend: function () {
                    $('.loading-location').addClass('show');
                },
                success: function (response) {
                    $('.citi-field').addClass('hide');
                    $('.ward-field').html("").append(response);
                    $('.ward-field').addClass('show');
                    $('.loading-location').removeClass('show');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    //Làm gì đó khi có lỗi xảy ra
                    console.log('The following error occured: ' + textStatus, errorThrown);
                }
            })
            return false;
        });

        $(document).on('click', '.item-back', function () {
            $('.citi-field').removeClass('hide');
            $('.ward-field').removeClass('show');
            $('input[name="ward"]').attr('value', '');
        });

        $(document).on('click', '.btn-submit-kv', function () {

            $('#form-property').submit();
        });

        $(document).on('click', '.ward-field .item-citi:not(.item-back)', function () {
            var ward_id = $(this).attr('data-id');
            $('input[name="ward"]').attr('value', ward_id);
            $('#form-property').submit();
        });



        // datetime
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        today = mm + '/' + dd + '/' + yyyy;

        var currentDate = moment().format("DD-MM-YYYY");


        $('input[name="daterange"]').daterangepicker({
            locale: {
                "format": 'DD/MM/YYYY',
                "applyLabel": "Áp dụng",
                "monthNames": [
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October",
                    "November",
                    "December"
                ],
            },
            minDate: currentDate,
        });



        $('input[name="your-date-form"]').daterangepicker({
            locale: {
                format: 'DD/MM/YYYY'
            },
            minDate: currentDate,
            singleDatePicker: true,
        }, function (start, end, label) {
            // console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
            // Lets update the fields manually this event fires on selection of range
            var selectedStartDate = start.format('DD/MM/YYYY'); // selected start
            var selectedEndDate = end.format('DD/MM/YYYY'); // selected end

            console.log(start);
            var $checkoutInput = $('input[name="your-date-to"]')

            $checkoutInput.val(selectedEndDate);

            // Setting the Selection of dates on calender on CHECKOUT FIELD (To get this it must be binded by Ids not Calss)
            var checkOutPicker = $checkoutInput.data('daterangepicker');
            checkOutPicker.setStartDate(selectedStartDate);
            checkOutPicker.setEndDate(selectedEndDate);

        });


        $('input[name="your-date-to"]').daterangepicker({
            locale: {
                format: 'DD/MM/YYYY'
            },
            minDate: currentDate,
            singleDatePicker: true,
        });



        $('a.cta-contact, .content-box-contact a').click(function (e) {
            e.stopPropagation();
            $('.popup-contact').addClass('active');
            $('input[name="your-title-post"]').attr('value', $(this).attr('data-title'));
        });
        $('.close-popup').click(function () {
            $('.popup-contact').removeClass('active');
        });

        $(document).on('click', function (e) {
            if ($(e.target).closest(".inner-popup-contact").length === 0) {
                $('.popup-contact').removeClass('active');
            }
        });



        // handle links with @href started with '#' only
        $(document).on('click', '.nav-ch a[href^="#"]', function (e) {
            // target element id
            var id = $(this).attr('href');
            $('.nav-ch a').removeClass('active');
            $(this).addClass('active');
            // target element
            var $id = $(id);
            if ($id.length === 0) {
                return;
            }

            // prevent standard hash navigation (avoid blinking in IE)
            e.preventDefault();

            // top position relative to the document
            var pos = $id.offset().top;

            // animated top scrolling
            $('body, html').animate({ scrollTop: pos });
        });



        $('.price-ch .item-price').click(function () {
            var datamin = $(this).attr('data-min');
            var datamax = $(this).attr('data-max');

            var step = 1000000;

            $('input[name="min-price"]').attr('value', datamin * step);
            $('input[name="max-price"]').attr('value', datamax * step);

            setTimeout(function () {
                $('#form-property').submit();
            }, 100);
        });

        $('.price-property .item-price').click(function () {
            var datamin = $(this).attr('data-min');
            var datamax = $(this).attr('data-max');

            var step = 1000000000;

            $('input[name="min-price"]').attr('value', datamin * step);
            $('input[name="max-price"]').attr('value', datamax * step);

            setTimeout(function () {
                $('#form-property').submit();
            }, 100);
        });


        var cloneNavLogo = $('.navbar-brand').clone();
        // console.log(cloneNavLogo);
        $('.hamburger-menu').click(function (e) {
            e.stopPropagation();
            if ($('.top-menu-mobile').length > 0) {
                $('.top-menu-mobile').remove();
            }
            $('.wrap-main-menu').addClass('active');
            $('.overlay-menu').addClass('show');
            $('.wrap-main-menu').prepend('<div class="top-menu-mobile"><div class="close-menu"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16"><path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/></svg></div></div>');

            $('.top-menu-mobile').prepend(cloneNavLogo);
        });

        $(document).on('click touchstart', '.close-menu', function (e) {
            // e.preventDefault();
            $('.wrap-main-menu').removeClass('active');
            $('.overlay-menu').removeClass('show');
            $('.overlay-search').removeClass('show');
            $('.form-group-search').removeClass('active');
        });

        $(document).on('click touchstart', function (e) {
            // e.preventDefault();
            if ($(e.target).closest(".overlay-menu").length != 0) {
                $('.wrap-main-menu').removeClass('active');
                $('.overlay-menu').removeClass('show');
                $('.overlay-search').removeClass('show');
                $('.form-group-search').removeClass('active');
            }

            if ($(e.target).closest(".overlay-search").length != 0) {
                $('.wrap-main-menu').removeClass('active');
                $('.overlay-menu').removeClass('show');
                $('.overlay-search').removeClass('show');
                $('.form-group-search').removeClass('active');
            }
        });

        jQuery(document).on(event, '.button-filter', function (e) {
            e.preventDefault();
            $('.form-group-search').addClass('active');
            if ($('.close-menu').length > 0) {
                $('.close-menu').remove();
            }
            $('.overlay-search').addClass('show');
            $('.form-group-search').append('<div class="close-menu"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16"><path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/></svg></div>');

        });

        $('.menu-item-has-children > a > span').on('click touch', function (e) {
            e.stopPropagation();
            $(this).parent().parent().toggleClass('show-submenu');
            // $(this).parent().parent().find('.sub-menu').toggleClass('show-submenu');
            return false;
        });


        $('.minus').click(function () {
            var $input = $(this).parents('.number-counter').find('input');
            var count = parseInt($input.val()) - 1;
            count = count < 1 ? 1 : count;
            console.log(count);
            $input.val(count);
            $input.change();
            return false;
        });
        $('.plus').click(function () {
            var $input = $(this).parents('.number-counter').find('input');
            $input.val(parseInt($input.val()) + 1);
            $input.change();
            return false;
        });

    })


})(jQuery);