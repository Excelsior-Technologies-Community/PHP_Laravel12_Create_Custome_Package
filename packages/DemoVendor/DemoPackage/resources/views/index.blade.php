<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Package - Enhanced Version</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-align: center;
            padding: 50px;
            font-size: {{ config('demopackage.font_size') }};
            transition: all 0.3s ease;
        }

        .light {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #fff;
        }

        .dark {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: #fff;
        }

        .box {
            padding: 30px;
            border-radius: 15px;
            display: inline-block;
            margin-top: 20px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            min-width: 400px;
        }

        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
            color: #fff;
        }

        .badge {
            display: inline-block;
            padding: 5px 10px;
            background: #4CAF50;
            color: white;
            border-radius: 5px;
            margin: 10px;
            font-size: 14px;
        }

        .feature-list {
            text-align: left;
            margin: 20px auto;
            display: inline-block;
        }

        .feature-list li {
            margin: 10px 0;
            padding: 5px;
        }

        button {
            background: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px;
            font-size: 16px;
            transition: transform 0.2s;
        }

        button:hover {
            transform: scale(1.05);
            background: #45a049;
        }

        .info-card {
            background: rgba(255,255,255,0.2);
            padding: 15px;
            border-radius: 10px;
            margin: 15px 0;
        }

        footer {
            margin-top: 30px;
            font-size: 12px;
            opacity: 0.8;
        }
    </style>
</head>
<body class="{{ config('demopackage.theme') }}">
    <div class="box">
        <h1>🎯 {{ config('demopackage.message') }}</h1>
        
        <div class="badge">@demoVersion</div>
        <div class="badge" style="background: #2196F3">Laravel 12 Package</div>
        
        <div class="info-card">
            <h3>📊 Package Information</h3>
            <p><strong>Current Time:</strong> @demoDate</p>
            <p><strong>Theme:</strong> {{ ucfirst(config('demopackage.theme')) }} Mode</p>
            <p><strong>Font Size:</strong> {{ config('demopackage.font_size') }}</p>
        </div>

        <div class="info-card">
            <h3>✨ Features Available</h3>
            <ul class="feature-list">
                <li>✅ Custom Blade Directive (@demoVersion, @demoDate)</li>
                <li>✅ Dynamic Theme System (Light/Dark)</li>
                <li>✅ Configurable Settings</li>
                <li>✅ Responsive Design</li>
                <li>✅ Helper Functions</li>
            </ul>
        </div>

        <div>
            <button onclick="changeTheme()">🎨 Toggle Theme</button>
            <button onclick="changeFontSize()">🔤 Change Font Size</button>
        </div>

        @if(config('demopackage.show_footer'))
        <footer>
            {{ config('demopackage.footer_text') }}
        </footer>
        @endif
    </div>

    <script>
        function changeTheme() {
            let body = document.body;
            if (body.classList.contains('light')) {
                body.classList.remove('light');
                body.classList.add('dark');
            } else {
                body.classList.remove('dark');
                body.classList.add('light');
            }
        }

        function changeFontSize() {
            let sizes = ['14px', '16px', '18px', '20px'];
            let currentSize = getComputedStyle(document.body).fontSize;
            let currentIndex = sizes.indexOf(currentSize);
            let nextIndex = (currentIndex + 1) % sizes.length;
            document.body.style.fontSize = sizes[nextIndex];
        }
    </script>
</body>
</html>