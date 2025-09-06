<?php
// session_start();
$conn = new mysqli("localhost", "root", "", "movies_db");
if ($conn->connect_error) {
  die("Database connection failed: " . $conn->connect_error);
}

// Logout
if (isset($_GET['logout'])) {
  session_destroy();
  header("Location: " . $_SERVER['PHP_SELF']);
  exit;
}

// Handle AJAX request
if (isset($_POST['action'])) {
  // Signup
  if ($_POST['action'] === 'signup') {
    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($username) && empty($email) && empty($password)) {
      echo json_encode(["success" => false, "message" => "* All fields are required."]);
      exit;
    }
    if (empty($username)) {
      echo json_encode(["success" => false, "message" => "* Username fields are required."]);
      exit;
    }
    if (empty($email)) {
      echo json_encode(["success" => false, "message" => "* Email fields are required."]);
      exit;
    }
    if (empty($password)) {
      echo json_encode(["success" => false, "message" => "* Password fields are required."]);
      exit;
    }
    if (strlen($password) < 7) {
      echo json_encode(["success" => false, "message" => "* Password must be at least 8 characters."]);
      exit;
    }

    // Duplicate check
    $stmt = $conn->prepare("SELECT id_user FROM users WHERE name_user=? OR email_user=?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
      echo json_encode(["success" => false, "message" => "* Username or Email already exists."]);
      exit;
    }
    $stmt->close();

    // Insert user
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (name_user, email_user, password_user, created_at) VALUES (?, ?, ?, NOW())");
    $stmt->bind_param("sss", $username, $email, $hashed_password);

    if ($stmt->execute()) {
      echo json_encode(["success" => true, "message" => "Registration successful!"]);
    } else {
      echo json_encode(["success" => false, "message" => "Registration failed."]);
    }
    $stmt->close();
    exit;
  }

  // Login
  if ($_POST['action'] === 'login') {
    $users = trim($_POST['users']);
    $pass  = trim($_POST['password']);

    if (empty($users) && empty($pass)) {
      echo json_encode(["success" => false, "message" => "* All fields are required."]);
      exit;
    }

    if (empty($users)) {
      echo json_encode(["success" => false, "message" => "* Username fields are required."]);
      exit;
    }

    if (empty($pass)) {
      echo json_encode(["success" => false, "message" => "* Password fields are required."]);
      exit;
    }

    $stmt = $conn->prepare("SELECT id_user, password_user, name_user FROM users WHERE name_user=? OR email_user=? LIMIT 1");
    $stmt->bind_param("ss", $users, $users);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id_user, $hashed_password, $name_user);

    if ($stmt->num_rows > 0) {
      $stmt->fetch();
      if (password_verify($pass, $hashed_password)) {
        $_SESSION['user_id'] = $id_user;
        $_SESSION['username'] = $name_user;
        echo json_encode([
          "success" => true,
          "message" => "Login successful!",
          "session_id" => $_SESSION['user_id'],
          "session_name" => $_SESSION['username']
        ]);
      } else {
        echo json_encode(["success" => false, "message" => "Incorrect password."]);
      }
    } else {
      echo json_encode(["success" => false, "message" => "User not found."]);
    }
    $stmt->close();
    exit;
  }
}

// Determine if user is logged in
$showLogin = !isset($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup & Login with Session</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>

<body>
  <div class=" flex items-center justify-center bg-transparent text-white p-4">
    <?php if ($showLogin): ?>
      <!-- Forms Box -->
      <div id="top_form" class="w-full rounded-xl p-2 bg-gray-900 max-w-md">
        <!-- Signup -->
        <div id="signupBox" class="rounded-2xl p-6 space-y-6">
          <div class="flex flex-col items-center justify-center text-center">
            <div class="w-10 h-10 flex items-center justify-center rounded-full bg-blue-100">
              <i class="fa fa-user-plus text-blue-600 text-xl"></i>
            </div>
            <h2 class="text-xl font-semibold text-gray-200">Create an Account</h2>
            <p class="text-gray-100 text-sm">Sign up to continue and explore more</p>
          </div>
          <form id="signupForm" class="space-y-4">
            <input type="text" name="username" placeholder="Username"
              class="w-full px-4 py-2 rounded-xl bg-gray-700 border border-gray-600 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 outline-none">
            <input type="email" name="email" placeholder="Email"
              class="w-full px-4 py-2 rounded-xl bg-gray-700 border border-gray-600 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 outline-none">
            <input type="password" name="password" placeholder="Password"
              class="w-full px-4 py-2 rounded-xl bg-gray-700 border border-gray-600 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 outline-none">
            <button type="submit"
              class="w-full bg-blue-600 hover:bg-blue-700 transition rounded-xl py-2 font-semibold">
              Sign Up
            </button>
            <input type="hidden" name="action" value="signup">
          </form>
        </div>
        <!-- Login -->
        <div id="loginBox" class="rounded-2xl  p-6 space-y-6 hidden">
          <div class="flex flex-col items-center justify-center text-center">
            <div class="w-10 h-10 flex items-center justify-center rounded-full bg-blue-100">
              <i class="fa fa-sign-in-alt text-blue-600 text-xl"></i>
            </div>
            <h2 class="text-xl font-semibold text-gray-200">Sign in to Continue</h2>
            <p class="text-gray-100 text-sm">Login to access your account</p>
          </div>
          <form id="loginForm" class="space-y-4">
            <input type="text" name="users" placeholder="Username or Email"
              class="w-full px-4 py-2 rounded-xl bg-gray-700 border border-gray-600 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 outline-none">
            <input type="password" name="password" placeholder="Password"
              class="w-full px-4 py-2 rounded-xl bg-gray-700 border border-gray-600 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 outline-none">
            <button type="submit"
              class="w-full bg-blue-600 hover:bg-blue-700 transition rounded-xl py-2 font-semibold">
              Login
            </button>
            <input type="hidden" name="action" value="login">
          </form>
        </div>
        <!-- Messages and Switch Buttons -->
        <div class="p-3 pt-0">
          <center>
            <span id="loginMsg" class="msg  text-md text-red-400"></span>
            <span id="signupMsg" class="msg  text-md text-red-400"></span>
            <span id="sessionInfo" class="msg  text-md text-green-400"></span>
          </center>
          <div class="px-4">
            <div class="flex items-center w-full my-1">
              <hr class="flex-grow border-gray-500">
              <span class="px-2 text-gray-400 text-sm">OR</span>
              <hr class="flex-grow border-gray-500">
            </div>
            <?php include("google_account.php"); ?>
          </div>
          <button id="switchToLogin" class="switch-btn my-2 w-full text-sm text-gray-400 hover:text-blue-400 transition" onclick="showLogin()">Already have an account? Login</button>
          <button id="switchToSignup" class="switch-btn my-2 w-full text-sm text-gray-400 hover:text-blue-400 transition" onclick="showSignup()">Don't have an account? Sign Up</button>
        </div>
      </div>
    <?php else: ?>
      <!-- Dashboard for logged-in user -->
      <div id="dashboardBox" class="bg-gray-800 rounded-2xl shadow-xl p-6 space-y-4 text-center">
        <h2 class="text-2xl font-bold">
          <?= htmlspecialchars($_SESSION['username']) ?>
        </h2>
        <button
          class="w-full bg-red-600 hover:bg-red-700 transition rounded-xl py-2 font-semibold mt-4"
          onclick="window.location='?logout=1'">
          Logout
        </button>
      </div>
      <script>
        // hide top_form when logged in
        document.addEventListener("DOMContentLoaded", () => {
          const topForm = document.getElementById("top_form");
          if (topForm) topForm.style.display = "none";
        });
      </script>
    <?php endif; ?>
  </div>

  <script>
    function showLogin() {
      $("#signupBox").hide();
      $("#loginBox").show();
      $("#signupMsg").html('');
      $("#sessionInfo").html('');

      $("#signupMsg, #switchToLogin").hide();
      $("#loginMsg, #sessionInfo, #switchToSignup").show();
    }

    function showSignup() {
      $("#loginBox").hide();
      $("#signupBox").show();
      $("#loginMsg").html('');
      $("#sessionInfo").html('');

      $("#loginMsg, #sessionInfo, #switchToSignup").hide();
      $("#signupMsg, #switchToLogin").show();
    }

    // By default: signup form active
    $(document).ready(function() {
      $("#loginMsg, #sessionInfo, #switchToSignup").hide();
    });

    // Signup AJAX
    $("#signupForm").on("submit", function(e) {
      e.preventDefault();
      $.ajax({
        url: "",
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
        url: "",
        type: "POST",
        data: $(this).serialize(),
        dataType: "json",
        success: function(res) {
          $("#loginMsg").removeClass("text-green-400 text-red-400");
          $("#sessionInfo").html('');
          if (res.success) {
            $("#loginMsg").addClass("text-green-400").html(res.message);
            $("#loginForm")[0].reset();

            // Refresh page immediately after login
            location.reload();
          } else {
            $("#loginMsg").addClass("text-red-400").html(res.message);
          }
        }
      });
    });
  </script>
</body>

</html>