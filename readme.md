# ① 課題番号-プロダクト名

読書感想保存サイト

## ② 課題内容（どんな作品か）

- 入力した感想のタイトルをリンクとして一覧表示して、リンク先で本文や書籍名などの詳細を確認できる
- 記事の編集削除ができる（7/4追記）
- ユーザー登録機能実装。ゲストユーザー時は記事の詳細は確認できない（7/11追記）
- 画像投稿機能、ライク機能実装。(7/18追記)

## ③DEMO

なし

## ④ 作ったアプリケーション用の ID または Password がある場合

- ID: なし
- PW: なし

## ⑤ 工夫した点・こだわった点

- インプットに入力した内容を表示するのに、一旦リンクを挟んだ
- textareaにはvalueの値が渡せなかったのでjavascriptで変換して表示した（7/4追記）
- ゲストユーザーの時には記事作成ボタンを非活性にした(7/11)
- 画像の上に文字とライクを表示するようにした(7/18)

## ⑥ 難しかった点・次回トライしたいこと(又は機能)

- リンク先で欲しい配列の情報を取り出すところが難しかった。今回の取得方法は記事を１件でも削除したら取り出す配列がズレてうまくいかなくなるので、もっといい方法を試したい。
- 画像のアップロードを次回は試してみたい(7/4追記)
- 上記と同じ(7/11)
- テンプレートを複数（文字が小さく中央に配置されていたり、縦書きだったり）用意して、文字を入れるだけでいろんなデザインの帯をつくれるようにしたかったが、単純な画像投稿機能を実装するだけで手一杯だった。（7/18）

## ⑦ 質問・疑問・感想、シェアしたいこと等なんでも

- [感想]もうphp講義が終わるのにいまだにどのコードがどういう処理をしているのか理解できていないところが多いので地道に頑張りたい。
- [参考記事]
  - 1. リンク先のページを作る[https://qiita.com/harufuji/items/353bb3348241e9d3365c]
  - 2. ページ読み込み時実行[https://www.tam-tam.co.jp/tipsnote/javascript/post601.html]
  - 3. テキストエリアにvalueを渡す[https://qiita.com/chin-zabro/items/88a947910d46a9a19d79](7/4追記)
  - 4. 画像を投稿・表示する方法[https://www.youtube.com/watch?v=DQ1M8mU6rZQ](7/18追記)
