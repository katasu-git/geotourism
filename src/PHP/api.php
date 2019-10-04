<?php

function accessDb() {
    try {

        /* リクエストから得たスーパーグローバル変数をチェックするなどの処理 */
        header("Access-Control-Allow-Origin: *"); //CORS回避

        // データベースに接続
        $pdo = new PDO(
            'mysql:dbname=nishimura;host=localhost;charset=utf8mb4',
            'nishimura',
            'TYoshino45!!',
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]
        );

        /* データベースから値を取ってきたり， データを挿入したりする処理 */
        // SELECT文を変数に格納
        $sql = "SELECT * FROM tour_name";

        // SQLステートメントを実行し、結果を変数に格納
        $stmt = $pdo->query($sql);
        $tour_name = array();
        $group_name = array();
        foreach ($stmt as $row) {
            array_push($tour_name, $row['tour_name']);
            array_push($group_name, $row['group_name']);
        }
        $result = array('tour_name' => $tour_name, 'group_name' => $group_name);
        return $result;

    } catch (PDOException $e) {

        // エラーが発生した場合は「500 Internal Server Error」でテキストとして表示して終了する
        // - もし手抜きしたくない場合は普通にHTMLの表示を継続する
        // - ここではエラー内容を表示しているが， 実際の商用環境ではログファイルに記録して， Webブラウザには出さないほうが望ましい
        header('Content-Type: text/plain; charset=UTF-8', true, 500);
        //exit($e->getMessage());

        return "失敗";

    }
}

echo json_encode(accessDb());

?>