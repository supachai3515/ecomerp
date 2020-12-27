<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <?php if ($action == "edit") : ?>
            <div class="modal-header">
                <h4 class="modal-title"><?php echo  $new_car_data['name']; ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="" id="partial_form" method="POST" action="<?php echo base_url("new_car/update/"); ?>" accept-charset="utf-8" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="text" name="id" value="<?php echo $new_car_data['id'] ?>" hidden>
                    <div class="row">
                        <div class="col"></div>
                        <div class="col">
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" name="feature" id="feature" value="1" <?php if ($new_car_data['feature'] == 1) : ?> <?php echo "checked"; ?> <?php endif ?>>
                                    <label for="feature">
                                        <?php echo lang('new_car_column_feature'); ?>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" name="popular" id="popular" value="1" <?php if ($new_car_data['popular'] == 1) : ?> <?php echo "checked"; ?> <?php endif ?>>
                                    <label for="popular">
                                        <?php echo lang('new_car_column_popular'); ?>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col"></div>
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
                <h4 class="modal-title"><?php echo  $new_car_data['name']; ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><?php echo lang('new_car_column_name'); ?> : <strong><?php echo  $new_car_data['name']; ?></strong></li>
                            <li class="list-group-item"><?php echo lang('new_car_column_brand'); ?> : <strong><?php echo  $new_car_data['brand']; ?></strong>
                            </li>
                            <li class="list-group-item"><?php echo lang('new_car_column_model'); ?> : <strong><?php echo  $new_car_data['model']; ?></strong>
                            </li>
                            <li class="list-group-item"><?php echo lang('new_car_column_color'); ?> :
                                <strong style="color:<?php echo  $new_car_data['color']; ?>;"><?php echo  $new_car_data['color']; ?></strong>
                            </li>
                            <li class="list-group-item"><?php echo lang('new_car_column_yomf'); ?> : <strong><?php echo  $new_car_data['yomf']; ?></strong>
                            </li>
                            <li class="list-group-item"><?php echo lang('new_car_column_gear'); ?> : <strong><?php echo  $new_car_data['gear']; ?></strong></li>
                            <li class="list-group-item"><?php echo lang('new_car_column_price'); ?> : <strong><?php echo number_format($new_car_data['price'], 2);  ?></strong></li>
                            <li class="list-group-item"><?php echo lang('new_car_column_email'); ?> : <strong><?php echo  $new_car_data['email']; ?></strong></li>
                            <li class="list-group-item"><?php echo lang('new_car_column_topic'); ?> : <strong><?php echo  $new_car_data['topic']; ?></strong></li>
                            <li class="list-group-item"><?php echo lang('new_car_column_facebook'); ?> : <strong><?php echo  $new_car_data['facebook']; ?></strong></li>
                            <li class="list-group-item"><?php echo lang('new_car_column_popular'); ?> :
                                <?php if ($new_car_data['popular'] == true) : ?>
                                    <span class="text-success"><i class="fas fa-check-circle"></i></span>
                                <?php endif; ?>
                            </li>
                            <li class="list-group-item"><?php echo lang('new_car_column_feature'); ?> :
                                <?php if ($new_car_data['feature'] == true) : ?>
                                    <span class="text-success"><i class="fas fa-check-circle"></i></span>

                                <?php endif; ?>
                            </li>
                            <li class="list-group-item"><?php echo lang('new_car_column_mile'); ?> : <strong><?php echo  number_format($new_car_data['mile'], 0);  ?></strong></li>
                            <li class="list-group-item"><?php echo lang('new_car_column_create_date'); ?> : <strong>
                                    <?php echo user_time(strtotime($new_car_data['date']), null, 'd/m/Y H:i');
                                    ?>
                                </strong>
                            </li>
                        </ul>
                    </div>
                    <div class="col">
                        <div class="card">
                            <?php if (isset($new_car_data['photo']) && !empty($new_car_data['photo'])) : ?>
                                <a href="<?php echo $new_car_data['photo']; ?>" data-lightbox="<?php echo $new_car_data['id']; ?>" data-title="<?php echo $new_car_data['name']; ?>">
                                    <img src="<?php echo $new_car_data['photo']; ?>" class="card-img-top">
                                </a>
                            <?php else : ?>
                                <p></p>
                                <p class="text-center">No Photo</p>
                                <p></p>
                            <?php endif; ?>
                        </div>

                        <?php foreach ($new_car_data['image_list'] as $row) : ?>
                            <?php if (isset($row['photo'])) : ?>
                                <a href="<?php echo $row['photo']; ?>" data-lightbox="<?php echo $new_car_data['id'] . '-photo'; ?>" data-title="<?php echo $new_car_data['name']; ?>">
                                    <img src="<?php echo $row['photo']; ?>" class="img-thumbnail" style="width: 80px;">
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <p>
                            <strong><?php echo lang('new_car_column_des'); ?>  :</strong><br>
                            <?php echo  $new_car_data['des']; ?>
                        </p>
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