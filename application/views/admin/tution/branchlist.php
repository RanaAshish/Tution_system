<div class="box-cell">
    <div class="box-inner padding">
        <div class="panel panel-default">
            <div class="panel-heading">
                Branch List
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped b-t b-b" id="branchlst">
                        <thead>
                            <th>#</th>
                            <th>Address</th>
                            <th>Establishment Year</th>
                            <th>Creation Date</th>
                            <th>Status</th>
                            <th></th>
                        </thead>
                        <tbody>
                                    <?php
                                    $cnt = 1;
                                    foreach ($tution as $row) {
                                        ?>
                                        <tr>
                                            <td><?= $cnt++ ?></td>
                                            <td><?= $row['address'] ?></td>
                                            <td><?= $row['establishment_year'] ?></td>
                                            <td><?= date('d M, Y', strtotime($row['creation_time'])) ?></td>
                                            <td><?= $row['is_approved'] == '1' ? 'Approved' : 'Unapproved' ?></td>
                                            <td><a href="admin/tutions/standard/<?=$row['id']?>" data-id="<?= $row['id'] ?>" class="dis_standerd" title="View Standerd"><i class="fa fa-list"></i></a></td>
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
    $(function(){
        $('#branchlst').DataTable({
            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [ 5 ] }
             ]
        });
    });
    
</script>