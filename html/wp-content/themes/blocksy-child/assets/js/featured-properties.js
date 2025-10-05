document.addEventListener("DOMContentLoaded", () => {
    const swiper = new Swiper(".featured-swiper", {
        slidesPerView: 3,
        spaceBetween: 24,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        loop: false,
        breakpoints: {
            0: { slidesPerView: 1.1 },
            768: { slidesPerView: 2 },
            1024: { slidesPerView: 3 },
        },
        on: {
            init() {
                const total = Math.ceil(this.slides.length / this.params.slidesPerView);
                const current = this.realIndex + 1;
                document.querySelector(".total-slides").textContent = String(total).padStart(2, "0");
                document.querySelector(".current-slide").textContent = String(current).padStart(2, "0");
            },
            slideChange() {
                const current = this.realIndex + 1;
                document.querySelector(".current-slide").textContent = String(current).padStart(2, "0");
            },
        },
    });

    // --- Move View All button on mobile ---
    const viewAllBtn = document.querySelector(".section-header .view-all-btn");
    const swiperControls = document.querySelector(".swiper-controls");
    const sectionHeader = document.querySelector(".section-header");

    function moveViewAllBtn() {
        if (!viewAllBtn || !swiperControls || !sectionHeader) return;

        if (window.innerWidth <= 991) {
            if (!swiperControls.contains(viewAllBtn)) {
                swiperControls.appendChild(viewAllBtn);
            }
        } else {
            if (!sectionHeader.contains(viewAllBtn)) {
                sectionHeader.appendChild(viewAllBtn);
            }
        }
    }

    moveViewAllBtn();
    window.addEventListener("resize", moveViewAllBtn);
});
