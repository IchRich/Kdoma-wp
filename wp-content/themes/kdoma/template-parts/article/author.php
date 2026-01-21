<div class="Designer_Flex_GridsB">

    <div class="Designer_Flex_Info">
        <h1><?= get_field('author_name'); ?></h1>
        <p><?= get_field('author_role'); ?></p>
    </div>
    <img src="<?= get_field('author_photo')['url']; ?>">
</div>