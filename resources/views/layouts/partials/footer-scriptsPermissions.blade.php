<script src="{{ asset('dashboard/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- easytrak Core -->
    <script src="{{ asset('dashboard/dist/js/easytrak.min.js') }}"></script>
    <script src="{{ asset('template/assets/dist/libs/selectize/dist/js/standalone/selectize.min.js') }}"></script>
    <script >
        document.body.style.display = "block";

    </script>
    <script>
        $(document).ready(function () {
            $("#select-permission").selectize({});
        });
    </script>