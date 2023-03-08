<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $primaryKey = 'loadn_id';

    protected $fillable = [
        'book_id',
        'user_id',
        'loan_date',
        'return_date',
      ];
}
