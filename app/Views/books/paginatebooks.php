<?php
foreach ($books as $book) : ?>
    <tr>
        <th scope="row">
        </th>
        <td>
            <?= $book->title  ?>
        </td>
        <td><?= $book->description ?></td>
        <td><?= $book->author ?></td>
        <td><?= $book->price ?></td>
    </tr>


<?php

endforeach  ?>


