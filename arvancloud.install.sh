#!/bin/bash

#
# arvancloud cPanel Install Script
#

INSTALL_DIR="/usr/local/cpanel"

if [ "$VERBOSE" = true ]; then
    echo "Installing from  current to '$INSTALL_DIR'"
fi

# Create the arvancloud theme directory if it does not exist, then install files
install -d $INSTALL_DIR/base/frontend/paper_lantern/arvancloud

install index.live.php $INSTALL_DIR/base/frontend/paper_lantern/arvancloud

# Install internationalization directory
install -d $INSTALL_DIR/base/frontend/paper_lantern/arvancloud/lang
install lang/* $INSTALL_DIR/base/frontend/paper_lantern/arvancloud/lang

# Install assets directory
# install -d $INSTALL_DIR/base/frontend/paper_lantern/arvancloud/assets
# install assets/* $INSTALL_DIR/base/frontend/paper_lantern/arvancloud/assets

# Install fonts directory
# install -d $INSTALL_DIR/base/frontend/paper_lantern/arvancloud/fonts
# install fonts/* $INSTALL_DIR/base/frontend/paper_lantern/arvancloud/fonts

# Install stylesheets directory
install -d $INSTALL_DIR/base/frontend/paper_lantern/arvancloud/stylesheets
install stylesheets/* $INSTALL_DIR/base/frontend/paper_lantern/arvancloud/stylesheets


# Register the plugin buttons with Cpanel
/usr/local/cpanel/scripts/install_plugin installers/arvancloud_simple.tar.bz2


