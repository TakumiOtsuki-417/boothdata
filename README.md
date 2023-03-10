
# 概要
　このアプリケーションは、幾つかのトイレブースを所持する何らかの施設で、トイレブース内のトイレットペーパー残量を記録するためのシステムとなっております。登録されたスタッフが該当のトイレブースの情報を都度データ登録し、スタッフや管理者がそのデータをフロア・ブース毎に集計して確認することができるようになっています。

# コンセプト（作成動機）
　私自身がそういった施設の各ブース清掃に携わる者であり、他スタッフとの情報共有を核とした連携、ペーパー消費量の傾向や法則の分析、管理者への報告のための一資料として、それらを実現することに特化したシンプルなアプリケーションに可能性を感じていたことが作成動機であり、そのままコンセプトとなっております。

# 留意事項
　上述のコンセプトにより、フロアやブースの情報、各トイレットペーパーの残量上限、スタッフの配当されうるポジションなどはとにかく私の関係している施設に特化させた、いわばオーダーメイドな設計になっています。つまりはどこの施設に対しても利用が想定できる汎用的なアプリケーションとはいえず、その点でカスタマイズの余地は沢山残している現状です。

# URL
https://falling-waterfall-6414.fly.dev/

# サンプルスタッフアカウント
## その１（金網太郎）
kanaami@asa.com
kanaami213asa900

## その２（服部花子）
hattori@asa.com
hattori213asa900


# 使い方
1. 上掲のサンプルアカウントでログインしてください。（アカウントの作成は、管理者権限を有するアカウントスタッフ出なければ実施できないようになっております）
2. ヘッダー部分に「データ作成」があるかと思います。そちらをクリックするとブースデータの作成画面に遷移します。
対象ブース、作業時刻、作業前のトイレットペーパー残量、作業後のトイレットペーパー残量を選択してください。
3. 送信に成功するとトップページに戻ります。登録されたブースデータはすでにフロアで分類されており、ヘッダー下のフロアタブをクリックすることで各ブースデータの一覧を探すことができます。

