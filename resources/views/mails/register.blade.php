<!DOCTYPE html>
<html>

<head>
    <title>Aktivasi Akun E-Konseling</title>
</head>

<body>
    <h2>Halo, {{ $user['nama'] }}!</h2>
    <p>
        Terima kasih telah mendaftar di <strong>E-Konseling Universitas Khairun</strong>. Untuk mengaktifkan akun Anda,
        silakan klik tombol di bawah ini:
    </p>
    @php
        $link = route('frontend.aktivasi_akun', encode_arr(['id' => $user['id'], 'email' => $user['email']]));
    @endphp
    <p>
        <a href="{{ $link }}"
            style="display: inline-block; padding: 5px 10px; background-color: #007bff; color: #ffffff; text-decoration: none; border-radius: 5px;">
            Aktivasi Akun
        </a>
    </p>

    <p>
        Jika tombol di atas tidak berfungsi, Anda juga dapat mengklik tautan berikut: <br>
        <a href="{{ $link }}">{{ $link }}</a>
    </p>

    <p>Salam,<br>Tim E-Konseling</p>
</body>

</html>
