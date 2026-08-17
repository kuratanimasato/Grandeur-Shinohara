このリポジトリはApartment-siteのグランドールシノハラのサイトのオリジナルテーマです。
grandeur-shinoharaです
既存のWordPressサイトを壊さず、保守性・可読性・セキュリティを重視して開発してください。
リポジトリURL
https://github.com/kuratanimasato/Apartment-site.git
Gitルール：

- masterは本番用
- fix/mainは開発・修正・動作確認用
- 開発・修正はfix/mainで行う
- masterへ直接コミットしない
- fix/mainで動作確認が完了するまでmasterへマージしない
- 未検証のコードをmasterへ反映しない
- WordPressの標準的な設計を優先する
- WordPress Coding Standardsを意識する
- WordPressの既存APIを優先して使用する
- 不必要に独自実装しない
- template hierarchyを理解した上でテンプレートを配置する
- functions.phpが肥大化する場合はinc/へ分離する

ファイルを新しく作成する場合は、既存のディレクトリ構成に従う。

- PHPの共通処理 → inc/
- テンプレート部品 → template-parts/
- CSS → css/
- JavaScript → js/
- 画像 → images/
- 翻訳ファイル → languages/

コードを変更する前に、必ず関連する既存コードを確認する。

特に以下を確認する。

- 関連するPHPテンプレート
- functions.php
- inc/
- template-parts/
- 関連CSS
- 関連JavaScript
- 使用しているWordPress関数
- 関連するカスタム投稿タイプ
- 関連するACFフィールド
