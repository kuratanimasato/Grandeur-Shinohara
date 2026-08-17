// --- 1. WordPress Navigation Control ---
(function () {
  const siteNavigation = document.getElementById('site-navigation');
  if (!siteNavigation) return;
  const button = siteNavigation.getElementsByTagName('button')[0];
  if (!button) return;
  const menu = siteNavigation.getElementsByTagName('ul')[0];
  if (!menu) {
    button.style.display = 'none';
    return;
  }
  if (!menu.classList.contains('nav-menu')) {
    menu.classList.add('nav-menu');
  }
  button.addEventListener('click', function () {
    siteNavigation.classList.toggle('toggled');
    button.setAttribute('aria-expanded', siteNavigation.classList.contains('toggled'));
  });
}());

// --- 2. GSAP & Animations ---
gsap.registerPlugin(ScrollTrigger);

// 帯アニメーション（ここだけは演出として残す設定）
function revealTextAnimation() {
  const target = document.querySelector(".slide-copy1");
  if (!target) return;

  gsap.timeline({
    scrollTrigger: {
      trigger: target,
      start: "top 85%",
      once: true
    }
  })
    .to(".slide-copy1 p", {
      "--reveal-x": "0%",
      duration: 0.6,
      ease: "expo.out",
      stagger: 0.2
    })
    .set(".slide-copy1 p", { color: "#fff" }, "-=0.1")
    .to(".slide-copy1 p", {
      "--reveal-x": "100%",
      duration: 0.6,
      ease: "power2.inOut",
      stagger: 0.2
    }, "-=0.3");
}

// --- 3. Initializations ---
document.addEventListener("DOMContentLoaded", function () {
  // 帯アニメーション実行
  revealTextAnimation();

  // スムーススクロール
  if (typeof SmoothScroll !== 'undefined') {
    new SmoothScroll('a[href*="#"]', {
      speed: 800,
      speedAsDuration: true,
      header: '#header'
    });
  }
});

// --- 4. Navigation & UI Controls ---
window.addEventListener('load', function () {
  const nav = document.getElementById('nav-wrapper');
  const hamburger = document.getElementById('js-hamburger');
  const blackBg = document.getElementById('js-black-bg');

  // GSAP計算のリフレッシュ（リロード対策）
  ScrollTrigger.refresh();

  if (hamburger && nav) {
    hamburger.addEventListener('click', function () {
      nav.classList.toggle('open');
      document.body.classList.toggle('no-scroll');
    });
  }
  if (blackBg && nav) {
    blackBg.addEventListener('click', function () {
      nav.classList.remove('open');
      document.body.classList.remove('no-scroll');
    });
  }

  // メニューのリンク無効化とスマホ開閉制御
  const parentLinks = document.querySelectorAll('.menu-item-has-children > a');
  parentLinks.forEach(link => {
    link.addEventListener('click', function (e) {
      const parent = this.parentElement;
      const subMenu = parent.querySelector('.sub-menu');
      if (subMenu) {
        e.preventDefault();
        if (window.innerWidth <= 1024) {
          e.stopPropagation();
          document.querySelectorAll('.menu-item-has-children.open').forEach(opened => {
            if (opened !== parent) opened.classList.remove('open');
          });
          parent.classList.toggle('open');
        }
      }
    });
  });

  // --- Swiper Settings ---
  const swiperCommonOptions = {
    observer: true,
    observeParents: true,
    on: { init: () => setTimeout(() => ScrollTrigger.refresh(), 300) }
  };

  if (document.querySelector('.swiper-container-4')) {
    new Swiper('.swiper-container-4', {
      ...swiperCommonOptions,
      loop: true,
      effect: 'fade',
      autoplay: { delay: 4000, disableOnInteraction: false },
      speed: 2000,
      pagination: { el: '.swiper-pagination', clickable: true }
    });
  }

  if (document.querySelector('.swiper')) {
    new Swiper('.swiper', {
      ...swiperCommonOptions,
      loop: true,
      autoplay: { delay: 4000, disableOnInteraction: false },
      slidesPerView: 1,
      spaceBetween: 20,
      speed: 1000,
      breakpoints: {
        600: { slidesPerView: 2 },
        1024: { slidesPerView: 3, spaceBetween: 30 }
      },
      pagination: { el: '.swiper-pagination', clickable: true },
      navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' }
    });
  }
});

// --- 5. Header Scroll Control ---
const headerEl = document.querySelector('#header');
let lastY = window.pageYOffset;
window.addEventListener('scroll', () => {
  const currY = window.pageYOffset;
  if (headerEl) {
    if (currY < lastY || currY <= 0) {
      headerEl.classList.remove('hidden');
    } else if (currY > 100) {
      headerEl.classList.add('hidden');
    }
  }
  lastY = currY;
}, { passive: true });
