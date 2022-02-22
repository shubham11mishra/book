<?= $this->extend('/layout/default') ?>
<?= $this->section('title') ?>
this is title
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<table>
    <thead>
        <tr>
            <th scope="col">S.no</th>
            <th scope="col">
                title
            </th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($books as $book) : ?>
            <tr>
                <th scope="row">1</th>
                <td>
                    <?= $book->title  ?>
                </td>
            </tr>


        <?php endforeach  ?>
    </tbody>
</table>


<?= $this->endSection() ?>