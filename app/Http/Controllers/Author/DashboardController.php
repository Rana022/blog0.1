<?php

namespace App\Http\Controllers\Author;

use App\Post;
use App\User;
use Carbon\Carbon;
use App\Charts\PostChart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user();
        $posts = $user->posts;
        $pending_posts = $posts->where('is_approved', 0)->count();
        $authors = User::where('role_id', 2)->count();
        $total_view = $posts->sum('view_count');
        $chart = new PostChart;
        $chart->labels(['Total Posts', 'Pending Posts', 'Authors', 'Total View']);
        $chart->dataset('Website Details', 'line', [$posts->count(), $pending_posts, $authors, $total_view]);
        return view('author.dashboard', compact('chart', 'posts'));
    }
}