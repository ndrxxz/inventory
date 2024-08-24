<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
    if(isset($_SESSION['success'])){
?>

    <script>
        Swal.fire({
            title: "Good Job!",
            text: "<?= $_SESSION['success']; ?>",
            icon: "success"
        });
    </script>

<?php
        unset($_SESSION['success']);
    }
?>