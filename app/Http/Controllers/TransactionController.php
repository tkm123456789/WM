<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Transaction;
class TransactionController extends Controller
{
    public function index()
    {
        $payments = Transaction::all();
        return $payments;
    }
}
