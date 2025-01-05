<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum - FrontEnd Developer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            width: 90%;
            margin: auto;
        }

        header {
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        header img {
            height: 40px;
        }

        header nav a {
            font-size: 16px;
            color: #333;
            text-decoration: none;
            margin: 0 10px;
            padding: 5px 0;
        }

        header nav a:hover {
            color: #007BFF;
        }

        header nav a.fw-bold {
            font-weight: bold;
            border-bottom: 2px solid #333;
        }

        .forum-topic {
            padding: 20px 0;
        }

        .forum-topic h1 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .forum-topic p {
            font-size: 16px;
            line-height: 1.6;
        }

        .comment-section {
            margin-top: 20px;
        }

        .comment {
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .comment .author {
            font-weight: bold;
            font-size: 14px;
        }

        .comment .timestamp {
            font-size: 12px;
            color: #666;
        }

        .comment .content {
            margin-top: 10px;
            font-size: 14px;
        }

        .comment .actions {
            margin-top: 10px;
            display: flex;
            gap: 10px;
        }

        .comment .actions button {
            background-color: transparent;
            border: none;
            color: #007BFF;
            font-size: 14px;
            cursor: pointer;
            padding: 0;
        }

        .comment .actions button:hover {
            text-decoration: underline;
        }

        .add-comment {
            margin-top: 20px;
        }

        .add-comment textarea {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .add-comment button {
            margin-top: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 15px;
            font-size: 14px;
            cursor: pointer;
            border-radius: 5px;
        }

        .add-comment button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Find Mentor') }}
            </h2>
        </x-slot>
    
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="container">
        
                            <main class="forum-topic">
                                <h1>Forum</h1>
                                <div class="forum-section">
                                    <h1>FrontEnd Developer</h1>
                                    <p>Halo semuanya, saya baru mulai belajar menjadi seorang front-end developer dan ingin tahu keterampilan utama apa saja yang harus saya fokuskan untuk memulai karier di bidang ini? Apakah saya perlu langsung belajar framework seperti React, atau lebih baik menguasai dasar-dasarnya dulu seperti HTML, CSS, dan JavaScript? Ada saran roadmap atau sumber belajar yang bagus? Terima kasih! 🙏</p>
                    
                                    <section class="comment-section">
                                        <h4>7 Komentar</h4>
                                        <div class="comment">
                                            <div class="author">Stefanus Jesano Pramathana</div>
                                            <div class="timestamp">7 bulan yang lalu</div>
                                            <div class="content">Sebagai pemula di dunia front-end development, langkah pertama yang harus kamu lakukan adalah menguasai dasar-dasar seperti HTML, CSS, dan JavaScript. HTML akan membantu kamu memahami struktur halaman web, sementara CSS digunakan untuk mendesain tampilan.</div>
                                            <div class="actions">
                                                <button>Balas</button>
                                                <button class="action delete" onclick="confirmDelete()">Hapus Komentar</button>
                                                <script>
                                                    function confirmDelete() {
                                                        Swal.fire({
                                                            title: "Are you sure?",
                                                            text: "You won't be able to revert this!",
                                                            icon: "warning",
                                                            showCancelButton: true,
                                                            confirmButtonColor: "#3085d6",
                                                            cancelButtonColor: "#d33",
                                                            confirmButtonText: "Yes, delete it!"
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                Swal.fire({
                                                                    title: "Deleted!",
                                                                    text: "Your file has been deleted.",
                                                                    icon: "success"
                                                                });
                                                                // Tambahkan logika penghapusan file di sini, jika diperlukan
                                                            }
                                                        });
                                                    }
                                                </script>
                                            </div>
                                        </div>
                                        <div class="comment">
                                            <div class="author">Anindhita Febriandini</div>
                                            <div class="timestamp">6 bulan yang lalu</div>
                                            <div class="content">Jika kamu ingin membangun karier di front-end development, penting juga untuk memiliki proyek nyata sebagai portfolio. Cobalah membuat proyek kecil seperti landing page, kalkulator sederhana, atau aplikasi to-do list. Ini akan memberikan pengalaman langsung dan meningkatkan pemahamanmu tentang bagaimana teori diterapkan dalam praktik.</div>
                                            <div class="actions">
                                                <button>Balas</button>
                                                <button class="action delete" onclick="confirmDelete()">Hapus Komentar</button>
                                                <script>
                                                    function confirmDelete() {
                                                        Swal.fire({
                                                            title: "Are you sure?",
                                                            text: "You won't be able to revert this!",
                                                            icon: "warning",
                                                            showCancelButton: true,
                                                            confirmButtonColor: "#3085d6",
                                                            cancelButtonColor: "#d33",
                                                            confirmButtonText: "Yes, delete it!"
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                Swal.fire({
                                                                    title: "Deleted!",
                                                                    text: "Your file has been deleted.",
                                                                    icon: "success"
                                                                });
                                                                // Tambahkan logika penghapusan file di sini, jika diperlukan
                                                            }
                                                        });
                                                    }
                                                </script>
                                            </div>
                                        </div>
                                        <div class="comment">
                                            <div class="author">Auvefa Rizky Pratama</div>
                                            <div class="timestamp">6 bulan yang lalu</div>
                                            <div class="content">Dalam dunia kerja, keterampilan optimasi performa web sangat dihargai. Pelajari teknik seperti minifikasi file, lazy loading, dan penggunaan CDN untuk meningkatkan kecepatan loading halaman.</div>
                                            <div class="actions">
                                                <button>Balas</button>
                                                <button class="action delete" onclick="confirmDelete()">Hapus Komentar</button>
                                                <script>
                                                    function confirmDelete() {
                                                        Swal.fire({
                                                            title: "Are you sure?",
                                                            text: "You won't be able to revert this!",
                                                            icon: "warning",
                                                            showCancelButton: true,
                                                            confirmButtonColor: "#3085d6",
                                                            cancelButtonColor: "#d33",
                                                            confirmButtonText: "Yes, delete it!"
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                Swal.fire({
                                                                    title: "Deleted!",
                                                                    text: "Your file has been deleted.",
                                                                    icon: "success"
                                                                });
                                                                // Tambahkan logika penghapusan file di sini, jika diperlukan
                                                            }
                                                        });
                                                    }
                                                </script>
                                            </div>
                                        </div>
                                    </section>
                    
                                    <section class="add-comment">
                                        <h4>Tambahkan Komentar</h4>
                                        <textarea rows="4" placeholder="Type a message..."></textarea>
                                        <button>Kirim Komentar</button>
                                    </section>
                                </div>
                            </main>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

</body>
</html>
