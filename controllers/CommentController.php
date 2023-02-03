<?php

namespace controllers;

use controllers\base\WebController;
use models\CommentModel;
use models\ImageModel;
use utils\JsonHelpers;
use utils\Template;

class
CommentController extends WebController
{
    public function add(): void
    {
        if (!isset($_POST['filmID']) || !isset($_POST['message'])) {
            JsonHelpers::stringify(['success' => 'false']);
            exit;
        }

        $commentModel = new CommentModel();
        $success = $commentModel->create($_POST['filmID'], $_POST['message']);

        if (!$success) {
            echo JsonHelpers::stringify(['success' => 'false']);
            exit;
        }

        $content = '';
        $comments = $commentModel->getAllByFilmID($_POST['filmID']);

        foreach ($comments as $comment) {
            $content .= Template::render('views/components/comment.php',['comment' => $comment]);
        }

        echo JsonHelpers::stringify(['success' => 'true', 'content' => $content]);
        exit;
    }
}