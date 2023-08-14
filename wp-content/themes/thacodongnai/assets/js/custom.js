document.addEventListener("DOMContentLoaded", function () {
    var homeNewSwiper = new Swiper(".homeNewSwiper", {
        direction: "horizontal",
        slidesPerView: 3,
        spaceBetween: 30,
        autoHeight: true,
        initialSlide: 1, // Đặt slide thứ hai (index 1) là slide active khi swiper được khởi tạo
        loop: true,
        centeredSlides: true, // Thêm tùy chọn này để giữa slide giữa
        autoplay: {
           delay: 5000,
        },
        // Thêm sự kiện slideChange
        on: {
            init: function () {
                setActiveSlide(1); // Đặt slide thứ hai là slide active khi swiper được khởi tạo
            },
            slideChange: function () {
                setActiveSlide(this.activeIndex); // Đặt slide active khi thay đổi slide
            },
        },
    });

    function setActiveSlide(slideIndex) {
        // Lấy danh sách các slide
        const slides = document.querySelectorAll(".swiper-slide-tintuc");

        // Xóa class active khỏi tất cả các slide
        slides.forEach((slide) => {
            slide.classList.remove("swiper-slide-active");
        });

        // Thêm class active vào slide được chỉ định bởi slideIndex
        slides[slideIndex].classList.add("swiper-slide-active");
    }

});

document.addEventListener( "DOMContentLoaded", function () {
    var HomeProductSlide = new Swiper(".HomeProductSlide", {
        direction: "horizontal",
        slidesPerView: 3,
        spaceBetween: 30,
        autoHeight: true,
        initialSlide: 1, // Đặt slide thứ hai (index 1) là slide active khi swiper được khởi tạo
        loop: true,
        centeredSlides: true, // Thêm tùy chọn này để giữa slide giữa
        autoplay: {
           delay: 5000,
        },
        // Thêm sự kiện slideChange
        on: {
            init: function () {
                setActiveSlide(1); // Đặt slide thứ hai là slide active khi swiper được khởi tạo
            },
            slideChange: function () {
                setActiveSlide(this.activeIndex); // Đặt slide active khi thay đổi slide
            },
        },
    });

    function setActiveSlide(slideIndex) {
        // Lấy danh sách các slide
        const slides = document.querySelectorAll(".swiper-slide-product");

        // Kiểm tra xem slides có tồn tại không
        if (slides.length > 0) {
            // Xóa class active khỏi tất cả các slide
            slides.forEach((slide) => {
                slide.classList.remove("swiper-slide-active");
            });

            // Thêm class active vào slide được chỉ định bởi slideIndex
            slides[slideIndex].classList.add("swiper-slide-active");
            console.log("slideIndex:", slideIndex);
console.log("slides.length:", slides.length);

        }
    }

    

    function activateTab(tab) {
        const tabLinks = document.querySelectorAll("#productTabs .nav-link");
        const tabPanes = document.querySelectorAll(".tab-pane");

        // Kiểm tra xem tabLinks và tabPanes có tồn tại không
        if (tabLinks.length > 0 && tabPanes.length > 0) {
            tabLinks.forEach(link => link.classList.remove("active"));
            tabPanes.forEach(pane => pane.classList.remove("active"));
            tab.classList.add("active");
            const targetPane = document.querySelector(tab.getAttribute("href"));
            targetPane.classList.add("active");
        }
    }

    tabLinks.forEach(link => {
        link.addEventListener("click", function(event) {
            event.preventDefault();
            activateTab(link);
        });
    });
});

// Post Type dịch vụ
document.addEventListener("DOMContentLoaded", function() {
    const tabLinks = document.querySelectorAll(".nav-tabs .nav-link");
    const tabPanes = document.querySelectorAll(".tab-content .tab-pane");

    function activateTab(tab) {
        tabLinks.forEach(link => link.classList.remove("active"));
        tabPanes.forEach(pane => pane.classList.remove("active"));
        tab.classList.add("active");
        const targetPane = document.querySelector(tab.getAttribute("href"));
        targetPane.classList.add("active");
    }

    tabLinks.forEach(link => {
        link.addEventListener("click", function(event) {
            event.preventDefault();
            activateTab(link);
        });
    });
});

// Tin tức
document.addEventListener( "DOMContentLoaded", function() {
    const tabLinks = document.querySelectorAll("#newstab .nav-link");
    const tabPanes = document.querySelectorAll(".tab-pane");

    function activateTab(tab) {
        tabLinks.forEach(link => link.classList.remove("active"));
        tabPanes.forEach(pane => pane.classList.remove("active"));
        tab.classList.add("active");
        const targetPane = document.querySelector(tab.getAttribute("href"));
        targetPane.classList.add("active");
    }

    tabLinks.forEach(link => {
        link.addEventListener("click", function(event) {
            event.preventDefault();
            activateTab(link);
        });
    });
});

// Dropdow
// Đợi cho DOM được tải trước khi gắn bộ lắng nghe sự kiện
document.addEventListener('DOMContentLoaded', function() {
// Lấy tất cả các phần tử nút có lớp 'product__wapper-left-filter-title'
var buttons = document.querySelectorAll('.product__wapper-left-filter-title');

// Gắn bộ lắng nghe sự kiện khi nhấp vào mỗi nút
buttons.forEach(function(button) {
    button.addEventListener('click', function() {
        // Lấy id của phần tử 'product__wapper-left-filter-list collapse' tương ứng
        var targetId = button.id;
        // Lấy phần tử có id tương ứng
        var targetDiv = document.getElementById(targetId);

        // Chuyển đổi lớp 'collapse' để hiển thị/ẩn phần tử
        if (targetDiv.classList.contains('show')) {
          targetDiv.classList.remove('show');
        } else {
          targetDiv.classList.add('show');
        }
      });
    });
});