<?php

header('Content-type: application/xml; charset=utf-8');

echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<urlset>';

if ($signals = file_get_contents('SIGNALS/YGGDRASIL.md')) {

  foreach (explode(PHP_EOL, $signals) as $signal) {

    if (preg_match('/\[(.*?)\]\((.*?)\)/ui', $signal, $data)) {

      if (!empty($data[1]) && !empty($data[2])) {

        if ($host = parse_url($data[2], PHP_URL_HOST)) {

          echo sprintf('<url><loc>%s</loc></url>', htmlentities($data[2]));
        }
      }
    }
  }
}

echo '</urlset>';