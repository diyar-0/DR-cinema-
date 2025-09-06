    document.addEventListener("DOMContentLoaded", () => {
        fetch("components/like_dislike.php", {
                method: "POST"
            })
            .then(res => res.json())
            .then(data => {
                document.querySelectorAll("[data-id]").forEach(btn => {
                    const commentId = btn.getAttribute("data-id");
                    const container = btn.closest("#result");
                    const likeIcon = container.querySelector(".like-btn i");
                    const dislikeIcon = container.querySelector(".dislike-btn i");
                    // update counts if available
                    if (data[commentId]) {
                        container.querySelector(".like-count").innerText = data[commentId].likes;
                        container.querySelector(".dislike-count").innerText = data[commentId].dislikes;
                    }
                    // reset all icons to outline
                    likeIcon.classList.remove("fas", "text-blue-600");
                    likeIcon.classList.add("far");
                    dislikeIcon.classList.remove("fas", "text-red-600");
                    dislikeIcon.classList.add("far");
                    // fill icon according to previous userReaction
                    if (data[commentId] && data[commentId].userReaction === "like") {
                        likeIcon.classList.remove("far");
                        likeIcon.classList.add("fas", "text-blue-600");
                    }
                    if (data[commentId] && data[commentId].userReaction === "dislike") {
                        dislikeIcon.classList.remove("far");
                        dislikeIcon.classList.add("fas", "text-red-600");
                    }
                });
            });

        // --- Like / Dislike click ---
        document.querySelectorAll(".like-btn, .dislike-btn").forEach(btn => {
            btn.addEventListener("click", function() {
                const commentId = this.getAttribute("data-id");
                const action = this.classList.contains("like-btn") ? "like" : "dislike";
                const container = this.closest("#result");
                const likeIcon = container.querySelector(".like-btn i");
                const dislikeIcon = container.querySelector(".dislike-btn i");
                fetch("components/like_dislike.php", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        body: `comment_id=${commentId}&action=${action}`
                    })
                    .then(res => res.json())
                    .then(data => {
                        // update counts
                        container.querySelector(".like-count").innerText = data.likes;
                        container.querySelector(".dislike-count").innerText = data.dislikes;

                        // toggle icons
                        if (action === "like") {
                            if (likeIcon.classList.contains("fas")) {
                                likeIcon.classList.remove("fas", "text-blue-600");
                                likeIcon.classList.add("far");
                            } else {
                                likeIcon.classList.remove("far");
                                likeIcon.classList.add("fas", "text-blue-600");
                                dislikeIcon.classList.remove("fas", "text-red-600");
                                dislikeIcon.classList.add("far");
                            }
                        }

                        if (action === "dislike") {
                            if (dislikeIcon.classList.contains("fas")) {
                                dislikeIcon.classList.remove("fas", "text-red-600");
                                dislikeIcon.classList.add("far");
                            } else {
                                dislikeIcon.classList.remove("far");
                                dislikeIcon.classList.add("fas", "text-red-600");
                                likeIcon.classList.remove("fas", "text-blue-600");
                                likeIcon.classList.add("far");
                            }
                        }
                    });
            });
        });
    });
