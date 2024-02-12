<?php
if (isset($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
?>

    <script>
        var x = document.getElementById("snackbar");
        x.innerHTML = "<?php echo $msg; ?>";
        x.className = "show";
        setTimeout(function() {
            x.className = x.className.replace("show", "");
        }, 3000);
    </script>

<?php
    unset($_SESSION['msg']);
}
?>

<script>
    // delete confirm
    function delete_confirm(link) {
        // alert(link);
        if (confirm("Do you want to delete it?")) {
            window.location.href = `${link}`;
        }
    }
</script>