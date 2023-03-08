<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // 主キーの列名を指定
    protected $primaryKey = 'book_id';

    // ホワイトリスト（DBに入力可能・編集可能）
    // create()やupdate() 、fill()が可能
    protected $fillable = [
      'title',
      'author',
      // 'publisher',
      'publisherName',
      // 'ISBN',
      'isbn',
      // 'summary',
      'itemCaption',
      'gunre',
      'myReview',
      'largeImageUrl',
      'available',
  ];
}
