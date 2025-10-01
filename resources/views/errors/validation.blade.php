@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert" id="error-alert">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<script>
    // Auto-hide after 7 seconds
    setTimeout(function() {
        var alert = document.getElementById('error-alert');
        if(alert){
            var bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
            bsAlert.close();
        }
    }, 7000); // 7000 ms = 7 seconds
</script>
@endif
