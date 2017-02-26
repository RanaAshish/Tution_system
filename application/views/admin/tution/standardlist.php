<div class="box-cell">
    <div class="box-inner padding">
        <div class="panel panel-default">
            <div class="panel-heading">
                Standard List
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="standardlst">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th></th>
                        </thead>
                        <tbody>
                            <?php
                            $cnt = 1;
                            foreach ($standard as $row) {
                                ?>
                                <tr>
                                    <td><?= $cnt++ ?></td>
                                    <td><?= $row['name'] ?></td>
                                    <td><a href="admin/tutions/term/<?=$row['bsid']?>" title="view terms" class="dis_term" data-id="<?= $row['bsid'] ?>"><i class="fa fa-angle-double-right"></i></a></td>
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
        $('#standardlst').DataTable({
            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [ 2 ] }
             ]
        });
    });
    
</script>