<?php
/**
 * @var Comment $comment
 */

use models\classes\Comment;

?>

<div class="comment-item">
    <p><?= $comment->getMessage() ?></p>
    <span><?= $comment->getDate() ?></span>
</div>