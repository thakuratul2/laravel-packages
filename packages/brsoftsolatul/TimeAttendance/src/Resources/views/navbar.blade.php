<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Time Attendance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .clock-icon {
            font-size: 24px;
            cursor: pointer;
        }
        .stopwatch {
            font-size: 24px;
            font-weight: bold;
            margin-right: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <!-- Stopwatch display on the left of the clock icon -->
                    <li class="nav-item">
                        <span id="stopwatch" class="stopwatch" style="display:none;">00:00:00</span>
                    </li>
                    <!-- Clock icon -->
                    <li class="nav-item">
                        <span id="clock-icon" class="clock-icon">🕑</span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h3>Time Attendance System</h3>
        <p>Click the clock icon to start or stop your attendance.</p>
        <div id="message" class="alert alert-info" style="display: none;"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        let stopwatchInterval;
        let stopwatchRunning = false;
        let startTime;
    
        function startStopwatch() {
    startTime = new Date(); 
    $('#stopwatch').show(); 

    const currentTime = getCurrentSystemTime();
    $('#stopwatch').text(currentTime);

    stopwatchInterval = setInterval(function () {
        const now = new Date();
        const elapsedTime = new Date(now - startTime);

        const hours = String(elapsedTime.getUTCHours()).padStart(2, '0');
        const minutes = String(elapsedTime.getUTCMinutes()).padStart(2, '0');
        const seconds = String(elapsedTime.getUTCSeconds()).padStart(2, '0');

        $('#stopwatch').text(`${hours}:${minutes}:${seconds}`);
    }, 1000);
}

    
        function stopStopwatch() {
            clearInterval(stopwatchInterval); 
            stopwatchRunning = false;
        }
    
        function getCurrentSystemTime() {
    const now = new Date();
    const year = now.getFullYear(); 
    const month = String(now.getMonth() + 1).padStart(2, '0');
    const day = String(now.getDate()).padStart(2, '0'); 
    const hours = String(now.getHours()).padStart(2, '0'); 
    const minutes = String(now.getMinutes()).padStart(2, '0'); 
    const seconds = String(now.getSeconds()).padStart(2, '0'); 

    
    return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
}

    
        $(document).ready(function () {
            $('#clock-icon').on('click', function () {
                if (!stopwatchRunning) {
                    // Start the stopwatch
                    stopwatchRunning = true;
                    startStopwatch();
                } else {
                    // Stop the stopwatch
                    stopStopwatch();
                    $('#stopwatch').hide(); // Hide the stopwatch after stopping
                }
    
                const localTime = getCurrentSystemTime(); // Get current system time
    
                // Send AJAX request to toggle time in/out
                $.ajax({
                    url: '{{ route('toggle-time') }}',
                    type: 'POST',
                    data: { local_time: localTime }, // Send local time as part of the request
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        $('#message').text(response.message).show();
                    },
                    error: function (xhr) {
                        console.log('Error:', xhr.responseText);
                    }
                });
            });
        });
    </script>
    
</body>
</html>
