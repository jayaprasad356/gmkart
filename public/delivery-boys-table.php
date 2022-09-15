<section class="content-header">
    <h1>
        Delivery Boys /
        <small><a href="home.php"><i class="fa fa-home"></i> Home</a></small>
    </h1>
    <ol class="breadcrumb">
        <a class="btn btn-block btn-default" href="add-delivery-boys.php"><i class="fa fa-plus-square"></i> Add New delivery boy</a>
    </ol>


</section>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id='users_table' class="table table-hover" data-toggle="table" data-url="api-firebase/get-bootstrap-table-data.php?table=deliveryboys" data-page-list="[5, 10, 20, 50, 100, 200]" data-show-refresh="true" data-show-columns="true" data-side-pagination="server" data-pagination="true" data-search="true" data-trim-on-search="false" data-filter-control="true" data-query-params="queryParams" data-sort-name="id" data-sort-order="desc" data-show-export="false" data-export-types='["txt","excel"]' data-export-options='{
                            "fileName": "students-list-<?= date('d-m-Y') ?>",
                            "ignoreColumn": ["operate"] 
                        }'>
                            <thead>
                                <tr>
                                    <th data-field="id" data-sortable="true">ID</th>
                                    <th data-field="name" data-sortable="true">Name</th>
                                    <th data-field="dob" data-sortable="true">Date Of Birth</th>
                                    <th data-field="mobile" data-sortable="true">Mobile</th>
                                    <th data-field="pincode" data-sortable="true">Pincode</th>
                                    <th data-field="status" data-sortable="true">Status</th>
                                    <th data-field="action" data-sortable="true">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- /.box-body -->
                <!--  -->