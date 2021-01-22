# ar-cpnlplugin
ArvanCloud cPanel Plugin

# Brief
ArvanCloud cPanel Plugin to add and config domain in CDN panel directly from cPanel

## Input
User API Token available in arvancloud panel

## Capabalities
* Register Domain and get NSs
* Config Cache/SSL
* Add DNS Records

## Useful Link
[CDN API Documentation](https://www.arvancloud.com/docs/api/cdn/4.0)

## ArvanCloud cPanel Quick Installation Instructions

Using an SSH client such as Terminal or Putty:

Step 1. Access cPanel for the server using root user by:

`ssh root@SERVER IP ADDRESS or SERVER NAME`

Step 2. clone thi repository in your host necessary files and run installation

`bash <(curl -s https://raw.githubusercontent.com/cloudflare/CloudFlare-CPanel/master/cloudflare.install.sh) -k [YOUR_HOST_API_KEY] -n '[YOUR_COMPANY_NAME]' `


## Localization

Now Only support English. In the future we plan to support more languages by default by means of `config/en.js`.

