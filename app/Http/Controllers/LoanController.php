<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // 現在の貸し出し状況を表示
    public function index()
    {       

        $loans = Loan::all();
        // eloquantをそのままreturnすると、jsonに変換してくれる。
        return $loans;
    }

    // 新しい貸し出し状況を追加
    public function store(Request $request)
    {
        // モデルの空のインスタンスを生成
        $loan = new Loan();

        // 受け取ったリクエストのデータすべて取得
        $form = $request->all();

        // 不要な列を削除
        unset($form['_token']);

        // 受け取ったデータをインスタンスに挿入し、DBに保存
        $loan->fill($request->all())->save();

        // bookのavailableをfalseにする。

        // 特に返すものがないのでreturnは必要ない
        // return △△△;
    }
}
