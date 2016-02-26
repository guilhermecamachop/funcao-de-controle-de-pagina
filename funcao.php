function page() {

    $url = $_SERVER['REQUEST_URI'];

    $pages = explode('/', $url);

    $var['pages'] = $pages;

    $var['proto'] = strtolower(preg_replace('/[^a-zA-Z]/', '', $_SERVER['SERVER_PROTOCOL'])) . '://';

    $var['domain'] = $_SERVER['SERVER_NAME'];

    $var['complete'] = $var['proto'] . $var['domain'] . $url;

    $var['urlmaster'] = $url;


    for ($i = 0; $i < count($var['pages']); $i++) {

        $var['url'][$i] = $var['proto'] . $var['domain'];

        for ($i2 = 0; $i2 < $i + 1; $i2++) {

            $var['url'][$i] .= $var['pages'][$i2] . '/';
        }
    }

    $bget = explode('?', $url);

    if (isset($bget[1])) {

        $var['get'] = $_GET;

        for ($i = 0; $i < count($var['pages']); $i++) {

            $var['url'][$i] = $var['domain'];

            for ($i2 = 0; $i2 < count($i + 1); $i2++) {

                $var['url'][$i] .= $var['pages'][$i2] . '/';
            }

            $rem = explode('?', $var['pages'][$i]);

            if (isset($rem[1])) {

                $var['pages'][$i] = $rem[0];
            } else {

                $var['pages'][$i] = $var['pages'][$i];
            }
        }
    }
    return $var;
}