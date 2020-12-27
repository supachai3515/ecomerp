<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <?php if ($action == "view") : ?>
            <div class="modal-header">
                <h4 class="modal-title"><?php echo  lang('loan_column_member'); ?> : <?php echo  $loan_data['username']; ?>
                    <?php if ($loan_data['banned'] == true) : ?>
                        <span class="badge badge-danger"> <?php echo  lang('loan_column_ban'); ?></span>
                    <?php endif; ?>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><?php echo  lang('loan_column_name'); ?>: <strong><?php echo  $loan_data['name']; ?></strong></li>
                            <li class="list-group-item"><?php echo  lang('loan_column_type'); ?>: <strong><?php echo  $loan_data['type']; ?></strong>
                            </li>
                            <li class="list-group-item"><?php echo  lang('loan_column_phone'); ?>: <strong><?php echo  $loan_data['phone']; ?></strong>
                            </li>
                            <li class="list-group-item"><?php echo  lang('loan_column_amount'); ?>: <strong><?php echo   number_format($loan_data['amount'], 2); ?></strong>
                            </li>
                            <li class="list-group-item"><?php echo  lang('loan_column_created_date'); ?>: <strong>
                                    <?php echo user_time(strtotime($loan_data['created_date']), null, 'd/m/Y H:i');
                                    ?>
                                </strong>
                            </li>
                        </ul>
                    </div>
                    <div class="col">

                        <div class="row" style="padding-bottom: 10px;">
                            <div class="col"><?php echo  lang('loan_column_id_card'); ?></div>
                            <div class="col"><?php echo  lang('loan_column_car_book'); ?></div>
                            <div class="col"><?php echo  lang('loan_column_income'); ?></div>
                        </div>

                        <div class="row" style="padding-bottom: 10px;">
                            <div class="col">
                                <?php if (isset($loan_data['imgidverifi'])) : ?>
                                    <a href="<?php echo $loan_data['imgidverifi']; ?>" data-lightbox="<?php echo $loan_data['id'] . '-imgidverifi'; ?>" data-title="<?php echo $loan_data['display_name']; ?>">
                                        <img src="<?php echo $loan_data['imgidverifi']; ?>" class="img-thumbnail">
                                    </a>
                                    <p></p>
                                <?php endif; ?>

                                <?php foreach ($loan_data['image_list'] as $row) : ?>
                                    <?php if (isset($row['imgidverifi'])) : ?>
                                        <a href="<?php echo $row['imgidverifi']; ?>" data-lightbox="<?php echo $loan_data['id'] . '-imgidverifi'; ?>" data-title="<?php echo $loan_data['display_name']; ?>">
                                            <img src="<?php echo $row['imgidverifi']; ?>" class="img-thumbnail">
                                        </a>
                                        <p></p>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>

                            <div class="col">
                                <?php if (isset($loan_data['imgvhb'])) : ?>
                                    <a href="<?php echo $loan_data['imgvhb']; ?>" data-lightbox="<?php echo $loan_data['id'] . '-imgvhb'; ?>" data-title="<?php echo $loan_data['display_name']; ?>">
                                        <img src="<?php echo $loan_data['imgvhb']; ?>" class="img-thumbnail">
                                    </a>
                                    <p></p>
                                <?php endif; ?>

                                <?php foreach ($loan_data['image_list'] as $row) : ?>
                                    <?php if (isset($row['imgvhb'])) : ?>
                                        <a href="<?php echo $row['imgvhb']; ?>" data-lightbox="<?php echo $loan_data['id'] . '-imgvhb'; ?>" data-title="<?php echo $loan_data['display_name']; ?>">
                                            <img src="<?php echo $row['imgvhb']; ?>" class="img-thumbnail">
                                        </a>
                                        <p></p>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                            <div class="col">
                                <?php if (isset($loan_data['imgincome'])) : ?>
                                    <a href="<?php echo $loan_data['imgincome']; ?>" data-lightbox="<?php echo $loan_data['id'] . '-imgincome'; ?>" data-title="<?php echo $loan_data['display_name']; ?>">
                                        <img src="<?php echo $loan_data['imgincome']; ?>" class="img-thumbnail">
                                    </a>
                                    <p></p>
                                <?php endif; ?>
                                <?php foreach ($loan_data['image_list'] as $row) : ?>
                                    <?php if (isset($row['imgincome'])) : ?>
                                        <a href="<?php echo $row['imgincome']; ?>" data-lightbox="<?php echo $loan_data['id'] . '-imgincome'; ?>" data-title="<?php echo $loan_data['display_name']; ?>">
                                            <img src="<?php echo $row['imgincome']; ?>" class="img-thumbnail">
                                        </a>
                                        <p></p>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
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
            $("#partial_form").on("submit", function() {
                var el = $(this).find(':input[type=submit]');
                el.prop('disabled', true);
                setTimeout(function() {
                    el.prop('disabled', false);
                }, 2000);
            });
        });
    </script>