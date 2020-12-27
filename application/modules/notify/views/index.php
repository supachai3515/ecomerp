<table class="table">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">General</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <form class="" id="send_noti" method="POST" action="<?php echo base_url("notify/send/"); ?>" accept-charset="utf-8" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="inputName">Title</label>
                        <input type="text" id="inputName" name="title" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Body</label>
                        <textarea id="inputDescription" name="body" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Select</label>
                        <select class="form-control" id='purpose' name="purpose">
                            <option value="0">Send to</option>
                            <option value="1">Send all</option>
                        </select>
                    </div>
                    <div class="form-group" id='multi'>
                        <label>User</label>
                        <select id="user_select" class="js-data-example-ajax" name="users_token[]" multiple="multiple" style="width: 100%;">
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" value="Send" class="btn btn-success float-right">
                        </div>
                    </div>
                </form>

                <!-- <div class="form-group">
                    <label for="inputStatus">Status</label>
                    <select class="form-control custom-select">
                        <option selected disabled>Select one</option>
                        <option>On Hold</option>
                        <option>Canceled</option>
                        <option selected>Success</option>
                    </select>
                </div> -->
                <!-- <div class="form-group">
                    <label for="inputClientCompany">Client Company</label>
                    <input type="text" id="inputClientCompany" class="form-control" value="Deveint Inc">
                </div> -->
                <!-- <div class="form-group">
                    <label for="inputProjectLeader">Project Leader</label>
                    <input type="text" id="inputProjectLeader" class="form-control" value="Tony Chicken">
                </div> -->
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</table>