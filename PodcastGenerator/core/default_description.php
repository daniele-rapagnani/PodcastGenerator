<?php
############################################################
# PODCAST GENERATOR
#
# Created by Alberto Betella and Emil Engler
# http://www.podcastgenerator.net
# 
# This is Free Software released under the GNU/GPL License.
############################################################
function getDefaultDescription($path = null) {
    if (!file_exists($path . 'default-description.html')) {
        return "";
    }

    return file_get_contents($path . 'default-description.html');
}

function updateDefaultDescription($path = null, $content) {
    return file_put_contents($path . 'default-description.html', $content);
}
