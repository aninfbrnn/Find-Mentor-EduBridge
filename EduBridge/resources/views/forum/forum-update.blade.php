<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Thread</title>
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

        .update-section {
            margin-top: 20px;
        }

        .update-section textarea {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .update-section button {
            margin-top: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 15px;
            font-size: 14px;
            cursor: pointer;
            border-radius: 5px;
        }

        .update-section button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <x-app-layout>
    <div class="container">
        <main class="forum-topic">
            <h1>Update Thread</h1>
            <div class="thread-content">
                <p id="thread-text">
                    Halo semuanya, saya baru mulai belajar menjadi seorang front-end developer dan ingin tahu keterampilan utama apa saja yang harus saya fokuskan untuk memulai karier di bidang ini? Apakah saya perlu langsung belajar framework seperti React, atau lebih baik menguasai dasar-dasarnya dulu seperti HTML, CSS, dan JavaScript? Ada saran roadmap atau sumber belajar yang bagus? Terima kasih! 🙏
                </p>
                <button class="btn btn-primary" id="toggle-update">
                    <img src="/image/Update-Toggle.png" alt="Update Thread" width="20">
                    Update Thread
                </button>
            </div>

            <div class="update-section mt-3 d-none" id="update-section">
                <form action="{{ route('thread.update', ['id' => $thread->id]) }}" method="POST">

                    @csrf
                    @method('PUT')
                    <textarea rows="5" name="content" required>
                        Halo semuanya, saya baru mulai belajar menjadi seorang front-end developer dan ingin tahu keterampilan utama apa saja yang harus saya fokuskan untuk memulai karier di bidang ini? Apakah saya perlu langsung belajar framework seperti React, atau lebih baik menguasai dasar-dasarnya dulu seperti HTML, CSS, dan JavaScript? Ada saran roadmap atau sumber belajar yang bagus? Terima kasih! 🙏
                    </textarea>
                    <button type="submit">Save Changes</button>
                </form>
            </div>
        </main>
    </div>

    <script>
        const toggleButton = document.getElementById('toggle-update');
        const updateSection = document.getElementById('update-section');

        toggleButton.addEventListener('click', () => {
            updateSection.classList.toggle('d-none');
        });
    </script>
    </x-app-layout>
</body>
</html>
