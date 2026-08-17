# Apartment-site (Grandeur Shinohara)

群馬県大泉町の賃貸物件「グランドールシノハラ」の公式サイトです。
## 📋 プロジェクト概要

このサイトは、物件の魅力を伝えるフロントエンド（入居希望者向け）サイト

### 主な特徴
- **モダンなUI/UX**: GSAPを使用した上品なフェードインアニメーションや、帯アニメーション（Reveal Animation）を採用。
- **レスポンシブ対応**: スマートフォン、タブレット、PCのすべてのデバイスで最適化された閲覧体験を提供（Swiperによるスライダー実装）。
- **効率的な管理**: カスタムフィールド（ACF）を活用し、専門知識がなくても物件情報や新着情報を更新可能。
- **高速な操作感**: スムーズスクロールやヘッダーのスクロール制御による快適なナビゲーション。

## 🛠 使用技術

- **CMS**: WordPress
- **Front-end**: JavaScript (ES6+), CSS3 (Sass/SCSS)
- **Library**:
  - [GSAP](https://greensock.com/gsap/) (ScrollTrigger) - スクロールアニメーション
  - [Swiper](https://swiperjs.com/) - メインビジュアル・物件カルーセル
  - [SmoothScroll](https://github.com/cferdinandi/smooth-scroll) - スムーズスクロール
- **Design/Dev Tools**: Zed Editor, Git/GitHub

## 🚀 最近の主な修正事項 (2026年4月)

- **ACFメタキーの最適化**: データベースとの整合性を高めるため、フィールド名の小文字統一を実施。
- **アニメーションのブラッシュアップ**: 
  - GSAPのフェード距離を調整し、より落ち着いた視覚効果を実現。
  - 特定のコピーに対して、視線誘導を高める帯アニメーションを追加。
- **Swiperの不具合修正**: ループ設定と自動再生、およびナビゲーションクリックの挙動を改善。

## 📂 開発環境のセットアップ

1. リポジトリをクローン:
   ```bash
   git clone git@github.com:kuratanimasato/Apartment-site.git
