// --- 1. WordPress Navigation Control ---
(function () {
  const siteNavigation = document.getElementById('site-navigation');
  if (!siteNavigation) return;
  const button = siteNavigation.getElementsByTagName('button')[0];
  if ('undefined' === typeof button) return;
  const menu = siteNavigation.getElementsByTagName('ul')[0];
  if ('undefined' === typeof menu) {
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

function revealTextAnimation() {
  const target = document.querySelector('.slide-copy1');
  if (!target) return;

  const tl = gsap.timeline({
    scrollTrigger: {
      trigger: '.slide-copy1',
      start: 'top 85%',
      once: true
    }
  });

  tl.to('.slide-copy1 p', {
    '--reveal-x': '0%',
    duration: 0.6,
    ease: 'expo.out',
    stagger: 0.2
  })
    .set('.slide-copy1 p', { color: '#fff' }, '-=0.1')
    .to('.slide-copy1 p', {
      '--reveal-x': '100%',
      duration: 0.6,
      ease: 'power2.inOut',
      stagger: 0.2
    }, '-=0.3');
}

/**
 * 画像のフェードイン制御 (Intersection Observer)
 * 画面内にスクロール進入し、かつ画像の読み込みが完了した段階でクラスを付与します
 */
function initImageFadeIn() {
  const images = document.querySelectorAll('.fade-in-img');
  if (images.length === 0) return;

  const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const img = entry.target;

        // すでにキャッシュ等で読み込み完了しているか判定
        if (img.complete) {
          img.classList.add('is-visible');
        } else {
          // まだ読み込み中ならloadイベントを待ってからフェードイン
          img.addEventListener('load', () => {
            img.classList.add('is-visible');
          });
        }
        // 一度検知したら監視を解除してパフォーマンスを最適化
        observer.unobserve(img);
      }
    });
  }, {
    rootMargin: '0px 0px -60px 0px', // 画面の下端から60px手前に入ったら処理開始
    threshold: 0.1
  });

  images.forEach(img => observer.observe(img));
}


// --- 3. DOMContentLoaded ---
document.addEventListener('DOMContentLoaded', function () {
  revealTextAnimation();
  initImageFadeIn(); // フェードイン処理をここで実行

  if (typeof SmoothScroll !== 'undefined') {
    new SmoothScroll('a[href*="#"]', {
      speed: 800,
      speedAsDuration: true
    });
  }
});

// --- 4. Load ---
window.addEventListener('load', function () {
  const header = document.querySelector('#header');
  const footerBanner = document.querySelector('.footer-btn__wrap');
  const closeBtn = document.querySelector('.close-btn');
  const nav = document.getElementById('nav-wrapper');
  const hamburger = document.getElementById('js-hamburger');
  const blackBg = document.getElementById('js-black-bg');

  // ハンバーガーメニュー
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

  // フッターバナー閉じる
  if (closeBtn && footerBanner) {
    closeBtn.addEventListener('click', () => {
      footerBanner.classList.add('hidden');
      footerBanner.style.display = 'none';
    });
  }

  // モバイルサブメニュー
  const menuWithChildren = document.querySelectorAll('.sp-main-navigation .menu-item-has-children > a');
  menuWithChildren.forEach(item => {
    item.addEventListener('click', function (e) {
      const href = this.getAttribute('href');
      if (href === '#' || href === '') {
        e.preventDefault();
        this.closest('li').classList.toggle('open');
      }
    });
  });

  // Swiper メインスライダー
  if (document.querySelector('.swiper-container-4')) {
    new Swiper('.swiper-container-4', {
      loop: true,
      effect: 'fade',
      autoplay: { delay: 4000, disableOnInteraction: false },
      speed: 2000,
      pagination: { el: '.swiper-pagination', clickable: true }
    });
  }

  // Swiper 物件一覧
  if (document.querySelector('.swiper')) {
    new Swiper('.swiper', {
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

  // スクロール制御
  let prevY = window.pageYOffset;
  window.addEventListener('scroll', () => {
    const currentY = window.pageYOffset;

    if (header) {
      if (currentY < prevY || currentY <= 0) {
        header.classList.remove('hidden');
      } else if (currentY > 100) {
        header.classList.add('hidden');
      }
    }

    if (footerBanner && footerBanner.style.display !== 'none') {
      if (currentY > 200) {
        footerBanner.classList.remove('hidden');
      } else {
        footerBanner.classList.add('hidden');
      }
    }

    prevY = currentY;
  }, { passive: true });
});
