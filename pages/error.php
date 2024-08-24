<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
    if(isset($_SESSION['error'])){
?>

    <script>
        Swal.fire({
            title: "Good Job!",
            text: "<?= $_SESSION['error']; ?>",
            icon: "warning"
        });
    </script>

<?php
        unset($_SESSION['error']);
    }
?>