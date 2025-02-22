<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentSuccessful extends Model
{
    use HasFactory;

    protected $fillable = [
        'matric_no',
        'name',
        'email',
        'faculty',
        'department',
        'programme',
        'level',
        'receipt_no',
        'reference_no',
        'payment_name',
        'academic_section',
        'amount_paid',
        'amount_in_words',
    ];



}
