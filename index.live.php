<?php
require_once '/usr/local/cpanel/php/cpanel.php';
$cpanel = new CPANEL();

$stylesheetsAndMetaTags = '
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />
    <link rel="stylesheet" href="./stylesheets/arc.core.css" media="screen,projection" charset="utf-8"/>
    ';
//add our custom styles before the </head> ¯\_(ツ)_/¯
$cpanelHeader = str_replace('</head>', $stylesheetsAndMetaTags . '</head>', $cpanel->header('ArvanCloud'));
echo $cpanelHeader;
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style type="text/css">
 

  /* End of vertical-menubar */
</style>
<div id="root" class="cloudflare-partners site-wrapper">

  ApiKey: <input id="apikey" type="username" size="60" /><br /><br/>
  <button type="button" id="domainListBtn" class="btnstyle">Select Domain</button>
  <button type="button" id="newDomainBtn" class="btnstyle">+ Add new domain</button>
  <p id="results"></p>
  <div class="mainbox">
    <div id="sidemenu" style="display:none;">
      <ul>
        <li id="sideMenuDnsRecord"><span>DNS Records</span></li>
        <li id="sideMenuCachSetting"><span>Caching Settings</span></li>
        <li id="sideMenuHttpsSetting"><span>HTPPS Settings</span></li>
      </ul>
    </div>
    <div id="contentbox">
    </div>
  </div>






  <!-- The Modal -->
  <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <span class="closebtn">&times;</span>
      <div id="modal-content-det">
        <div style="
    max-width: 100px;
    margin-left: auto;
    margin-right: auto;
">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 187.27 187.41" class="p-cdnWizardDomain__icon">
            <defs>
              <clipPath id="a">
                <circle cx="93.55" cy="93.71" r="61.16" fill="none"></circle>
              </clipPath>
            </defs>
            <g>
              <g>
                <g>
                  <path d="M95.53 187.41a1.68 1.68 0 010-3.36c2.2-.05 4.41-.18 6.59-.38a1.68 1.68 0 01.32 3.34c-2.26.22-4.56.35-6.83.4zm-16.73-1.16a1.24 1.24 0 01-.27 0c-2.24-.36-4.5-.81-6.71-1.33a1.68 1.68 0 01.78-3.27c2.13.5 4.3.94 6.46 1.29a1.68 1.68 0 01-.26 3.34zm39.93-2.31a1.68 1.68 0 01-.46-3.3c2.1-.6 4.22-1.28 6.28-2a1.68 1.68 0 011.15 3.16c-2.14.78-4.33 1.48-6.51 2.1a1.51 1.51 0 01-.46.04zm-62.42-4.36a1.63 1.63 0 01-.68-.14 91.9 91.9 0 01-6.15-3 1.7 1.7 0 01-.69-2.28 1.68 1.68 0 012.27-.69c1.93 1 3.93 2 5.93 2.89a1.68 1.68 0 01-.68 3.21zm84-4.88a1.67 1.67 0 01-.85-3.12c1.88-1.11 3.75-2.31 5.55-3.56a1.68 1.68 0 011.92 2.76c-1.87 1.3-3.81 2.54-5.77 3.69a1.62 1.62 0 01-.87.23zm-104-7.27a1.71 1.71 0 01-1-.36 94.528 94.528 0 01-5.18-4.46 1.68 1.68 0 012.27-2.47c1.62 1.49 3.3 2.94 5 4.3a1.68 1.68 0 01-1.05 3zm122.55-7.13a1.72 1.72 0 01-1.19-.49 1.69 1.69 0 010-2.38c1.56-1.56 3.06-3.19 4.49-4.84a1.68 1.68 0 112.54 2.19c-1.47 1.72-3 3.41-4.64 5a1.68 1.68 0 01-1.25.52zm-138.9-9.69a1.67 1.67 0 01-1.34-.67c-1.37-1.81-2.68-3.7-3.91-5.62a1.68 1.68 0 112.82-1.81c1.19 1.84 2.46 3.66 3.77 5.41a1.69 1.69 0 01-.33 2.36 1.72 1.72 0 01-1.06.33zm153.2-8.89a1.75 1.75 0 01-.85-.23 1.68 1.68 0 01-.6-2.3c1.1-1.89 2.15-3.85 3.1-5.81a1.68 1.68 0 113 1.47c-1 2-2.08 4.07-3.22 6a1.68 1.68 0 01-1.48.87zM8.33 130.21a1.66 1.66 0 01-1.55-1.05 89.41 89.41 0 01-2.35-6.42 1.68 1.68 0 113.19-1c.68 2.09 1.44 4.17 2.27 6.2a1.69 1.69 0 01-.89 2.15 1.77 1.77 0 01-.67.12zm173.89-10.1a1.74 1.74 0 01-.45-.06 1.69 1.69 0 01-1.17-2.05c.59-2.11 1.11-4.27 1.54-6.41a1.68 1.68 0 113.29.66c-.45 2.23-1 4.46-1.59 6.65a1.69 1.69 0 01-1.62 1.21zM2.32 107.54a1.7 1.7 0 01-1.67-1.46c-.29-2.25-.51-4.54-.65-6.81a1.68 1.68 0 013.36-.2c.13 2.19.34 4.4.62 6.57a1.66 1.66 0 01-1.44 1.88zM185.58 96.9a1.68 1.68 0 01-1.65-1.71v-1.48c0-1.69 0-3.42-.15-5.11a1.68 1.68 0 013.36-.19c.1 1.76.15 3.54.15 5.3v1.54a1.67 1.67 0 01-1.71 1.65zM2.21 84.08H2A1.67 1.67 0 01.55 82.2c.27-2.26.64-4.53 1.08-6.76a1.68 1.68 0 113.29.66c-.42 2.14-.77 4.33-1 6.51a1.68 1.68 0 01-1.71 1.47zM183 73.59a1.69 1.69 0 01-1.63-1.28c-.52-2.14-1.12-4.27-1.79-6.35a1.68 1.68 0 113.2-1c.69 2.15 1.32 4.37 1.85 6.58a1.68 1.68 0 01-1.23 2 1.9 1.9 0 01-.4.05zM8 61.36a1.68 1.68 0 01-1.56-2.3c.85-2.06 1.78-4.21 2.77-6.26a1.68 1.68 0 013 1.47c-1 2-1.85 4-2.66 6A1.67 1.67 0 018 61.36zm166.56-9.67a1.68 1.68 0 01-1.48-.88c-1-1.93-2.17-3.85-3.35-5.69a1.68 1.68 0 012.83-1.81c1.23 1.91 2.39 3.9 3.48 5.9a1.68 1.68 0 01-.69 2.28 1.6 1.6 0 01-.77.2zM19.4 40.86a1.67 1.67 0 01-1.35-2.67c1.34-1.82 2.77-3.63 4.25-5.36A1.68 1.68 0 0124.86 35a91.98 91.98 0 00-4.11 5.16 1.67 1.67 0 01-1.35.7zm141.48-8.22a1.65 1.65 0 01-1.23-.53c-.72-.77-1.46-1.53-2.21-2.29s-1.63-1.6-2.46-2.37a1.68 1.68 0 112.29-2.45q1.29 1.2 2.55 2.46c.78.78 1.54 1.57 2.29 2.37a1.68 1.68 0 01-.08 2.37 1.7 1.7 0 01-1.15.44zm-132.4-2.32a1.68 1.68 0 01-1.19-.5 1.67 1.67 0 010-2.37 95.4 95.4 0 015-4.66 1.68 1.68 0 112.2 2.54 97.21 97.21 0 00-4.83 4.49 1.64 1.64 0 01-1.18.5zm114.37-12.67a1.65 1.65 0 01-.9-.26 89.888 89.888 0 00-5.69-3.33 1.68 1.68 0 111.59-3c2 1.07 4 2.23 5.9 3.45a1.68 1.68 0 01-.9 3.1zM47 16a1.68 1.68 0 01-.85-3.13c2-1.15 4-2.24 6-3.24a1.68 1.68 0 011.49 3c-2 1-3.93 2-5.81 3.13A1.65 1.65 0 0147 16zm74.58-8.24a1.81 1.81 0 01-.51-.08c-2.07-.68-4.19-1.3-6.33-1.81a1.68 1.68 0 01.79-3.27c2.21.53 4.43 1.15 6.59 1.84a1.68 1.68 0 01-.51 3.28zm-53-.93a1.68 1.68 0 01-.45-3.3c2.19-.61 4.43-1.16 6.65-1.61a1.68 1.68 0 01.67 3.3c-2.14.43-4.3 1-6.41 1.54a1.47 1.47 0 01-.43.03zm29.93-3.3h-.09c-2.2-.12-4.41-.16-6.6-.11a1.68 1.68 0 010-3.36c2.27 0 4.56 0 6.84.12a1.68 1.68 0 01-.09 3.35z" fill="#42e8e8"></path>
                  <path d="M88.67 171.84h-.11c-2.28-.14-4.57-.39-6.83-.73a1.68 1.68 0 01.51-3.32c2.16.33 4.35.56 6.53.7a1.68 1.68 0 01-.1 3.36zm16.74-.77a1.68 1.68 0 01-.26-3.34c2.16-.33 4.32-.77 6.45-1.29a1.68 1.68 0 01.8 3.26c-2.21.55-4.48 1-6.73 1.35a1.14 1.14 0 01-.26.02zm-39.62-4.27a1.64 1.64 0 01-.61-.11c-2.13-.83-4.24-1.76-6.28-2.76a1.68 1.68 0 111.48-3c2 1 4 1.86 6 2.65a1.68 1.68 0 01-.61 3.24zm61.95-2.8a1.68 1.68 0 01-.75-3.19c2-1 3.88-2 5.74-3.19a1.68 1.68 0 011.76 2.87c-2 1.19-4 2.31-6 3.33a1.72 1.72 0 01-.75.18zm-82.22-8.9a1.66 1.66 0 01-1.05-.37c-1.77-1.43-3.51-3-5.15-4.54a1.68 1.68 0 112.33-2.42c1.57 1.51 3.23 3 4.93 4.34a1.68 1.68 0 01.25 2.36 1.66 1.66 0 01-1.31.6zm101.33-4.66a1.68 1.68 0 01-1.17-2.88l.85-.84a76 76 0 003.67-3.94 1.68 1.68 0 112.53 2.21c-1.22 1.4-2.51 2.79-3.83 4.1-.29.3-.59.59-.88.88a1.66 1.66 0 01-1.17.44zM29.73 137.77a1.66 1.66 0 01-1.4-.75c-1.27-1.9-2.46-3.88-3.55-5.88a1.68 1.68 0 112.95-1.61c1 1.92 2.19 3.81 3.4 5.63a1.68 1.68 0 01-1.4 2.61zm131.27-6a1.76 1.76 0 01-.8-.2 1.68 1.68 0 01-.68-2.28c1-1.92 2-3.91 2.86-5.91a1.68 1.68 0 013.09 1.33c-.91 2.09-1.91 4.17-3 6.17a1.69 1.69 0 01-1.47.87zM19.91 116.5a1.68 1.68 0 01-1.62-1.22c-.63-2.19-1.16-4.44-1.59-6.68a1.68 1.68 0 013.3-.6c.41 2.14.92 4.29 1.52 6.39a1.68 1.68 0 01-1.15 2.08 1.88 1.88 0 01-.46.03zm148.91-6.83a1.63 1.63 0 01-.31 0 1.67 1.67 0 01-1.34-2c.4-2.14.71-4.33.93-6.5a1.68 1.68 0 113.34.33c-.22 2.27-.55 4.56-1 6.79a1.68 1.68 0 01-1.62 1.38zM17 93.26a1.66 1.66 0 01-1.63-1.72c.06-2.28.22-4.58.49-6.85a1.68 1.68 0 113.33.39c-.25 2.16-.4 4.37-.46 6.55A1.7 1.7 0 0117 93.26zm152.62-7a1.68 1.68 0 01-1.67-1.48c-.26-2.17-.62-4.36-1.06-6.49a1.68 1.68 0 011.3-2 1.7 1.7 0 012 1.3c.46 2.23.84 4.51 1.11 6.78a1.68 1.68 0 01-1.47 1.87zM21.2 70.21a1.82 1.82 0 01-.56-.09 1.68 1.68 0 01-1-2.14c.75-2.15 1.6-4.3 2.53-6.38a1.68 1.68 0 013.04 1.4c-.9 2-1.71 4-2.43 6.1a1.67 1.67 0 01-1.58 1.11zm142.11-6.52a1.67 1.67 0 01-1.53-1c-.91-2-1.91-4-3-5.86a1.68 1.68 0 112.92-1.65c1.13 2 2.17 4 3.12 6.12a1.68 1.68 0 01-.84 2.22 1.54 1.54 0 01-.67.17zM32.19 49.54a1.66 1.66 0 01-1-.34 1.69 1.69 0 01-.34-2.35 78.79 78.79 0 014.36-5.31 1.68 1.68 0 112.5 2.24 77.557 77.557 0 00-4.17 5.08 1.68 1.68 0 01-1.35.68zm118.26-5.43a1.69 1.69 0 01-1.25-.56c-.86-.95-1.76-1.9-2.67-2.81a68.22 68.22 0 00-1.94-1.87 1.68 1.68 0 012.29-2.46c.69.64 1.36 1.29 2 2 1 1 1.9 1.94 2.8 2.94a1.68 1.68 0 01-1.25 2.81zM39.39 41.23a1.67 1.67 0 01-1.19-.49 1.7 1.7 0 010-2.38c1.62-1.61 3.32-3.17 5.06-4.64a1.68 1.68 0 112.16 2.58c-1.66 1.4-3.29 2.89-4.84 4.44a1.67 1.67 0 01-1.19.49zM132.3 29.3a1.75 1.75 0 01-.85-.23 71.387 71.387 0 00-5.8-3.07 1.68 1.68 0 011.44-3c2.06 1 4.1 2.06 6.06 3.21a1.68 1.68 0 01-.85 3.13zm-74-1.92a1.68 1.68 0 01-.77-3.17c2-1.06 4.12-2 6.23-2.89a1.68 1.68 0 111.24 3.1c-2 .83-4 1.76-6 2.77a1.69 1.69 0 01-.72.19zm52.24-6.69a1.61 1.61 0 01-.37 0c-2.13-.48-4.3-.88-6.46-1.17a1.68 1.68 0 01.45-3.33c2.26.31 4.53.72 6.75 1.22a1.68 1.68 0 01-.37 3.32zm-30-.78a1.68 1.68 0 01-.29-3.33c2.25-.39 4.54-.68 6.81-.87a1.68 1.68 0 11.28 3.35c-2.17.18-4.37.46-6.52.83z" fill="#42dbdb"></path>
                  <circle cx="93.55" cy="93.71" r="61.16" fill="#cfffff"></circle>
                  <g>
                    <g clip-path="url(#a)">
                      <g>
                        <path d="M60.77 127a8.73 8.73 0 011 5q-1.42 5.55 1.92 8.92c1.92 1.25 3.05.39 3.39-2.56q0-2 3.85-3.21 2.53 0 3.09-4.44 1.36-3.65 6.71-1.34 13.27 6 8-12.43-5-11.65-15-16.1-11.77-8-18.15-3.32t-7.35 8.57q-1.09 4.62 4.44 8.35a26.07 26.07 0 018.1 12.56z" fill="#fff" fill-rule="evenodd"></path>
                        <path d="M135.2 136.47q-2.76 3.57-4.18-1.09-2-11.3 2.1-14.53 1.45-1.32 1.4-8-.71-5.73-6.13-6.54-6.88-1.12-9.51-5.36-3.8-5.13-5.08-15.23-.54-6.63 10.59-11.43 4.86-1.86 8.29-.44 2.87 1.41 4.9 2.48c2.66.83 4.31.18 4.93-2s.15-3.26-1.29-3.35a11.15 11.15 0 01-3.82-1.37 3.49 3.49 0 00-2.48-1.32 11.84 11.84 0 01-4-1 7.56 7.56 0 00-3-1.25c-1.51-.32-2.37.18-2.57 1.49q-.28 2.22-3.3 2.16c-2.26-.41-3-1.4-2.19-3s-.22-3.08-2.65-4.4c-.69-.63-.52-1.23.5-1.78a10.29 10.29 0 004.26-2.69c.89-1.21 1.74-1.83 2.57-1.86a2.45 2.45 0 001.81-.85c.73-1.21-.07-2.31-2.43-3.3-1.68-.87-2.41-.58-2.18.85s-.42 1.71-1.81.79q-1.71-1.34-2-6.42c0-2.41 1.38-3.35 4-2.8q7-.26 13.72 6a60.47 60.47 0 01.32 85.52l-.72.72z" fill="#fff" fill-rule="evenodd"></path>
                        <path d="M85.21 55.48c.78-3.55.57-5.45-.61-5.72a44.28 44.28 0 00-8.69.26q-5.89-1 0-4a20.43 20.43 0 018-1.92 2.71 2.71 0 002.57-1q2-2.79 7 .12a4.28 4.28 0 01.82 2.63c0 2.34.78 3.51 2.33 3.5s2.37-1.55 2.24-4.64c-.15-4.29-1.17-6.6-3-6.94-2.07-.38-5.09-.19-9 .58-3.05.7-5.08.45-6.07-.76a4.27 4.27 0 01-2-3.21A60.61 60.61 0 0040.56 63c-.25.43-.49.87-.73 1.31q-2.09 5.53 0 8.08A9.71 9.71 0 0042 77.5a23.4 23.4 0 012.28 4.76q1.13 3.94 3.33.9a6.58 6.58 0 001.11-2.25 4.43 4.43 0 011.8-2.91q2.76-2.37 1-3a5.61 5.61 0 00-3.58.53q-4.78 1.11-3-2.39a19.47 19.47 0 002.27-6.22q0-3.21 2.77-2.6 2.13.56 3.44 4.35c.82 3.41 2.09 4.44 3.79 3.09a15.73 15.73 0 003.48-4.43 18.36 18.36 0 0111.36-6.93 17.82 17.82 0 016.25-.64q5.93.36 6.91-4.28z" fill="#fff" fill-rule="evenodd"></path>
                        <path d="M60.77 127a8.73 8.73 0 011 5q-1.42 5.55 1.92 8.92c1.92 1.25 3.05.39 3.39-2.56q0-2 3.85-3.21 2.53 0 3.09-4.44 1.36-3.65 6.71-1.34 13.27 6 8-12.43-5-11.65-15-16.1-11.77-8-18.15-3.32t-7.35 8.57q-1.09 4.62 4.44 8.35a26.07 26.07 0 018.1 12.56z" fill="#fff" fill-rule="evenodd"></path>
                        <path d="M65.18 142.86a4.16 4.16 0 01-2.22-.77l-.21-.18c-2.56-2.56-3.33-6-2.3-10.08a7.37 7.37 0 00-.85-4.17l-.1-.25a24.72 24.72 0 00-7.7-11.86c-4.13-2.8-5.79-6.07-4.92-9.7.65-2.9 3.23-6 7.86-9.34S66 94.16 74.3 99.74c7 3.1 12.21 8.74 15.63 16.74v.16c2.21 7.69 2.08 12.27-.39 14.41-2 1.69-5 1.55-9.41-.42-2.2-.95-3.35-.86-3.92-.61a1.76 1.76 0 00-1 1.08c-.59 4.27-2.53 5.33-4.16 5.42-1.74.56-2.76 1.26-2.75 1.88v.17c-.25 2.18-.94 3.5-2.09 4a2.5 2.5 0 01-1.03.29zm-.66-2.86c.46.28.66.28.67.27s.37-.31.56-1.88c0-1.94 1.63-3.42 4.78-4.39l.18-.06h.2c.91 0 1.52-1.11 1.79-3.28l.07-.3a4.51 4.51 0 012.46-2.72c1.54-.66 3.51-.45 6 .63 3.27 1.47 5.55 1.76 6.62.83.88-.76 2-3.27-.39-11.61-3.17-7.37-8-12.53-14.34-15.33l-.21-.12C65.62 97 60 95.92 56.29 98.64c-4 3-6.34 5.58-6.84 7.8-.6 2.53.67 4.8 3.88 7l.12.09A27.29 27.29 0 0162 126.54a10 10 0 011.08 5.65v.19c-.86 3.2-.38 5.67 1.44 7.62zm-2.76-7.89zM131 136.71a1.32 1.32 0 01-1.29-1.09c-1.46-8.13-.61-13.3 2.58-15.8.1-.09.94-1.15.9-6.87-.41-3.18-2-4.87-5-5.31-5-.82-8.45-2.81-10.41-5.94-2.64-3.59-4.43-8.91-5.3-15.81-.42-5.08 3.41-9.37 11.38-12.81 3.6-1.38 6.72-1.52 9.31-.44 1.95 1 3.56 1.77 4.9 2.47a3.4 3.4 0 002.37.08c.13-.07.53-.29.79-1.18.34-1.27.14-1.63.14-1.63a1.05 1.05 0 00-.24 0H141a12.43 12.43 0 01-4.28-1.54l-.21-.12-.15-.2a2.18 2.18 0 00-1.54-.81 13.37 13.37 0 01-4.46-1.17l-.21-.12a6.28 6.28 0 00-2.5-1c-.56-.11-.83-.06-.89 0s-.1.12-.15.4c-.12 1-.81 3.28-4.43 3.28h-.38c-1.73-.31-2.81-1-3.32-2a3.13 3.13 0 01.16-2.86c.15-.39.42-1.33-2.08-2.7l-.27-.18a2.23 2.23 0 01-.82-2 2.7 2.7 0 011.59-2l.22-.09a9.1 9.1 0 003.65-2.27c1.13-1.52 2.28-2.29 3.52-2.34a1.1 1.1 0 00.78-.3.18.18 0 000-.08s-.17-.51-1.88-1.22h-.09l-.24-.12a2.19 2.19 0 01-.9 2.16c-1.16.73-2.53-.18-3-.48-1.56-1.2-2.38-3.55-2.63-7.43V47a4.25 4.25 0 011.51-3.41 4.91 4.91 0 014.19-.64 1.32 1.32 0 01-.54 2.59 2.63 2.63 0 00-2 .11 1.89 1.89 0 00-.43 1.36c.2 3 .75 4.39 1.17 5a2 2 0 01.82-1.62c1-.75 2.35-.24 3.28.23 1.89.8 3 1.69 3.32 2.82a2.79 2.79 0 01-.33 2.36l-.12.17a3.7 3.7 0 01-2.81 1.31c-.09 0-.62.12-1.51 1.33l-.11.13a11.57 11.57 0 01-4.31 2.85c3.26 2.1 3 4.38 2.47 5.6v.1a1.07 1.07 0 00-.17.55s.21.3 1.31.51h.06c1.67 0 1.75-.63 1.8-1a3.08 3.08 0 011.26-2.2 3.62 3.62 0 012.89-.41 8.86 8.86 0 013.42 1.4A10.51 10.51 0 00135 67a4.81 4.81 0 013.23 1.6 9.58 9.58 0 003.12 1.09 2.82 2.82 0 012.15 1.14c.63.89.72 2.16.25 3.88a4.31 4.31 0 01-2.08 2.78 5.75 5.75 0 01-4.52.08l-.15-.07q-2-1.05-4.87-2.46c-1.87-.77-4.33-.62-7.23.48-6.76 2.93-10.06 6.33-9.74 10.1.81 6.41 2.43 11.33 4.82 14.56l.06.08c1.54 2.48 4.43 4.08 8.6 4.77s6.69 3.27 7.23 7.68v.14c0 5-.52 7.8-1.84 9-2.35 1.85-2.91 6.44-1.68 13.31a1.33 1.33 0 01-1.07 1.54zM45.87 84.74h-.38c-1.49-.3-2.16-1.96-2.49-3.19a22.77 22.77 0 00-2.1-4.35 11 11 0 01-2.37-5.7 1.32 1.32 0 012.63-.29A8.28 8.28 0 0043 75.6l.1.14a25.64 25.64 0 012.4 5A5.54 5.54 0 0046 82a3.81 3.81 0 00.54-.64 4.88 4.88 0 00.89-1.76 5.74 5.74 0 012.32-3.67c.34-.3.59-.55.77-.74a4.39 4.39 0 00-1.92.47l-.31.11c-1.5.35-3.61.66-4.63-.68s0-3.17.29-3.77l.06-.11a17.62 17.62 0 002-5.45 4 4 0 011.24-3.23 3.58 3.58 0 013.06-.53c1.94.5 3.37 2.2 4.41 5.21v.12c.57 2.35 1.16 2.65 1.18 2.66a1.3 1.3 0 00.51-.29 14.06 14.06 0 003.12-4l.13-.19A19.71 19.71 0 0171.75 58a19.35 19.35 0 016.64-.67c4.24.26 5.18-1.6 5.53-3.24.63-2.88.41-3.88.31-4.15a43.63 43.63 0 00-8.16.28h-.38c-1.75-.29-3.78-.84-4-2.5s1.69-3 3.63-4a22 22 0 018.54-2.07h.27a1.37 1.37 0 001.31-.51c1.22-1.67 3.75-3.11 8.71-.2l.23.14.16.22a5.52 5.52 0 011.07 3.44c0 1.38.32 1.85.46 2a.67.67 0 00.53.16.57.57 0 00.48-.17c.19-.2.61-.9.48-3.1-.11-3.44-.83-5.51-2-5.72-1.9-.35-4.78-.15-8.55.58-3.57.82-6 .43-7.34-1.21a1.32 1.32 0 112-1.68c.63.76 2.32.87 4.76.31 4.2-.82 7.32-1 9.58-.59 3.85.7 4.05 6.34 4.11 8.19.13 2.37-.26 4-1.19 5a3.22 3.22 0 01-2.38 1 3.38 3.38 0 01-2.44-.92 5.31 5.31 0 01-1.24-3.89 3 3 0 00-.42-1.64c-3.72-2.11-4.68-.78-5-.33a4 4 0 01-3.7 1.54 19 19 0 00-7.36 1.79 12 12 0 00-1.83 1.11 8.11 8.11 0 001.33.33 45.68 45.68 0 018.75-.24h.2c3 .7 2 5.48 1.61 7.28-.51 2.76-2.45 5.82-8.23 5.46a16.42 16.42 0 00-5.8.59h-.13A17.06 17.06 0 0061.85 67a16.82 16.82 0 01-3.71 4.71 3.13 3.13 0 01-3.07.77C53.75 72 52.84 70.56 52.2 68c-.7-2-1.56-3.2-2.5-3.44-.48-.1-.77-.06-.86 0s-.28.45-.27 1.29v.28a20.59 20.59 0 01-2.4 6.61 4.29 4.29 0 00-.3.7 6 6 0 001.66-.2 7.06 7.06 0 014.27-.57l.21.06a2.13 2.13 0 011.51 1.63c.26 1.37-1 2.65-2.12 3.62l-.1.08a3.09 3.09 0 00-1.29 2v.12a7.48 7.48 0 01-1.34 2.71c-.37.46-1.38 1.85-2.8 1.85z" fill="#00baba"></path>
                      </g>
                    </g>
                  </g>
                  <path d="M93.55 156.56a62.85 62.85 0 1162.85-62.85 62.92 62.92 0 01-62.85 62.85zm0-122.33A59.49 59.49 0 10153 93.71a59.55 59.55 0 00-59.45-59.48z" fill="#00baba"></path>
                  <path d="M142.65 114.36H102a13.08 13.08 0 00-13 13 13.08 13.08 0 0013 13h40.6a13.08 13.08 0 0013-13 13.08 13.08 0 00-12.95-13z" fill="#fff" fill-rule="evenodd"></path>
                  <path d="M142.65 141.88H102a14.48 14.48 0 010-29h40.61a14.48 14.48 0 010 29zM102 115.8a11.6 11.6 0 000 23.2h40.6a11.6 11.6 0 100-23.2z" fill="#00baba"></path>
                  <g fill="#6b809b" style="isolation: isolate;">
                    <path d="M102.55 132.67l-3.44-10.89h2.8l2 7.14 1.87-7.14h2.78l1.82 7.14 2.08-7.14h2.84l-3.5 10.89h-2.77l-1.87-7-1.85 7zM118.89 132.67l-3.45-10.89h2.8l2 7.14 1.88-7.14h2.78l1.81 7.14 2.08-7.14h2.84l-3.49 10.89h-2.77l-1.88-7-1.84 7zM135.22 132.67l-3.44-10.89h2.8l2 7.14 1.87-7.14h2.78l1.82 7.14 2.08-7.14H148l-3.5 10.89h-2.77l-1.87-7-1.85 7z"></path>
                  </g>
                  <g>
                    <circle cx="96.02" cy="17.67" r="7" fill="#fff"></circle>
                    <path d="M96 24.67a7 7 0 117-7 7 7 0 01-7 7zm0-12a5 5 0 105 5 5 5 0 00-5-5z" fill="#00baba"></path>
                  </g>
                  <g>
                    <ellipse cx="130.02" cy="175.17" rx="11" ry="11.5" fill="#fff"></ellipse>
                    <path d="M130 186.67a11.51 11.51 0 1111-11.5 11.27 11.27 0 01-11 11.5zm0-21a9.51 9.51 0 109 9.5 9.26 9.26 0 00-9-9.5z" fill="#00baba"></path>
                  </g>
                  <g>
                    <circle cx="5.52" cy="118.17" r="5.5" fill="#fff"></circle>
                    <path d="M5.52 123.67a5.5 5.5 0 115.5-5.5 5.5 5.5 0 01-5.5 5.5zm0-9a3.5 3.5 0 103.5 3.5 3.5 3.5 0 00-3.5-3.5z" fill="#00baba"></path>
                  </g>
                </g>
              </g>
            </g>
          </svg>
        </div>
        <h2 class="center"> You nead a domain
          Insert your domain without www</h2>
        <div class="center">

          https://
          <input id="newdomaininput" type="url" size="30" />
          <button type="button" id="addNewDomainBtn">Continue</button>
        </div>

        <br /><br />

      </div>
    </div>

  </div>





</div>

<script>
  // Get the modal
  var modal = document.getElementById("myModal");
  // var modal = $('#myModal');

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("closebtn")[0];


  $('#newDomainBtn').click(function() {

    modal.style.display = "block";

  });

  
  // When the user clicks the button, open the modal 
  // btn.onclick = function() {
  //   modal.style.display = "block";
  // }

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }

  // Retrieve your data from locaStorage
  var saveData = JSON.parse(localStorage.saveData || null) || {};

  // Store your data.
  function saveStuff(obj) {
    saveData.obj = obj;
    // saveData.foo = foo;
    saveData.time = new Date().getTime();
    localStorage.saveData = JSON.stringify(saveData);
  }

  // Do something with your data.
  function loadStuff() {
    return saveData.obj || "default";
  }


//Menu Section -
$('#sideMenuDnsRecord').click(function() {

loadDNSList();

});

$('#sideMenuCachSetting').click(function() {
let temp1 = '<div class="c-cdnBox c-cdnDnsActions">Will come soon</div>';
  var container = $("#contentbox");
    container.empty();
    container.append(temp1);

});
$('#sideMenuHttpsSetting').click(function() {
  let temp1 = '<div class="c-cdnBox c-cdnDnsActions">Will come soon</div>';
  var container = $("#contentbox");
    container.empty();
    container.append(temp1);

});


  var deleteIconButton = '<div class="delete-icon-btn-class"><svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="trash-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-trash-alt fa-w-14 c-deleteButton__trashIcon"><path fill="currentColor" d="M268 416h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12zM432 80h-82.41l-34-56.7A48 48 0 0 0 274.41 0H173.59a48 48 0 0 0-41.16 23.3L98.41 80H16A16 16 0 0 0 0 96v16a16 16 0 0 0 16 16h16v336a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128h16a16 16 0 0 0 16-16V96a16 16 0 0 0-16-16zM171.84 50.91A6 6 0 0 1 177 48h94a6 6 0 0 1 5.15 2.91L293.61 80H154.39zM368 464H80V128h288zm-212-48h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12z"></path></svg></div>';

  var dnsRecordPanelDOM = '  <div class="c-cdnBox c-cdnDnsActions"><div><h3>Add new DNS record</h3><div >' +
    '<div style="display: inline-block;"><label for="cdntype">Type:</label><select name="cdntype" id="cdntype"><option value="a">A</option><option value="aaaa">AAAA</option><option value="cname">CNAME</option><option value="aname">ANAME</option><option value="nc">NS</option><option value="mx">MX</option><option value="srv">SRV</option><option value="tx">TXT</option><option value="ptr">PTR</option><option value="spf">SPF</option><option value="dkim">DKIM</option></select></div>' +

    '<div style="display: inline-block;margin-left: 20px;margin-right: 20px;"> <label for="cdnname">Name:</label> <input name="cdnname" id="cdnname" type="text"> </div> <br> <br> <div style=" display: inline-block; "> <label for="cdnvalue">Value:</label> <input placeholder="IPv4 eg. 2.2.2.2" name="cdnvalue" id="cdnvalue" type="text" style="min-width: 300px;"> </div>     <div id="addcdndnsport" style=" display: none; "> <label for="cdnvalueport">Port:</label> <input placeholder="port" name="cdnvalueport" id="cdnvalueport" type="text"> </div><div id="addcdndnsweight" style=" display: none; "> <label for="cdnvalueport">Weight:</label> <input placeholder="Weight" name="cdnvalueweight" id="cdnvalueweight" type="text"> </div><div id="addcdndnspriority" style=" display: none; "> <label for="cdnvaluepriority">Priority:</label> <input placeholder="Priority" name="cdnvaluepriority" id="cdnvaluepriority" type="text"> </div><div style="display: inline-block;margin-left: 20px;margin-right: 20px;"> <label for="cdnttl">TTL:</label> <select name="cdnttl" id="cdnttl"> <option value="120">2 Minutes</option> <option value="180">3 Minutes</option> <option value="300">5 Minutes</option> <option value="600">10 Minutes</option> <option value="900">15 Minutes</option> <option value="1800">30 Minutes</option> <option value="3600">1 Hour</option> <option value="7200">2 Hour</option> <option value="18000">5 Hour</option> <option value="43200">12 Hour</option> <option value="86400">1 Day</option> <option value="172800">2 Days</option> <option value="432000">PTR</option> </select> </div>' +
    '<br> <br> <div id="cdnstatusdiv"> CDN Status: <br> <input type="radio" id="cdnactive" name="cdnstatus" value="true"> <label for="cdnactive">Incoming traffic is accelerated and securely passing through the CDN.</label><br> <input type="radio" id="cdninactive" name="cdnstatus" value="false" checked="checked"> <label for="cdninactive">Incoming traffic does not pass through the CDN, and only the DNS queries are resolved.</label> </div> <br> <button class="btnstyle" type="button" id="addNewDNSBtn">Add DNS Record</button> </div>  </div></div>' +
    '<div id="dnsRecordLists"></div>';




  $('#domainListBtn').click(function() {

    loadDomainList();

  });
  $('#addNewDomainBtn').click(function() {

    createNewDomainRecord();

  });

  function createNewDomainRecord() {
    let domainName = $("#newdomaininput").val();
    var settings = {
      "url": "https://napi.arvancloud.com/cdn/4.0/domains/dns-service",
      "method": "POST",
      "timeout": 0,
      "headers": {
        "Content-Type": "application/x-www-form-urlencoded",
        "Authorization": "Apikey " + $("#apikey").val()
      },
      "data": {
        "domain": domainName
      }
    };

    var responseData;
    // let container = document.getElementById('domainLists');
    var container = $("#contentbox");
    // container.empty();
    $.ajax(settings).done(function(response) {
      console.log(response.status);
      modal.style.display = "none";
      loadDomainList();


    }).fail(function(response) {
      console.log(response.status);
    });;
  };


  function removeTheDomain(id, domain) {
    var settings = {
      "url": "https://napi.arvancloud.com/cdn/4.0/domains/" + domain + "?id=" + id,
      "method": "DELETE",
      "timeout": 0,
      "headers": {
        "Content-Type": "application/x-www-form-urlencoded",
        "Authorization": "Apikey " + $("#apikey").val()
      },
      "data": {
        "message": "string"
      }
    };

    $.ajax(settings).done(function(response) {
      loadDomainList();
    });
  };

  function removeTheDNSRecord(id, domain) {
    var settings = {
      "url": "https://napi.arvancloud.com/cdn/4.0/domains/"+ domain + "/dns-records/" + id,
      "method": "DELETE",
      "timeout": 0,
      "headers": {
        "Content-Type": "application/x-www-form-urlencoded",
        "Authorization": "Apikey " + $("#apikey").val()
      },
      "data": {
        "message": "string"
      }
    };

    $.ajax(settings).done(function(response) {
      loadDNSList();
    });
  };

  function createNewDNSRecord() {
    if ($("#cdnname").val() == "") {
      alert("Empty Values. Fill in the Blank");
    } else if ($("#cdnvalue").val() == "") {
      alert("Empty Values. Fill in the Blank");
    } else {
      let cdTypeValueDropDown = $("#cdntype").val();
      let cdnValueData = "";
      if (cdTypeValueDropDown == 'a') {
        cdnValueData = {
          "type": $("#cdntype").val(),
          "name": $("#cdnname").val(),
          "value": [{
            "ip": $("#cdnvalue").val(),
            "weight": 100,

          }],
          "ttl": $("#cdnttl").val(),
          "cloud": $("input[name='gender']:checked").val(),
          "upstream_https": "default",
          "ip_filter_mode": {
            "count": "single",
            "order": "none",
            "geo_filter": "none"
          }
        };
      } else if (cdTypeValueDropDown == 'aaaa') {
        cdnValueData = {
          "type": $("#cdntype").val(),
          "name": $("#cdnname").val(),
          "value": [{
            "ip": $("#cdnvalue").val(),
            "weight": 100,
          }],
          "ttl": $("#cdnttl").val(),
          "cloud": false,
          "upstream_https": "default",
          "ip_filter_mode": {
            "count": "single",
            "order": "none",
            "geo_filter": "none"
          }
        };

      } else if (cdTypeValueDropDown == 'cname') {
        cdnValueData = {
          "type": $("#cdntype").val(),
          "name": $("#cdnname").val(),
          "value": {
            "host": $("#cdnvalue").val(),
          },
          "ttl": $("#cdnttl").val(),
          "cloud": $("input[name='gender']:checked").val(),
          "upstream_https": "default",
          "ip_filter_mode": {
            "count": "single",
            "order": "none",
            "geo_filter": "none"
          }
        };

      } else if (cdTypeValueDropDown == 'mx') {
        cdnValueData = {
          "type": $("#cdntype").val(),
          "name": $("#cdnname").val(),
          "value": {
            "host": $("#cdnvalue").val(),
            "priority": $("#cdnvaluepriority").val(),
          },
          "ttl": $("#cdnttl").val(),
          "cloud": false,
          "upstream_https": "default",
          "ip_filter_mode": {
            "count": "single",
            "order": "none",
            "geo_filter": "none"
          }
        };

      } else if (cdTypeValueDropDown == 'ptr') {
        cdnValueData = {
          "type": $("#cdntype").val(),
          "name": $("#cdnname").val(),
          "value": {
            "domain": $("#cdnvalue").val(),
          },
          "ttl": $("#cdnttl").val(),
          "cloud": false,
          "upstream_https": "default",
          "ip_filter_mode": {
            "count": "single",
            "order": "none",
            "geo_filter": "none"
          }
        };

      } else if (cdTypeValueDropDown == 'srv') {
        cdnValueData = {
          "type": $("#cdntype").val(),
          "name": $("#cdnname").val(),
          "value": {
            "target": $("#cdnvalue").val(),
            "port": $("#cdnvalueport").val(),
            "priority": $("#cdnvaluepriority").val(),
            "weight": $("#cdnvalueweight").val()
          },
          "ttl": $("#cdnttl").val(),
          "cloud": false,
          "upstream_https": "default",
          "ip_filter_mode": {
            "count": "single",
            "order": "none",
            "geo_filter": "none"
          }
        };

      } else if (cdTypeValueDropDown == 'txt') {
        cdnValueData = {
          "type": $("#cdntype").val(),
          "name": $("#cdnname").val(),
          "value": {
            "text": $("#cdnvalue").val(),
          },
          "ttl": $("#cdnttl").val(),
          "cloud": false,
          "upstream_https": "default",
          "ip_filter_mode": {
            "count": "single",
            "order": "none",
            "geo_filter": "none"
          }
        };

      } else if (cdTypeValueDropDown == 'ns') {
        cdnValueData = {
          "type": $("#cdntype").val(),
          "name": $("#cdnname").val(),
          "value": {
            "host": $("#cdnvalue").val(),
          },
          "ttl": false,
          "cloud": false,
          "upstream_https": "default",
          "ip_filter_mode": {
            "count": "single",
            "order": "none",
            "geo_filter": "none"
          }
        };

      } else if (cdTypeValueDropDown == 'spf') {
        cdnValueData = {
          "type": $("#cdntype").val(),
          "name": $("#cdnname").val(),
          "value": {
            "text": $("#cdnvalue").val(),
          },
          "ttl": $("#cdnttl").val(),
          "cloud": false,
          "upstream_https": "default",
          "ip_filter_mode": {
            "count": "single",
            "order": "none",
            "geo_filter": "none"
          }
        };

      } else if (cdTypeValueDropDown == 'dkim') {
        cdnValueData = {
          "type": $("#cdntype").val(),
          "name": $("#cdnname").val(),
          "value": {
            "text": $("#cdnvalue").val(),
          },
          "ttl": $("#cdnttl").val(),
          "cloud": false,
          "upstream_https": "default",
          "ip_filter_mode": {
            "count": "single",
            "order": "none",
            "geo_filter": "none"
          }
        };

      };

      let domainName = $("#newdomaininput").val();
      var settings = {
        "url": "https://napi.arvancloud.com/cdn/4.0/domains/" + domainName + "/dns-service",
        "method": "POST",
        "timeout": 0,
        "headers": {
          "Content-Type": "application/x-www-form-urlencoded",
          "Authorization": "Apikey " + $("#apikey").val()
        },
        "data": cdnValueData,

      };

      // var responseData;
      // let container = document.getElementById('domainLists');
      // var container = $("#contentbox");
      // container.empty();
      $.ajax(settings).done(function(response) {
        console.log(response.status);

        loadDNSList()

      }).fail(function(response) {
        alert("Error adding new dns record. Error Code: " + response.status);
        console.log(response.status);
      });;
    };
    // else{
    //   alert("Empty Values. Fill in the Blank");
    // };
  };
  // 
  function loadDNSList() {
    //Function for getting list of DNS record based on :
    //https://www.arvancloud.com/docs/api/cdn/4.0#operation/dns_records.list




    let id = saveData.obj.id;
    let domain = saveData.obj.domain;

    var settings = {
      "url": "https://napi.arvancloud.com/cdn/4.0/domains/" + domain + "/dns-records",
      "method": "GET",
      "timeout": 0,
      "headers": {
        "Authorization": "Apikey " + $("#apikey").val()
      },
    };
    var responseData;
    var container = $("#contentbox");
    container.empty();
    container.append(dnsRecordPanelDOM);

    let temp1 = '<span>'+domain+'</span>';
  var tempResult = $("#results");
  tempResult.empty();
  tempResult.append(temp1);

  let sideMenu = $("#sidemenu");
sideMenu.attr('style','display:block');

    var dnsContainer = $("#dnsRecordLists");
    dnsContainer.empty();
    let cdTypeValueDropDown = $("#cdntype").val();

    $("#cdntype").change(function() {
      cdTypeValueDropDown = this.value;
      console.log(this.value);
      if (cdTypeValueDropDown == 'a') {
        $("#cdnvalue").attr('placeholder', 'IPv4 eg. 2.2.2.2');
        $("#addcdndnsport").attr('style', 'display:none');
        $("#addcdndnsweight").attr('style', 'display:none');
        $("#addcdndnspriority").attr('style', 'display:none');
        $("#cdnstatusdiv").attr('style', 'display:block');

      } else if (cdTypeValueDropDown == 'aaaa') {
        $("#cdnvalue").attr('placeholder', 'IPv6 eg. 2001:0:0:0:0:ffff:202:202');
        $("#addcdndnsport").attr('style', 'display:none');
        $("#addcdndnsweight").attr('style', 'display:none');
        $("#addcdndnspriority").attr('style', 'display:none');
        $("#cdnstatusdiv").attr('style', 'display:none');

      } else if (cdTypeValueDropDown == 'cname') {
        $("#cdnvalue").attr('placeholder', 'Domain Name');
        $("#addcdndnsport").attr('style', 'display:none');
        $("#addcdndnsweight").attr('style', 'display:none');
        $("#addcdndnspriority").attr('style', 'display:none');
        $("#cdnstatusdiv").attr('style', 'display:block');

      } else if (cdTypeValueDropDown == 'aname') {
        $("#cdnvalue").attr('placeholder', 'Domain Name');
        $("#addcdndnsport").attr('style', 'display:none');
        $("#addcdndnsweight").attr('style', 'display:none');
        $("#addcdndnspriority").attr('style', 'display:none');
        $("#cdnstatusdiv").attr('style', 'display:block');

      } else if (cdTypeValueDropDown == 'mx') {
        $("#cdnvalue").attr('placeholder', 'Mail server');
        $("#addcdndnsport").attr('style', 'display:none');
        $("#addcdndnsweight").attr('style', 'display:none');
        $("#addcdndnspriority").attr('style', 'display:inline-block');
        $("#cdnstatusdiv").attr('style', 'display:none');

      } else if (cdTypeValueDropDown == 'ptr') {
        $("#cdnvalue").attr('placeholder', 'Domain');
        $("#addcdndnsport").attr('style', 'display:none');
        $("#addcdndnsweight").attr('style', 'display:none');
        $("#addcdndnspriority").attr('style', 'display:none');
        $("#cdnstatusdiv").attr('style', 'display:none');

      } else if (cdTypeValueDropDown == 'srv') {
        $("#cdnvalue").attr('placeholder', 'value');
        $("#addcdndnsport").attr('style', 'display:inline-block');
        $("#addcdndnsweight").attr('style', 'display:inline-block');
        $("#addcdndnspriority").attr('style', 'display:inline-block');
        $("#cdnstatusdiv").attr('style', 'display:none');

      } else if (cdTypeValueDropDown == 'txt') {
        $("#cdnvalue").attr('placeholder', 'Text');
        $("#addcdndnsport").attr('style', 'display:none');
        $("#addcdndnsweight").attr('style', 'display:none');
        $("#addcdndnspriority").attr('style', 'display:none');
        $("#cdnstatusdiv").attr('style', 'display:none');

      } else if (cdTypeValueDropDown == 'ns') {
        $("#cdnvalue").attr('placeholder', 'Nameserver');
        $("#addcdndnsport").attr('style', 'display:none');
        $("#addcdndnsweight").attr('style', 'display:none');
        $("#addcdndnspriority").attr('style', 'display:none');
        $("#cdnstatusdiv").attr('style', 'display:none');

      };
    });
    $('#addNewDNSBtn').click(function() {

      createNewDNSRecord();

    });

    $.ajax(settings).done(function(response) {
      console.log(response.status);
      console.log(response);
      responseData = response;
      if (response.data.length > 0) {
        dnsContainer.append('<h3>List of All Domains</h3><table id="tableDNSRecordLists" style="width:100%" class="styled-table"><tr><th>Type</th><th>Name</th><th>Value</th><th>TTL</th><th>CDN Status</th><th>actions</th></tr></table>')
        for (let i = 0; i < response.data.length; i++) {
          var valueCell = "";

          if ((response.data[i]["type"] == 'a') || (response.data[i]["type"] == 'aaaa')) {
            let valueIpList = "";
            for (let j = 0; j < response.data[i]["value"].length; j++) {
              valueIpList += "<span>" + response.data[i]["value"][j]["ip"] + "</span><br>";
            }
            valueCell = " <div class=\"dnsRecordItemLargeValue\">" + valueIpList + "</div>";
          } else if (response.data[i]["type"] == 'cname') {
            valueCell = response.data[i]["value"]["host"];
          } else if (response.data[i]["type"] == 'mx') {
            valueCell = " <div class=\"dnsRecordItemLargeValue\">" + response.data[i]["value"]["host"] + "</div><div class=\"dnsCdnLabelPrimary\">priority: " + response.data[i]["value"]["priority"] + "</div>";
          } else if (response.data[i]["type"] == 'ptr') {
            valueCell = " <div>" + response.data[i]["value"]["domain"] + "</div>";
          } else if (response.data[i]["type"] == 'srv') {
            valueCell = " <div class=\"dnsRecordItemLargeValue\">" + response.data[i]["value"]["target"] + "</div><div><span class=\"dnsCdnLabelPrimary\">priority: " + response.data[i]["value"]["priority"] + "</span><span class=\"dnsCdnLabelPrimary\">Weight: " + response.data[i]["value"]["weight"] + "</span></div>";
          } else if (response.data[i]["type"] == 'txt') {
            valueCell = " <div>" + response.data[i]["value"]["text"] + "</div>";
          } else if (response.data[i]["type"] == 'ns') {
            valueCell = " <div>" + response.data[i]["value"]["host"] + "</div>";

          };
          var deleteCell = "";
          if (response.data[i]["can_delete"]) {
            deleteCell = "<button id="+("delns-"+responseData.data[i]["id"]) + " data-id=" + responseData.data[i]["id"] + ">" + deleteIconButton + "</button>";
          }


          var tableRow = "<tr>" +
            "<td>" + "<div " + "id=" + responseData.data[i]["id"] + " data-id=" + responseData.data[i]["id"] + " >" + response.data[i]["type"].toUpperCase() + "</div>" + "</td>" +
            "<td>" + response.data[i]["name"] + "</td>" +
            "<td class='dnsRecordValue'>" + valueCell + "</td>" +
            "<td>" + response.data[i]["ttl"] + "</td>" +
            "<td>" + response.data[i]["cloud"] + "</td>" +
            "<td>" + deleteCell + "</td>" +
            " </tr>";
          $("#tableDNSRecordLists").append(tableRow);
          $('#delns-' + responseData.data[i]["id"]).click(function() {
            console.log($('#' + responseData.data[i]["id"]).data("id"));
            if (confirm('Do you want to delete this item?')) {
                // yes
                removeTheDNSRecord(responseData.data[i]["id"], domain);
              } else {
                // Do nothing!
              };

          });
        }
      }

    }).fail(function(response) {
      console.log(response.status);
    });
  };
  //End of loadDNSList function

  function loadDomainList() {
    //Function for getting list of domains based on :
    //https://www.arvancloud.com/docs/api/cdn/4.0#operation/domains.list
    if ($("#apikey").val() == "") {
      alert("Api key cant be empty!");
    } else {
      var settings = {
        "url": "https://napi.arvancloud.com/cdn/4.0/domains",
        "method": "GET",
        "timeout": 0,
        "headers": {
          "Authorization": "Apikey " + $("#apikey").val()
        },
      };
      var responseData;

      let tempResult = $("#results");
  tempResult.empty();
  let sideMenu = $("#sidemenu");
sideMenu.attr('style','display:none');
      // let container = document.getElementById('domainLists');
      var container = $("#contentbox");
      container.empty();
      $.ajax(settings).done(function(response) {
        console.log(response.status);
        console.log(response);
        responseData = response;
        if (response.data.length > 0) {
          container.empty();
          container.append('<h3>List of All Domains</h3><table id="tabledomainLists" style="width:100%" class="styled-table"><tr><th>Domain</th><th>DNS Status</th><th>Security Status</th><th>Action</th></tr></table>')
          for (let i = 0; i < response.data.length; i++) {

            var tableRow = "<tr>" +
              "<td>" + "<div class='select-cell'" + " id=" + responseData.data[i]["id"] + " data-id=" + responseData.data[i]["id"] + " data-domain=" + responseData.data[i]["domain"] + ">" + response.data[i]["domain"] + "</div>" + "</td>" +
              "<td>" + response.data[i]["services"]["dns"] + "</td>" +
              "<td>" + response.data[i]["services"]["cloud_security"] + "</td>" +
              "<td>" + "<div id=" + ("del" + responseData.data[i]["id"]) + " >" + deleteIconButton + "</div>" + "</td>" +
              " </tr>";
            $("#tabledomainLists").append(tableRow);
            //  container.insertAdjacentHTML("beforeend" , tableRow);
            $('#del' + responseData.data[i]["id"]).click(function() {
              if (confirm('Do you want to delete this item?')) {
                // yes
                removeTheDomain(responseData.data[i]["id"], responseData.data[i]["domain"]);
              } else {
                // Do nothing!
              };

            });

            $('#' + responseData.data[i]["id"]).click(function() {


              var domainObject = {
                'domain': responseData.data[i]["domain"],
                'id': responseData.data[i]["id"]
              };
              saveStuff(domainObject);
              loadDNSList();


            });
          }
        }

      }).fail(function(response) {
        console.log(response.status);
        alert("Error Loading Domain List. Error Code: " + response.status);
      });
    }
  };
</script>



<?php
$cpanel->footer();
$cpanel->end();
?>