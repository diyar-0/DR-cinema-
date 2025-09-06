<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "movies_db";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// Logout
if (isset($_POST['action']) && $_POST['action'] === 'logout') {
  session_destroy();
  echo "logged_out";
  exit;
}
// Verify Google Token
function verifyGoogleToken($token)
{
  $response = file_get_contents("https://oauth2.googleapis.com/tokeninfo?id_token=" . $token);
  $data = json_decode($response, true);

  $CLIENT_ID = "362232879417-8mbcvbccam70evb1f6khf8jjccpr4al0.apps.googleusercontent.com";

  if (isset($data['aud']) && $data['aud'] === $CLIENT_ID) {
    return $data;
  }
  return null;
}

// Handle Google sign-in
if ($_SERVER["REQUEST_METHOD"] === "POST" && empty($_POST['action'])) {
  $data = json_decode(file_get_contents("php://input"), true);
  if (isset($data['credential'])) {
    $payload = verifyGoogleToken($data['credential']);

    if ($payload) {
      $firstName = $payload["given_name"] ?? "No First Name";
      $lastName  = $payload["family_name"] ?? "No Last Name";
      $email     = $payload["email"] ?? "No Email";
      $image     = $payload["picture"] ?? null;
      $id_google = $payload["sub"] ?? "No ID";

      // Check if user exists
      $stmt = $conn->prepare("SELECT id_user FROM users WHERE google_id=? OR email_user=? LIMIT 1");
      $stmt->bind_param("ss", $id_google, $email);
      $stmt->execute();
      $stmt->store_result();

      if ($stmt->num_rows == 0) {
        $stmt->close();
        $stmt = $conn->prepare("INSERT INTO users (google_id, first_name, last_name, email_user, picture, created_at) VALUES (?,?,?,?,?,NOW())");
        $stmt->bind_param("sssss", $id_google, $firstName, $lastName, $email, $image);
        $stmt->execute();
        $user_id = $conn->insert_id; 
        $stmt->close();
      } else {
        $stmt->bind_result($user_id);
        $stmt->fetch();
        $stmt->close();
      }

      // Save in session
      $_SESSION['user_id']  = $user_id;
      $_SESSION['username'] = $firstName;
      $_SESSION['email']    = $email;
      $_SESSION['picture']  = $image;

      echo "success";
      exit;
    }
  }
  echo "error";
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Google Sign In PHP</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Bootstrap Icons CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <script src="https://accounts.google.com/gsi/client" async defer></script>
  <style>
    .profile {
      margin-top: 20px;
    }
  .avatar {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      background: #007bff;
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 30px;
      font-weight: bold;
      margin: 0 auto;
    }

    .profile img {
      width: 80px;
      height: 80px;
      border-radius: 50%;
    }
  </style>
</head>
<body>
  <center>
    <?php if (!isset($_SESSION['user_id'])): ?>
      <!-- Custom Google Button -->
      <button
        id="customGoogleBtn"
        type="button"
        class="inline-flex w-full items-center justify-center gap-3 rounded-2xl border border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-800 shadow-sm transition
               hover:-translate-y-0.5 hover:shadow-md
               focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500/60
               active:translate-y-0
               dark:border-white/10 dark:bg-white dark:text-gray-900"
        aria-label="Continue with Google">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="h-5 w-5" aria-hidden="true">
          <path fill="#FFC107" d="M43.6 20.5H42V20H24v8h11.3A12.9 12.9 0 1 1 24 11a12.7 12.7 0 0 1 8.5 3.3l5.7-5.7A21 21 0 1 0 45 24c0-1.2-.1-2.3-.4-3.5z" />
          <path fill="#FF3D00" d="M6.3 14.7l6.6 4.8A12.9 12.9 0 0 1 24 11a12.7 12.7 0 0 1 8.5 3.3l5.7-5.7A21 21 0 0 0 6.3 14.7z" />
          <path fill="#4CAF50" d="M24 45a21 21 0 0 0 14.6-5.6l-6.7-5.5A12.6 12.6 0 0 1 24 36a12.9 12.9 0 0 1-11.1-6.6l-6.6 5.1A21 21 0 0 0 24 45z" />
          <path fill="#1976D2" d="M43.6 20.5H42V20H24v8h11.3A13 13 0 0 1 24 36v9a21 21 0 0 0 21-21c0-1.2-.1-2.3-.4-3.5z" />
        </svg>
        <span class="md:text-[15px] text-[13px]">Continue with Google</span>
      </button>
      <div id="hiddenGoogleBtn" style="display:none;"></div>
    <?php else: ?>
      <button onclick="logout()">Logout</button>
      <div class="profile">
        <?php
        if (!empty($_SESSION['username'])) {
          echo "<strong>Name:</strong> " . $_SESSION['username'] . "<br>";
        }
        if (!empty($_SESSION['email'])) {
          echo "<strong>Email:</strong> " . $_SESSION['email'] . "<br>";
        }
        if (!empty($_SESSION['picture'])) {
          echo "<img src='" . $_SESSION['picture'] . "' alt='Profile Picture'>";
        } else {
          $firstLetter = strtoupper(substr($_SESSION['username'], 0, 1));
          echo "<div class='avatar'>{$firstLetter}</div>";
        }
        ?>
      </div>
    <?php endif; ?>
  </center>

</body>
</html>

<script>
    const GOOGLE_CLIENT_ID = "362232879417-8mbcvbccam70evb1f6khf8jjccpr4al0.apps.googleusercontent.com";
    window.onload = function() {
      google.accounts.id.initialize({
        client_id: GOOGLE_CLIENT_ID,
        callback: handleCredentialResponse,
      });

      google.accounts.id.renderButton(
        document.getElementById("hiddenGoogleBtn"), {
          theme: "outline",
          size: "large"
        }
      );
    };

    document.getElementById("customGoogleBtn")?.addEventListener("click", () => {
      document.querySelector("#hiddenGoogleBtn div[role=button]").click();
    });

    async function handleCredentialResponse(response) {
      try {
        const res = await fetch("<?php echo $_SERVER['PHP_SELF']; ?>", {
          method: "POST",
          headers: {
            "Content-Type": "application/json"
          },
          body: JSON.stringify({
            credential: response.credential
          })
        });
        location.reload();
      } catch (e) {
        alert("Network error: " + e.message);
      }
    }

    async function logout() {
      try {
        const res = await fetch("<?php echo $_SERVER['PHP_SELF']; ?>", {
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded"
          },
          body: "action=logout"
        });
        location.reload();
      } catch (e) {
        alert("Logout failed: " + e.message);
      }
    }
</script>