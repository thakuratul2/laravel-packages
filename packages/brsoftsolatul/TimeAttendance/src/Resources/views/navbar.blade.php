<nav class="navbar">
    <!-- Other navbar elements -->
    <button id="log-time-btn" class="btn btn-light">
        <i class="fas fa-clock"></i>
    </button>
</nav>

<script>
    document.getElementById('log-time-btn').addEventListener('click', function() {
        fetch('{{ route("log.time") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({})
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message + ' Time: ' + (data.time_in || data.time_out));
        })
        .catch(error => console.error('Error:', error));
    });
</script>
