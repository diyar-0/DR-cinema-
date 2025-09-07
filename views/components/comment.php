    <style>
        .more-link {
            color: blue;
            cursor: pointer;
            margin-left: 5px;
        }
    </style>

    <div class="bg-gray-900  mx-2 mt-3 rounded-xl p-4">
        <h2 class=" text-center bg-gray-950  rounded-2 p-2 text-lg md:text-2xl lg:text-3xl font-bold text-gray-200 mb-1"> Comments</h2>
        <div class="flex flex-column d-md-flex flex-md-row space-x-3 gap-x-3">
            <div class="flex-1 col-lg-12 pb-0 max-h-[510px] overflow-y-auto">
                <?php
                // $film_id = intval($_GET['film_id']);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                // لیستی وشەی قەدەغە
                                    $banned_words = [
    'fuck','sex','porn','xxx','xnxx','xlxx','xmxx','ass','dick','pussy','anal','gay','suck','nude',
    'کان','گان','قن','قون','کیر','مەمک','قوز','جسم','سیکسی','سێکسی','سیکسي','سکسی','سکسي','ker','chir','kir','qun','qwn','qn','qwz','quz','mamk','3aywan','sagbab','7iz','3iz','swk','maza','سوک','مەزە',
    'كس','شرموطة','نيك','عاهرة','كلب','زبر','فرج','طيز','مص','لحس','لعق','بزاز','مؤخرة',
    'kiss','sharmota','neek','3ahara','kalb','zabr','farj','teez','gan','mos','lahs','la3q','bazzaz','moakhra',
    'f*ck','s3x','p0rn','x*x','d1ck','p*ssy','an*l','g@y','s*ck','n*de'
      ];
                $where_conditions = array_map(function ($word) {
                    return "LOWER(comment) LIKE '%" . strtolower($word) . "%'";
                }, $banned_words);

                $where_sql = implode(' OR ', $where_conditions);
                // تەنها ئەگەر هیچ وشەی قەدەغە نیە، +1 بکە
                $sql = "UPDATE comments c SET c.allowed = CASE
    WHEN EXISTS (SELECT 1 FROM report_comment r WHERE r.id_comment = c.id AND LEFT(r.answer_admin, 5) = 'Thank')THEN 0 ELSE 1 END WHERE c.film_id = $film_id AND c.allowed = 0 AND  NOT ($where_sql)";

                $conn->query($sql);


                // AND NOT ($where_sql)
                $sql = "SELECT * FROM comments WHERE film_id = $film_id AND allowed=1 AND deletes !=1  ORDER BY created_at DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Create an array for the data
                    $data = [];
                    while ($row_comment = $result->fetch_assoc()) {
                        $comment_id = $row_comment['id'];
                        $film_id = $row_comment['film_id'];
                        $user_comment_id = $row_comment['user_id'];
                        $comment = $row_comment['comment'];
                ?>
                        <div id="result" class="hover:bg-opacity-50 py-2 my-2 bg-gray-950 bg-opacity-70 rounded-3 p-3 border-dark result"
                            data-id="<?= $comment_id ?>"
                            data-user-id="<?= $user_comment_id ?>">




                            <div class="flex items-center align-items-center justify-content-start mb-1">
                                <?php
                                $first_letter = !empty($row_comment['picture'])
                                    ? ''
                                    : strtoupper(substr($row_comment['name_user'], 0, 1));
                                ?>
                                <?php if (!empty($row_comment['picture'])): ?>
                                    <img class="rounded-full w-9 h-9" src="<?php echo $row_comment['picture']; ?>" alt="">
                                <?php else: ?>
                                    <div translate="no" class="rounded-full w-9 h-9 flex items-center justify-center bg-gray-600 text-white font-bold">
                                        <?php echo $first_letter; ?>
                                    </div>
                                <?php endif; ?>

                                <span translate="no" class="font-semibold mx-2 text-light"><?php echo $row_comment['name_user']; ?></span>
                                <span class="time-ago text-gray-400 text-[11px]" data-time="<?php echo $row_comment['created_at']; ?>"></span>
                            </div>

                            <div class="comment-bubble border-b border-dark bg-opacity-50 px-0 py-2">
                                <p id="textParagraph<?php echo $row_comment['id'] ?>" class="comment-text m-0 text-light fs-6">
                                    <?php echo $row_comment['comment'] ?>
                                </p>
                            </div>

                            <div class="my-2 flex space-x-2">
                                <!-- like / dislike ... -->
                                <?php
                                if (isset($_SESSION['username'])  && $_SESSION['user_id'] == true) {
                                ?>
                                    <button title="Like comment"
                                        class="like-btn rounded-2 flex items-center justify-center text-blue-500 hover:scale-105 hover:shadow-md transition-transform duration-300"
                                        data-id="<?php echo $row_comment['id'] ?>">
                                        <span class="like-count text-sm font-bold mx-1 text-blue-400">0</span>
                                        <i class="far fa-thumbs-up text-md mb-1"></i>
                                    </button>
                                <?php } else { ?>
                                    <button title="Like comment"
                                        class="like-btn rounded-2 flex items-center justify-center text-blue-500 hover:scale-105 hover:shadow-md transition-transform duration-300"
                                        data-id="<?php echo $row_comment['id'] ?>" data-bs-toggle="modal" data-bs-target="#must_login_report">
                                        <span class="like-count text-sm font-bold mx-1 text-blue-400">0</span>
                                        <i class="far fa-thumbs-up text-md mb-1"></i>
                                    </button>
                                <?php } ?>

                                <?php if (isset($_SESSION['username'])  && $_SESSION['user_id'] == true) { ?>
                                    <button title="Dislike comment"
                                        class="dislike-btn rounded-2 flex items-center justify-center text-red-500 hover:scale-105 hover:shadow-md transition-transform duration-300"
                                        data-id="<?php echo $row_comment['id'] ?>">
                                        <span class="dislike-count text-sm font-bold mx-1 text-red-400">0</span>
                                        <i class="far fa-thumbs-down text-red-400 text-md mb-1"></i>
                                    </button>
                                <?php } else { ?>
                                    <button title="Dislike comment"
                                        class="dislike-btn rounded-2 flex items-center justify-center text-red-500 hover:scale-105 hover:shadow-md transition-transform duration-300"
                                        data-id="<?php echo $row_comment['id'] ?>" data-bs-toggle="modal" data-bs-target="#must_login_report">
                                        <span class="dislike-count text-sm font-bold mx-1 text-red-400">0</span>
                                        <i class="far fa-thumbs-down text-red-400 text-md mb-1"></i>
                                    </button>
                                <?php } ?>

                                <?php include("report_comment.php");

                                // connection


                                // check if button clicked
                                if (isset($_POST['confirmDelete'])) {
                                    $comment_id_FORM = intval($_POST['comment_id_FORM']);

                                    $sql = "UPDATE comments SET deletes=1 WHERE id = $comment_id_FORM";

                                    if ($conn->query($sql) === TRUE) {
                                        // ریفرێشکردنی پەیجەکە
                                        echo "<script>window.location.href = window.location.href;</script>";
                                        // exit();
                                    }
                                }



                                ?>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal<?php echo $comment_id; ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content rounded-4 shadow-lg border-0">

                                    <!-- Header -->
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title fw-bold text-danger">
                                            <i class="bi bi-trash3-fill me-2"></i> Delete Comment
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Body -->
                                    <div class="modal-body text-center py-4">
                                        <p class="fs-5 mb-0 text-muted">
                                            Are you sure you want to permanently delete this comment?
                                        </p>
                                    </div>

                                    <!-- Footer -->
                                    <div class="modal-footer border-0 d-flex justify-content-center gap-3 pb-4">
                                        <button class="btn btn-light w-[40%] px-4 rounded-pill shadow-sm" data-bs-dismiss="modal">
                                            <i class="bi bi-x-circle me-1"></i> Cancel
                                        </button>

                                        <form method="post" action="" class="d-inline w-[40%]">
                                            <input type="hidden" name="comment_id_FORM" value="<?php echo $comment_id; ?>">
                                            <button type="submit" name="confirmDelete" class="btn btn-danger w-[100%] px-4 rounded-pill shadow-sm">
                                                <i class="bi bi-trash3 me-1"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                const commentDivs = document.querySelectorAll(".result");

                                commentDivs.forEach(div => {
                                    const sessionUserId = "<?php echo $_SESSION['user_id']; ?>";
                                    const commentUserId = div.getAttribute("data-user-id");
                                    const commentId = div.getAttribute("data-id"); // id کۆمێنتەکە
                                    let holdTimeout;

                                    div.addEventListener("mousedown", function() {
                                        if (sessionUserId === commentUserId) {
                                            holdTimeout = setTimeout(() => {
                                                // هەر کۆمێنت مۆدالی تایبەتی خۆی هەیە
                                                const modalId = "deleteModal" + commentId;
                                                const deleteModal = new bootstrap.Modal(document.getElementById(modalId));
                                                deleteModal.show();

                                                // دانانی comment id بۆ دکمه‌ی delete
                                                const confirmBtn = document.querySelector(`#${modalId} input[name="confirmDelete"]`);
                                                if (confirmBtn) {
                                                    confirmBtn.setAttribute("data-id", commentId);
                                                }
                                            }, 500);
                                        }
                                    });

                                    div.addEventListener("mouseup", function() {
                                        clearTimeout(holdTimeout);
                                    });

                                    div.addEventListener("mouseleave", function() {
                                        clearTimeout(holdTimeout);
                                    });
                                });
                            });
                        </script>



                    <?php }
                } else {
                    ?>
                    <div class="d-flex ">
                        <img class="w-[50px] h-[50px] md:w-[80px] md:h-[80px] mx-auto my-2" src="https://cdn-icons-png.flaticon.com/512/9582/9582626.png" alt="">
                    </div>
                <?php }  ?>
            </div>
        </div>
        <?php include("send_comments.php"); ?>
    </div>

    <script>
        function timeAgo(date) {
            const now = new Date();
            const ago = new Date(date);
            const seconds = Math.floor((now - ago) / 1000);

            const intervals = {
                year: 31536000,
                month: 2592000,
                week: 604800,
                day: 86400,
                hour: 3600,
                minute: 60,
                second: 1
            };

            for (const unit in intervals) {
                const value = Math.floor(seconds / intervals[unit]);
                if (value >= 1) {
                    return value + ' ' + unit + (value > 1 ? 's' : '') + ' ago';
                }
            }
            return 'just now';
        }

        // بۆ نموونە:
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.time-ago').forEach(function(el) {
                const timestamp = el.getAttribute('data-time');
                el.textContent = timeAgo(timestamp);
            });
        });
    </script>