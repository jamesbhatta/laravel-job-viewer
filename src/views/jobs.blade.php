<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Job Viewer</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"> --}}
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

    </style>
</head>
<body class="bg-gray-100 text-gray-700">
    <div class="container my-5 mx-auto md:w-full lg:w-32 xl:w-3/4">

        <div class="flex">
            <div class="text-3xl text-purple-700 mb-3">Laravel Job Viewer</div>
            <div class="ml-auto place-self-center">
                <a href="/dashboard" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded-full">Dashboard</a>
            </div>
        </div>

        <div class="border-b border-dashed border-gray-300 mb-5"></div>

        <div class="bg-white p-4 rounded-sm shadow-sm">
            <div>
                <h1 class="text-xl text-gray-700 mb-4">Overview</h1>
            </div>
            <div class="flex">
                <div class="flex-1 bg-gray-100 p-5 border-r border-gray-300">
                    <div class="text-gray-600 mb-5 uppercase">
                        Total Jobs
                    </div>
                    <div class="text-3xl">
                        {{ $jobs->count() }}
                    </div>
                </div>
                <div class="flex-1 bg-gray-100 p-5 border-r border-gray-300">
                    <div class="text-gray-600 mb-5 uppercase">
                        Failed Jobs
                    </div>
                    <div class="text-3xl">
                        {{ $failedJobsCount }}
                    </div>
                </div>
                <div class="flex-1 bg-gray-100 p-5 border-r border-gray-300">
                    <div class="text-gray-600 mb-5 uppercase">
                        Attempted Jobs
                    </div>
                    <div class="text-3xl">
                        {{ $attemptedJobsCount }}
                    </div>
                </div>
                <div class="flex-1 bg-gray-100 p-5 border-r border-gray-300">
                    <div class="text-gray-600 mb-5 uppercase">
                        Reserved Jobs
                    </div>
                    <div class="text-3xl">
                        {{ $reservedJobsCount }}
                    </div>
                </div>
            </div>
        </div>
        <div class="my-6"></div>
        <div class="bg-white p-4 rounded-sm shadow-sm">
            <div>
                <h1 class="text-xl text-gray-700 mb-4">Jobs</h1>
            </div>
            <table id="jobs-table" class="table-auto w-full">
                <thead>
                    <tr class="bg-gray-100 text-indigo-900 text-left">
                        @php
                        $thClass = 'px-4 py-3 font-normal';
                        @endphp
                        <th class="{{ $thClass }}">ID</th>
                        <th class="{{ $thClass }}">Queue</th>
                        <th class="{{ $thClass }}">Attempts</th>
                        <th class="{{ $thClass }}">Reserved At</th>
                        <th class="{{ $thClass }}">Available At</th>
                        <th class="{{ $thClass }}">Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $tdClass= 'border-b border-gray-200 px-4 py-4 font-normal text-gray-700 text-sm';
                    @endphp
                    @forelse($jobs as $job)
                    <tr>
                        <td class="{{ $tdClass }}">{{ $job->id }}</td>
                        <td class="{{ $tdClass }}">{{ $job->queue }}</td>
                        <td class="{{ $tdClass }}">{{ $job->attempts }}</td>
                        <td class="{{ $tdClass }}">
                            {{ $job->reserved_at }}
                        </td>
                        <td class="{{ $tdClass }}">
                            {{ $job->available_at }}
                        </td>
                        <td class="{{ $tdClass }}">
                            {{ $job->created_at }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="{{ $tdClass }}">All clean!! No jobs pending</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- jQuery for Bootstrap -->
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
    <!-- FontAwesome -->
    {{-- <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> --}}
    <!-- Datatables -->
    {{-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> --}}
    {{-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script> --}}
</body>
</html>
