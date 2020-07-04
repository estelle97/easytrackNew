<!-- Libs JS -->
    <script src="{{ asset('dashboard/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dashboard/dist/libs/jquery/dist/jquery.slim.min.js') }}"></script>
    <!-- easytrak Core -->
    <script src="{{ asset('dashboard/dist/js/easytrak.min.js') }}"></script>
    
    <!-- easytrak Core -->
    
    <script>
        document.body.style.display = "block";
        $(".register-step-2, .register-step-3, .register-step-4, .register-step-5, .register-step-6").toggle();
        $(".btn-submit-step-1, .btn-back-step-1").click(function() {
            $(".register-step-1").toggle();
            $(".register-step-2").toggle();
        });
        $(".btn-submit-step-2, .btn-back-step-2").click(function() {
            $(".register-step-2").toggle();
            $(".register-step-3").toggle();
        });
        $(".btn-submit-step-3, .btn-back-step-3").click(function() {
            $(".register-step-3").toggle();
            $(".register-step-4").toggle();
        });
        $(".btn-submit-step-4, .btn-back-step-4").click(function() {
            $(".register-step-4").toggle();
            $(".register-step-5").toggle();
            $(".auth-title").hide();
        });
        $(".btn-submit-step-5").click(function() {
            $(".register-step-5").toggle();
            $(".register-step-6").toggle();
            $(".auth-title").hide();
        });
    </script>