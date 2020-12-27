<div class="card">
    <div class="card-header">
        <h3 class="card-title"><?php  echo  lang('loan_list');?></h3>
        <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 200px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                    </span>
                </div>
                <input type="text" class="form-control float-right" id="date_search" name='date_search'>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatable_list" data-url="<?php echo site_url('loan/search'); ?>" class="table table-sm table-bordered table-striped" style="width: 100%;">
                <thead>
                    <tr>
                        <th><?php  echo  lang('loan_column_date'); ?></th>
                        <th><?php  echo  lang('loan_column_type'); ?></th>
                        <th><?php  echo  lang('loan_column_name'); ?></th>
                        <th><?php  echo  lang('loan_column_phone'); ?></th>
                        <th><?php  echo  lang('loan_column_amount'); ?></th>
                        <th><?php  echo  lang('loan_column_active'); ?></th>
                        <th>Action</th>
                    </tr>
                </thead>

            </table>
            </table>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<div class="modal fade" id="popupModal" Team="dialog" aria-labelledby="popupModal" aria-hidden="true" data-backdrop="static">
	<div id="popupContainer">
	</div>
</div>