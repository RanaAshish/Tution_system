<div class="box-cell">
    <div class="box-inner padding">
        <div class="panel panel-default">
            <div class="panel-heading">
                Shift List
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="termlst">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th></th>
                        </thead>
                        <tbody>
                            <?php
                            $cnt = 1;
                            foreach ($shift as $row) {
                                ?>
                                <tr>
                                    <td><?= $cnt++ ?></td>
                                    <td><?= $row['name'] ?></td>
                                    <td><?= $row['description'] ?></td>
                                    <td><a href="admin/tutions/student/<?=$row['id']?>" title="view students"><i class="fa fa-users"></i></a></td>
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