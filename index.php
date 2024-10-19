<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMPS-SI</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
        .header-bg {
            background: url('img/bg.jpg') no-repeat center center;
            background-size: cover;
        }
        .overlay {
            background: rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body class="bg-gray-100">
    <header class="header-bg h-screen relative">
        <div class="overlay h-full w-full absolute top-0 left-0"></div>
        <div class="relative z-10 text-center text-white py-20">
            <h1 class="text-5xl font-bold">HMPS-SI</h1>
            <nav class="mt-4">
                <ul class="flex justify-center space-x-8">
                    <li><a class="text-white hover:underline" href="#">HOME</a></li>
                    <li><a class="text-white hover:underline" href="#">FEATURES</a></li>
                    <li><a class="text-white hover:underline" href="#">BLOG</a></li>
                    <li><a class="text-white hover:underline" href="#">PORTFOLIO</a></li>
                    <li><a class="text-white hover:underline" href="#">CONTACT</a></li>
                </ul>
            </nav>
            <div class="mt-20">
                <h2 class="text-4xl font-bold">UNIVERSITAS FLORES</h2>
                <p class="text-xl mt-4">HIMPUNAN MAHASISWA PROGRAM STUDI SISTEM INFORMASI</p>
            </div>
        </div>
    </header>

    <section class="py-20 bg-blue-200">
        <div class="container mx-auto text-center mb-10">
            <h3 class="text-3xl font-bold">KETUA DAN WAKIL</h3>
        </div>
        <div class="container mx-auto flex justify-center flex-wrap space-x-4">
            <?php
            $conn = new mysqli("localhost", "root", "", "hmps");
            if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM kepemimpinan";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='bg-white rounded-lg shadow-lg p-6 m-4 max-w-xs text-center'>";
                    echo "<h4 class='text-xl font-bold'>" . htmlspecialchars($row['posisi']) . "</h4>";
                    echo "<img src='" . htmlspecialchars($row['gambar_url']) . "' class='mx-auto mb-4 rounded-full' height='200' width='200'/>";
                    echo "<p class='mt-4'>NAMA: " . htmlspecialchars($row['nama']) . "</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>Tidak ada data kepemimpinan.</p>";
            }
            $conn->close();
            ?>
        </div>
    </section>

    <section class="py-20 bg-blue-200">
        <div class="container mx-auto text-center mb-10">
            <h3 class="text-3xl font-bold">DAFTAR ANGGOTA</h3>
        </div>
        <div class="container mx-auto flex justify-center flex-wrap space-x-4">
            <?php
            $conn = new mysqli("localhost", "root", "", "hmps");
            if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM anggota_inti";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='bg-white rounded-lg shadow-lg p-6 m-4 max-w-xs text-center'>";
                    echo "<h4 class='text-xl font-bold'>" . htmlspecialchars($row['peran']) . "</h4>";
                    echo "<img src='" . htmlspecialchars($row['gambar_url']) . "' class='mx-auto mb-4 rounded-full' height='200' width='200'/>";
                    echo "<p class='mt-4'>NAMA: " . htmlspecialchars($row['nama']) . "</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>Tidak ada data anggota.</p>";
            }
            $conn->close();
            ?>
        </div>
    </section>

    <section class="py-20 bg-blue-200">
        <div class="container mx-auto text-center mb-10">
            <h3 class="text-3xl font-bold">VISI DAN MISI</h3>
        </div>
        <div class="container mx-auto text-center p-6 bg-white shadow-lg rounded-lg">
            <?php
            $conn = new mysqli("localhost", "root", "", "hmps");
            if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
            }

            $sql = "SELECT deskripsi FROM visi_misi LIMIT 1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<p class='text-lg'>" . htmlspecialchars($row['deskripsi']) . "</p>";
            } else {
                echo "<p>Tidak ada data visi dan misi.</p>";
            }
            $conn->close();
            ?>
        </div>
    </section>

    <section class="py-20 bg-blue-200">
        <div class="container mx-auto text-center mb-10">
            <h3 class="text-3xl font-bold">POSTINGAN BLOG</h3>
        </div>
        <div class="container mx-auto flex justify-center flex-wrap space-x-4">
            <?php
            $conn = new mysqli("localhost", "root", "", "hmps");
            if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM postingan_blog";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='bg-white rounded-lg shadow-lg p-6 m-4 max-w-xs text-center'>";
                    echo "<img src='" . htmlspecialchars($row['gambar_url']) . "' class='mx-auto mb-4' height='200' width='300'/>";
                    echo "<h4 class='text-xl font-bold'>" . htmlspecialchars($row['judul']) . "</h4>";
                    echo "<p class='text-gray-500 text-sm'>POSTED " . date('F jS, Y', strtotime($row['tanggal_post'])) . "</p>";
                    echo "<p class='mt-4'>" . htmlspecialchars($row['konten']) . "</p>";
                    echo "<a class='bg-red-500 text-white py-2 px-4 rounded-full mt-4 inline-block hover:bg-red-600' href='#'>Continue</a>";
                    echo "</div>";
                }
            } else {
                echo "<p>Tidak ada data blog.</p>";
            }
            $conn->close();
            ?>
        </div>
    </section>

    <section class="py-20 bg-blue-200">
        <div class="container mx-auto text-center mb-10">
            <h3 class="text-3xl font-bold">DAFTAR DIVISI</h3>
        </div>
        <div class="container mx-auto flex justify-center flex-wrap space-x-4">
            <?php
            $conn = new mysqli("localhost", "root", "", "hmps");
            if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM divisi";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='bg-white rounded-lg shadow-lg p-6 m-4 max-w-xs text-center'>";
                    echo "<h4 class='text-xl font-bold'>" . htmlspecialchars($row['nama_divisi']) . "</h4>";
                    echo "<img src='" . htmlspecialchars($row['gambar_url']) . "' class='mx-auto mb-4' height='200' width='200'/>";
                    
                    // Menampilkan Kordinator
                    $id_divisi = $row['id'];
                    $sql_kordinator = "SELECT * FROM kordinator WHERE id_divisi = $id_divisi";
                    $result_kordinator = $conn->query($sql_kordinator);
                    echo "<h5 class='mt-4 font-semibold'>Kordinator:</h5>";
                    if ($result_kordinator->num_rows > 0) {
                        while ($kordinator = $result_kordinator->fetch_assoc()) {
                            echo "<p>" . htmlspecialchars($kordinator['nama']) . "</p>";
                            echo "<img src='" . htmlspecialchars($kordinator['gambar_url']) . "' class='mx-auto mb-4 rounded-full' height='100' width='100'/>";
                        }
                    } else {
                        echo "<p>Tidak ada kordinator.</p>";
                    }

                    // Menampilkan Anggota
                    $sql_anggota = "SELECT * FROM anggota WHERE id_divisi = $id_divisi";
                    $result_anggota = $conn->query($sql_anggota);
                    echo "<h5 class='mt-4 font-semibold'>Anggota:</h5>";
                    if ($result_anggota->num_rows > 0) {
                        while ($anggota = $result_anggota->fetch_assoc()) {
                            echo "<p>" . htmlspecialchars($anggota['nama']) . "</p>";
                            echo "<img src='" . htmlspecialchars($anggota['gambar_url']) . "' class='mx-auto mb-4 rounded-full' height='100' width='100'/>";
                        }
                    } else {
                        echo "<p>Tidak ada anggota.</p>";
                    }

                    echo "</div>";
                }
            } else {
                echo "<p>Tidak ada data divisi.</p>";
            }
            $conn->close();
            ?>
        </div>
    </section>

    <footer class="bg-gray-500 py-10 text-white">
        <div class="container mx-auto text-center">
            <p class="mb-4">    </p>
            <h4 class="text-xl font-bold mb-4"> </h4>
            <p class="mb-4">    </p>
            <p class="mb-4">082169293711 or ndoluandreas27@email.com</p>
            <div class="mb-4">
                <input class="p-2 rounded-l-full" placeholder="Value" type="text"/>
                <button class="bg-white text-red-500 py-2 px-4 rounded-r-full">Submit</button>
            </div>
            <p class="text-sm">© 2023 HMPS-SI</p>
        </div>
    </footer>
</body>
</html>