<div class="box-cell">
    <div class="box-inner padding">
        <div class="panel panel-default">
            <div class="panel-heading">
                Student List
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="termlst">
                        <thead>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Phone Number</th>
                        </thead>
                        <tbody>
                            <?php
                            $cnt = 1;
                            foreach ($student as $row) {
                                ?>
                                <tr>
                                    <td><?= $cnt++ ?></td>
                                    <td><?= $row['first_name'].' '.$row['middle_name'].' '.$row['last_name'] ?></td>
                                    <td><?= $row['primary_phone'] ?></td>
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