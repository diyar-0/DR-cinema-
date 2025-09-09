<?php
$conn = new mysqli("localhost", "root", "", "movies_db");
if ($conn->connect_error) {
    die("DB Error: " . $conn->connect_error);
}
// ---- Message for user feedback ----
$message = "";

// ---- Handle POST submission ----
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'send_report') {

        if (!empty($_SESSION['user_id'])) {
            $user_id         = $_SESSION['user_id'];
            $comment_id      = intval($_POST['comment_id']);
            $film_id__       = intval($_POST['film_id']);
            $user_comment_id = intval($_POST['user_comment_id']);
            $reason_comment  = trim($_POST['reason_comment']);

            if (!empty($reason_comment)) {
                // Check if user already reported this comment
                $check_stmt = $conn->prepare("SELECT id FROM report_comment WHERE id_comment = ? AND id_user_report = ?");
                $check_stmt->bind_param("ii", $comment_id, $user_id);
                $check_stmt->execute();
                $check_stmt->store_result();

                if ($check_stmt->num_rows > 0) {
                    $message = "<div class='alert alert-warning mt-3'>⚠️ You already reported this comment</div>";
                } else {
                    // Insert new report
                    $stmt = $conn->prepare("INSERT INTO report_comment (id_comment, report_text, id_user_comment, id_user_report, id_film) 
                                VALUES (?, ?, ?, ?, ?)");
                    $stmt->bind_param("isiii", $comment_id, $reason_comment, $user_comment_id, $user_id, $film_id__);

                    if ($stmt->execute()) {
                        $message = "<div class='alert alert-success mt-3'>✅ Report sent successfully</div>";
                    } else {
                        $message = "<div class='alert alert-danger mt-3'>❌ DB Error: " . $stmt->error . "</div>";
                    }
                    $stmt->close();
                }
                $check_stmt->close();
            } else {
                $message = "<div class='alert alert-warning mt-3'>⚠️ Please write a reason</div>";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Report Comment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-light">


    <?php if (!empty($_SESSION['user_id'])) { ?>



        <button title="Report comment"
            class="like-btn rounded-2 flex items-center justify-center text-amber-500 hover:scale-105 hover:shadow-md transition-transform duration-300"
            data-bs-toggle="modal" data-bs-target="#report_comment_modal<?php echo $comment_id; ?>">
            <i class="fas fa-flag text-md mb-1"></i>
        </button>


        <!-- <button data-bs-toggle="modal" data-bs-target="#report_comment_modal<?php echo $comment_id; ?>"
            class="btn btn-outline-warning">
            <i class="fas fa-flag"></i>
        </button> -->
    <?php } else { ?>
        <button title="Report comment" data-bs-toggle="modal" data-bs-target="#must_login_report_comment" c class="like-btn rounded-2 flex items-center justify-center text-amber-500 hover:scale-105 hover:shadow-md transition-transform duration-300">
            <i class="fas fa-flag text-md mb-1"></i>
        </button>
    <?php } ?>

    <!-- must login Modal -->
    <div class="modal fade" id="must_login_report_comment" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark text-white">
                <div class="modal-body text-center d-flex align-items-center gap-2 py-2 px-4">
                    <i class="fas fa-exclamation-triangle text-warning fs-3"></i>
                    <h3 class="m-0 p-0 flex-grow-1">You must register to do this</h3>
                    <button type="button" class="btn-close mt-1 btn-close-white ms-auto" data-bs-dismiss="modal"></button>
                </div>
            </div>
        </div>
    </div>

    <!-- Report Comment Modal -->
    <div class="modal fade" id="report_comment_modal<?php echo $comment_id; ?>" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content bg-dark text-light">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-flag text-danger"></i> Report Comment</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <input type="hidden" name="comment_id" value="<?php echo $comment_id ?>">
                        <input type="hidden" name="film_id" value="<?php echo $film_id ?>">
                        <input type="hidden" name="user_comment_id" value="<?php echo $user_comment_id ?>">

                        <div class="mb-3">
                            <label class="form-label">Reason for Report <span class="text-danger">*</span></label>
                            <textarea class="form-control bg-dark text-light" name="reason_comment" placeholder="Write your reason here..." required></textarea>
                        </div>
                        <button type="submit" name="action" value="send_report" id="sendReportBtn" class="btn btn-danger w-100">
                            Send Report</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="must_login_report" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark text-white">
                <div class="modal-body text-center d-flex align-items-center gap-2 py-2 px-4">
                    <i class="fas fa-exclamation-triangle text-warning fs-3"></i>
                    <h3 class="m-0 p-0 flex-grow-1">You must register to do this</h3>
                    <button type="button" class="btn-close mt-1 btn-close-white ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>