<div class="button-box">
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#filterModal"
            data-whatever="@getbootstrap"><i class="fa fa-search"></i> Buscar
    </button>
</div>
<div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="floating-labels m-t-40" action="<?php echo url_for($url) ?>"
                  method="post" <?php $formFilter->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

                <div class="modal-header">
                    <h4 class="modal-title" id="filterModalLabel1">New message</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                </div>
                <form class="floating-labels m-t-40" action="<?php echo url_for($url) ?>"
                      method="post" <?php $formFilter->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

                    <div class="modal-body">
                        <?php echo $formFilter ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input class="btn btn-primary" type="submit" value="Filtrar"/>
                    </div>
                </form>
        </div>
    </div>
</div>
<!-- /.modal -->
</div>

<script>
    $('.mydatepicker, #datepicker,.datepicker').datepicker({
        format: 'yyyy-mm-dd'
    });
</script>
