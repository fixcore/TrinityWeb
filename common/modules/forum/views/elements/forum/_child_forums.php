<table class="table table-hover">
    <?= $this->render('/elements/forum/_forum_header') ?>
    <?= $this->render('/elements/forum/_child_list', ['parent_id' => $parent_id]) ?>
</table>
