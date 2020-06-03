<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\User;
use Carbon\Carbon;
use App\Charts\PostChart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $posts = Post::all()->count();
        $pending_posts = Post::where('is_approved', 0)->count();
        $popular_posts = Post::withCount('comments')
                               ->orderBy('comments_count', 'DESC')
                               ->orderBy('view_count')
                               ->published()
                               ->active()
                               ->take(5)
                               ->get();
        $authors = User::where('role_id', 2)->count();
        $author_join_today = User::where('role_id', 2)->whereDate('created_at', Carbon::today())->count();
        $total_view = Post::sum('view_count');
        $chart = new PostChart;
        $chart->labels(['Total Posts', 'Pending Posts', 'Authors', 'Author Join Today', 'Total View']);
        $chart->dataset('Website Details', 'line', [$posts, $pending_posts, $authors, $author_join_today, $total_view]);
        return view('admin.dashboard', compact('chart', 'popular_posts'));
    }
}
