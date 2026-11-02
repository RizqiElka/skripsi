        <!-- /Content area -->
    </div><!-- /admin-content -->
</div><!-- /admin-main -->

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var toastElList = [].slice.call(document.querySelectorAll('.toast'));
    toastElList.map(function(toastEl) {
        var t = new bootstrap.Toast(toastEl, { delay: 4000 });
        t.show();
        return t;
    });
});
</script>
</body>
</html>
