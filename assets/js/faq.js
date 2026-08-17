document.addEventListener('DOMContentLoaded', () => {
  // すべてのFAQボタンを取得
  const faqButtons = document.querySelectorAll('.faq__question');

  faqButtons.forEach(button => {
    button.addEventListener('click', () => {
      const item = button.closest('.faq__item');

      // 開閉状態を切り替え
      const isOpen = item.classList.contains('is-open');

      // 他のアコーディオンを閉じたい場合はここを有効にする
      // document.querySelectorAll('.faq__item').forEach(i => i.classList.remove('is-open'));
      // document.querySelectorAll('.faq__question').forEach(b => b.setAttribute('aria-expanded', 'false'));

      if (isOpen) {
        item.classList.remove('is-open');
        button.setAttribute('aria-expanded', 'false');
      } else {
        item.classList.add('is-open');
        button.setAttribute('aria-expanded', 'true');
      }
    });
  });
});
