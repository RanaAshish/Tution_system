<div class="box-cell">
    <div class="box-inner padding">
        <?php
            if($this->session->flashdata('succ') != null){
        ?>
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?=$this->session->flashdata('succ')?>
        </div>
        <?php
            }
        ?>
        <div class="page-header-default">
            <div class="page-header-content">
                <div class="page-title">
                    <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Tutions</h4>
                    <a class="heading-elements-toggle"><i class="icon-more"></i></a></div>
            </div>
            <div class="breadcrumb-line"><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
                <ul class="breadcrumb">
                    <li><a href="admin/tutions"><i class="icon-home2 position-left"></i> Home</a></li>
                    <li class="active">Tutions</li>
                </ul>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                Tuition List
                <a href="admin/tutions/add" class="btn btn-addon btn-primary waves-effect pull-right">
                    <i class="fa fa-plus"></i>Add
                </a>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped b-t b-b" id="tutionlst">
                        <thead>
                        <th>Class Name</th>
                        <th>Class Admin</th>
                        <th></th>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        $('#tutionlst').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: 'admin/api/tutions/get',
                type: 'post'
            },
            "aoColumnDefs": [
                {'bSortable': false, 'aTargets': [2]}
            ]

        });
    })
</script>
