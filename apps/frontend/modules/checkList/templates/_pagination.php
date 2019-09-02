<div class="pagination">
    <?php if ($pager->haveToPaginate()): ?>
        <ul class="pagination">
            <li class="page-item page-pre">
                <a class="page-link" href="<?php echo url_for('checkList/index') ?>?page=1">
                    <i class="ti-angle-double-left"></i>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="<?php echo url_for('checkList/index') ?>?page=<?php echo $pager->getPreviousPage() ?>">
                    <i class="ti-angle-left"></i>
                </a>
            </li>
            <?php foreach ($pager->getLinks() as $page): ?>
                <?php if ($page == $pager->getPage()): ?>
                    <li class="page-item active">
                        <span class="page-link"><?php echo $page ?></span>
                    </li>
                <?php else: ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo url_for('checkList/index') ?>?page=<?php echo $page ?>"><?php echo $page ?></a>
                    </li >
                <?php endif; ?>

            <?php endforeach; ?>

            <li class="page-item">
                <a  class="page-link" href="<?php echo url_for('checkList/index') ?>?page=<?php echo $pager->getNextPage() ?>">
                    <i class="ti-angle-right"></i>
                </a>
            </li>
            <li class="page-item page-next">
                <a class="page-link" href="<?php echo url_for('checkList/index') ?>?page=<?php echo $pager->getLastPage() ?>">
                    <i class="ti-angle-double-right"></i>
                </a>
            </li>
        </ul>
    <?php endif; ?>
</div>