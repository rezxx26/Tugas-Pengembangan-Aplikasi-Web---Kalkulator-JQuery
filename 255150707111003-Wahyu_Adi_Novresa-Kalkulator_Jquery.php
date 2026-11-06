<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator jQuery - Tugas PAW</title>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            display: flex;
            height: 100vh;
            margin: 0;
        }
        .identity {
            text-align: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #eeeeee;
        }
        .identity h3 {
            margin: 0;
            color: #333;
            font-size: 18px;
        }
        .identity p {
            margin: 5px 0 0;
            color: #666;
            font-size: 14px;
            font-weight: bold;
        }
        .display-box {
            background-color: #222;
            color: #ffffff;
            border-radius: 8px;
            padding: 15px;
            text-align: right;
            margin-bottom: 20px;
            box-shadow: inset 0 2px 5px rgba(0,0,0,0.5);
        }
        #operation-screen {
            font-size: 14px;
            color: #aaa;
            min-height: 18px;
            word-wrap: break-word;
        }
        #result-screen {
            font-size: 28px;
            font-weight: bold;
            margin-top: 5px;
            overflow-x: auto;
        }
        .keypad {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }
        button {
            padding: 15px;
            font-size: 18px;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            background-color: #e0e0e0;
            transition: background 0.2s;
        }
        button:hover {
            background-color: #d0d0d0;
        }
        button:active {
            background-color: #c0c0c0;
        }
        .btn-op {
            background-color: #c0c0c0;
            color: black;
        }
        .btn-op:hover {
            background-color: #c0c0c0;
        }
        .btn-clear {
            background-color: #ff3b30;
            color: black;
        }
        .btn-clear:hover {
            background-color: #d32f2f;
        }
        .btn-equal {
            background-color: #c0c0c0;
            color: black;
            grid-column: span 2;
        }
        .btn-equal:hover {
            background-color: #c0c0c0;
        }
    </style>
</head>
<body>

    <div class="calculator-card">
        <div class="identity">
            <h3 id="student-name">Wahyu Adi Novresa</h3>
            <p id="student-nim">NIM: 255150707111003</p>
        </div>
        <div class="display-box">
            <div id="operation-screen"></div>
            <div id="result-screen">0</div>
        </div>
        <div class="keypad">
            <button class="btn-clear" id="btn-c">C</button>
            <button class="btn-op" data-val="/">/</button>
            <button class="btn-op" data-val="*">*</button>
            <button class="btn-op" data-val="-">-</button>

            <button class="btn-num" data-val="7">7</button>
            <button class="btn-num" data-val="8">8</button>
            <button class="btn-num" data-val="9">9</button>
            <button class="btn-op" data-val="+">+</button>

            <button class="btn-num" data-val="4">4</button>
            <button class="btn-num" data-val="5">5</button>
            <button class="btn-num" data-val="6">6</button>
            <button class="btn-num" data-val=".">.</button>

            <button class="btn-num" data-val="1">1</button>
            <button class="btn-num" data-val="2">2</button>
            <button class="btn-num" data-val="3">3</button>
            <button class="btn-num" data-val="0">0</button>

            <button class="btn-equal" id="btn-equals">=</button>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#student-name').text('Wahyu Adi Novresa');
            $('#student-nim').text('NIM: 255150707111003');

            let currentInput = '';
            let isCalculated = false;

            $('.btn-num').on('click', function() {
                const val = $(this).data('val');
                
                if (isCalculated) {
                    currentInput = val.toString();
                    isCalculated = false;
                } else {
                    currentInput += val;
                }

                $('#operation-screen').text(currentInput);
            });

            $('.btn-op').on('click', function() {
                const op = $(this).data('val');
                
                if (currentInput === '' && $('#result-screen').text() !== '0') {
                    currentInput = $('#result-screen').text();
                }

                if (isCalculated) {
                    isCalculated = false;
                }

                
                const lastChar = currentInput.slice(-1);
                if (['+', '-', '*', '/'].includes(lastChar)) {
                    currentInput = currentInput.slice(0, -1) + op;
                } else if (currentInput !== '') {
                    currentInput += op;
                }

                $('#operation-screen').text(currentInput);
            });

            $('#btn-equals').on('click', function() {
                if (currentInput === '') return;

                try {
                    const result = eval(currentInput);
                    
                    $('#result-screen').text(result);
                    isCalculated = true;
                } catch (error) {
                    $('#result-screen').text('Error');
                    isCalculated = true;
                }
            });

            $('#btn-c').on('click', function() {
                currentInput = '';
                isCalculated = false;
                $('#operation-screen').text('');
                $('#result-screen').text('0');
            });
        });
    </script>
</body>
</html>