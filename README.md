# WP TEMPLATE

## command

```
yarn install
```
初回にpackage.jsonに記述されているモジュールをインストール。
package.jsonを変更したときも.

```
yarn start
```
開発時の基本コマンド。 Laravel Mix、Browsersync、Dockerが同時に立ち上がる。

```
yarn dev
```
開発向けのビルドされたファイルが、publicディレクトリに出力される。
```
yarn build
```
本番用のビルドされたファイルが、distディレクトリに出力される。
```
yarn docker-rebuild
```
Docker内のWordPressを再インストールし直す。Dockerの起動に失敗し、壊れた際などに使用。

```
yarn login:wordmove
```
wordmoveコンテナにログイン



## 開発環境構築手順
1.  ローカルにファイルを設置 i) ii)いずれかの方法で行う

	i) このリポジトリのgithubページの緑のボタン[Use this template]から任意のプロジェクトのリポジトリを作成し、clone。

	ii) DOWNLOAD ZIPから、このリポジトリのファイルをダウンロード
			ZIPファイルを解凍し、解凍されたフォルダを英数字で任意のプロジェクトの名前に設定する。例）new_project

2. .env.sampleファイルをコピーして.envにリネーム。.env内のPROJECT_NAME, THEME_NAME, WORDPRESS_DIRを変更

3. package.jsonのprelogin:wordmove, login:wordmoveにある[.envで設定したPROJECT_NAME]を変更

4. src/style.cssを書き換えて、テーマ名などを変更

5. ターミナルを開いて、プロジェクトのディレクトリを参照する。
sudo yarn install でセットアップ
yarn start ※インストール時は「http://localhost:9000/」でアクセス

### wordpressをサブディレクトリに置く場合
1. [開発環境構築手順]の2で、WORDPRESS_DIRにサブディレクトリ名を設定(ex: wp)。リモートサーバーのパスも同様の設定にする。あとは[開発環境構築手順]の2,3,4,5は同様。

2. `yarn install`, `yarn start`後、public/サブディレクトリ】/index.php, .htaccessの2つのファイルをpublic/直下にコピー。

3. public/index.phpの内容をサブディレクトリ用に修正
```
// 変更前
require( dirname( __FILE__ ) . '/wp-blog-header.php' );
// 変更後
require( dirname( __FILE__ ) . '/[サブディレクトリ名]/wp-blog-header.php' );
```

4. wordpress管理画面でパーマリンク設定を保存。（何も修正せずに保存でOK）

### 環境構築途中で不具合があったとき
上から順に確認。全てリセット＆削除したい場合は4から。
1. 起動が遅い場合があるので2~3分待ってみる。

Ctr + Cでdocker-composeを停止後それぞれの順番で確認 & `yarn start`
2. .envの内容が正しいか確認
- .envファイルはルート（.env.sampleと同じディレクトリ）に置いているか
- .envで設定している変数で=の後ろにスペース等余計な文字がが入っていないか。
3. dockerのコンテナを停止＆削除

	`$ docker-compose down`

4. dockerのコンテナを停止＆削除かつボリュームを削除

<span style="color: red;">**注意** コンテナ内のDBのデータ等すべて消えます。リセットしたいときだけ使用してください。</span>

`$ docker-compose down -v`

## 仕様説明
### 開発について
yarn start時に、srcファイルにあるテーマファイルが、publicフォルダにコンパイル・コピーされます。
テーマ編集はsrcファイルで行なってください。

### CSS(SCSS)について
基本動作としてAutoprefixer（CSSのプロパティにベンダープレフィクス付与）、cssMqpacker（CSSのメディアクエリを並び替え）を実行してくれます。
このベーシックテンプレートではpostCSSのカスタムメディアをインストールしていないので、
メディアクエリ指定は、SCSSのミックスインを使って（@include media）で指定を想定しています。

上記の仕様のため、FTPにSCSSファイルをアップし、保守などでSCSSファイルを落としてきてAtomやCodeKitでのコンパイルが可能です。
（その際、Autoprefixerや、cssMqpackerは効いていない状態になるので　アプリ側で設定が必要です）

### JSについて
src/js/main.js はWebpackによるコンパイルが実行されます。
src/js/plugin/ にあるjsはコンパイルされずpublicの同様のフォルダにコピーが出力されます。

### その他
・初期ビルドのphp.ini設定は500Mに設定しています。
・WordPressヘルプがファイルに入っています。

## ファイル構成

### バックエンド
docker-compose.yml … Dockerの設定ファイル

### フロントエンド
#### package.json
プラグインなどのモジュール、コマンドを管理しているファイル

#### webpack.mix.js
ビルドツールであるLaravel Mixの設定ファイル

#### 「~lintrc、~lintignore」
CSSとjavascriptを監視し、コードの保守性を保つlinterの設定ファイルと対象外ファイルの設定。「stylelint-config-recess-order」によってCSSのプロパティを自動で並び替えています。

## wordmoveの利用方法
wordmoveを利用してリモートサーバーとssh接続し、データの同期が可能です。

### 準備

1. リモートサーバーのssh接続環境を整える(xserverの場合: https://www.xserver.ne.jp/manual/man_server_ssh.php)

2. .envにリモートサーバーの情報を記述。(stagingとproductionの2つ環境を設定できるので適宜。) WORDPRESS_DIRにディレクトリ名を設定している場合、リモートサーバー側も同様にサブディレクトリの設定にする。

3. wordmove/.ssh/に秘密鍵を置く。init.shに秘密鍵の名前を記述。（デフォルトではheteml.pemが設定してあります）


### wordmoveコンテナにログイン&セットアップ

1. wordmoveコンテナにログイン（ログインディレクトリ: /home/wordmove）
`$ yarn login:wordmove`

2. ログイン後以下のコマンドを実行。実行するとシェルスクリプトでssh鍵、エンコーディングの設定を行う。

`$ source init.sh`


### ローカルサーバーからリモートサーバーへpush

 movefile.ymlがあるディレクトリ(/home/wordmove)にてwordmoveコマンドを実行。

<span style="color: red;">**注意** コマンド一発でWordPressファイル, DBが同期できてしまうので必ず同期内容を確認してからコマンドを入力してください。</span>

ローカルのthemeファイルをリモートサーバー(production)に同期
```
$ wordmove push --themes -e production
```

リモート(staging)のDBをローカルに同期

```
$ wordmove pull --db -e staging
```

コマンド・オプションの詳細に関しては以下を参照

https://github.com/welaika/wordmove/wiki/Usage-and-flags-explained
