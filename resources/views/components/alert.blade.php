@if(session()->has('success'))
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="demo-spacing-0">
                        <div class="alert alert-success" role="alert" id="successAlert">
                            <div class="alert-body"><strong>Success Alert!</strong> {{session()->get('success')}}</div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if(session()->has('error'))
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="demo-spacing-0">
                        <div class="alert alert-danger" role="alert" id="errorAlert" >
                            <div class="alert-body"><strong>Error Alert!</strong> {{session()->get('error')}}</div>
                        </div>
                    </div>
                </div>
            </div>
        @endif


<script>
    // Hide the success alert after 5 seconds
    setTimeout(function() {
        document.getElementById('successAlert').style.display = 'none';
    }, 5000);

    // Hide the error alert after 5 seconds
    setTimeout(function() {
        document.getElementById('errorAlert').style.display = 'none';
    }, 5000);
</script>
