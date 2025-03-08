<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

if (!function_exists('pengaturan')) {
  function pengaturan($id = NULL)
  {
    $expire = Carbon::now()->addMinutes(300); // 5 menit
    $pengaturan = Cache::remember('app_pengaturan', $expire, function () use ($id) {
      $select = DB::table('app_pengaturan')->select(['id', 'value'])->get()->toArray();
      $pengaturan = Arr::mapWithKeys($select, function ($item) {
        return [$item->id => $item->value];
      });
      return $pengaturan;
    });

    if ($id && is_string($id)) {
      if (array_key_exists($id, $pengaturan)) {
        return $pengaturan[$id];
      }
      return '';
    } else {
      return $pengaturan;
    }
  }
}

if (!function_exists('post_data')) {
  function post_data($url, $data)
  {
    $useragent = 'PHP Client 1.0 (curl) ' . phpversion();  // set user agent
    $ch = curl_init(); // persiapkan curl
    curl_setopt($ch, CURLOPT_URL, $url); // set url 
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); //post data
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return data trasnfer 
    curl_setopt($ch, CURLOPT_USERAGENT, $useragent); //panggil useragent
    $output = curl_exec($ch); //output ke string
    curl_close($ch); // tutup curl 
    return $output; // mengembalikan hasil curl
  }
}

if (!function_exists('get_data')) {
  function get_data($url)
  {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $result = curl_exec($ch);
    if (!empty(curl_error($ch))) {
      $result = print_r(curl_error($ch) . ' - ' . $url);
    }
    curl_close($ch);
    return $result;
  }
}

if (!function_exists('str_curl')) {
  function str_curl($url, $data)
  {
    return $url . '?' . http_build_query($data);
  }
}

if (!function_exists('get_token')) {
  function get_token()
  {
    $username_admin = env('API_USERNAME_SIMAK');
    $password_admin = env('API_PASSWORD_SIMAK');
    $url_simak = env('API_URL_SIMAK');
    $response  = post_data($url_simak . '/4pisim4k/index.php/token', ['username' => $username_admin, 'password' => $password_admin]);
    return json_decode($response, true);
  }
}


if (!function_exists('encode_arr')) {
  function encode_arr($data)
  {
    if (!array_key_exists('time', $data)) {
      $data += ['time' => time()];
    }

    return encryptor('encrypt', json_encode($data));
  }
}

if (!function_exists('decode_arr')) {
  function decode_arr($data)
  {
    return json_decode(encryptor('descrypt', $data), TRUE);
  }
}

if (!function_exists('encryptor')) {
  function encryptor($action, $string)
  {
    $output = false;
    $encrypt_method = "AES-256-CBC";

    $secret_key = "un1v3RS1T45Kh41Run";
    $secret_iv  = "UnkhairJ4y4##";

    $key = hash('sha256', $secret_key);
    $iv  = substr(hash('sha256', $secret_iv), 0, 16);

    if ($action == 'encrypt') {
      $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
      $output = base64_encode($output);
    } else if ($action == 'descrypt') {
      $output = base64_decode($string);
      $output = openssl_decrypt($output, $encrypt_method, $key, 0, $iv);
    }

    return $output;
  }
}

if (!function_exists('data_params')) {
  function data_params($params, $key)
  {
    $arr = decode_arr($params);
    if (!$arr) {
      return NULL;
    }

    return array_key_exists($key, $arr) ? $arr[$key] : NULL;
  }
}

if (!function_exists('filter')) {
  function filter($data)
  {
    $data = trim($data);
    return $data ? $data : null;
  }
}

if (!function_exists('foto_profil')) {
  function foto_profil($foto = NULL)
  {
    if (!$foto) {
      return asset('images/avatar5.png');
    }
    return asset($foto);
  }
}
