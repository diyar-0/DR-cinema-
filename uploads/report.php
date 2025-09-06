<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegant Comment Design - Tailwind</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen p-8">
    <div id="msg" class="text-green-600 w-100 font-bold rounded-2xl  px-2 bg-blue-100 inline-block"></div>
    <div class="mb-3 p-4 border-b border-gray-100 shadow-md bg-gradient-to-br from-gray-100 to-gray-50">
        <span class="text-green-600 font-bold rounded-2xl px-2 py-1 bg-blue-100 inline-block">
            <i class="fas fa-flag mr-1"></i> Contents Report of Comments
        </span>
    </div>
    <?php
    // 📌 Sample SQL
    $sql = "SELECT report_comment.*, 
               report_comment.allowed_report,
               report_comment.id AS id_report_,
               reporter.name_user AS reporter_name, reporter.first_name AS reporter_name_google, reporter.id_user AS reporter_id,
               commenter.name_user AS commenter_name,commenter.first_name AS commenter_name_google, commenter.id_user AS commenter_id,
               films_db.id AS film_id_new, films_db.name_film AS name_film_new, films_db.img AS image_new,
               comments.comment AS comment, comments.created_at AS created_at_comment,comments.id AS id_com FROM report_comment
LEFT JOIN users AS reporter ON report_comment.id_user_report = reporter.id_user
LEFT JOIN users AS commenter ON report_comment.id_user_comment = commenter.id_user
LEFT JOIN films_db ON report_comment.id_film = films_db.id
LEFT JOIN comments ON report_comment.id_comment = comments.id
WHERE report_comment.allowed_report != 1";
    $result_r_comment = $conn->query($sql);

    if ($result_r_comment && $result_r_comment->num_rows > 0) {
        while ($row = $result_r_comment->fetch_assoc()) {
            $id = $row['id_report_'];
            $id_film_new = $row['film_id_new'];
            $id_com = $row['id_com'];
            $name_film_new = $row['name_film_new'];
            $image_new = $row['image_new'];
            $report_text = $row['report_text'];
            $created_at = $row['created_at'];
            $reporter_name = $row['reporter_name'];
            $reporter_name_google = $row['reporter_name_google'];
            $commenter_name = $row['commenter_name'];
            $commenter_name_google = $row['commenter_name_google'];
            $comment = $row['comment'];
            $created_at_comment = $row['created_at_comment'];
    ?>

            <!-- Comment Card -->
            <div class="comment-card my-3 w-full bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden transition-transform duration-300 hover:-translate-y-1 hover:shadow-lg">

                <!-- Header -->
                <div class="flex w-full justify-between items-center p-3 border-b border-gray-100 bg-gradient-to-br from-gray-100 to-gray-50">
                    <div class="mb-2 flex flex-col gap-1">
                        <span class="text-blue-600 text-[13px] md:text-[16px] font-bold rounded px-2 py-1 bg-blue-100 inline-block">
                            <i class="fas fa-user mr-1"></i> Reporter :
                            <?php if (!empty($reporter_name)) {
                                echo $reporter_name;
                            } else {
                                echo $reporter_name_google;
                            } ?>
                        </span>

                        <span class="text-red-600 text-[13px] md:text-[16px] font-bold rounded px-2 py-1 bg-red-100 inline-block">
                            <i class="fas fa-user-times mr-1"></i> Reported Person :
                            <?php
                         if (!empty($commenter_name)) {
    echo $commenter_name;
} elseif (!empty($commenter_name_google)) {
    echo $commenter_name_google;
} else {
    echo "User ID: " . $row['id_user_comment'];
}

                            ?>
                        </span>
                    </div>

                    <div class="flex flex-col items-center">
                        <img src="<?php echo $image_new ?>"
                            alt="User"
                            class="w-[80px] h-[80px] md:w-[100px] md:h-[100px] rounded-2 object-cover mb-2 border-2 border-white shadow-md">
                        <span class="text-[12px] md:text-[15px]"><?php echo $name_film_new ?></span>
                    </div>
                </div>

                <!-- Report text -->
                <div class="p-3 pb-0 w-full text-blue-600 text-[15px] md:text-[18px] leading-relaxed">
                    <p><?php echo $report_text ?></p>
                    <span class="flex items-center text-gray-500 text-[12px] text-[14px]">
                        <?php echo $created_at ?>
                    </span>
                </div>

                <div class="mx-3">
                    <i class="fas fa-reply-all -rotate-90"></i>
                </div>

                <!-- Comment text -->
                <div class="p-3 pt-0 w-full text-red-600 text-[15px] md:text-[18px] leading-relaxed">
                    <p><?php echo $comment ?></p>
                    <span class="flex items-center text-gray-500 text-[12px] text-[14px]">
                        <?php echo $created_at_comment ?>
                    </span>
                </div>

                <!-- Actions -->
                <div class="flex justify-center p-4 border-t border-gray-100 gap-3">
                    <button class="flex items-center justify-center px-4 py-2 rounded-lg font-medium text-sm bg-green-100 text-green-600 hover:bg-green-200 hover:-translate-y-0.5 transition-all"
                        onclick="openModal('approve', <?php echo $id ?>)">
                        <i class="fas fa-check-circle mr-2"></i> Allowed
                    </button>
                    <button class="flex items-center justify-center px-4 py-2 rounded-lg font-medium text-sm bg-pink-100 text-pink-600 hover:bg-pink-200 hover:-translate-y-0.5 transition-all"
                        onclick="openModal('delete', <?php echo $id ?>)">
                        <i class="fas fa-trash-alt mr-2"></i> Delete
                    </button>
                </div>
            </div>
            <!-- End comment card -->

            <!-- Approve Modal -->
            <div id="approveModal<?php echo $id ?>" class="fixed inset-0 bg-black bg-opacity-60 flex justify-center items-center z-50 opacity-0 invisible transition-all duration-300">
                <div class="bg-white rounded-2xl w-11/12 max-w-md p-8 shadow-2xl transform translate-y-5 transition-transform duration-300">
                    <div class="w-[50px] h-[50px] rounded-full flex items-center justify-center mx-auto mb-6 bg-blue-100 text-blue-500 text-2xl">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h3 class="text-center font-semibold text-gray-800 text-lg mb-2">Comment Approval</h3>
                    <p class="text-center text-gray-500 text-sm mb-6 leading-relaxed">Are you sure you want to approve this comment? It will be visible to all users.</p>

                    <div class="flex justify-center gap-4">
                        <button class="px-6 py-2 rounded-lg bg-gray-200 text-gray-500 hover:bg-gray-300 transition-all"
                            onclick="closeModal('approve', <?php echo $id ?>)">Cancel</button>
                        <button class="px-6 py-2 rounded-lg bg-blue-500 text-white hover:bg-blue-600 transition-all"
                            onclick="approveComment(<?php echo $id ?>)">
                            Confirm
                        </button>
                    </div>
                </div>
            </div>

            <!-- Delete Modal -->
            <div id="deleteModal<?php echo $id ?>" class="fixed inset-0 bg-black bg-opacity-60 flex justify-center items-center z-50 opacity-0 invisible transition-all duration-300">
                <div class="bg-white rounded-2xl w-11/12 max-w-md p-8 shadow-2xl transform translate-y-5 transition-transform duration-300">
                    <div class="w-[50px] h-[50px] rounded-full flex items-center justify-center mx-auto mb-6 bg-pink-100 text-pink-500 text-2xl">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <h3 class="text-center font-semibold text-gray-800 text-lg mb-2">Delete Comment</h3>
                    <p class="text-center text-gray-500 text-sm mb-6 leading-relaxed">Are you sure you want to delete this comment? This action cannot be undone.</p>
                    <div class="flex justify-center gap-4">
                        <button class="px-6 py-2 rounded-lg bg-gray-200 text-gray-500 hover:bg-gray-300 transition-all"
                            onclick="closeModal('delete', <?php echo $id ?>)">Cancel</button>
                        <button class="px-6 py-2 rounded-lg bg-pink-500 text-white hover:bg-pink-600 transition-all"
                            onclick="deleteComment(<?php echo $id_com ?>, <?php echo $id ?>)">
                            Confirm
                        </button>

                    </div>
                </div>
            </div>

        <?php
        }
    } else {
        ?>
        <p class="text-center text-gray-500 italic py-3 border rounded shadow-sm bg-white">
            No reports have been obtained
        </p>
    <?php
    }
    ?>
    <script>
        function openModal(type, id) {
            const modal = document.getElementById(`${type}Modal${id}`);
            modal.classList.add('opacity-100', 'visible');
            modal.classList.remove('opacity-0', 'invisible');
            document.body.style.overflow = 'hidden';
        }

        function closeModal(type, id) {
            const modal = document.getElementById(`${type}Modal${id}`);
            modal.classList.add('opacity-0', 'invisible');
            modal.classList.remove('opacity-100', 'visible');
            document.body.style.overflow = 'auto';
        }

        window.addEventListener('click', (e) => {
            if (e.target.classList.contains('fixed')) {
                e.target.classList.add('opacity-0', 'invisible');
                e.target.classList.remove('opacity-100', 'visible');
                document.body.style.overflow = 'auto';
            }
        });

        function approveComment(id) {
            closeModal('approve', id);

            // Scroll to specific element
            const target = document.getElementById('msg');
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }

            fetch("approve_report.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: "id=" + id
                })
                .then(response => response.text())
                .then(data => {
                    if (data.trim() === "success") {
                        $('#msg').text('Notification was sent!').removeClass().addClass('alert alert-success text-center mb-0 mt-3 py-2');
                        setTimeout(() => {
                            $('#msg').fadeOut('slow', function() {
                                $(this).text('').removeAttr('class').show();
                            });
                        }, 3000);
                    } else {
                        $('#msg').text('Notification was not sent!').removeClass().addClass('alert alert-danger text-center mb-0 mt-3 py-2');
                        setTimeout(() => {
                            $('#msg').fadeOut('slow', function() {
                                $(this).text('').removeAttr('class').show();
                            });
                        }, 3000);
                    }
                })
                .catch(error => alert("AJAX error: " + error));
        }





        function deleteComment(id_com, id) {
            closeModal('delete', id);

            // Scroll to specific element
            const target = document.getElementById('msg');
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }

            // Send both id and id_com
            fetch("notapprove_report.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: "id=" + encodeURIComponent(id) + "&id_com=" + encodeURIComponent(id_com)
                })
                .then(response => response.text())
                .then(data => {
                    if (data.trim() === "success") {
                        $('#msg').text('Notification was sent!').removeClass().addClass('alert alert-success text-center mb-0 mt-3 py-2');
                        setTimeout(() => {
                            $('#msg').fadeOut('slow', function() {
                                $(this).text('').removeAttr('class').show();
                            });
                        }, 3000);
                    } else {
                        $('#msg').text('Notification was not sent!').removeClass().addClass('alert alert-danger text-center mb-0 mt-3 py-2');
                        setTimeout(() => {
                            $('#msg').fadeOut('slow', function() {
                                $(this).text('').removeAttr('class').show();
                            });
                        }, 3000);
                    }
                })
                .catch(error => alert("AJAX error: " + error));
        }
    </script>
</body>

</html>