# 森下株式会社の WordPress テーマ

## 開発環境のセットアップ

### 必要な環境

-   Node.js
-   LocalWP

### インストール

1. テーマディレクトリに移動

```bash
cd wp-content/themes/morisita
```

2. 依存関係をインストール

```bash
npm install
```

3. package.json の URL を変更

http://localhost:10028 を LocalWP の環境に合わせて変更

## 開発の開始

### ホットリロード

ファイルを編集すると自動でブラウザがリロードされます。

```bash
npm run dev
```

実行後、ターミナルに表示される URL（通常は `http://localhost:3000`）にアクセスしてください。

### 監視対象ファイル

-   `**/*.php` - PHP ファイル
-   `**/*.css` - CSS ファイル
-   `**/*.js` - JavaScript ファイル
