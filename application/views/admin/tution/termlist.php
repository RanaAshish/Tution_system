<div class="box-cell">
    <div class="box-inner padding">
        <div class="panel panel-default">
            <div class="panel-heading">
                Term List
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="termlst">
                        <thead>
                            <th>Id</th>
                            <th>Name</th>
                            <th></th>
                        </thead>
                        <tbody>
                            <?php
                            $cnt = 1;
                            foreach ($term as $row) {
                                ?>
                                <tr>
                                    <td><?= $cnt++ ?></td>
                                    <td><?= $row['term_name'] ?></td>
                                    <td><a href="admin/tutions/shift/<?=$row['id']?>" title="View shifts"><i class="fa fa-angle-double-right"></i></a></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        $('#termlst').DataTable();
    });

</script>