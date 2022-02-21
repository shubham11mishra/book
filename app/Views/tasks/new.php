<?= $this->extend('/layout/default') ?>
<?= $this->section('title') ?>
this is title
<?= $this->endSection() ?>

<?= $this->section('content') ?>
content

<?= $this->section('javascript'); ?>
    let a = 2;
    console.log(a);
<?= $this->endSection() ?>


<?= $this->endSection() ?>