<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <?php if ($action == "edit") : ?>
            <div class="modal-header">
                <h4 class="modal-title"><?php echo  $users_data['display_name']; ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="" id="partial_form" method="POST" action="<?php echo base_url("member/update/"); ?>" accept-charset="utf-8" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="text" name="id" value="<?php echo $users_data['id'] ?>" hidden>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="from_weight"><?php echo lang('member_column_name'); ?></label>
                                <input type="text" class="form-control" name="display_name" id="display_name" value="<?php echo $users_data['display_name'] ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="from_weight"><?php echo lang('member_column_username'); ?></label>
                                <input type="text" class="form-control" name="username" id="username" value="<?php echo $users_data['username'] ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="from_weight"><?php echo lang('member_column_phone'); ?></label>
                                <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $users_data['phone'] ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="from_weight"><?php echo lang('member_column_email'); ?></label>
                                <input type="email" class="form-control" name="email" id="email" value="<?php echo $users_data['email'] ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" name="banned" id="banned" value="1" <?php if ($users_data['banned'] == 1) : ?> <?php echo "checked"; ?> <?php endif ?>>
                            <label for="banned">
                                <?php echo lang('member_column_ban'); ?>
                            </label>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label for="from_weight"><?php echo lang('member_column_ban_msg'); ?></label>
                        <textarea name="ban_message" id="ban_message" class="form-control" rows="3"><?php echo $users_data['ban_message'] ?></textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('bf_action_cancel'); ?></button>
                    <button type="submit" class="btn btn-primary"><?php echo lang('bf_action_save'); ?></button>
                </div>
            </form>
        <?php endif; ?>
        <?php if ($action == "view") : ?>
            <div class="modal-header">
                <h4 class="modal-title"><?php echo  $users_data['display_name']; ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><?php echo lang('member_column_name'); ?> : <strong><?php echo  $users_data['display_name']; ?></strong></li>
                            <li class="list-group-item"><?php echo lang('member_column_username'); ?> : <strong><?php echo  $users_data['username']; ?></strong>
                            </li>
                            <li class="list-group-item"><?php echo lang('member_column_email'); ?> : <strong><?php echo  $users_data['email']; ?></strong>
                            </li>
                            <li class="list-group-item"><?php echo lang('member_column_phone'); ?>  : <strong><?php echo  $users_data['phone']; ?></strong>
                            </li>
                            <li class="list-group-item"><?php echo lang('member_column_address'); ?>  : <strong><?php echo  $users_data['address']; ?></strong>
                            </li>
                            <li class="list-group-item"><?php echo lang('member_column_provider'); ?>  : <strong><?php echo  $users_data['provider']; ?></strong></li>
        
                            <li class="list-group-item"><?php echo lang('member_column_create_date'); ?>  : <strong>
                                    <?php echo user_time(strtotime($users_data['created_on']), null, 'd/m/Y H:i');
                                    ?>
                                </strong>
                            </li>
                        </ul>
                    </div>
                    <div class="col">
                        <div class="card">
                            <?php if (isset($users_data['image']) && !empty($users_data['image'])) : ?>
                                <a href="<?php echo $users_data['image']; ?>" data-lightbox="<?php echo $users_data['id']; ?>" data-title="<?php echo $users_data['display_name']; ?>">
                                    <img src="<?php echo $users_data['image']; ?>" class="card-img-top">
                                </a>
                            <?php else : ?>
                                <p></p>
                                <p class="text-center">No Photo</p>
                                <p></p>
                            <?php endif; ?>

                        </div>

                        <?php if ($users_data['banned'] == true) : ?>
                            <span class="badge badge-danger"> <?php echo lang('member_column_ban'); ?></span>
                        <?php endif; ?>
                        <p class="card-text"><?php echo  $users_data['ban_message']; ?></p>

                    </div>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('bf_action_cancel'); ?></button>
            </div>
        <?php endif; ?>
    </div>
</div>
<script rel="javascript" type="text/javascript">
    $(document).ready(function() {
        $("#partial_form").validate({
            submitHandler: function(form) {
                $(form).Submit();
            }
        });
    });
</script>