<?php
// Closes the page. Admin pages set $is_admin = 1 so the main div is closed too.
?>
</div>
<footer class="text-center py-3 mt-4 bg-forest text-white small <?php if (isset($is_admin)) echo 'ms-md-5'; ?>" style="<?php if (isset($is_admin)) echo 'margin-left:240px;'; ?>">
  <a href="https://skf.edu.in/" class="text-warning text-decoration-none">Supreme Knowledge Foundation Group of Institutions, https://skf.edu.in/</a>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
