<?php
############################################################
# PODCAST GENERATOR
#
# Created by Alberto Betella and Emil Engler
# http://www.podcastgenerator.net
# 
# This is Free Software released under the GNU/GPL License.
############################################################
require 'checkLogin.php';
require '../core/include_admin.php';

if (isset($_GET['change'])) {
    checkToken();
    updateDefaultDescription('../', $_POST['content']);
    header('Location: episodes_manage_desc.php');
    die();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo htmlspecialchars($config['podcast_title']); ?> - <?php echo _('Manage default description'); ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../core/bootstrap/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $config['url']; ?>favicon.ico">
</head>

<body>
    <?php
    include 'js.php';
    include 'navbar.php';
    ?>
    <br>
    <div class="container">
        <h1><?php echo _('Manage default description'); ?></h1>
        <form action="episodes_manage_desc.php?change=1" method="POST">
            <?php $defDesc = getDefaultDescription('../'); ?>
            <div>
                <h3><?php echo _('Change default description'); ?></h3>
                <?php echo _('Content'); ?>:<br>
                <textarea rows="10" cols="100" name="content"><?php echo htmlspecialchars($defDesc); ?></textarea><br><br>
                <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
                <input type="submit" value="<?php echo _('Save'); ?>" class="btn btn-success">
            </div><br/>
            <?php if (!empty($defDesc)) { ?>
                <p><?php echo _("Preview"); ?>:</p>
                <div class="card" style="width: 50%">
                    <div class="card-body">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Modi pariatur iste aut, reiciendis id eius quos architecto velit autem molestiae voluptates ea facilis aliquam voluptas impedit nisi accusantium possimus molestias.
                        <?php echo $defDesc ?>
                    </div>
                </div>
            <?php } ?>
        </form>
    </div>
</body>

</html>
