<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên Hệ</title>
</head>
    <style>
        .container{
            height: 1200px;
        }
        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        #contact-form {
            max-width: 600px;
            height: 450px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #555;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }
    </style>
    </style>
<body>
<div class="container">
    <header>
        <h1>Liên Hệ Chúng Tôi</h1>
    </header>

    <section id="contact-form">
        <form id="contactForm">
            <label for="name">Họ và Tên:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Nội dung:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <button type="submit">Gửi Liên Hệ</button>
        </form>
    </section>

    <footer>
        <p>&copy; 2023 Chúng Tôi - Liên Hệ. All rights reserved.</p>
    </footer>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const contactForm = document.getElementById('contactForm');

            contactForm.addEventListener('submit', function(event) {
                event.preventDefault();
                const formData = new FormData(contactForm);
                for (const [name, value] of formData.entries()) {
                    console.log(`${name}: ${value}`);
                }
            });
        });
    </script>
</body>

</html>