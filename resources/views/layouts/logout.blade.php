<script>
    $(document).ready(function() {
        $(document).on('submit', '#sidebar-logout-form', function(e) {
            e.preventDefault();
            swallConfirmLogout(this);
        })
    })

    $(document).ready(function() {
        $(document).on('submit', '#topbar-logout-form', function(e) {
            e.preventDefault();
            swallConfirmLogout(this);
        })
    })
</script>