  // Signup AJAX
    $("#signupForm").on("submit", function(e) {
        e.preventDefault();
        $.ajax({
            url: "../system_login/login_user.php",
            type: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function(res) {
                $("#signupMsg").removeClass("text-green-400 text-red-400");
                if (res.success) {
                    $("#signupMsg").addClass("text-green-400").html(res.message);
                    $("#signupForm")[0].reset();
                } else {
                    $("#signupMsg").addClass("text-red-400").html(res.message);
                }
            }
        });
    });

    // Login AJAX
    $("#loginForm").on("submit", function(e) {
        e.preventDefault();
        $.ajax({
            url: "../system_login/login_user.php",
            type: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function(res) {
                $("#loginMsg").removeClass("text-green-400 text-red-400");
                if (res.success) {
                    $("#loginMsg").addClass("text-green-400").html(res.message);
                    setTimeout(() => location.reload(), 1000);
                } else {
                    $("#loginMsg").addClass("text-red-400").html(res.message);
                }
            }
        });
    });