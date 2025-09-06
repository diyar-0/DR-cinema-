<?php 
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_view'])) {
                    $film_id2 = intval($_POST['update_view']);

                    // Check if view has already been added in this session
                    if (!isset($_SESSION['viewed_films'])) {
                        $_SESSION['viewed_films'] = [];
                    }

                    if (!in_array($film_id2, $_SESSION['viewed_films'])) {
                        // Update view only once per session
                        $sql = "UPDATE films_db SET views = views + 1 WHERE id = $film_id2";
                        $conn->query($sql);
                        $_SESSION['viewed_films'][] = $film_id2; // Save to session
                        echo json_encode(['status' => 'done']);
                    } else {
                        echo json_encode(['status' => 'already_viewed']);
                    }
                    exit;
                }
                ?>