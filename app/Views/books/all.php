<?= $this->extend('/layout/default') ?>
<?= $this->section('title') ?>
this is title
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-3 fixed">
        <?= $this->include('books/filter') ?>

    </div>
    <div class="col-9">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">S.no</th>
                    <th scope="col">
                        title
                    </th>
                    <th>Description</th>
                    <th>author</th>
                    <th>Price</th>
                </tr>
            </thead>

            <tbody id="booktable">

            </tbody>
        </table>

    </div>

</div>


<article id="loader" style="display: none;" aria-busy="true"></article>
<!-- <button id="loader" style="display: none;" aria-busy="true">Please wait…</button> -->
<!-- <?php //$pager->links() 
        ?> -->


<script>
    $(document).ready(function() {

        var currentPage = 1;
        let pageCount = <?= $pager->getPageCount() ?>;


        loadList(currentPage);

        $(window).scroll(function() {


            if ($(document).height() - $(this).height() == $(this).scrollTop()) {

                if (currentPage < pageCount) {
                    currentPage++;
                    loadList(currentPage);

                } else {
                    console.log('end');
                }
            }
        });


        function loadList(pagenumber) {
            let minimum_price = $('#hidden_minimum_price').val();
            let maximum_price = $('#hidden_maximum_price').val();
            // alert(pagenumber);
            console.log(minimum_price, maximum_price);
            $("#loader").show();

            $.ajax({
                url: "<?= site_url('/books/pegination') ?>",
                type: "post",
                //contentType: "application/json; charset=utf-8",
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                data: {
                    content: 'true',
                    pagenumber: pagenumber,
                    minimum_price: minimum_price,
                    maximum_price: maximum_price
                },
                cache: true,
                dataType: "json",
                success: function(response) {
                    $("#loader").hide();
                    //  $("#booktable").append(msg);
                    //$("#booktable").html(msg);
                    console.log(response);

                },
                error: function(req, status, error) {
                    $("#loader").hide();

                }
            });

        }

        $('#price_range').slider({
            range: true,
            min: 0,
            max: 1000,
            values: [0, 1000],
            step: 10,
            stop: function(event, ui) {
                $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
                $('#hidden_minimum_price').val(ui.values[0]);
                $('#hidden_maximum_price').val(ui.values[1]);
                loadList(currentPage);
            }
        });


    });
</script>
<?= $this->endSection() ?>