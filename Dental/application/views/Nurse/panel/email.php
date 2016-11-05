<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assest/'); ?>dist/sweetalert.css">
    <script src="<?php echo base_url('assest/'); ?>dist/sweetalert.min.js"></script>
</head>
<body>
<script language="javascript">
    swal({
            title: "Forgot password!",
            text: "Enter your email",
            type: "input",
            name: "email",
            showCancelButton: true,
            closeOnConfirm: false,
            animation: "slide-from-top",
            inputPlaceholder: "Write your email"
        },
        function(inputValue){
            if (inputValue === false) return false;

            if (inputValue === "") {
                swal.showInputError("You need to write email id!");
                return false
            }
            if (inputValue === "<?php echo $_SESSION['email'];?>") {
               swal("Nice!",  "You wrote: " + inputValue, "success");

                return false
            }
            swal("Wrong!",  "Invalid email Id: " + inputValue, "warning");
        });


</script>
</body>
</html>