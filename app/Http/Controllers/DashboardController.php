<?php

namespace App\Http\Controllers;
  
use App\Models\Product;
use App\Models\Distributor;
use App\Models\Home;
use App\Models\Pegawai;
use App\Models\User;
use App\Models\Staff;

use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index()
        {
            $totalProducts = Product::count();
            $distributors1 = Distributor::count(); // Gantilah sesuai model dan logika bisnis Anda
            $users = User::count();
            $staffs = Staff::count();

            return view('dashboard', compact('totalProducts', 'distributors1', 'users', 'staffs'));
        }

}