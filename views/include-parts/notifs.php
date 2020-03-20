<section class="notifs">
    <?php         
    if (count($_SESSION['success'])>0):
        foreach($_SESSION['success'] as $notif):
    ?>
            <div class="notif notif-<?= $notif["type"] ?>">
                <div class="notifIcon">
                    <i class="fas <?= $notif["icon"] ?>"></i>
                </div>
                <div>
                    <?= $notif["text"] ?>
                </div>
            </div>
    <?php 
        endforeach;
    endif; 
    ?>
</section>