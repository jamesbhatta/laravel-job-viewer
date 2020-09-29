<?php

namespace Jamesbhatta\LaravelJobViewer;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class JobViewerController extends Controller
{
    public function index()
    {
        $jobs = DB::table('jobs')->get();

        $jobs->map(function ($job) {
            $job->reserved_at = $this->formatTimestamp($job->reserved_at);
            $job->available_at = $this->formatTimestamp($job->available_at);
            $job->created_at = $this->formatTimestamp($job->created_at);
        });
        $failedJobsCount = DB::table('failed_jobs')->count();
        $attemptedJobsCount = DB::table('jobs')->where('attempts', '>', 0)->count();
        $reservedJobsCount = DB::table('jobs')->where('attempts', '>', 0)->count();

        return view('laravel-job-viewer::jobs', compact(
            'jobs',
            'failedJobsCount',
            'attemptedJobsCount',
            'reservedJobsCount'
        ));
    }

    public function formatTimestamp($timestamp)
    {
        if ($timestamp == null) {
            return "Never";
        }
        return Carbon::parse($timestamp)
            ->diffForHumans([
                'parts' => 3,
                'join' => true,
                'short' => true
            ]);
    }
}
